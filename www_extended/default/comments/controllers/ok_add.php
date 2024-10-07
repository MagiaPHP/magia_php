<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$date = date('Y-m-d');
$sender_id = (isset($_POST["sender_id"]) && $_POST["sender_id"] != "") ? clean($_POST["sender_id"]) : false;
$doc = (isset($_POST["doc"]) && $_POST["doc"] != "") ? clean($_POST["doc"]) : false;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "") ? clean($_POST["doc_id"]) : false;
$comment = (isset($_POST["comment"]) && $_POST["comment"] != "") ? clean($_POST["comment"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;

$error = array();
################################################################################
# REQUERIDO
################################################################################
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$sender_id) {
    array_push($error, '$sender_id is mandatory');
}
if (!$doc) {
    array_push($error, '$doc is mandatory');
}
if (!$doc_id) {
    array_push($error, '$doc_id is mandatory');
}
if (!$comment) {
    array_push($error, '$comment is mandatory');
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

if (comments_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = comments_add(
            date('Y-m-d'), $sender_id, $doc, $doc_id, $comment, $order_by, $status
    );

    header("Location: index.php?c=comments&a=details&id=$lastInsertId");
} else {

    include view("home", "pageError");
}


