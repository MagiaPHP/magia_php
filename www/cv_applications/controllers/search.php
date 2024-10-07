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
# Fecha de creacion del documento: 2024-09-18 12:09:00 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv_applications = null;

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
        $cv_applications = cv_applications_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_job_id":
        $job_id = (isset($_GET["job_id"]) && $_GET["job_id"] != "" ) ? clean($_GET["job_id"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("job_id", $job_id));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_job_id&job_id=" . $job_id;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("job_id", $job_id, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_applicant_name":
        $applicant_name = (isset($_GET["applicant_name"]) && $_GET["applicant_name"] != "" ) ? clean($_GET["applicant_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("applicant_name", $applicant_name));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_applicant_name&applicant_name=" . $applicant_name;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("applicant_name", $applicant_name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_applicant_email":
        $applicant_email = (isset($_GET["applicant_email"]) && $_GET["applicant_email"] != "" ) ? clean($_GET["applicant_email"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("applicant_email", $applicant_email));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_applicant_email&applicant_email=" . $applicant_email;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("applicant_email", $applicant_email, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_application_date":
        $application_date = (isset($_GET["application_date"]) && $_GET["application_date"] != "" ) ? clean($_GET["application_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("application_date", $application_date));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_application_date&application_date=" . $application_date;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("application_date", $application_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_resume":
        $resume = (isset($_GET["resume"]) && $_GET["resume"] != "" ) ? clean($_GET["resume"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("resume", $resume));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_resume&resume=" . $resume;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("resume", $resume, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_cover_letter":
        $cover_letter = (isset($_GET["cover_letter"]) && $_GET["cover_letter"] != "" ) ? clean($_GET["cover_letter"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("cover_letter", $cover_letter));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_cover_letter&cover_letter=" . $cover_letter;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("cover_letter", $cover_letter, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cv_applications&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_applications_search($txt));
        // puede hacer falta
        $url = "index.php?c=cv_applicationsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv_applications = cv_applications_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cv_applications = cv_applications_search($txt);
        break;
}


include view("cv_applications", "index");      
