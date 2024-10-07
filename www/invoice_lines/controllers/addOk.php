<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (($_POST["description"]) != "") ? clean($_POST["description"]) : 'Item';
$price = (isset($_POST["price"])) ? clean($_POST["price"]) : 0.0;
$discounts = (isset($_POST["discounts"])) ? clean($_POST["discounts"]) : 0;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : null;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : null;

$error = array();

if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$quantity) {
    array_push($error, '$quantity- is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$price) {
    //array_push($error, '$price is mandatory');
}
if (!$discounts) {
    // array_push($error, '$discounts is mandatory');
}
if (!$tax) {
    //array_push($error, '$tax is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD
//if (invoice_lines_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}


if (!$error) {
    invoice_lines_add(
            $invoice_id, $quantity, $description, $price, $discounts, $tax, $order_by, $status
    );

    header("Location: index.php?c=invoice&a=edit&id=$invoice_id");
} else {

    array_push($error, "Check your form");
}

//include "www/invoice_lines/views/index.php";   
include view("invoice_lines", "index");
