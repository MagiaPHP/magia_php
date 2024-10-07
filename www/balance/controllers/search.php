<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$balance = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $balance = balance_search_by_id($txt);
        break;

    case "by_client_id":
        $client_id = (isset($_GET["client_id"])) ? clean($_GET["client_id"]) : false;
        $balance = balance_search_by_client_id($client_id);
        break;

    case "cancelCode":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, balance_search_by_codeCancel($txt));
        // puede hacer falta
        //$pagination->setUrl($url);
        $balance = balance_search_by_codeCancel($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
        $balance = balance_search_by_codeCancel($txt);
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, balance_search($txt));
        // puede hacer falta
        //$pagination->setUrl($url);
        $balance = balance_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################
//        $balance = balance_search();
        break;
}

include view("balance", "index");
