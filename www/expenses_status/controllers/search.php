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
# Fecha de creacion del documento: 2024-09-14 09:09:06 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$expenses_status = null;

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
        $expenses_status = expenses_status_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_code":
        $code = (isset($_GET["code"]) && $_GET["code"] != "" ) ? clean($_GET["code"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search_by("code", $code));
        // puede hacer falta
        $url = "index.php?c=expenses_status&a=search&w=by_code&code=" . $code;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search_by("code", $code, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search_by("name", $name));
        // puede hacer falta
        $url = "index.php?c=expenses_status&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search_by("name", $name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_icon":
        $icon = (isset($_GET["icon"]) && $_GET["icon"] != "" ) ? clean($_GET["icon"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search_by("icon", $icon));
        // puede hacer falta
        $url = "index.php?c=expenses_status&a=search&w=by_icon&icon=" . $icon;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search_by("icon", $icon, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_color":
        $color = (isset($_GET["color"]) && $_GET["color"] != "" ) ? clean($_GET["color"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search_by("color", $color));
        // puede hacer falta
        $url = "index.php?c=expenses_status&a=search&w=by_color&color=" . $color;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search_by("color", $color, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=expenses_status&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=expenses_status&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, expenses_status_search($txt));
        // puede hacer falta
        $url = "index.php?c=expenses_statusa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $expenses_status = expenses_status_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$expenses_status = expenses_status_search($txt);
        break;
}


include view("expenses_status", "index");      
