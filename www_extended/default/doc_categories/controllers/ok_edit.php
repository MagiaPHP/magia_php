<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$category = (isset($_POST["category"]) && $_POST["category"] != "" ) ? clean($_POST["category"]) : false;
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
if (!doc_categories_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!doc_categories_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    doc_categories_edit(
            $id, $category, $order_by, $status
    );
    header("Location: index.php?c=doc_categories&a=details&id=$id");
}

$doc_categories = doc_categories_details($id);

include view("doc_categories", "index");
