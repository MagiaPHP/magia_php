<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$plan = (isset($_REQUEST["plan"]) && $_REQUEST["plan"] != "") ? clean($_REQUEST["plan"]) : false;
$feature = (isset($_REQUEST["feature"]) && $_REQUEST["feature"] != "") ? clean($_REQUEST["feature"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$stattus = (isset($_REQUEST["stattus"]) && $_REQUEST["stattus"] != "") ? clean($_REQUEST["stattus"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$plan) {
    array_push($error, '$plan is mandatory');
}
if (!$feature) {
    array_push($error, '$feature is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$stattus) {
    array_push($error, '$stattus is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!subdomains_plan_features_is_plan($plan)) {
    array_push($error, '$plan format error');
}
if (!subdomains_plan_features_is_feature($feature)) {
    array_push($error, '$feature format error');
}
if (!subdomains_plan_features_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!subdomains_plan_features_is_stattus($stattus)) {
    array_push($error, '$stattus format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( subdomains_plan_features_search($stattus)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    subdomains_plan_features_edit(
            $id, $plan, $feature, $order_by, $stattus
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=subdomains_plan_features&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
