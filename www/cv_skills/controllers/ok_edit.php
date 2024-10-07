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
# Fecha de creacion del documento: 2024-09-18 06:09:39 
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
$skill_name = (isset($_POST["skill_name"]) && $_POST["skill_name"] !=""  && $_POST["skill_name"] !="null" ) ? clean($_POST["skill_name"]) :  null  ;
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

  
//if( cv_skills_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    cv_skills_edit(
        $id ,  $cv_id ,  $skill_name ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cv_skills");
            break;
            
        case 2:
            header("Location: index.php?c=cv_skills&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cv_skills&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cv_skills&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=cv_skills&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
