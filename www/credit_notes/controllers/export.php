<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
if (!credit_notes_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################
if (!credit_notes_field_id("*", $id)) {
    array_push($error, "id not exist");
}
//
################################################################################
if (!$error) {
    $credit_note = credit_notes_details($id);
    array_push($credit_note, credit_note_lines_list_by_credit_note_id($id));
    include view("credit_notes", "export");
} else {
    include view("home", "pageError");
}

