<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$controllers = (isset($_POST["controllers"]) && $_POST["controllers"] != "" && $_POST["controllers"] != "null" ) ? clean($_POST["controllers"]) : null;
$action = (isset($_POST["action"]) && $_POST["action"] != "" && $_POST["action"] != "null" ) ? clean($_POST["action"]) : null;
$language = (isset($_POST["language"]) && $_POST["language"] != "" && $_POST["language"] != "null" ) ? clean($_POST["language"]) : null;

$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] != "" && $_POST["father_id"] != "null" ) ? clean($_POST["father_id"]) : null;

$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : false;
$post = (isset($_POST["post"]) && $_POST["post"] != "" && $_POST["post"] != "null" ) ? clean($_POST["post"]) : false;
//
$h = (isset($_POST["h"]) && $_POST["h"] != "" && $_POST["h"] != "null" ) ? clean($_POST["h"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$language) {
    array_push($error, '$language is mandatory');
}
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
if (!docu_is_language($language)) {
    array_push($error, '$language format error');
}
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
################################################################################
if (!$error) {
    $lastInsertId = docu_add(
            $controllers, $action, $language, $father_id, $title, $post, $h, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=docu");
            break;

        case 2:
            header("Location: index.php?c=docu&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=docu&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=docu&a=details&id=$lastInsertId");
            break;

        case 6: // custom
            header("Location: index.php?c=docu&a=edit&id=$lastInsertId");
            break;

        case 5: // custom
            header("Location: index.phpc=xxx&a=yyy");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


