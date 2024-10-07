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
# Fecha de creacion del documento: 2024-09-16 17:09:28 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$vehicle_id = (isset($_POST["vehicle_id"]) && $_POST["vehicle_id"] !=""  && $_POST["vehicle_id"] !="null" ) ? clean($_POST["vehicle_id"]) :  null  ;
$maintenance_type = (isset($_POST["maintenance_type"]) && $_POST["maintenance_type"] !=""  && $_POST["maintenance_type"] !="null" ) ? clean($_POST["maintenance_type"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$cost = (isset($_POST["cost"]) && $_POST["cost"] !=""  && $_POST["cost"] !="null" ) ? clean($_POST["cost"]) :  null  ;
$mileage = (isset($_POST["mileage"]) && $_POST["mileage"] !=""  && $_POST["mileage"] !="null" ) ? clean($_POST["mileage"]) :  null  ;
$next_due_date = (isset($_POST["next_due_date"]) && $_POST["next_due_date"] !=""  && $_POST["next_due_date"] !="null" ) ? clean($_POST["next_due_date"]) :  null  ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$vehicle_id) {                        
    array_push($error, 'Vehicle id is mandatory');
}
if (!$maintenance_type) {                        
    array_push($error, 'Maintenance type is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! veh_vehicle_management_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicle_management_is_maintenance_type($maintenance_type) ) {
    array_push($error, 'Maintenance type format error');
}
if (! veh_vehicle_management_is_date($date) ) {
    array_push($error, 'Date format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( veh_vehicle_management_search($next_due_date)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_vehicle_management_add(
        $vehicle_id ,  $maintenance_type ,  $description ,  $date ,  $cost ,  $mileage ,  $next_due_date    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicle_management");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicle_management&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicle_management&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicle_management&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_vehicle_management&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


