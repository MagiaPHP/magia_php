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
# Fecha de creacion del documento: 2024-09-18 06:09:28 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv_education = null;

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
        $cv_education = cv_education_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_cv_id":
        $cv_id = (isset($_GET["cv_id"]) && $_GET["cv_id"] != "" ) ? clean($_GET["cv_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("cv_id", $cv_id));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_cv_id&cv_id=" . $cv_id;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("cv_id", $cv_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_program":
        $program = (isset($_GET["program"]) && $_GET["program"] != "" ) ? clean($_GET["program"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("program", $program));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_program&program=" . $program;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("program", $program, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_institution":
        $institution = (isset($_GET["institution"]) && $_GET["institution"] != "" ) ? clean($_GET["institution"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("institution", $institution));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_institution&institution=" . $institution;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("institution", $institution, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_start_date":
        $start_date = (isset($_GET["start_date"]) && $_GET["start_date"] != "" ) ? clean($_GET["start_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("start_date", $start_date));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_start_date&start_date=" . $start_date;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("start_date", $start_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_end_date":
        $end_date = (isset($_GET["end_date"]) && $_GET["end_date"] != "" ) ? clean($_GET["end_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("end_date", $end_date));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_end_date&end_date=" . $end_date;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("end_date", $end_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_description":
        $description = (isset($_GET["description"]) && $_GET["description"] != "" ) ? clean($_GET["description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("description", $description));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_description&description=" . $description;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("description", $description, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cv_education&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv_education = cv_education_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_education_search($txt));
        // puede hacer falta
        $url = "index.php?c=cv_educationa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv_education = cv_education_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cv_education = cv_education_search($txt);
        break;
}


include view("cv_education", "index");      
