<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$invoice_id = (isset($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : false;
$client_id = (invoices_field_id("cliente_id", $invoice_id)) ? invoices_field_id("cliente_id", $invoice_id) : null;
$expense_id = null;

$credit_note_id = (invoices_field_id("credit_note_id", $invoice_id)) ? invoices_field_id("credit_note_id", $invoice_id) : null;

$type = ( isset($_POST["type"]) && ($_POST["type"]) !== '') ? clean($_POST["type"]) : 1;
$account_number = ( isset($_POST["account_number"]) && ($_POST["account_number"]) !== '') ? clean($_POST["account_number"]) : false;
$sub_total = ( isset($_POST["sub_total"]) && ($_POST["sub_total"]) != '') ? clean($_POST["sub_total"]) : 0.0;
$tax = ( isset($_POST["tax"]) && ($_POST["tax"]) != '') ? clean($_POST["tax"]) : 0.0;
$total = ( isset($_POST["total"]) && ($_POST["total"]) != '') ? clean($_POST["total"]) : 0.0;
$ref = ( isset($_POST["ref"]) && ($_POST["ref"]) != '') ? clean($_POST["ref"]) : '-';
$description = ( isset($_POST["description"]) && ($_POST["description"]) != '') ? clean($_POST["description"]) : "Invoice $invoice_id";
$ce = ( isset($_POST["ce"]) && ($_POST["ce"]) != '' ) ? clean($_POST["ce"]) : "+++123/456789/12+++";
$date_registre = ( isset($_POST["date_registre"]) && ($_POST["date_registre"]) != '') ? clean($_POST["date_registre"]) : null;
$canceled = ( isset($_POST["canceled"]) && ($_POST["canceled"]) != '') ? clean($_POST["canceled"]) : null;
$canceled_code = ( isset($_POST["canceled_code"]) && ($_POST["canceled_code"]) != '') ? clean($_POST["canceled_code"]) : null;

$error = array();

if (!$client_id) {
    array_push($error, '$client_id not send');
}
if (!$invoice_id) {
    array_push($error, '$invoice_id not send');
}
if (!$credit_note_id) {
    //array_push($error, '$credit_note_id is mandatory');
}
if (!$type) {
    array_push($error, '$type not send');
}
if (!$account_number) {
    array_push($error, '$account_number not send');
}
if ($sub_total) {
    //array_push($error, '$sub_total is mandatory');
}
if (!$tax) {
    //array_push($error, '$tax is mandatory');
}
if (!$total) {
    //array_push($error, '$total is mandatory');
}
if (!$ref) {
    array_push($error, '$ref not send');
}
if (!$description) {
    array_push($error, '$description not send');
}
if (!$ce) {
    array_push($error, '$ce not send');
}
if (!$date_registre) {
    //array_push($error, '$date_registre is mandatory');
}
if (!$canceled) {
    //array_push($error, '$canceled is mandatory');
}
if (!$canceled_code) {
    //array_push($error, '$canceled_code is mandatory');
}


//echo var_dump($error);
//die();
#************************************************************************
// Busca si uya existe el texto en la BD

if (!contacts_field_id("id", $client_id)) {
    array_push($error, '$client_id not exist');
}


if (balance_search($canceled_code)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = balance_add(
            $client_id, $expense_id, $invoice_id, $credit_note_id, $type, $account_number, $sub_total, $tax, $total, $ref, $description, $ce, $date_registre, $canceled, $canceled_code
    );

    header("Location: index.php?c=invoices&a=details&id=$invoice_id");
} else {
    include view("home", "pageError");
}

  