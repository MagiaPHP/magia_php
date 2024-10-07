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
# Fecha de creacion del documento: 2024-09-16 17:09:17 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$vehicle_id = (isset($_POST["vehicle_id"]) && $_POST["vehicle_id"] !=""  && $_POST["vehicle_id"] !="null" ) ? clean($_POST["vehicle_id"]) :  null  ;
$driver_id = (isset($_POST["driver_id"]) && $_POST["driver_id"] !=""  && $_POST["driver_id"] !="null" ) ? clean($_POST["driver_id"]) :  null  ;
$start_date = (isset($_POST["start_date"]) && $_POST["start_date"] !=""  && $_POST["start_date"] !="null" ) ? clean($_POST["start_date"]) :  null  ;
$time_start = (isset($_POST["time_start"]) && $_POST["time_start"] !=""  && $_POST["time_start"] !="null" ) ? clean($_POST["time_start"]) :  null  ;
$kl_start = (isset($_POST["kl_start"]) && $_POST["kl_start"] !=""  && $_POST["kl_start"] !="null" ) ? clean($_POST["kl_start"]) :  null  ;
$end_date = (isset($_POST["end_date"]) && $_POST["end_date"] !=""  && $_POST["end_date"] !="null" ) ? clean($_POST["end_date"]) :  null  ;
$time_end = (isset($_POST["time_end"]) && $_POST["time_end"] !=""  && $_POST["time_end"] !="null" ) ? clean($_POST["time_end"]) :  null  ;
$kl_end = (isset($_POST["kl_end"]) && $_POST["kl_end"] !=""  && $_POST["kl_end"] !="null" ) ? clean($_POST["kl_end"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$kl_difference = (isset($_POST["kl_difference"]) && $_POST["kl_difference"] !=""  && $_POST["kl_difference"] !="null" ) ? clean($_POST["kl_difference"]) :  null  ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$vehicle_id) {                        
    array_push($error, 'Vehicle id is mandatory');
}
if (!$driver_id) {                        
    array_push($error, 'Driver id is mandatory');
}
if (!$start_date) {                        
    array_push($error, 'Start date is mandatory');
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

if (! veh_vehicle_activities_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicle_activities_is_driver_id($driver_id) ) {
    array_push($error, 'Driver id format error');
}
if (! veh_vehicle_activities_is_start_date($start_date) ) {
    array_push($error, 'Start date format error');
}
if (! veh_vehicle_activities_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicle_activities_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( veh_vehicle_activities_search($kl_difference)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_vehicle_activities_add(
        $vehicle_id ,  $driver_id ,  $start_date ,  $time_start ,  $kl_start ,  $end_date ,  $time_end ,  $kl_end ,  $order_by ,  $status ,  $kl_difference    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicle_activities");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicle_activities&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicle_activities&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicle_activities&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_vehicle_activities&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


