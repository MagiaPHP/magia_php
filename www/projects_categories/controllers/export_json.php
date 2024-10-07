<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $projects_categories = new Projects_categories();
    $projects_categories->setProjects_categories($id);

    include view("projects_categories", "export_json");
} else {
    include view("home", "pageError");
}    
