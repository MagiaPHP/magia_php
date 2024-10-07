<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$transport = null;
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $transport = transport_search_by_id($txt);
        break;

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, transport_search($txt));
        // puede hacer falta
        $url = "index.php?c=transporta=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $transport = transport_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$transport = transport_search($txt);
        break;
}


include view("transport", "index");
