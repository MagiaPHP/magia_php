<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$service_code = (isset($_REQUEST["service_code"]) && $_REQUEST["service_code"] != "") ? clean($_REQUEST["service_code"]) : false;
$unite_code = (isset($_REQUEST["unite_code"]) && $_REQUEST["unite_code"] != "") ? clean($_REQUEST["unite_code"]) : false;
$price = (isset($_REQUEST["price"]) && $_REQUEST["price"] != "") ? clean($_REQUEST["price"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$service_code) {
    array_push($error, 'Service_code is mandatory');
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
if (!services_price_is_service_code($service_code)) {
    array_push($error, 'Service_code format error');
}
if (!services_price_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!services_price_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( services_price_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    services_price_edit(
            $id, $service_code, $unite_code, $price, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=services_price");
            break;

        case 2:
            header("Location: index.php?c=services_price&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=services_price&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=services_price&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=services_price&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
