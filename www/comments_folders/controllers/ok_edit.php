<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" ) ? clean($_POST["name"]) : false;
$label = (isset($_POST["label"]) && $_POST["label"] != "" ) ? clean($_POST["label"]) : false;
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
if (!comments_folders_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!comments_folders_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    comments_folders_edit(
            $id, $name, $label, $order_by, $status
    );
    header("Location: index.php?c=comments_folders&a=details&id=$id");
}

$comments_folders = comments_folders_details($id);

include view("comments_folders", "index");
