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
# Fecha de creacion del documento: 2024-09-16 17:09:09 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_maintenance = null;

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
        $veh_maintenance = veh_maintenance_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_workshop_id":
        $workshop_id = (isset($_GET["workshop_id"]) && $_GET["workshop_id"] != "" ) ? clean($_GET["workshop_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("workshop_id", $workshop_id));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_workshop_id&workshop_id=" . $workshop_id;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("workshop_id", $workshop_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_next_visit":
        $next_visit = (isset($_GET["next_visit"]) && $_GET["next_visit"] != "" ) ? clean($_GET["next_visit"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("next_visit", $next_visit));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_next_visit&next_visit=" . $next_visit;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("next_visit", $next_visit, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_kl":
        $kl = (isset($_GET["kl"]) && $_GET["kl"] != "" ) ? clean($_GET["kl"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("kl", $kl));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_kl&kl=" . $kl;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("kl", $kl, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("notes", $notes));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_maintenancea=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_maintenance = veh_maintenance_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_maintenance = veh_maintenance_search($txt);
        break;
}


include view("veh_maintenance", "index");      
