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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$chat = null;

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
        $chat = chat_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, chat_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=chat&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $chat = chat_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_id":
        $order_id = (isset($_GET["order_id"]) && $_GET["order_id"] != "" ) ? clean($_GET["order_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, chat_search_by("order_id", $order_id));
        // puede hacer falta
        $url = "index.php?c=chat&a=search&w=by_order_id&order_id=" . $order_id;
        $pagination->setUrl($url);
        $chat = chat_search_by("order_id", $order_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_message":
        $message = (isset($_GET["message"]) && $_GET["message"] != "" ) ? clean($_GET["message"]) : false;
        #################################################################################

        $pagination = new Pagination($page, chat_search_by("message", $message));
        // puede hacer falta
        $url = "index.php?c=chat&a=search&w=by_message&message=" . $message;
        $pagination->setUrl($url);
        $chat = chat_search_by("message", $message, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_user":
        $user = (isset($_GET["user"]) && $_GET["user"] != "" ) ? clean($_GET["user"]) : false;
        #################################################################################

        $pagination = new Pagination($page, chat_search_by("user", $user));
        // puede hacer falta
        $url = "index.php?c=chat&a=search&w=by_user&user=" . $user;
        $pagination->setUrl($url);
        $chat = chat_search_by("user", $user, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, chat_search($txt));
        // puede hacer falta
        $url = "index.php?c=chata=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $chat = chat_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$chat = chat_search($txt);
        break;
}


include view("chat", "index");      
