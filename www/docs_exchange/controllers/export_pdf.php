<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$docs_exchange = null;
$docs_exchange = docs_exchange_list();
//
include view("docs_exchange", "export_pdf");      
if ($debug) {
    include "www/docs_exchange/views/debug.php";
}