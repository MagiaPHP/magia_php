<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] != "" && $_POST["category_code"] != "null" ) ? clean($_POST["category_code"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : null;
$service = (isset($_POST["service"]) && $_POST["service"] != "" && $_POST["service"] != "null" ) ? clean($_POST["service"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
################################################################################
if (!$error) {
    $lastInsertId = services_add(
            $category_code, $code, $service, $order_by, $status
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
            // ejemplo index.php?c=services&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


