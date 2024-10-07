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
# Fecha de creacion del documento: 2024-09-04 08:09:40 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cpanel = null;

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
        $cpanel = cpanel_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("contact_id", $contact_id));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_domain":
        $domain = (isset($_GET["domain"]) && $_GET["domain"] != "" ) ? clean($_GET["domain"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("domain", $domain));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_domain&domain=" . $domain;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("domain", $domain, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_subdomain":
        $subdomain = (isset($_GET["subdomain"]) && $_GET["subdomain"] != "" ) ? clean($_GET["subdomain"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("subdomain", $subdomain));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_subdomain&subdomain=" . $subdomain;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("subdomain", $subdomain, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_db":
        $db = (isset($_GET["db"]) && $_GET["db"] != "" ) ? clean($_GET["db"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("db", $db));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_db&db=" . $db;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("db", $db, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_user_db":
        $user_db = (isset($_GET["user_db"]) && $_GET["user_db"] != "" ) ? clean($_GET["user_db"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("user_db", $user_db));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_user_db&user_db=" . $user_db;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("user_db", $user_db, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_user_db_pass":
        $user_db_pass = (isset($_GET["user_db_pass"]) && $_GET["user_db_pass"] != "" ) ? clean($_GET["user_db_pass"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("user_db_pass", $user_db_pass));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_user_db_pass&user_db_pass=" . $user_db_pass;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("user_db_pass", $user_db_pass, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_email":
        $email = (isset($_GET["email"]) && $_GET["email"] != "" ) ? clean($_GET["email"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("email", $email));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_email&email=" . $email;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("email", $email, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cpanel&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cpanel = cpanel_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cpanel_search($txt));
        // puede hacer falta
        $url = "index.php?c=cpanela=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cpanel = cpanel_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cpanel = cpanel_search($txt);
        break;
}


include view("cpanel", "index");      
