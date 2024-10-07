<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$comment_id = (isset($_POST["comment_id"]) && $_POST["comment_id"] != "" ) ? clean($_POST["comment_id"]) : false;
$file = (isset($_POST["file"]) && $_POST["file"] != "" ) ? clean($_POST["file"]) : false;
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
if (!comments_files_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!comments_files_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    comments_files_edit(
            $id, $comment_id, $file, $order_by, $status
    );
    header("Location: index.php?c=comments_files&a=details&id=$id");
}

$comments_files = comments_files_details($id);

include view("comments_files", "index");
