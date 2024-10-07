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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$messages = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "messages");

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
        $messages = messages_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_type":
        $type = (isset($_GET["type"]) && $_GET["type"] != "" ) ? clean($_GET["type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("type", $type, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_type&type=" . $type;
        $pagination->setUrl($url);
        $messages = messages_search_by("type", $type, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_message":
        $message = (isset($_GET["message"]) && $_GET["message"] != "" ) ? clean($_GET["message"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("message", $message, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_message&message=" . $message;
        $pagination->setUrl($url);
        $messages = messages_search_by("message", $message, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_url_action":
        $url_action = (isset($_GET["url_action"]) && $_GET["url_action"] != "" ) ? clean($_GET["url_action"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("url_action", $url_action, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_url_action&url_action=" . $url_action;
        $pagination->setUrl($url);
        $messages = messages_search_by("url_action", $url_action, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_url_label":
        $url_label = (isset($_GET["url_label"]) && $_GET["url_label"] != "" ) ? clean($_GET["url_label"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("url_label", $url_label, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_url_label&url_label=" . $url_label;
        $pagination->setUrl($url);
        $messages = messages_search_by("url_label", $url_label, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("controller", $controller, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $messages = messages_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_doc_id":
        $doc_id = (isset($_GET["doc_id"]) && $_GET["doc_id"] != "" ) ? clean($_GET["doc_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("doc_id", $doc_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_doc_id&doc_id=" . $doc_id;
        $pagination->setUrl($url);
        $messages = messages_search_by("doc_id", $doc_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("contact_id", $contact_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $messages = messages_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_rol":
        $rol = (isset($_GET["rol"]) && $_GET["rol"] != "" ) ? clean($_GET["rol"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("rol", $rol, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_rol&rol=" . $rol;
        $pagination->setUrl($url);
        $messages = messages_search_by("rol", $rol, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_start":
        $date_start = (isset($_GET["date_start"]) && $_GET["date_start"] != "" ) ? clean($_GET["date_start"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("date_start", $date_start, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_date_start&date_start=" . $date_start;
        $pagination->setUrl($url);
        $messages = messages_search_by("date_start", $date_start, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_end":
        $date_end = (isset($_GET["date_end"]) && $_GET["date_end"] != "" ) ? clean($_GET["date_end"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("date_end", $date_end, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_date_end&date_end=" . $date_end;
        $pagination->setUrl($url);
        $messages = messages_search_by("date_end", $date_end, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_registre":
        $date_registre = (isset($_GET["date_registre"]) && $_GET["date_registre"] != "" ) ? clean($_GET["date_registre"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("date_registre", $date_registre, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_date_registre&date_registre=" . $date_registre;
        $pagination->setUrl($url);
        $messages = messages_search_by("date_registre", $date_registre, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_read_by":
        $read_by = (isset($_GET["read_by"]) && $_GET["read_by"] != "" ) ? clean($_GET["read_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("read_by", $read_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_read_by&read_by=" . $read_by;
        $pagination->setUrl($url);
        $messages = messages_search_by("read_by", $read_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_is_logued":
        $is_logued = (isset($_GET["is_logued"]) && $_GET["is_logued"] != "" ) ? clean($_GET["is_logued"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("is_logued", $is_logued, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_is_logued&is_logued=" . $is_logued;
        $pagination->setUrl($url);
        $messages = messages_search_by("is_logued", $is_logued, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $messages = messages_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=messages&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $messages = messages_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, messages_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=messagesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $messages = messages_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$messages = messages_search($txt);
        break;
}


include view("messages", "index");      
