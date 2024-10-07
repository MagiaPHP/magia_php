<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"])) ? clean($_REQUEST["cell_selected"]) : false;

$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : false;
$way = (isset($_REQUEST["way"])) ? clean($_REQUEST["way"]) : false;

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

if (!invoices_field_id("id", $id)) {
    array_push($error, "Invoice id not exist");
}

################################################################################
if (!$error) {

    $invoices = invoices_details($id);

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    include view("invoices", "export_pdf");
} else {

    include view("home", "pageError");
}
