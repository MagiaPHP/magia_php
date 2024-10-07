<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_origin = null;
$products_origin = products_origin_list();
//
include view("products_origin", "export_pdf");      
if ($debug) {
    include "www/products_origin/views/debug.php";
}