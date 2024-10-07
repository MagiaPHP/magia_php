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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$job_title = (isset($_POST["job_title"]) && $_POST["job_title"] !=""  && $_POST["job_title"] !="null" ) ? clean($_POST["job_title"]) :  null  ;
$reference_number = (isset($_POST["reference_number"]) && $_POST["reference_number"] !=""  && $_POST["reference_number"] !="null" ) ? clean($_POST["reference_number"]) :  null  ;
$creation_date = (isset($_POST["creation_date"]) && $_POST["creation_date"] !=""  && $_POST["creation_date"] !="null" ) ? clean($_POST["creation_date"]) :  null  ;
$company_name = (isset($_POST["company_name"]) && $_POST["company_name"] !=""  && $_POST["company_name"] !="null" ) ? clean($_POST["company_name"]) :  null  ;
$location = (isset($_POST["location"]) && $_POST["location"] !=""  && $_POST["location"] !="null" ) ? clean($_POST["location"]) :  null  ;
$ciudad = (isset($_POST["ciudad"]) && $_POST["ciudad"] !=""  && $_POST["ciudad"] !="null" ) ? clean($_POST["ciudad"]) :  null  ;
$working_hours = (isset($_POST["working_hours"]) && $_POST["working_hours"] !=""  && $_POST["working_hours"] !="null" ) ? clean($_POST["working_hours"]) :  null  ;
$contract_type = (isset($_POST["contract_type"]) && $_POST["contract_type"] !=""  && $_POST["contract_type"] !="null" ) ? clean($_POST["contract_type"]) :  null  ;
$job_family = (isset($_POST["job_family"]) && $_POST["job_family"] !=""  && $_POST["job_family"] !="null" ) ? clean($_POST["job_family"]) :  null  ;
$job_description = (isset($_POST["job_description"]) && $_POST["job_description"] !=""  && $_POST["job_description"] !="null" ) ? clean($_POST["job_description"]) :  null  ;
$profile = (isset($_POST["profile"]) && $_POST["profile"] !=""  && $_POST["profile"] !="null" ) ? clean($_POST["profile"]) :  null  ;
$language_requirements = (isset($_POST["language_requirements"]) && $_POST["language_requirements"] !=""  && $_POST["language_requirements"] !="null" ) ? clean($_POST["language_requirements"]) :  null  ;
$employer_name = (isset($_POST["employer_name"]) && $_POST["employer_name"] !=""  && $_POST["employer_name"] !="null" ) ? clean($_POST["employer_name"]) :  null  ;
$contact_person = (isset($_POST["contact_person"]) && $_POST["contact_person"] !=""  && $_POST["contact_person"] !="null" ) ? clean($_POST["contact_person"]) :  null  ;
$application_mode = (isset($_POST["application_mode"]) && $_POST["application_mode"] !=""  && $_POST["application_mode"] !="null" ) ? clean($_POST["application_mode"]) :  null  ;
$website_url = (isset($_POST["website_url"]) && $_POST["website_url"] !=""  && $_POST["website_url"] !="null" ) ? clean($_POST["website_url"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$job_title) {
    array_push($error, 'Job title is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! cv_jobs_is_job_title($job_title) ) {
    array_push($error, 'Job title format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( cv_jobs_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    cv_jobs_edit(
        $id ,  $job_title ,  $reference_number ,  $creation_date ,  $company_name ,  $location ,  $ciudad ,  $working_hours ,  $contract_type ,  $job_family ,  $job_description ,  $profile ,  $language_requirements ,  $employer_name ,  $contact_person ,  $application_mode ,  $website_url ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cv_jobs");
            break;
            
        case 2:
            header("Location: index.php?c=cv_jobs&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cv_jobs&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cv_jobs&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=cv_jobs&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
