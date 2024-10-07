<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;

$error = array();

if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD

if (credit_notes_status_search_by_unique("id", "code", $code)) {
    array_push($error, 'code already exists in data base');
}



if (credit_notes_status_search($order_by)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = credit_notes_status_add(
            $code, $status, $order_by
    );

    header("Location: index.php?c=credit_notes_status&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/credit_notes_status/views/index.php";   
include view("credit_notes_status", "index");
