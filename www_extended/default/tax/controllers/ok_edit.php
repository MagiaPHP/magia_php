<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" ) ? clean($_POST["name"]) : false;
$value = (isset($_POST["value"]) && $_POST["value"] != "" ) ? clean($_POST["value"]) : false;
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
if (!tax_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!tax_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    tax_edit(
            $id, $name, $value, $order_by, $status
    );
    header("Location: index.php?c=tax&a=details&id=$id");
}

$tax = tax_details($id);

include view("tax", "index");
