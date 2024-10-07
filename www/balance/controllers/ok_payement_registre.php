<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Registra un pago 
$expense_id = (isset($_POST["expense_id"]) && $_POST["expense_id"] != '' ) ? clean($_POST["expense_id"]) : false;
$invoice_id = (isset($_POST["invoice_id"]) && $_POST["invoice_id"] != '') ? clean($_POST["invoice_id"]) : false;
$credit_note_id = (isset($_POST["credit_note_id"]) && $_POST["credit_note_id"] != '') ? clean($_POST["credit_note_id"]) : false;

$error = array();

################################################################################
################################################################################
# F O R M A T O
if (!is_id($expense_id)) {
    array_push($error, '$expense_id format error');
}
if (!is_id($invoice_id)) {
    array_push($error, 'invoice_id format error');
}
if (!is_id($credit_note_id)) {
    array_push($error, '$credit_note_id format error');
}

if (!$expense_id || !$invoice_id || !$credit_note_id) {
    array_push($error, 'e, i, cn, is mandatory');
}

vardump($_POST);
die();

################################################################################
if (!$error) {


    vardump(__LINE__);

    if ($expense_id) {
        include "ok_payement_expense_registre.php";
        vardump(__LINE__);
    }

    if ($invoice_id) {
        include "ok_payement_invoice_registre;php";
        vardump(__LINE__);
    }

    if ($credit_note_id) {
        include "ok_payement_credit_note_registre.php";
        vardump(__LINE__);
    }

    vardump(__LINE__);

    vardump($invoice_id);

//    switch ($redi) {
//        case 1: 
//            header("Location: index.php?c=balance");
//            break;
//
//        default:
//            header("Location: index.php?c=home");
//            break;
//    }
} else {

    include view("home", "pageError");
}
