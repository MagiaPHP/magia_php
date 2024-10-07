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
# Fecha de creacion del documento: 2024-08-30 13:08:28 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$sorting_items = null;

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
        $sorting_items = sorting_items_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        #################################################################################

        $pagination = new Pagination($page, sorting_items_search_by("title", $title));
        // puede hacer falta
        $url = "index.php?c=sorting_items&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $sorting_items = sorting_items_search_by("title", $title, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, sorting_items_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=sorting_items&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $sorting_items = sorting_items_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_position_order":
        $position_order = (isset($_GET["position_order"]) && $_GET["position_order"] != "" ) ? clean($_GET["position_order"]) : false;
        #################################################################################

        $pagination = new Pagination($page, sorting_items_search_by("position_order", $position_order));
        // puede hacer falta
        $url = "index.php?c=sorting_items&a=search&w=by_position_order&position_order=" . $position_order;
        $pagination->setUrl($url);
        $sorting_items = sorting_items_search_by("position_order", $position_order, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, sorting_items_search($txt));
        // puede hacer falta
        $url = "index.php?c=sorting_itemsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $sorting_items = sorting_items_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$sorting_items = sorting_items_search($txt);
        break;
}


include view("sorting_items", "index");      
