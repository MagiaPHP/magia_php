<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$institution_id = (isset($_REQUEST["institution_id"]) && $_REQUEST["institution_id"] != "") ? clean($_REQUEST["institution_id"]) : false;
$type = (isset($_REQUEST["type"]) && $_REQUEST["type"] != "") ? clean($_REQUEST["type"]) : false;
$operation = (isset($_REQUEST["operation"]) && $_REQUEST["operation"] != "") ? clean($_REQUEST["operation"]) : false;
$ref = (isset($_REQUEST["ref"]) && $_REQUEST["ref"] != "") ? clean($_REQUEST["ref"]) : false;
$amount = (isset($_REQUEST["amount"]) && $_REQUEST["amount"] != "") ? clean($_REQUEST["amount"]) : false;
$days = (isset($_REQUEST["days"]) && $_REQUEST["days"] != "") ? clean($_REQUEST["days"]) : false;
$rate = (isset($_REQUEST["rate"]) && $_REQUEST["rate"] != "") ? clean($_REQUEST["rate"]) : false;
$total = (isset($_REQUEST["total"]) && $_REQUEST["total"] != "") ? clean($_REQUEST["total"]) : false;
$retention = (isset($_REQUEST["retention"]) && $_REQUEST["retention"] != "") ? clean($_REQUEST["retention"]) : false;
$date_start = (isset($_REQUEST["date_start"]) && $_REQUEST["date_start"] != "") ? clean($_REQUEST["date_start"]) : false;
$date_end = (isset($_REQUEST["date_end"]) && $_REQUEST["date_end"] != "") ? clean($_REQUEST["date_end"]) : false;
$date_paiement = (isset($_REQUEST["date_paiement"]) && $_REQUEST["date_paiement"] != "") ? clean($_REQUEST["date_paiement"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!$error) {

    investments_edit(
            $id, $institution_id, $type, $operation, $ref, $amount, $days, $rate, $total, $retention, $date_start, $date_end, $date_paiement, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=investments&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
