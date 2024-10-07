<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$quantity = (isset($_POST["quantity"])) ? clean($_POST["quantity"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$value = (isset($_POST["value"])) ? clean($_POST["value"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!credit_note_lines_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    credit_note_lines_edit(
            $id, $credit_note_id, $quantity, $description, $value, $tax
    );
    header("Location: index.php?c=credit_note_lines&a=details&id=$id");
}

$credit_note_lines = credit_note_lines_details($id);

include view("credit_note_lines", "index");
