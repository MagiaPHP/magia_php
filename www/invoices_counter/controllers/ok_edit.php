<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$invoice_id = (isset($_POST["invoice_id"]) && $_POST["invoice_id"] != "" ) ? clean($_POST["invoice_id"]) : false;
$year = (isset($_POST["year"]) && $_POST["year"] != "" ) ? clean($_POST["year"]) : false;
$counter = (isset($_POST["counter"]) && $_POST["counter"] != "" ) ? clean($_POST["counter"]) : false;

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
if (!invoices_counter_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!invoices_counter_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {

    invoices_counter_edit(
            $invoice_id, $year, $counter
    );
    header("Location: index.php?c=invoices_counter&a=details&id=$id");
}

$invoices_counter = invoices_counter_details($id);

include view("invoices_counter", "index");
