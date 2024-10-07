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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$job_id = (isset($_POST["job_id"]) && $_POST["job_id"] !=""  && $_POST["job_id"] !="null" ) ? clean($_POST["job_id"]) :  null  ;
$applicant_name = (isset($_POST["applicant_name"]) && $_POST["applicant_name"] !=""  && $_POST["applicant_name"] !="null" ) ? clean($_POST["applicant_name"]) :  null  ;
$applicant_email = (isset($_POST["applicant_email"]) && $_POST["applicant_email"] !=""  && $_POST["applicant_email"] !="null" ) ? clean($_POST["applicant_email"]) :  null  ;
$application_date = (isset($_POST["application_date"]) && $_POST["application_date"] !=""  && $_POST["application_date"] !="null" ) ? clean($_POST["application_date"]) :  null  ;
$resume = (isset($_POST["resume"]) && $_POST["resume"] !=""  && $_POST["resume"] !="null" ) ? clean($_POST["resume"]) :  null  ;
$cover_letter = (isset($_POST["cover_letter"]) && $_POST["cover_letter"] !=""  && $_POST["cover_letter"] !="null" ) ? clean($_POST["cover_letter"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$job_id) {
    array_push($error, 'Job id is mandatory');
}
if (!$applicant_name) {
    array_push($error, 'Applicant name is mandatory');
}
if (!$applicant_email) {
    array_push($error, 'Applicant email is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! cv_applications_is_job_id($job_id) ) {
    array_push($error, 'Job id format error');
}
if (! cv_applications_is_applicant_name($applicant_name) ) {
    array_push($error, 'Applicant name format error');
}
if (! cv_applications_is_applicant_email($applicant_email) ) {
    array_push($error, 'Applicant email format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( cv_applications_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    cv_applications_edit(
        $id ,  $job_id ,  $applicant_name ,  $applicant_email ,  $application_date ,  $resume ,  $cover_letter ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cv_applications");
            break;
            
        case 2:
            header("Location: index.php?c=cv_applications&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cv_applications&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cv_applications&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=cv_applications&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
