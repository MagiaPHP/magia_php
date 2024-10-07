<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

$budgets_invoices = null;

$budgets_invoices = budgets_invoices_list();

//include "www/budgets_invoices/views/export_json.php";
include view("budgets_invoices", "export_json");
if ($debug) {
    include "www/budgets_invoices/views/debug.php";
}