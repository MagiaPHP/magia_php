<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$quantity = (isset($_POST["quantity"])) ? clean($_POST["quantity"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$value = (isset($_POST["value"])) ? clean($_POST["value"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;

$error = array();

if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
}
if (!$quantity) {
    array_push($error, '$quantity is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$value) {
    array_push($error, '$value is mandatory');
}
if (!$tax) {
    array_push($error, '$tax is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD
//
//if( credit_note_lines_search($tax)){
//    //array_push($error, "That text with that context the database already exists");
//}


if (!$error) {
    $lastInsertId = credit_note_lines_add(
            $credit_note_id, $quantity, $description, $value, $tax
    );

    header("Location: index.php?c=credit_note_lines&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/credit_note_lines/views/index.php";   
include view("credit_note_lines", "index");
