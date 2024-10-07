<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$banks_lines = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
include "order_by_col_way.php";
################################################################################


switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $banks_lines = banks_lines_search_by_field_id($txt);
        break;

    #### --- ####################################################################
    case "by_my_account":
        $my_account = (isset($_GET["my_account"]) && $_GET["my_account"] != "" ) ? clean($_GET["my_account"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("my_account", $my_account, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_my_account&my_account=" . $my_account;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("my_account", $my_account, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_operation":
        $operation = (isset($_GET["operation"]) && $_GET["operation"] != "" ) ? clean($_GET["operation"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("operation", $operation, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_operation&operation=" . $operation;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("operation", $operation, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_operation":
        $date_operation = (isset($_GET["date_operation"]) && $_GET["date_operation"] != "" ) ? clean($_GET["date_operation"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("date_operation", $date_operation, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_date_operation&date_operation=" . $date_operation;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("date_operation", $date_operation, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("description", $description, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("description", $description, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field_type($type, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field_type($type, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("total", $total, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("total", $total, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_inout":
        $inout = (isset($_GET["inout"]) && $_GET["inout"] != "" ) ? clean($_GET["inout"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_inout($inout, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_inout&inout=" . $inout;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_inout($inout, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_currency":
        $currency = (isset($_GET["currency"]) && $_GET["currency"] != "" ) ? clean($_GET["currency"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("currency", $currency, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_currency&currency=" . $currency;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("currency", $currency, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_val":
        $date_val = (isset($_GET["date_val"]) && $_GET["date_val"] != "" ) ? clean($_GET["date_val"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("date_val", $date_val, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_date_val&date_val=" . $date_val;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("date_val", $date_val, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_account":
        $account = (isset($_GET["account"]) && $_GET["account"] != "" ) ? clean($_GET["account"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("account", $account, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_account&account=" . $account;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("account", $account, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_sender":
        $sender = (isset($_GET["sender"]) && $_GET["sender"] != "" ) ? clean($_GET["sender"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("sender", $sender, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_sender&sender=" . $sender;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("sender", $sender, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_comunication":
        $comunication = (isset($_GET["comunication"]) && $_GET["comunication"] != "" ) ? clean($_GET["comunication"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("comunication", $comunication, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_comunication&comunication=" . $comunication;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("comunication", $comunication, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ce":
        $ce = (isset($_GET["ce"]) && $_GET["ce"] != "" ) ? clean($_GET["ce"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("ce", $ce, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_ce&ce=" . $ce;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("ce", $ce, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref":
        $ref = (isset($_GET["ref"]) && $_GET["ref"] != "" ) ? clean($_GET["ref"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("ref", $ref, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_ref&ref=" . $ref;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("ref", $ref, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref2":
        $ref2 = (isset($_GET["ref2"]) && $_GET["ref2"] != "" ) ? clean($_GET["ref2"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("ref2", $ref2, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_ref2&ref2=" . $ref2;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("ref2", $ref2, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref3":
        $ref3 = (isset($_GET["ref3"]) && $_GET["ref3"] != "" ) ? clean($_GET["ref3"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("ref3", $ref3, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_ref3&ref3=" . $ref3;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("ref3", $ref3, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("date_registre", $date_registre, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("date_registre", $date_registre, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status_code":
        $status_code = (isset($_GET["status_code"]) && $_GET["status_code"] != "" ) ? clean($_GET["status_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("status_code", $status_code, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_status_code&status_code=" . $status_code;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("status_code", $status_code, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field("order_by", $order_by, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("order_by", $order_by, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################                 
        $pagination = new Pagination($page, banks_lines_search_by_field("status", $status, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field("status", $status, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    case "by_my_account_operationnnnnnnnnnnnnnnnnnnnnnnnn":
        $my_account = (isset($_GET["my_account"]) && $_GET["my_account"] != "" ) ? clean($_GET["my_account"]) : false;
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_field_my_account_and_status($my_account, $status, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_my_account_operation&my_account=$my_account&status=$status";
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_field_my_account_and_status($my_account, $status, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    #### --- ####################################################################
    case "by_my_account_status":
        $my_account = (isset($_GET["my_account"]) && $_GET["my_account"] != "" ) ? clean($_GET["my_account"]) : false;
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_my_account_and_status($my_account, $status, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_my_account_status&my_account=$my_account&status=$status";
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_my_account_and_status($my_account, $status, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
    #### --- ####################################################################
    #### --- ####################################################################
    case "by_my_account_inout":
        $my_account = (isset($_GET["my_account"]) && $_GET["my_account"] != "" ) ? clean($_GET["my_account"]) : false;
        $inout = (isset($_GET["inout"]) && $_GET["inout"] != "" ) ? clean($_GET["inout"]) : 'all';
        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_by_my_account_and_inout($my_account, $inout, $order));
        // puede hacer falta
        $url = "index.php?c=banks_lines&a=search&w=by_my_account_inout&my_account=$my_account&inout=$inout";
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_by_my_account_and_inout($my_account, $inout, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################


    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;

        ################################################################################
        $pagination = new Pagination($page, banks_lines_search_full($txt, $order));
        // puede hacer falta
        $url = "index.php?c=banks_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $banks_lines = banks_lines_search_full($txt, $order, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$banks_lines = banks_lines_search($txt);
        break;
}




include view("banks_lines", "index");
