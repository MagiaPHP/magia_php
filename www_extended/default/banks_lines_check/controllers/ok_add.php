<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$file_name = (isset($_POST["file_name"]) && $_POST["file_name"] != "" && $_POST["file_name"] != "null" ) ? clean($_POST["file_name"]) : false;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? ($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
foreach ($_POST['lines'] as $key => $line) {

    $my_account = (isset($line["my_account"]) && $line["my_account"] != "" && $line["my_account"] != "null" ) ? clean($line["my_account"]) : null;
    $operation = (isset($line["operation"]) && $line["operation"] != "" && $line["operation"] != "null" ) ? clean($line["operation"]) : null;
    $date_operation = (isset($line["date_operation"]) && $line["date_operation"] != "" && $line["date_operation"] != "null" ) ? clean($line["date_operation"]) : null;
    $description = (isset($line["description"]) && $line["description"] != "" && $line["description"] != "null" ) ? clean($line["description"]) : '';
    $type = (isset($line["type"]) && $line["type"] != "" && $line["type"] != "null" ) ? clean($line["type"]) : null;
    $total = (isset($line["total"]) && $line["total"] != "" && $line["total"] != "null" ) ? clean($line["total"]) : null;
    $currency = (isset($line["currency"]) && $line["currency"] != "" && $line["currency"] != "null" ) ? clean($line["currency"]) : null;
    $date_value = (isset($line["date_value"]) && $line["date_value"] != "" && $line["date_value"] != "null" ) ? clean($line["date_value"]) : null;
    $account_sender = (isset($line["account_sender"]) && $line["account_sender"] != "" && $line["account_sender"] != "null" ) ? clean($line["account_sender"]) : null;
    $sender = (isset($line["sender"]) && $line["sender"] != "" && $line["sender"] != "null" ) ? clean($line["sender"]) : null;
    $comunication = (isset($line["comunication"]) && $line["comunication"] != "" && $line["comunication"] != "null" ) ? clean($line["comunication"]) : null;
    $ce = (isset($line["ce"]) && $line["ce"] != "" && $line["ce"] != "null" ) ? clean($line["ce"]) : null;
    $details = (isset($line["details"]) && $line["details"] != "" && $line["details"] != "null" ) ? clean($line["details"]) : null;
    $message = (isset($line["message"]) && $line["message"] != "" && $line["message"] != "null" ) ? clean($line["message"]) : null;

    $id_office = (isset($line["id_office"]) && $line["id_office"] != "" && $line["id_office"] != "null" ) ? clean($line["id_office"]) : null;
    $office_name = (isset($line["office_name"]) && $line["office_name"] != "" && $line["office_name"] != "null" ) ? clean($line["office_name"]) : null;
    $value_bankCheck_transaction = (isset($line["value_bankCheck_transaction"]) && $line["value_bankCheck_transaction"] != "" && $line["value_bankCheck_transaction"] != "null" ) ? clean($line["value_bankCheck_transaction"]) : null;
    $countable_balance = (isset($line["countable_balance"]) && $line["countable_balance"] != "" && $line["countable_balance"] != "null" ) ? clean($line["countable_balance"]) : null;
    $suffix_account = (isset($line["suffix_account"]) && $line["suffix_account"] != "" && $line["suffix_account"] != "null" ) ? clean($line["suffix_account"]) : null;
    $sequential = (isset($line["sequential"]) && $line["sequential"] != "" && $line["sequential"] != "null" ) ? clean($line["sequential"]) : null;
    $available_balance = (isset($line["available_balance"]) && $line["available_balance"] != "" && $line["available_balance"] != "null" ) ? clean($line["available_balance"]) : null;
    $debit = (isset($line["debit"]) && $line["debit"] != "" && $line["debit"] != "null" ) ? clean($line["debit"]) : null;
    $credit = (isset($line["credit"]) && $line["credit"] != "" && $line["credit"] != "null" ) ? clean($line["credit"]) : null;

    $ref = (isset($line["ref"]) && $line["ref"] != "" && $line["ref"] != "null" ) ? clean($line["ref"]) : null;
    $ref2 = (isset($line["ref2"]) && $line["ref2"] != "" && $line["ref2"] != "null" ) ? clean($line["ref2"]) : null;
    $ref3 = (isset($line["ref3"]) && $line["ref3"] != "" && $line["ref3"] != "null" ) ? clean($line["ref3"]) : null;
    $ref4 = (isset($line["ref4"]) && $line["ref4"] != "" && $line["ref4"] != "null" ) ? clean($line["ref4"]) : null;
    $ref5 = (isset($line["ref5"]) && $line["ref5"] != "" && $line["ref5"] != "null" ) ? clean($line["ref5"]) : null;
    $ref6 = (isset($line["ref6"]) && $line["ref6"] != "" && $line["ref6"] != "null" ) ? clean($line["ref6"]) : null;
    $ref7 = (isset($line["ref7"]) && $line["ref7"] != "" && $line["ref7"] != "null" ) ? clean($line["ref7"]) : null;
    $ref8 = (isset($line["ref8"]) && $line["ref8"] != "" && $line["ref8"] != "null" ) ? clean($line["ref8"]) : null;
    $ref9 = (isset($line["ref9"]) && $line["ref9"] != "" && $line["ref9"] != "null" ) ? clean($line["ref9"]) : null;
    $ref10 = (isset($line["ref10"]) && $line["ref10"] != "" && $line["ref10"] != "null" ) ? clean($line["ref10"]) : null;

    $date_registre = date('Y-m-d G:i:s');
    $code = magia_uniqid();
    $order_by = 1;
    $status = 1;

    $lastInsertId = banks_lines_check_add(
            $my_account, $operation, $date_operation, $description, $type, $total, $currency, $date_value, $account_sender, $sender, $comunication, $ce, $details, $message, $id_office, $office_name, $value_bankCheck_transaction, $countable_balance, $suffix_account, $sequential, $available_balance, $debit, $credit, $ref, $ref2, $ref3, $ref4, $ref5, $ref6, $ref7, $ref8, $ref9, $ref10, $date_registre, $code, $order_by, $status
    );
}


#
#
//if (!$date_registre) {
//    array_push($error, 'Date_registre is mandatory');
//}
//if (!$code) {
//    array_push($error, 'Code is mandatory');
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
//if (!banks_lines_check_is_date_registre($date_registre)) {
//    array_push($error, 'Date_registre format error');
//}
//if (!banks_lines_check_is_code($code)) {
//    array_push($error, 'Code format error');
//}
//if (!banks_lines_check_is_order_by($order_by)) {
//    array_push($error, 'Order_by format error');
//}
//if (!banks_lines_check_is_status($status)) {
//    array_push($error, 'Status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( banks_lines_check_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################




if (!$error) {




    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=banks_lines_check");
            break;

        case 2:
            header("Location: index.php?c=banks_lines_check&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=banks_lines_check&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=banks_lines_check&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=banks_lines_check&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}


