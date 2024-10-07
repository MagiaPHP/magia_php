<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

if (!$error) {
    $backups = new Backups();
    $backups->setBackups($id);

    include view("backups", "export_json");
} else {
    include view("home", "pageError");
}    
