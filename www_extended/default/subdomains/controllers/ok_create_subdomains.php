<?php

die();
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;

$error = array();

if (!$id) {
    array_push($error, 'id is mandatory');
}


if (!$error) {

    // recojo los datos del sub dominio
    $subdomains = subdomains_details($id);

    $db_name = $subdomains['prefix'] . "_" . $subdomains['domain'] . $subdomains['code'];
    $db_user = $subdomains['prefix'] . "_" . $subdomains['domain'] . $subdomains['code'];
    $db_password = magia_uniqid();

    // creo la base de datos factuxbe_robin2020
    subdomains_db_create($db_name);

    die();

    // creo el user
    subdomains_db_user_create($db_user, $db_password);

    // add user to db
    subdomains_db_add_user2db($db_name, $db_user);

    // Fill db
    subdomains_db_fill($db_name, $data);

    subdomains_config_add_case($subdomains['subdomain'], $subdomains['domain']);

    // creo file  Crear el archivo config_robinson.factux.be.php     
    subdomains_config_create_config_file($subdomains['subdomain'], $subdomains['domain'], 'localhost', $db_name, $db_user, $db_password);

    // pongo al dia las tablas _content, _translations  
    subdomains_db_fill($db_name, $data);

    // header("Location: index.php?c=subdomains&a=details&id=$id");
} else {

    include view('home', 'pageError');
}


