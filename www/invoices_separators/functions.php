<?php

// plugin = invoices_separators
// creation date : 2024-04-29
// 
// 
function invoices_separators_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `invoices_separators` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_separators_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `invoices_separators` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_separators_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `invoices_separators` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_separators_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `description`,  `order_by`,  `status`   
    FROM `invoices_separators` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_separators_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `description`,  `order_by`,  `status`   
    FROM `invoices_separators` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function invoices_separators_edit($id, $description, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `invoices_separators` SET `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "description" => $description,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function invoices_separators_add($description, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `invoices_separators` ( `id` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "description" => $description,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function invoices_separators_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `description`,  `order_by`,  `status`    
            FROM `invoices_separators` 
            WHERE `id` = :txt OR `id` like :txt
OR `description` like :txt
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

function invoices_separators_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (invoices_separators_list() as $key => $value) {
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

function invoices_separators_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `invoices_separators` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function invoices_separators_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `description`,  `order_by`,  `status`    FROM `invoices_separators` 
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

function invoices_separators_db_show_col_from_table($c) {
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
function invoices_separators_db_col_list_from_table($c) {
    $list = array();
    foreach (invoices_separators_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function invoices_separators_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `invoices_separators` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function invoices_separators_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `invoices_separators` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function invoices_separators_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `invoices_separators` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function invoices_separators_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `invoices_separators` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function invoices_separators_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            invoices_separators_update_id($id, $new_data);
            break;

        case "description":
            invoices_separators_update_description($id, $new_data);
            break;

        case "order_by":
            invoices_separators_update_order_by($id, $new_data);
            break;

        case "status":
            invoices_separators_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function invoices_separators_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `invoices_separators` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/invoices_separators/functions.php
// and comment here (this function)
function invoices_separators_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "description":
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
function invoices_separators_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `invoices_separators` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_separators_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `invoices_separators` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_separators_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `invoices_separators` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_separators_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `invoices_separators` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function invoices_separators_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function invoices_separators_is_description($description) {
    return true;
}

function invoices_separators_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function invoices_separators_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function invoices_separators_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, invoices_separators_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function invoices_separators_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (invoices_separators_is_id($value)) ? true : false;
            break;
        case "description":
            $is = (invoices_separators_is_description($value)) ? true : false;
            break;
        case "order_by":
            $is = (invoices_separators_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (invoices_separators_is_status($value)) ? true : false;
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
