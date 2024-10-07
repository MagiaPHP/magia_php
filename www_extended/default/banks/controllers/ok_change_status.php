<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
//$contact_id = (isset($_REQUEST["contact_id"]) && $_REQUEST["contact_id"] !="") ? clean($_REQUEST["contact_id"]) : false;
//$bank = (isset($_REQUEST["bank"]) && $_REQUEST["bank"] !="") ? clean($_REQUEST["bank"]) : false;
//$account_number = (isset($_REQUEST["account_number"]) && $_REQUEST["account_number"] !="") ? clean($_REQUEST["account_number"]) : false;
//$bic = (isset($_REQUEST["bic"]) && $_REQUEST["bic"] !="") ? clean($_REQUEST["bic"]) : false;
//$iban = (isset($_REQUEST["iban"]) && $_REQUEST["iban"] !="") ? clean($_REQUEST["iban"]) : false;
//$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] !="") ? clean($_REQUEST["code"]) : false;
//$invoices = (isset($_REQUEST["invoices"]) && $_REQUEST["invoices"] !="") ? clean($_REQUEST["invoices"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;

$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;

$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
//if (!$bank) {
//    array_push($error, 'Bank is mandatory');
//}
//if (!$account_number) {
//    array_push($error, 'Account_number is mandatory');
//}
//if (!$bic) {
//    array_push($error, 'Bic is mandatory');
//}
//if (!$iban) {
//    array_push($error, 'Iban is mandatory');
//}
//if (!$invoices) {
//    array_push($error, 'Invoices is mandatory');
//}
if (!$status == 1 && !$status == 0) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!banks_is_id($id)) {
    array_push($error, 'Id format error');
}
//if (! banks_is_bank($bank) ) {
//    array_push($error, 'Bank format error');
//}
//if (! banks_is_account_number($account_number) ) {
//    array_push($error, 'Account_number format error');
//}
//if (! banks_is_bic($bic) ) {
//    array_push($error, 'Bic format error');
//}
//if (! banks_is_iban($iban) ) {
//    array_push($error, 'Iban format error');
//}
//if (! banks_is_invoices($invoices) ) {
//    array_push($error, 'Invoices format error');
//}
if (!banks_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( banks_search_by_unique("id","account_number", $account_number)){
//    array_push($error, 'Account_number already exists in data base');
//}
//
//
//if( banks_search_by_unique("id","code", $code)){
//    array_push($error, 'Code already exists in data base');
//}
//if( banks_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    banks_update_status($id, $status);

//    vardump($_REQUEST); 
//    die(); 

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
