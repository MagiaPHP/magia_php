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
# Fecha de creacion del documento: 2024-09-27 11:09:56 
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
$contact_id = (isset($_POST["contact_id"]) && $_POST["contact_id"] !=""  && $_POST["contact_id"] !="null" ) ? clean($_POST["contact_id"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$address = (isset($_POST["address"]) && $_POST["address"] !=""  && $_POST["address"] !="null" ) ? clean($_POST["address"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$contact_id) {
    array_push($error, 'Contact id is mandatory');
}
if (!$code) {
    array_push($error, 'Code is mandatory');
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

if (! projects_is_contact_id($contact_id) ) {
    array_push($error, 'Contact id format error');
}
if (! projects_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! projects_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! projects_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( projects_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( projects_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    projects_edit(
        $id ,  $contact_id ,  $name ,  $description ,  $address ,  $date_start ,  $date_end ,  $code ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=projects");
            break;
            
        case 2:
            header("Location: index.php?c=projects&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=projects&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=projects&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=projects&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
