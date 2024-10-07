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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$error = array();

#################################################################################

    
$veh_vehicle_management = null;
    
#################################################################################

    
$order_data = order_by_get_order_data($u_id, "veh_vehicle_management", $order_col, $order_way);

$pagination = new Pagination($page, veh_vehicle_management_list(0, 999, $order_data["col_name"], $order_data["order_way"]));

$veh_vehicle_management = veh_vehicle_management_list($pagination->getStart(), $pagination->getLimit(), $order_data["col_name"], $order_data["order_way"]);    

#################################################################################

    
include view("veh_vehicle_management", "index");  
    
