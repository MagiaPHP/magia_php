<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_providers = null;
$products_providers = products_providers_list();
//
include view("products_providers", "export_pdf");      
if ($debug) {
    include "www/products_providers/views/debug.php";
}