<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$investment_lines = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $investment_lines = investment_lines_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_investment_id":
        $investment_id = (isset($_GET["investment_id"]) && $_GET["investment_id"] != "" ) ? clean($_GET["investment_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("investment_id", $investment_id));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_investment_id&investment_id=" . $investment_id;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("investment_id", $investment_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_value":
        $value = (isset($_GET["value"]) && $_GET["value"] != "" ) ? clean($_GET["value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("value", $value));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_value&value=" . $value;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("value", $value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_irf":
        $irf = (isset($_GET["irf"]) && $_GET["irf"] != "" ) ? clean($_GET["irf"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("irf", $irf));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_irf&irf=" . $irf;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("irf", $irf, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_payment":
        $date_payment = (isset($_GET["date_payment"]) && $_GET["date_payment"] != "" ) ? clean($_GET["date_payment"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("date_payment", $date_payment));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_date_payment&date_payment=" . $date_payment;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("date_payment", $date_payment, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=investment_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investment_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=investment_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $investment_lines = investment_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$investment_lines = investment_lines_search($txt);
        break;
}


include view("investment_lines", "index");
