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
# Fecha de creacion del documento: 2024-09-21 12:09:42 
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
$date = (isset($_POST["date"]) && $_POST["date"] !=""  && $_POST["date"] !="null" ) ? clean($_POST["date"]) :  null  ;
$start_am = (isset($_POST["start_am"]) && $_POST["start_am"] !=""  && $_POST["start_am"] !="null" ) ? clean($_POST["start_am"]) :  null  ;
$end_am = (isset($_POST["end_am"]) && $_POST["end_am"] !=""  && $_POST["end_am"] !="null" ) ? clean($_POST["end_am"]) :  null  ;
$lunch = (isset($_POST["lunch"]) && $_POST["lunch"] !=""  && $_POST["lunch"] !="null" ) ? clean($_POST["lunch"]) :  null  ;
$start_pm = (isset($_POST["start_pm"]) && $_POST["start_pm"] !=""  && $_POST["start_pm"] !="null" ) ? clean($_POST["start_pm"]) :  null  ;
$end_pm = (isset($_POST["end_pm"]) && $_POST["end_pm"] !=""  && $_POST["end_pm"] !="null" ) ? clean($_POST["end_pm"]) :  null  ;
$total_hours = (isset($_POST["total_hours"]) && $_POST["total_hours"] !=""  && $_POST["total_hours"] !="null" ) ? clean($_POST["total_hours"]) :  null  ;
$project_id = (isset($_POST["project_id"]) && $_POST["project_id"] !=""  && $_POST["project_id"] !="null" ) ? clean($_POST["project_id"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$year = (isset($_POST["year"]) && $_POST["year"] !=""  && $_POST["year"] !="null" ) ? clean($_POST["year"]) :  null  ;
$month = (isset($_POST["month"]) && $_POST["month"] !=""  && $_POST["month"] !="null" ) ? clean($_POST["month"]) :  null  ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$employee_id) {
    array_push($error, 'Employee id is mandatory');
}
if (!$date) {
    array_push($error, 'Date is mandatory');
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

if (! hr_employee_worked_days_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_employee_worked_days_is_date($date) ) {
    array_push($error, 'Date format error');
}
if (! hr_employee_worked_days_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_employee_worked_days_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_employee_worked_days_search($month)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    hr_employee_worked_days_edit(
        $id ,  $employee_id ,  $date ,  $start_am ,  $end_am ,  $lunch ,  $start_pm ,  $end_pm ,  $total_hours ,  $project_id ,  $notes ,  $order_by ,  $status ,  $year ,  $month    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_worked_days");
            break;
            
        case 2:
            header("Location: index.php?c=hr_employee_worked_days&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_employee_worked_days&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_employee_worked_days&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_employee_worked_days&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
