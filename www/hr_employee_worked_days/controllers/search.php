<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:42 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$hr_employee_worked_days = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "hr_employee_worked_days");

# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

#################################################################################

#################################################################################

switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $hr_employee_worked_days = hr_employee_worked_days_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("employee_id", $employee_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("date", $date, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("date", $date, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_start_am":
        $start_am = (isset($_GET["start_am"]) && $_GET["start_am"] != "" ) ? clean($_GET["start_am"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("start_am", $start_am, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_start_am&start_am=" . $start_am;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("start_am", $start_am, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_end_am":
        $end_am = (isset($_GET["end_am"]) && $_GET["end_am"] != "" ) ? clean($_GET["end_am"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("end_am", $end_am, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_end_am&end_am=" . $end_am;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("end_am", $end_am, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_lunch":
        $lunch = (isset($_GET["lunch"]) && $_GET["lunch"] != "" ) ? clean($_GET["lunch"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("lunch", $lunch, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_lunch&lunch=" . $lunch;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("lunch", $lunch, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_start_pm":
        $start_pm = (isset($_GET["start_pm"]) && $_GET["start_pm"] != "" ) ? clean($_GET["start_pm"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("start_pm", $start_pm, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_start_pm&start_pm=" . $start_pm;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("start_pm", $start_pm, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_end_pm":
        $end_pm = (isset($_GET["end_pm"]) && $_GET["end_pm"] != "" ) ? clean($_GET["end_pm"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("end_pm", $end_pm, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_end_pm&end_pm=" . $end_pm;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("end_pm", $end_pm, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_total_hours":
        $total_hours = (isset($_GET["total_hours"]) && $_GET["total_hours"] != "" ) ? clean($_GET["total_hours"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("total_hours", $total_hours, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_total_hours&total_hours=" . $total_hours;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("total_hours", $total_hours, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_project_id":
        $project_id = (isset($_GET["project_id"]) && $_GET["project_id"] != "" ) ? clean($_GET["project_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("project_id", $project_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_project_id&project_id=" . $project_id;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("project_id", $project_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("notes", $notes, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_year":
        $year = (isset($_GET["year"]) && $_GET["year"] != "" ) ? clean($_GET["year"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("year", $year, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_year&year=" . $year;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("year", $year, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_month":
        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search_by("month", $month, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_days&a=search&w=by_month&month=" . $month;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search_by("month", $month, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_worked_days_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=hr_employee_worked_daysa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_employee_worked_days = hr_employee_worked_days_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$hr_employee_worked_days = hr_employee_worked_days_search($txt);
        break;
}


include view("hr_employee_worked_days", "index");      
