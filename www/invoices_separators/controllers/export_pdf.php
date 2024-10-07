<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$invoices_separators = null;
$invoices_separators = invoices_separators_list();
//
include view("invoices_separators", "export_pdf");
if ($debug) {
    include "www/invoices_separators/views/debug.php";
}