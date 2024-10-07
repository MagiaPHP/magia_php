<?php

// plugin = tax
// creation date : 2024-04-12
// 
// 
function tax_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tax` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tax` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tax` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `value`,  `order_by`,  `status`   
    FROM `tax` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function tax_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `name`,  `value`,  `order_by`,  `status`   
    FROM `tax` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function tax_edit($id, $name, $value, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `tax` SET `name` =:name, `value` =:value, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "name" => $name,
        "value" => $value,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function tax_add($name, $value, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tax` ( `id` ,   `name` ,   `value` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :value ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "name" => $name,
        "value" => $value,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function tax_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `value`,  `order_by`,  `status`    
            FROM `tax` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
OR `value` like :txt
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

function tax_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (tax_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function tax_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `tax` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function tax_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `value`,  `order_by`,  `status`    FROM `tax` 
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

function tax_db_show_col_from_table($c) {
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
function tax_db_col_list_from_table($c) {
    $list = array();
    foreach (tax_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function tax_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tax` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tax_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tax` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tax_update_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tax` SET `value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tax_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tax` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function tax_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tax` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function tax_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            tax_update_id($id, $new_data);
            break;

        case "name":
            tax_update_name($id, $new_data);
            break;

        case "value":
            tax_update_value($id, $new_data);
            break;

        case "order_by":
            tax_update_order_by($id, $new_data);
            break;

        case "status":
            tax_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function tax_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `tax` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/tax/functions.php
// and comment here (this function)
function tax_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "value":
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
function tax_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `tax` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_exists_name($name) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `tax` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_exists_value($value) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value` FROM `tax` WHERE   `value` = ?");
    $req->execute(array($value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `tax` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function tax_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `tax` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function tax_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function tax_is_name($name) {
    return true;
}

function tax_is_value($value) {
    return true;
}

function tax_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function tax_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function tax_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, tax_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function tax_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (tax_is_id($value)) ? true : false;
            break;
        case "name":
            $is = (tax_is_name($value)) ? true : false;
            break;
        case "value":
            $is = (tax_is_value($value)) ? true : false;
            break;
        case "order_by":
            $is = (tax_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (tax_is_status($value)) ? true : false;
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
