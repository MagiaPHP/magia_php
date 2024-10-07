<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}
//

$mc = new Company();
$mc->setCompany(1022);

$blog = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $blog = blog_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $blog = blog_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("title", $title));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $blog = blog_search_by("title", $title, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $blog = blog_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_author_id":
        $author_id = (isset($_GET["author_id"]) && $_GET["author_id"] != "" ) ? clean($_GET["author_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("author_id", $author_id));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_author_id&author_id=" . $author_id;
        $pagination->setUrl($url);
        $blog = blog_search_by("author_id", $author_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $blog = blog_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $blog = blog_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=blog&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $blog = blog_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, blog_search($txt));
        // puede hacer falta
        $url = "index.php?c=bloga=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $blog = blog_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$blog = blog_search($txt);
        break;
}


include view("public_html", "search");
