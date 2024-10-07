<?php

/**
 * Mago de Magia PHP - Script para la creación y configuración automática de plugins.
 * 
 * Este script automatiza la creación y eliminación de plugins,
 * configurando controladores, permisos, módulos y opciones en la base de datos.
 * 
 * @version 2.0
 * @author [Tu Nombre]
 */
// Incluyendo archivos necesarios
include 'config.php';
include 'campos.php';
include 'functions.php';
include 'bd.php';
include 'contenido_clase.php';
include 'contenido_controllers.php';
include 'contenido_docs.php';
include 'contenido_functions.php';
include 'contenido_views.php';
include 'functions_extra.php'; // Incluye el archivo de funciones
//
//
// Configuraciones iniciales (se pueden configurar dinámicamente)
$config_destino = "www";
$config_db = $config_db ?? 'default_db'; // Configuración de la base de datos
$admin_id = 246;

//// Función para registrar logs de actividades
//function logMessage($message) {
//    $logFile = 'mago_log.txt';
//    file_put_contents($logFile, date('[Y-m-d H:i:s] ') . $message . "\n", FILE_APPEND);
//}
//
//// Función para validar la existencia de una función antes de llamarla
//function validateFunction($functionName) {
//    if (!function_exists($functionName)) {
//        die("Error: La función '$functionName' no está definida.\n");
//    }
//}
// Inicialización del script
echo "-=- MAGIA PHP -=-\n";

// Validación de funciones necesarias
validateFunction('bd_tablas');

// Menú principal
echo "\nSeleccione una opción:\n";
echo "1) Crear un nuevo plugin\n";
echo "2) Eliminar un plugin existente\n";
echo "3) Verificar presencia de ítems de un plugin\n";
echo "4) Agregar un campo a la tabla\n";  // Nueva opción
echo "0) Salir\n";

// Procesar opción seleccionada
do {
    $opcion = trim(fgets(STDIN));
    if (!in_array($opcion, ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'])) {
        echo "Opción no válida. Intente de nuevo.\n";
        $opcion = null;
    }
} while ($opcion === null);

if ($opcion == '1') {
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// Obtener las tablas de la base de datos
    $plugins = [];
    $i = 1;

    foreach (bd_tablas($config_db) as $key => $value) {
        $ti = "Tables_in_$config_db";
        if (!file_exists("../$config_destino/$value[$ti]")) {
            array_push($plugins, $value[$ti]);
        }
        $i++;
    }

    // Listado de plugins disponibles para crear
    echo "\n-- Tablas disponibles para crear el plugin\n";
    echo "$config_destino \n";

    // Muestro las tablas
    foreach ($plugins as $index => $pluginName) {
        echo "$index) $pluginName\n";
    }
    // Muestro el mensaje 
    echo "Tablas en: $config_db \n";
    echo "Escoja un plugin para crear:\n";
    // Validación y selección del plugin
    do {
        $opcion = trim(fgets(STDIN));
        if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $opcion = null;
        }
    } while ($opcion === null);

    $plugin = $plugins[$opcion];
    logMessage("[$plugin][add] Plugin seleccionado: $plugin");

    // Crear el Plugin
    createPlugin($plugin);
    addController($plugin);
    addPermissions($plugin);
    addModule($plugin);
    addOptions($plugin);
    addMenuEntry($plugin, $admin_id);
//    listFilesInTree($plugin);
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
} elseif ($opcion == '2') {
    // Eliminar un plugin existente
    // (Código existente para eliminar un plugin)
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // Obtener las tablas de la base de datos
    $plugins = [];
    $i = 1;

    foreach (bd_tablas($config_db) as $key => $value) {
        $ti = "Tables_in_$config_db";
        if (file_exists("../$config_destino/$value[$ti]")) {
            array_push($plugins, $value[$ti]);
        }
        $i++;
    }

    // Listado de plugins disponibles para eliminar
    echo "\nSeleccione el plugin que desea eliminar:\n";
    foreach ($plugins as $index => $pluginName) {
        echo "$index) $pluginName\n";
    }
    echo "\nSeleccione el plugin que desea eliminar:\n";
    // Validación y selección del plugin
    do {
        $opcion = trim(fgets(STDIN));
        if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $opcion = null;
        }
    } while ($opcion === null);

    $plugin = $plugins[$opcion];
    //
    //
    //
    deletePlugin($plugin, $config_destino, $admin_id);
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
} elseif ($opcion == '3') {
    // Verificar presencia de ítems de un plugin
    // Obtener las tablas de la base de datos
    $plugins = [];
    $i = 1;

    foreach (bd_tablas($config_db) as $key => $value) {
        $ti = "Tables_in_$config_db";
        array_push($plugins, $value[$ti]);
        $i++;
    }

    // Listado de plugins disponibles para verificar
    echo "\nSeleccione el plugin para verificar:\n";
    foreach ($plugins as $index => $pluginName) {
        echo "$index) $pluginName\n";
    }

    echo "\nSeleccione el plugin para verificar:\n";

    // Validación y selección del plugin
    do {
        $opcion = trim(fgets(STDIN));
        if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $opcion = null;
        }
    } while ($opcion === null);

    $plugin = $plugins[$opcion];
    //
    //
    checkPluginItems($plugin);
    //
    //
    //
    //
} elseif ($opcion == '4') {

    // Agregar un campo a la tabla
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    // Listado de tablas disponibles
    $tablas = bd_tablas($config_db);

    echo "\nSeleccione la tabla a la que desea agregar un campo:\n";
    foreach ($tablas as $index => $tabla) {
        $ti = "Tables_in_$config_db";
        echo "$index) " . $tabla[$ti] . "\n";
    }

    // Validación y selección de la tabla
    do {
        $tablaSeleccionada = trim(fgets(STDIN));
        if (!is_numeric($tablaSeleccionada) || $tablaSeleccionada < 0 || $tablaSeleccionada >= count($tablas)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $tablaSeleccionada = null;
        }
    } while ($tablaSeleccionada === null);

    $tabla = $tablas[$tablaSeleccionada]["Tables_in_$config_db"];

    // Solicitar el nombre del nuevo campo
    echo "Ingrese el nombre del nuevo campo: ";
    $nuevoCampo = trim(fgets(STDIN));

    // Menú para seleccionar el tipo de datos del nuevo campo
    $tiposDeDatos = [
        '1' => 'INT',
        '2' => 'VARCHAR(255)',
        '3' => 'TEXT',
        '4' => 'DATE',
        '5' => 'BOOLEAN',
        '6' => 'FLOAT',
        '7' => 'DATETIME'
    ];

    echo "Seleccione el tipo de datos para el nuevo campo:\n";
    foreach ($tiposDeDatos as $key => $tipo) {
        echo "$key) $tipo\n";
    }

    // Validación y selección del tipo de datos
    do {
        $tipoSeleccionado = trim(fgets(STDIN));
        if (!array_key_exists($tipoSeleccionado, $tiposDeDatos)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $tipoSeleccionado = null;
        }
    } while ($tipoSeleccionado === null);

    $tipoCampo = $tiposDeDatos[$tipoSeleccionado];

    // Llamar a la función para agregar el campo
    bdd_addFieldToTable($tabla, $nuevoCampo, $tipoCampo, $config_db);
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
} elseif ($opcion == '5') {
    echo "5 Option no implementada \n";
} elseif ($opcion == '6') {
    echo "6 Option no implementada \n";
} elseif ($opcion == '7') {
    echo "7 Option no implementada \n";
} elseif ($opcion == '8') {
    echo "8 Option no implementada \n";
} elseif ($opcion == '9') {
    echo "9 Option no implementada \n";
} elseif ($opcion == '0') {
    // Salir
    echo "Saliendo...\n";
    exit;
}


