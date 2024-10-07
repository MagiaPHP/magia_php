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
# Fecha de creacion del documento: 2024-09-04 14:09:29 
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
$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$action = (isset($_POST["action"]) && $_POST["action"] !=""  && $_POST["action"] !="null" ) ? clean($_POST["action"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$panel = (isset($_POST["panel"]) && $_POST["panel"] !=""  && $_POST["panel"] !="null" ) ? clean($_POST["panel"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$controller) {
    array_push($error, 'Controller is mandatory');
}
if (!$action) {
    array_push($error, 'Action is mandatory');
}
if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$panel) {
    array_push($error, 'Panel is mandatory');
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

if (! panels_is_controller($controller) ) {
    array_push($error, 'Controller format error');
}
if (! panels_is_action($action) ) {
    array_push($error, 'Action format error');
}
if (! panels_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! panels_is_panel($panel) ) {
    array_push($error, 'Panel format error');
}
if (! panels_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! panels_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( panels_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    panels_edit(
        $id ,  $controller ,  $action ,  $name ,  $panel ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=panels");
            break;
            
        case 2:
            header("Location: index.php?c=panels&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=panels&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=panels&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=panels&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
