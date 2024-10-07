<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$plan = (isset($_REQUEST["plan"]) && $_REQUEST["plan"] != "") ? clean($_REQUEST["plan"]) : false;
$features = (isset($_REQUEST["features"]) && $_REQUEST["features"] != "") ? clean($_REQUEST["features"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] != "") ? clean($_REQUEST["price"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$plan) {
    array_push($error, '$plan is mandatory');
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
if (!subdomains_plan_is_plan($plan)) {
    array_push($error, '$plan format error');
}
if (!subdomains_plan_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!subdomains_plan_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (subdomains_plan_search_by_unique("id", "plan", $plan)) {
    array_push($error, 'plan already exists in data base');
}


//if( subdomains_plan_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    subdomains_plan_edit(
            $id, $plan, $features, $price, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=subdomains_plan&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
