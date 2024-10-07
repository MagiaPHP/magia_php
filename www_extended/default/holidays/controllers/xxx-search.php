<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$holidays = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $holidays = holidays_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_country":
        $country = (isset($_GET["country"]) && $_GET["country"] != "" ) ? clean($_GET["country"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by("country", $country));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_country&country=" . $country;
        $pagination->setUrl($url);
        $holidays = holidays_search_by("country", $country, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_category_code":
        $category_code = (isset($_GET["category_code"]) && $_GET["category_code"] != "" ) ? clean($_GET["category_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by("category_code", $category_code));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_category_code&category_code=" . $category_code;
        $pagination->setUrl($url);
        $holidays = holidays_search_by("category_code", $category_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $holidays = holidays_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $holidays = holidays_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $holidays = holidays_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $holidays = holidays_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    #### --- ####################################################################
    case "by_year":
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search_by_year($year));
        // puede hacer falta
        $url = "index.php?c=holidays&a=search&w=by_year&year=" . $year;
        $pagination->setUrl($url);
        $holidays = holidays_search_by_year($year, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
    #### --- ####################################################################
    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, holidays_search($txt));
        // puede hacer falta
        $url = "index.php?c=holidaysa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $holidays = holidays_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$holidays = holidays_search($txt);
        break;
}


include view("holidays", "index");
