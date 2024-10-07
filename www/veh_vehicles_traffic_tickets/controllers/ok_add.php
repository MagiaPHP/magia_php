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
# Fecha de creacion del documento: 2024-09-16 17:09:46 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$vehicle_id = (isset($_POST["vehicle_id"]) && $_POST["vehicle_id"] !=""  && $_POST["vehicle_id"] !="null" ) ? clean($_POST["vehicle_id"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$time = (isset($_POST["time"]) && $_POST["time"] !=""  && $_POST["time"] !="null" ) ? clean($_POST["time"]) :  null  ;
$pv_police = (isset($_POST["pv_police"]) && $_POST["pv_police"] !=""  && $_POST["pv_police"] !="null" ) ? clean($_POST["pv_police"]) :  null  ;
$driver_id = (isset($_POST["driver_id"]) && $_POST["driver_id"] !=""  && $_POST["driver_id"] !="null" ) ? clean($_POST["driver_id"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$vehicle_id) {                        
    array_push($error, 'Vehicle id is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}
if (!$pv_police) {                        
    array_push($error, 'Pv police is mandatory');
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

if (! veh_vehicles_traffic_tickets_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicles_traffic_tickets_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! veh_vehicles_traffic_tickets_is_pv_police($pv_police) ) {
    array_push($error, 'Pv police format error');
}
if (! veh_vehicles_traffic_tickets_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! veh_vehicles_traffic_tickets_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicles_traffic_tickets_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( veh_vehicles_traffic_tickets_search_by_unique("id","pv_police", $pv_police)){
    array_push($error, 'Pv police already exists in data base');
}

  
//if( veh_vehicles_traffic_tickets_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_vehicles_traffic_tickets_add(
        $vehicle_id ,  $date ,  $time ,  $pv_police ,  $driver_id ,  $date_registre ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicles_traffic_tickets");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicles_traffic_tickets&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicles_traffic_tickets&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicles_traffic_tickets&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_vehicles_traffic_tickets&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


