<?php 
###################################################### 
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
# Fecha de creacion del documento: 2024-08-23 18:08:09 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$company_id = (isset($_POST["company_id"]) && $_POST["company_id"] !=""  && $_POST["company_id"] !="null" ) ? clean($_POST["company_id"]) :  null  ;
$company_type = (isset($_POST["company_type"]) && $_POST["company_type"] !=""  && $_POST["company_type"] !="null" ) ? clean($_POST["company_type"]) :  null  ;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] !="" ) ? clean($_POST["order_by"]) : 1 ;
$status = (isset($_POST["status"]) && $_POST["status"] !="" ) ? clean($_POST["status"]) : 1 ;
$redi = (isset($_POST["redi"]) && $_POST["redi"] !="" ) ? ($_POST["redi"]) : false;  
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$company_id) {
    array_push($error, 'Company_id is mandatory');
}
if (!$company_type) {
    array_push($error, 'Company_type is mandatory');
}
if (!$order_by) {
    array_push($error, 'Order_by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (! inv_companies_is_company_id($company_id) ) {
    array_push($error, 'Company_id format error');
}
if (! inv_companies_is_company_type($company_type) ) {
    array_push($error, 'Company_type format error');
}
if (! inv_companies_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! inv_companies_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( inv_companies_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = inv_companies_add(
        $company_id ,  $company_type ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=inv_companies");
            break;
            
        case 2:
            header("Location: index.php?c=inv_companies&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=inv_companies&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=inv_companies&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=inv_companies&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


