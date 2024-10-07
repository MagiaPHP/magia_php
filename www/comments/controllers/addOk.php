<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
//$sender_id = (isset($_POST["sender_id"])) ? clean($_POST["sender_id"]) : false;
$sender_id = $u_id;
$doc = (isset($_POST["doc"])) ? clean($_POST["doc"]) : false;
$doc_id = (isset($_POST["doc_id"])) ? clean($_POST["doc_id"]) : false;
$comment = (isset($_POST["comment"])) ? clean($_POST["comment"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

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




#************************************************************************
// Busca si uya existe el texto en la BD


if (comments_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = comments_add(
            $date, $sender_id, $doc, $doc_id, $comment, $order_by, $status
    );

    header("Location: index.php?c=comments&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/comments/views/index.php";   
include view("comments", "index");
