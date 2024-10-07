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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$cv_id = (isset($_POST["cv_id"]) && $_POST["cv_id"] !=""  && $_POST["cv_id"] !="null" ) ? clean($_POST["cv_id"]) :  null  ;
$role = (isset($_POST["role"]) && $_POST["role"] !=""  && $_POST["role"] !="null" ) ? clean($_POST["role"]) :  null  ;
$company = (isset($_POST["company"]) && $_POST["company"] !=""  && $_POST["company"] !="null" ) ? clean($_POST["company"]) :  null  ;
$employment_type = (isset($_POST["employment_type"]) && $_POST["employment_type"] !=""  && $_POST["employment_type"] !="null" ) ? clean($_POST["employment_type"]) :  null  ;
$start_date = (isset($_POST["start_date"]) && $_POST["start_date"] !=""  && $_POST["start_date"] !="null" ) ? clean($_POST["start_date"]) :  null  ;
$end_date = (isset($_POST["end_date"]) && $_POST["end_date"] !=""  && $_POST["end_date"] !="null" ) ? clean($_POST["end_date"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################


#################################################################################

# FORMAT
#################################################################################


#################################################################################

# CONDITIONAL
#################################################################################

  
//if( cv_experiences_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    cv_experiences_edit(
        $id ,  $cv_id ,  $role ,  $company ,  $employment_type ,  $start_date ,  $end_date ,  $description ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cv_experiences");
            break;
            
        case 2:
            header("Location: index.php?c=cv_experiences&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cv_experiences&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cv_experiences&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=cv_experiences&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
