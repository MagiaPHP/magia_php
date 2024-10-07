<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$pettycash = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $pettycash = pettycash_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=pettycash&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $pettycash = pettycash_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=pettycash&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $pettycash = pettycash_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=pettycash&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $pettycash = pettycash_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=pettycash&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $pettycash = pettycash_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=pettycash&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $pettycash = pettycash_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=pettycash&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $pettycash = pettycash_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, pettycash_search($txt));
        // puede hacer falta
        $url = "index.php?c=pettycasha=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $pettycash = pettycash_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$pettycash = pettycash_search($txt);
        break;
}


include view("pettycash", "index");
