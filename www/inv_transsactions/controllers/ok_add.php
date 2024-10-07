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
# Fecha de creacion del documento: 2024-08-23 20:08:29 
######################################################


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `create` 
if (!permissions_has_permission($u_rol, $c, "create")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}

$company_id = (isset($_POST["company_id"]) && $_POST["company_id"] !=""  && $_POST["company_id"] !="null" ) ? clean($_POST["company_id"]) :  null  ;
$product = (isset($_POST["product"]) && $_POST["product"] !=""  && $_POST["product"] !="null" ) ? clean($_POST["product"]) :  null  ;
$transaction_number = (isset($_POST["transaction_number"]) && $_POST["transaction_number"] !=""  && $_POST["transaction_number"] !="null" ) ? clean($_POST["transaction_number"]) :  null  ;
$period = (isset($_POST["period"]) && $_POST["period"] !=""  && $_POST["period"] !="null" ) ? clean($_POST["period"]) :  null  ;
$start_date = (isset($_POST["start_date"]) && $_POST["start_date"] !=""  && $_POST["start_date"] !="null" ) ? clean($_POST["start_date"]) :  null  ;
$operation_number = (isset($_POST["operation_number"]) && $_POST["operation_number"] !=""  && $_POST["operation_number"] !="null" ) ? clean($_POST["operation_number"]) :  null  ;
$currency = (isset($_POST["currency"]) && $_POST["currency"] !=""  && $_POST["currency"] !="null" ) ? clean($_POST["currency"]) :  null  ;
$amount = (isset($_POST["amount"]) && $_POST["amount"] !=""  && $_POST["amount"] !="null" ) ? clean($_POST["amount"]) :  null  ;
$percentage = (isset($_POST["percentage"]) && $_POST["percentage"] !=""  && $_POST["percentage"] !="null" ) ? clean($_POST["percentage"]) :  null  ;
$term = (isset($_POST["term"]) && $_POST["term"] !=""  && $_POST["term"] !="null" ) ? clean($_POST["term"]) :  null  ;
$interest = (isset($_POST["interest"]) && $_POST["interest"] !=""  && $_POST["interest"] !="null" ) ? clean($_POST["interest"]) :  null  ;
$total = (isset($_POST["total"]) && $_POST["total"] !=""  && $_POST["total"] !="null" ) ? clean($_POST["total"]) :  null  ;
$retencion = (isset($_POST["retencion"]) && $_POST["retencion"] !=""  && $_POST["retencion"] !="null" ) ? clean($_POST["retencion"]) :  null  ;
$company_comission = (isset($_POST["company_comission"]) && $_POST["company_comission"] !=""  && $_POST["company_comission"] !="null" ) ? clean($_POST["company_comission"]) :  null  ;
$comision_bolsa = (isset($_POST["comision_bolsa"]) && $_POST["comision_bolsa"] !=""  && $_POST["comision_bolsa"] !="null" ) ? clean($_POST["comision_bolsa"]) :  null  ;
$total_receivable = (isset($_POST["total_receivable"]) && $_POST["total_receivable"] !=""  && $_POST["total_receivable"] !="null" ) ? clean($_POST["total_receivable"]) :  null  ;
$expiration_date = (isset($_POST["expiration_date"]) && $_POST["expiration_date"] !=""  && $_POST["expiration_date"] !="null" ) ? clean($_POST["expiration_date"]) :  null  ;
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
if (!$product) {
    array_push($error, 'Product is mandatory');
}
if (!$transaction_number) {
    array_push($error, 'Transaction_number is mandatory');
}
if (!$period) {
    array_push($error, 'Period is mandatory');
}
if (!$operation_number) {
    array_push($error, 'Operation_number is mandatory');
}
if (!$currency) {
    array_push($error, 'Currency is mandatory');
}
if (!$amount) {
    array_push($error, 'Amount is mandatory');
}
if (!$percentage) {
    array_push($error, 'Percentage is mandatory');
}
if (!$term) {
    array_push($error, 'Term is mandatory');
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
if (! inv_transsactions_is_company_id($company_id) ) {
    array_push($error, 'Company_id format error');
}
if (! inv_transsactions_is_product($product) ) {
    array_push($error, 'Product format error');
}
if (! inv_transsactions_is_transaction_number($transaction_number) ) {
    array_push($error, 'Transaction_number format error');
}
if (! inv_transsactions_is_period($period) ) {
    array_push($error, 'Period format error');
}
if (! inv_transsactions_is_operation_number($operation_number) ) {
    array_push($error, 'Operation_number format error');
}
if (! inv_transsactions_is_currency($currency) ) {
    array_push($error, 'Currency format error');
}
if (! inv_transsactions_is_amount($amount) ) {
    array_push($error, 'Amount format error');
}
if (! inv_transsactions_is_percentage($percentage) ) {
    array_push($error, 'Percentage format error');
}
if (! inv_transsactions_is_term($term) ) {
    array_push($error, 'Term format error');
}
if (! inv_transsactions_is_order_by($order_by) ) {
    array_push($error, 'Order_by format error');
}
if (! inv_transsactions_is_status($status) ) {
    array_push($error, 'Status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
  
//if( inv_transsactions_search($status)){
    //array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = inv_transsactions_add(
        $company_id ,  $product ,  $transaction_number ,  $period ,  $start_date ,  $operation_number ,  $currency ,  $amount ,  $percentage ,  $term ,  $interest ,  $total ,  $retencion ,  $company_comission ,  $comision_bolsa ,  $total_receivable ,  $expiration_date ,  $order_by ,  $status    
    );
              

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=inv_transsactions");
            break;
            
        case 2:
            header("Location: index.php?c=inv_transsactions&a=details&id=$id");
            break;
            
        case 3:
            header("Location: index.php?c=inv_transsactions&a=edit&id=$id");
            break;
            
        case 4:
            header("Location: index.php?c=inv_transsactions&a=details&id=$lastInsertId");
            break;
            
        case 5: // custom
            // ejemplo index.php?c=inv_transsactions&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;


        default:
            header("Location: index.php?");
            break;
    }
 
} else {

    include view("home", "pageError");
}


