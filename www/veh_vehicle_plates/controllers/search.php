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
# Fecha de creacion del documento: 2024-09-16 17:09:32 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicle_plates = null;

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
        $veh_vehicle_plates = veh_vehicle_plates_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_plate":
        $plate = (isset($_GET["plate"]) && $_GET["plate"] != "" ) ? clean($_GET["plate"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("plate", $plate));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_plate&plate=" . $plate;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("plate", $plate, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_old_plate":
        $old_plate = (isset($_GET["old_plate"]) && $_GET["old_plate"] != "" ) ? clean($_GET["old_plate"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("old_plate", $old_plate));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_old_plate&old_plate=" . $old_plate;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("old_plate", $old_plate, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_plates&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_plates_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_platesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicle_plates = veh_vehicle_plates_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicle_plates = veh_vehicle_plates_search($txt);
        break;
}


include view("veh_vehicle_plates", "index");      
