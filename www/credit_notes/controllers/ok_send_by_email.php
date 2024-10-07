<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$error = array();

if (!$id) {
    array_push($error, "ID Don't send");
}

if (!credit_notes_is_id($id)) {
    array_push($error, 'ID format error');
}


if (!credit_notes_field_id("*", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    include view("emails", "tmp_credit_noteSend");
} else {
    include view("home", "pageError");
}    