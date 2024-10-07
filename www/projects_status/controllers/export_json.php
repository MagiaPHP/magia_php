<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $projects_status = new Projects_status();
    $projects_status->setProjects_status($id);

    include view("projects_status", "export_json");
} else {
    include view("home", "pageError");
}    
