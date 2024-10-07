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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$hr_employee_family_dependents = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "hr_employee_family_dependents");

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
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_employee_id":
        $employee_id = (isset($_GET["employee_id"]) && $_GET["employee_id"] != "" ) ? clean($_GET["employee_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("employee_id", $employee_id, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_employee_id&employee_id=" . $employee_id;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("employee_id", $employee_id, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_name":
        $name = (isset($_GET["name"]) && $_GET["name"] != "" ) ? clean($_GET["name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("name", $name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_name&name=" . $name;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("name", $name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_lastname":
        $lastname = (isset($_GET["lastname"]) && $_GET["lastname"] != "" ) ? clean($_GET["lastname"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("lastname", $lastname, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_lastname&lastname=" . $lastname;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("lastname", $lastname, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_birthday":
        $birthday = (isset($_GET["birthday"]) && $_GET["birthday"] != "" ) ? clean($_GET["birthday"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("birthday", $birthday, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_birthday&birthday=" . $birthday;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("birthday", $birthday, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_relation":
        $relation = (isset($_GET["relation"]) && $_GET["relation"] != "" ) ? clean($_GET["relation"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("relation", $relation, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_relation&relation=" . $relation;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("relation", $relation, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_in_charge":
        $in_charge = (isset($_GET["in_charge"]) && $_GET["in_charge"] != "" ) ? clean($_GET["in_charge"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("in_charge", $in_charge, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_in_charge&in_charge=" . $in_charge;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("in_charge", $in_charge, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_handicap":
        $handicap = (isset($_GET["handicap"]) && $_GET["handicap"] != "" ) ? clean($_GET["handicap"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("handicap", $handicap, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_handicap&handicap=" . $handicap;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("handicap", $handicap, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_notes":
        $notes = (isset($_GET["notes"]) && $_GET["notes"] != "" ) ? clean($_GET["notes"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("notes", $notes, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_notes&notes=" . $notes;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("notes", $notes, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependents&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, hr_employee_family_dependents_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=hr_employee_family_dependentsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $hr_employee_family_dependents = hr_employee_family_dependents_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$hr_employee_family_dependents = hr_employee_family_dependents_search($txt);
        break;
}


include view("hr_employee_family_dependents", "index");      
