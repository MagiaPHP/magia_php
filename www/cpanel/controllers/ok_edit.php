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
# Fecha de creacion del documento: 2024-09-04 08:09:40 
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
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$domain = (isset($_POST["domain"]) && $_POST["domain"] !=""  && $_POST["domain"] !="null" ) ? clean($_POST["domain"]) :  null  ;
$subdomain = (isset($_POST["subdomain"]) && $_POST["subdomain"] !=""  && $_POST["subdomain"] !="null" ) ? clean($_POST["subdomain"]) :  null  ;
$db = (isset($_POST["db"]) && $_POST["db"] !=""  && $_POST["db"] !="null" ) ? clean($_POST["db"]) :  null  ;
$user_db = (isset($_POST["user_db"]) && $_POST["user_db"] !=""  && $_POST["user_db"] !="null" ) ? clean($_POST["user_db"]) :  null  ;
$user_db_pass = (isset($_POST["user_db_pass"]) && $_POST["user_db_pass"] !=""  && $_POST["user_db_pass"] !="null" ) ? clean($_POST["user_db_pass"]) :  null  ;
$email = (isset($_POST["email"]) && $_POST["email"] !=""  && $_POST["email"] !="null" ) ? clean($_POST["email"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$contact_id) {
    array_push($error, 'Contact id is mandatory');
}
if (!$user_db_pass) {
    array_push($error, 'User db pass is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! cpanel_is_contact_id($contact_id) ) {
    array_push($error, 'Contact id format error');
}
if (! cpanel_is_user_db_pass($user_db_pass) ) {
    array_push($error, 'User db pass format error');
}
if (! cpanel_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( cpanel_search_by_unique("id","contact_id", $contact_id)){
    array_push($error, 'Contact id already exists in data base');
}

  
//if( cpanel_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    cpanel_edit(
        $id ,  $contact_id ,  $domain ,  $subdomain ,  $db ,  $user_db ,  $user_db_pass ,  $email ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=cpanel");
            break;
            
        case 2:
            header("Location: index.php?c=cpanel&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=cpanel&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=cpanel&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=cpanel&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
