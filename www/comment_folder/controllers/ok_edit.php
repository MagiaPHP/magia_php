<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] != "" ) ? clean($_POST["doc_id"]) : false;
$folder = (isset($_POST["folder"]) && $_POST["folder"] != "" ) ? clean($_POST["folder"]) : false;
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
if (!comment_folder_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!comment_folder_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    comment_folder_edit(
            $id, $doc_id, $folder, $order_by, $status
    );
    header("Location: index.php?c=comment_folder&a=details&id=$id");
}

$comment_folder = comment_folder_details($id);

include view("comment_folder", "index");
