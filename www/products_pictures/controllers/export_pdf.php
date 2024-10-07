<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_pictures = null;
$products_pictures = products_pictures_list();
//
include view("products_pictures", "export_pdf");      
if ($debug) {
    include "www/products_pictures/views/debug.php";
}