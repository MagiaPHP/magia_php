<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$discount = (isset($_POST["discount"])) ? clean($_POST["discount"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$discount) {
    array_push($error, '$discount is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (clients_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = clients_add(
            $contact_id, $date, $discount, $order_by, $status
    );

    header("Location: index.php?c=clients&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/clients/views/index.php";   
include view("clients", "index");
