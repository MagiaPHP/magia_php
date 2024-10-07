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

/**
 * Agrega un nuevo campo a una tabla en la base de datos.
 * 
 * @param string $tableName Nombre de la tabla a la que se agregará el campo.
 * @param string $fieldName Nombre del nuevo campo.
 * @param string $fieldType Tipo de datos del nuevo campo (e.g., VARCHAR(255)).
 * @param string $config_db Configuración de la base de datos.
 */
function bdd_addFieldToTable($tableName, $fieldName, $fieldType, $config_db) {
    global $db;

    $sql = "ALTER TABLE `$tableName` ADD `$fieldName` $fieldType  ";

    $req = $db->prepare($sql);

    $req->execute();

    $result = $req->fetchall();

    if ($result) {
        echo "Campo '$fieldName' agregado correctamente a la tabla '$tableName'.\n";
        logMessage("Campo '$fieldName' agregado a la tabla '$tableName'.");
    } else {
        die("Error al agregar el campo: " . mysqli_error($config_db) . "\n");
    }
}

// contenido de bd.php

function bd_tablas($base_datos) {

    global $db;

    $data = null;

    $req = $db->prepare("SHOW FULL TABLES FROM $base_datos   ");

    $req->execute(array(
            // "base_datos" => $base_datos
    ));

    $data = $req->fetchall();
    return $data;
}

// contenido de v2.php

function db_list_table_with_same_prefixe($prefix) {

    global $db;
    $data = array(); // Cambiado a array para almacenar múltiples resultados
    // Prepara la consulta para buscar tablas que comienzan con el prefijo dado
    $req = $db->prepare("
        SELECT TABLE_NAME 
        FROM INFORMATION_SCHEMA.TABLES 
        WHERE TABLE_SCHEMA = :schema
          AND TABLE_NAME LIKE :prefix
    ");

    // Ejecuta la consulta con el esquema actual y el prefijo
    $req->execute(array(
        'schema' => 'public', // Cambia esto si estás usando un esquema diferente
        'prefix' => $prefix . '%'
    ));

    // Fetch todos los resultados y los almacena en el array $data
    while ($row = $req->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row['TABLE_NAME'];
    }

    return $data;
}

function bdd_referencias($tabla, $columna) {

    global $db;
    $data = null;
    $req = $db->prepare("            
             SELECT 
             REFERENCED_TABLE_NAME, 
             REFERENCED_COLUMN_NAME 
             FROM 
             INFORMATION_SCHEMA.KEY_COLUMN_USAGE WHERE Table_name = :tabla AND COLUMN_NAME = :columna
            ");
    $req->execute(array(
        "tabla" => $tabla,
        "columna" => $columna
    ));
    $data = $req->fetch();
    return $data;
}

function bdd_columnas_segun_tabla($tabla) {
    global $db;

    if (!$tabla) {
        return null;
    }
    $data = null;
    $req = $db->prepare("            
             SHOW FULL COLUMNS FROM $tabla
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}

function bdd_total_columnas_segun_tabla($tabla) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SELECT * FROM $tabla
            ");
    $req->execute();
    $data = $req->columnCount();
    return $data;
}

function bdd_add_controllers($plugin) {
    global $db;
    $req = $db->prepare("            
             INSERT INTO `controllers` (`id`, `controller`, `title`, `description`) VALUES (null, :plugin , :plugin, :plugin); 
            ");
    $req->execute(array(
        "plugin" => $plugin
    ));
    return $db->lastInsertId();
}

function bdd_remove_controller($plugin) {
    global $db;

    // Preparar la consulta SQL para eliminar el controlador
    $req = $db->prepare("
        DELETE FROM `controllers` WHERE `controller` = :controller;
    ");

    // Ejecutar la consulta con el parámetro proporcionado
    $result = $req->execute(array(
        "controller" => $plugin
    ));

    // Verificar si la eliminación fue exitosa
    if ($result) {
        echo "Controlador '$plugin' eliminado correctamente.\n";
    } else {
        echo "Error al eliminar el controlador '$plugin'.\n";
    }
}

function bdd_add_module($plugin) {
    global $db;
    $req = $db->prepare("            
             INSERT INTO `modules` (`id`, `label`, `father`, `module`, `description`, `author`,`author_email`,`url`,`version`,`order_by`, `status`) 
             VALUES                (:id, :label , :father,  :module,  :description,  :author, :author_email, :url, :version, :order_by, :status); 
            ");
    $req->execute(array(
        "id" => null,
        "label" => $plugin,
        "father" => null,
        "module" => $plugin,
        "description" => $plugin,
        "author" => 'Róbinson Coello S.',
        "author_email" => 'robincoello@hotmail.com',
        "url" => 'https://coello.be',
        "version" => '0.0.1',
        "order_by" => 1,
        "status" => 1
    ));
    return $db->lastInsertId();
}

function bdd_remove_module($plugin) {
    global $db;

    // Preparar la consulta SQL para eliminar el módulo
    $req = $db->prepare("
        DELETE FROM `modules` 
        WHERE `module` = :module;
    ");

    // Ejecutar la consulta con el parámetro proporcionado
    $result = $req->execute(array(
        "module" => $plugin
    ));

//    // Verificar si la eliminación fue exitosa
//    if ($result) {
//        echo "Módulo '$plugin' eliminado correctamente.\n";
//    } else {
//        echo "Error al eliminar el módulo '$plugin'.\n";
//    }
}

function bdd_add_options($option, $description, $data, $group, $controller) {
    global $db;
    $req = $db->prepare("            
             INSERT INTO `_options` (`option`, `description`, `data`, `group`, `controller`,`order_by`,`status`) 
             VALUES                 (:option , :description,  :data,  :group,  :controller, :order_by, :status); 
            ");
    $req->execute(array(
        "option" => $option,
        "description" => $description,
        "data" => $data,
        "group" => $group,
        "controller" => null,
        "order_by" => 1,
        "status" => 1
    ));
    return $db->lastInsertId();
}

function bdd_remove_options($option) {
    global $db;

    // Preparar la consulta SQL para eliminar la opción
    $req = $db->prepare("
        DELETE FROM `_options` 
        WHERE `option` = :option;
    ");

    // Ejecutar la consulta con el parámetro proporcionado
    $result = $req->execute(array(
        "option" => $option
    ));

    // Verificar si la eliminación fue exitosa
    if ($result) {
        echo "Opción '$option' eliminada correctamente.\n";
    } else {
        echo "Error al eliminar la opción '$option'.\n";
    }
}

function bdd_is_controller_in_db($plugin) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `controllers` WHERE `controller`=:controller ; 
            ");
    $req->execute(array(
        "controller" => $plugin
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_is_module_in_db($plugin) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `modules` WHERE `module`=:module ; 
            ");
    $req->execute(array(
        "module" => $plugin
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_add_permissions($plugin, $rol, $permiso) {
    global $db;

    $req = $db->prepare("            
             INSERT INTO `permissions` (`id`, `rol`, `controller`, `crud`) VALUES (NULL, :rol, :plugin, :permiso);
            ");
    $req->execute(array(
        "rol" => $rol,
        "plugin" => $plugin,
        "permiso" => $permiso
    ));
}

function bdd_remove_permissions($plugin, $rol) {
    global $db;

    // Preparar la consulta SQL para eliminar los permisos
    $req = $db->prepare("
        DELETE FROM `permissions` 
        WHERE `rol` = :rol 
          AND `controller` = :plugin           
    ");

    // Ejecutar la consulta con los parámetros proporcionados
    $result = $req->execute(array(
        "rol" => $rol,
        "plugin" => $plugin,
    ));

//    // Verificar si la eliminación fue exitosa
//    if ($result) {
//        echo "Permisos para el rol '$rol', controlador '$plugin' y permiso '$permiso' eliminados correctamente.\n";
//    } else {
//        echo "Error al eliminar los permisos para el rol '$rol', controlador '$plugin' y permiso '$permiso'.\n";
//    }
}

function bdd_is_permission_in_db($plugin, $rol) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `permissions` WHERE `rol`=:rol AND `controller`=:controller ; 
            ");
    $req->execute(array(
        "controller" => $plugin,
        "rol" => $rol,
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_is_options_in_db($option) {
    global $db;
    $req = $db->prepare("            
             SELECT * FROM `_options` WHERE `option`=:option; 
            ");
    $req->execute(array(
        "option" => $option
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_menu_search($location, $father_id, $label) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SELECT * FROM _menus WHERE `location` = :location AND `father_id` = :father_id AND `label` = :label
            ");
    $req->execute(array(
        "location" => $location,
        "father_id" => $father_id,
        "label" => $label
    ));
    $data = $req->fetchall();
    return $data;
}

function bdd_add_en_menu($location, $father_id, $plugin, $controller, $url, $target = null, $icon = 'glyphicon glyphicon-file', $order_by = 1, $status = 1) {
    global $db;

    $req = $db->prepare("            
             INSERT INTO `_menus` (`id`, `location`, `father_id`, `label`, `controller`, `url`, `target`, `icon`, `order_by`, `status`) 
                           VALUES (:id,  :location,  :father_id,  :label,  :controller,  :url,  :target,  :icon,  :order_by,  :status);
            ");
    $req->execute(array(
        "id" => null,
        "location" => $location,
        "father_id" => $father_id,
        "label" => $plugin,
        "controller" => $controller,
        "url" => $url,
        "target" => null,
        "icon" => $icon,
        "order_by" => $order_by,
        "status" => $status
    ));
    return $db->lastInsertId();
}

function bdd_add_en_magia($base_datos, $tabla, $campo, $accion, $label, $tipo, $tabla_externa, $columna_externa, $clase, $nombre, $identificador, $marca_agua, $valor, $solo_lectura = null, $obligatorio = null, $seleccionado = null, $desactivado = null, $orden = null, $estatus = null) {
    global $db;

    $req = $db->prepare("
           
            INSERT INTO `magia` (`id`, `base_datos`, `tabla`, `campo`, `accion`, `label`, `tipo`, `tabla_externa`, `columna_externa`, `clase`, `nombre`, `identificador`, `marca_agua`, `valor`, `solo_lectura`, `obligatorio`, `seleccionado`, `desactivado`, `orden`, `estatus`)                         
                         VALUES (:id,  :base_datos,  :tabla,  :campo,  :accion,  :label,  :tipo,  :tabla_externa,  :columna_externa,  :clase, :nombre, :identificador, :marca_agua, :valor, :solo_lectura, :obligatorio, :seleccionado, :desactivado, :orden, :estatus);
           

           ");
    $req->execute(array(
        "id" => null,
        "tabla" => $tabla,
        "base_datos" => $base_datos,
        "campo" => $campo,
        "accion" => $accion,
        "label" => $label,
        "tipo" => $tipo,
        "tabla_externa" => $tabla_externa,
        "columna_externa" => $columna_externa,
        "clase" => $clase,
        "nombre" => $nombre,
        "identificador" => $identificador,
        "marca_agua" => $marca_agua,
        "valor" => $valor,
        "solo_lectura" => $solo_lectura,
        "obligatorio" => $obligatorio,
        "seleccionado" => $seleccionado,
        "desactivado" => $desactivado,
        "orden" => $orden,
        "estatus" => $estatus
    ));
}

function bdd_data_for_options($plugin) {

    $data_json = '{"c":"' . $plugin . '", "a":"ok_show_col_from_table", "redi": {
            "redi":"1"}, "cols": {
                "id":"on", 
                ';

    foreach (bdd_columnas_segun_tabla($plugin) as $campo) {
        $data_json .= ' "' . $campo['Field'] . '":"on", ';
    }

    $data_json .= '"order_by":"on", "status":"on", 
                "button_details":"on", "button_pay":"on", "button_edit":"on", "modal_edit":"on", "button_delete":"on", "modal_delete":"on"
            }
        }';

    return $data_json;
}
