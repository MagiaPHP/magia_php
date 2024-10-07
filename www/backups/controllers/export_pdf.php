<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$backups = null;
$backups = backups_list();
//
include view("backups", "export_pdf");      
if ($debug) {
    include "www/backups/views/debug.php";
}