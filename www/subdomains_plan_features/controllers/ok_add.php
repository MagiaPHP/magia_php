<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$plan = (isset($_POST["plan"]) && $_POST["plan"] != "" && $_POST["plan"] != "null" ) ? clean($_POST["plan"]) : false;
$feature = (isset($_POST["feature"]) && $_POST["feature"] != "" && $_POST["feature"] != "null" ) ? clean($_POST["feature"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$stattus = (isset($_POST["stattus"]) && $_POST["stattus"] != "" ) ? clean($_POST["stattus"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = subdomains_plan_features_add(
            $plan, $feature, $order_by, $stattus
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=subdomains_plan_features&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=subdomains_plan_features");
            break;
    }
} else {

    include view("home", "pageError");
}


