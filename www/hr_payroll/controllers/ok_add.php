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
# Fecha de creacion del documento: 2024-09-26 16:09:00 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] !=""  && $_POST["employee_id"] !="null" ) ? clean($_POST["employee_id"]) :  null  ;
$date_entry = (isset($_POST["date_entry"]) && $_POST["date_entry"] !=""  && $_POST["date_entry"] !="null" ) ? clean($_POST["date_entry"]) :  null  ;
$address = (isset($_POST["address"]) && $_POST["address"] !=""  && $_POST["address"] !="null" ) ? clean($_POST["address"]) :  null  ;
$fonction = (isset($_POST["fonction"]) && $_POST["fonction"] !=""  && $_POST["fonction"] !="null" ) ? clean($_POST["fonction"]) :  null  ;
$salary_base = (isset($_POST["salary_base"]) && $_POST["salary_base"] !=""  && $_POST["salary_base"] !="null" ) ? clean($_POST["salary_base"]) :  null  ;
$civil_status = (isset($_POST["civil_status"]) && $_POST["civil_status"] !=""  && $_POST["civil_status"] !="null" ) ? clean($_POST["civil_status"]) :  null  ;
$tax_system = (isset($_POST["tax_system"]) && $_POST["tax_system"] !=""  && $_POST["tax_system"] !="null" ) ? clean($_POST["tax_system"]) :  null  ;
$date_start = (isset($_POST["date_start"]) && $_POST["date_start"] !=""  && $_POST["date_start"] !="null" ) ? clean($_POST["date_start"]) :  null  ;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] !=""  && $_POST["date_end"] !="null" ) ? clean($_POST["date_end"]) :  null  ;
$value_round = (isset($_POST["value_round"]) && $_POST["value_round"] !="" ) ? clean($_POST["value_round"]) : 0.000000 ;
$to_pay = (isset($_POST["to_pay"]) && $_POST["to_pay"] !=""  && $_POST["to_pay"] !="null" ) ? clean($_POST["to_pay"]) :  null  ;
$account_number = (isset($_POST["account_number"]) && $_POST["account_number"] !=""  && $_POST["account_number"] !="null" ) ? clean($_POST["account_number"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
$extras = (isset($_POST["extras"]) && $_POST["extras"] !=""  && $_POST["extras"] !="null" ) ? clean($_POST["extras"]) :  null  ;
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
if (!$fonction) {                        
    array_push($error, 'Fonction is mandatory');
}
if (!$to_pay) {                        
    array_push($error, 'To pay is mandatory');
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

if (! hr_payroll_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_payroll_is_fonction($fonction) ) {
    array_push($error, 'Fonction format error');
}
if (! hr_payroll_is_to_pay($to_pay) ) {
    array_push($error, 'To pay format error');
}
if (! hr_payroll_is_code($code) ) {
    array_push($error, 'Code format error');
}
if (! hr_payroll_is_date_registre($date_registre) ) {
    array_push($error, 'Date registre format error');
}
if (! hr_payroll_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_payroll_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_payroll_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = hr_payroll_add(
        $employee_id ,  $date_entry ,  $address ,  $fonction ,  $salary_base ,  $civil_status ,  $tax_system ,  $date_start ,  $date_end ,  $value_round ,  $to_pay ,  $account_number ,  $notes ,  $extras ,  $code ,  $date_registre ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll");
            break;
            
        case 2:
            header("Location: index.php?c=hr_payroll&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_payroll&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_payroll&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=hr_payroll&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


