<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

// busco si este presupuesto tiene ya transporte agregado
// lista de codigos de las lineas del budget
$codes_by_lines = invoice_lines_list_code_by_invvoice_id($id);
$codes_transport = transport_list_code_by_status(1);
$code_transport_in_invoice = array_intersect($codes_by_lines, $codes_transport);

################################################################################
###############################################################################
# el id de la factura fue enviada?
if (!$id) {
    array_push($error, "ID Don't send");
}
################################################################################
# F O R M A T
$id = format_id($id); // formateo el id, pasandole solo a numeros enteros 
###############################################################################
# BUEN F O R M A T ?
if (!invoices_is_id($id)) {
    array_push($error, 'ID format error');
}

################################################################################
# Existe en la base de datos?
if (!invoices_field_id("id", $id)) {
    array_push($error, "id not exist");
}

################################################################################
if (!$error) {

    $invoices = invoices_details($id);

    $inv = new Invoices();

    $inv->setInvoice($id);

    // actualizo los totales
    $total = invoice_lines_totalHTVA($id);
    $tax = invoice_lines_totalTVA($id);
    invoices_update_total_tax($id, $total, $tax);

    $addresses_billing = json_decode($invoices['addresses_billing'], true);

    $addresses_delivery = json_decode($invoices['addresses_delivery'], true);

    //  vardump($inv->getLines());

    include view("invoices", "copy");
} else {

    include view("home", "pageError");
}
