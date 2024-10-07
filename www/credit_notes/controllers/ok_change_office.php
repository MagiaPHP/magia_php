<?php

/**
 * Cambia la oficina a la cual pertenece ese documento 
 * 
 */
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (($_POST["id"]) != "" ) ? clean($_POST["id"]) : null;
$new_office_id = (($_POST["new_office_id"]) != "" ) ? clean($_POST["new_office_id"]) : null;

$error = array();

/**
 * NO SE PUEDE SI:
 * - Si una nota de credito viene de una factura anulada
 * - Si el estatus del documento no le permite 
 * - Se hay ya pagos realizados de este documentos 
 * 
 */
################################################################################
# Requerida
# Requerida
# Requerida
if (!$id) {
    array_push($error, 'Id is mandatory');
}
if (!$new_office_id) {
    array_push($error, 'New office_id is mandatory');
}
################################################################################
# formato
# formato
# formato
if (!credit_notes_is_id($id)) {
    array_push($error, 'Id format error');
}

if (!contacts_is_id($new_office_id)) {
    array_push($error, 'New office_id format error');
}
################################################################################
# condiciones
# condiciones
# condiciones

if (!credit_notes_can_be_edit($id)) {
    array_push($error, "Can not be edit");
}
# ------------------------------------------------------------------------------
//if (credit_notes_field_id('invoice_id', $id)) {
//    array_push($error, 'Credit note that comes from an invoice cannot change the customer');
//}

if ((int) (balance_total_total_by_credit_note($id))) {
    array_push($error, 'If there are payments made, you cannot change the holder of the credit note');
}

if (credit_notes_field_id('status', $id) != 10) {
    array_push($error, 'Only credit notes with registered status can change the recipient');
}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    credit_notes_update_office_id($id, $new_office_id);

    header("Location: index.php?c=credit_notes&a=edit&id=$id");
} else {

    include view("home", "pageError");
}

