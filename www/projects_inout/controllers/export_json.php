<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $projects_inout = new Projects_inout();
    $projects_inout->setProjects_inout($id);

    include view("projects_inout", "export_json");
} else {
    include view("home", "pageError");
}    
