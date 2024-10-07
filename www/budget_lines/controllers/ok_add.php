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
# Fecha de creacion del documento: 2024-09-16 12:09:08 
#################################################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"]) && $_POST["budget_id"] !=""  && $_POST["budget_id"] !="null" ) ? clean($_POST["budget_id"]) :  null  ;
$order_id = (isset($_POST["order_id"]) && $_POST["order_id"] !=""  && $_POST["order_id"] !="null" ) ? clean($_POST["order_id"]) :  null  ;
$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] !=""  && $_POST["category_code"] !="null" ) ? clean($_POST["category_code"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] !=""  && $_POST["quantity"] !="null" ) ? clean($_POST["quantity"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$discounts = (isset($_POST["discounts"]) && $_POST["discounts"] !="" ) ? clean($_POST["discounts"]) :  null  ;
$discounts_mode = (isset($_POST["discounts_mode"]) && $_POST["discounts_mode"] !="" ) ? clean($_POST["discounts_mode"]) : % ;
$tax = (isset($_POST["tax"]) && $_POST["tax"] !=""  && $_POST["tax"] !="null" ) ? clean($_POST["tax"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !=""  && $_POST["order_by"] !="null" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !=""  && $_POST["status"] !="null" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$budget_id) {                        
    array_push($error, 'Budget id is mandatory');
}
if (!$discounts) {                        
    array_push($error, 'Discounts is mandatory');
}
if (!$discounts_mode) {                        
    array_push($error, 'Discounts mode is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! budget_lines_is_budget_id($budget_id) ) {
    array_push($error, 'Budget id format error');
}
if (! budget_lines_is_discounts($discounts) ) {
    array_push($error, 'Discounts format error');
}
if (! budget_lines_is_discounts_mode($discounts_mode) ) {
    array_push($error, 'Discounts mode format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( budget_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

#################################################################################

#################################################################################

#################################################################################

if (!$error) {
    $lastInsertId = budget_lines_add(
        $budget_id ,  $order_id ,  $category_code ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=budget_lines");
            break;
            
        case 2:
            header("Location: index.php?c=budget_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=budget_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=budget_lines&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=budget_lines&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
    




 
} else {

    include view("home", "pageError");
}


