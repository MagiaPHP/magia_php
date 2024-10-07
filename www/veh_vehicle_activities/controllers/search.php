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
# Fecha de creacion del documento: 2024-09-16 17:09:17 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicle_activities = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  

$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  

$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;


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
        $veh_vehicle_activities = veh_vehicle_activities_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_driver_id":
        $driver_id = (isset($_GET["driver_id"]) && $_GET["driver_id"] != "" ) ? clean($_GET["driver_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("driver_id", $driver_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_driver_id&driver_id=" . $driver_id;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("driver_id", $driver_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_start_date":
        $start_date = (isset($_GET["start_date"]) && $_GET["start_date"] != "" ) ? clean($_GET["start_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("start_date", $start_date));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_start_date&start_date=" . $start_date;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("start_date", $start_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_time_start":
        $time_start = (isset($_GET["time_start"]) && $_GET["time_start"] != "" ) ? clean($_GET["time_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("time_start", $time_start));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_time_start&time_start=" . $time_start;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("time_start", $time_start, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_kl_start":
        $kl_start = (isset($_GET["kl_start"]) && $_GET["kl_start"] != "" ) ? clean($_GET["kl_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("kl_start", $kl_start));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_kl_start&kl_start=" . $kl_start;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("kl_start", $kl_start, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_end_date":
        $end_date = (isset($_GET["end_date"]) && $_GET["end_date"] != "" ) ? clean($_GET["end_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("end_date", $end_date));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_end_date&end_date=" . $end_date;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("end_date", $end_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_time_end":
        $time_end = (isset($_GET["time_end"]) && $_GET["time_end"] != "" ) ? clean($_GET["time_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("time_end", $time_end));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_time_end&time_end=" . $time_end;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("time_end", $time_end, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_kl_end":
        $kl_end = (isset($_GET["kl_end"]) && $_GET["kl_end"] != "" ) ? clean($_GET["kl_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("kl_end", $kl_end));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_kl_end&kl_end=" . $kl_end;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("kl_end", $kl_end, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_kl_difference":
        $kl_difference = (isset($_GET["kl_difference"]) && $_GET["kl_difference"] != "" ) ? clean($_GET["kl_difference"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search_by("kl_difference", $kl_difference));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activities&a=search&w=by_kl_difference&kl_difference=" . $kl_difference;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search_by("kl_difference", $kl_difference, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_activities_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_activitiesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicle_activities = veh_vehicle_activities_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicle_activities = veh_vehicle_activities_search($txt);
        break;
}


include view("veh_vehicle_activities", "index");      
