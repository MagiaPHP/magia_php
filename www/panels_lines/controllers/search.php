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
# Fecha de creacion del documento: 2024-09-04 14:09:33 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$panels_lines = null;

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
        $panels_lines = panels_lines_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_panel_id":
        $panel_id = (isset($_GET["panel_id"]) && $_GET["panel_id"] != "" ) ? clean($_GET["panel_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("panel_id", $panel_id));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_panel_id&panel_id=" . $panel_id;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("panel_id", $panel_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_icon":
        $icon = (isset($_GET["icon"]) && $_GET["icon"] != "" ) ? clean($_GET["icon"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("icon", $icon));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_icon&icon=" . $icon;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("icon", $icon, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_label":
        $label = (isset($_GET["label"]) && $_GET["label"] != "" ) ? clean($_GET["label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("label", $label));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_label&label=" . $label;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("label", $label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_translate":
        $translate = (isset($_GET["translate"]) && $_GET["translate"] != "" ) ? clean($_GET["translate"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("translate", $translate));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_translate&translate=" . $translate;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("translate", $translate, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_url":
        $url = (isset($_GET["url"]) && $_GET["url"] != "" ) ? clean($_GET["url"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("url", $url));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_url&url=" . $url;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("url", $url, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_badge":
        $badge = (isset($_GET["badge"]) && $_GET["badge"] != "" ) ? clean($_GET["badge"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("badge", $badge));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_badge&badge=" . $badge;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("badge", $badge, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_action":
        $action = (isset($_GET["action"]) && $_GET["action"] != "" ) ? clean($_GET["action"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("action", $action));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_action&action=" . $action;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("action", $action, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=panels_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, panels_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=panels_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $panels_lines = panels_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$panels_lines = panels_lines_search($txt);
        break;
}


include view("panels_lines", "index");      
