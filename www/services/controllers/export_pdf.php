<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$services = null;
$services = services_list();
//
include view("services", "export_pdf");
if ($debug) {
    include "www/services/views/debug.php";
}