<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$service_code = (isset($_POST["service_code"]) && $_POST["service_code"] != "" && $_POST["service_code"] != "null" ) ? clean($_POST["service_code"]) : null;
$unite_code = (isset($_POST["unite_code"]) && $_POST["unite_code"] != "" && $_POST["unite_code"] != "null" ) ? clean($_POST["unite_code"]) : null;
$price = (isset($_POST["price"]) && $_POST["price"] != "" && $_POST["price"] != "null" ) ? clean($_POST["price"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = services_price_add(
            $service_code, $unite_code, $price, $order_by, $status
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
            // ejemplo index.php?c=services_price&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


