<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!budgets_invoices_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    budgets_invoices_edit(
            $id, $budget_id, $invoice_id, $date_registre, $order_by, $status
    );
    header("Location: index.php?c=budgets_invoices&a=details&id=$id");
}

$budgets_invoices = budgets_invoices_details($id);

include view("budgets_invoices", "index");
