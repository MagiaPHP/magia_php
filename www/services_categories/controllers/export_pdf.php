<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$services_categories = null;
$services_categories = services_categories_list();
//
include view("services_categories", "export_pdf");
if ($debug) {
    include "www/services_categories/views/debug.php";
}