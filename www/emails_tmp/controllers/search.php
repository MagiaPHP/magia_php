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
# Fecha de creacion del documento: 2024-09-04 08:09:38 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$emails_tmp = null;

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
        $emails_tmp = emails_tmp_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=emails_tmp&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_controller":
        $controller = (isset($_GET["controller"]) && $_GET["controller"] != "" ) ? clean($_GET["controller"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search_by("controller", $controller));
        // puede hacer falta
        $url = "index.php?c=emails_tmp&a=search&w=by_controller&controller=" . $controller;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search_by("controller", $controller, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_tmp":
        $tmp = (isset($_GET["tmp"]) && $_GET["tmp"] != "" ) ? clean($_GET["tmp"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search_by("tmp", $tmp));
        // puede hacer falta
        $url = "index.php?c=emails_tmp&a=search&w=by_tmp&tmp=" . $tmp;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search_by("tmp", $tmp, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body":
        $body = (isset($_GET["body"]) && $_GET["body"] != "" ) ? clean($_GET["body"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search_by("body", $body));
        // puede hacer falta
        $url = "index.php?c=emails_tmp&a=search&w=by_body&body=" . $body;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search_by("body", $body, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=emails_tmp&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=emails_tmp&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, emails_tmp_search($txt));
        // puede hacer falta
        $url = "index.php?c=emails_tmpa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $emails_tmp = emails_tmp_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$emails_tmp = emails_tmp_search($txt);
        break;
}


include view("emails_tmp", "index");      
