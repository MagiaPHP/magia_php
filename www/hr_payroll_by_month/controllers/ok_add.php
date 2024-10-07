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
# Fecha de creacion del documento: 2024-09-21 12:09:50 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] !=""  && $_POST["employee_id"] !="null" ) ? clean($_POST["employee_id"]) :  null  ;
$year = (isset($_POST["year"]) && $_POST["year"] !=""  && $_POST["year"] !="null" ) ? clean($_POST["year"]) :  null  ;
$month = (isset($_POST["month"]) && $_POST["month"] !=""  && $_POST["month"] !="null" ) ? clean($_POST["month"]) :  null  ;
$column = (isset($_POST["column"]) && $_POST["column"] !=""  && $_POST["column"] !="null" ) ? clean($_POST["column"]) :  null  ;
$value = (isset($_POST["value"]) && $_POST["value"] !="" ) ? clean($_POST["value"]) : 0.000000 ;
$formule = (isset($_POST["formule"]) && $_POST["formule"] !=""  && $_POST["formule"] !="null" ) ? clean($_POST["formule"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$date_registre = (isset($_POST["date_registre"]) && $_POST["date_registre"] !="" ) ? clean($_POST["date_registre"]) :  date('Y-m-d G:i:s')  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$employee_id) {                        
    array_push($error, 'Employee id is mandatory');
}
if (!$year) {                        
    array_push($error, 'Year is mandatory');
}
if (!$month) {                        
    array_push($error, 'Month is mandatory');
}
if (!$column) {                        
    array_push($error, 'Column is mandatory');
}
if (!$code) {                        
    array_push($error, 'Code is mandatory');
}
if (!$date_registre) {                        
    array_push($error, 'Date registre is mandatory');
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

if (! hr_payroll_by_month_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_payroll_by_month_is_year($year) ) {
    array_push($error, 'Year format error');
}
if (! hr_payroll_by_month_is_month($month) ) {
    array_push($error, 'Month format error');
}
if (! hr_payroll_by_month_is_column($column) ) {
    array_push($error, 'Column format error');
}
if (! hr_payroll_by_month_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! hr_payroll_by_month_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! hr_payroll_by_month_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_payroll_by_month_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_payroll_by_month_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = hr_payroll_by_month_add(
        $employee_id ,  $year ,  $month ,  $column ,  $value ,  $formule ,  $notes ,  $code ,  $date_registre ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_by_month");
            break;
            
        case 2:
            header("Location: index.php?c=hr_payroll_by_month&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_payroll_by_month&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_payroll_by_month&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=hr_payroll_by_month&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


