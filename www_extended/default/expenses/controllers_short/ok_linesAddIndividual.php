<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : null;
//
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : null;
$quantity = (($_POST["quantity"]) != "") ? clean($_POST["quantity"]) : 1;
$description = (($_POST["description"]) != "") ? clean($_POST["description"]) : 'Item';
$price = (($_POST["price"]) != '') ? clean($_POST["price"]) : 0.0;
$discounts = (($_POST["discounts"]) != "" ) ? clean($_POST["discounts"]) : 0;
$discounts_mode = (($_POST["discounts_mode"]) != "" ) ? clean($_POST["discounts_mode"]) : null;
$tax = ( isset($_POST["tax"]) && $_POST["tax"] != '' ) ? clean($_POST["tax"]) : null;
//
$order_by = expenses_lines_next_order_by($expense_id) ?? 1;
//
$status = (isset($_POST["status"]) ) ? clean($_POST["status"]) : 1;
// Factura mensual no normail
$type = "I"; // Mensual M, N, normal
// redirection
$redi = (isset($_POST["redi"]) ) ? clean($_POST["redi"]) : null;

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
    array_push($error, 'order_by is mandatory');
}
if (!$status) {
    array_push($error, 'status is mandatory');
}
#************************************************************************
#************************************************************************
# PROCESO
# El descuento no puede sobrepasar el limite superior fijado 
if ($discounts < 0) {
    array_push($error, 'The discount must be positive');
}
// el descuento no puede ser superior al limite fijado como maximo para los clientes 
//if ($discounts > _options_option("config_discounts_max_to_customer") && $discounts_mode == '%') {
//    array_push($error, 'The discount cannot exceed the limit autorized');
//}
# 
# # si hay descuento, el descuento mode hay 
//$discounts_mode = ( $discounts > 0)? $discounts_mode : null;  
#************************************************************************
// Busca si uya existe el texto en la BD
//if (expense_lines_search($status)) {
//    //array_push($error, "That text with that context the database already exists");
//}
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
if ($discounts_mode != "%" && $discounts > ($price * $quantity)) {
    array_push($error, 'The discount cannot exceed the price');
}

if ($discounts_mode == "%" && $discounts > 100) {
    array_push($error, 'The discount cannot exceed 100%');
}
################################################################################
# Si el cliente esta fuera de Belgica, 
# no se cobra el iva
// Paginade configuracion indivicual
//if (!$config_expenses_company_outside_pay_tax) {
//    // si no paga se pone a cero los impuestos
//    if (addresses_field_id('country', addresses_billing_by_contact_id(expenses_field_id('client_id', $expense_id))['id']) != "BE") {
//        $tax = 0;
//    }
//}
#
#
#
################################################################################

if (!$error) {

//    invoice_lines_add(
//            $expense_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
//    );

    expenses_lines_add(
            //$expense_id, $budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
            $expense_id, $budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
    );

//    expenses_update_type($expense_id, $type); // Normal o ensual
//    vardump(expense_lines_totalHTVA($expense_id)); 
//    vardump(expense_lines_totalTVA($expense_id)); 
//    die(); 
    // Esto me actualiza los totales en la factura
//    expenses_update_total_tax($expense_id, expense_lines_totalHTVA($expense_id), expense_lines_totalTVA($expense_id));
    // redirection 
    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#1");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#items_add");
            break;

        default:
            header("Location: index.php?c=expenses");
            break;
    }
} else {

    include view("home", "pageError");
}
