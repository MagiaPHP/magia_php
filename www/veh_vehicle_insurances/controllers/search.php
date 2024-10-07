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
# Fecha de creacion del documento: 2024-09-16 17:09:21 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_vehicle_insurances = null;

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
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_vehicle_id":
        $vehicle_id = (isset($_GET["vehicle_id"]) && $_GET["vehicle_id"] != "" ) ? clean($_GET["vehicle_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("vehicle_id", $vehicle_id));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_vehicle_id&vehicle_id=" . $vehicle_id;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("vehicle_id", $vehicle_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_insurance_code":
        $insurance_code = (isset($_GET["insurance_code"]) && $_GET["insurance_code"] != "" ) ? clean($_GET["insurance_code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("insurance_code", $insurance_code));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_insurance_code&insurance_code=" . $insurance_code;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("insurance_code", $insurance_code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_contrat_number":
        $contrat_number = (isset($_GET["contrat_number"]) && $_GET["contrat_number"] != "" ) ? clean($_GET["contrat_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("contrat_number", $contrat_number));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_contrat_number&contrat_number=" . $contrat_number;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("contrat_number", $contrat_number, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_countries_ok":
        $countries_ok = (isset($_GET["countries_ok"]) && $_GET["countries_ok"] != "" ) ? clean($_GET["countries_ok"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("countries_ok", $countries_ok));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_countries_ok&countries_ok=" . $countries_ok;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("countries_ok", $countries_ok, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurances&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_vehicle_insurances_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_vehicle_insurancesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_vehicle_insurances = veh_vehicle_insurances_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_vehicle_insurances = veh_vehicle_insurances_search($txt);
        break;
}


include view("veh_vehicle_insurances", "index");      
