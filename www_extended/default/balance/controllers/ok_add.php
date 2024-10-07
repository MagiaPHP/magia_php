<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$expense_id = (isset($_POST["expense_id"])) ? clean($_POST["expense_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : false;
$type = (isset($_POST["type"])) ? clean($_POST["type"]) : false;
$account_number = (isset($_POST["account_number"])) ? clean($_POST["account_number"]) : false;
$sub_total = (isset($_POST["sub_total"])) ? clean($_POST["sub_total"]) : false;
$tax = (isset($_POST["tax"])) ? clean($_POST["tax"]) : false;
$total = (isset($_POST["total"])) ? clean($_POST["total"]) : false;
$ref = (isset($_POST["ref"])) ? clean($_POST["ref"]) : false;
$description = (isset($_POST["description"])) ? clean($_POST["description"]) : false;
$ce = (isset($_POST["ce"])) ? clean($_POST["ce"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$date_registre = (isset($_POST["date_registre"])) ? clean($_POST["date_registre"]) : false;
$code = (isset($_POST["code"])) ? clean($_POST["code"]) : false;
$canceled = (isset($_POST["canceled"])) ? clean($_POST["canceled"]) : false;
$canceled_code = (isset($_POST["canceled_code"])) ? clean($_POST["canceled_code"]) : false;
//
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;
//
$error = array();
################################################################################

if (!$client_id) {
    array_push($error, '$client_id is mandatory');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id is mandatory');
}
if (!$credit_note_id) {
    array_push($error, '$credit_note_id is mandatory');
}
if (!$type) {
    array_push($error, '$type is mandatory');
}
if (!$account_number) {
    array_push($error, '$account_number is mandatory');
}
if (!$sub_total) {
    array_push($error, '$sub_total is mandatory');
}
if (!$tax) {
    array_push($error, '$tax is mandatory');
}
if (!$total) {
    array_push($error, '$total is mandatory');
}
if (!$ref) {
    array_push($error, '$ref is mandatory');
}
if (!$description) {
    array_push($error, '$description is mandatory');
}
if (!$ce) {
    array_push($error, '$ce is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$date_registre) {
    array_push($error, '$date_registre is mandatory');
}
if (!$code) {
    array_push($error, '$code is mandatory');
}
if (!$canceled) {
    array_push($error, '$canceled is mandatory');
}
if (!$canceled_code) {
    array_push($error, '$canceled_code is mandatory');
}
################################################################################
################################################################################
################################################################################
if ($expense_id) {
    $client_id = expenses_field_id('provider_id', $expense_id);
    $type = -1;
//    $sub_total = expenses_field_id('sub_total', $expense_id);
//    $tax = expenses_field_id('tax', $expense_id);
//    $total = expenses_field_id('total', $expense_id);
}
if ($invoice_id) {
    $client_id = invoices_field_id('client_id', $invoice_id);
    $type = 1;
}
if ($credit_note_id) {
    $client_id = credit_notes_field_id('client_id', $credit_note_id);
    $type = -1;
}
// Busca si uya existe el texto en la BD
if (balance_search($canceled_code)) {
    //array_push($error, "That text with that context the database already exists");
}
################################################################################
################################################################################
################################################################################


vardump(array(
    $client_id, $expense_id, $invoice_id,
    $credit_note_id, $type, $account_number,
    $sub_total, $tax, $total, $ref, $description,
    $ce, $date, $date_registre, $code,
    $canceled, $canceled_code
));

if (!$error) {
    $lastInsertId = balance_add(
            $client_id, $expense_id, $invoice_id,
            $credit_note_id, $type, $account_number,
            $sub_total, $tax, $total, $ref, $description,
            $ce, $date, $date_registre, $code,
            $canceled, $canceled_code
    );

    switch ($redi) {
        case 1:
            header("Location: index.php?c=balance&a=details&id=$lastInsertId");
            break;
        default:
            header("Location: index.php?c=balance");
            break;
    }
    //
    //
} else {

    array_push($error, "Check your form");
}

//include view("balance", "index");
