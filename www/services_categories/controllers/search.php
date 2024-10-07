<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$services_categories = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $services_categories = services_categories_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_section_code":
        $section_code = (isset($_GET["section_code"]) && $_GET["section_code"] != "" ) ? clean($_GET["section_code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search_by("section_code", $section_code));
        // puede hacer falta
        $url = "index.php?c=services_categories&a=search&w=by_section_code&section_code=" . $section_code;
        $pagination->setUrl($url);
        $services_categories = services_categories_search_by("section_code", $section_code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_category_father":
        $category_father = (isset($_GET["category_father"]) && $_GET["category_father"] != "" ) ? clean($_GET["category_father"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search_by("category_father", $category_father));
        // puede hacer falta
        $url = "index.php?c=services_categories&a=search&w=by_category_father&category_father=" . $category_father;
        $pagination->setUrl($url);
        $services_categories = services_categories_search_by("category_father", $category_father, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=services_categories&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $services_categories = services_categories_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_category":
        $category = (isset($_GET["category"]) && $_GET["category"] != "" ) ? clean($_GET["category"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search_by("category", $category));
        // puede hacer falta
        $url = "index.php?c=services_categories&a=search&w=by_category&category=" . $category;
        $pagination->setUrl($url);
        $services_categories = services_categories_search_by("category", $category, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=services_categories&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $services_categories = services_categories_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=services_categories&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $services_categories = services_categories_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, services_categories_search($txt));
        // puede hacer falta
        $url = "index.php?c=services_categoriesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $services_categories = services_categories_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$services_categories = services_categories_search($txt);
        break;
}


include view("services_categories", "index");
