<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$backups = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $backups = backups_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        ################################################################################
        $pagination = new Pagination($page, backups_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=backups&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $backups = backups_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_subdomain":
        $subdomain = (isset($_GET["subdomain"]) && $_GET["subdomain"] != "" ) ? clean($_GET["subdomain"]) : false;
        ################################################################################
        $pagination = new Pagination($page, backups_search_by("subdomain", $subdomain));
        // puede hacer falta
        $url = "index.php?c=backups&a=search&w=by_subdomain&subdomain=" . $subdomain;
        $pagination->setUrl($url);
        $backups = backups_search_by("subdomain", $subdomain, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, backups_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=backups&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $backups = backups_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, backups_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=backups&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $backups = backups_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, backups_search($txt));
        // puede hacer falta
        $url = "index.php?c=backupsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $backups = backups_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$backups = backups_search($txt);
        break;
}


include view("backups", "index");      
