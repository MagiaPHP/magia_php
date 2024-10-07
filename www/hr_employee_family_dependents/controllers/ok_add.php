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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$employee_id = (isset($_POST["employee_id"]) && $_POST["employee_id"] !=""  && $_POST["employee_id"] !="null" ) ? clean($_POST["employee_id"]) :  null  ;
$name = (isset($_POST["name"]) && $_POST["name"] !=""  && $_POST["name"] !="null" ) ? clean($_POST["name"]) :  null  ;
$lastname = (isset($_POST["lastname"]) && $_POST["lastname"] !=""  && $_POST["lastname"] !="null" ) ? clean($_POST["lastname"]) :  null  ;
$birthday = (isset($_POST["birthday"]) && $_POST["birthday"] !=""  && $_POST["birthday"] !="null" ) ? clean($_POST["birthday"]) :  null  ;
$relation = (isset($_POST["relation"]) && $_POST["relation"] !=""  && $_POST["relation"] !="null" ) ? clean($_POST["relation"]) :  null  ;
$in_charge = (isset($_POST["in_charge"]) && $_POST["in_charge"] !=""  && $_POST["in_charge"] !="null" ) ? clean($_POST["in_charge"]) :  null  ;
$handicap = (isset($_POST["handicap"]) && $_POST["handicap"] !=""  && $_POST["handicap"] !="null" ) ? clean($_POST["handicap"]) :  null  ;
$notes = (isset($_POST["notes"]) && $_POST["notes"] !=""  && $_POST["notes"] !="null" ) ? clean($_POST["notes"]) :  null  ;
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
if (!$name) {                        
    array_push($error, 'Name is mandatory');
}
if (!$lastname) {                        
    array_push($error, 'Lastname is mandatory');
}
if (!$relation) {                        
    array_push($error, 'Relation is mandatory');
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

if (! hr_employee_family_dependents_is_employee_id($employee_id) ) {
    array_push($error, 'Employee id format error');
}
if (! hr_employee_family_dependents_is_name($name) ) {
    array_push($error, 'Name format error');
}
if (! hr_employee_family_dependents_is_lastname($lastname) ) {
    array_push($error, 'Lastname format error');
}
if (! hr_employee_family_dependents_is_relation($relation) ) {
    array_push($error, 'Relation format error');
}
if (! hr_employee_family_dependents_is_order_by($order_by) ) {
    array_push($error, 'Order by format error');
}
if (! hr_employee_family_dependents_is_status($status) ) {
    array_push($error, 'Status format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( hr_employee_family_dependents_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = hr_employee_family_dependents_add(
        $employee_id ,  $name ,  $lastname ,  $birthday ,  $relation ,  $in_charge ,  $handicap ,  $notes ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=hr_employee_family_dependents");
            break;
            
        case 2:
            header("Location: index.php?c=hr_employee_family_dependents&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=hr_employee_family_dependents&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=hr_employee_family_dependents&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=hr_employee_family_dependents&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


