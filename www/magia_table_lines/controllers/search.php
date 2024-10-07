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
# Fecha de creacion del documento: 2024-08-31 17:08:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$magia_table_lines = null;

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
        $magia_table_lines = magia_table_lines_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_table_id":
        $table_id = (isset($_GET["table_id"]) && $_GET["table_id"] != "" ) ? clean($_GET["table_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("table_id", $table_id));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_table_id&table_id=" . $table_id;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("table_id", $table_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_header_icon":
        $header_icon = (isset($_GET["header_icon"]) && $_GET["header_icon"] != "" ) ? clean($_GET["header_icon"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("header_icon", $header_icon));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_header_icon&header_icon=" . $header_icon;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("header_icon", $header_icon, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_header_pre_label":
        $header_pre_label = (isset($_GET["header_pre_label"]) && $_GET["header_pre_label"] != "" ) ? clean($_GET["header_pre_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("header_pre_label", $header_pre_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_header_pre_label&header_pre_label=" . $header_pre_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("header_pre_label", $header_pre_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_header_label":
        $header_label = (isset($_GET["header_label"]) && $_GET["header_label"] != "" ) ? clean($_GET["header_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("header_label", $header_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_header_label&header_label=" . $header_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("header_label", $header_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_header_url":
        $header_url = (isset($_GET["header_url"]) && $_GET["header_url"] != "" ) ? clean($_GET["header_url"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("header_url", $header_url));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_header_url&header_url=" . $header_url;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("header_url", $header_url, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_header_post_label":
        $header_post_label = (isset($_GET["header_post_label"]) && $_GET["header_post_label"] != "" ) ? clean($_GET["header_post_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("header_post_label", $header_post_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_header_post_label&header_post_label=" . $header_post_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("header_post_label", $header_post_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body_icon":
        $body_icon = (isset($_GET["body_icon"]) && $_GET["body_icon"] != "" ) ? clean($_GET["body_icon"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("body_icon", $body_icon));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_body_icon&body_icon=" . $body_icon;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("body_icon", $body_icon, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body_pre_label":
        $body_pre_label = (isset($_GET["body_pre_label"]) && $_GET["body_pre_label"] != "" ) ? clean($_GET["body_pre_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("body_pre_label", $body_pre_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_body_pre_label&body_pre_label=" . $body_pre_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("body_pre_label", $body_pre_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body_label":
        $body_label = (isset($_GET["body_label"]) && $_GET["body_label"] != "" ) ? clean($_GET["body_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("body_label", $body_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_body_label&body_label=" . $body_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("body_label", $body_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body_post_label":
        $body_post_label = (isset($_GET["body_post_label"]) && $_GET["body_post_label"] != "" ) ? clean($_GET["body_post_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("body_post_label", $body_post_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_body_post_label&body_post_label=" . $body_post_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("body_post_label", $body_post_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_footer_icon":
        $footer_icon = (isset($_GET["footer_icon"]) && $_GET["footer_icon"] != "" ) ? clean($_GET["footer_icon"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("footer_icon", $footer_icon));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_footer_icon&footer_icon=" . $footer_icon;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("footer_icon", $footer_icon, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_footer_pre_label":
        $footer_pre_label = (isset($_GET["footer_pre_label"]) && $_GET["footer_pre_label"] != "" ) ? clean($_GET["footer_pre_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("footer_pre_label", $footer_pre_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_footer_pre_label&footer_pre_label=" . $footer_pre_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("footer_pre_label", $footer_pre_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_footer_label":
        $footer_label = (isset($_GET["footer_label"]) && $_GET["footer_label"] != "" ) ? clean($_GET["footer_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("footer_label", $footer_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_footer_label&footer_label=" . $footer_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("footer_label", $footer_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_footer_post_label":
        $footer_post_label = (isset($_GET["footer_post_label"]) && $_GET["footer_post_label"] != "" ) ? clean($_GET["footer_post_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("footer_post_label", $footer_post_label));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_footer_post_label&footer_post_label=" . $footer_post_label;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("footer_post_label", $footer_post_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_permission":
        $permission = (isset($_GET["permission"]) && $_GET["permission"] != "" ) ? clean($_GET["permission"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("permission", $permission));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_permission&permission=" . $permission;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("permission", $permission, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_align":
        $align = (isset($_GET["align"]) && $_GET["align"] != "" ) ? clean($_GET["align"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("align", $align));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_align&align=" . $align;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("align", $align, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_show":
        $show = (isset($_GET["show"]) && $_GET["show"] != "" ) ? clean($_GET["show"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("show", $show));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_show&show=" . $show;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("show", $show, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_translate":
        $translate = (isset($_GET["translate"]) && $_GET["translate"] != "" ) ? clean($_GET["translate"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("translate", $translate));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_translate&translate=" . $translate;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("translate", $translate, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=magia_table_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_table_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=magia_table_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $magia_table_lines = magia_table_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$magia_table_lines = magia_table_lines_search($txt);
        break;
}


include view("magia_table_lines", "index");      
