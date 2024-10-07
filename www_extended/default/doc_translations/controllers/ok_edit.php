<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "" ) ? clean($_POST["doc_id"]) : false;
$language = (isset($_POST["language"]) && $_POST["language"] != "" ) ? clean($_POST["language"]) : false;
$title = (isset($_POST["title"]) && $_POST["title"] != "" ) ? clean($_POST["title"]) : false;
// se borra la edicion de html
//$body = (isset($_POST["body"]) && $_POST["body"] != "" ) ? clean($_POST["body"]) : false;
$body = (isset($_POST["body"]) && $_POST["body"] != "" ) ? ($_POST["body"]) : false;
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
if (!doc_translations_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!doc_translations_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

//    doc_translations_edit(
//            $id, $doc_id, $language, $title, $body, $order_by, $status
//    );


    doc_translations_edit_title_body($id, $title, $body);

    header("Location: index.php?c=doc_translations&a=details&id=$id");
}

$doc_translations = doc_translations_details($id);

include view("doc_translations", "index");
