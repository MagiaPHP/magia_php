<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$services_price = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $services_price = services_price_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_service_code":
        $service_code = (isset($_GET["service_code"]) && $_GET["service_code"] != "" ) ? clean($_GET["service_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_price_search_by("service_code", $service_code));
        // puede hacer falta
        $url = "index.php?c=services_price&a=search&w=by_service_code&service_code=" . $service_code;
        $pagination->setUrl($url);
        $services_price = services_price_search_by("service_code", $service_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_unite_code":
        $unite_code = (isset($_GET["unite_code"]) && $_GET["unite_code"] != "" ) ? clean($_GET["unite_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_price_search_by("unite_code", $unite_code));
        // puede hacer falta
        $url = "index.php?c=services_price&a=search&w=by_unite_code&unite_code=" . $unite_code;
        $pagination->setUrl($url);
        $services_price = services_price_search_by("unite_code", $unite_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_price_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=services_price&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $services_price = services_price_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_price_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=services_price&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $services_price = services_price_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_price_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=services_price&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $services_price = services_price_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_price_search($txt));
        // puede hacer falta
        $url = "index.php?c=services_pricea=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $services_price = services_price_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$services_price = services_price_search($txt);
        break;
}


include view("services_price", "index");
