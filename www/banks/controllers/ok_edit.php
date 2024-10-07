<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] != "") ? clean($_REQUEST["contact_id"]) : false;
$bank = (isset($_REQUEST["bank"]) && $_REQUEST["bank"] != "") ? clean($_REQUEST["bank"]) : false;
$account_number = (isset($_REQUEST["account_number"]) && $_REQUEST["account_number"] != "") ? clean($_REQUEST["account_number"]) : false;
$bic = (isset($_REQUEST["bic"]) && $_REQUEST["bic"] != "") ? clean($_REQUEST["bic"]) : false;
$iban = (isset($_REQUEST["iban"]) && $_REQUEST["iban"] != "") ? clean($_REQUEST["iban"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$codification = (isset($_REQUEST["codification"]) && $_REQUEST["codification"] != "") ? clean($_REQUEST["codification"]) : false;
$delimiter = (isset($_REQUEST["delimiter"]) && $_REQUEST["delimiter"] != "") ? clean($_REQUEST["delimiter"]) : false;
$date_format = (isset($_REQUEST["date_format"]) && $_REQUEST["date_format"] != "") ? clean($_REQUEST["date_format"]) : false;
$thousands_separator = (isset($_REQUEST["thousands_separator"]) && $_REQUEST["thousands_separator"] != "") ? clean($_REQUEST["thousands_separator"]) : false;
$decimal_separator = (isset($_REQUEST["decimal_separator"]) && $_REQUEST["decimal_separator"] != "") ? clean($_REQUEST["decimal_separator"]) : false;
$invoices = (isset($_REQUEST["invoices"]) && $_REQUEST["invoices"] != "") ? clean($_REQUEST["invoices"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$contact_id) {
    array_push($error, 'Contact_id is mandatory');
}
if (!$bank) {
    array_push($error, 'Bank is mandatory');
}
if (!$account_number) {
    array_push($error, 'Account_number is mandatory');
}
if (!$bic) {
    array_push($error, 'Bic is mandatory');
}
if (!$iban) {
    array_push($error, 'Iban is mandatory');
}
if (!$invoices) {
    array_push($error, 'Invoices is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!banks_is_contact_id($contact_id)) {
    array_push($error, 'Contact_id format error');
}
if (!banks_is_bank($bank)) {
    array_push($error, 'Bank format error');
}
if (!banks_is_account_number($account_number)) {
    array_push($error, 'Account_number format error');
}
if (!banks_is_bic($bic)) {
    array_push($error, 'Bic format error');
}
if (!banks_is_iban($iban)) {
    array_push($error, 'Iban format error');
}
if (!banks_is_invoices($invoices)) {
    array_push($error, 'Invoices format error');
}
if (!banks_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!banks_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if (banks_search_by_unique("id", "account_number", $account_number)) {
    array_push($error, 'Account_number already exists in data base');
}


if (banks_search_by_unique("id", "code", $code)) {
    array_push($error, 'Code already exists in data base');
}


//if( banks_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    banks_edit(
            $id, $contact_id, $bank, $account_number, $bic, $iban, $code, $codification, $delimiter, $date_format, $thousands_separator, $decimal_separator, $invoices, $order_by, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks");
            break;

        case 2:
            header("Location: index.php?c=banks&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=banks&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
