<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$user_id = (isset($_REQUEST["user_id"]) && $_REQUEST["user_id"] != "" && $_REQUEST["user_id"] != "null" ) ? clean($_REQUEST["user_id"]) : $u_id;
//
$option = (isset($_REQUEST["option"]) && $_REQUEST["option"] != "" && $_REQUEST["option"] != "null" ) ? clean($_REQUEST["option"]) : false;
$data = (isset($_REQUEST["data"]) && $_REQUEST["data"] != "" && $_REQUEST["data"] != "null" ) ? clean($_REQUEST["data"]) : false;
//
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "" ) ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "" ) ? clean($_REQUEST["status"]) : 1;
//
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : 1;

$error = array();
################################################################################
# REQUIRED
################################################################################
//if (!$user_id) {
//    array_push($error, '$user_id is mandatory');
//}
if (!$option) {
    array_push($error, 'Option is mandatory');
}
if (!$data) {
    array_push($error, 'Data is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
//if (!user_options_is_user_id($user_id)) {
//    array_push($error, '$user_id format error');
//}
if (!user_options_is_option($option)) {
    array_push($error, 'Option format error');
}
if (!user_options_is_data($data)) {
    array_push($error, 'Data format error');
}
if (!user_options_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!user_options_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (!$error) {


    user_options_push_data(
            $u_id, $option, $data
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=user_options");
            break;

        case 2:
            header("Location: index.php?c=user_options&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=user_options&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=user_options&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=$redi[c]&a=$redi[a]]&$redi[params]]");
            break;

        case 6: // custom
            header("Location: index.php?c=my_info&a=change_colors");
            break;

        case 7: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


