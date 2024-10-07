<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
$api = null;
$api = api_list();
//
include view("api", "export_pdf");      
if ($debug) {
    include "www/api/views/debug.php";
}