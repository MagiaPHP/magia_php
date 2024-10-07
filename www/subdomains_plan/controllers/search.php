<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$subdomains_plan = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $subdomains_plan = subdomains_plan_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_plan":
        $plan = (isset($_GET["plan"]) && $_GET["plan"] != "" ) ? clean($_GET["plan"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_plan_search_by("plan", $plan));
        // puede hacer falta
        $url = "index.php?c=subdomains_plan&a=search&w=by_plan&plan=" . $plan;
        $pagination->setUrl($url);
        $subdomains_plan = subdomains_plan_search_by("plan", $plan, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_features":
        $features = (isset($_GET["features"]) && $_GET["features"] != "" ) ? clean($_GET["features"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_plan_search_by("features", $features));
        // puede hacer falta
        $url = "index.php?c=subdomains_plan&a=search&w=by_features&features=" . $features;
        $pagination->setUrl($url);
        $subdomains_plan = subdomains_plan_search_by("features", $features, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_plan_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=subdomains_plan&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $subdomains_plan = subdomains_plan_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_plan_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=subdomains_plan&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $subdomains_plan = subdomains_plan_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_plan_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=subdomains_plan&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $subdomains_plan = subdomains_plan_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_plan_search($txt));
        // puede hacer falta
        $url = "index.php?c=subdomains_plana=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $subdomains_plan = subdomains_plan_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$subdomains_plan = subdomains_plan_search($txt);
        break;
}


include view("subdomains_plan", "index");
