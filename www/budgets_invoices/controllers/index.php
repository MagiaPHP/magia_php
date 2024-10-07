<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$budgets_invoices = null;
$budgets_invoices = budgets_invoices_list(10, 5);

//include "www/budgets_invoices/views/index.php";
include view("budgets_invoices", "index");
if ($debug) {
    include "www/budgets_invoices/views/debug.php";
}