<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$projects = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $projects = projects_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $projects = projects_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $projects = projects_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $projects = projects_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_address":
        $address = (isset($_GET["address"]) && $_GET["address"] != "" ) ? clean($_GET["address"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("address", $address));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_address&address=" . $address;
        $pagination->setUrl($url);
        $projects = projects_search_by("address", $address, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $projects = projects_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $projects = projects_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $projects = projects_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=projects&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $projects = projects_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, projects_search_full($txt));
        // puede hacer falta
        $url = "index.php?c=projectsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $projects = projects_search_full($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$projects = projects_search($txt);
        break;
}


include view("projects", "index");
