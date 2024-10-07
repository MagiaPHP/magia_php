<?php

if (!permissions_has_permission($u_rol, 'expenses_lines', "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST["expense_id"]) && $_POST["expense_id"] != '') ? clean($_POST["expense_id"]) : false;
$budget_id = (isset($_POST["budget_id"]) && $_POST["budget_id"] != '') ? clean($_POST["budget_id"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != '') ? clean($_POST["code"]) : null;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] != '') ? clean($_POST["quantity"]) : 1;
$description = (isset($_POST["description"]) && $_POST["description"] != '') ? clean($_POST["description"]) : 'Item';
$separator = (isset($_POST["separator"]) && $_POST["separator"] != "") ? clean($_POST["separator"]) : false;
$note = (isset($_POST["note"]) && $_POST["note"] != "") ? clean($_POST["note"]) : false;
// || stripos($description, "---") !== FALSE
if ($separator) {
    $description = "---" . $description;
}

// || stripos($description, "***") !== FALSE
if ($note) {
    $description = "***" . $description;
}
//
$price = (($_POST["price"]) != '') ? clean($_POST["price"]) : 0.0;
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
// si no se envia el % es valor por defecto
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : '%';
$tax = (isset($_POST["tax"]) ) ? clean($_POST["tax"]) : null;

$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] != "" ) ? clean($_POST["category_code"]) : null;
if ($category_code == 'null') {
    $category_code = null;
}

$order_by = expenses_lines_next_order_by($expense_id) ?? 1;
$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : 1;

$redi = (isset($_POST["redi"]) ) ? ($_POST["redi"]) : 1;

$error = array();

if (!$expense_id) {
    array_push($error, '$expense_id is mandatory');
}
if (!$quantity) {
    array_push($error, '$quantity- is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
//if (!$price) {
//    //array_push($error, '$price is mandatory');
//}
//if (!$discounts) {
//    // array_push($error, '$discounts is mandatory');
//}
//if (!$tax) {
//    //array_push($error, '$tax is mandatory');
//}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
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

#************************************************************************
#************************************************************************
# PROCESO
# si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  
#************************************************************************
// Busca si uya existe el texto en la BD
//if (expense_lines_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
//
// Extrae los primeros xxx caracteres de la description 
################################################################################
// Formateo 
//$description = substr($description, 0, _options_option('config_expenses_description_maxlength')??250);
//$description = substr($description, 0, 250);
################################################################################
if (!$error) {



    expenses_lines_add(
            $expense_id, $budget_id, $category_code, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

    // actualizo el total del presupuesto 
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    ############################################################################
    ############################################################################
    ############################################################################


    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#1-$separator");
            break;

        case 5:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#5");
            break;

        default:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id");
            break;
    }
} else {
    include view("home", "pageError");
}    