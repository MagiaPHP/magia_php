<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
//$id = (isset($_POST["id"]) && $_POST["id"] != "") ? clean($_POST["id"]) : false;
//$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !="") ? clean($_POST["contact_id"]) : false;
//$bank = (isset($_POST["bank"]) && $_POST["bank"] !="") ? clean($_POST["bank"]) : false;
$account_number = (isset($_POST["account_number"]) && $_POST["account_number"] != "") ? clean($_POST["account_number"]) : false;
$field = (isset($_POST["field"]) && $_POST["field"] != "") ? clean($_POST["field"]) : false;
$new_data = (isset($_POST["new_data"]) && $_POST["new_data"] != "") ? clean($_POST["new_data"]) : false;
//$bic = (isset($_POST["bic"]) && $_POST["bic"] !="") ? clean($_POST["bic"]) : false;
//$iban = (isset($_POST["iban"]) && $_POST["iban"] !="") ? clean($_POST["iban"]) : false;
//$code = (isset($_POST["code"]) && $_POST["code"] !="") ? clean($_POST["code"]) : false;
//$invoices = (isset($_POST["invoices"]) && $_POST["invoices"] !="") ? clean($_POST["invoices"]) : false;
//$status = (isset($_POST["status"]) && $_POST["status"] != "") ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;

$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$account_number) {
    array_push($error, 'Account number is mandatory');
}
if (!$field) {
    array_push($error, 'Field is mandatory');
}
if (!$new_data) {
    array_push($error, 'Field is mandatory');
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
//if (!$status == 1 && !$status == 0 ) {
//    array_push($error, 'Status is mandatory');
//}
###############################################################################
# FORMAT
###############################################################################
$id = banks_field_account_number('id', $account_number);
//vardump($id); 
//die(); 
//if (!banks_is_id($id)) {
//    array_push($error, 'Id format error');
//}
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
//if (!banks_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
switch ($field) {
    case 'codification':
    case 'delimiter':
    case 'date_format':
        break;

    default:
        array_push($error, 'Field name error');
        break;
}

if (banks_field_account_number('contact_id', $account_number) !== $u_owner_id) {
    array_push($error, "You can only manage accounts that are yours");
}
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
//vardump(array(
//    $id, $field, $new_data
//));
//die();

if (!$error) {

//    banks_update_status($id, $status); 
    banks_update_field($id, $field, $new_data);

//    vardump($_POST); 
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

        case 6: // custom
            // ejemplo index.php?c=banks&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#6");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
