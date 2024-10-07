<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $services_sections = new Services_sections();
    $services_sections->setServices_sections($id);

    include view("services_sections", "export_json");
} else {
    include view("home", "pageError");
}    
