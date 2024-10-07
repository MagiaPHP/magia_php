<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
include view("home", "disabled");
die();
$discount = (isset($_POST["discount"])) ? clean($_POST["discount"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

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

if (discounts_mode_search_by_unique("id", "discount", $discount)) {
    array_push($error, 'discount already exists in data base');
}



if (discounts_mode_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = discounts_mode_add(
            $discount, $order_by, $status
    );

    header("Location: index.php?c=discounts_mode&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/discounts_mode/views/index.php";   
include view("discounts_mode", "index");
