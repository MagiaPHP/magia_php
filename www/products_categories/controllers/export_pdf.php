<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_categories = null;
$products_categories = products_categories_list();
//
include view("products_categories", "export_pdf");      
if ($debug) {
    include "www/products_categories/views/debug.php";
}