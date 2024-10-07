<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$feature = (isset($_REQUEST["feature"]) && $_REQUEST["feature"] != "") ? clean($_REQUEST["feature"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!$error) {

    subdomains_features_edit(
            $id, $feature, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=subdomains_features&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
