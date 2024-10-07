<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $forms_lines = new Forms_lines();
    $forms_lines->setForms_lines($id);

    include view("forms_lines", "export_json");
} else {
    include view("home", "pageError");
}    
