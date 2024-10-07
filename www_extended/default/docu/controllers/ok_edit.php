<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$controllers = (isset($_REQUEST["controllers"]) && $_REQUEST["controllers"] != "") ? clean($_REQUEST["controllers"]) : false;
$father_id = (isset($_REQUEST["father_id"]) && $_REQUEST["father_id"] != "") ? clean($_REQUEST["father_id"]) : false;
$title = (isset($_REQUEST["title"]) && $_REQUEST["title"] != "") ? clean($_REQUEST["title"]) : false;
$post = (isset($_REQUEST["post"]) && $_REQUEST["post"] != "") ? ($_REQUEST["post"]) : false;
$h = (isset($_REQUEST["h"]) && $_REQUEST["h"] != "") ? clean($_REQUEST["h"]) : null;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$post) {
    array_push($error, '$post is mandatory');
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
if (!docu_is_title($title)) {
    array_push($error, '$title format error');
}
if (!docu_is_post($post)) {
    array_push($error, '$post format error');
}
if (!docu_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!docu_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( docu_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    docu_edit(
            $id, $controllers, $father_id, $title, $post, $h, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=docu&a=edit&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
