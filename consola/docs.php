<?php

/**
 * Esto crea el plugin en www_extended
 * 
 */
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

$config_destino = "www_extended/default";

################################################################################
################################################################################
echo "-=- MAGIA PHP -=-" . "\n";
echo "-- Generador de docs\n";
echo "-- www_extended " . "\n";
echo "\n\n";

$plugins = array();

$i = 1;
foreach (bd_tablas($config_db) as $key => $value) {
    //echo var_dump($value);  
    $ti = "Tables_in_$config_db";

    //array_push($plugins, $value[$ti]);


    if (file_exists("../$config_destino/$value[$ti]")) {
        array_push($plugins, $value[$ti]);
    }

    $i++;
}

$i = 0;
foreach ($plugins as $key => $p) {
    echo "$i) $p \n";
    $i++;
}

echo "\n"; 
echo "############################################# \n"; 
echo "Escoja un plugin para crear la documentacion,   \n";
echo "El plugin debe existir y sus documentos base:  \n";
do {
    $opcion = trim(fgets(STDIN)); // lee una línea de STDIN        
} while ($opcion > count($plugins) || $opcion <= -1);

$plugin = $plugins[$opcion];

if ($plugin) {

################################################################################

    crear_docs($plugin);

    echo "\n";
}
