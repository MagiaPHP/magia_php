<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_related = null;
$products_related = products_related_list();
//
include view("products_related", "export_pdf");      
if ($debug) {
    include "www/products_related/views/debug.php";
}