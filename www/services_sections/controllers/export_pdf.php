<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$services_sections = null;
$services_sections = services_sections_list();
//
include view("services_sections", "export_pdf");
if ($debug) {
    include "www/services_sections/views/debug.php";
}