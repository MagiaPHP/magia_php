<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$option = (isset($_REQUEST["option"]) && $_REQUEST["option"] != "") ? clean($_REQUEST["option"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$data = (isset($_REQUEST["data"]) && $_REQUEST["data"] != "") ? clean($_REQUEST["data"]) : false;
$group = (isset($_REQUEST["group"]) && $_REQUEST["group"] != "") ? clean($_REQUEST["group"]) : false;
$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] != "") ? clean($_REQUEST["controller"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();

################################################################################
# REQUIRED
################################################################################
if (!$option) {
    array_push($error, 'Option is mandatory');
}
if (!$data) {
    array_push($error, 'Data is mandatory');
}
//if (!$order_by) {
//    array_push($error, '$order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, '$status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!_options_is_option($option)) {
    array_push($error, '$option format error');
}
//if (!_options_is_data($data)) {
//    array_push($error, '$data format error');
//}
//if (!_options_is_order_by($order_by)) {
//    array_push($error, '$order_by format error');
//}
//if (!_options_is_status($status)) {
//    array_push($error, '$status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if (_options_search_by_unique("id", "option", $option)) {
//    array_push($error, 'option already exists in data base');
//}
//if( _options_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

//    $lastInsertId = _options_add(
//            $option, $description, $data, $group, $controller, $order_by, $status
//    );

    $lastInsertId = _options_push($option, $data);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=_options&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$c&a=$a&id=$id");
            break;

        case 5: // custom
            // ejemplo index.php?c=banks&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?c=_options");
            break;
    }
} else {

    include view("home", "pageError");
}


