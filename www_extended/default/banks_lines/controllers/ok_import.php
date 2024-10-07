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

    $my_account = (isset($line["my_account"]) && $line["my_account"] != "" && $line["my_account"] != "null" ) ? clean($line["my_account"]) : false;
    $date_registre = (isset($line["date_registre"]) && $line["date_registre"] != "" ) ? clean($line["date_registre"]) : date("Y-m-d G:i:s");

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
//
    $id_office = (isset($_POST["id_office"]) && $_POST["id_office"] != "" && $_POST["id_office"] != "null" ) ? clean($_POST["id_office"]) : null;
    $office_name = (isset($_POST["office_name"]) && $_POST["office_name"] != "" && $_POST["office_name"] != "null" ) ? clean($_POST["office_name"]) : null;
    $value_bankCheck_transaction = (isset($_POST["value_bankCheck_transaction"]) && $_POST["value_bankCheck_transaction"] != "" && $_POST["value_bankCheck_transaction"] != "null" ) ? clean($_POST["value_bankCheck_transaction"]) : null;
    $countable_balance = (isset($_POST["countable_balance"]) && $_POST["countable_balance"] != "" && $_POST["countable_balance"] != "null" ) ? clean($_POST["countable_balance"]) : null;
    $suffix_account = (isset($_POST["suffix_account"]) && $_POST["suffix_account"] != "" && $_POST["suffix_account"] != "null" ) ? clean($_POST["suffix_account"]) : null;
    $sequential = (isset($_POST["sequential"]) && $_POST["sequential"] != "" && $_POST["sequential"] != "null" ) ? clean($_POST["sequential"]) : null;
    $available_balance = (isset($_POST["available_balance"]) && $_POST["available_balance"] != "" && $_POST["available_balance"] != "null" ) ? clean($_POST["available_balance"]) : null;
    $debit = (isset($_POST["debit"]) && $_POST["debit"] != "" && $_POST["debit"] != "null" ) ? clean($_POST["debit"]) : null;
    $credit = (isset($_POST["credit"]) && $_POST["credit"] != "" && $_POST["credit"] != "null" ) ? clean($_POST["credit"]) : null;
//
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
    $code = (isset($line["code"]) && $line["code"] != "" && $line["code"] != "null" ) ? clean($line["code"]) : magia_uniqid();

    $order_by = (isset($line["order_by"]) && $line["order_by"] != "" ) ? clean($line["order_by"]) : '1';
    $status = (isset($line["status"]) && $line["status"] != "" ) ? clean($line["status"]) : '1';

    ###############################################################################
    # FORMAT
    ###############################################################################
    if (!banks_lines_is_date_registre($date_registre)) {
        array_push($error, 'Date_registre format error');
    }
    if (!banks_lines_is_code($code)) {
        array_push($error, 'Code format error');
    }
    if (!banks_lines_is_order_by($order_by)) {
        array_push($error, 'Order_by format error');
    }
    if (!banks_lines_is_status($status)) {
        array_push($error, 'Status format error');
    }


###############################################################################
# CONDITIONAL
    if ($type == '-' && $total > 0) {
        // el total es negativop
        $total = -($total);
    }
################################################################################
//    if (banks_lines_search_by_unique("id", "operation", $operation)) {
//        array_push($error, 'Operation already exists in data base');
//    }


    if (banks_lines_search_by_account_number_and_operation($my_account, $operation)) {
        array_push($error, 'Operation already exists in data base');
    }

    if (!$error) {

        $lastInsertId = banks_lines_add(
                $my_account, $operation, $date_operation, $description, $type, $total, $currency, $date_value, $account_sender, $sender, $comunication, $ce, $details, $message, $id_office, $office_name, $value_bankCheck_transaction, $countable_balance, $suffix_account, $sequential, $available_balance, $debit, $credit, $ref, $ref2, $ref3, $ref4, $ref5, $ref6, $ref7, $ref8, $ref9, $ref10, $date_registre, $code, $order_by, $status
        );

//        echo "<p>Inser line: $lastInsertId Operation: $operation </p>"; 
    } else {

        include view("home", "pageError");
    }
} // fin del bucle




switch ($redi["redi"]) {
    case 1:
        header("Location: index.php?c=banks_lines");
        break;

    case 2:
        header("Location: index.php?c=banks_lines&a=details&id=$id");
        break;

    case 3:
        header("Location: index.php?c=banks_lines&a=edit&id=$id");
        break;

    case 4:
        header("Location: index.php?c=banks_lines&a=details&id=$lastInsertId");
        break;

    case 5: // custom
        // ejemplo index.php?c=banks_lines&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
        header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
        break;

    case 6: // import check
        //                index.php?c=banks_lines&a=import_check&file=2024-04-30-15-12-58-x-6630ee5aece65.csv&account_number=BE37000442448928&redi=1
        header("Location: index.php?c=banks_lines&a=import_check&file=xxxx$file_name&account_number=$my_account#5");
        break;

    default:
        header("Location: index.php?");
        break;
}

