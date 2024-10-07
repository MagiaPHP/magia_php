<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$category_id = (isset($_POST["category_id"]) && $_POST["category_id"] != "") ? clean($_POST["category_id"]) : false;
$title = (isset($_POST["title"]) && $_POST["title"] != "") ? clean($_POST["title"]) : false;
$body = (isset($_POST["body"]) && $_POST["body"] != "") ? clean($_POST["body"]) : false;
$title_icon = (isset($_POST["title_icon"]) && $_POST["title_icon"] != "") ? clean($_POST["title_icon"]) : false;
$sumary = (isset($_POST["sumary"]) && $_POST["sumary"] != "") ? clean($_POST["sumary"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$category_id) {
    array_push($error, '$category_id is mandatory');
}
if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$body) {
    array_push($error, '$body is mandatory');
}
if (!$title_icon) {
    array_push($error, '$title_icon is mandatory');
}
if (!$sumary) {
    array_push($error, '$sumary is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
################################################################################
//
###############################################################################
# CONDICIONAL
################################################################################

if (doc_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = doc_add(
            $category_id, $title, $body, $title_icon, $sumary, $order_by, $status
    );

    header("Location: index.php?c=doc&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


