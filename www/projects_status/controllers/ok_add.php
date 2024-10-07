<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" && $_POST["name"] != "null" ) ? clean($_POST["name"]) : false;
$icon = (isset($_POST["icon"]) && $_POST["icon"] != "" && $_POST["icon"] != "null" ) ? clean($_POST["icon"]) : false;
$color = (isset($_POST["color"]) && $_POST["color"] != "" && $_POST["color"] != "null" ) ? clean($_POST["color"]) : false;
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
if (!$name) {
    array_push($error, 'Name is mandatory');
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
if (!projects_status_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!projects_status_is_name($name)) {
    array_push($error, 'Name format error');
}
if (!projects_status_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!projects_status_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (projects_status_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( projects_status_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = projects_status_add(
            $code, $name, $icon, $color, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=projects_status");
            break;

        case 2:
            header("Location: index.php?c=projects_status&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=projects_status&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=projects_status&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=projects_status&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


