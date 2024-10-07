<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$products_groups = null;
$products_groups = products_groups_list();
//
include view("products_groups", "export_pdf");      
if ($debug) {
    include "www/products_groups/views/debug.php";
}