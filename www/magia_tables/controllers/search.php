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
# Fecha de creacion del documento: 2024-08-31 17:08:56 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$magia_tables = null;

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
        $magia_tables = magia_tables_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_label":
        $label = (isset($_GET["label"]) && $_GET["label"] != "" ) ? clean($_GET["label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("label", $label));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_label&label=" . $label;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("label", $label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_action":
        $action = (isset($_GET["action"]) && $_GET["action"] != "" ) ? clean($_GET["action"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("action", $action));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_action&action=" . $action;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("action", $action, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=magia_tables&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_tables_search($txt));
        // puede hacer falta
        $url = "index.php?c=magia_tablesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $magia_tables = magia_tables_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$magia_tables = magia_tables_search($txt);
        break;
}


include view("magia_tables", "index");      
