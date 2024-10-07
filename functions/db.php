<?php

function get_columns_by_table($table) {
    global $db;

    // Verificar si se ha proporcionado un nombre de tabla válido
    if (!$table) {
        return null;
    }

    try {
        // Preparar la consulta de manera segura usando un marcador de posición
        $stmt = $db->prepare("SHOW FULL COLUMNS FROM `$table`");
        $stmt->execute();

        // Obtener todos los resultados
        $columns = $stmt->fetchAll();
        return $columns;
    } catch (PDOException $e) {
        // Manejar errores en la consulta
        error_log("Error al obtener columnas de la tabla '$table': " . $e->getMessage());
        return null;
    }
}

function db_list_table_with_same_prefixe($prefix) {
    global $db;

    $data = array(); // Cambiado a array para almacenar múltiples resultados
    // Prepara la consulta para buscar tablas que comienzan con el prefijo dado
    $req = $db->prepare("
        SELECT TABLE_NAME 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = DATABASE()
          AND TABLE_NAME LIKE :prefix
    ");

    // Ejecuta la consulta con el prefijo
    $req->execute(array(
        'prefix' => $prefix . '%'
    ));

    // Fetch todos los resultados y los almacena en el array $data
    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['TABLE_NAME'];
    }

    return $data;
}

function db_list_tables_from_db($database) {
    global $db;

    try {
        // Use backticks to escape the database name to avoid SQL injection
        $req = $db->prepare("SHOW FULL TABLES IN `$database`");
        $req->execute();

        // Fetch all tables
        $data = $req->fetchAll(PDO::FETCH_NUM); // Use FETCH_NUM for numeric keys
        // Rename the result columns
        $result = [];
        foreach ($data as $row) {
            $result[] = [
                'name' => $row[0], // Rename the first column
                'type' => $row[1]  // Rename the second column
            ];
        }

        return $result;
    } catch (PDOException $e) {
        // Handle exceptions and return an appropriate message or value
        error_log("Error fetching tables from the database: " . $e->getMessage());
        return null; // Or return an empty array, depending on your needs
    }
}

function db_cols_from_table($table) {
    global $db;

    // Validar y sanitizar el nombre de la tabla
    $table = preg_replace('/[^a-zA-Z0-9_]/', '', $table);

    // Preparar la consulta SQL
    $sql = "SHOW COLUMNS FROM `{$table}`";
    $req = $db->prepare($sql);

    try {
        $req->execute();
        $data = $req->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error al consultar columnas de tabla: " . $e->getMessage();
        return [];
    }

    // Retornar los datos en un formato más manejable
    return $data;
}

function db_table_exists($table) {
    global $db;

    // Comprobar si la conexión a la base de datos está establecida
    if (!$db) {
        throw new Exception("No hay conexión a la base de datos.");
    }

    // Preparamos la consulta para verificar si la tabla existe en la base de datos
    $query = "SHOW TABLES LIKE ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$table]);
    $result = $stmt->fetch();

    // Retornar true si la tabla existe, de lo contrario false
    return $result !== false;
}

/**
 * 
 * @param type $filePath
 * @param type $hostname
 * @param type $db_user
 * @param type $db_pass
 * @param type $db_name
 * @param type $test Muesra lo que se esta haciendo
 * @return array
 */
function db_fill($filePath, $hostname, $db_user, $db_pass, $db_name, $test = false) {
//    $conn = mysqli_connect("localhost", "root", "root", "factux_test");
    $conn = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
//    mysqli_connect($hostname, $username, $password, $database);
    $sql = '';
    $error = array();
    if (file_exists($filePath)) {
        $lines = file($filePath);
        foreach ($lines as $line) {
//            echo "$line<br>";
//            
            if (!$test) {
                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }
                $sql .= $line;
                if (substr(trim($line), - 1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        array_push($error, mysqli_error($conn));
                    }
                    $sql = '';
                }
            } else {
                echo "$line<br>";
            }
            //
            //
            //
        } // end foreach
    } else {
        array_push($error, $filePath . ' no fue encontrada');
    }
    return $error;
}

function db_update($filePath, $hostname, $db_user, $db_pass, $db_name, $tva_cloud_contact, $test = false) {
    // coneccion
    $conn = mysqli_connect($hostname, $db_user, $db_pass, $db_name);
    //
    $sql = '';
    $error = array();
    if (file_exists($filePath)) {
        $lines = file($filePath);
        foreach ($lines as $line) {
            // Template
            $line = db_tmp($line, $tva_cloud_contact);
//            echo "$line<br>";
            if (!$test) {
                // Ignoring comments from the SQL script
                if (substr($line, 0, 2) == '--' || $line == '') {
                    continue;
                }
                $sql .= $line;
                if (substr(trim($line), - 1, 1) == ';') {
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        array_push($error, mysqli_error($conn));
                    }
                    $sql = '';
                }
            } else {
                echo "$line<br>";
            }
        } // end foreach
    } else {
        array_push($error, $filePath . ' no fue encontrada');
    }
    return $error;
}

//
function db_tmp($txt, $tva_contact_cloud) {

    $cc = cloud_company_details_by_tva($tva_contact_cloud);

    $ab = cloud_addresses_billing_by_contact_id($cc['id']);

    $tags = array(
        "%company_name%" => $cc['name'],
        "%tva%" => $cc['tva'],
        "%owner_name%" => $company->getEmployees()[0]->getName(),
        "%owner_lastname%" => $company->getEmployees()[0]->getLastame(),
        "%address%" => $ab['address'],
        "%number%" => $ab['number'],
        "%postcode%" => $ab['postcode'],
        "%barrio%" => $ab['barrio'],
        "%sector%" => $ab['sector'],
        "%ref%" => $ab['ref'],
        "%city%" => $ab['city'],
        "%province%" => $ab['province'],
        "%region%" => $ab['region'],
        "%country%" => $ab['country'],
        "%company_email%" => cloud_directory_list_by_contact_name($cc['id'], 'Email'),
        "%owner_email%" => cloud_directory_list_by_contact_name(60001, 'Email'),
        "%owner_email_password%" => password_hash(cloud_directory_list_by_contact_name(60001, 'Email'), PASSWORD_DEFAULT),
    );

    foreach ($tags as $tag => $tmp) {
        $txt = (str_replace($tag, $tmp, $txt));
    }

    return $txt;
}

/**
 * Verifica si una columna existe en una tabla de la base de datos, con validación de que la tabla
 * también exista. Realiza validaciones para asegurar que tanto el nombre de la columna como el de la
 * tabla sean válidos, y maneja posibles errores durante el proceso.
 *
 * @param string $col_name El nombre de la columna que se desea verificar si existe.
 * @param string $table El nombre de la tabla en la que se buscará la columna.
 * @return bool Retorna `true` si la columna existe en la tabla y la tabla existe, `false` en caso contrario o si hay un error.
 * @throws InvalidArgumentException Si el nombre de la columna o de la tabla es inválido.
 * @throws Exception Si ocurre un error al intentar obtener las columnas de la tabla o si la tabla no existe.
 *
 * Ejemplos de uso:
 *
 * Ejemplo 1: Verificación exitosa
 * ```php
 * $table = "expenses";
 * $col_name = "id";
 *
 * if (magia_db_col_exist_in_table($col_name, $table)) {
 *     echo "La columna '$col_name' existe en la tabla '$table'.";
 * } else {
 *     echo "La columna '$col_name' no existe en la tabla '$table'.";
 * }
 * ```
 *
 * Ejemplo 2: Tabla no existe
 * ```php
 * $table = "non_existent_table";
 * $col_name = "id";
 *
 * if (!magia_db_col_exist_in_table($col_name, $table)) {
 *     echo "La tabla '$table' no existe o la columna '$col_name' no está en la tabla.";
 * }
 * ```
 *
 * Ejemplo 3: Manejo de errores
 * ```php
 * $table = ""; // Nombre de tabla vacío, lo cual es inválido
 * $col_name = "id";
 *
 * $result = magia_db_col_exist_in_table($col_name, $table);
 *
 * if ($result === false) {
 *     echo "Se produjo un error o la columna no existe.";
 * }
 * ```
 */
function magia_db_col_exist_in_table($col_name, $table) {
    try {
        // Validar que se hayan proporcionado tanto la columna como la tabla
        if (empty($col_name) || empty($table)) {
            throw new InvalidArgumentException("El nombre de la columna o de la tabla no puede estar vacío.");
        }

        // Validar que los nombres proporcionados sean cadenas
        if (!is_string($col_name) || !is_string($table)) {
            throw new InvalidArgumentException("El nombre de la columna y de la tabla deben ser cadenas.");
        }

        // Verificar si la tabla existe
        if (!db_table_exists($table)) {
            throw new Exception("La tabla '$table' no existe en la base de datos.");
        }

        // Obtener las columnas de la tabla
        $columns_info = db_cols_from_table($table);

        // Verificar si la función devolvió un resultado válido
        if (!is_array($columns_info) || empty($columns_info)) {
            throw new Exception("Error al obtener las columnas de la tabla '$table'. Verifique si hay un problema con la base de datos.");
        }

        // Extraer solo los nombres de las columnas del resultado
        $valid_columns = array_column($columns_info, 'Field');

        // Verificar si el nombre de la columna está en la lista de columnas válidas
        return in_array($col_name, $valid_columns);
    } catch (InvalidArgumentException $e) {
        // Manejo de errores para argumentos no válidos
        error_log("Error: " . $e->getMessage());
        return false;
    } catch (Exception $e) {
        // Manejo de cualquier otro tipo de error
        error_log("Error: " . $e->getMessage());
        return false;
    }
}
