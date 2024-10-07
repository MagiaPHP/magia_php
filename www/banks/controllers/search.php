<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$banks = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $banks = banks_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $banks = banks_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_bank":
        $bank = (isset($_GET["bank"]) && $_GET["bank"] != "" ) ? clean($_GET["bank"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("bank", $bank));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_bank&bank=" . $bank;
        $pagination->setUrl($url);
        $banks = banks_search_by("bank", $bank, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_account_number":
        $account_number = (isset($_GET["account_number"]) && $_GET["account_number"] != "" ) ? clean($_GET["account_number"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("account_number", $account_number));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_account_number&account_number=" . $account_number;
        $pagination->setUrl($url);
        $banks = banks_search_by("account_number", $account_number, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_bic":
        $bic = (isset($_GET["bic"]) && $_GET["bic"] != "" ) ? clean($_GET["bic"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("bic", $bic));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_bic&bic=" . $bic;
        $pagination->setUrl($url);
        $banks = banks_search_by("bic", $bic, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_iban":
        $iban = (isset($_GET["iban"]) && $_GET["iban"] != "" ) ? clean($_GET["iban"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("iban", $iban));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_iban&iban=" . $iban;
        $pagination->setUrl($url);
        $banks = banks_search_by("iban", $iban, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $banks = banks_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_codification":
        $codification = (isset($_GET["codification"]) && $_GET["codification"] != "" ) ? clean($_GET["codification"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("codification", $codification));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_codification&codification=" . $codification;
        $pagination->setUrl($url);
        $banks = banks_search_by("codification", $codification, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_delimiter":
        $delimiter = (isset($_GET["delimiter"]) && $_GET["delimiter"] != "" ) ? clean($_GET["delimiter"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("delimiter", $delimiter));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_delimiter&delimiter=" . $delimiter;
        $pagination->setUrl($url);
        $banks = banks_search_by("delimiter", $delimiter, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_format":
        $date_format = (isset($_GET["date_format"]) && $_GET["date_format"] != "" ) ? clean($_GET["date_format"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("date_format", $date_format));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_date_format&date_format=" . $date_format;
        $pagination->setUrl($url);
        $banks = banks_search_by("date_format", $date_format, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_thousands_separator":
        $thousands_separator = (isset($_GET["thousands_separator"]) && $_GET["thousands_separator"] != "" ) ? clean($_GET["thousands_separator"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("thousands_separator", $thousands_separator));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_thousands_separator&thousands_separator=" . $thousands_separator;
        $pagination->setUrl($url);
        $banks = banks_search_by("thousands_separator", $thousands_separator, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_decimal_separator":
        $decimal_separator = (isset($_GET["decimal_separator"]) && $_GET["decimal_separator"] != "" ) ? clean($_GET["decimal_separator"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("decimal_separator", $decimal_separator));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_decimal_separator&decimal_separator=" . $decimal_separator;
        $pagination->setUrl($url);
        $banks = banks_search_by("decimal_separator", $decimal_separator, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_invoices":
        $invoices = (isset($_GET["invoices"]) && $_GET["invoices"] != "" ) ? clean($_GET["invoices"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("invoices", $invoices));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_invoices&invoices=" . $invoices;
        $pagination->setUrl($url);
        $banks = banks_search_by("invoices", $invoices, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $banks = banks_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=banks&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $banks = banks_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, banks_search($txt));
        // puede hacer falta
        $url = "index.php?c=banksa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $banks = banks_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$banks = banks_search($txt);
        break;
}


include view("banks", "index");
