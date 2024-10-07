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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$veh_maintenance_lines = null;

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
        $veh_maintenance_lines = veh_maintenance_lines_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_maintenance_id":
        $maintenance_id = (isset($_GET["maintenance_id"]) && $_GET["maintenance_id"] != "" ) ? clean($_GET["maintenance_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("maintenance_id", $maintenance_id));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_maintenance_id&maintenance_id=" . $maintenance_id;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("maintenance_id", $maintenance_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_price":
        $price = (isset($_GET["price"]) && $_GET["price"] != "" ) ? clean($_GET["price"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("price", $price));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_price&price=" . $price;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("price", $price, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_quantity":
        $quantity = (isset($_GET["quantity"]) && $_GET["quantity"] != "" ) ? clean($_GET["quantity"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("quantity", $quantity));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_quantity&quantity=" . $quantity;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("quantity", $quantity, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_total":
        $total = (isset($_GET["total"]) && $_GET["total"] != "" ) ? clean($_GET["total"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("total", $total));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_total&total=" . $total;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("total", $total, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, veh_maintenance_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=veh_maintenance_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $veh_maintenance_lines = veh_maintenance_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$veh_maintenance_lines = veh_maintenance_lines_search($txt);
        break;
}


include view("veh_maintenance_lines", "index");      
