<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 10:09:08 


// 
// 
function banks_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `id_office`,  `office_name`,  `value_bankCheck_transaction`,  `countable_balance`,  `suffix_account`,  `sequential`,  `available_balance`,  `debit`,  `credit`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`   
    FROM `banks_lines` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `id_office`,  `office_name`,  `value_bankCheck_transaction`,  `countable_balance`,  `suffix_account`,  `sequential`,  `available_balance`,  `debit`,  `credit`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`   
    FROM `banks_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function banks_lines_edit($id ,  $my_account ,  $operation ,  $date_operation ,  $description ,  $type ,  $total ,  $currency ,  $date_value ,  $account_sender ,  $sender ,  $comunication ,  $ce ,  $details ,  $message ,  $id_office ,  $office_name ,  $value_bankCheck_transaction ,  $countable_balance ,  $suffix_account ,  $sequential ,  $available_balance ,  $debit ,  $credit ,  $ref ,  $ref2 ,  $ref3 ,  $ref4 ,  $ref5 ,  $ref6 ,  $ref7 ,  $ref8 ,  $ref9 ,  $ref10 ,  $date_registre ,  $code ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `my_account` =:my_account, `operation` =:operation, `date_operation` =:date_operation, `description` =:description, `type` =:type, `total` =:total, `currency` =:currency, `date_value` =:date_value, `account_sender` =:account_sender, `sender` =:sender, `comunication` =:comunication, `ce` =:ce, `details` =:details, `message` =:message, `id_office` =:id_office, `office_name` =:office_name, `value_bankCheck_transaction` =:value_bankCheck_transaction, `countable_balance` =:countable_balance, `suffix_account` =:suffix_account, `sequential` =:sequential, `available_balance` =:available_balance, `debit` =:debit, `credit` =:credit, `ref` =:ref, `ref2` =:ref2, `ref3` =:ref3, `ref4` =:ref4, `ref5` =:ref5, `ref6` =:ref6, `ref7` =:ref7, `ref8` =:ref8, `ref9` =:ref9, `ref10` =:ref10, `date_registre` =:date_registre, `code` =:code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "my_account" =>$my_account ,  
 "operation" =>$operation ,  
 "date_operation" =>$date_operation ,  
 "description" =>$description ,  
 "type" =>$type ,  
 "total" =>$total ,  
 "currency" =>$currency ,  
 "date_value" =>$date_value ,  
 "account_sender" =>$account_sender ,  
 "sender" =>$sender ,  
 "comunication" =>$comunication ,  
 "ce" =>$ce ,  
 "details" =>$details ,  
 "message" =>$message ,  
 "id_office" =>$id_office ,  
 "office_name" =>$office_name ,  
 "value_bankCheck_transaction" =>$value_bankCheck_transaction ,  
 "countable_balance" =>$countable_balance ,  
 "suffix_account" =>$suffix_account ,  
 "sequential" =>$sequential ,  
 "available_balance" =>$available_balance ,  
 "debit" =>$debit ,  
 "credit" =>$credit ,  
 "ref" =>$ref ,  
 "ref2" =>$ref2 ,  
 "ref3" =>$ref3 ,  
 "ref4" =>$ref4 ,  
 "ref5" =>$ref5 ,  
 "ref6" =>$ref6 ,  
 "ref7" =>$ref7 ,  
 "ref8" =>$ref8 ,  
 "ref9" =>$ref9 ,  
 "ref10" =>$ref10 ,  
 "date_registre" =>$date_registre ,  
 "code" =>$code ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function banks_lines_add($my_account ,  $operation ,  $date_operation ,  $description ,  $type ,  $total ,  $currency ,  $date_value ,  $account_sender ,  $sender ,  $comunication ,  $ce ,  $details ,  $message ,  $id_office ,  $office_name ,  $value_bankCheck_transaction ,  $countable_balance ,  $suffix_account ,  $sequential ,  $available_balance ,  $debit ,  $credit ,  $ref ,  $ref2 ,  $ref3 ,  $ref4 ,  $ref5 ,  $ref6 ,  $ref7 ,  $ref8 ,  $ref9 ,  $ref10 ,  $date_registre ,  $code ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `banks_lines` ( `id` ,   `my_account` ,   `operation` ,   `date_operation` ,   `description` ,   `type` ,   `total` ,   `currency` ,   `date_value` ,   `account_sender` ,   `sender` ,   `comunication` ,   `ce` ,   `details` ,   `message` ,   `id_office` ,   `office_name` ,   `value_bankCheck_transaction` ,   `countable_balance` ,   `suffix_account` ,   `sequential` ,   `available_balance` ,   `debit` ,   `credit` ,   `ref` ,   `ref2` ,   `ref3` ,   `ref4` ,   `ref5` ,   `ref6` ,   `ref7` ,   `ref8` ,   `ref9` ,   `ref10` ,   `date_registre` ,   `code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :my_account ,  :operation ,  :date_operation ,  :description ,  :type ,  :total ,  :currency ,  :date_value ,  :account_sender ,  :sender ,  :comunication ,  :ce ,  :details ,  :message ,  :id_office ,  :office_name ,  :value_bankCheck_transaction ,  :countable_balance ,  :suffix_account ,  :sequential ,  :available_balance ,  :debit ,  :credit ,  :ref ,  :ref2 ,  :ref3 ,  :ref4 ,  :ref5 ,  :ref6 ,  :ref7 ,  :ref8 ,  :ref9 ,  :ref10 ,  :date_registre ,  :code ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "my_account" => $my_account ,  
 "operation" => $operation ,  
 "date_operation" => $date_operation ,  
 "description" => $description ,  
 "type" => $type ,  
 "total" => $total ,  
 "currency" => $currency ,  
 "date_value" => $date_value ,  
 "account_sender" => $account_sender ,  
 "sender" => $sender ,  
 "comunication" => $comunication ,  
 "ce" => $ce ,  
 "details" => $details ,  
 "message" => $message ,  
 "id_office" => $id_office ,  
 "office_name" => $office_name ,  
 "value_bankCheck_transaction" => $value_bankCheck_transaction ,  
 "countable_balance" => $countable_balance ,  
 "suffix_account" => $suffix_account ,  
 "sequential" => $sequential ,  
 "available_balance" => $available_balance ,  
 "debit" => $debit ,  
 "credit" => $credit ,  
 "ref" => $ref ,  
 "ref2" => $ref2 ,  
 "ref3" => $ref3 ,  
 "ref4" => $ref4 ,  
 "ref5" => $ref5 ,  
 "ref6" => $ref6 ,  
 "ref7" => $ref7 ,  
 "ref8" => $ref8 ,  
 "ref9" => $ref9 ,  
 "ref10" => $ref10 ,  
 "date_registre" => $date_registre ,  
 "code" => $code ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function banks_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `id_office`,  `office_name`,  `value_bankCheck_transaction`,  `countable_balance`,  `suffix_account`,  `sequential`,  `available_balance`,  `debit`,  `credit`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`    
            FROM `banks_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `my_account` like :txt
OR `operation` like :txt
OR `date_operation` like :txt
OR `description` like :txt
OR `type` like :txt
OR `total` like :txt
OR `currency` like :txt
OR `date_value` like :txt
OR `account_sender` like :txt
OR `sender` like :txt
OR `comunication` like :txt
OR `ce` like :txt
OR `details` like :txt
OR `message` like :txt
OR `id_office` like :txt
OR `office_name` like :txt
OR `value_bankCheck_transaction` like :txt
OR `countable_balance` like :txt
OR `suffix_account` like :txt
OR `sequential` like :txt
OR `available_balance` like :txt
OR `debit` like :txt
OR `credit` like :txt
OR `ref` like :txt
OR `ref2` like :txt
OR `ref3` like :txt
OR `ref4` like :txt
OR `ref5` like :txt
OR `ref6` like :txt
OR `ref7` like :txt
OR `ref8` like :txt
OR `ref9` like :txt
OR `ref10` like :txt
OR `date_registre` like :txt
OR `code` like :txt
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

function banks_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (banks_lines_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";        
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";        
        $val = ""; 
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show] ;  
        }              
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;     
}
function banks_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `banks_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function banks_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `my_account`,  `operation`,  `date_operation`,  `description`,  `type`,  `total`,  `currency`,  `date_value`,  `account_sender`,  `sender`,  `comunication`,  `ce`,  `details`,  `message`,  `id_office`,  `office_name`,  `value_bankCheck_transaction`,  `countable_balance`,  `suffix_account`,  `sequential`,  `available_balance`,  `debit`,  `credit`,  `ref`,  `ref2`,  `ref3`,  `ref4`,  `ref5`,  `ref6`,  `ref7`,  `ref8`,  `ref9`,  `ref10`,  `date_registre`,  `code`,  `order_by`,  `status`    FROM `banks_lines` 
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

function banks_lines_db_show_col_from_table($c) {
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
function banks_lines_db_col_list_from_table($c){
    $list = array();
    foreach (banks_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function banks_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_my_account($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `my_account`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_operation($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `operation`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_date_operation($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `date_operation`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_currency($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `currency`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_date_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `date_value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_account_sender($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `account_sender`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_sender($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `sender`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_comunication($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `comunication`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ce($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ce`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_details($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `details`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_message($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `message`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_id_office($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `id_office`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_office_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `office_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_value_bankCheck_transaction($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `value_bankCheck_transaction`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_countable_balance($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `countable_balance`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_suffix_account($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `suffix_account`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_sequential($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `sequential`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_available_balance($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `available_balance`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_debit($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `debit`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_credit($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `credit`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref2($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref2`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref3($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref3`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref4($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref4`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref5($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref5`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref6($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref6`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref7($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref7`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref8($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref8`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref9($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref9`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_ref10($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `ref10`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function banks_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            banks_lines_update_id($id, $new_data);
            break;

        case "my_account":
            banks_lines_update_my_account($id, $new_data);
            break;

        case "operation":
            banks_lines_update_operation($id, $new_data);
            break;

        case "date_operation":
            banks_lines_update_date_operation($id, $new_data);
            break;

        case "description":
            banks_lines_update_description($id, $new_data);
            break;

        case "type":
            banks_lines_update_type($id, $new_data);
            break;

        case "total":
            banks_lines_update_total($id, $new_data);
            break;

        case "currency":
            banks_lines_update_currency($id, $new_data);
            break;

        case "date_value":
            banks_lines_update_date_value($id, $new_data);
            break;

        case "account_sender":
            banks_lines_update_account_sender($id, $new_data);
            break;

        case "sender":
            banks_lines_update_sender($id, $new_data);
            break;

        case "comunication":
            banks_lines_update_comunication($id, $new_data);
            break;

        case "ce":
            banks_lines_update_ce($id, $new_data);
            break;

        case "details":
            banks_lines_update_details($id, $new_data);
            break;

        case "message":
            banks_lines_update_message($id, $new_data);
            break;

        case "id_office":
            banks_lines_update_id_office($id, $new_data);
            break;

        case "office_name":
            banks_lines_update_office_name($id, $new_data);
            break;

        case "value_bankCheck_transaction":
            banks_lines_update_value_bankCheck_transaction($id, $new_data);
            break;

        case "countable_balance":
            banks_lines_update_countable_balance($id, $new_data);
            break;

        case "suffix_account":
            banks_lines_update_suffix_account($id, $new_data);
            break;

        case "sequential":
            banks_lines_update_sequential($id, $new_data);
            break;

        case "available_balance":
            banks_lines_update_available_balance($id, $new_data);
            break;

        case "debit":
            banks_lines_update_debit($id, $new_data);
            break;

        case "credit":
            banks_lines_update_credit($id, $new_data);
            break;

        case "ref":
            banks_lines_update_ref($id, $new_data);
            break;

        case "ref2":
            banks_lines_update_ref2($id, $new_data);
            break;

        case "ref3":
            banks_lines_update_ref3($id, $new_data);
            break;

        case "ref4":
            banks_lines_update_ref4($id, $new_data);
            break;

        case "ref5":
            banks_lines_update_ref5($id, $new_data);
            break;

        case "ref6":
            banks_lines_update_ref6($id, $new_data);
            break;

        case "ref7":
            banks_lines_update_ref7($id, $new_data);
            break;

        case "ref8":
            banks_lines_update_ref8($id, $new_data);
            break;

        case "ref9":
            banks_lines_update_ref9($id, $new_data);
            break;

        case "ref10":
            banks_lines_update_ref10($id, $new_data);
            break;

        case "date_registre":
            banks_lines_update_date_registre($id, $new_data);
            break;

        case "code":
            banks_lines_update_code($id, $new_data);
            break;

        case "order_by":
            banks_lines_update_order_by($id, $new_data);
            break;

        case "status":
            banks_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function banks_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `banks_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/banks_lines/functions.php
// and comment here (this function)
function banks_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "my_account":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "operation":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_operation":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "total":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "currency":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_value":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "account_sender":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "comunication":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ce":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "details":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "message":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "id_office":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "office_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "value_bankCheck_transaction":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "countable_balance":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "suffix_account":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sequential":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "available_balance":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "debit":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "credit":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref2":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref3":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref4":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref5":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref6":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref7":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref8":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref9":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref10":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_registre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "status":
            //return banks_lines_status_field_id("code", $value);
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
function banks_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `banks_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_my_account($my_account){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `my_account` FROM `banks_lines` WHERE   `my_account` = ?");
    $req->execute(array($my_account));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_operation($operation){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `operation` FROM `banks_lines` WHERE   `operation` = ?");
    $req->execute(array($operation));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_date_operation($date_operation){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_operation` FROM `banks_lines` WHERE   `date_operation` = ?");
    $req->execute(array($date_operation));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `banks_lines` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `banks_lines` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_total($total){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `banks_lines` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_currency($currency){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `currency` FROM `banks_lines` WHERE   `currency` = ?");
    $req->execute(array($currency));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_date_value($date_value){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_value` FROM `banks_lines` WHERE   `date_value` = ?");
    $req->execute(array($date_value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_account_sender($account_sender){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `account_sender` FROM `banks_lines` WHERE   `account_sender` = ?");
    $req->execute(array($account_sender));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_sender($sender){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender` FROM `banks_lines` WHERE   `sender` = ?");
    $req->execute(array($sender));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_comunication($comunication){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `comunication` FROM `banks_lines` WHERE   `comunication` = ?");
    $req->execute(array($comunication));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ce($ce){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ce` FROM `banks_lines` WHERE   `ce` = ?");
    $req->execute(array($ce));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_details($details){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `details` FROM `banks_lines` WHERE   `details` = ?");
    $req->execute(array($details));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_message($message){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `message` FROM `banks_lines` WHERE   `message` = ?");
    $req->execute(array($message));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_id_office($id_office){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id_office` FROM `banks_lines` WHERE   `id_office` = ?");
    $req->execute(array($id_office));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_office_name($office_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `office_name` FROM `banks_lines` WHERE   `office_name` = ?");
    $req->execute(array($office_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_value_bankCheck_transaction($value_bankCheck_transaction){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value_bankCheck_transaction` FROM `banks_lines` WHERE   `value_bankCheck_transaction` = ?");
    $req->execute(array($value_bankCheck_transaction));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_countable_balance($countable_balance){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `countable_balance` FROM `banks_lines` WHERE   `countable_balance` = ?");
    $req->execute(array($countable_balance));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_suffix_account($suffix_account){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `suffix_account` FROM `banks_lines` WHERE   `suffix_account` = ?");
    $req->execute(array($suffix_account));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_sequential($sequential){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sequential` FROM `banks_lines` WHERE   `sequential` = ?");
    $req->execute(array($sequential));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_available_balance($available_balance){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `available_balance` FROM `banks_lines` WHERE   `available_balance` = ?");
    $req->execute(array($available_balance));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_debit($debit){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `debit` FROM `banks_lines` WHERE   `debit` = ?");
    $req->execute(array($debit));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_credit($credit){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `credit` FROM `banks_lines` WHERE   `credit` = ?");
    $req->execute(array($credit));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref($ref){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref` FROM `banks_lines` WHERE   `ref` = ?");
    $req->execute(array($ref));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref2($ref2){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref2` FROM `banks_lines` WHERE   `ref2` = ?");
    $req->execute(array($ref2));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref3($ref3){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref3` FROM `banks_lines` WHERE   `ref3` = ?");
    $req->execute(array($ref3));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref4($ref4){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref4` FROM `banks_lines` WHERE   `ref4` = ?");
    $req->execute(array($ref4));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref5($ref5){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref5` FROM `banks_lines` WHERE   `ref5` = ?");
    $req->execute(array($ref5));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref6($ref6){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref6` FROM `banks_lines` WHERE   `ref6` = ?");
    $req->execute(array($ref6));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref7($ref7){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref7` FROM `banks_lines` WHERE   `ref7` = ?");
    $req->execute(array($ref7));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref8($ref8){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref8` FROM `banks_lines` WHERE   `ref8` = ?");
    $req->execute(array($ref8));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref9($ref9){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref9` FROM `banks_lines` WHERE   `ref9` = ?");
    $req->execute(array($ref9));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_ref10($ref10){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref10` FROM `banks_lines` WHERE   `ref10` = ?");
    $req->execute(array($ref10));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `banks_lines` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `banks_lines` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `banks_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `banks_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function banks_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function banks_lines_is_my_account($my_account){
     return true;
}

function banks_lines_is_operation($operation){
     return true;
}

function banks_lines_is_date_operation($date_operation){
     return true;
}

function banks_lines_is_description($description){
     return true;
}

function banks_lines_is_type($type){
     return true;
}

function banks_lines_is_total($total){
     return true;
}

function banks_lines_is_currency($currency){
     return true;
}

function banks_lines_is_date_value($date_value){
     return true;
}

function banks_lines_is_account_sender($account_sender){
     return true;
}

function banks_lines_is_sender($sender){
     return true;
}

function banks_lines_is_comunication($comunication){
     return true;
}

function banks_lines_is_ce($ce){
     return true;
}

function banks_lines_is_details($details){
     return true;
}

function banks_lines_is_message($message){
     return true;
}

function banks_lines_is_id_office($id_office){
     return true;
}

function banks_lines_is_office_name($office_name){
     return true;
}

function banks_lines_is_value_bankCheck_transaction($value_bankCheck_transaction){
     return true;
}

function banks_lines_is_countable_balance($countable_balance){
     return true;
}

function banks_lines_is_suffix_account($suffix_account){
     return true;
}

function banks_lines_is_sequential($sequential){
     return true;
}

function banks_lines_is_available_balance($available_balance){
     return true;
}

function banks_lines_is_debit($debit){
     return true;
}

function banks_lines_is_credit($credit){
     return true;
}

function banks_lines_is_ref($ref){
     return true;
}

function banks_lines_is_ref2($ref2){
     return true;
}

function banks_lines_is_ref3($ref3){
     return true;
}

function banks_lines_is_ref4($ref4){
     return true;
}

function banks_lines_is_ref5($ref5){
     return true;
}

function banks_lines_is_ref6($ref6){
     return true;
}

function banks_lines_is_ref7($ref7){
     return true;
}

function banks_lines_is_ref8($ref8){
     return true;
}

function banks_lines_is_ref9($ref9){
     return true;
}

function banks_lines_is_ref10($ref10){
     return true;
}

function banks_lines_is_date_registre($date_registre){
     return true;
}

function banks_lines_is_code($code){
     return true;
}

function banks_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function banks_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function banks_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, banks_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function banks_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (banks_lines_is_id($value)) ? true : false;
            break;
     case "my_account":
            $is = (banks_lines_is_my_account($value)) ? true : false;
            break;
     case "operation":
            $is = (banks_lines_is_operation($value)) ? true : false;
            break;
     case "date_operation":
            $is = (banks_lines_is_date_operation($value)) ? true : false;
            break;
     case "description":
            $is = (banks_lines_is_description($value)) ? true : false;
            break;
     case "type":
            $is = (banks_lines_is_type($value)) ? true : false;
            break;
     case "total":
            $is = (banks_lines_is_total($value)) ? true : false;
            break;
     case "currency":
            $is = (banks_lines_is_currency($value)) ? true : false;
            break;
     case "date_value":
            $is = (banks_lines_is_date_value($value)) ? true : false;
            break;
     case "account_sender":
            $is = (banks_lines_is_account_sender($value)) ? true : false;
            break;
     case "sender":
            $is = (banks_lines_is_sender($value)) ? true : false;
            break;
     case "comunication":
            $is = (banks_lines_is_comunication($value)) ? true : false;
            break;
     case "ce":
            $is = (banks_lines_is_ce($value)) ? true : false;
            break;
     case "details":
            $is = (banks_lines_is_details($value)) ? true : false;
            break;
     case "message":
            $is = (banks_lines_is_message($value)) ? true : false;
            break;
     case "id_office":
            $is = (banks_lines_is_id_office($value)) ? true : false;
            break;
     case "office_name":
            $is = (banks_lines_is_office_name($value)) ? true : false;
            break;
     case "value_bankCheck_transaction":
            $is = (banks_lines_is_value_bankCheck_transaction($value)) ? true : false;
            break;
     case "countable_balance":
            $is = (banks_lines_is_countable_balance($value)) ? true : false;
            break;
     case "suffix_account":
            $is = (banks_lines_is_suffix_account($value)) ? true : false;
            break;
     case "sequential":
            $is = (banks_lines_is_sequential($value)) ? true : false;
            break;
     case "available_balance":
            $is = (banks_lines_is_available_balance($value)) ? true : false;
            break;
     case "debit":
            $is = (banks_lines_is_debit($value)) ? true : false;
            break;
     case "credit":
            $is = (banks_lines_is_credit($value)) ? true : false;
            break;
     case "ref":
            $is = (banks_lines_is_ref($value)) ? true : false;
            break;
     case "ref2":
            $is = (banks_lines_is_ref2($value)) ? true : false;
            break;
     case "ref3":
            $is = (banks_lines_is_ref3($value)) ? true : false;
            break;
     case "ref4":
            $is = (banks_lines_is_ref4($value)) ? true : false;
            break;
     case "ref5":
            $is = (banks_lines_is_ref5($value)) ? true : false;
            break;
     case "ref6":
            $is = (banks_lines_is_ref6($value)) ? true : false;
            break;
     case "ref7":
            $is = (banks_lines_is_ref7($value)) ? true : false;
            break;
     case "ref8":
            $is = (banks_lines_is_ref8($value)) ? true : false;
            break;
     case "ref9":
            $is = (banks_lines_is_ref9($value)) ? true : false;
            break;
     case "ref10":
            $is = (banks_lines_is_ref10($value)) ? true : false;
            break;
     case "date_registre":
            $is = (banks_lines_is_date_registre($value)) ? true : false;
            break;
     case "code":
            $is = (banks_lines_is_code($value)) ? true : false;
            break;
     case "order_by":
            $is = (banks_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (banks_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function banks_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=banks_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'my_account':
                echo '<th>' . _tr(ucfirst('my_account')) . '</th>';
                break;
case 'operation':
                echo '<th>' . _tr(ucfirst('operation')) . '</th>';
                break;
case 'date_operation':
                echo '<th>' . _tr(ucfirst('date_operation')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
                break;
case 'currency':
                echo '<th>' . _tr(ucfirst('currency')) . '</th>';
                break;
case 'date_value':
                echo '<th>' . _tr(ucfirst('date_value')) . '</th>';
                break;
case 'account_sender':
                echo '<th>' . _tr(ucfirst('account_sender')) . '</th>';
                break;
case 'sender':
                echo '<th>' . _tr(ucfirst('sender')) . '</th>';
                break;
case 'comunication':
                echo '<th>' . _tr(ucfirst('comunication')) . '</th>';
                break;
case 'ce':
                echo '<th>' . _tr(ucfirst('ce')) . '</th>';
                break;
case 'details':
                echo '<th>' . _tr(ucfirst('details')) . '</th>';
                break;
case 'message':
                echo '<th>' . _tr(ucfirst('message')) . '</th>';
                break;
case 'id_office':
                echo '<th>' . _tr(ucfirst('id_office')) . '</th>';
                break;
case 'office_name':
                echo '<th>' . _tr(ucfirst('office_name')) . '</th>';
                break;
case 'value_bankCheck_transaction':
                echo '<th>' . _tr(ucfirst('value_bankCheck_transaction')) . '</th>';
                break;
case 'countable_balance':
                echo '<th>' . _tr(ucfirst('countable_balance')) . '</th>';
                break;
case 'suffix_account':
                echo '<th>' . _tr(ucfirst('suffix_account')) . '</th>';
                break;
case 'sequential':
                echo '<th>' . _tr(ucfirst('sequential')) . '</th>';
                break;
case 'available_balance':
                echo '<th>' . _tr(ucfirst('available_balance')) . '</th>';
                break;
case 'debit':
                echo '<th>' . _tr(ucfirst('debit')) . '</th>';
                break;
case 'credit':
                echo '<th>' . _tr(ucfirst('credit')) . '</th>';
                break;
case 'ref':
                echo '<th>' . _tr(ucfirst('ref')) . '</th>';
                break;
case 'ref2':
                echo '<th>' . _tr(ucfirst('ref2')) . '</th>';
                break;
case 'ref3':
                echo '<th>' . _tr(ucfirst('ref3')) . '</th>';
                break;
case 'ref4':
                echo '<th>' . _tr(ucfirst('ref4')) . '</th>';
                break;
case 'ref5':
                echo '<th>' . _tr(ucfirst('ref5')) . '</th>';
                break;
case 'ref6':
                echo '<th>' . _tr(ucfirst('ref6')) . '</th>';
                break;
case 'ref7':
                echo '<th>' . _tr(ucfirst('ref7')) . '</th>';
                break;
case 'ref8':
                echo '<th>' . _tr(ucfirst('ref8')) . '</th>';
                break;
case 'ref9':
                echo '<th>' . _tr(ucfirst('ref9')) . '</th>';
                break;
case 'ref10':
                echo '<th>' . _tr(ucfirst('ref10')) . '</th>';
                break;
case 'date_registre':
                echo '<th>' . _tr(ucfirst('date_registre')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function banks_lines_index_generate_column_body_td($banks_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=banks_lines&a=details&id=' . $banks_lines[$col] . '">' . $banks_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'my_account':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'operation':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'date_operation':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'total':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'currency':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'date_value':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'account_sender':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'sender':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'comunication':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ce':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'details':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'message':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'id_office':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'office_name':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'value_bankCheck_transaction':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'countable_balance':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'suffix_account':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'sequential':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'available_balance':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'debit':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'credit':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref2':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref3':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref4':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref5':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref6':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref7':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref8':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref9':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'ref10':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks_lines&a=details&id=' . $banks_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks_lines&a=details_payement&id=' . $banks_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_lines&a=edit&id=' . $banks_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_lines&a=ok_delete&id=' . $banks_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines&a=export_pdf&id=' . $banks_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_lines&a=export_pdf&way=pdf&&id=' . $banks_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($banks_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
