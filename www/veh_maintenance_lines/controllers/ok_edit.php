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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
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
$maintenance_id = (isset($_POST["maintenance_id"]) && $_POST["maintenance_id"] !=""  && $_POST["maintenance_id"] !="null" ) ? clean($_POST["maintenance_id"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] !=""  && $_POST["quantity"] !="null" ) ? clean($_POST["quantity"]) :  null  ;
$total = (isset($_POST["total"]) && $_POST["total"] !=""  && $_POST["total"] !="null" ) ? clean($_POST["total"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$maintenance_id) {
    array_push($error, 'Maintenance id is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
}
if (!$price) {
    array_push($error, 'Price is mandatory');
}
if (!$quantity) {
    array_push($error, 'Quantity is mandatory');
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

if (! veh_maintenance_lines_is_maintenance_id($maintenance_id) ) {
    array_push($error, 'Maintenance id format error');
}
if (! veh_maintenance_lines_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! veh_maintenance_lines_is_price($price) ) {
    array_push($error, 'Price format error');
}
if (! veh_maintenance_lines_is_quantity($quantity) ) {
    array_push($error, 'Quantity format error');
}
if (! veh_maintenance_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_maintenance_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( veh_maintenance_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    veh_maintenance_lines_edit(
        $id ,  $maintenance_id ,  $description ,  $price ,  $quantity ,  $total ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_maintenance_lines");
            break;
            
        case 2:
            header("Location: index.php?c=veh_maintenance_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_maintenance_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_maintenance_lines&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=veh_maintenance_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
