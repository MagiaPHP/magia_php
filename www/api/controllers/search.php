<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$api = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $api = api_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $api = api_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_api_key":
        $api_key = (isset($_GET["api_key"]) && $_GET["api_key"] != "" ) ? clean($_GET["api_key"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("api_key", $api_key));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_api_key&api_key=" . $api_key;
        $pagination->setUrl($url);
        $api = api_search_by("api_key", $api_key, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_crud":
        $crud = (isset($_GET["crud"]) && $_GET["crud"] != "" ) ? clean($_GET["crud"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("crud", $crud));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_crud&crud=" . $crud;
        $pagination->setUrl($url);
        $api = api_search_by("crud", $crud, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $api = api_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $api = api_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_requests_limit":
        $requests_limit = (isset($_GET["requests_limit"]) && $_GET["requests_limit"] != "" ) ? clean($_GET["requests_limit"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("requests_limit", $requests_limit));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_requests_limit&requests_limit=" . $requests_limit;
        $pagination->setUrl($url);
        $api = api_search_by("requests_limit", $requests_limit, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_limit_period":
        $limit_period = (isset($_GET["limit_period"]) && $_GET["limit_period"] != "" ) ? clean($_GET["limit_period"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("limit_period", $limit_period));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_limit_period&limit_period=" . $limit_period;
        $pagination->setUrl($url);
        $api = api_search_by("limit_period", $limit_period, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_requests_made":
        $requests_made = (isset($_GET["requests_made"]) && $_GET["requests_made"] != "" ) ? clean($_GET["requests_made"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("requests_made", $requests_made));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_requests_made&requests_made=" . $requests_made;
        $pagination->setUrl($url);
        $api = api_search_by("requests_made", $requests_made, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_last_request":
        $last_request = (isset($_GET["last_request"]) && $_GET["last_request"] != "" ) ? clean($_GET["last_request"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("last_request", $last_request));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_last_request&last_request=" . $last_request;
        $pagination->setUrl($url);
        $api = api_search_by("last_request", $last_request, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $api = api_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=api&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $api = api_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, api_search($txt));
        // puede hacer falta
        $url = "index.php?c=apia=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $api = api_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$api = api_search($txt);
        break;
}


include view("api", "index");      
