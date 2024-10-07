<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_presentation = null;
$products_presentation = products_presentation_list();
//
include view("products_presentation", "export_pdf");      
if ($debug) {
    include "www/products_presentation/views/debug.php";
}