<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$tax = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $tax = tax_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tax_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=tax&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $tax = tax_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_value":
        $value = (isset($_GET["value"]) && $_GET["value"] != "" ) ? clean($_GET["value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tax_search_by("value", $value));
        // puede hacer falta
        $url = "index.php?c=tax&a=search&w=by_value&value=" . $value;
        $pagination->setUrl($url);
        $tax = tax_search_by("value", $value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tax_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=tax&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $tax = tax_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tax_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=tax&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $tax = tax_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, tax_search($txt));
        // puede hacer falta
        $url = "index.php?c=taxa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $tax = tax_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$tax = tax_search($txt);
        break;
}


include view("tax", "index");
