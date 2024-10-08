<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;

$error = array();
################################################################################
if (!$c) {
    array_push($error, "Controller don't send");
}
if (!$a) {
    array_push($error, "Action don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################

if ($a != "deleteOk") {
    array_push($error, "Action error");
}

if (!credit_notes_status_is_id($id)) {
    array_push($error, 'Id format error');
}
################################################################################

if (!$error) {

    credit_notes_status_delete(
            $id
    );

    header("Location: index.php?c=credit_notes_status");
}

include view("credit_notes_status", "delete");
