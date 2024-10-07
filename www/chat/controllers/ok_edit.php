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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
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
$order_id = (isset($_POST["order_id"]) && $_POST["order_id"] !=""  && $_POST["order_id"] !="null" ) ? clean($_POST["order_id"]) :  null  ;
$message = (isset($_POST["message"]) && $_POST["message"] !=""  && $_POST["message"] !="null" ) ? clean($_POST["message"]) :  null  ;
$user = (isset($_POST["user"]) && $_POST["user"] !=""  && $_POST["user"] !="null" ) ? clean($_POST["user"]) :  null  ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$contact_id) {
    array_push($error, 'Contact id is mandatory');
}
if (!$order_id) {
    array_push($error, 'Order id is mandatory');
}
if (!$message) {
    array_push($error, 'Message is mandatory');
}
if (!$user) {
    array_push($error, 'User is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! chat_is_contact_id($contact_id) ) {
    array_push($error, 'Contact id format error');
}
if (! chat_is_order_id($order_id) ) {
    array_push($error, 'Order id format error');
}
if (! chat_is_message($message) ) {
    array_push($error, 'Message format error');
}
if (! chat_is_user($user) ) {
    array_push($error, 'User format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( chat_search($user)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    chat_edit(
        $id ,  $contact_id ,  $order_id ,  $message ,  $user    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=chat");
            break;
            
        case 2:
            header("Location: index.php?c=chat&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=chat&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=chat&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=chat&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
