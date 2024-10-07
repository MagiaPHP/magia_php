<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$transport_code = (isset($_POST["transport_code"])) ? clean($_POST["transport_code"]) : null;
$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (($_POST["description"]) != "") ? clean($_POST["description"]) : 'Transport';

// es un separator
$separator = (($_POST["separator"]) != '') ? true : false;
// 
if ($separator) {
    $description = "---" . $description;
}
//
$price = (($_POST["price"]) != '') ? clean($_POST["price"]) : transport_field_code('price', $transport_code);
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : '%';
$tax = (isset($_POST["tax"]) ) ? clean($_POST["tax"]) : transport_field_code('tax', $transport_code);
;
//$order_by = (isset($_POST["order_by"]) ) ? clean($_POST["order_by"]) : 1;
$order_by = invoice_lines_next_order_by($invoice_id) ?? 1;
$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) ) ? clean($_POST["redi"]) : 1;

$error = array();

if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$quantity) {
    array_push($error, '$quantity- is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$price) {
    //array_push($error, '$price is mandatory');
}
if (!$discounts) {
    // array_push($error, '$discounts is mandatory');
}
if (!$tax) {
    //array_push($error, '$tax is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
#************************************************************************
# PROCESO
# si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  
// El statu de la factura
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
// Paso a valores positivos 
if ($quantity) {
    $quantity = abs($quantity);
}
if ($price) {
    $price = abs($price);
}
if ($discounts) {
    $discounts = abs($discounts);
}
if ($tax) {
    $tax = abs($tax);
}
#************************************************************************
// Busca si uya existe el texto en la BD
//if (invoice_lines_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    invoice_lines_add(
            $invoice_id, $transport_code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

    // Esto me actualiza los totales en la factura
    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    //
    //
    //
    //
    switch ($redi) {
        case 5:
            header("Location: index.php?c=invoices&a=details&id=$invoice_id#5");
            break;

        default:
            header("Location: index.php?c=invoices&a=edit&id=$invoice_id#items_add");
            break;
    }
} else {

    include view("home", "pageError");
}
