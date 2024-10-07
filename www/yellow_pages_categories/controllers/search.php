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
# Fecha de creacion del documento: 2024-09-21 12:09:22 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$yellow_pages_categories = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "yellow_pages_categories");

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
        $yellow_pages_categories = yellow_pages_categories_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_icon":
        $icon = (isset($_GET["icon"]) && $_GET["icon"] != "" ) ? clean($_GET["icon"]) : false;
        #################################################################################

        $pagination = new Pagination($page, yellow_pages_categories_search_by("icon", $icon, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=yellow_pages_categories&a=search&w=by_icon&icon=" . $icon;
        $pagination->setUrl($url);
        $yellow_pages_categories = yellow_pages_categories_search_by("icon", $icon, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_category":
        $category = (isset($_GET["category"]) && $_GET["category"] != "" ) ? clean($_GET["category"]) : false;
        #################################################################################

        $pagination = new Pagination($page, yellow_pages_categories_search_by("category", $category, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=yellow_pages_categories&a=search&w=by_category&category=" . $category;
        $pagination->setUrl($url);
        $yellow_pages_categories = yellow_pages_categories_search_by("category", $category, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, yellow_pages_categories_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=yellow_pages_categories&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $yellow_pages_categories = yellow_pages_categories_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, yellow_pages_categories_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=yellow_pages_categories&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $yellow_pages_categories = yellow_pages_categories_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, yellow_pages_categories_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=yellow_pages_categoriesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $yellow_pages_categories = yellow_pages_categories_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$yellow_pages_categories = yellow_pages_categories_search($txt);
        break;
}


include view("yellow_pages_categories", "index");      
