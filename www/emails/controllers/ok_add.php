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
# Fecha de creacion del documento: 2024-09-04 08:09:26 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$father_id = (isset($_POST["father_id"]) && $_POST["father_id"] !=""  && $_POST["father_id"] !="null" ) ? clean($_POST["father_id"]) :  null  ;
$sender_id = (isset($_POST["sender_id"]) && $_POST["sender_id"] !=""  && $_POST["sender_id"] !="null" ) ? clean($_POST["sender_id"]) :  null  ;
$reciver_id = (isset($_POST["reciver_id"]) && $_POST["reciver_id"] !=""  && $_POST["reciver_id"] !="null" ) ? clean($_POST["reciver_id"]) :  null  ;
$folder = (isset($_POST["folder"]) && $_POST["folder"] !=""  && $_POST["folder"] !="null" ) ? clean($_POST["folder"]) :  null  ;
$subjet = (isset($_POST["subjet"]) && $_POST["subjet"] !=""  && $_POST["subjet"] !="null" ) ? clean($_POST["subjet"]) :  null  ;
$message = (isset($_POST["message"]) && $_POST["message"] !=""  && $_POST["message"] !="null" ) ? clean($_POST["message"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$date_read = (isset($_POST["date_read"]) && $_POST["date_read"] !=""  && $_POST["date_read"] !="null" ) ? clean($_POST["date_read"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$sender_id) {                        
    array_push($error, 'Sender id is mandatory');
}
if (!$date_registre) {                        
    array_push($error, 'Date registre is mandatory');
}
if (!$order_by) {                        
    array_push($error, 'Order by is mandatory');
}
if (!$status) {                        
    array_push($error, 'Status is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! emails_is_sender_id($sender_id) ) {
    array_push($error, 'Sender id format error');
}
if (! emails_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! emails_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! emails_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( emails_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = emails_add(
        $father_id ,  $sender_id ,  $reciver_id ,  $folder ,  $subjet ,  $message ,  $date_registre ,  $date_read ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=emails");
            break;
            
        case 2:
            header("Location: index.php?c=emails&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=emails&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=emails&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=emails&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


