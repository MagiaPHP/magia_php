<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $services = new Services();
    $services->setServices($id);

    include view("services", "export_json");
} else {
    include view("home", "pageError");
}    
