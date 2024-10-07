<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$credit_note_id = credit_note_lines_field_id("credit_note_id", $id);
$error = array();

if (!$id) {
    array_push($error, '$credit_note_id is mandatory');
}
// si esta nota de credito viene de una factura no puede agregar lineas
if (credit_notes_field_id("invoice_id", $credit_note_id)) {
    array_push($error, 'This credit note comes from a invoice, you cannot delete items to it');
}
#************************************************************************
if (!credit_note_lines_is_id($id)) {
    array_push($error, "Id format error");
}
//
################################################################################

if (!$error) {
    //
    credit_note_lines_delete(
            $id
    );
    // actualizo el total de la nota de credito
    credit_notes_update_total_tax(
            $credit_note_id,
            credit_note_lines_totalHTVA($credit_note_id),
            credit_note_lines_totalTVA($credit_note_id)
    );
    //
    header("Location: index.php?c=credit_notes&a=edit&id=$credit_note_id");
} else {
    include view("home", "pageError");
}    
