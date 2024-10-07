<?php

# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:43 
# Aca puedes agregar tus funciones  


/**
 * Sacados los totales
 * @global type $db
 * @param type $id
 * @param type $company_id
 * @param type $product
 * @param type $transaction_number
 * @param type $period
 * @param type $start_date
 * @param type $operation_number
 * @param type $currency
 * @param type $amount
 * @param type $percentage
 * @param type $term
 * @param type $interest
 * @param type $retencion
 * @param type $company_comission
 * @param type $comision_bolsa
 * @param type $expiration_date
 * @param type $order_by
 * @param type $status
 */
function inv_transsactions_update($id, $company_id, $product, $transaction_number, $period, $start_date, $operation_number, $currency, $amount, $percentage, $term, $interest, $retencion, $company_comission, $comision_bolsa, $expiration_date, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `company_id` =:company_id, `product` =:product, `transaction_number` =:transaction_number, `period` =:period, `start_date` =:start_date, "
            . "`operation_number` =:operation_number, `currency` =:currency, `amount` =:amount, `percentage` =:percentage, `term` =:term, `interest` =:interest, "
            . "`retencion` =:retencion, `company_comission` =:company_comission, `comision_bolsa` "
            . "=:comision_bolsa, `expiration_date` =:expiration_date, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    
    $req->execute(array(
        "id" => $id,
        "company_id" => $company_id,
        "product" => $product,
        "transaction_number" => $transaction_number,
        "period" => $period,
        "start_date" => $start_date,
        "operation_number" => $operation_number,
        "currency" => $currency,
        "amount" => $amount,
        "percentage" => $percentage,
        "term" => $term,
        "interest" => $interest,
        //"total" => $total,
        "retencion" => $retencion,
        "company_comission" => $company_comission,
        "comision_bolsa" => $comision_bolsa,
        //"total_receivable" => $total_receivable,
        "expiration_date" => $expiration_date,
        "order_by" => $order_by,
        "status" => $status,
    ));
}
