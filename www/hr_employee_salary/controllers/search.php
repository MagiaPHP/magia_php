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
# Fecha de creacion del documento: 2024-09-21 12:09:36 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$hr_employee_salary = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "hr_employee_salary");

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
        $hr_employee_salary = hr_employee_salary_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("employee_id", $employee_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_month":
        $month = (isset($_GET["month"]) && $_GET["month"] != "" ) ? clean($_GET["month"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("month", $month, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_month&month=" . $month;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("month", $month, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_hour":
        $hour = (isset($_GET["hour"]) && $_GET["hour"] != "" ) ? clean($_GET["hour"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("hour", $hour, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_hour&hour=" . $hour;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("hour", $hour, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("date_start", $date_start, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("date_end", $date_end, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salary&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_salary_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=hr_employee_salarya=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_employee_salary = hr_employee_salary_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$hr_employee_salary = hr_employee_salary_search($txt);
        break;
}


include view("hr_employee_salary", "index");      
