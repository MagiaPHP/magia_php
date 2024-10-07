<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$banks_lines_check = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $banks_lines_check = banks_lines_check_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_my_account":
        $my_account = (isset($_GET["my_account"]) && $_GET["my_account"] != "" ) ? clean($_GET["my_account"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("my_account", $my_account));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_my_account&my_account=" . $my_account;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("my_account", $my_account, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_operation":
        $operation = (isset($_GET["operation"]) && $_GET["operation"] != "" ) ? clean($_GET["operation"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("operation", $operation));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_operation&operation=" . $operation;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("operation", $operation, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_operation":
        $date_operation = (isset($_GET["date_operation"]) && $_GET["date_operation"] != "" ) ? clean($_GET["date_operation"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("date_operation", $date_operation));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_date_operation&date_operation=" . $date_operation;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("date_operation", $date_operation, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_currency":
        $currency = (isset($_GET["currency"]) && $_GET["currency"] != "" ) ? clean($_GET["currency"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("currency", $currency));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_currency&currency=" . $currency;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("currency", $currency, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_value":
        $date_value = (isset($_GET["date_value"]) && $_GET["date_value"] != "" ) ? clean($_GET["date_value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("date_value", $date_value));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_date_value&date_value=" . $date_value;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("date_value", $date_value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_account_sender":
        $account_sender = (isset($_GET["account_sender"]) && $_GET["account_sender"] != "" ) ? clean($_GET["account_sender"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("account_sender", $account_sender));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_account_sender&account_sender=" . $account_sender;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("account_sender", $account_sender, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_sender":
        $sender = (isset($_GET["sender"]) && $_GET["sender"] != "" ) ? clean($_GET["sender"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("sender", $sender));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_sender&sender=" . $sender;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("sender", $sender, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_comunication":
        $comunication = (isset($_GET["comunication"]) && $_GET["comunication"] != "" ) ? clean($_GET["comunication"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("comunication", $comunication));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_comunication&comunication=" . $comunication;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("comunication", $comunication, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ce":
        $ce = (isset($_GET["ce"]) && $_GET["ce"] != "" ) ? clean($_GET["ce"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ce", $ce));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ce&ce=" . $ce;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ce", $ce, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_details":
        $details = (isset($_GET["details"]) && $_GET["details"] != "" ) ? clean($_GET["details"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("details", $details));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_details&details=" . $details;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("details", $details, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_message":
        $message = (isset($_GET["message"]) && $_GET["message"] != "" ) ? clean($_GET["message"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("message", $message));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_message&message=" . $message;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("message", $message, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_id_office":
        $id_office = (isset($_GET["id_office"]) && $_GET["id_office"] != "" ) ? clean($_GET["id_office"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("id_office", $id_office));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_id_office&id_office=" . $id_office;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("id_office", $id_office, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_office_name":
        $office_name = (isset($_GET["office_name"]) && $_GET["office_name"] != "" ) ? clean($_GET["office_name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("office_name", $office_name));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_office_name&office_name=" . $office_name;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("office_name", $office_name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_value_bankCheck_transaction":
        $value_bankCheck_transaction = (isset($_GET["value_bankCheck_transaction"]) && $_GET["value_bankCheck_transaction"] != "" ) ? clean($_GET["value_bankCheck_transaction"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("value_bankCheck_transaction", $value_bankCheck_transaction));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_value_bankCheck_transaction&value_bankCheck_transaction=" . $value_bankCheck_transaction;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("value_bankCheck_transaction", $value_bankCheck_transaction, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_countable_balance":
        $countable_balance = (isset($_GET["countable_balance"]) && $_GET["countable_balance"] != "" ) ? clean($_GET["countable_balance"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("countable_balance", $countable_balance));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_countable_balance&countable_balance=" . $countable_balance;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("countable_balance", $countable_balance, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_suffix_account":
        $suffix_account = (isset($_GET["suffix_account"]) && $_GET["suffix_account"] != "" ) ? clean($_GET["suffix_account"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("suffix_account", $suffix_account));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_suffix_account&suffix_account=" . $suffix_account;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("suffix_account", $suffix_account, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_sequential":
        $sequential = (isset($_GET["sequential"]) && $_GET["sequential"] != "" ) ? clean($_GET["sequential"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("sequential", $sequential));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_sequential&sequential=" . $sequential;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("sequential", $sequential, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_available_balance":
        $available_balance = (isset($_GET["available_balance"]) && $_GET["available_balance"] != "" ) ? clean($_GET["available_balance"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("available_balance", $available_balance));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_available_balance&available_balance=" . $available_balance;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("available_balance", $available_balance, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_debit":
        $debit = (isset($_GET["debit"]) && $_GET["debit"] != "" ) ? clean($_GET["debit"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("debit", $debit));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_debit&debit=" . $debit;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("debit", $debit, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_credit":
        $credit = (isset($_GET["credit"]) && $_GET["credit"] != "" ) ? clean($_GET["credit"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("credit", $credit));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_credit&credit=" . $credit;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("credit", $credit, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref":
        $ref = (isset($_GET["ref"]) && $_GET["ref"] != "" ) ? clean($_GET["ref"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref", $ref));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref&ref=" . $ref;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref", $ref, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref2":
        $ref2 = (isset($_GET["ref2"]) && $_GET["ref2"] != "" ) ? clean($_GET["ref2"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref2", $ref2));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref2&ref2=" . $ref2;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref2", $ref2, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref3":
        $ref3 = (isset($_GET["ref3"]) && $_GET["ref3"] != "" ) ? clean($_GET["ref3"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref3", $ref3));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref3&ref3=" . $ref3;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref3", $ref3, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref4":
        $ref4 = (isset($_GET["ref4"]) && $_GET["ref4"] != "" ) ? clean($_GET["ref4"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref4", $ref4));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref4&ref4=" . $ref4;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref4", $ref4, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref5":
        $ref5 = (isset($_GET["ref5"]) && $_GET["ref5"] != "" ) ? clean($_GET["ref5"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref5", $ref5));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref5&ref5=" . $ref5;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref5", $ref5, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref6":
        $ref6 = (isset($_GET["ref6"]) && $_GET["ref6"] != "" ) ? clean($_GET["ref6"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref6", $ref6));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref6&ref6=" . $ref6;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref6", $ref6, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref7":
        $ref7 = (isset($_GET["ref7"]) && $_GET["ref7"] != "" ) ? clean($_GET["ref7"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref7", $ref7));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref7&ref7=" . $ref7;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref7", $ref7, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref8":
        $ref8 = (isset($_GET["ref8"]) && $_GET["ref8"] != "" ) ? clean($_GET["ref8"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref8", $ref8));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref8&ref8=" . $ref8;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref8", $ref8, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref9":
        $ref9 = (isset($_GET["ref9"]) && $_GET["ref9"] != "" ) ? clean($_GET["ref9"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref9", $ref9));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref9&ref9=" . $ref9;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref9", $ref9, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref10":
        $ref10 = (isset($_GET["ref10"]) && $_GET["ref10"] != "" ) ? clean($_GET["ref10"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("ref10", $ref10));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_ref10&ref10=" . $ref10;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("ref10", $ref10, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=banks_lines_check&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_check_search($txt));
        // puede hacer falta
        $url = "index.php?c=banks_lines_checka=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $banks_lines_check = banks_lines_check_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$banks_lines_check = banks_lines_check_search($txt);
        break;
}


include view("banks_lines_check", "index");
