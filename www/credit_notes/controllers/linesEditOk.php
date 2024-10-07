<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : null;
$quantity = (isset($_POST["quantity"])) ? clean($_POST["quantity"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$value = (isset($_POST["value"])) ? clean($_POST["value"]) : false;
//$discounts      = (isset($_POST["discounts"])) ? clean($_POST["discounts"]) : false;
//$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : null;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$credit_note_id = credit_note_lines_field_id("credit_note_id", $id);
$error = array();

//
if (!$id) {
    array_push($error, '$id is mandatory');
}
//
if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
}
#************************************************************************
if (!credit_note_lines_is_id($id)) {
    array_push($error, "credit_note_id format error");
}
// si esta nota de credito viene de una factura no puede agregar lineas
if (credit_notes_field_id("invoice_id", $credit_note_id)) {
    array_push($error, 'This credit note comes from a invoice, you cannot edit items to it');
}
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($value) {
    $value = abs($value);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}
//
################################################################################
if (!$error) {

    credit_note_lines_edit(
            $id, $credit_note_id, $quantity, $description, $value, $tax
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