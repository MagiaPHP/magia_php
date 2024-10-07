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
# Fecha de creacion del documento: 2024-09-16 17:09:42 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$vehicle_id = (isset($_POST["vehicle_id"]) && $_POST["vehicle_id"] !=""  && $_POST["vehicle_id"] !="null" ) ? clean($_POST["vehicle_id"]) :  null  ;
$fuel_code = (isset($_POST["fuel_code"]) && $_POST["fuel_code"] !=""  && $_POST["fuel_code"] !="null" ) ? clean($_POST["fuel_code"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$paid_by = (isset($_POST["paid_by"]) && $_POST["paid_by"] !=""  && $_POST["paid_by"] !="null" ) ? clean($_POST["paid_by"]) :  null  ;
$ref = (isset($_POST["ref"]) && $_POST["ref"] !=""  && $_POST["ref"] !="null" ) ? clean($_POST["ref"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
$registred_by = (isset($_POST["registred_by"]) && $_POST["registred_by"] !=""  && $_POST["registred_by"] !="null" ) ? clean($_POST["registred_by"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$kl = (isset($_POST["kl"]) && $_POST["kl"] !=""  && $_POST["kl"] !="null" ) ? clean($_POST["kl"]) :  null  ;
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
if (!$fuel_code) {                        
    array_push($error, 'Fuel code is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}
if (!$price) {                        
    array_push($error, 'Price is mandatory');
}
if (!$registred_by) {                        
    array_push($error, 'Registred by is mandatory');
}
if (!$date_registre) {                        
    array_push($error, 'Date registre is mandatory');
}
if (!$kl) {                        
    array_push($error, 'Kl is mandatory');
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

if (! veh_vehicles_fuel_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicles_fuel_is_fuel_code($fuel_code) ) {
    array_push($error, 'Fuel code format error');
}
if (! veh_vehicles_fuel_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! veh_vehicles_fuel_is_price($price) ) {
    array_push($error, 'Price format error');
}
if (! veh_vehicles_fuel_is_registred_by($registred_by) ) {
    array_push($error, 'Registred by format error');
}
if (! veh_vehicles_fuel_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! veh_vehicles_fuel_is_kl($kl) ) {
    array_push($error, 'Kl format error');
}
if (! veh_vehicles_fuel_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicles_fuel_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( veh_vehicles_fuel_search_by_unique("id","ref", $ref)){
    array_push($error, 'Ref already exists in data base');
}

  
//if( veh_vehicles_fuel_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_vehicles_fuel_add(
        $vehicle_id ,  $fuel_code ,  $date ,  $price ,  $paid_by ,  $ref ,  $notes ,  $registred_by ,  $date_registre ,  $kl ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicles_fuel");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicles_fuel&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicles_fuel&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicles_fuel&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_vehicles_fuel&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


