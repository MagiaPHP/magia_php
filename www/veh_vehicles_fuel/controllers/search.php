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
# Fecha de creacion del documento: 2024-09-16 17:09:42 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicles_fuel = null;

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
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_fuel_code":
        $fuel_code = (isset($_GET["fuel_code"]) && $_GET["fuel_code"] != "" ) ? clean($_GET["fuel_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("fuel_code", $fuel_code));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_fuel_code&fuel_code=" . $fuel_code;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("fuel_code", $fuel_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date":
        $date = (isset($_GET["date"]) && $_GET["date"] != "" ) ? clean($_GET["date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("date", $date));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_date&date=" . $date;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("date", $date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_paid_by":
        $paid_by = (isset($_GET["paid_by"]) && $_GET["paid_by"] != "" ) ? clean($_GET["paid_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("paid_by", $paid_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_paid_by&paid_by=" . $paid_by;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("paid_by", $paid_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_ref":
        $ref = (isset($_GET["ref"]) && $_GET["ref"] != "" ) ? clean($_GET["ref"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("ref", $ref));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_ref&ref=" . $ref;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("ref", $ref, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("notes", $notes));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_registred_by":
        $registred_by = (isset($_GET["registred_by"]) && $_GET["registred_by"] != "" ) ? clean($_GET["registred_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("registred_by", $registred_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_registred_by&registred_by=" . $registred_by;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("registred_by", $registred_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("date_registre", $date_registre));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_kl":
        $kl = (isset($_GET["kl"]) && $_GET["kl"] != "" ) ? clean($_GET["kl"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("kl", $kl));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_kl&kl=" . $kl;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("kl", $kl, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuel&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicles_fuel_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehicles_fuela=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicles_fuel = veh_vehicles_fuel_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicles_fuel = veh_vehicles_fuel_search($txt);
        break;
}


include view("veh_vehicles_fuel", "index");      
