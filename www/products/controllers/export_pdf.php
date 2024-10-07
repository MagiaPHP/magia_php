<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products = null;
$products = products_list();
//
include view("products", "export_pdf");      
if ($debug) {
    include "www/products/views/debug.php";
}