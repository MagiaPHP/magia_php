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
# Fecha de creacion del documento: 2024-09-16 17:09:55 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_drivers = null;

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
        $veh_drivers = veh_drivers_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_country":
        $country = (isset($_GET["country"]) && $_GET["country"] != "" ) ? clean($_GET["country"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("country", $country));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_country&country=" . $country;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("country", $country, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_license":
        $license = (isset($_GET["license"]) && $_GET["license"] != "" ) ? clean($_GET["license"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("license", $license));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_license&license=" . $license;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("license", $license, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("type", $type));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("type", $type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_number":
        $number = (isset($_GET["number"]) && $_GET["number"] != "" ) ? clean($_GET["number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("number", $number));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_number&number=" . $number;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("number", $number, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("date_start", $date_start));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("date_end", $date_end));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_expired":
        $expired = (isset($_GET["expired"]) && $_GET["expired"] != "" ) ? clean($_GET["expired"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("expired", $expired));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_expired&expired=" . $expired;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("expired", $expired, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_drivers&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_drivers_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_driversa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_drivers = veh_drivers_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_drivers = veh_drivers_search($txt);
        break;
}


include view("veh_drivers", "index");      
