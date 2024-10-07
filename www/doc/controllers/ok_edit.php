<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$category_id = (isset($_POST["category_id"]) && $_POST["category_id"] != "" ) ? clean($_POST["category_id"]) : false;
$title = (isset($_POST["title"]) && $_POST["title"] != "" ) ? clean($_POST["title"]) : false;
$body = (isset($_POST["body"]) && $_POST["body"] != "" ) ? clean($_POST["body"]) : false;
$title_icon = (isset($_POST["title_icon"]) && $_POST["title_icon"] != "" ) ? clean($_POST["title_icon"]) : false;
$sumary = (isset($_POST["sumary"]) && $_POST["sumary"] != "" ) ? clean($_POST["sumary"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!doc_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!doc_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    doc_edit(
            $id, $category_id, $title, $body, $title_icon, $sumary, $order_by, $status
    );
    header("Location: index.php?c=doc&a=details&id=$id");
}

$doc = doc_details($id);

include view("doc", "index");
