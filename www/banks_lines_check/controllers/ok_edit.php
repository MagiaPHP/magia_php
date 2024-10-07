<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$my_account = (isset($_REQUEST["my_account"]) && $_REQUEST["my_account"] != "") ? clean($_REQUEST["my_account"]) : false;
$operation = (isset($_REQUEST["operation"]) && $_REQUEST["operation"] != "") ? clean($_REQUEST["operation"]) : false;
$date_operation = (isset($_REQUEST["date_operation"]) && $_REQUEST["date_operation"] != "") ? clean($_REQUEST["date_operation"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] != "") ? clean($_REQUEST["description"]) : false;
$type = (isset($_REQUEST["type"]) && $_REQUEST["type"] != "") ? clean($_REQUEST["type"]) : false;
$total = (isset($_REQUEST["total"]) && $_REQUEST["total"] != "") ? clean($_REQUEST["total"]) : false;
$currency = (isset($_REQUEST["currency"]) && $_REQUEST["currency"] != "") ? clean($_REQUEST["currency"]) : false;
$date_value = (isset($_REQUEST["date_value"]) && $_REQUEST["date_value"] != "") ? clean($_REQUEST["date_value"]) : false;
$account_sender = (isset($_REQUEST["account_sender"]) && $_REQUEST["account_sender"] != "") ? clean($_REQUEST["account_sender"]) : false;
$sender = (isset($_REQUEST["sender"]) && $_REQUEST["sender"] != "") ? clean($_REQUEST["sender"]) : false;
$comunication = (isset($_REQUEST["comunication"]) && $_REQUEST["comunication"] != "") ? clean($_REQUEST["comunication"]) : false;
$ce = (isset($_REQUEST["ce"]) && $_REQUEST["ce"] != "") ? clean($_REQUEST["ce"]) : false;
$details = (isset($_REQUEST["details"]) && $_REQUEST["details"] != "") ? clean($_REQUEST["details"]) : false;
$message = (isset($_REQUEST["message"]) && $_REQUEST["message"] != "") ? clean($_REQUEST["message"]) : false;
$id_office = (isset($_REQUEST["id_office"]) && $_REQUEST["id_office"] != "") ? clean($_REQUEST["id_office"]) : false;
$office_name = (isset($_REQUEST["office_name"]) && $_REQUEST["office_name"] != "") ? clean($_REQUEST["office_name"]) : false;
$value_bankCheck_transaction = (isset($_REQUEST["value_bankCheck_transaction"]) && $_REQUEST["value_bankCheck_transaction"] != "") ? clean($_REQUEST["value_bankCheck_transaction"]) : false;
$countable_balance = (isset($_REQUEST["countable_balance"]) && $_REQUEST["countable_balance"] != "") ? clean($_REQUEST["countable_balance"]) : false;
$suffix_account = (isset($_REQUEST["suffix_account"]) && $_REQUEST["suffix_account"] != "") ? clean($_REQUEST["suffix_account"]) : false;
$sequential = (isset($_REQUEST["sequential"]) && $_REQUEST["sequential"] != "") ? clean($_REQUEST["sequential"]) : false;
$available_balance = (isset($_REQUEST["available_balance"]) && $_REQUEST["available_balance"] != "") ? clean($_REQUEST["available_balance"]) : false;
$debit = (isset($_REQUEST["debit"]) && $_REQUEST["debit"] != "") ? clean($_REQUEST["debit"]) : false;
$credit = (isset($_REQUEST["credit"]) && $_REQUEST["credit"] != "") ? clean($_REQUEST["credit"]) : false;
$ref = (isset($_REQUEST["ref"]) && $_REQUEST["ref"] != "") ? clean($_REQUEST["ref"]) : false;
$ref2 = (isset($_REQUEST["ref2"]) && $_REQUEST["ref2"] != "") ? clean($_REQUEST["ref2"]) : false;
$ref3 = (isset($_REQUEST["ref3"]) && $_REQUEST["ref3"] != "") ? clean($_REQUEST["ref3"]) : false;
$ref4 = (isset($_REQUEST["ref4"]) && $_REQUEST["ref4"] != "") ? clean($_REQUEST["ref4"]) : false;
$ref5 = (isset($_REQUEST["ref5"]) && $_REQUEST["ref5"] != "") ? clean($_REQUEST["ref5"]) : false;
$ref6 = (isset($_REQUEST["ref6"]) && $_REQUEST["ref6"] != "") ? clean($_REQUEST["ref6"]) : false;
$ref7 = (isset($_REQUEST["ref7"]) && $_REQUEST["ref7"] != "") ? clean($_REQUEST["ref7"]) : false;
$ref8 = (isset($_REQUEST["ref8"]) && $_REQUEST["ref8"] != "") ? clean($_REQUEST["ref8"]) : false;
$ref9 = (isset($_REQUEST["ref9"]) && $_REQUEST["ref9"] != "") ? clean($_REQUEST["ref9"]) : false;
$ref10 = (isset($_REQUEST["ref10"]) && $_REQUEST["ref10"] != "") ? clean($_REQUEST["ref10"]) : false;
$date_registre = (isset($_REQUEST["date_registre"]) && $_REQUEST["date_registre"] != "") ? clean($_REQUEST["date_registre"]) : false;
$code = (isset($_REQUEST["code"]) && $_REQUEST["code"] != "") ? clean($_REQUEST["code"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$date_registre) {
    array_push($error, 'Date_registre is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
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
if (!banks_lines_check_is_date_registre($date_registre)) {
    array_push($error, 'Date_registre format error');
}
if (!banks_lines_check_is_code($code)) {
    array_push($error, 'Code format error');
}
if (!banks_lines_check_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!banks_lines_check_is_status($status)) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( banks_lines_check_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    banks_lines_check_edit(
            $id, $my_account, $operation, $date_operation, $description, $type, $total, $currency, $date_value, $account_sender, $sender, $comunication, $ce, $details, $message, $id_office, $office_name, $value_bankCheck_transaction, $countable_balance, $suffix_account, $sequential, $available_balance, $debit, $credit, $ref, $ref2, $ref3, $ref4, $ref5, $ref6, $ref7, $ref8, $ref9, $ref10, $date_registre, $code, $order_by, $status
    );

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
            // ejemplo index.php?c=banks_lines_check&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
