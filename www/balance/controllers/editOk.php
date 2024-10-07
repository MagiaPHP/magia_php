<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars


$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$client_id = (isset($_POST["client_id"])) ? clean($_POST["client_id"]) : false;
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

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!balance_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    balance_edit(
            $id, $client_id, $invoice_id, $credit_note_id, $type, $account_number, $sub_total, $tax, $total, $ref, $description, $ce, $date, $date_registre, $code, $canceled, $canceled_code
    );
    header("Location: index.php?c=balance&a=details&id=$id");
}

$balance = balance_details($id);

include view("balance", "index");
