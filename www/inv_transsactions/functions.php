<?php

# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:28 

// 
// 
function inv_transsactions_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `inv_transsactions` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `inv_transsactions` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `inv_transsactions` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `company_id`,  `product`,  `transaction_number`,  `period`,  `start_date`,  `operation_number`,  `currency`,  `amount`,  `percentage`,  `term`,  `interest`,  `total`,  `retencion`,  `company_comission`,  `comision_bolsa`,  `total_receivable`,  `expiration_date`,  `order_by`,  `status`   
    FROM `inv_transsactions` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function inv_transsactions_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `company_id`,  `product`,  `transaction_number`,  `period`,  `start_date`,  `operation_number`,  `currency`,  `amount`,  `percentage`,  `term`,  `interest`,  `total`,  `retencion`,  `company_comission`,  `comision_bolsa`,  `total_receivable`,  `expiration_date`,  `order_by`,  `status`   
    FROM `inv_transsactions` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

////////////////////////////////////////////////////////////////////////////////
function inv_transsactions_edit($id, $company_id, $product, $transaction_number, $period, $start_date, $operation_number, $currency, $amount, $percentage, $term, $interest, $total, $retencion, $company_comission, $comision_bolsa, $total_receivable, $expiration_date, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `company_id` =:company_id, `product` =:product, `transaction_number` =:transaction_number, `period` =:period, `start_date` =:start_date, `operation_number` =:operation_number, `currency` =:currency, `amount` =:amount, `percentage` =:percentage, `term` =:term, `interest` =:interest, `total` =:total, `retencion` =:retencion, `company_comission` =:company_comission, `comision_bolsa` =:comision_bolsa, `total_receivable` =:total_receivable, `expiration_date` =:expiration_date, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
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
        "total" => $total,
        "retencion" => $retencion,
        "company_comission" => $company_comission,
        "comision_bolsa" => $comision_bolsa,
        "total_receivable" => $total_receivable,
        "expiration_date" => $expiration_date,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

////////////////////////////////////////////////////////////////////////////////
function inv_transsactions_add($company_id, $product, $transaction_number, $period, $start_date, $operation_number, $currency, $amount, $percentage, $term, $interest, $total, $retencion, $company_comission, $comision_bolsa, $total_receivable, $expiration_date, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `inv_transsactions` ( `id` ,   `company_id` ,   `product` ,   `transaction_number` ,   `period` ,   `start_date` ,   `operation_number` ,   `currency` ,   `amount` ,   `percentage` ,   `term` ,   `interest` ,   `total` ,   `retencion` ,   `company_comission` ,   `comision_bolsa` ,   `total_receivable` ,   `expiration_date` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :company_id ,  :product ,  :transaction_number ,  :period ,  :start_date ,  :operation_number ,  :currency ,  :amount ,  :percentage ,  :term ,  :interest ,  :total ,  :retencion ,  :company_comission ,  :comision_bolsa ,  :total_receivable ,  :expiration_date ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
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
        "total" => $total,
        "retencion" => $retencion,
        "company_comission" => $company_comission,
        "comision_bolsa" => $comision_bolsa,
        "total_receivable" => $total_receivable,
        "expiration_date" => $expiration_date,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function inv_transsactions_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `company_id`,  `product`,  `transaction_number`,  `period`,  `start_date`,  `operation_number`,  `currency`,  `amount`,  `percentage`,  `term`,  `interest`,  `total`,  `retencion`,  `company_comission`,  `comision_bolsa`,  `total_receivable`,  `expiration_date`,  `order_by`,  `status`    
            FROM `inv_transsactions` 
            WHERE `id` = :txt OR `id` like :txt
OR `company_id` like :txt
OR `product` like :txt
OR `transaction_number` like :txt
OR `period` like :txt
OR `start_date` like :txt
OR `operation_number` like :txt
OR `currency` like :txt
OR `amount` like :txt
OR `percentage` like :txt
OR `term` like :txt
OR `interest` like :txt
OR `total` like :txt
OR `retencion` like :txt
OR `company_comission` like :txt
OR `comision_bolsa` like :txt
OR `total_receivable` like :txt
OR `expiration_date` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
    ORDER BY `order_by` , `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function inv_transsactions_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (inv_transsactions_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $val = "";
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show];
        }
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;
}

function inv_transsactions_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `inv_transsactions` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function inv_transsactions_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `company_id`,  `product`,  `transaction_number`,  `period`,  `start_date`,  `operation_number`,  `currency`,  `amount`,  `percentage`,  `term`,  `interest`,  `total`,  `retencion`,  `company_comission`,  `comision_bolsa`,  `total_receivable`,  `expiration_date`,  `order_by`,  `status`    FROM `inv_transsactions` 
    WHERE `$field` = '$txt' 
    ORDER BY `order_by` , `id` DESC
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function inv_transsactions_db_show_col_from_table($c) {
    global $db;
    $data = null;
    $req = $db->prepare("            
             SHOW COLUMNS FROM `$c`
            ");
    $req->execute(array(
    ));
    $data = $req->fetchAll();
    return $data;
}

//
function inv_transsactions_db_col_list_from_table($c) {
    $list = array();
    foreach (inv_transsactions_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function inv_transsactions_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_company_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `company_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_product($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `product`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_transaction_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `transaction_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_period($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `period`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_start_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `start_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_operation_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `operation_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_currency($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `currency`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_amount($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `amount`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_percentage($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `percentage`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_term($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `term`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_interest($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `interest`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_retencion($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `retencion`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_company_comission($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `company_comission`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_comision_bolsa($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `comision_bolsa`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_total_receivable($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `total_receivable`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_expiration_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `expiration_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function inv_transsactions_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_transsactions` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function inv_transsactions_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            inv_transsactions_update_id($id, $new_data);
            break;

        case "company_id":
            inv_transsactions_update_company_id($id, $new_data);
            break;

        case "product":
            inv_transsactions_update_product($id, $new_data);
            break;

        case "transaction_number":
            inv_transsactions_update_transaction_number($id, $new_data);
            break;

        case "period":
            inv_transsactions_update_period($id, $new_data);
            break;

        case "start_date":
            inv_transsactions_update_start_date($id, $new_data);
            break;

        case "operation_number":
            inv_transsactions_update_operation_number($id, $new_data);
            break;

        case "currency":
            inv_transsactions_update_currency($id, $new_data);
            break;

        case "amount":
            inv_transsactions_update_amount($id, $new_data);
            break;

        case "percentage":
            inv_transsactions_update_percentage($id, $new_data);
            break;

        case "term":
            inv_transsactions_update_term($id, $new_data);
            break;

        case "interest":
            inv_transsactions_update_interest($id, $new_data);
            break;

        case "total":
            inv_transsactions_update_total($id, $new_data);
            break;

        case "retencion":
            inv_transsactions_update_retencion($id, $new_data);
            break;

        case "company_comission":
            inv_transsactions_update_company_comission($id, $new_data);
            break;

        case "comision_bolsa":
            inv_transsactions_update_comision_bolsa($id, $new_data);
            break;

        case "total_receivable":
            inv_transsactions_update_total_receivable($id, $new_data);
            break;

        case "expiration_date":
            inv_transsactions_update_expiration_date($id, $new_data);
            break;

        case "order_by":
            inv_transsactions_update_order_by($id, $new_data);
            break;

        case "status":
            inv_transsactions_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function inv_transsactions_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `inv_transsactions` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/inv_transsactions/functions.php
// and comment here (this function)
function inv_transsactions_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "company_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "product":
            //return inv_products_field_id("product", $value);
            return ($filtre) ?? $value;
            break;
        case "transaction_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "period":
            //return inv_periods_field_id("period", $value);
            return ($filtre) ?? $value;
            break;
        case "start_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "operation_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "currency":
            //return currencies_field_id("code", $value);
            return ($filtre) ?? $value;
            break;
        case "amount":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "percentage":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "term":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "interest":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "total":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "retencion":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "company_comission":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "comision_bolsa":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "total_receivable":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "expiration_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "status":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;

        default:
            return $value;
            break;
    }
}

//
//
//
function inv_transsactions_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `inv_transsactions` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_company_id($company_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company_id` FROM `inv_transsactions` WHERE   `company_id` = ?");
    $req->execute(array($company_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_product($product) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `product` FROM `inv_transsactions` WHERE   `product` = ?");
    $req->execute(array($product));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_transaction_number($transaction_number) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `transaction_number` FROM `inv_transsactions` WHERE   `transaction_number` = ?");
    $req->execute(array($transaction_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_period($period) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `period` FROM `inv_transsactions` WHERE   `period` = ?");
    $req->execute(array($period));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_start_date($start_date) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `start_date` FROM `inv_transsactions` WHERE   `start_date` = ?");
    $req->execute(array($start_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_operation_number($operation_number) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `operation_number` FROM `inv_transsactions` WHERE   `operation_number` = ?");
    $req->execute(array($operation_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_currency($currency) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `currency` FROM `inv_transsactions` WHERE   `currency` = ?");
    $req->execute(array($currency));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_amount($amount) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `amount` FROM `inv_transsactions` WHERE   `amount` = ?");
    $req->execute(array($amount));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_percentage($percentage) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `percentage` FROM `inv_transsactions` WHERE   `percentage` = ?");
    $req->execute(array($percentage));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_term($term) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `term` FROM `inv_transsactions` WHERE   `term` = ?");
    $req->execute(array($term));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_interest($interest) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `interest` FROM `inv_transsactions` WHERE   `interest` = ?");
    $req->execute(array($interest));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_total($total) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `inv_transsactions` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_retencion($retencion) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `retencion` FROM `inv_transsactions` WHERE   `retencion` = ?");
    $req->execute(array($retencion));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_company_comission($company_comission) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company_comission` FROM `inv_transsactions` WHERE   `company_comission` = ?");
    $req->execute(array($company_comission));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_comision_bolsa($comision_bolsa) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `comision_bolsa` FROM `inv_transsactions` WHERE   `comision_bolsa` = ?");
    $req->execute(array($comision_bolsa));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_total_receivable($total_receivable) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total_receivable` FROM `inv_transsactions` WHERE   `total_receivable` = ?");
    $req->execute(array($total_receivable));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_expiration_date($expiration_date) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `expiration_date` FROM `inv_transsactions` WHERE   `expiration_date` = ?");
    $req->execute(array($expiration_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `inv_transsactions` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function inv_transsactions_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `inv_transsactions` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function inv_transsactions_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function inv_transsactions_is_company_id($company_id) {
    return true;
}

function inv_transsactions_is_product($product) {
    return true;
}

function inv_transsactions_is_transaction_number($transaction_number) {
    return true;
}

function inv_transsactions_is_period($period) {
    return true;
}

function inv_transsactions_is_start_date($start_date) {
    return true;
}

function inv_transsactions_is_operation_number($operation_number) {
    return true;
}

function inv_transsactions_is_currency($currency) {
    return true;
}

function inv_transsactions_is_amount($amount) {
    return true;
}

function inv_transsactions_is_percentage($percentage) {
    return true;
}

function inv_transsactions_is_term($term) {
    return true;
}

function inv_transsactions_is_interest($interest) {
    return true;
}

function inv_transsactions_is_total($total) {
    return true;
}

function inv_transsactions_is_retencion($retencion) {
    return true;
}

function inv_transsactions_is_company_comission($company_comission) {
    return true;
}

function inv_transsactions_is_comision_bolsa($comision_bolsa) {
    return true;
}

function inv_transsactions_is_total_receivable($total_receivable) {
    return true;
}

function inv_transsactions_is_expiration_date($expiration_date) {
    return true;
}

function inv_transsactions_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function inv_transsactions_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function inv_transsactions_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, inv_transsactions_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function inv_transsactions_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (inv_transsactions_is_id($value)) ? true : false;
            break;
        case "company_id":
            $is = (inv_transsactions_is_company_id($value)) ? true : false;
            break;
        case "product":
            $is = (inv_transsactions_is_product($value)) ? true : false;
            break;
        case "transaction_number":
            $is = (inv_transsactions_is_transaction_number($value)) ? true : false;
            break;
        case "period":
            $is = (inv_transsactions_is_period($value)) ? true : false;
            break;
        case "start_date":
            $is = (inv_transsactions_is_start_date($value)) ? true : false;
            break;
        case "operation_number":
            $is = (inv_transsactions_is_operation_number($value)) ? true : false;
            break;
        case "currency":
            $is = (inv_transsactions_is_currency($value)) ? true : false;
            break;
        case "amount":
            $is = (inv_transsactions_is_amount($value)) ? true : false;
            break;
        case "percentage":
            $is = (inv_transsactions_is_percentage($value)) ? true : false;
            break;
        case "term":
            $is = (inv_transsactions_is_term($value)) ? true : false;
            break;
        case "interest":
            $is = (inv_transsactions_is_interest($value)) ? true : false;
            break;
        case "total":
            $is = (inv_transsactions_is_total($value)) ? true : false;
            break;
        case "retencion":
            $is = (inv_transsactions_is_retencion($value)) ? true : false;
            break;
        case "company_comission":
            $is = (inv_transsactions_is_company_comission($value)) ? true : false;
            break;
        case "comision_bolsa":
            $is = (inv_transsactions_is_comision_bolsa($value)) ? true : false;
            break;
        case "total_receivable":
            $is = (inv_transsactions_is_total_receivable($value)) ? true : false;
            break;
        case "expiration_date":
            $is = (inv_transsactions_is_expiration_date($value)) ? true : false;
            break;
        case "order_by":
            $is = (inv_transsactions_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (inv_transsactions_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//

function inv_transsactions_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=inv_transsactions&a=details&id=' . $col_to_show . '">' . $col_to_show . '</a></th>';
                break;

            case 'company_id':
                echo '<th>' . _tr(ucfirst('company_id')) . '</th>';
                break;
            case 'product':
                echo '<th>' . _tr(ucfirst('product')) . '</th>';
                break;
            case 'transaction_number':
                echo '<th>' . _tr(ucfirst('transaction_number')) . '</th>';
                break;
            case 'period':
                echo '<th>' . _tr(ucfirst('period')) . '</th>';
                break;
            case 'start_date':
                echo '<th>' . _tr(ucfirst('start_date')) . '</th>';
                break;
            case 'operation_number':
                echo '<th>' . _tr(ucfirst('operation_number')) . '</th>';
                break;
            case 'currency':
                echo '<th>' . _tr(ucfirst('currency')) . '</th>';
                break;
            case 'amount':
                echo '<th>' . _tr(ucfirst('amount')) . '</th>';
                break;
            case 'percentage':
                echo '<th>' . _tr(ucfirst('percentage')) . '</th>';
                break;
            case 'term':
                echo '<th>' . _tr(ucfirst('term')) . '</th>';
                break;
            case 'interest':
                echo '<th>' . _tr(ucfirst('interest')) . '</th>';
                break;
            case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
                break;
            case 'retencion':
                echo '<th>' . _tr(ucfirst('retencion')) . '</th>';
                break;
            case 'company_comission':
                echo '<th>' . _tr(ucfirst('company_comission')) . '</th>';
                break;
            case 'comision_bolsa':
                echo '<th>' . _tr(ucfirst('comision_bolsa')) . '</th>';
                break;
            case 'total_receivable':
                echo '<th>' . _tr(ucfirst('total_receivable')) . '</th>';
                break;
            case 'expiration_date':
                echo '<th>' . _tr(ucfirst('expiration_date')) . '</th>';
                break;
            case 'order_by':
                echo '<th>' . _tr(ucfirst('order_by')) . '</th>';
                break;
            case 'status':
                echo '<th>' . _tr(ucfirst('status')) . '</th>';
                break;

            case 'button_details':
            case 'button_pay':
            case 'button_edit':
            case 'modal_edit':
            case 'button_delete':
            case 'modal_delete':
            case 'button_print':
            case 'button_save':
                echo '<th></th>';
                break;

            default:
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
                break;
        }
    }
}

function inv_transsactions_index_generate_column_body_td($inv_transsactions, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=inv_transsactions&a=details&id=' . $inv_transsactions[$col] . '">' . $inv_transsactions[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'company_id':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'product':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'transaction_number':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'period':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'start_date':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'operation_number':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'currency':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'amount':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'percentage':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'term':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'interest':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'total':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'retencion':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'company_comission':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'comision_bolsa':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'total_receivable':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'expiration_date':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=inv_transsactions&a=details&id=' . $inv_transsactions['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=inv_transsactions&a=details_payement&id=' . $inv_transsactions['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=inv_transsactions&a=edit&id=' . $inv_transsactions['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=inv_transsactions&a=ok_delete&id=' . $inv_transsactions['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_transsactions&a=export_pdf&id=' . $inv_transsactions['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_transsactions&a=export_pdf&way=pdf&&id=' . $inv_transsactions['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($inv_transsactions[$col]) . '</td>';
                break;
        }
    }
}

//
//        
################################################################################
################################################################################
################################################################################
