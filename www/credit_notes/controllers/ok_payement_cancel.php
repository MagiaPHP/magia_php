<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = ( ($_GET["id"]) != "" ) ? clean($_GET["id"]) : false;

$error = array();

################################################################################

$credit_note_id = balance_field_id("credit_note_id", $id);

################################################################################
if (!$id) {
    array_push($error, '$id not send');
}
// si esta tr tiene cancel_code
if (balance_field_id("canceled_code", $id)) {
    array_push($error, 'Item already canceled');
}

################################################################################
################################################################################
if (!$error) {
    $cc = balance_next_cancel_code();
    balance_cancel($id, $cc);
    balance_set_cancel_code($id, $cc);

    if ($credit_note_id) {

        credit_notes_update_returned($credit_note_id, 0);

        credit_notes_change_status_to($credit_note_id, 10);
    }

    header("Location: index.php?c=credit_notes&a=details&id=$credit_note_id");
} else {

    include view("home", "pageError");
}

