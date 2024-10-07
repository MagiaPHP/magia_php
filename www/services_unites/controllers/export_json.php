<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $services_unites = new Services_unites();
    $services_unites->setServices_unites($id);

    include view("services_unites", "export_json");
} else {
    include view("home", "pageError");
}    
