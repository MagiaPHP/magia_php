<?php

/**
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// Agrega el expense 
// Push contact like provider
// redirectiona a edit

$provider_id = ( $_REQUEST["provider_id"] != "" && $_REQUEST["provider_id"] != "null" ) ? clean($_REQUEST["provider_id"]) : null;
$invoice_number = ( $_REQUEST["invoice_number"] != "" && $_REQUEST["invoice_number"] != "null" ) ? clean($_REQUEST["invoice_number"]) : null;
$add_lines = (isset($_REQUEST["add_lines"]) && $_REQUEST["add_lines"] != "null" && $_REQUEST["add_lines"] != '' ) ? clean($_REQUEST["add_lines"]) : false;
$redi = ($_REQUEST["redi"] != "" && $_REQUEST["redi"] != "null" ) ? clean($_REQUEST["redi"]) : 1;
$error = array();

if ($add_lines) {
    $redi['redi'] = 3;
}


//
// obligatorio
if (!$provider_id) {
    array_push($error, 'Provider is mandatory');
}
//
if (!$invoice_number) {
    array_push($error, 'Invoice number is mandatory');
}
// fomato ----------------------------------------------------------------------
if (!is_id($provider_id)) {
    array_push($error, 'Provider id format incorrect');
}
// condiciones
// si la factura con este provehedor existen d error 
if (expenses_search_by_provider_invoice($provider_id, $invoice_number)) {
    array_push($error, 'This invoice number for this supplier already exists in the system');
}
////////////////////////////////////////////////////////////////////////////////
if (!$error) {

    $lastInsert = expenses_add_short($provider_id, $invoice_number);

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
    //
    //
    //
    //
} else {
    include view("home", "pageError");
}

*/