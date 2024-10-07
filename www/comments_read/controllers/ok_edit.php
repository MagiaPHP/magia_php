<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$order_id = (isset($_POST["order_id"]) && $_POST["order_id"] != "" ) ? clean($_POST["order_id"]) : false;
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" ) ? clean($_POST["contact_id"]) : false;
$date_read = (isset($_POST["date_read"]) && $_POST["date_read"] != "" ) ? clean($_POST["date_read"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!comments_read_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!comments_read_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    comments_read_edit(
            $id, $order_id, $contact_id, $date_read, $order_by, $status
    );
    header("Location: index.php?c=comments_read&a=details&id=$id");
}

$comments_read = comments_read_details($id);

include view("comments_read", "index");
