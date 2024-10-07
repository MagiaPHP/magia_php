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
# Fecha de creacion del documento: 2024-09-22 18:09:01 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$docu = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "docu");

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
        $docu = docu_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_controllers":
        $controllers = (isset($_GET["controllers"]) && $_GET["controllers"] != "" ) ? clean($_GET["controllers"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("controllers", $controllers, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_controllers&controllers=" . $controllers;
        $pagination->setUrl($url);
        $docu = docu_search_by("controllers", $controllers, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_action":
        $action = (isset($_GET["action"]) && $_GET["action"] != "" ) ? clean($_GET["action"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("action", $action, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_action&action=" . $action;
        $pagination->setUrl($url);
        $docu = docu_search_by("action", $action, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_language":
        $language = (isset($_GET["language"]) && $_GET["language"] != "" ) ? clean($_GET["language"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("language", $language, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_language&language=" . $language;
        $pagination->setUrl($url);
        $docu = docu_search_by("language", $language, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_father_id":
        $father_id = (isset($_GET["father_id"]) && $_GET["father_id"] != "" ) ? clean($_GET["father_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("father_id", $father_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_father_id&father_id=" . $father_id;
        $pagination->setUrl($url);
        $docu = docu_search_by("father_id", $father_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_title":
        $title = (isset($_GET["title"]) && $_GET["title"] != "" ) ? clean($_GET["title"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("title", $title, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_title&title=" . $title;
        $pagination->setUrl($url);
        $docu = docu_search_by("title", $title, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_post":
        $post = (isset($_GET["post"]) && $_GET["post"] != "" ) ? clean($_GET["post"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("post", $post, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_post&post=" . $post;
        $pagination->setUrl($url);
        $docu = docu_search_by("post", $post, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_h":
        $h = (isset($_GET["h"]) && $_GET["h"] != "" ) ? clean($_GET["h"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("h", $h, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_h&h=" . $h;
        $pagination->setUrl($url);
        $docu = docu_search_by("h", $h, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $docu = docu_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=docu&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $docu = docu_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, docu_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=docua=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $docu = docu_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$docu = docu_search($txt);
        break;
}


include view("docu", "index");      
