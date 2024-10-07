<?php

// plugin = investment_lines
// creation date : 2024-01-29
// 
// 
function investment_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `investment_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `investment_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `investment_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `investment_id`,  `date`,  `value`,  `irf`,  `date_payment`,  `order_by`,  `status`   
    FROM `investment_lines` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function investment_lines_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `investment_id`,  `date`,  `value`,  `irf`,  `date_payment`,  `order_by`,  `status`   
    FROM `investment_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function investment_lines_edit($id, $investment_id, $date, $value, $irf, $date_payment, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `investment_id` =:investment_id, `date` =:date, `value` =:value, `irf` =:irf, `date_payment` =:date_payment, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "investment_id" => $investment_id,
        "date" => $date,
        "value" => $value,
        "irf" => $irf,
        "date_payment" => $date_payment,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function investment_lines_add($investment_id, $date, $value, $irf, $date_payment, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `investment_lines` ( `id` ,   `investment_id` ,   `date` ,   `value` ,   `irf` ,   `date_payment` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :investment_id ,  :date ,  :value ,  :irf ,  :date_payment ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "investment_id" => $investment_id,
        "date" => $date,
        "value" => $value,
        "irf" => $irf,
        "date_payment" => $date_payment,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function investment_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `investment_id`,  `date`,  `value`,  `irf`,  `date_payment`,  `order_by`,  `status`    
            FROM `investment_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `investment_id` like :txt
OR `date` like :txt
OR `value` like :txt
OR `irf` like :txt
OR `date_payment` like :txt
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

function investment_lines_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (investment_lines_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function investment_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `investment_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function investment_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `investment_id`,  `date`,  `value`,  `irf`,  `date_payment`,  `order_by`,  `status`    FROM `investment_lines` 
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

function investment_lines_db_show_col_from_table($c) {
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
function investment_lines_db_col_list_from_table($c) {
    $list = array();
    foreach (investment_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function investment_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_investment_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `investment_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_irf($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `irf`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_date_payment($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `date_payment`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function investment_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `investment_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function investment_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            investment_lines_update_id($id, $new_data);
            break;

        case "investment_id":
            investment_lines_update_investment_id($id, $new_data);
            break;

        case "date":
            investment_lines_update_date($id, $new_data);
            break;

        case "value":
            investment_lines_update_value($id, $new_data);
            break;

        case "irf":
            investment_lines_update_irf($id, $new_data);
            break;

        case "date_payment":
            investment_lines_update_date_payment($id, $new_data);
            break;

        case "order_by":
            investment_lines_update_order_by($id, $new_data);
            break;

        case "status":
            investment_lines_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function investment_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `investment_lines` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/investment_lines/functions.php
// and comment here (this function)
function investment_lines_add_filter($col_name, $value) {

    switch ($col_name) {
        case "investment_id":
            return investments_field_id("id", $value);
            break;

        default:
            return $value;
            break;
    }
}

//
//
//
function investment_lines_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `investment_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_investment_id($investment_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `investment_id` FROM `investment_lines` WHERE   `investment_id` = ?");
    $req->execute(array($investment_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_date($date) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `investment_lines` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_value($value) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value` FROM `investment_lines` WHERE   `value` = ?");
    $req->execute(array($value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_irf($irf) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `irf` FROM `investment_lines` WHERE   `irf` = ?");
    $req->execute(array($irf));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_date_payment($date_payment) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_payment` FROM `investment_lines` WHERE   `date_payment` = ?");
    $req->execute(array($date_payment));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `investment_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function investment_lines_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `investment_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function investment_lines_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function investment_lines_is_investment_id($investment_id) {
    return true;
}

function investment_lines_is_date($date) {
    return true;
}

function investment_lines_is_value($value) {
    return true;
}

function investment_lines_is_irf($irf) {
    return true;
}

function investment_lines_is_date_payment($date_payment) {
    return true;
}

function investment_lines_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function investment_lines_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function investment_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, investment_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function investment_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (investment_lines_is_id($value)) ? true : false;
            break;
        case "investment_id":
            $is = (investment_lines_is_investment_id($value)) ? true : false;
            break;
        case "date":
            $is = (investment_lines_is_date($value)) ? true : false;
            break;
        case "value":
            $is = (investment_lines_is_value($value)) ? true : false;
            break;
        case "irf":
            $is = (investment_lines_is_irf($value)) ? true : false;
            break;
        case "date_payment":
            $is = (investment_lines_is_date_payment($value)) ? true : false;
            break;
        case "order_by":
            $is = (investment_lines_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (investment_lines_is_status($value)) ? true : false;
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
