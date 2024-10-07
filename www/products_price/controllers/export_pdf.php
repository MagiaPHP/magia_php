<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_price = null;
$products_price = products_price_list();
//
include view("products_price", "export_pdf");      
if ($debug) {
    include "www/products_price/views/debug.php";
}