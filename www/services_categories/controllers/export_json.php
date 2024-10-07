<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $services_categories = new Services_categories();
    $services_categories->setServices_categories($id);

    include view("services_categories", "export_json");
} else {
    include view("home", "pageError");
}    
