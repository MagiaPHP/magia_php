<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Agrega el expense 
// Push contact like provider
// redirectiona a edit

$provider_id = ( $_REQUEST["provider_id"] != "" && $_REQUEST["provider_id"] != "null" ) ? clean($_REQUEST["provider_id"]) : null;
// si es multi vat
$office_id = ( $_REQUEST["office_id"] != "" && $_REQUEST["office_id"] != "null" ) ? clean($_REQUEST["office_id"]) : null;
//
$invoice_number = ( $_REQUEST["invoice_number"] != "" && $_REQUEST["invoice_number"] != "null" ) ? clean($_REQUEST["invoice_number"]) : null;
$date = ( $_REQUEST["date"] != "" && $_REQUEST["date"] != "null" ) ? clean($_REQUEST["date"]) : null;
$deadline = ( $_REQUEST["deadline"] != "" && $_REQUEST["deadline"] != "null" ) ? clean($_REQUEST["deadline"]) : null;
$total = ( $_REQUEST["total"] != "" && $_REQUEST["total"] != "null" ) ? clean($_REQUEST["total"]) : null;
$tax = ( $_REQUEST["tax"] != "" && $_REQUEST["tax"] != "null" ) ? clean($_REQUEST["tax"]) : null;
$my_ref = ( $_REQUEST["my_ref"] != "" && $_REQUEST["my_ref"] != "null" ) ? clean($_REQUEST["my_ref"]) : null;
$category_code = ( $_REQUEST["category_code"] != "" && $_REQUEST["category_code"] != "null" ) ? clean($_REQUEST["category_code"]) : null;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "null" && $_REQUEST["code"] != '' ) ? clean($_REQUEST["code"]) : false;
$add_lines = (isset($_REQUEST["add_lines"]) && $_REQUEST["add_lines"] != "null" && $_REQUEST["add_lines"] != '' ) ? clean($_REQUEST["add_lines"]) : false;
$redi = ($_REQUEST["redi"] != "" && $_REQUEST["redi"] != "null" ) ? clean($_REQUEST["redi"]) : 1;
$error = array();

if ($add_lines) {
    $redi['redi'] = 3;
}


// si este provider_id no es provehedor
// agregarlo
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// obligatorio
if (!$provider_id) {
    array_push($error, 'Contact id is mandatory');
}
// si es multi vat es obligatorio
if (IS_MULTI_VAT && !$office_id) {
    array_push($error, 'Office id is mandatory');
}

if (!$invoice_number) {
    array_push($error, 'Invoice number is mandatory');
}
// // fomato
// si no esta como provehdor lo registramos 
if (!providers_exists_company_id($provider_id)) {
    providers_add($provider_id, '', date('Y-m-d H:m:s'), null, 10, 1);
}

$provider_id = providers_exists_company_id($provider_id) ?? false;

if (!$provider_id) {
    array_push($error, "Could not register this contact as a provider, please contact the administrator");
}
// #############################################################################
// condiciones
// si la factura de este provehedor ya existe, error 
if (expenses_search_by_provider_invoice($provider_id, $invoice_number)) {
    array_push($error, 'This invoice number for this supplier already exists in the system');
}


################################################################################
################################################################################
################################################################################
if (!$error) {

    //$lastInsert = expenses_add_short($provider_id, 0);

    $lastInsert = expenses_add_largo(
            $office_id, $my_ref, $category_code, $invoice_number, $provider_id, $date, $deadline, $total, $tax
    );

    expenses_lines_add($lastInsert, null, $category_code, $code, 1, "Invoice $invoice_number", $total, 0, '%', $tax, 1, 1);

    expenses_update_total_tax($lastInsert, expenses_lines_totalHTVA($lastInsert), expenses_lines_totalTVA($lastInsert));

    switch ($redi['redi']) {
        case 1:
        case "1":
            header("Location: index.php?c=expenses&a=add_05#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$lastInsert#2");
            break;

        case 3:
            header("Location: index.php?c=expenses&a=edit&id=$lastInsert#3");
            break;

        default:
            header("Location: index.php");
            break;
    }
    
} else {
    include view("home", "pageError");
}

