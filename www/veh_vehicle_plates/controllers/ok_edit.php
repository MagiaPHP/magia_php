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
# Fecha de creacion del documento: 2024-09-16 17:09:32 
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
$plate = (isset($_POST["plate"]) && $_POST["plate"] !=""  && $_POST["plate"] !="null" ) ? clean($_POST["plate"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$old_plate = (isset($_POST["old_plate"]) && $_POST["old_plate"] !=""  && $_POST["old_plate"] !="null" ) ? clean($_POST["old_plate"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
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
if (!$plate) {
    array_push($error, 'Plate is mandatory');
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

if (! veh_vehicle_plates_is_vehicle_id($vehicle_id) ) {
    array_push($error, 'Vehicle id format error');
}
if (! veh_vehicle_plates_is_plate($plate) ) {
    array_push($error, 'Plate format error');
}
if (! veh_vehicle_plates_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! veh_vehicle_plates_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicle_plates_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( veh_vehicle_plates_search_by_unique("id","plate", $plate)){
    array_push($error, 'Plate already exists in data base');
}

  
//if( veh_vehicle_plates_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    veh_vehicle_plates_edit(
        $id ,  $vehicle_id ,  $plate ,  $date_start ,  $date_end ,  $old_plate ,  $date_registre ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicle_plates");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicle_plates&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicle_plates&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicle_plates&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=veh_vehicle_plates&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
