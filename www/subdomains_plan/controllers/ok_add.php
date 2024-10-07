<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$plan = (isset($_POST["plan"]) && $_POST["plan"] != "" && $_POST["plan"] != "null" ) ? clean($_POST["plan"]) : false;
$features = (isset($_POST["features"]) && $_POST["features"] != "" && $_POST["features"] != "null" ) ? clean($_POST["features"]) : false;
$price = (isset($_POST["price"]) && $_POST["price"] != "" && $_POST["price"] != "null" ) ? clean($_POST["price"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = subdomains_plan_add(
            $plan, $features, $price, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=subdomains_plan&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=subdomains_plan");
            break;
    }
} else {

    include view("home", "pageError");
}


