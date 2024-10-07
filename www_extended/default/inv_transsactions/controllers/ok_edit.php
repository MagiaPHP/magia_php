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
# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `update` 
if (!permissions_has_permission($u_rol, $c, "update")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");

    # y matamos el proceso 
    die("Error has permission ");
}

// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;
$company_id = (isset($_REQUEST["company_id"]) && $_REQUEST["company_id"] != "") ? clean($_REQUEST["company_id"]) : false;
$product = (isset($_REQUEST["product"]) && $_REQUEST["product"] != "") ? clean($_REQUEST["product"]) : false;
$transaction_number = (isset($_REQUEST["transaction_number"]) && $_REQUEST["transaction_number"] != "") ? clean($_REQUEST["transaction_number"]) : false;
$period = (isset($_REQUEST["period"]) && $_REQUEST["period"] != "") ? clean($_REQUEST["period"]) : false;
$start_date = (isset($_REQUEST["start_date"]) && $_REQUEST["start_date"] != "") ? clean($_REQUEST["start_date"]) : false;
$operation_number = (isset($_REQUEST["operation_number"]) && $_REQUEST["operation_number"] != "") ? clean($_REQUEST["operation_number"]) : false;
$currency = (isset($_REQUEST["currency"]) && $_REQUEST["currency"] != "") ? clean($_REQUEST["currency"]) : false;
$amount = (isset($_REQUEST["amount"]) && $_REQUEST["amount"] != "") ? clean($_REQUEST["amount"]) : false;
$percentage = (isset($_REQUEST["percentage"]) && $_REQUEST["percentage"] != "") ? clean($_REQUEST["percentage"]) : false;
$term = (isset($_REQUEST["term"]) && $_REQUEST["term"] != "") ? clean($_REQUEST["term"]) : false;
$interest = (isset($_REQUEST["interest"]) && $_REQUEST["interest"] != "") ? clean($_REQUEST["interest"]) : false;
//$total = (isset($_REQUEST["total"]) && $_REQUEST["total"] !="") ? clean($_REQUEST["total"]) : false;
$retencion = (isset($_REQUEST["retencion"]) && $_REQUEST["retencion"] != "") ? clean($_REQUEST["retencion"]) : false;
$company_comission = (isset($_REQUEST["company_comission"]) && $_REQUEST["company_comission"] != "") ? clean($_REQUEST["company_comission"]) : false;
$comision_bolsa = (isset($_REQUEST["comision_bolsa"]) && $_REQUEST["comision_bolsa"] != "") ? clean($_REQUEST["comision_bolsa"]) : false;
//$total_receivable = (isset($_REQUEST["total_receivable"]) && $_REQUEST["total_receivable"] !="") ? clean($_REQUEST["total_receivable"]) : false;
$expiration_date = (isset($_REQUEST["expiration_date"]) && $_REQUEST["expiration_date"] != "") ? clean($_REQUEST["expiration_date"]) : false;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "") ? clean($_REQUEST["order_by"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "") ? clean($_REQUEST["status"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
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
if (!inv_transsactions_is_company_id($company_id)) {
    array_push($error, 'Company_id format error');
}
if (!inv_transsactions_is_product($product)) {
    array_push($error, 'Product format error');
}
if (!inv_transsactions_is_transaction_number($transaction_number)) {
    array_push($error, 'Transaction_number format error');
}
if (!inv_transsactions_is_period($period)) {
    array_push($error, 'Period format error');
}
if (!inv_transsactions_is_operation_number($operation_number)) {
    array_push($error, 'Operation_number format error');
}
if (!inv_transsactions_is_currency($currency)) {
    array_push($error, 'Currency format error');
}
if (!inv_transsactions_is_amount($amount)) {
    array_push($error, 'Amount format error');
}
if (!inv_transsactions_is_percentage($percentage)) {
    array_push($error, 'Percentage format error');
}
if (!inv_transsactions_is_term($term)) {
    array_push($error, 'Term format error');
}
if (!inv_transsactions_is_order_by($order_by)) {
    array_push($error, 'Order_by format error');
}
if (!inv_transsactions_is_status($status)) {
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
if (!$error) {

    inv_transsactions_update(
            $id,     $company_id, $product, $transaction_number, $period, 
            $start_date, $operation_number, $currency, $amount, $percentage, 
            $term, $interest, $retencion, $company_comission, 
            $comision_bolsa, $expiration_date, $order_by, $status
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
            // ejemplo index.php?c=inv_transsactions&a=ok_edit&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
