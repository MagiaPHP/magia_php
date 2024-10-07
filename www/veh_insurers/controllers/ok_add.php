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
# Fecha de creacion del documento: 2024-09-16 17:09:04 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$insurer_id = (isset($_POST["insurer_id"]) && $_POST["insurer_id"] !=""  && $_POST["insurer_id"] !="null" ) ? clean($_POST["insurer_id"]) :  null  ;
$insurer_code = (isset($_POST["insurer_code"]) && $_POST["insurer_code"] !=""  && $_POST["insurer_code"] !="null" ) ? clean($_POST["insurer_code"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$insurer_id) {                        
    array_push($error, 'Insurer id is mandatory');
}
if (!$insurer_code) {                        
    array_push($error, 'Insurer code is mandatory');
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

if (! veh_insurers_is_insurer_id($insurer_id) ) {
    array_push($error, 'Insurer id format error');
}
if (! veh_insurers_is_insurer_code($insurer_code) ) {
    array_push($error, 'Insurer code format error');
}
if (! veh_insurers_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_insurers_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( veh_insurers_search_by_unique("id","insurer_code", $insurer_code)){
    array_push($error, 'Insurer code already exists in data base');
}

  
//if( veh_insurers_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = veh_insurers_add(
        $insurer_id ,  $insurer_code ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_insurers");
            break;
            
        case 2:
            header("Location: index.php?c=veh_insurers&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_insurers&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_insurers&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=veh_insurers&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


