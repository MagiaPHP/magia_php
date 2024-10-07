<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_presentation_names = null;
$products_presentation_names = products_presentation_names_list();
//
include view("products_presentation_names", "export_pdf");      
if ($debug) {
    include "www/products_presentation_names/views/debug.php";
}