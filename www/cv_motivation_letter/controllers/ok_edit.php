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
# Fecha de creacion del documento: 2024-09-18 03:09:07 
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
$sender_name = (isset($_POST["sender_name"]) && $_POST["sender_name"] !=""  && $_POST["sender_name"] !="null" ) ? clean($_POST["sender_name"]) :  null  ;
$sender_email = (isset($_POST["sender_email"]) && $_POST["sender_email"] !=""  && $_POST["sender_email"] !="null" ) ? clean($_POST["sender_email"]) :  null  ;
$sender_phone = (isset($_POST["sender_phone"]) && $_POST["sender_phone"] !=""  && $_POST["sender_phone"] !="null" ) ? clean($_POST["sender_phone"]) :  null  ;
$sender_address = (isset($_POST["sender_address"]) && $_POST["sender_address"] !=""  && $_POST["sender_address"] !="null" ) ? clean($_POST["sender_address"]) :  null  ;
$letter_date = (isset($_POST["letter_date"]) && $_POST["letter_date"] !=""  && $_POST["letter_date"] !="null" ) ? clean($_POST["letter_date"]) :  null  ;
$recipient_name = (isset($_POST["recipient_name"]) && $_POST["recipient_name"] !=""  && $_POST["recipient_name"] !="null" ) ? clean($_POST["recipient_name"]) :  null  ;
$recipient_position = (isset($_POST["recipient_position"]) && $_POST["recipient_position"] !=""  && $_POST["recipient_position"] !="null" ) ? clean($_POST["recipient_position"]) :  null  ;
$recipient_company = (isset($_POST["recipient_company"]) && $_POST["recipient_company"] !=""  && $_POST["recipient_company"] !="null" ) ? clean($_POST["recipient_company"]) :  null  ;
$recipient_address = (isset($_POST["recipient_address"]) && $_POST["recipient_address"] !=""  && $_POST["recipient_address"] !="null" ) ? clean($_POST["recipient_address"]) :  null  ;
$greeting = (isset($_POST["greeting"]) && $_POST["greeting"] !=""  && $_POST["greeting"] !="null" ) ? clean($_POST["greeting"]) :  null  ;
$introduction = (isset($_POST["introduction"]) && $_POST["introduction"] !=""  && $_POST["introduction"] !="null" ) ? clean($_POST["introduction"]) :  null  ;
$body_experience = (isset($_POST["body_experience"]) && $_POST["body_experience"] !=""  && $_POST["body_experience"] !="null" ) ? clean($_POST["body_experience"]) :  null  ;
$body_achievements = (isset($_POST["body_achievements"]) && $_POST["body_achievements"] !=""  && $_POST["body_achievements"] !="null" ) ? clean($_POST["body_achievements"]) :  null  ;
$motivation = (isset($_POST["motivation"]) && $_POST["motivation"] !=""  && $_POST["motivation"] !="null" ) ? clean($_POST["motivation"]) :  null  ;
$closing = (isset($_POST["closing"]) && $_POST["closing"] !=""  && $_POST["closing"] !="null" ) ? clean($_POST["closing"]) :  null  ;
$farewell = (isset($_POST["farewell"]) && $_POST["farewell"] !=""  && $_POST["farewell"] !="null" ) ? clean($_POST["farewell"]) :  null  ;
$signature = (isset($_POST["signature"]) && $_POST["signature"] !=""  && $_POST["signature"] !="null" ) ? clean($_POST["signature"]) :  null  ;
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

  
//if( cv_motivation_letter_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    cv_motivation_letter_edit(
        $id ,  $sender_name ,  $sender_email ,  $sender_phone ,  $sender_address ,  $letter_date ,  $recipient_name ,  $recipient_position ,  $recipient_company ,  $recipient_address ,  $greeting ,  $introduction ,  $body_experience ,  $body_achievements ,  $motivation ,  $closing ,  $farewell ,  $signature ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cv_motivation_letter");
            break;
            
        case 2:
            header("Location: index.php?c=cv_motivation_letter&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cv_motivation_letter&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cv_motivation_letter&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=cv_motivation_letter&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
