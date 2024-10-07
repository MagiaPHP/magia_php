<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


include view("home", "disabled");
die();

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$error = array();
################################################################################
if (!$c) {
    array_push($error, "Controller don't send");
}
if (!$a) {
    array_push($error, "Action don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a != "delete") {
    array_push($error, "Action error");
}

if (!budgets_invoices_is_id($id)) {
    array_push($error, 'Id format error ');
}
################################################################################
$budgets_invoices = budgets_invoices_details($id);

//include "www/budgets_invoices/views/delete.php"; 
include view("budgets_invoices", "delete");
