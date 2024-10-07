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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$in_out = (isset($_POST["in_out"]) && $_POST["in_out"] !=""  && $_POST["in_out"] !="null" ) ? clean($_POST["in_out"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$formula = (isset($_POST["formula"]) && $_POST["formula"] !=""  && $_POST["formula"] !="null" ) ? clean($_POST["formula"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$in_out) {                        
    array_push($error, 'In out is mandatory');
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

if (! hr_payroll_items_is_in_out($in_out) ) {
    array_push($error, 'In out format error');
}
if (! hr_payroll_items_is_description($description) ) {
    array_push($error, 'Description format error');
}
if (! hr_payroll_items_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_payroll_items_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################


if( hr_payroll_items_search_by_unique("id","code", $code)){
    array_push($error, 'Code already exists in data base');
}

  
//if( hr_payroll_items_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = hr_payroll_items_add(
        $code ,  $in_out ,  $description ,  $formula ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_payroll_items");
            break;
            
        case 2:
            header("Location: index.php?c=hr_payroll_items&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_payroll_items&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_payroll_items&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=hr_payroll_items&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


