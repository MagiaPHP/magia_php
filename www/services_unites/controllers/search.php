<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$services_unites = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $services_unites = services_unites_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_unites_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=services_unites&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $services_unites = services_unites_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_unites":
        $unites = (isset($_GET["unites"]) && $_GET["unites"] != "" ) ? clean($_GET["unites"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_unites_search_by("unites", $unites));
        // puede hacer falta
        $url = "index.php?c=services_unites&a=search&w=by_unites&unites=" . $unites;
        $pagination->setUrl($url);
        $services_unites = services_unites_search_by("unites", $unites, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_unites_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=services_unites&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $services_unites = services_unites_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_unites_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=services_unites&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $services_unites = services_unites_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_unites_search($txt));
        // puede hacer falta
        $url = "index.php?c=services_unitesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $services_unites = services_unites_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$services_unites = services_unites_search($txt);
        break;
}


include view("services_unites", "index");
