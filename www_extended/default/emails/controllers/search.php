<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$emails = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $emails = emails_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_father_id":
        $father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "" ) ? clean($_GET["father_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("father_id", $father_id));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_father_id&father_id=" . $father_id;
        $pagination->setUrl($url);
        $emails = emails_search_by("father_id", $father_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_sender_id":
        $sender_id = (isset($_GET["sender_id"]) && $_GET["sender_id"] != "" ) ? clean($_GET["sender_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("sender_id", $sender_id));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_sender_id&sender_id=" . $sender_id;
        $pagination->setUrl($url);
        $emails = emails_search_by("sender_id", $sender_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_reciver_id":
        $reciver_id = (isset($_GET["reciver_id"]) && $_GET["reciver_id"] != "" ) ? clean($_GET["reciver_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("reciver_id", $reciver_id));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_reciver_id&reciver_id=" . $reciver_id;
        $pagination->setUrl($url);
        $emails = emails_search_by("reciver_id", $reciver_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_folder":
        $folder = (isset($_GET["folder"]) && $_GET["folder"] != "" ) ? clean($_GET["folder"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("folder", $folder));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_folder&folder=" . $folder;
        $pagination->setUrl($url);
        $emails = emails_search_by("folder", $folder, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_subjet":
        $subjet = (isset($_GET["subjet"]) && $_GET["subjet"] != "" ) ? clean($_GET["subjet"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("subjet", $subjet));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_subjet&subjet=" . $subjet;
        $pagination->setUrl($url);
        $emails = emails_search_by("subjet", $subjet, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_message":
        $message = (isset($_GET["message"]) && $_GET["message"] != "" ) ? clean($_GET["message"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("message", $message));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_message&message=" . $message;
        $pagination->setUrl($url);
        $emails = emails_search_by("message", $message, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $emails = emails_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_read":
        $date_read = (isset($_GET["date_read"]) && $_GET["date_read"] != "" ) ? clean($_GET["date_read"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("date_read", $date_read));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_date_read&date_read=" . $date_read;
        $pagination->setUrl($url);
        $emails = emails_search_by("date_read", $date_read, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $emails = emails_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $emails = emails_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################
    #### --- ####################################################################
    #### --- ####################################################################
    #### --- ####################################################################
    #### --- ####################################################################
    #### --- ####################################################################



    case "by_folder_reciver":
        $folder = (isset($_GET["folder"]) && $_GET["folder"] != "" ) ? clean($_GET["folder"]) : false;
        $reciver_id = (isset($_GET["reciver_id"]) && $_GET["reciver_id"] != "" ) ? clean($_GET["reciver_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search_by_folder_reciver($folder, $reciver_id));
        // puede hacer falta
        $url = "index.php?c=emails&a=search&w=by_folder_reciver&folder=" . $folder . "&reciver=" . $reciver_id;
        $pagination->setUrl($url);
        $emails = emails_search_by_folder_reciver("folder", $reciver_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, emails_search($txt));
        // puede hacer falta
        $url = "index.php?c=emailsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $emails = emails_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$emails = emails_search($txt);
        break;
}


include view("emails", "search");
