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
# Fecha de creacion del documento: 2024-09-21 12:09:04 
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
$year = (isset($_POST["year"]) && $_POST["year"] !=""  && $_POST["year"] !="null" ) ? clean($_POST["year"]) :  null  ;
$month = (isset($_POST["month"]) && $_POST["month"] !=""  && $_POST["month"] !="null" ) ? clean($_POST["month"]) :  null  ;
$benefit_code = (isset($_POST["benefit_code"]) && $_POST["benefit_code"] !=""  && $_POST["benefit_code"] !="null" ) ? clean($_POST["benefit_code"]) :  null  ;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] !=""  && $_POST["quantity"] !="null" ) ? clean($_POST["quantity"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$company_part = (isset($_POST["company_part"]) && $_POST["company_part"] !=""  && $_POST["company_part"] !="null" ) ? clean($_POST["company_part"]) :  null  ;
$employee_part = (isset($_POST["employee_part"]) && $_POST["employee_part"] !=""  && $_POST["employee_part"] !="null" ) ? clean($_POST["employee_part"]) :  null  ;
$company_part_value = (isset($_POST["company_part_value"]) && $_POST["company_part_value"] !=""  && $_POST["company_part_value"] !="null" ) ? clean($_POST["company_part_value"]) :  null  ;
$employee_part_value = (isset($_POST["employee_part_value"]) && $_POST["employee_part_value"] !=""  && $_POST["employee_part_value"] !="null" ) ? clean($_POST["employee_part_value"]) :  null  ;
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
if (!$year) {
    array_push($error, 'Year is mandatory');
}
if (!$month) {
    array_push($error, 'Month is mandatory');
}
if (!$benefit_code) {
    array_push($error, 'Benefit code is mandatory');
}
if (!$quantity) {
    array_push($error, 'Quantity is mandatory');
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

if (! hr_employee_benefits_by_month_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_employee_benefits_by_month_is_year($year) ) {
    array_push($error, 'Year format error');
}
if (! hr_employee_benefits_by_month_is_month($month) ) {
    array_push($error, 'Month format error');
}
if (! hr_employee_benefits_by_month_is_benefit_code($benefit_code) ) {
    array_push($error, 'Benefit code format error');
}
if (! hr_employee_benefits_by_month_is_quantity($quantity) ) {
    array_push($error, 'Quantity format error');
}
if (! hr_employee_benefits_by_month_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_employee_benefits_by_month_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_employee_benefits_by_month_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    hr_employee_benefits_by_month_edit(
        $id ,  $employee_id ,  $year ,  $month ,  $benefit_code ,  $quantity ,  $price ,  $company_part ,  $employee_part ,  $company_part_value ,  $employee_part_value ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_benefits_by_month");
            break;
            
        case 2:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_employee_benefits_by_month&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_employee_benefits_by_month&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
