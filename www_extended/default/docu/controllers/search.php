<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}

$docu = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $docu = docu_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_controllers":
        $controllers = (isset($_GET["controllers"]) && $_GET["controllers"] != "" ) ? clean($_GET["controllers"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("controllers", $controllers));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_controllers&controllers=" . $controllers;
        $pagination->setUrl($url);
        $docu = docu_search_by("controllers", $controllers, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_father_id":
        $father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "" ) ? clean($_GET["father_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("father_id", $father_id));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_father_id&father_id=" . $father_id;
        $pagination->setUrl($url);
        $docu = docu_search_by("father_id", $father_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("title", $title));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $docu = docu_search_by("title", $title, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_post":
        $post = (isset($_GET["post"]) && $_GET["post"] != "" ) ? clean($_GET["post"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("post", $post));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_post&post=" . $post;
        $pagination->setUrl($url);
        $docu = docu_search_by("post", $post, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_h":
        $h = (isset($_GET["h"]) && $_GET["h"] != "" ) ? clean($_GET["h"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("h", $h));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_h&h=" . $h;
        $pagination->setUrl($url);
        $docu = docu_search_by("h", $h, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $docu = docu_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $docu = docu_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, docu_search($txt));
        // puede hacer falta
        $url = "index.php?c=docua=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $docu = docu_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$docu = docu_search($txt);
        break;
}


include view("docu", "index");
