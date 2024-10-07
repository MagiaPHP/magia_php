<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$investment_id = (isset($_POST["investment_id"]) && $_POST["investment_id"] != "" && $_POST["investment_id"] != "null" ) ? clean($_POST["investment_id"]) : false;
$date = (isset($_POST["date"]) && $_POST["date"] != "" && $_POST["date"] != "null" ) ? clean($_POST["date"]) : false;
$value = (isset($_POST["value"]) && $_POST["value"] != "" && $_POST["value"] != "null" ) ? clean($_POST["value"]) : false;
$irf = (isset($_POST["irf"]) && $_POST["irf"] != "" && $_POST["irf"] != "null" ) ? clean($_POST["irf"]) : false;
$date_payment = (isset($_POST["date_payment"]) && $_POST["date_payment"] != "" && $_POST["date_payment"] != "null" ) ? clean($_POST["date_payment"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$investment_id) {
    array_push($error, '$investment_id is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$value) {
    array_push($error, '$value is mandatory');
}
if (!$irf) {
    array_push($error, '$irf is mandatory');
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
if (!investment_lines_is_investment_id($investment_id)) {
    array_push($error, '$investment_id format error');
}
if (!investment_lines_is_date($date)) {
    array_push($error, '$date format error');
}
if (!investment_lines_is_value($value)) {
    array_push($error, '$value format error');
}
if (!investment_lines_is_irf($irf)) {
    array_push($error, '$irf format error');
}
if (!investment_lines_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!investment_lines_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( investment_lines_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = investment_lines_add(
            $investment_id, $date, $value, $irf, $date_payment, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=investment_lines&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=investment_lines");
            break;
    }
} else {

    include view("home", "pageError");
}


