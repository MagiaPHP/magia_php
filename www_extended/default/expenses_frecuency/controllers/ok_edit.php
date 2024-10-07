<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$expense_id = (isset($_REQUEST["expense_id"]) && $_REQUEST["expense_id"] != "") ? clean($_REQUEST["expense_id"]) : false;
$every = (isset($_REQUEST["every"]) && $_REQUEST["every"] != "") ? clean($_REQUEST["every"]) : false;
$times = (isset($_REQUEST["times"]) && $_REQUEST["times"] != "") ? clean($_REQUEST["times"]) : false;
$date_start = (isset($_REQUEST["date_start"]) && $_REQUEST["date_start"] != "") ? clean($_REQUEST["date_start"]) : false;
$date_end = (isset($_REQUEST["date_end"]) && $_REQUEST["date_end"] != "") ? clean($_REQUEST["date_end"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$expense_id) {
    array_push($error, '$expense_id is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!expenses_frecuency_is_expense_id($expense_id)) {
    array_push($error, '$expense_id format error');
}
if (!expenses_frecuency_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!expenses_frecuency_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( expenses_frecuency_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    expenses_frecuency_edit(
            $id, $expense_id, $every, $times, $date_start, $date_end, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=expenses_frecuency&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
