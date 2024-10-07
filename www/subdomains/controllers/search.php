<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$subdomains = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $subdomains = subdomains_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_create_by":
        $create_by = (isset($_GET["create_by"]) && $_GET["create_by"] != "" ) ? clean($_GET["create_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("create_by", $create_by));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_create_by&create_by=" . $create_by;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("create_by", $create_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_plan":
        $plan = (isset($_GET["plan"]) && $_GET["plan"] != "" ) ? clean($_GET["plan"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("plan", $plan));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_plan&plan=" . $plan;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("plan", $plan, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_prefix":
        $prefix = (isset($_GET["prefix"]) && $_GET["prefix"] != "" ) ? clean($_GET["prefix"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("prefix", $prefix));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_prefix&prefix=" . $prefix;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("prefix", $prefix, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_subdomain":
        $subdomain = (isset($_GET["subdomain"]) && $_GET["subdomain"] != "" ) ? clean($_GET["subdomain"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("subdomain", $subdomain));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_subdomain&subdomain=" . $subdomain;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("subdomain", $subdomain, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_domain":
        $domain = (isset($_GET["domain"]) && $_GET["domain"] != "" ) ? clean($_GET["domain"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("domain", $domain));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_domain&domain=" . $domain;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("domain", $domain, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=subdomains&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $subdomains = subdomains_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, subdomains_search($txt));
        // puede hacer falta
        $url = "index.php?c=subdomainsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $subdomains = subdomains_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$subdomains = subdomains_search($txt);
        break;
}


include view("subdomains", "index");
