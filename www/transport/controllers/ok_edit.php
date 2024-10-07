<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;
$code = (isset($_POST["code"]) && $_POST["code"] != "" ) ? clean($_POST["code"]) : false;
$name = (isset($_POST["name"]) && $_POST["name"] != "" ) ? clean($_POST["name"]) : false;
$price = (isset($_POST["price"]) && $_POST["price"] != "" ) ? clean($_POST["price"]) : false;
$tax = (isset($_POST["tax"]) && $_POST["tax"] != "" ) ? clean($_POST["tax"]) : false;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!transport_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!transport_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    transport_edit(
            $id, $code, $name, $price, $tax, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=transport&a=details&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
