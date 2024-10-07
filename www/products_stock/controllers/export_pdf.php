<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_stock = null;
$products_stock = products_stock_list();
//
include view("products_stock", "export_pdf");      
if ($debug) {
    include "www/products_stock/views/debug.php";
}