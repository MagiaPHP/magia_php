<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$projects_inout = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $projects_inout = projects_inout_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_project_id":
        $project_id = (isset($_GET["project_id"]) && $_GET["project_id"] != "" ) ? clean($_GET["project_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("project_id", $project_id));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_project_id&project_id=" . $project_id;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("project_id", $project_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_budget_id":
        $budget_id = (isset($_GET["budget_id"]) && $_GET["budget_id"] != "" ) ? clean($_GET["budget_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("budget_id", $budget_id));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_budget_id&budget_id=" . $budget_id;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("budget_id", $budget_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_invoice_id":
        $invoice_id = (isset($_GET["invoice_id"]) && $_GET["invoice_id"] != "" ) ? clean($_GET["invoice_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("invoice_id", $invoice_id));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_invoice_id&invoice_id=" . $invoice_id;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("invoice_id", $invoice_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_expense_id":
        $expense_id = (isset($_GET["expense_id"]) && $_GET["expense_id"] != "" ) ? clean($_GET["expense_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("expense_id", $expense_id));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_expense_id&expense_id=" . $expense_id;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("expense_id", $expense_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_value":
        $value = (isset($_GET["value"]) && $_GET["value"] != "" ) ? clean($_GET["value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("value", $value));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_value&value=" . $value;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("value", $value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=projects_inout&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_inout_search($txt));
        // puede hacer falta
        $url = "index.php?c=projects_inouta=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $projects_inout = projects_inout_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$projects_inout = projects_inout_search($txt);
        break;
}


include view("projects_inout", "index");
