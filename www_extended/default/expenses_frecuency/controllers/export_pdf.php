<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$expenses_frecuency = null;
$expenses_frecuency = expenses_frecuency_list();
//
include view("expenses_frecuency", "export_pdf");
if ($debug) {
    include "www/expenses_frecuency/views/debug.php";
}