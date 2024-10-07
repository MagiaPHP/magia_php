<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$services = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $services = services_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_category_code":
        $category_code = (isset($_GET["category_code"]) && $_GET["category_code"] != "" ) ? clean($_GET["category_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_search_by("category_code", $category_code));
        // puede hacer falta
        $url = "index.php?c=services&a=search&w=by_category_code&category_code=" . $category_code;
        $pagination->setUrl($url);
        $services = services_search_by("category_code", $category_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=services&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $services = services_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_service":
        $service = (isset($_GET["service"]) && $_GET["service"] != "" ) ? clean($_GET["service"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_search_by("service", $service));
        // puede hacer falta
        $url = "index.php?c=services&a=search&w=by_service&service=" . $service;
        $pagination->setUrl($url);
        $services = services_search_by("service", $service, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=services&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $services = services_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=services&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $services = services_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_search($txt));
        // puede hacer falta
        $url = "index.php?c=servicesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $services = services_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$services = services_search($txt);
        break;
}


include view("services", "index");
