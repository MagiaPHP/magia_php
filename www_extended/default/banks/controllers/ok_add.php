<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] != "" && $_POST["contact_id"] != "null" ) ? clean($_POST["contact_id"]) : null;
$bank = (isset($_POST["bank"]) && $_POST["bank"] != "" && $_POST["bank"] != "null" ) ? clean($_POST["bank"]) : null;
$account_number = (isset($_POST["account_number"]) && $_POST["account_number"] != "" && $_POST["account_number"] != "null" ) ? clean($_POST["account_number"]) : null;
$bic = (isset($_POST["bic"]) && $_POST["bic"] != "" && $_POST["bic"] != "null" ) ? clean($_POST["bic"]) : null;
$iban = (isset($_POST["iban"]) && $_POST["iban"] != "" && $_POST["iban"] != "null" ) ? clean($_POST["iban"]) : null;
//
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : magia_uniqid();
$codification = (isset($_POST["codification"]) && $_POST["codification"] != "" && $_POST["codification"] != "null" ) ? clean($_POST["codification"]) : null;
$delimiter = (isset($_POST["delimiter"]) && $_POST["delimiter"] != "" && $_POST["delimiter"] != "null" ) ? clean($_POST["delimiter"]) : null;
$date_format = (isset($_POST["date_format"]) && $_POST["date_format"] != "" && $_POST["date_format"] != "null" ) ? clean($_POST["date_format"]) : null;
$thousands_separator = (isset($_POST["thousands_separator"]) && $_POST["thousands_separator"] != "" && $_POST["thousands_separator"] != "null" ) ? clean($_POST["thousands_separator"]) : null;
$decimal_separator = (isset($_POST["decimal_separator"]) && $_POST["decimal_separator"] != "" && $_POST["decimal_separator"] != "null" ) ? clean($_POST["decimal_separator"]) : null;
$invoices = (isset($_POST["invoices"]) && $_POST["invoices"] != "" && $_POST["invoices"] != "null" ) ? clean($_POST["invoices"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" && $_POST["status"] != "null" ) ? clean($_POST["status"]) : 1;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
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
//if (!$bic) {
//    array_push($error, 'Bic is mandatory');
//}
//if (!$iban) {
//    array_push($error, 'Iban is mandatory');
//}
//if (!$invoices) {
//    array_push($error, 'Invoices is mandatory');
//}
//if (!$order_by) {
//    array_push($error, 'Order_by is mandatory');
//}
//if (!$status) {
//    array_push($error, 'Status is mandatory');
//}
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
//if (!banks_is_bic($bic)) {
//    array_push($error, 'Bic format error');
//}
//if (!banks_is_iban($iban)) {
//    array_push($error, 'Iban format error');
//}
//if (!banks_is_invoices($invoices)) {
//    array_push($error, 'Invoices format error');
//}
//if (!banks_is_order_by($order_by)) {
//    array_push($error, 'Order_by format error');
//}
//if (!banks_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################

if (banks_search_by_unique("id", "account_number", $account_number)) {
    array_push($error, 'Account_number already exists in data base');
}


//if (banks_search_by_unique("id", "code", $code)) {
//    array_push($error, 'Code already exists in data base');
//}
//if( banks_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = banks_add(
            $contact_id, $bank, $account_number, $bic, $iban, $code, $codification, $delimiter, $date_format, $thousands_separator, $decimal_separator, $invoices, $order_by, $status
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
            // ejemplo index.php?c=banks&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


