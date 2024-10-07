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
# Fecha de creacion del documento: 2024-09-23 21:09:21 
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
$country = (isset($_POST["country"]) && $_POST["country"] !=""  && $_POST["country"] !="null" ) ? clean($_POST["country"]) :  null  ;
$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] !=""  && $_POST["category_code"] !="null" ) ? clean($_POST["category_code"]) :  null  ;
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$country) {
    array_push($error, 'Country is mandatory');
}
if (!$category_code) {
    array_push($error, 'Category code is mandatory');
}
if (!$date) {
    array_push($error, 'Date is mandatory');
}
if (!$description) {
    array_push($error, 'Description is mandatory');
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

if (! holidays_is_country($country) ) {
    array_push($error, 'Country format error');
}
if (! holidays_is_category_code($category_code) ) {
    array_push($error, 'Category code format error');
}
if (! holidays_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! holidays_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! holidays_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! holidays_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( holidays_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    holidays_edit(
        $id ,  $country ,  $category_code ,  $date ,  $description ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=holidays");
            break;
            
        case 2:
            header("Location: index.php?c=holidays&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=holidays&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=holidays&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=holidays&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
