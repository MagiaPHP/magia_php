<?php

/**
 * Crea solo la extructura del plugin 
 * estos son los archivos a crear 
 * 
 * 
 * ./controllers
 * ./models
 *      {plugin}.php // La clase
 * ./views
 * functions.php
 * 
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
echo "-- Tablas por crear el plugin\n";
echo "-- www_extended-- " . "\n";
echo "\n\n";
$plugins = array();
$i = 1;
foreach (bd_tablas($config_db) as $key => $value) {
    //echo var_dump($value);  
    $ti = "Tables_in_$config_db";
    if (!file_exists("../$config_destino/$value[$ti]")) {
        array_push($plugins, $value[$ti]);
        //echo "$i - $value[$ti] \n"; 
    }
    $i++;
}
$i = 0;
foreach ($plugins as $key => $p) {
    echo "$i) $p \n";
    $i++;
}
echo "Escoja un plugin?\n";
do {
    $opcion = trim(fgets(STDIN)); // lee una línea de STDIN        
} while ($opcion > count($plugins) || $opcion <= -1);
$plugin = $plugins[$opcion];
if ($plugin) {
    crear_mvc_esqueleto($plugin);
    echo "###########################################################\n";
    echo "############################################################\n";
    echo "\n";
}