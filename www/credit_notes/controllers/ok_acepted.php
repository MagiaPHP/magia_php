<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * id
 * cambio el status si
 *      creo la factura, 
 *      copio los items 
 * 
 * Registro el numero de devis y factura en credit_notes_credit_notes

 *      
 * 
 */
$credit_note_id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$createInvoice = (isset($_POST["createInvoice"]) && $_POST["createInvoice"] != "" ) ? clean($_POST["createInvoice"]) : null;
// saco el valor numerico por que me viene como texto 
$createInvoice = intval($createInvoice);

$new_credit_note_id = null;
$client_id = credit_notes_field_id("client_id", $credit_note_id);
$credit_noteMontlyRegistred = credit_notes_search_registre_by_cliente_id_type($client_id, "M");
// hay factura mensual abierta de este cliente?
$montlyInvoiceRegistred = (($credit_noteMontlyRegistred)) ? $credit_noteMontlyRegistred : false;
//vardump($credit_noteMontlyRegistred); 
//
//die(); 
$array_credit_notes = array();
array_push($array_credit_notes, $credit_note_id);
$key = magia_uniqid();

$error = array();

################################################################################
if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
}
if (!credit_notes_field_id("client_id", $credit_note_id)) {
    array_push($error, 'client_id not present in credit_note');
}
################################################################################
# // si el credit_note esta en status enviado o registrado
if (credit_notes_field_id("status", $credit_note_id) == 30) {
    array_push($error, 'Budget already accepted');
}
if (credit_notes_field_id("status", $credit_note_id) == 40) {
    array_push($error, 'Budget already rejected');
}
if (credit_notes_field_id("status", $credit_note_id) == -10) {
    array_push($error, 'Budget already candeled');
}
################################################################################
################################################################################
if (!$error) {

    if ($createInvoice) {
        // creo la factura copiando el credit_note
        // si ok, copio los items del credit_note a la factura 
        // cambio de estatus al credit_note
        credit_notes_copy_to_credit_note($credit_note_id, $key);

        $new_credit_note_id = credit_notes_field_code('id', $key);

        if ($new_credit_note_id) {
            // recojo cada uno de los busdgets_id que viene en el array y copio enuna sola factura 
            foreach ($array_credit_notes as $credit_note_id) {
                // copio los items de credit_note a credit_note
                credit_notes_copy_items_to_credit_note_items($credit_note_id, $new_credit_note_id);
            }

            credit_notes_update_ce($new_credit_note_id, generate_structured_communication($new_credit_note_id));
            credit_notes_credit_notes_add($credit_note_id, $new_credit_note_id, null, 1, 1);
            credit_notes_change_status_to($credit_note_id, 30);
        }
    } else {

        // sino simplemente cambio de status 
        credit_notes_change_status_to($credit_note_id, 30);
    }

    header("Location: index.php?c=credit_notes&a=details&id=$credit_note_id");
} else {

    include view("home", "pageError");
}    