<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$feature = (isset($_POST["feature"]) && $_POST["feature"] != "" && $_POST["feature"] != "null" ) ? clean($_POST["feature"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$feature) {
    array_push($error, '$feature is mandatory');
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
if (!subdomains_features_is_feature($feature)) {
    array_push($error, '$feature format error');
}
if (!subdomains_features_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!subdomains_features_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (subdomains_features_search_by_unique("id", "feature", $feature)) {
    array_push($error, 'feature already exists in data base');
}


//if( subdomains_features_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = subdomains_features_add(
            $feature, $order_by, $status
    );

    switch ($redi[redi]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=subdomains_features&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=subdomains_features");
            break;
    }
} else {

    include view("home", "pageError");
}


