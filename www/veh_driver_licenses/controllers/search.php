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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_driver_licenses = null;

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
        $veh_driver_licenses = veh_driver_licenses_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_category":
        $category = (isset($_GET["category"]) && $_GET["category"] != "" ) ? clean($_GET["category"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("category", $category));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_category&category=" . $category;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("category", $category, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_min_age":
        $min_age = (isset($_GET["min_age"]) && $_GET["min_age"] != "" ) ? clean($_GET["min_age"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("min_age", $min_age));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_min_age&min_age=" . $min_age;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("min_age", $min_age, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_max_weight":
        $max_weight = (isset($_GET["max_weight"]) && $_GET["max_weight"] != "" ) ? clean($_GET["max_weight"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("max_weight", $max_weight));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_max_weight&max_weight=" . $max_weight;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("max_weight", $max_weight, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_max_passengers":
        $max_passengers = (isset($_GET["max_passengers"]) && $_GET["max_passengers"] != "" ) ? clean($_GET["max_passengers"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("max_passengers", $max_passengers));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_max_passengers&max_passengers=" . $max_passengers;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("max_passengers", $max_passengers, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("notes", $notes));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licenses&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_driver_licenses_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_driver_licensesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_driver_licenses = veh_driver_licenses_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_driver_licenses = veh_driver_licenses_search($txt);
        break;
}


include view("veh_driver_licenses", "index");      
