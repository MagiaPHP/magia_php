<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST["expense_id"]) && $_POST["expense_id"] != "" && $_POST["expense_id"] != "null" ) ? clean($_POST["expense_id"]) : false;
$every = (isset($_POST["every"]) && $_POST["every"] != "" && $_POST["every"] != "null" ) ? clean($_POST["every"]) : false;
$times = (isset($_POST["times"]) && $_POST["times"] != "" && $_POST["times"] != "null" ) ? clean($_POST["times"]) : false;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] != "" && $_POST["date_start"] != "null" ) ? clean($_POST["date_start"]) : false;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
//vardump($error);
//vardump($_POST);
//vardump(array(
//    $expense_id, $every, $times, $date_start, $date_end, $order_by, $status
//));
//die();

if (!$error) {
    $lastInsertId = expenses_frecuency_add(
            $expense_id, $every, $times, $date_start, $date_end, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=expenses_frecuency&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;
        ////////////////////////////////////////////////////////////////////////
        case 5:
            header("Location: index.php?c=expenses&a=add_50");
            break;

        default:
            header("Location: index.php?c=expenses_frecuency");
            break;
    }
} else {

    include view("home", "pageError");
}


