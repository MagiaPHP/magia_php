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
# Fecha de creacion del documento: 2024-09-23 09:09:43 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$date = (isset($_POST["date"]) && $_POST["date"] !="" ) ? clean($_POST["date"]) : current_timestamp() ;
$controller = (isset($_POST["controller"]) && $_POST["controller"] !=""  && $_POST["controller"] !="null" ) ? clean($_POST["controller"]) :  null  ;
$version = (isset($_POST["version"]) && $_POST["version"] !=""  && $_POST["version"] !="null" ) ? clean($_POST["version"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$code_install = (isset($_POST["code_install"]) && $_POST["code_install"] !=""  && $_POST["code_install"] !="null" ) ? clean($_POST["code_install"]) :  null  ;
$code_uninstall = (isset($_POST["code_uninstall"]) && $_POST["code_uninstall"] !=""  && $_POST["code_uninstall"] !="null" ) ? clean($_POST["code_uninstall"]) :  null  ;
$code_check = (isset($_POST["code_check"]) && $_POST["code_check"] !=""  && $_POST["code_check"] !="null" ) ? clean($_POST["code_check"]) :  null  ;
$installed = (isset($_POST["installed"]) && $_POST["installed"] !=""  && $_POST["installed"] !="null" ) ? clean($_POST["installed"]) :  null  ;
$pass = (isset($_POST["pass"]) && $_POST["pass"] !=""  && $_POST["pass"] !="null" ) ? clean($_POST["pass"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$code) {                        
    array_push($error, 'Code is mandatory');
}
if (!$date) {                        
    array_push($error, 'Date is mandatory');
}
if (!$version) {                        
    array_push($error, 'Version is mandatory');
}
if (!$name) {                        
    array_push($error, 'Name is mandatory');
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

if (! updates_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! updates_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! updates_is_version($version) ) {
    array_push($error, 'Version format error');
}
if (! updates_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! updates_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! updates_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! updates_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( updates_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = updates_add(
        $code ,  $date ,  $controller ,  $version ,  $name ,  $description ,  $code_install ,  $code_uninstall ,  $code_check ,  $installed ,  $pass ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=updates");
            break;
            
        case 2:
            header("Location: index.php?c=updates&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=updates&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=updates&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=updates&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


