<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$services_price = null;
$services_price = services_price_list();
//
include view("services_price", "export_pdf");
if ($debug) {
    include "www/services_price/views/debug.php";
}