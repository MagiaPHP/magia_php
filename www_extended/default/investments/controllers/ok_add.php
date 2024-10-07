<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$institution_id = (isset($_POST["institution_id"]) && $_POST["institution_id"] != "" && $_POST["institution_id"] != "null" ) ? clean($_POST["institution_id"]) : false;
$type = (isset($_POST["type"]) && $_POST["type"] != "" && $_POST["type"] != "null" ) ? clean($_POST["type"]) : false;
$operation = (isset($_POST["operation"]) && $_POST["operation"] != "" && $_POST["operation"] != "null" ) ? clean($_POST["operation"]) : false;
$ref = (isset($_POST["ref"]) && $_POST["ref"] != "" && $_POST["ref"] != "null" ) ? clean($_POST["ref"]) : false;
$amount = (isset($_POST["amount"]) && $_POST["amount"] != "" && $_POST["amount"] != "null" ) ? clean($_POST["amount"]) : false;
$days = (isset($_POST["days"]) && $_POST["days"] != "" && $_POST["days"] != "null" ) ? clean($_POST["days"]) : false;
$rate = (isset($_POST["rate"]) && $_POST["rate"] != "" && $_POST["rate"] != "null" ) ? clean($_POST["rate"]) : false;
$total = (isset($_POST["total"]) && $_POST["total"] != "" && $_POST["total"] != "null" ) ? clean($_POST["total"]) : null;
$retention = (isset($_POST["retention"]) && $_POST["retention"] != "" && $_POST["retention"] != "null" ) ? clean($_POST["retention"]) : null;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] != "" && $_POST["date_start"] != "null" ) ? clean($_POST["date_start"]) : false;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$institution_id) {
    array_push($error, '$institution_id is mandatory');
}
if (!$days) {
    array_push($error, '$days is mandatory');
}
if (!$rate) {
    array_push($error, '$rate is mandatory');
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
if (!investments_is_institution_id($institution_id)) {
    array_push($error, '$institution_id format error');
}
if (!investments_is_days($days)) {
    array_push($error, '$days format error');
}
if (!investments_is_rate($rate)) {
    array_push($error, '$rate format error');
}
if (!investments_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!investments_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( investments_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = investments_add(
            $institution_id, $type, $operation, $ref, $amount, $days, $rate, $total, $retention, $date_start, $date_end, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=investments&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=investments");
            break;
    }
} else {

    include view("home", "pageError");
}


