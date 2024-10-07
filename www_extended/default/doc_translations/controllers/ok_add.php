<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "") ? clean($_POST["doc_id"]) : false;
$language = (isset($_POST["language"]) && $_POST["language"] != "") ? clean($_POST["language"]) : false;
$title = (isset($_POST["title"]) && $_POST["title"] != "") ? clean($_POST["title"]) : false;
$body = (isset($_POST["body"]) && $_POST["body"] != "") ? clean($_POST["body"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "") ? clean($_POST["redi"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$doc_id) {
    array_push($error, '$doc_id is mandatory');
}
if (!$language) {
    array_push($error, '$language is mandatory');
}
if (!$title) {
    array_push($error, '$title is mandatory');
}
if (!$body) {
    array_push($error, '$body is mandatory');
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

if (doc_translations_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $lastInsertId = doc_translations_add(
            $doc_id, $language, $title, $body, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=doc_translations&a=edit&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=doc_translations&a=details&id=$lastInsertId");
            break;
    }
} else {

    include view("home", "pageError");
}


