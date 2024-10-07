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
# Fecha de creacion del documento: 2024-09-26 17:09:07 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$tasks = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "tasks");

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
        $tasks = tasks_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_category_id":
        $category_id = (isset($_GET["category_id"]) && $_GET["category_id"] != "" ) ? clean($_GET["category_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("category_id", $category_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_category_id&category_id=" . $category_id;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("category_id", $category_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("contact_id", $contact_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("title", $title, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("title", $title, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("description", $description, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("description", $description, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("controller", $controller, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_doc_id":
        $doc_id = (isset($_GET["doc_id"]) && $_GET["doc_id"] != "" ) ? clean($_GET["doc_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("doc_id", $doc_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_doc_id&doc_id=" . $doc_id;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("doc_id", $doc_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("date_registre", $date_registre, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_update":
        $date_update = (isset($_GET["date_update"]) && $_GET["date_update"] != "" ) ? clean($_GET["date_update"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("date_update", $date_update, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_date_update&date_update=" . $date_update;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("date_update", $date_update, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_color":
        $color = (isset($_GET["color"]) && $_GET["color"] != "" ) ? clean($_GET["color"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("color", $color, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_color&color=" . $color;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("color", $color, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $tasks = tasks_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=tasksa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $tasks = tasks_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$tasks = tasks_search($txt);
        break;
}


include view("tasks", "index");      
