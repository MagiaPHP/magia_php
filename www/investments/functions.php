<?php

// plugin = investments
// creation date : 2024-01-29
// 
// 
function investments_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `investments` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `investments` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `investments` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `institution_id`,  `type`,  `operation`,  `ref`,  `amount`,  `days`,  `rate`,  `total`,  `retention`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    FROM `investments` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function investments_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `institution_id`,  `type`,  `operation`,  `ref`,  `amount`,  `days`,  `rate`,  `total`,  `retention`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    FROM `investments` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function investments_edit($id, $institution_id, $type, $operation, $ref, $amount, $days, $rate, $total, $retention, $date_start, $date_end, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `institution_id` =:institution_id, `type` =:type, `operation` =:operation, `ref` =:ref, `amount` =:amount, `days` =:days, `rate` =:rate, `total` =:total, `retention` =:retention, `date_start` =:date_start, `date_end` =:date_end, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "institution_id" => $institution_id,
        "type" => $type,
        "operation" => $operation,
        "ref" => $ref,
        "amount" => $amount,
        "days" => $days,
        "rate" => $rate,
        "total" => $total,
        "retention" => $retention,
        "date_start" => $date_start,
        "date_end" => $date_end,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function investments_add($institution_id, $type, $operation, $ref, $amount, $days, $rate, $total, $retention, $date_start, $date_end, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `investments` ( `id` ,   `institution_id` ,   `type` ,   `operation` ,   `ref` ,   `amount` ,   `days` ,   `rate` ,   `total` ,   `retention` ,   `date_start` ,   `date_end` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :institution_id ,  :type ,  :operation ,  :ref ,  :amount ,  :days ,  :rate ,  :total ,  :retention ,  :date_start ,  :date_end ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "institution_id" => $institution_id,
        "type" => $type,
        "operation" => $operation,
        "ref" => $ref,
        "amount" => $amount,
        "days" => $days,
        "rate" => $rate,
        "total" => $total,
        "retention" => $retention,
        "date_start" => $date_start,
        "date_end" => $date_end,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function investments_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `institution_id`,  `type`,  `operation`,  `ref`,  `amount`,  `days`,  `rate`,  `total`,  `retention`,  `date_start`,  `date_end`,  `order_by`,  `status`    
            FROM `investments` 
            WHERE `id` = :txt OR `id` like :txt
OR `institution_id` like :txt
OR `type` like :txt
OR `operation` like :txt
OR `ref` like :txt
OR `amount` like :txt
OR `days` like :txt
OR `rate` like :txt
OR `total` like :txt
OR `retention` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
    ORDER BY `order_by` DESC, `id` DESC
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

function investments_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (investments_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function investments_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `investments` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function investments_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `institution_id`,  `type`,  `operation`,  `ref`,  `amount`,  `days`,  `rate`,  `total`,  `retention`,  `date_start`,  `date_end`,  `order_by`,  `status`    FROM `investments` 
    WHERE `$field` = '$txt' 
    ORDER BY `order_by` DESC, `id` DESC
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

function investments_db_show_col_from_table($c) {
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
function investments_db_col_list_from_table($c) {
    $list = array();
    foreach (investments_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function investments_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_institution_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `institution_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_operation($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `operation`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_ref($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `ref`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_amount($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `amount`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_days($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `days`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_rate($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `rate`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_retention($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `retention`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investments_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investments` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function investments_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            investments_update_id($id, $new_data);
            break;

        case "institution_id":
            investments_update_institution_id($id, $new_data);
            break;

        case "type":
            investments_update_type($id, $new_data);
            break;

        case "operation":
            investments_update_operation($id, $new_data);
            break;

        case "ref":
            investments_update_ref($id, $new_data);
            break;

        case "amount":
            investments_update_amount($id, $new_data);
            break;

        case "days":
            investments_update_days($id, $new_data);
            break;

        case "rate":
            investments_update_rate($id, $new_data);
            break;

        case "total":
            investments_update_total($id, $new_data);
            break;

        case "retention":
            investments_update_retention($id, $new_data);
            break;

        case "date_start":
            investments_update_date_start($id, $new_data);
            break;

        case "date_end":
            investments_update_date_end($id, $new_data);
            break;

        case "order_by":
            investments_update_order_by($id, $new_data);
            break;

        case "status":
            investments_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function investments_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `investments` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/investments/functions.php
// and comment here (this function)
//function investments_add_filter($col_name, $value) {
//    
//    switch ($col_name) {
//        case "institution_id":
//            return contacts_field_id("id", $value);
//            break; 
//       
//
//        default:
//            return $value;
//            break;
//    }
//}
//
//
//
function investments_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `investments` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_institution_id($institution_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `institution_id` FROM `investments` WHERE   `institution_id` = ?");
    $req->execute(array($institution_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_type($type) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `investments` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_operation($operation) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `operation` FROM `investments` WHERE   `operation` = ?");
    $req->execute(array($operation));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_ref($ref) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref` FROM `investments` WHERE   `ref` = ?");
    $req->execute(array($ref));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_amount($amount) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `amount` FROM `investments` WHERE   `amount` = ?");
    $req->execute(array($amount));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_days($days) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `days` FROM `investments` WHERE   `days` = ?");
    $req->execute(array($days));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_rate($rate) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `rate` FROM `investments` WHERE   `rate` = ?");
    $req->execute(array($rate));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_total($total) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `investments` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_retention($retention) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `retention` FROM `investments` WHERE   `retention` = ?");
    $req->execute(array($retention));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_date_start($date_start) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `investments` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_date_end($date_end) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `investments` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `investments` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investments_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `investments` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function investments_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function investments_is_institution_id($institution_id) {
    return true;
}

function investments_is_type($type) {
    return true;
}

function investments_is_operation($operation) {
    return true;
}

function investments_is_ref($ref) {
    return true;
}

function investments_is_amount($amount) {
    return true;
}

function investments_is_days($days) {
    return true;
}

function investments_is_rate($rate) {
    return true;
}

function investments_is_total($total) {
    return true;
}

function investments_is_retention($retention) {
    return true;
}

function investments_is_date_start($date_start) {
    return true;
}

function investments_is_date_end($date_end) {
    return true;
}

function investments_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function investments_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function investments_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, investments_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function investments_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (investments_is_id($value)) ? true : false;
            break;
        case "institution_id":
            $is = (investments_is_institution_id($value)) ? true : false;
            break;
        case "type":
            $is = (investments_is_type($value)) ? true : false;
            break;
        case "operation":
            $is = (investments_is_operation($value)) ? true : false;
            break;
        case "ref":
            $is = (investments_is_ref($value)) ? true : false;
            break;
        case "amount":
            $is = (investments_is_amount($value)) ? true : false;
            break;
        case "days":
            $is = (investments_is_days($value)) ? true : false;
            break;
        case "rate":
            $is = (investments_is_rate($value)) ? true : false;
            break;
        case "total":
            $is = (investments_is_total($value)) ? true : false;
            break;
        case "retention":
            $is = (investments_is_retention($value)) ? true : false;
            break;
        case "date_start":
            $is = (investments_is_date_start($value)) ? true : false;
            break;
        case "date_end":
            $is = (investments_is_date_end($value)) ? true : false;
            break;
        case "order_by":
            $is = (investments_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (investments_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//
//
//        
################################################################################
################################################################################
################################################################################
