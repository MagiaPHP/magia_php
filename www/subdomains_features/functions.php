<?php

// plugin = subdomains_features
// creation date : 2024-01-19
// 
// 
function subdomains_features_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_features` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_features_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_features` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_features_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_features` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_features_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `feature`,  `order_by`,  `status`   
    FROM `subdomains_features` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function subdomains_features_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `feature`,  `order_by`,  `status`   
    FROM `subdomains_features` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function subdomains_features_edit($id, $feature, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_features` SET `feature` =:feature, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "feature" => $feature,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function subdomains_features_add($feature, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `subdomains_features` ( `id` ,   `feature` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :feature ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "feature" => $feature,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function subdomains_features_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `feature`,  `order_by`,  `status`    
            FROM `subdomains_features` 
            WHERE `id` = :txt OR `id` like :txt
OR `feature` like :txt
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

function subdomains_features_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (subdomains_features_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function subdomains_features_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `subdomains_features` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function subdomains_features_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `feature`,  `order_by`,  `status`    FROM `subdomains_features` 
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

function subdomains_features_db_show_col_from_table($c) {
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
function subdomains_features_db_col_list_from_table($c) {
    $list = array();
    foreach (subdomains_features_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function subdomains_features_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_features` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_features_update_feature($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_features` SET `feature`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_features_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_features` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_features_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_features` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function subdomains_features_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            subdomains_features_update_id($id, $new_data);
            break;

        case "feature":
            subdomains_features_update_feature($id, $new_data);
            break;

        case "order_by":
            subdomains_features_update_order_by($id, $new_data);
            break;

        case "status":
            subdomains_features_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function subdomains_features_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `subdomains_features` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/subdomains_features/functions.php
// and comment here (this function)
function subdomains_features_add_filter($col_name, $value) {

    switch ($col_name) {


        default:
            return $value;
            break;
    }
}

//
//
//
function subdomains_features_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `subdomains_features` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_features_exists_feature($feature) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `feature` FROM `subdomains_features` WHERE   `feature` = ?");
    $req->execute(array($feature));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_features_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `subdomains_features` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_features_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `subdomains_features` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function subdomains_features_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function subdomains_features_is_feature($feature) {
    return true;
}

function subdomains_features_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function subdomains_features_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function subdomains_features_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, subdomains_features_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function subdomains_features_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (subdomains_features_is_id($value)) ? true : false;
            break;
        case "feature":
            $is = (subdomains_features_is_feature($value)) ? true : false;
            break;
        case "order_by":
            $is = (subdomains_features_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (subdomains_features_is_status($value)) ? true : false;
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
