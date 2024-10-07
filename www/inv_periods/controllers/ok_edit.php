<?php 
###################################################### 
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
# Fecha de creacion del documento: 2024-08-23 18:08:12 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$period = (isset($_REQUEST["period"]) && $_REQUEST["period"] !="") ? clean($_REQUEST["period"]) : false;
$description = (isset($_REQUEST["description"]) && $_REQUEST["description"] !="") ? clean($_REQUEST["description"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] !="") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] !="") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$period) {
    array_push($error, 'Period is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (! inv_periods_is_period($period) ) {
    array_push($error, 'Period format error');
}
if (! inv_periods_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! inv_periods_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################

if( inv_periods_search_by_unique("id","period", $period)){
    array_push($error, 'Period already exists in data base');
}

  
//if( inv_periods_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
if (! $error ) {
    
    inv_periods_edit(
        $id ,  $period ,  $description ,  $order_by ,  $status    
        );
        
switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=inv_periods");
            break;
            
        case 2:
            header("Location: index.php?c=inv_periods&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=inv_periods&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=inv_periods&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=inv_periods&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;




        default:
            header("Location: index.php?");
            break;
    }    







} else {

    include view("home", "pageError");
}
