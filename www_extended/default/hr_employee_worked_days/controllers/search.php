<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$hr_employee_worked_days = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";

$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;

$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $hr_employee_worked_days = hr_employee_worked_days_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("employee_id", $employee_id));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        $date_plus_1 = (magia_dates_add_day($date, 1));
        $date_remove_1 = (magia_dates_remove_day($date, 1));
        ################################################################################
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        //---------------------------------------------------------------------
        $employees_list_by_day = array();

        foreach ($hr_employee_worked_days as $key => $employees_id_day) {
            array_push($employees_list_by_day, $employees_id_day["employee_id"]);
        }

        ################################################################################ 
        break;

    case "by_period":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        $date_plus_1 = (magia_dates_add_day($date_end, 1));
        $date_remove_1 = (magia_dates_remove_day($date_start, 1));
        ################################################################################
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by_period($date_start, $date_end));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_period&date_start=$date_start&date_end=$date_end";
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by_period($date_start, $date_end, $pagination->getStart(), $pagination->getLimit());
        //---------------------------------------------------------------------
        $employees_list_by_day = array();

        foreach ($hr_employee_worked_days as $key => $employees_id_day) {
            array_push($employees_list_by_day, $employees_id_day["employee_id"]);
        }

        ################################################################################ 
        break;

    case "by_month":
        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : date('m');
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : date('Y');

        // last day 
        $date_start = "$year-$month-01";

        $date_end = magia_dates_last_day_from_date($date_start);

        ################################################################################
        ################################################################################       
        $pagination = new Pagination($page, hr_employee_worked_days_search_by_period($date_start, $date_end));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_period&date_start=$date_start&date_end=$date_end";
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by_period($date_start, $date_end, $pagination->getStart(), $pagination->getLimit());
        //---------------------------------------------------------------------
        $employees_list_by_day = array();

        foreach ($hr_employee_worked_days as $key => $employees_id_day) {
            array_push($employees_list_by_day, $employees_id_day["employee_id"]);
        }

        ################################################################################ 
        break;

    case "by_start_am":
        $start_am = (isset($_GET["start_am"]) && $_GET["start_am"] != "" ) ? clean($_GET["start_am"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("start_am", $start_am));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_start_am&start_am=" . $start_am;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("start_am", $start_am, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_end_am":
        $end_am = (isset($_GET["end_am"]) && $_GET["end_am"] != "" ) ? clean($_GET["end_am"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("end_am", $end_am));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_end_am&end_am=" . $end_am;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("end_am", $end_am, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_lunch":
        $lunch = (isset($_GET["lunch"]) && $_GET["lunch"] != "" ) ? clean($_GET["lunch"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("lunch", $lunch));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_lunch&lunch=" . $lunch;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("lunch", $lunch, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_start_pm":
        $start_pm = (isset($_GET["start_pm"]) && $_GET["start_pm"] != "" ) ? clean($_GET["start_pm"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("start_pm", $start_pm));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_start_pm&start_pm=" . $start_pm;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("start_pm", $start_pm, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_end_pm":
        $end_pm = (isset($_GET["end_pm"]) && $_GET["end_pm"] != "" ) ? clean($_GET["end_pm"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("end_pm", $end_pm));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_end_pm&end_pm=" . $end_pm;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("end_pm", $end_pm, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_project_id":
        $project_id = (isset($_GET["project_id"]) && $_GET["project_id"] != "" ) ? clean($_GET["project_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("project_id", $project_id));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_project_id&project_id=" . $project_id;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("project_id", $project_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("notes", $notes));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, hr_employee_worked_days_search($txt));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_daysa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$hr_employee_worked_days = hr_employee_worked_days_search($txt);
        break;
}


include view("hr_employee_worked_days", "index");
