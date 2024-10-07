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
# Fecha de creacion del documento: 2024-09-04 08:09:28 
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
$expense_id = (isset($_POST["expense_id"]) && $_POST["expense_id"] !=""  && $_POST["expense_id"] !="null" ) ? clean($_POST["expense_id"]) :  null  ;
$budget_id = (isset($_POST["budget_id"]) && $_POST["budget_id"] !=""  && $_POST["budget_id"] !="null" ) ? clean($_POST["budget_id"]) :  null  ;
$category_code = (isset($_POST["category_code"]) && $_POST["category_code"] !=""  && $_POST["category_code"] !="null" ) ? clean($_POST["category_code"]) :  null  ;
$code = (isset($_POST["code"]) && $_POST["code"] !=""  && $_POST["code"] !="null" ) ? clean($_POST["code"]) :  magia_uniqid()  ;
$quantity = (isset($_POST["quantity"]) && $_POST["quantity"] !=""  && $_POST["quantity"] !="null" ) ? clean($_POST["quantity"]) :  null  ;
$description = (isset($_POST["description"]) && $_POST["description"] !=""  && $_POST["description"] !="null" ) ? clean($_POST["description"]) :  null  ;
$price = (isset($_POST["price"]) && $_POST["price"] !=""  && $_POST["price"] !="null" ) ? clean($_POST["price"]) :  null  ;
$discounts = (isset($_POST["discounts"]) && $_POST["discounts"] !=""  && $_POST["discounts"] !="null" ) ? clean($_POST["discounts"]) :  null  ;
$discounts_mode = (isset($_POST["discounts_mode"]) && $_POST["discounts_mode"] !=""  && $_POST["discounts_mode"] !="null" ) ? clean($_POST["discounts_mode"]) :  null  ;
$tax = (isset($_POST["tax"]) && $_POST["tax"] !=""  && $_POST["tax"] !="null" ) ? clean($_POST["tax"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? clean($_POST["redi"]) : false; 
$error = array();
#################################################################################

# REQUIRED
#################################################################################

if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}

#################################################################################

# FORMAT
#################################################################################

if (! expenses_lines_is_expense_id($expense_id) ) {
    array_push($error, 'Expense id format error');
}

#################################################################################

# CONDITIONAL
#################################################################################

  
//if( expenses_lines_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
#################################################################################

if (! $error ) {
    
    expenses_lines_edit(
        $id ,  $expense_id ,  $budget_id ,  $category_code ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status    
        );
        


switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=expenses_lines");
            break;
            
        case 2:
            header("Location: index.php?c=expenses_lines&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=expenses_lines&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=expenses_lines&a=details&id=$lastInsertId");
            break;
            

        case 5: // custom
            // ejemplo index.php?c=expenses_lines&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }    


} else {

    include view("home", "pageError");
}
