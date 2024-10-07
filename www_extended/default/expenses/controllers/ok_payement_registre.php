<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Registra el pago de una expense

$invoice_id = null;
//

$use_banks_lines = (isset($_POST["use_banks_lines"])) ? clean($_POST["use_banks_lines"]) : 0;

$banks_lines_id = (isset($_POST["banks_lines_id"])) ? clean($_POST["banks_lines_id"]) : null;
//
$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : null;
//
$client_id = expenses_field_id("provider_id", $expense_id) ? expenses_field_id("provider_id", $expense_id) : null;
//
$credit_note_id = null;
$type = -1; // es un gasto
$account_number = ( isset($_POST["account_number"]) && ($_POST["account_number"]) !== '') ? clean($_POST["account_number"]) : null;
//$sub_total = ( isset($_POST["sub_total"]) && ($_POST["sub_total"]) != '') ? clean($_POST["sub_total"]) : 0.0;
//$tax = ( isset($_POST["tax"]) && ($_POST["tax"]) != '') ? clean($_POST["tax"]) : 0.0;
//Total siempre positivo 
$total = ( isset($_POST["total"]) && ($_POST["total"]) != '') ? (clean($_POST["total"])) : null;
// si viene del bank line ya viene negativo 
if (!$use_banks_lines) {
    $total = -($total);
}

//$total = 0;
$ref = ( isset($_POST["ref"]) && ($_POST["ref"]) != '') ? clean($_POST["ref"]) : '-';
//
$description = ( isset($_POST["description"]) && ($_POST["description"]) != '') ? clean($_POST["description"]) : "Expense $expense_id";
//$ce = ( isset($_POST["ce"]) && ($_POST["ce"]) != '' ) ? clean($_POST["ce"]) : expenses_field_id("ce", $expense_id);
$ce = ( isset($_POST["ce"]) && ($_POST["ce"]) != '' ) ? clean($_POST["ce"]) : '';
//$date_registre = ( isset($_POST["date_registre"]) && ($_POST["date_registre"]) != '') ? clean($_POST["date_registre"]) : null;

$date_operation = ( isset($_POST["date_operation"]) && ($_POST["date_operation"]) != '') ? clean($_POST["date_operation"]) : null; // getDate_operation

$redi = ( isset($_POST["redi"]) && ($_POST["redi"]) != '') ? ($_POST["redi"]) : 1;

$date_registre = null;
$canceled = null;
$canceled_code = null;
$code = magia_uniqid();

$error = array();

################################################################################
# O B L I G A T O R I O S
if ($use_banks_lines && !$banks_lines_id) {
    array_push($error, 'Banks lines id is mandatory');
}
if (!$expense_id) {
    array_push($error, 'Expense_id is mandatory');
}
if (!$client_id) {
    array_push($error, 'Client id is mandatory');
}
if (!$account_number) {
    array_push($error, 'Account number is mandatory');
}
if (!$date_operation) {
    array_push($error, 'Date operation is mandatory');
}
if (!$total) {
    array_push($error, 'Total is mandatory');
}
if (!$ref) {
    array_push($error, 'Ref. is mandatory');
}
################################################################################
# F O R M A T O
if ($use_banks_lines && !banks_lines_is_id($banks_lines_id)) {
    array_push($error, 'Banks lines id is mandatory');
}
//
if (!is_id($expense_id)) {
    array_push($error, 'Client id is mandatory');
}
//
if ($total > 0) {
    array_push($error, 'The amount must be negative');
}
// paso a positivo para hacer calculos mas facilmmente 
// paso a positivo para hacer calculos mas facilmmente 
// paso a positivo para hacer calculos mas facilmmente 
// paso a positivo para hacer calculos mas facilmmente 
// paso a positivo para hacer calculos mas facilmmente 
// paso a positivo para hacer calculos mas facilmmente 
// paso a positivo para hacer calculos mas facilmmente 
$total = abs($total);

################################################################################
# C h e q u o
// si existe una referencia con ese umero de cuenta no no anulada
// La referencia es el numero de operacio en los extractos del banco 
if (balance_search_by_account_ref($account_number, $ref)) {
    array_push($error, 'This reference already exists in this account number');
}

//$expense = new Expense(); 
//$expense->setExpenses($expense_id); 
//$expense->setLines(); 
// el pago no puede pasar del valor del documento 
// le pasamos a positivo para poder haer la resta 
//if ($total > ((expenses_field_id('total', $expense_id) + expenses_field_id('tax', $expense_id)) - abs(expenses_field_id('advance', $expense_id)))) {
//$expense = new Expense();
//$expense->setExpenses($expense_id);
//$expense->setLines();
// redondeamos a 2 despues de la decimal
if (abs($total) > round(((expenses_field_id('total', $expense_id) + expenses_field_id('tax', $expense_id)) - abs(expenses_field_id('advance', $expense_id))), 2)) {
    array_push($error, "The amount cannot be greater than the balance");
}
################################################################################
// Paso a valores positivos 
#************************************************************************
# 
#************************************************************************
// Promedio de tax
$average_tax = expenses_lines_average_tax($expense_id);
//$total = ""; // 121%
$tax = ($average_tax > 0 ) ? ($total * $average_tax) / ($average_tax + 100) : 0; // 21% 
//
$sub_total = $total - $tax;
################################################################################
################################################################################
//vardump($error);
//vardump($_POST);
//vardump(array(
//    $client_id, $expense_id, $invoice_id, $credit_note_id, $type,
//    $account_number, $sub_total, $tax, $total,
//    $ref, $description, $ce, $date, $date_registre,
//    $code, $canceled, $canceled_code
//));
if (!$error) {

    balance_add(
            $client_id, $expense_id, $invoice_id, $credit_note_id, $type,
            $account_number, -($sub_total), -($tax), -($total),
            $ref, $description, $ce, $date_operation, $date_registre,
            $code, $canceled, $canceled_code
    );

    $lastInsertId = balance_field_code("id", $code);

    if ($lastInsertId) {

        // todo lo de la balanza sumado actualizo en la expeses
        expenses_update_advance($expense_id, balance_total_total_by_expense($expense_id));

        // actualizo el status del documento 
        if (abs(expenses_get_advance($expense_id)) >= ( expenses_get_total($expense_id) + expenses_get_tax($expense_id))) {
            expenses_change_status_to($expense_id, 30);
        } else {
            expenses_change_status_to($expense_id, 20);
        }
        // Actualizo el status de banks_lines

        banks_lines_update_status($banks_lines_id, 100);
    }


    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#Payments");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#Payments");
            break;

        case 3:
            header("Location: index.php?c=expenses&a=details_payement&id=$expense_id");
            break;

        case 5: // custom
            // ejemplo index.php?c=yellow_pages&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?c=expenses&a=details&id=$expense_id#Payments");

            break;
    }
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}
