<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$budgets = null;
$client_id = "";
$status = "";
$pagination = "";

$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();
################################################################################
################################################################################
switch ($w) {
    case "id":
        $id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, budgets_search_by_id($id));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=id&id=$id");
        $budgets = budgets_search_by_id($id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        //   $budgets = budgets_search_by_id($id);
        break;
    case "byCode":
        $code = (($_GET["code"]) != "") ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, budgets_search_by_code($code));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=byCode&code=$code");
        $budgets = budgets_search_by_code($code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        // $budgets = budgets_search_by_code($code);
        break;
    case "byCategory_code":
        $category_code = (($_GET["category_code"]) != "") ? clean($_GET["category_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, budgets_search_by_category_code($category_code));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=byCategory_code&category_code=$category_code");
        $budgets = budgets_search_by_category_code($code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        // $budgets = budgets_search_by_code($code);
        break;

    case "byClient":
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y");
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n");
        // No facturadas
        $unbilled = (isset($_GET["unbilled"]) && $_GET["unbilled"] == "on") ? true : false;
        ################################################################################
        $pagination = new Pagination($page, budgets_search_advanced($client_id, $status, $year, $month, $unbilled));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=byClient&client_id=$client_id&status=$status&year=$year&month=$month&unbilled=$unbilled");
        $budgets = budgets_search_advanced($client_id, $status, $year, $month, $unbilled, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $budgets = budgets_search_advanced($client_id, $status, $year, $month, $unbilled);
        break;

    case "byClientAndStatus":
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
        ################################################################################
        $pagination = new Pagination($page, budgets_search_by_client_id_status($client_id, $status));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=byClientAndStatus&client_id=$client_id&status=$status");
        $budgets = budgets_search_by_client_id_status($client_id, $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $budgets = budgets_search_by_client_id_status($client_id, $status);
        break;

    case "byAll":
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : date("Y");
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : date("n");
        ################################################################################
        $pagination = new Pagination($page, budgets_search_by_all($client_id, $status, $year, $month));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=byAll&client_id=$client_id&status=$status&year=$year&month=$month");
        $budgets = budgets_search_by_all($client_id, $status, $year, $month, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        //$budgets = budgets_search_by_all($client_id, $status, $year, $month);
        break;

    case "full": // all en todos los campo
        $client_id = (($_GET["client_id"]) != "") ? clean($_GET["client_id"]) : false;
        $status = (($_GET["status"]) != "") ? clean($_GET["status"]) : "all";
        $year = (($_GET["year"]) != "") ? clean($_GET["year"]) : 'all';
        $month = (($_GET["month"]) != "") ? clean($_GET["month"]) : 'all';
        ################################################################################
        $pagination = new Pagination($page, budgets_search_by_all($client_id, $status, $year, $month));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&w=byAll&client_id=$client_id&status=$status&year=$year&month=$month");
        $budgets = budgets_search_by_all($client_id, $status, $year, $month, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        //$budgets = budgets_search_by_all($client_id, $status, $year, $month);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, budgets_search($txt));
        // puede hacer falta
        $pagination->setUrl("index.php?c=budgets&a=search&txt=$txt");
        $budgets = budgets_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        // $budgets = budgets_search($txt);

        break;
}



################################################################################
if (!$error) {

// ****************************************
    $totalItems = count($budgets);

    include controller("budgets", "pagination");
// ****************************************


    include view("budgets", "index");
} else {
    include view("home", "pageError");
}
