<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$schedule = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  
$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $schedule = schedule_search_by_id($txt);
        break;
        

    #### --- ####################################################################
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_day":
        $day = (isset($_GET["day"]) && $_GET["day"] != "" ) ? clean($_GET["day"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("day", $day));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_day&day=" . $day;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("day", $day, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_am_start":
        $am_start = (isset($_GET["am_start"]) && $_GET["am_start"] != "" ) ? clean($_GET["am_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("am_start", $am_start));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_am_start&am_start=" . $am_start;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("am_start", $am_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_am_end":
        $am_end = (isset($_GET["am_end"]) && $_GET["am_end"] != "" ) ? clean($_GET["am_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("am_end", $am_end));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_am_end&am_end=" . $am_end;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("am_end", $am_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_pm_start":
        $pm_start = (isset($_GET["pm_start"]) && $_GET["pm_start"] != "" ) ? clean($_GET["pm_start"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("pm_start", $pm_start));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_pm_start&pm_start=" . $pm_start;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("pm_start", $pm_start, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_pm_end":
        $pm_end = (isset($_GET["pm_end"]) && $_GET["pm_end"] != "" ) ? clean($_GET["pm_end"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("pm_end", $pm_end));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_pm_end&pm_end=" . $pm_end;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("pm_end", $pm_end, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=schedule&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $schedule = schedule_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;
            

        #### --- ####################################################################
        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, schedule_search($txt));
        // puede hacer falta
        $url = "index.php?c=schedulea=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $schedule = schedule_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$schedule = schedule_search($txt);
        break;
}


include view("schedule", "index");      
