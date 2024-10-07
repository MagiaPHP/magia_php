<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$credit_note_id = (isset($_POST["credit_note_id"]) && $_POST["credit_note_id"] != "" ) ? clean($_POST["credit_note_id"]) : false;
$year = (isset($_POST["year"]) && $_POST["year"] != "" ) ? clean($_POST["year"]) : false;
$counter = (isset($_POST["counter"]) && $_POST["counter"] != "" ) ? clean($_POST["counter"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!credit_notes_counter_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!credit_notes_counter_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    credit_notes_counter_edit(
            $credit_note_id, $year, $counter
    );
    header("Location: index.php?c=credit_notes_counter&a=details&id=$id");
}

$credit_notes_counter = credit_notes_counter_details($id);

include view("credit_notes_counter", "index");
