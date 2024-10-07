<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;


$panel = (isset($_REQUEST["panel"]) && $_REQUEST["panel"] !="") ? clean($_REQUEST["panel"]) : false;

//
////$controller = (isset($_REQUEST["controller"]) && $_REQUEST["controller"] !="") ? clean($_REQUEST["controller"]) : false;
//$action = (isset($_REQUEST["action"]) && $_REQUEST["action"] !="") ? clean($_REQUEST["action"]) : false;
//$panel = (isset($_REQUEST["panel"]) && $_REQUEST["panel"] !="") ? clean($_REQUEST["panel"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
//if (!$controller) {
//    array_push($error, '$controller is mandatory');
//}
//if (!$action) {
//    array_push($error, '$action is mandatory');
//}
//if (!$panel) {
//    array_push($error, '$panel is mandatory');
//}
if ($order_by !== 0 && !is_int($order_by)) {
    array_push($error, '$order_by is mandatory');
}
if ($status !== 0 && !is_int($status)) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
//if (! panels_is_controller($controller) ) {
//    array_push($error, '$controller format error');
//}
//if (! panels_is_action($action) ) {
//    array_push($error, '$action format error');
//}
//if (! panels_is_panel($panel) ) {
//    array_push($error, '$panel format error');
//}
if (!panels_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!panels_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( panels_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    panels_changer_status(
            $id, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=panels");
            break;

        default:
            header("Location: index.php?c=panels&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
