<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$invoice_lines = null;
$w = (isset($_GET["w"])) ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $invoice_lines = invoice_lines_search_by_id($txt);
        $view = "index";
        break;
    case "client_id":
        $client_id = (isset($_GET["client_id"])) ? clean($_GET["client_id"]) : false;
        $invoice_lines = invoice_lines_search_by_client_id($client_id);
        //  vardump($client_id);
        $view = "index";
        break;

    case "dd": // description distinct
        //$txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;        
        $invoice_lines = invoice_lines_search_by_description_distinct();
        $view = "dd";
        break;

    case "description": // description distinct
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $invoice_lines = invoice_lines_search_by_description($txt);
        $view = "index";
        break;

    default:
        $txt = (isset($_GET["txt"])) ? clean($_GET["txt"]) : false;
        $invoice_lines = invoice_lines_search($txt);
        $view = "index";
        break;
}


################################################################################
if (!$error) {

    include view("invoice_lines", $view);
} else {
    include view("home", "pageError");
}
