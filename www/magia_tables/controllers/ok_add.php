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
# Fecha de creacion del documento: 2024-08-31 17:08:56 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$label = (isset($_POST["label"]) && $_POST["label"] !=""  && $_POST["label"] !="null" ) ? clean($_POST["label"]) :  null  ;
$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$action = (isset($_POST["action"]) && $_POST["action"] !=""  && $_POST["action"] !="null" ) ? clean($_POST["action"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$label) {                        
    array_push($error, 'Label is mandatory');
}
if (!$controller) {                        
    array_push($error, 'Controller is mandatory');
}
if (!$action) {                        
    array_push($error, 'Action is mandatory');
}
if (!$name) {                        
    array_push($error, 'Name is mandatory');
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

if (! magia_tables_is_label($label) ) {
    array_push($error, 'Label format error');
}
if (! magia_tables_is_controller($controller) ) {
    array_push($error, 'Controller format error');
}
if (! magia_tables_is_action($action) ) {
    array_push($error, 'Action format error');
}
if (! magia_tables_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! magia_tables_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! magia_tables_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! magia_tables_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( magia_tables_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = magia_tables_add(
        $label ,  $controller ,  $action ,  $name ,  $code ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=magia_tables");
            break;
            
        case 2:
            header("Location: index.php?c=magia_tables&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=magia_tables&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=magia_tables&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=magia_tables&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


