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
# Fecha de creacion del documento: 2024-09-21 12:09:55 
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
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$icon = (isset($_POST["icon"]) && $_POST["icon"] !=""  && $_POST["icon"] !="null" ) ? clean($_POST["icon"]) :  null  ;
$color = (isset($_POST["color"]) && $_POST["color"] !=""  && $_POST["color"] !="null" ) ? clean($_POST["color"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$code) {
    array_push($error, 'Code is mandatory');
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

if (! hr_civil_status_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! hr_civil_status_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! hr_civil_status_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_civil_status_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( hr_civil_status_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( hr_civil_status_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    hr_civil_status_edit(
        $id ,  $code ,  $description ,  $icon ,  $color ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_civil_status");
            break;
            
        case 2:
            header("Location: index.php?c=hr_civil_status&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_civil_status&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_civil_status&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_civil_status&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
