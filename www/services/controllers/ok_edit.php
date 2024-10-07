<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$category_code = (isset($_REQUEST["category_code"]) && $_REQUEST["category_code"] != "") ? clean($_REQUEST["category_code"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$service = (isset($_REQUEST["service"]) && $_REQUEST["service"] != "") ? clean($_REQUEST["service"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, 'Code is mandatory');
}
if (!$service) {
    array_push($error, 'Service is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!services_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!services_is_service($service)) {
    array_push($error, 'Service format error');
}
if (!services_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!services_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (services_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( services_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    services_edit(
            $id, $category_code, $code, $service, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=services");
            break;

        case 2:
            header("Location: index.php?c=services&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=services&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=services&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=services&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
