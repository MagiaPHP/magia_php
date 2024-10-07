<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$banks = null;
$banks = banks_list();
//
include view("banks", "export_pdf");
if ($debug) {
    include "www/banks/views/debug.php";
}