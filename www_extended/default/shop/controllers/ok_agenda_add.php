<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = $u_id;
$title = (isset($_POST["title"]) && $_POST["title"] != "" && $_POST["title"] != "null" ) ? clean($_POST["title"]) : null;
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : null;
$category_id = (isset($_POST["category_id"]) && $_POST["category_id"] != "" && $_POST["category_id"] != "null" ) ? clean($_POST["category_id"]) : null;
$public_id = (isset($_POST["public_id"]) && $_POST["public_id"] != "" && $_POST["public_id"] != "null" ) ? clean($_POST["public_id"]) : null;
$allow_comments = (isset($_POST["allow_comments"]) && $_POST["allow_comments"] != "" ) ? clean($_POST["allow_comments"]) : 0;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] != "" ) ? clean($_POST["date_registre"]) : date("Y-m-d");
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 0;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$title) {
    array_push($error, '$title is mandatory');
}
//if (!$allow_comments) {
//    array_push($error, '$allow_comments is mandatory');
//}
//if (!$date_registre) {
//    array_push($error, '$date_registre is mandatory');
//}
//if (!$order_by) {
//    array_push($error, '$order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, '$status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
if (!agenda_is_contact_id($contact_id)) {
    array_push($error, '$contact_id format error');
}
if (!agenda_is_title($title)) {
    array_push($error, '$title format error');
}
//if (! agenda_is_allow_comments($allow_comments) ) {
//    array_push($error, '$allow_comments format error');
//}
//if (! agenda_is_date_registre($date_registre) ) {
//    array_push($error, '$date_registre format error');
//}
//if (! agenda_is_order_by($order_by) ) {
//    array_push($error, '$order_by format error');
//}
//if (! agenda_is_status($status) ) {
//    array_push($error, '$status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( agenda_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = agenda_add(
            $contact_id, $title, $description, $category_id, $public_id, $allow_comments, $date_registre, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;
        case 2:
            header("Location: index.php?c=shop&a=agenda_choose_place&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=agenda");
            break;
    }
} else {

    include view("home", "pageError");
}


