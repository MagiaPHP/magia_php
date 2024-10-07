<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$controller = (isset($_POST["controller"]) && $_POST["controller"] != "" ) ? clean($_POST["controller"]) : false;
$comments = (isset($_POST["comments"]) && $_POST["comments"] != "" ) ? clean($_POST["comments"]) : false;
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
if (!docs_comments_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!docs_comments_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    docs_comments_edit(
            $id, $controller, $comments, $order_by, $status
    );
    header("Location: index.php?c=docs_comments&a=details&id=$id");
}

$docs_comments = docs_comments_details($id);

include view("docs_comments", "index");
