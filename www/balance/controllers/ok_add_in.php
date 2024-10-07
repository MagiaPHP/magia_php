<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$client_id = (!empty($_POST["client_id"])) ? clean($_POST["client_id"]) : null;
$expense_id = (!empty($_POST["expense_id"])) ? clean($_POST["expense_id"]) : null;
$invoice_id = (!empty($_POST["invoice_id"])) ? clean($_POST["invoice_id"]) : null;
$credit_note_id = (!empty($_POST["credit_note_id"])) ? clean($_POST["credit_note_id"]) : null;
//$type = (!empty($_POST["type"])) ? clean($_POST["type"]) : false; //
$type = 1;  //ingresos
$account_number = (!empty($_POST["account_number"])) ? clean($_POST["account_number"]) : null;
///
$sub_total = (!empty($_POST["sub_total"])) ? clean($_POST["sub_total"]) : 0;
$tax = (!empty($_POST["tax"])) ? clean($_POST["tax"]) : 0;
//
//$total = (!empty($_POST["total"])) ? clean($_POST["total"]) : 0;
$total = $sub_total + $tax;

$ref = (!empty($_POST["ref"])) ? clean($_POST["ref"]) : '';
$description = (!empty($_POST["description"])) ? clean($_POST["description"]) : '';
$ce = (!empty($_POST["ce"])) ? clean($_POST["ce"]) : '';
$date = (!empty($_POST["date"])) ? clean($_POST["date"]) : null;
$date_registre = (!empty($_POST["date_registre"])) ? clean($_POST["date_registre"]) : null;
//$code = (!empty($_POST["code"])) ? clean($_POST["code"]) : false;
$code = magia_uniqid();
$canceled = (!empty($_POST["canceled"])) ? clean($_POST["canceled"]) : null;
$canceled_code = (!empty($_POST["canceled_code"])) ? clean($_POST["canceled_code"]) : null;
$redi = (!empty($_POST["redi"])) ? clean($_POST["redi"]) : null;

$error = array();

//if (!$client_id) {
//    array_push($error, '$client_id is mandatory');
//}
//if (!$type) {
//    array_push($error, '$type is mandatory');
//}
//if (!$account_number) {
//    array_push($error, '$account_number is mandatory');
//}
if (!$sub_total) {
    array_push($error, '$ sub_total is mandatory');
}
//if (!$tax) {
//    array_push($error, '$ tax is mandatory');
//}
//if (!$total) {
//    array_push($error, '$total is mandatory');
//}
//if (!$ref) {
//    array_push($error, '$ref is mandatory');
//}
//if (!$description) {
//    array_push($error, '$description is mandatory');
//}
//if (!$ce) {
//    array_push($error, '$ce is mandatory');
//}
//if (!$date) {
//    array_push($error, '$date is mandatory');
//}
//if (!$date_registre) {
//    array_push($error, '$date_registre is mandatory');
//}
if (!$code) {
    array_push($error, '$ code is mandatory');
}
//if (!$canceled) {
//    array_push($error, '$canceled is mandatory');
//}
//if (!$canceled_code) {
//    array_push($error, '$canceled_code is mandatory');
//}
#************************************************************************
// Busca si uya existe el texto en la BD


if (balance_search($canceled_code)) {
    //array_push($error, "That text with that context the database already exists");
}

//vardump($_POST);
//die(); 
################################################################################
################################################################################
################################################################################
if (!$error) {


    balance_add(
            $client_id, $expense_id, $invoice_id, $credit_note_id, $type, $account_number,
            $sub_total, $tax, $total, $ref, $description, $ce, $date, $date_registre, $code, $canceled,
            $canceled_code
    );

    $lastInsertId = balance_field_code('id', $code);

//    vardump(array( $client_id, $expense_id, $invoice_id, $credit_note_id, $type, $account_number, 
//            $sub_total, $tax, $total, $ref, $description, $ce, $date, $date_registre, $code, $canceled, 
//            $canceled_code));
//
//    vardump($lastInsertId);
//
//    die(); 


    switch ($redi) {
        case 1:
            header("Location: index.php?c=balance&a=details&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=balance");
            break;
    }
} else {


    include view("home", "pageError");
}