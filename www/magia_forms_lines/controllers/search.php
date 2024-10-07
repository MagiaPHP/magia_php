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
# Fecha de creacion del documento: 2024-08-31 17:08:35 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$magia_forms_lines = null;

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
        $magia_forms_lines = magia_forms_lines_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_mg_form_id":
        $mg_form_id = (isset($_GET["mg_form_id"]) && $_GET["mg_form_id"] != "" ) ? clean($_GET["mg_form_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_form_id", $mg_form_id));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_form_id&mg_form_id=" . $mg_form_id;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_form_id", $mg_form_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_type":
        $mg_type = (isset($_GET["mg_type"]) && $_GET["mg_type"] != "" ) ? clean($_GET["mg_type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_type", $mg_type));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_type&mg_type=" . $mg_type;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_type", $mg_type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_external_table":
        $mg_external_table = (isset($_GET["mg_external_table"]) && $_GET["mg_external_table"] != "" ) ? clean($_GET["mg_external_table"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_external_table", $mg_external_table));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_external_table&mg_external_table=" . $mg_external_table;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_external_table", $mg_external_table, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_external_col":
        $mg_external_col = (isset($_GET["mg_external_col"]) && $_GET["mg_external_col"] != "" ) ? clean($_GET["mg_external_col"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_external_col", $mg_external_col));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_external_col&mg_external_col=" . $mg_external_col;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_external_col", $mg_external_col, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_label":
        $mg_label = (isset($_GET["mg_label"]) && $_GET["mg_label"] != "" ) ? clean($_GET["mg_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_label", $mg_label));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_label&mg_label=" . $mg_label;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_label", $mg_label, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_help_text":
        $mg_help_text = (isset($_GET["mg_help_text"]) && $_GET["mg_help_text"] != "" ) ? clean($_GET["mg_help_text"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_help_text", $mg_help_text));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_help_text&mg_help_text=" . $mg_help_text;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_help_text", $mg_help_text, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_name":
        $mg_name = (isset($_GET["mg_name"]) && $_GET["mg_name"] != "" ) ? clean($_GET["mg_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_name", $mg_name));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_name&mg_name=" . $mg_name;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_name", $mg_name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_id":
        $mg_id = (isset($_GET["mg_id"]) && $_GET["mg_id"] != "" ) ? clean($_GET["mg_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_id", $mg_id));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_id&mg_id=" . $mg_id;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_id", $mg_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_placeholder":
        $mg_placeholder = (isset($_GET["mg_placeholder"]) && $_GET["mg_placeholder"] != "" ) ? clean($_GET["mg_placeholder"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_placeholder", $mg_placeholder));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_placeholder&mg_placeholder=" . $mg_placeholder;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_placeholder", $mg_placeholder, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_value":
        $mg_value = (isset($_GET["mg_value"]) && $_GET["mg_value"] != "" ) ? clean($_GET["mg_value"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_value", $mg_value));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_value&mg_value=" . $mg_value;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_value", $mg_value, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_class":
        $mg_class = (isset($_GET["mg_class"]) && $_GET["mg_class"] != "" ) ? clean($_GET["mg_class"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_class", $mg_class));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_class&mg_class=" . $mg_class;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_class", $mg_class, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_required":
        $mg_required = (isset($_GET["mg_required"]) && $_GET["mg_required"] != "" ) ? clean($_GET["mg_required"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_required", $mg_required));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_required&mg_required=" . $mg_required;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_required", $mg_required, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_mg_disabled":
        $mg_disabled = (isset($_GET["mg_disabled"]) && $_GET["mg_disabled"] != "" ) ? clean($_GET["mg_disabled"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("mg_disabled", $mg_disabled));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_mg_disabled&mg_disabled=" . $mg_disabled;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("mg_disabled", $mg_disabled, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=magia_forms_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, magia_forms_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=magia_forms_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $magia_forms_lines = magia_forms_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$magia_forms_lines = magia_forms_lines_search($txt);
        break;
}


include view("magia_forms_lines", "index");      
