<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$credit_note_id = (isset($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : null;
$client_id = (credit_notes_field_id("client_id", $credit_note_id)) ? credit_notes_field_id("client_id", $credit_note_id) : null;
$expense_id = null;
// se anula el numero de factura al registrar un pago de  una nota de credito
//$invoice_id = (credit_notes_field_id("invoice_id", $credit_note_id)) ? credit_notes_field_id("invoice_id", $credit_note_id) : null;
$invoice_id = null;
$type = -1;
$account_number = ( isset($_POST["account_number"]) && ($_POST["account_number"]) !== '') ? clean($_POST["account_number"]) : null;
// sacar int de valores
// siempre positivos
$total = ( isset($_POST["total"]) && ($_POST["total"]) != '') ? abs(clean($_POST["total"])) : 0;
//
// Le paso a negativo
$sub_total = -(abs($total));

//$tax = ( isset($_POST["tax"]) && ($_POST["tax"]) != '') ? clean($_POST["tax"]) : 0 ;
$tax = 0;
$date = ( isset($_POST["date"]) && ($_POST["date"]) != '') ? clean($_POST["date"]) : date("Y-m-d");
$ref = ( isset($_POST["ref"]) && ($_POST["ref"]) != '') ? clean($_POST["ref"]) : '-';

$description = ( isset($_POST["description"]) && ($_POST["description"]) != '') ? clean($_POST["description"]) : "Credit note $credit_note_id";
$ce = "";
//$date_registre = ( isset($_POST["date_registre"]) && ($_POST["date_registre"]) != '') ? clean($_POST["date_registre"]) : null;
$date_registre = null;

$canceled = null;
$canceled_code = null;
$code = magia_uniqid();

$error = array();

################################################################################

if (!$credit_note_id) {
    array_push($error, 'Credit note id is mandatory');
}

if (!$date) {
    array_push($error, 'Date is mandatory');
}
if (!$ref) {
    array_push($error, 'Ref. is mandatory');
}
###############################################################################
// si ya existe una referencia en ese numero de cuenta
// ERROR 
if (balance_search_by_account_ref($account_number, $ref)) {
    array_push($error, 'This reference already exists in this account number');
}
#
# 
#************************************************************************
// Promedio de tax
//$average_tax = invoice_lines_average_tax($invoice_id) ;
//$total = ""; // 121%
//$tax = ($average_tax > 0 ) ? ($total * $average_tax) / ($average_tax + 100) : 0 ; // 21% 
//$sub_total = $total - $tax ;
###################################################################################
################################################################################
if (!$error) {


    balance_add(
            $client_id, $expense_id, $invoice_id, $credit_note_id, $type,
            $account_number, $sub_total, $tax, 0,
            $ref, $description, $ce, $date, $date_registre,
            $code, $canceled, $canceled_code
    );

    $lastInsertId = balance_field_code("id", $code);

    if ($lastInsertId) {
        // registro el pago en la nota d credito 
        credit_notes_update_returned($credit_note_id, ($total));

        // cambio de status
        credit_notes_change_status_to($credit_note_id, 20); // Money returned
    }



    header("Location: index.php?c=credit_notes&a=details&id=$credit_note_id#Payments");
} else {

    include view("home", "pageError");
}

