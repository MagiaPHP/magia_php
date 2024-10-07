<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_extras = null;
$products_extras = products_extras_list();
//
include view("products_extras", "export_pdf");      
if ($debug) {
    include "www/products_extras/views/debug.php";
}