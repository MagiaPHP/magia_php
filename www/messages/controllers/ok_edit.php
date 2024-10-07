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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
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
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$message = (isset($_POST["message"]) && $_POST["message"] !=""  && $_POST["message"] !="null" ) ? clean($_POST["message"]) :  null  ;
$url_action = (isset($_POST["url_action"]) && $_POST["url_action"] !=""  && $_POST["url_action"] !="null" ) ? clean($_POST["url_action"]) :  null  ;
$url_label = (isset($_POST["url_label"]) && $_POST["url_label"] !=""  && $_POST["url_label"] !="null" ) ? clean($_POST["url_label"]) :  null  ;
$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$doc_id = (isset($_POST["doc_id"]) && $_POST["doc_id"] !=""  && $_POST["doc_id"] !="null" ) ? clean($_POST["doc_id"]) :  null  ;
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$rol = (isset($_POST["rol"]) && $_POST["rol"] !=""  && $_POST["rol"] !="null" ) ? clean($_POST["rol"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$read_by = (isset($_POST["read_by"]) && $_POST["read_by"] !=""  && $_POST["read_by"] !="null" ) ? clean($_POST["read_by"]) :  null  ;
$is_logued = (isset($_POST["is_logued"]) && $_POST["is_logued"] !=""  && $_POST["is_logued"] !="null" ) ? clean($_POST["is_logued"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

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

if (! messages_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! messages_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! messages_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( messages_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    messages_edit(
        $id ,  $type ,  $message ,  $url_action ,  $url_label ,  $controller ,  $doc_id ,  $contact_id ,  $rol ,  $date_start ,  $date_end ,  $date_registre ,  $read_by ,  $is_logued ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=messages");
            break;
            
        case 2:
            header("Location: index.php?c=messages&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=messages&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=messages&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=messages&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
