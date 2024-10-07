<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!credit_notes_status_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    credit_notes_status_edit(
            $id, $code, $status, $order_by
    );
    header("Location: index.php?c=credit_notes_status&a=details&id=$id");
}

$credit_notes_status = credit_notes_status_details($id);

include view("credit_notes_status", "index");
