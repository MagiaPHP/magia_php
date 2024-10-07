<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $banks_lines_check = new Banks_lines_check();
    $banks_lines_check->setBanks_lines_check($id);

    include view("banks_lines_check", "export_json");
} else {
    include view("home", "pageError");
}    
