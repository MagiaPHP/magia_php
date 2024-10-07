<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$newStatus = -10;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
if (!credit_notes_is_id($id)) {
    array_push($error, "ID format error");
}
################################################################################
# si la nc no existe, no puedo seguir 
if (!credit_notes_field_id("id", $id)) {
    array_push($error, "Credit not no exist");
}
# si la nc status = 20 // dinedo devuelto, ya no puedo cancelar
if (credit_notes_field_id("status", $id) == 20) {
    array_push($error, "The refund of the money has already been registered, you can no longer cancel this credit note");
}
# si la nc esta cancelada ya no puedo cancelar
if (credit_notes_field_id("status", $id) == -10) {
    array_push($error, "Credit note already canceled");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    credit_notes_change_status_to($id, $newStatus);

    header("Location: index.php?c=credit_notes&a=details&id=$id");
} else {

    include view("home", "pageError");
}


