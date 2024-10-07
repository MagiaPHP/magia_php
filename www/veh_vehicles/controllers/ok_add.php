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
# Fecha de creacion del documento: 2024-09-16 17:09:36 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$marca = (isset($_POST["marca"]) && $_POST["marca"] !=""  && $_POST["marca"] !="null" ) ? clean($_POST["marca"]) :  null  ;
$modelo = (isset($_POST["modelo"]) && $_POST["modelo"] !=""  && $_POST["modelo"] !="null" ) ? clean($_POST["modelo"]) :  null  ;
$serie = (isset($_POST["serie"]) && $_POST["serie"] !=""  && $_POST["serie"] !="null" ) ? clean($_POST["serie"]) :  null  ;
$type = (isset($_POST["type"]) && $_POST["type"] !=""  && $_POST["type"] !="null" ) ? clean($_POST["type"]) :  null  ;
$pasangers = (isset($_POST["pasangers"]) && $_POST["pasangers"] !=""  && $_POST["pasangers"] !="null" ) ? clean($_POST["pasangers"]) :  null  ;
$year = (isset($_POST["year"]) && $_POST["year"] !=""  && $_POST["year"] !="null" ) ? clean($_POST["year"]) :  null  ;
$chasis = (isset($_POST["chasis"]) && $_POST["chasis"] !=""  && $_POST["chasis"] !="null" ) ? clean($_POST["chasis"]) :  null  ;
$color = (isset($_POST["color"]) && $_POST["color"] !=""  && $_POST["color"] !="null" ) ? clean($_POST["color"]) :  null  ;
$alto = (isset($_POST["alto"]) && $_POST["alto"] !=""  && $_POST["alto"] !="null" ) ? clean($_POST["alto"]) :  null  ;
$ancho = (isset($_POST["ancho"]) && $_POST["ancho"] !=""  && $_POST["ancho"] !="null" ) ? clean($_POST["ancho"]) :  null  ;
$largo = (isset($_POST["largo"]) && $_POST["largo"] !=""  && $_POST["largo"] !="null" ) ? clean($_POST["largo"]) :  null  ;
$date_buy = (isset($_POST["date_buy"]) && $_POST["date_buy"] !=""  && $_POST["date_buy"] !="null" ) ? clean($_POST["date_buy"]) :  null  ;
$mma = (isset($_POST["mma"]) && $_POST["mma"] !=""  && $_POST["mma"] !="null" ) ? clean($_POST["mma"]) :  null  ;
$towing_system = (isset($_POST["towing_system"]) && $_POST["towing_system"] !=""  && $_POST["towing_system"] !="null" ) ? clean($_POST["towing_system"]) :  null  ;
$towing_system_kl = (isset($_POST["towing_system_kl"]) && $_POST["towing_system_kl"] !=""  && $_POST["towing_system_kl"] !="null" ) ? clean($_POST["towing_system_kl"]) :  null  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$name) {                        
    array_push($error, 'Name is mandatory');
}
if (!$pasangers) {                        
    array_push($error, 'Pasangers is mandatory');
}
if (!$mma) {                        
    array_push($error, 'Mma is mandatory');
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

if (! veh_vehicles_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! veh_vehicles_is_pasangers($pasangers) ) {
    array_push($error, 'Pasangers format error');
}
if (! veh_vehicles_is_mma($mma) ) {
    array_push($error, 'Mma format error');
}
if (! veh_vehicles_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! veh_vehicles_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_vehicles_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( veh_vehicles_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_vehicles_add(
        $name ,  $marca ,  $modelo ,  $serie ,  $type ,  $pasangers ,  $year ,  $chasis ,  $color ,  $alto ,  $ancho ,  $largo ,  $date_buy ,  $mma ,  $towing_system ,  $towing_system_kl ,  $date_registre ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_vehicles");
            break;
            
        case 2:
            header("Location: index.php?c=veh_vehicles&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_vehicles&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_vehicles&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_vehicles&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


