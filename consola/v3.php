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
//include 'contenido_docs_controllers.php';
//include 'contenido_docs_models.php';
//include 'contenido_docs_views.php';
include 'contenido_functions.php';
include 'contenido_views.php';
include 'functions_extra.php'; // Incluye el archivo de funciones
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
echo "3) Salir\n";

// Procesar opción seleccionada
do {
    $opcion = trim(fgets(STDIN));
    if (!in_array($opcion, ['1', '2', '3'])) {
        echo "Opción no válida. Intente de nuevo.\n";
        $opcion = null;
    }
} while ($opcion === null);

if ($opcion == '1') {
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
    echo "Tablas en: $config_db \n";
    echo "Escoja un plugin para crear:\n";
    foreach ($plugins as $index => $pluginName) {
        echo "$index) $pluginName\n";
    }

    // Validación y selección del plugin
    do {
        $opcion = trim(fgets(STDIN));
        if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $opcion = null;
        }
    } while ($opcion === null);

    $plugin = $plugins[$opcion];
    logMessage("[$plugin] Plugin seleccionado: $plugin");

    // Crear el Plugin
    createPlugin($plugin);
    addController($plugin);
    addPermissions($plugin);
    addModule($plugin);
    addOptions($plugin);
    addMenuEntry($plugin, $admin_id);
//    listFilesInTree($plugin);
    
    
} elseif ($opcion == '2') {
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

    // Validación y selección del plugin
    do {
        $opcion = trim(fgets(STDIN));
        if (!is_numeric($opcion) || $opcion < 0 || $opcion >= count($plugins)) {
            echo "Opción no válida. Intente de nuevo.\n";
            $opcion = null;
        }
    } while ($opcion === null);

    $plugin = $plugins[$opcion];
    deletePlugin($plugin, $config_destino, $admin_id);
} elseif ($opcion == '3') {
    // Salir
    echo "Saliendo...\n";
    exit;
}


