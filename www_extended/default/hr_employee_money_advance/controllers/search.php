<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$hr_employee_money_advance = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";

$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;

$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $hr_employee_money_advance = hr_employee_money_advance_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by("employee_id", $employee_id));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_value":
        $value = (isset($_GET["value"]) && $_GET["value"] != "" ) ? clean($_GET["value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by("value", $value));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_value&value=" . $value;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by("value", $value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_way":
        $way = (isset($_GET["way"]) && $_GET["way"] != "" ) ? clean($_GET["way"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by("way", $way));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_way&way=" . $way;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by("way", $way, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_year_month":
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;
        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search_by_year_month($year, $month));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advance&a=search&w=by_year_month&month=$month&year=$year&";
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search_by_year_month($year, $month, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        
        ################################################################################
        $pagination = new Pagination($page, hr_employee_money_advance_search($txt));
        // puede hacer falta
        $url = "index.php?c=hr_employee_money_advancea=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_employee_money_advance = hr_employee_money_advance_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$hr_employee_money_advance = hr_employee_money_advance_search($txt);
        break;
}


include view("hr_employee_money_advance", "index");
