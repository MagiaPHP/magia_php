<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$investments = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $investments = investments_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_institution_id":
        $institution_id = (isset($_GET["institution_id"]) && $_GET["institution_id"] != "" ) ? clean($_GET["institution_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("institution_id", $institution_id));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_institution_id&institution_id=" . $institution_id;
        $pagination->setUrl($url);
        $investments = investments_search_by("institution_id", $institution_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $investments = investments_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_operation":
        $operation = (isset($_GET["operation"]) && $_GET["operation"] != "" ) ? clean($_GET["operation"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("operation", $operation));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_operation&operation=" . $operation;
        $pagination->setUrl($url);
        $investments = investments_search_by("operation", $operation, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_ref":
        $ref = (isset($_GET["ref"]) && $_GET["ref"] != "" ) ? clean($_GET["ref"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("ref", $ref));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_ref&ref=" . $ref;
        $pagination->setUrl($url);
        $investments = investments_search_by("ref", $ref, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_amount":
        $amount = (isset($_GET["amount"]) && $_GET["amount"] != "" ) ? clean($_GET["amount"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("amount", $amount));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_amount&amount=" . $amount;
        $pagination->setUrl($url);
        $investments = investments_search_by("amount", $amount, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_days":
        $days = (isset($_GET["days"]) && $_GET["days"] != "" ) ? clean($_GET["days"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("days", $days));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_days&days=" . $days;
        $pagination->setUrl($url);
        $investments = investments_search_by("days", $days, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_rate":
        $rate = (isset($_GET["rate"]) && $_GET["rate"] != "" ) ? clean($_GET["rate"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("rate", $rate));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_rate&rate=" . $rate;
        $pagination->setUrl($url);
        $investments = investments_search_by("rate", $rate, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $investments = investments_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_retention":
        $retention = (isset($_GET["retention"]) && $_GET["retention"] != "" ) ? clean($_GET["retention"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("retention", $retention));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_retention&retention=" . $retention;
        $pagination->setUrl($url);
        $investments = investments_search_by("retention", $retention, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $investments = investments_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $investments = investments_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $investments = investments_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=investments&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $investments = investments_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, investments_search($txt));
        // puede hacer falta
        $url = "index.php?c=investmentsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $investments = investments_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$investments = investments_search($txt);
        break;
}


include view("investments", "index");
