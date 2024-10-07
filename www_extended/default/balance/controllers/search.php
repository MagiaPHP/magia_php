<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$balance = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
$txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;

switch ($w) {
    case "id":
    case "client_id":
    case "expense_id":
    case "invoice_id":
    case "credit_note_id":
    case "type":
    case "account_number":
    case "sub_total":
    case "tax":
    case "total":
    case "ref":
    case "description":
    case "ce":
    case "date":
    case "date_registre":
    case "canceled_code":
        $pagination = new Pagination($page, balance_search_by_($w, $txt));
        // puede hacer falta
        //$pagination->setUrl($url);
        $balance = balance_search_by_($w, $txt, $pagination->getStart(), $pagination->getLimit());
        break;
    case "all":
        $pagination = new Pagination($page, balance_search($txt));
        // puede hacer falta
        //$pagination->setUrl($url);
        $balance = balance_search($txt, $pagination->getStart(), $pagination->getLimit());
        break;
    default:
        $pagination = new Pagination($page, balance_search($txt));
        // puede hacer falta
        //$pagination->setUrl($url);
        $balance = balance_search($txt, $pagination->getStart(), $pagination->getLimit());
        break;
}

################################################################################
//switch ($w) {
//    case "id":
//        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
//        ################################################################################
//        $pagination = new Pagination($page, balance_search_by_('id', $txt));
//        // puede hacer falta
//        //$pagination->setUrl($url);
//        $balance = balance_search_by_("id", $txt, $pagination->getStart(), $pagination->getLimit());
//        ################################################################################
//        break;
//
//    case "client_id":
//        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
//        ################################################################################
//        $pagination = new Pagination($page, balance_search_by_('client_id', $txt));
//        // puede hacer falta
//        //$pagination->setUrl($url);
//        $balance = balance_search_by_("client_id", $txt, $pagination->getStart(), $pagination->getLimit());
//        ################################################################################
//        break;
//
//    case "cancelCode":
//        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
//        ################################################################################
//        $pagination = new Pagination($page, balance_search_by_('canceled_code', $txt));
//        // puede hacer falta
//        //$pagination->setUrl($url);
//        $balance = balance_search_by_("canceled_code", $txt, $pagination->getStart(), $pagination->getLimit());
//        ################################################################################
////        $balance = balance_search_by_codeCancel($txt);
//        break;
//
//    case "short":
//        ########################################################################
//        $year = (isset($_REQUEST["year"]) && isset($_REQUEST["year"]) != "") ? clean($_REQUEST["year"]) : date("Y");
//        $m = (isset($_REQUEST["m"]) && isset($_REQUEST["m"]) != "") ? clean($_REQUEST["m"]) : false;
//        $only_cancelled = (isset($_REQUEST["only_cancelled"]) && isset($_REQUEST["only_cancelled"]) != "") ? clean($_REQUEST["only_cancelled"]) : null;
//        $order_by = (isset($_REQUEST["order_by"]) && isset($_REQUEST["order_by"]) != "") ? clean($_REQUEST["order_by"]) : null;
//
//        // si es por trimerstres
//        if ($m == "t1" || $m == "t2" || $m == "t3" || $m == "t4") {
//            // pongo por trimestre
//            //------------------------------------------------------------------
//            $pagination = new Pagination($page, balance_search_by_year_trimestre_status($year, $m, $only_cancelled, $order_by));
//            //
//            $balance = balance_search_by_year_trimestre_status($year, $m, $only_cancelled, $order_by, $pagination->getStart(), $pagination->getLimit());
//            //------------------------------------------------------------------
//        } else {
//            $pagination = new Pagination($page, balance_search_by_year_month_status($year, $m, $only_cancelled, $order_by, $pagination->getStart(), $pagination->getLimit()));
//            // pongo por mes
//            $balance = balance_search_by_year_month_status($year, $m, $only_cancelled, $order_by, $pagination->getStart(), $pagination->getLimit());
//        }
//        ########################################################################
//        break;
//
//    default:
//        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
//        ################################################################################
//        $pagination = new Pagination($page, balance_search($txt));
//        // puede hacer falta
//        //$pagination->setUrl($url);
//        $balance = balance_search($txt, $pagination->getStart(), $pagination->getLimit());
//        ################################################################################
////        $balance = balance_search();
//        break;
//}

include view("balance", "index");

