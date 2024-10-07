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
# Fecha de creacion del documento: 2024-09-26 17:09:16 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$tasks_contacts = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "tasks_contacts");

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
        $tasks_contacts = tasks_contacts_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_task_id":
        $task_id = (isset($_GET["task_id"]) && $_GET["task_id"] != "" ) ? clean($_GET["task_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_contacts_search_by("task_id", $task_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks_contacts&a=search&w=by_task_id&task_id=" . $task_id;
        $pagination->setUrl($url);
        $tasks_contacts = tasks_contacts_search_by("task_id", $task_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_contact_id":
        $contact_id = (isset($_GET["contact_id"]) && $_GET["contact_id"] != "" ) ? clean($_GET["contact_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_contacts_search_by("contact_id", $contact_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks_contacts&a=search&w=by_contact_id&contact_id=" . $contact_id;
        $pagination->setUrl($url);
        $tasks_contacts = tasks_contacts_search_by("contact_id", $contact_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_date_registred":
        $date_registred = (isset($_GET["date_registred"]) && $_GET["date_registred"] != "" ) ? clean($_GET["date_registred"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_contacts_search_by("date_registred", $date_registred, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks_contacts&a=search&w=by_date_registred&date_registred=" . $date_registred;
        $pagination->setUrl($url);
        $tasks_contacts = tasks_contacts_search_by("date_registred", $date_registred, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_contacts_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks_contacts&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $tasks_contacts = tasks_contacts_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_contacts_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=tasks_contacts&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $tasks_contacts = tasks_contacts_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, tasks_contacts_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=tasks_contactsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $tasks_contacts = tasks_contacts_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$tasks_contacts = tasks_contacts_search($txt);
        break;
}


include view("tasks_contacts", "index");      
