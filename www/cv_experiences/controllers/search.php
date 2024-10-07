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
# Fecha de creacion del documento: 2024-09-18 06:09:31 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv_experiences = null;

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
        $cv_experiences = cv_experiences_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_cv_id":
        $cv_id = (isset($_GET["cv_id"]) && $_GET["cv_id"] != "" ) ? clean($_GET["cv_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("cv_id", $cv_id));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_cv_id&cv_id=" . $cv_id;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("cv_id", $cv_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_role":
        $role = (isset($_GET["role"]) && $_GET["role"] != "" ) ? clean($_GET["role"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("role", $role));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_role&role=" . $role;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("role", $role, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_company":
        $company = (isset($_GET["company"]) && $_GET["company"] != "" ) ? clean($_GET["company"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("company", $company));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_company&company=" . $company;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("company", $company, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_employment_type":
        $employment_type = (isset($_GET["employment_type"]) && $_GET["employment_type"] != "" ) ? clean($_GET["employment_type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("employment_type", $employment_type));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_employment_type&employment_type=" . $employment_type;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("employment_type", $employment_type, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_start_date":
        $start_date = (isset($_GET["start_date"]) && $_GET["start_date"] != "" ) ? clean($_GET["start_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("start_date", $start_date));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_start_date&start_date=" . $start_date;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("start_date", $start_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_end_date":
        $end_date = (isset($_GET["end_date"]) && $_GET["end_date"] != "" ) ? clean($_GET["end_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("end_date", $end_date));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_end_date&end_date=" . $end_date;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("end_date", $end_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cv_experiences&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_experiences_search($txt));
        // puede hacer falta
        $url = "index.php?c=cv_experiencesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv_experiences = cv_experiences_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cv_experiences = cv_experiences_search($txt);
        break;
}


include view("cv_experiences", "index");      
