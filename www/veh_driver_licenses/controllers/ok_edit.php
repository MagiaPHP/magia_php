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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
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
$category = (isset($_POST["category"]) && $_POST["category"] !=""  && $_POST["category"] !="null" ) ? clean($_POST["category"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$min_age = (isset($_POST["min_age"]) && $_POST["min_age"] !=""  && $_POST["min_age"] !="null" ) ? clean($_POST["min_age"]) :  null  ;
$max_weight = (isset($_POST["max_weight"]) && $_POST["max_weight"] !=""  && $_POST["max_weight"] !="null" ) ? clean($_POST["max_weight"]) :  null  ;
$max_passengers = (isset($_POST["max_passengers"]) && $_POST["max_passengers"] !=""  && $_POST["max_passengers"] !="null" ) ? clean($_POST["max_passengers"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$category) {
    array_push($error, 'Category is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
}
if (!$min_age) {
    array_push($error, 'Min age is mandatory');
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

if (! veh_driver_licenses_is_category($category) ) {
    array_push($error, 'Category format error');
}
if (! veh_driver_licenses_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! veh_driver_licenses_is_min_age($min_age) ) {
    array_push($error, 'Min age format error');
}
if (! veh_driver_licenses_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! veh_driver_licenses_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( veh_driver_licenses_search_by_unique("id","category", $category)){
    array_push($error, 'Category already exists in data base');
}

  
//if( veh_driver_licenses_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    veh_driver_licenses_edit(
        $id ,  $category ,  $description ,  $min_age ,  $max_weight ,  $max_passengers ,  $notes ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=veh_driver_licenses");
            break;
            
        case 2:
            header("Location: index.php?c=veh_driver_licenses&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=veh_driver_licenses&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=veh_driver_licenses&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=veh_driver_licenses&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
