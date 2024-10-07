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
# Fecha de creacion del documento: 2024-09-16 17:09:21 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$vehicle_id = (isset($_POST["vehicle_id"]) && $_POST["vehicle_id"] !=""  && $_POST["vehicle_id"] !="null" ) ? clean($_POST["vehicle_id"]) :  null  ;
$insurance_code = (isset($_POST["insurance_code"]) && $_POST["insurance_code"] !=""  && $_POST["insurance_code"] !="null" ) ? clean($_POST["insurance_code"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$contrat_number = (isset($_POST["contrat_number"]) && $_POST["contrat_number"] !=""  && $_POST["contrat_number"] !="null" ) ? clean($_POST["contrat_number"]) :  null  ;
$countries_ok = (isset($_POST["countries_ok"]) && $_POST["countries_ok"] !=""  && $_POST["countries_ok"] !="null" ) ? clean($_POST["countries_ok"]) :  null  ;
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
if (!$insurance_code) {                        
    array_push($error, 'Insurance code is mandatory');
}
if (!$date_start) {                        
    array_push($error, 'Date start is mandatory');
}
if (!$date_end) {                        
    array_push($error, 'Date end is mandatory');
}
if (!$contrat_number) {                        
    array_push($error, 'Contrat number is mandatory');
}
if (!$countries_ok) {                        
    array_push($error, 'Countries ok is mandatory');
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

if (! veh_vehicle_insurances_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicle_insurances_is_insurance_code($insurance_code) ) {
    array_push($error, 'Insurance code format error');
}
if (! veh_vehicle_insurances_is_date_start($date_start) ) {
    array_push($error, 'Date start format error');
}
if (! veh_vehicle_insurances_is_date_end($date_end) ) {
    array_push($error, 'Date end format error');
}
if (! veh_vehicle_insurances_is_contrat_number($contrat_number) ) {
    array_push($error, 'Contrat number format error');
}
if (! veh_vehicle_insurances_is_countries_ok($countries_ok) ) {
    array_push($error, 'Countries ok format error');
}
if (! veh_vehicle_insurances_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicle_insurances_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( veh_vehicle_insurances_search_by_unique("id","contrat_number", $contrat_number)){
    array_push($error, 'Contrat number already exists in data base');
}

  
//if( veh_vehicle_insurances_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_vehicle_insurances_add(
        $vehicle_id ,  $insurance_code ,  $date_start ,  $date_end ,  $contrat_number ,  $countries_ok ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicle_insurances");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicle_insurances&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicle_insurances&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicle_insurances&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_vehicle_insurances&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


