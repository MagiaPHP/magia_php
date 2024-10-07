<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$date_registre) {
    array_push($error, '$date_registre is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (budgets_invoices_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = budgets_invoices_add(
            $budget_id, $invoice_id, $date_registre, $order_by, $status
    );

    header("Location: index.php?c=budgets_invoices&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/budgets_invoices/views/index.php";   
include view("budgets_invoices", "index");
