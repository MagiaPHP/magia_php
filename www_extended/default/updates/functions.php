<?php

function updates_execute_update() {
    global $db;

    // Obtener la lista de actualizaciones aplicadas desde la base de datos
    $query = $db->query("SELECT version FROM updates ORDER BY version ASC");
    $applied_versions = $query->fetchAll(PDO::FETCH_COLUMN);

    // Obtener los archivos de actualización en el directorio 'updates'
    $update_files = glob('www_extended/default/updates/updates/*.php');

    // Ordenar los archivos de actualización por nombre
    sort($update_files);

    // Iniciar la tabla HTML
    echo '<style>
            table {
                width: 100%;
                border-collapse: collapse;
            }
            th, td {
                padding: 10px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }
            th {
                background-color: #f4f4f4;
            }
            .success {
                color: green;
                font-weight: bold;
            }
            .error {
                color: red;
                font-weight: bold;
            }
            .icon-success {
                color: green;
                font-weight: bold;
            }
            .icon-error {
                color: red;
                font-weight: bold;
            }
          </style>';

    echo '<table>
            <thead>
                <tr>
                    <th>Donde</th>
                    <th>Versión</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>';

    foreach ($update_files as $file) {
        // Extraer el número de versión del nombre del archivo
        $version = basename($file, '.php');

        // Si esta versión ya está aplicada, saltar
        if (in_array($version, $applied_versions)) {
            continue;
        }

        // Leer el contenido del archivo de actualización
        $file_content = file_get_contents($file);

        // Extraer información del comentario en el archivo
        preg_match_all('/^#\s*(\w+):\s*(.+)$/m', $file_content, $matches, PREG_SET_ORDER);

        // Procesar los comentarios para obtener la información
        $update_info = [];
        foreach ($matches as $match) {
            $key = trim($match[1]);
            $value = trim($match[2]);
            $update_info[$key] = $value;
        }


        // Si la ejecución fue exitosa, registrar la actualización
        $code = substr($version, 0, 6); // Obtiene los primeros 6 caracteres
        $date = date('Y-m-d h:m:s');
        $controller = $update_info['Controller'] ?? 'No controller provided';
        $description = $update_info['Description'] ?? 'No description provided';

        // Intentar ejecutar el archivo de actualización dentro de un bloque try...catch
        try {
            include $file;  // Aquí se ejecuta el archivo de actualización
            // Ejecutar la actualización
            $db->exec($update);

            updates_add($code, $date, $controller, $version, $version, $description, $update, '', '', null, 0, 1, 1);

            // Mostrar el resultado en la tabla con un ícono de éxito
            echo "<tr>
                    <td>$controller</td>
                    <td>$version</td>
                    <td>$description</td>
                    <td class='success'><span class='icon-success'>&#10003;</span> Actualización exitosa</td>
                  </tr>";
        } catch (Exception $e) {
            // Mostrar el error en la tabla con un ícono de error
            echo "<tr>
                    <td>$controller</td>
                    <td>$version</td>
                    <td>$description</td>
                    <td class='error'><span class='icon-error'>&#10007;</span> Error: " . $e->getMessage() . "</td>
                  </tr>";
        }
    }

    echo '</tbody></table>';
}

function updates_execute_sql_query($query) {
    global $db;

    // Definir el archivo de log de errores
    $log_file = 'error_sql.log';

    try {
        $stmt = $db->prepare($query);
        if ($stmt->execute()) {
            //echo "Consulta ejecutada correctamente: " . $query . "\n";
        } else {
            // Registrar errores en el archivo de log
            $error_message = "Error al ejecutar la consulta: " . $query . "\n";
            $error_message .= "Error: " . $stmt->errorInfo()[2] . "\n";
            error_log($error_message, 3, $log_file);

            // También puedes optar por imprimir en pantalla si es necesario
            // echo $error_message;
        }
    } catch (PDOException $e) {
        // Registrar excepciones en el archivo de log
        $error_message = "Error en la ejecución de la consulta: " . $e->getMessage() . "\n";
        error_log($error_message, 3, $log_file);

        // También puedes optar por imprimir en pantalla si es necesario
        echo $error_message;
    }
}

function updates_add_update($code, $version, $name, $description, $code_install, $code_uninstall, $code_check) {
    global $db;

    // Definir el archivo de log de errores
    $log_file = '/ruta/a/tu/archivo_de_errores.log';

    $query = "INSERT INTO `updates` (`code`, `version`, `name`, `description`, `code_install`, `code_uninstall`, `code_check`) VALUES (?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $db->prepare($query);
        if ($stmt->execute([$code, $version, $name, $description, $code_install, $code_uninstall, $code_check])) {
            echo "Actualización añadida correctamente.\n";
        } else {
            // Registrar errores en el archivo de log
            $error_message = "Error al ejecutar la consulta: " . $query . "\n";
            $error_message .= "Error: " . $stmt->errorInfo()[2] . "\n";
            error_log($error_message, 3, $log_file);

            // También puedes optar por imprimir en pantalla si es necesario
            // echo $error_message;
        }
    } catch (PDOException $e) {
        // Registrar excepciones en el archivo de log
        $error_message = "Error en la ejecución de la consulta: " . $e->getMessage() . "\n";
        error_log($error_message, 3, $log_file);

        // También puedes optar por imprimir en pantalla si es necesario
        // echo $error_message;
    }
}

function updates_uninstall_update($id) {
    global $db;
    $query = "SELECT * FROM `updates` WHERE `id` = ?";
    $stmt = $db->prepare($query);
    $stmt->execute([$id]);
    $update = $stmt->fetch();
    if ($update) {
        $query = $update['code_uninstall'];
        $stmt = $db->prepare($query);
        if ($stmt->execute()) {
            echo "Actualización desinstalada correctamente: " . $update['name'] . "\n";
// Actualizar el estado de la actualización
            $query = "UPDATE `updates` SET `installed` = 0 WHERE `id` = ?";
            $stmt = $db->prepare($query);
            $stmt->execute([$id]);
        } else {
            echo "Error al desinstalar actualización: " . $update['name'] . "\n";
            echo "Error: " . $stmt->errorInfo()[2] . "\n";
        }
    } else {
        echo "No se encontró la actualización\n";
    }
}

//// Desinstalar una actualización
//$id = 12; // ID de la actualización a desinstalar
//uninstall_update($id);
