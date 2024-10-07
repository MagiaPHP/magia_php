<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$services_unites = null;
$services_unites = services_unites_list();
//
include view("services_unites", "export_pdf");
if ($debug) {
    include "www/services_unites/views/debug.php";
}