<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$providers = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $providers = providers_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_company_id":
        $company_id = (isset($_GET["company_id"]) && $_GET["company_id"] != "" ) ? clean($_GET["company_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search_by("company_id", $company_id));
        // puede hacer falta
        $url = "index.php?c=providers&a=search&w=by_company_id&company_id=" . $company_id;
        $pagination->setUrl($url);
        $providers = providers_search_by("company_id", $company_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_client_number":
        $client_number = (isset($_GET["client_number"]) && $_GET["client_number"] != "" ) ? clean($_GET["client_number"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search_by("client_number", $client_number));
        // puede hacer falta
        $url = "index.php?c=providers&a=search&w=by_client_number&client_number=" . $client_number;
        $pagination->setUrl($url);
        $providers = providers_search_by("client_number", $client_number, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=providers&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $providers = providers_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_discount":
        $discount = (isset($_GET["discount"]) && $_GET["discount"] != "" ) ? clean($_GET["discount"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search_by("discount", $discount));
        // puede hacer falta
        $url = "index.php?c=providers&a=search&w=by_discount&discount=" . $discount;
        $pagination->setUrl($url);
        $providers = providers_search_by("discount", $discount, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=providers&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $providers = providers_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=providers&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $providers = providers_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, providers_search($txt));
        // puede hacer falta
        $url = "index.php?c=providersa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $providers = providers_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$providers = providers_search($txt);
        break;
}


include view("providers", "index");
