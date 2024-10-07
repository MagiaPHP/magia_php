<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}

$agenda = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";

$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;

$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $agenda = agenda_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    case "by_place_id": // lugar donde se hace el evento
        $place_id = (isset($_GET["place_id"]) && $_GET["place_id"] != "" ) ? clean($_GET["place_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("title", $title));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("title", $title, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_category_id":
        $category_id = (isset($_GET["category_id"]) && $_GET["category_id"] != "" ) ? clean($_GET["category_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by_category_id($category_id));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_category_id&category_id=" . $category_id;
        $pagination->setUrl($url);
        $agenda = agenda_search_by_category_id($category_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_public_id":
        $public_id = (isset($_GET["public_id"]) && $_GET["public_id"] != "" ) ? clean($_GET["public_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("public_id", $public_id));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_public_id&public_id=" . $public_id;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("public_id", $public_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_allow_comments":
        $allow_comments = (isset($_GET["allow_comments"]) && $_GET["allow_comments"] != "" ) ? clean($_GET["allow_comments"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("allow_comments", $allow_comments));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_allow_comments&allow_comments=" . $allow_comments;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("allow_comments", $allow_comments, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
    #####################################################################################
    case "xxxxxxxxxxxxxxxxxx": // en todo el Ecuador
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=agenda&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $agenda = agenda_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $when = (isset($_GET["when"]) && $_GET["when"] != "" ) ? clean($_GET["when"]) : false;
        $province = (isset($_GET["province"]) && $_GET["province"] != "" ) ? clean($_GET["province"]) : false;
        ################################################################################
        $pagination = new Pagination($page, agenda_search_default($txt));
        // puede hacer falta
        $url = "index.php?c=agendaa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $agenda = agenda_search_default($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$agenda = agenda_search($txt);
        break;
}


include view("public_html", "index");
