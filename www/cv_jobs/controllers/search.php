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
# Fecha de creacion del documento: 2024-09-23 19:09:40 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv_jobs = null;


$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;

$order_data = order_by_get_order_data($u_id, "cv_jobs");

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
        $cv_jobs = cv_jobs_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_job_title":
        $job_title = (isset($_GET["job_title"]) && $_GET["job_title"] != "" ) ? clean($_GET["job_title"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("job_title", $job_title, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_job_title&job_title=" . $job_title;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("job_title", $job_title, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_reference_number":
        $reference_number = (isset($_GET["reference_number"]) && $_GET["reference_number"] != "" ) ? clean($_GET["reference_number"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("reference_number", $reference_number, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_reference_number&reference_number=" . $reference_number;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("reference_number", $reference_number, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_creation_date":
        $creation_date = (isset($_GET["creation_date"]) && $_GET["creation_date"] != "" ) ? clean($_GET["creation_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("creation_date", $creation_date, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_creation_date&creation_date=" . $creation_date;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("creation_date", $creation_date, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_company_name":
        $company_name = (isset($_GET["company_name"]) && $_GET["company_name"] != "" ) ? clean($_GET["company_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("company_name", $company_name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_company_name&company_name=" . $company_name;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("company_name", $company_name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_location":
        $location = (isset($_GET["location"]) && $_GET["location"] != "" ) ? clean($_GET["location"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("location", $location, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_location&location=" . $location;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("location", $location, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_ciudad":
        $ciudad = (isset($_GET["ciudad"]) && $_GET["ciudad"] != "" ) ? clean($_GET["ciudad"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("ciudad", $ciudad, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_ciudad&ciudad=" . $ciudad;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("ciudad", $ciudad, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_working_hours":
        $working_hours = (isset($_GET["working_hours"]) && $_GET["working_hours"] != "" ) ? clean($_GET["working_hours"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("working_hours", $working_hours, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_working_hours&working_hours=" . $working_hours;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("working_hours", $working_hours, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_contract_type":
        $contract_type = (isset($_GET["contract_type"]) && $_GET["contract_type"] != "" ) ? clean($_GET["contract_type"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("contract_type", $contract_type, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_contract_type&contract_type=" . $contract_type;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("contract_type", $contract_type, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_job_family":
        $job_family = (isset($_GET["job_family"]) && $_GET["job_family"] != "" ) ? clean($_GET["job_family"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("job_family", $job_family, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_job_family&job_family=" . $job_family;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("job_family", $job_family, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_job_description":
        $job_description = (isset($_GET["job_description"]) && $_GET["job_description"] != "" ) ? clean($_GET["job_description"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("job_description", $job_description, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_job_description&job_description=" . $job_description;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("job_description", $job_description, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_profile":
        $profile = (isset($_GET["profile"]) && $_GET["profile"] != "" ) ? clean($_GET["profile"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("profile", $profile, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_profile&profile=" . $profile;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("profile", $profile, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_language_requirements":
        $language_requirements = (isset($_GET["language_requirements"]) && $_GET["language_requirements"] != "" ) ? clean($_GET["language_requirements"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("language_requirements", $language_requirements, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_language_requirements&language_requirements=" . $language_requirements;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("language_requirements", $language_requirements, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_employer_name":
        $employer_name = (isset($_GET["employer_name"]) && $_GET["employer_name"] != "" ) ? clean($_GET["employer_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("employer_name", $employer_name, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_employer_name&employer_name=" . $employer_name;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("employer_name", $employer_name, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_contact_person":
        $contact_person = (isset($_GET["contact_person"]) && $_GET["contact_person"] != "" ) ? clean($_GET["contact_person"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("contact_person", $contact_person, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_contact_person&contact_person=" . $contact_person;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("contact_person", $contact_person, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_application_mode":
        $application_mode = (isset($_GET["application_mode"]) && $_GET["application_mode"] != "" ) ? clean($_GET["application_mode"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("application_mode", $application_mode, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_application_mode&application_mode=" . $application_mode;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("application_mode", $application_mode, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_website_url":
        $website_url = (isset($_GET["website_url"]) && $_GET["website_url"] != "" ) ? clean($_GET["website_url"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("website_url", $website_url, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_website_url&website_url=" . $website_url;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("website_url", $website_url, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("order_by", $order_by, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search_by("status", $status, 0,  9999,  $order_data["col_name"], $order_data["order_way"]));
        // puede hacer falta
        $url = "index.php?c=cv_jobs&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search_by("status", $status, $pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"] );
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_jobs_search($txt, 0 , 9999 ,  $order_data["col_name"], $order_data["order_way"] ));
        // puede hacer falta
        $url = "index.php?c=cv_jobsa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv_jobs = cv_jobs_search($txt, $pagination->getStart(), $pagination->getLimit(), 0,  9999,  $order_data["col_name"], $order_data["order_way"]);
        #################################################################################
 
        //$cv_jobs = cv_jobs_search($txt);
        break;
}


include view("cv_jobs", "index");      
