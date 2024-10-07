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
# Fecha de creacion del documento: 2024-09-21 12:09:40 
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
$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] !=""  && $_POST["employee_id"] !="null" ) ? clean($_POST["employee_id"]) :  null  ;
$work_status_code = (isset($_POST["work_status_code"]) && $_POST["work_status_code"] !=""  && $_POST["work_status_code"] !="null" ) ? clean($_POST["work_status_code"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$employee_id) {
    array_push($error, 'Employee id is mandatory');
}
if (!$work_status_code) {
    array_push($error, 'Work status code is mandatory');
}
if (!$date_start) {
    array_push($error, 'Date start is mandatory');
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

if (! hr_employee_work_status_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_employee_work_status_is_work_status_code($work_status_code) ) {
    array_push($error, 'Work status code format error');
}
if (! hr_employee_work_status_is_date_start($date_start) ) {
    array_push($error, 'Date start format error');
}
if (! hr_employee_work_status_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_employee_work_status_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_employee_work_status_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    hr_employee_work_status_edit(
        $id ,  $employee_id ,  $work_status_code ,  $date_start ,  $date_end ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_work_status");
            break;
            
        case 2:
            header("Location: index.php?c=hr_employee_work_status&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_employee_work_status&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_employee_work_status&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_employee_work_status&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
