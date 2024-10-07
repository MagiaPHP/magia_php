<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$investment_id = (isset($_REQUEST["investment_id"]) && $_REQUEST["investment_id"] != "") ? clean($_REQUEST["investment_id"]) : false;
$date = (isset($_REQUEST["date"]) && $_REQUEST["date"] != "") ? clean($_REQUEST["date"]) : false;
$value = (isset($_REQUEST["value"]) && $_REQUEST["value"] != "") ? clean($_REQUEST["value"]) : false;
$irf = (isset($_REQUEST["irf"]) && $_REQUEST["irf"] != "") ? clean($_REQUEST["irf"]) : false;
$date_payment = (isset($_REQUEST["date_payment"]) && $_REQUEST["date_payment"] != "") ? clean($_REQUEST["date_payment"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!$error) {

    investment_lines_edit(
            $id, $investment_id, $date, $value, $irf, $date_payment, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=investment_lines&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
