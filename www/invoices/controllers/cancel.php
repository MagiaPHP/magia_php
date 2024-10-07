<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################

if (!invoices_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!invoices_field_id("*", $id)) {
    array_push($error, "id not exist");
}

if (invoices_field_id("status", $id) < 0) {
    array_push($error, 'Invoice already cancel');
}

################################################################################
if (!$error) {
    $invoices = invoices_details($id);

//    vardump(balance_total_pay_by_invoice($id)); 

    include view("invoices", "cancel");
} else {

    include view("home", "pageError");
}
