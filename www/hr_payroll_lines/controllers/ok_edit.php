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
# Fecha de creacion del documento: 2024-09-21 12:09:54 
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
$payroll_id = (isset($_POST["payroll_id"]) && $_POST["payroll_id"] !=""  && $_POST["payroll_id"] !="null" ) ? clean($_POST["payroll_id"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$in_out = (isset($_POST["in_out"]) && $_POST["in_out"] !=""  && $_POST["in_out"] !="null" ) ? clean($_POST["in_out"]) :  null  ;
$days = (isset($_POST["days"]) && $_POST["days"] !=""  && $_POST["days"] !="null" ) ? clean($_POST["days"]) :  null  ;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] !=""  && $_POST["quantity"] !="null" ) ? clean($_POST["quantity"]) :  null  ;
$value = (isset($_POST["value"]) && $_POST["value"] !=""  && $_POST["value"] !="null" ) ? clean($_POST["value"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$formula = (isset($_POST["formula"]) && $_POST["formula"] !=""  && $_POST["formula"] !="null" ) ? clean($_POST["formula"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$payroll_id) {
    array_push($error, 'Payroll id is mandatory');
}
if (!$value) {
    array_push($error, 'Value is mandatory');
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

if (! hr_payroll_lines_is_payroll_id($payroll_id) ) {
    array_push($error, 'Payroll id format error');
}
if (! hr_payroll_lines_is_value($value) ) {
    array_push($error, 'Value format error');
}
if (! hr_payroll_lines_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! hr_payroll_lines_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_payroll_lines_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_payroll_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    hr_payroll_lines_edit(
        $id ,  $payroll_id ,  $code ,  $in_out ,  $days ,  $quantity ,  $value ,  $description ,  $formula ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_lines");
            break;
            
        case 2:
            header("Location: index.php?c=hr_payroll_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_payroll_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_payroll_lines&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=hr_payroll_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
