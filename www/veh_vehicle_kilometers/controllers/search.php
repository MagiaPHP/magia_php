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
# Fecha de creacion del documento: 2024-09-16 17:09:25 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicle_kilometers = null;

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
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_event_date":
        $event_date = (isset($_GET["event_date"]) && $_GET["event_date"] != "" ) ? clean($_GET["event_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("event_date", $event_date));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_event_date&event_date=" . $event_date;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("event_date", $event_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_kl":
        $kl = (isset($_GET["kl"]) && $_GET["kl"] != "" ) ? clean($_GET["kl"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("kl", $kl));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_kl&kl=" . $kl;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("kl", $kl, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_event_type":
        $event_type = (isset($_GET["event_type"]) && $_GET["event_type"] != "" ) ? clean($_GET["event_type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("event_type", $event_type));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_event_type&event_type=" . $event_type;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("event_type", $event_type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_event_id":
        $event_id = (isset($_GET["event_id"]) && $_GET["event_id"] != "" ) ? clean($_GET["event_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("event_id", $event_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_event_id&event_id=" . $event_id;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("event_id", $event_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_created_at":
        $created_at = (isset($_GET["created_at"]) && $_GET["created_at"] != "" ) ? clean($_GET["created_at"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("created_at", $created_at));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_created_at&created_at=" . $created_at;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("created_at", $created_at, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometers&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_kilometers_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_kilometersa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicle_kilometers = veh_vehicle_kilometers_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicle_kilometers = veh_vehicle_kilometers_search($txt);
        break;
}


include view("veh_vehicle_kilometers", "index");      
