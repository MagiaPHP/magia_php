<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$subdomains_features = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $subdomains_features = subdomains_features_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_feature":
        $feature = (isset($_GET["feature"]) && $_GET["feature"] != "" ) ? clean($_GET["feature"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_features_search_by("feature", $feature));
        // puede hacer falta
        $url = "index.php?c=subdomains_features&a=search&w=by_feature&feature=" . $feature;
        $pagination->setUrl($url);
        $subdomains_features = subdomains_features_search_by("feature", $feature, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_features_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=subdomains_features&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $subdomains_features = subdomains_features_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_features_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=subdomains_features&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $subdomains_features = subdomains_features_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_features_search($txt));
        // puede hacer falta
        $url = "index.php?c=subdomains_featuresa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $subdomains_features = subdomains_features_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$subdomains_features = subdomains_features_search($txt);
        break;
}


include view("subdomains_features", "index");
