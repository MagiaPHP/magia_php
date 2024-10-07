<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$order_id = (isset($_POST["order_id"])) ? clean($_POST["order_id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
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

if (!orders_budgets_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    orders_budgets_edit(
            $id, $order_id, $budget_id, $date_registre, $order_by, $status
    );
    header("Location: index.php?c=orders_budgets&a=details&id=$id");
}

$orders_budgets = orders_budgets_details($id);

include view("orders_budgets", "index");
