<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$credit_note_id = (isset($_POST["credit_note_id"]) && $_POST["credit_note_id"] != "") ? clean($_POST["credit_note_id"]) : false;
$code = (isset($_POST["code"]) && $_POST["code"] != "") ? clean($_POST["code"]) : null;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] != "") ? clean($_POST["quantity"]) : 1;
$description = (isset($_POST["description"]) && $_POST["description"] != "") ? clean($_POST["description"]) : 'Item';
$price = (isset($_POST["price"]) && $_POST["price"] != '') ? clean($_POST["price"]) : 0.0;
$discounts = (isset($_POST["discounts"]) && $_POST["discounts"] != "") ? clean($_POST["discounts"]) : 0;
$discounts_mode = (isset($_POST["discounts_mode"]) && $_POST["discounts_mode"] != "") ? clean($_POST["discounts_mode"]) : null;
$tax = (isset($_POST["tax"]) && $_POST["tax"] != '') ? clean($_POST["tax"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "") ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : null;

$error = array();

if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
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
// si esta nota de credito viene de una factura no puede agregar lineas
if (credit_notes_field_id("invoice_id", $credit_note_id)) {
    array_push($error, 'This credit note comes from a cancel invoice, you cannot add items to it');
}



#************************************************************************
#************************************************************************
# PROCESO
# si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  
#************************************************************************
// Busca si uya existe el texto en la BD
//if (credit_note_lines_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($price) {
    $price = abs($price);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}

################################################################################
if (!$error) {

    credit_note_lines_add(
            $credit_note_id, $quantity, $description, $price, $tax
    );
    // actualizo el total de la nota de credito
    credit_notes_update_total_tax(
            $credit_note_id,
            credit_note_lines_totalHTVA($credit_note_id),
            credit_note_lines_totalTVA($credit_note_id)
    );

    header("Location: index.php?c=credit_notes&a=edit&id=$credit_note_id");
} else {
    include view("home", "pageError");
}    