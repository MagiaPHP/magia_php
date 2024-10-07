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
# Fecha de creacion del documento: 2024-09-16 17:09:25 
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
$vehicle_id = (isset($_POST["vehicle_id"]) && $_POST["vehicle_id"] !=""  && $_POST["vehicle_id"] !="null" ) ? clean($_POST["vehicle_id"]) :  null  ;
$event_date = (isset($_POST["event_date"]) && $_POST["event_date"] !=""  && $_POST["event_date"] !="null" ) ? clean($_POST["event_date"]) :  null  ;
$kl = (isset($_POST["kl"]) && $_POST["kl"] !=""  && $_POST["kl"] !="null" ) ? clean($_POST["kl"]) :  null  ;
$event_type = (isset($_POST["event_type"]) && $_POST["event_type"] !=""  && $_POST["event_type"] !="null" ) ? clean($_POST["event_type"]) :  null  ;
$event_id = (isset($_POST["event_id"]) && $_POST["event_id"] !=""  && $_POST["event_id"] !="null" ) ? clean($_POST["event_id"]) :  null  ;
$created_at = (isset($_POST["created_at"]) && $_POST["created_at"] !="" ) ? clean($_POST["created_at"]) : current_timestamp() ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$vehicle_id) {
    array_push($error, 'Vehicle id is mandatory');
}
if (!$event_date) {
    array_push($error, 'Event date is mandatory');
}
if (!$kl) {
    array_push($error, 'Kl is mandatory');
}
if (!$event_type) {
    array_push($error, 'Event type is mandatory');
}
if (!$event_id) {
    array_push($error, 'Event id is mandatory');
}
if (!$created_at) {
    array_push($error, 'Created at is mandatory');
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

if (! veh_vehicle_kilometers_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicle_kilometers_is_event_date($event_date) ) {
    array_push($error, 'Event date format error');
}
if (! veh_vehicle_kilometers_is_kl($kl) ) {
    array_push($error, 'Kl format error');
}
if (! veh_vehicle_kilometers_is_event_type($event_type) ) {
    array_push($error, 'Event type format error');
}
if (! veh_vehicle_kilometers_is_event_id($event_id) ) {
    array_push($error, 'Event id format error');
}
if (! veh_vehicle_kilometers_is_created_at($created_at) ) {
    array_push($error, 'Created at format error');
}
if (! veh_vehicle_kilometers_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicle_kilometers_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( veh_vehicle_kilometers_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    veh_vehicle_kilometers_edit(
        $id ,  $vehicle_id ,  $event_date ,  $kl ,  $event_type ,  $event_id ,  $created_at ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicle_kilometers");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicle_kilometers&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicle_kilometers&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicle_kilometers&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=veh_vehicle_kilometers&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
