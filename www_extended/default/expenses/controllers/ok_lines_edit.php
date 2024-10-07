<?php

if (!permissions_has_permission($u_rol, 'expenses_lines', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
$code = (isset($_REQUEST["code"])) ? clean($_REQUEST["code"]) : null;
$quantity = (int) (isset($_REQUEST["quantity"]) && $_REQUEST["quantity"] != '' ) ? clean($_REQUEST["quantity"]) : 1;
$description = (isset($_REQUEST["description"])) ? clean($_REQUEST["description"]) : '';
//
$separator = (isset($_REQUEST["separator"]) && $_REQUEST["separator"] != "") ? clean($_REQUEST["separator"]) : false;
$note = (isset($_REQUEST["note"]) && $_REQUEST["note"] != "") ? clean($_REQUEST["note"]) : false;
//
//
if ($separator) {
    $description = "---" . $description;
}

if ($note) {
    $description = "***" . $description;
}
//
$price = (float) (isset($_REQUEST["price"]) && $_REQUEST["price"] != '') ? clean($_REQUEST["price"]) : 0;
$discounts = (isset($_REQUEST["discounts"])) ? clean($_REQUEST["discounts"]) : 0;
$discounts_mode = (($_REQUEST["discounts_mode"]) != "" ) ? clean($_REQUEST["discounts_mode"]) : '%';
$tax = (isset($_REQUEST["tax"])) ? clean($_REQUEST["tax"]) : 0;
$category_code = (isset($_REQUEST["category_code"]) && $_REQUEST["category_code"] != 'null') ? clean($_REQUEST["category_code"]) : null;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != 'null') ? ($_REQUEST["redi"]) : 1;

$expense_id = expenses_lines_field_id("expense_id", $id);

$error = array();

if (!$id) {
    array_push($error, '$id is mandatory');
}
if (!$expense_id) {
    array_push($error, '$expense_id is mandatory');
}


#************************************************************************
if (!expenses_lines_is_id($id)) {
    array_push($error, "expense_id format error");
}

///////////////////////////////////////////////////////////////////////////////
if ($discounts_mode == "EUR" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "UNIT" && $discounts > $price) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}

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

//$description = substr($description, 0, _options_option('config_expenses_description_maxlength'));
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    expenses_lines_update(
            $id, $expense_id, $category_code, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax
    );

    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#1");
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