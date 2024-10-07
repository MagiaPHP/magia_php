<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$reminders_invoices = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $reminders_invoices = reminders_invoices_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_invoice_id":
        $invoice_id = (isset($_GET["invoice_id"]) && $_GET["invoice_id"] != "" ) ? clean($_GET["invoice_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("invoice_id", $invoice_id));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_invoice_id&invoice_id=" . $invoice_id;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("invoice_id", $invoice_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_invoice_solde":
        $invoice_solde = (isset($_GET["invoice_solde"]) && $_GET["invoice_solde"] != "" ) ? clean($_GET["invoice_solde"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("invoice_solde", $invoice_solde));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_invoice_solde&invoice_solde=" . $invoice_solde;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("invoice_solde", $invoice_solde, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_reminder":
        $reminder = (isset($_GET["reminder"]) && $_GET["reminder"] != "" ) ? clean($_GET["reminder"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("reminder", $reminder));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_reminder&reminder=" . $reminder;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("reminder", $reminder, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_reminder_percent":
        $reminder_percent = (isset($_GET["reminder_percent"]) && $_GET["reminder_percent"] != "" ) ? clean($_GET["reminder_percent"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("reminder_percent", $reminder_percent));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_reminder_percent&reminder_percent=" . $reminder_percent;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("reminder_percent", $reminder_percent, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_invoice_to_add_id":
        $invoice_to_add_id = (isset($_GET["invoice_to_add_id"]) && $_GET["invoice_to_add_id"] != "" ) ? clean($_GET["invoice_to_add_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("invoice_to_add_id", $invoice_to_add_id));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_invoice_to_add_id&invoice_to_add_id=" . $invoice_to_add_id;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("invoice_to_add_id", $invoice_to_add_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=reminders_invoices&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, reminders_invoices_search($txt));
        // puede hacer falta
        $url = "index.php?c=reminders_invoicesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $reminders_invoices = reminders_invoices_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$reminders_invoices = reminders_invoices_search($txt);
        break;
}


include view("reminders_invoices", "index");
