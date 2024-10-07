<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//vardump($_POST); 
//die(); 
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : null;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : null;
$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (($_POST["description"]) != "") ? clean($_POST["description"]) : 'Item';

// es un separator
$separator = (($_POST["separator"]) != '') ? true : false;
// 
if ($separator) {
    $description = "---" . $description;
}
//
$price = ( isset($_POST["price"]) && $_POST["price"] != '') ? clean($_POST["price"]) : 0.0;
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : null;
$tax = (isset($_POST["tax"]) ) ? clean($_POST["tax"]) : null;
//$order_by = (isset($_POST["order_by"]) ) ? clean($_POST["order_by"]) : 1;
$order_by = expenses_lines_next_order_by($expense_id) ?? 1;
$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : null;

$error = array();

if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}
if (!$quantity) {
    array_push($error, 'Quantity is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
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
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
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
//if (expense_lines_search($status)) {
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

//    expenses_lines_add(
//            $expense_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
//    );

    expenses_lines_add(
            $expense_id, $budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

    // Esto me actualiza los totales en la factura
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    header("Location: index.php?c=expenses&a=edit&id=$expense_id#");
} else {

    include view("home", "pageError");
}
