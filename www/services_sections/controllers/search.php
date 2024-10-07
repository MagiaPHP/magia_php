<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$services_sections = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $services_sections = services_sections_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_section_father":
        $section_father = (isset($_GET["section_father"]) && $_GET["section_father"] != "" ) ? clean($_GET["section_father"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_sections_search_by("section_father", $section_father));
        // puede hacer falta
        $url = "index.php?c=services_sections&a=search&w=by_section_father&section_father=" . $section_father;
        $pagination->setUrl($url);
        $services_sections = services_sections_search_by("section_father", $section_father, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_sections_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=services_sections&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $services_sections = services_sections_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_section":
        $section = (isset($_GET["section"]) && $_GET["section"] != "" ) ? clean($_GET["section"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_sections_search_by("section", $section));
        // puede hacer falta
        $url = "index.php?c=services_sections&a=search&w=by_section&section=" . $section;
        $pagination->setUrl($url);
        $services_sections = services_sections_search_by("section", $section, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_sections_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=services_sections&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $services_sections = services_sections_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_sections_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=services_sections&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $services_sections = services_sections_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_sections_search($txt));
        // puede hacer falta
        $url = "index.php?c=services_sectionsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $services_sections = services_sections_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$services_sections = services_sections_search($txt);
        break;
}


include view("services_sections", "index");
