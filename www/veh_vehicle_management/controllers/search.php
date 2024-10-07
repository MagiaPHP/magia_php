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
# Fecha de creacion del documento: 2024-09-16 17:09:28 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicle_management = null;

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
        $veh_vehicle_management = veh_vehicle_management_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_maintenance_type":
        $maintenance_type = (isset($_GET["maintenance_type"]) && $_GET["maintenance_type"] != "" ) ? clean($_GET["maintenance_type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("maintenance_type", $maintenance_type));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_maintenance_type&maintenance_type=" . $maintenance_type;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("maintenance_type", $maintenance_type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_cost":
        $cost = (isset($_GET["cost"]) && $_GET["cost"] != "" ) ? clean($_GET["cost"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("cost", $cost));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_cost&cost=" . $cost;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("cost", $cost, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mileage":
        $mileage = (isset($_GET["mileage"]) && $_GET["mileage"] != "" ) ? clean($_GET["mileage"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("mileage", $mileage));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_mileage&mileage=" . $mileage;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("mileage", $mileage, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_next_due_date":
        $next_due_date = (isset($_GET["next_due_date"]) && $_GET["next_due_date"] != "" ) ? clean($_GET["next_due_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search_by("next_due_date", $next_due_date));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_management&a=search&w=by_next_due_date&next_due_date=" . $next_due_date;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search_by("next_due_date", $next_due_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_management_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_managementa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicle_management = veh_vehicle_management_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicle_management = veh_vehicle_management_search($txt);
        break;
}


include view("veh_vehicle_management", "index");      
