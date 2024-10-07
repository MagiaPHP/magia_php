<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$expenses_frecuency = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $expenses_frecuency = expenses_frecuency_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_expense_id":
        $expense_id = (isset($_GET["expense_id"]) && $_GET["expense_id"] != "" ) ? clean($_GET["expense_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("expense_id", $expense_id));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_expense_id&expense_id=" . $expense_id;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("expense_id", $expense_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_every":
        $every = (isset($_GET["every"]) && $_GET["every"] != "" ) ? clean($_GET["every"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("every", $every));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_every&every=" . $every;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("every", $every, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_times":
        $times = (isset($_GET["times"]) && $_GET["times"] != "" ) ? clean($_GET["times"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("times", $times));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_times&times=" . $times;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("times", $times, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuency&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, expenses_frecuency_search($txt));
        // puede hacer falta
        $url = "index.php?c=expenses_frecuencya=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $expenses_frecuency = expenses_frecuency_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$expenses_frecuency = expenses_frecuency_search($txt);
        break;
}


include view("expenses_frecuency", "index");
