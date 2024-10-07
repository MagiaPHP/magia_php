<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$credit_note_id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;

// un array de presupuestos 
$array_credit_notes = array();

// agrego el presente presupuesto al array 
array_push($array_credit_notes, $credit_note_id);

$error = array();

################################################################################
if (!$credit_note_id) {
    array_push($error, '$credit_note_id not send');
}

if (!credit_notes_field_id("client_id", $credit_note_id)) {
    array_push($error, 'client_id not present in credit_note');
}

################################################################################
# // si el credit_note esta en status aceptado
if (credit_notes_field_id("status", $credit_note_id) == 30) {
    array_push($error, 'Budget already accepted');
}
// si esta Rechazado por el cliente 
if (credit_notes_field_id("status", $credit_note_id) == 40) {
    array_push($error, 'Budget already rejected');
}
// Si esta cancelado
if (credit_notes_field_id("status", $credit_note_id) == -10) {
    array_push($error, 'Budget already candeled');
}

# viene de un ORDER 
if (orders_credit_notes_search_order_by_credit_note($credit_note_id)) {
    array_push($error, 'This credit_note comes from an order, it cannot be canceled');
    array_push($error, 'First cancel the order');
}

################################################################################
################################################################################
if (!$error) {

    // Cambiamos de status a rechazado por el cliente 
    credit_notes_change_status_to($credit_note_id, 40);

    header("Location: index.php?c=credit_notes&a=details&id=$credit_note_id");
} else {
    include view("home", "pageError");
}    