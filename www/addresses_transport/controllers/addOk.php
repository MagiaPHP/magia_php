<?php

die("Disabled");
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$addresses_id = (isset($_POST["addresses_id"])) ? clean($_POST["addresses_id"]) : false;
$transport_code = (isset($_POST["transport_code"])) ? clean($_POST["transport_code"]) : false;

$error = array();

if (!$addresses_id) {
    array_push($error, '$addresses_id is mandatory');
}
if (!$transport_code) {
    array_push($error, '$transport_code is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (addresses_transport_search($transport_code)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = addresses_transport_add(
            $addresses_id, $transport_code, null
    );

    header("Location: index.php?c=addresses_transport&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/addresses_transport/views/index.php";   
include view("addresses_transport", "index");
