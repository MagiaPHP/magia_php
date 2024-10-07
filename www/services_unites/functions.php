<?php

// plugin = services_unites
// creation date : 2024-04-29
// 
// 
function services_unites_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_unites` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_unites` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_unites` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `unites`,  `order_by`,  `status`   
    FROM `services_unites` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function services_unites_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `code`,  `unites`,  `order_by`,  `status`   
    FROM `services_unites` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function services_unites_edit($id, $code, $unites, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `services_unites` SET `code` =:code, `unites` =:unites, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "code" => $code,
        "unites" => $unites,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function services_unites_add($code, $unites, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `services_unites` ( `id` ,   `code` ,   `unites` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :unites ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "code" => $code,
        "unites" => $unites,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function services_unites_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `unites`,  `order_by`,  `status`    
            FROM `services_unites` 
            WHERE `id` = :txt OR `id` like :txt
OR `code` like :txt
OR `unites` like :txt
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

function services_unites_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (services_unites_list() as $key => $value) {
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

function services_unites_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `services_unites` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function services_unites_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `unites`,  `order_by`,  `status`    FROM `services_unites` 
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

function services_unites_db_show_col_from_table($c) {
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
function services_unites_db_col_list_from_table($c) {
    $list = array();
    foreach (services_unites_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function services_unites_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_unites` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_unites_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_unites` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_unites_update_unites($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_unites` SET `unites`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_unites_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_unites` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_unites_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_unites` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function services_unites_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            services_unites_update_id($id, $new_data);
            break;

        case "code":
            services_unites_update_code($id, $new_data);
            break;

        case "unites":
            services_unites_update_unites($id, $new_data);
            break;

        case "order_by":
            services_unites_update_order_by($id, $new_data);
            break;

        case "status":
            services_unites_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function services_unites_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `services_unites` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/services_unites/functions.php
// and comment here (this function)
function services_unites_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "unites":
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
function services_unites_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `services_unites` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `services_unites` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_exists_unites($unites) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `unites` FROM `services_unites` WHERE   `unites` = ?");
    $req->execute(array($unites));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `services_unites` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_unites_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `services_unites` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function services_unites_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function services_unites_is_code($code) {
    return true;
}

function services_unites_is_unites($unites) {
    return true;
}

function services_unites_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function services_unites_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function services_unites_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, services_unites_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function services_unites_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (services_unites_is_id($value)) ? true : false;
            break;
        case "code":
            $is = (services_unites_is_code($value)) ? true : false;
            break;
        case "unites":
            $is = (services_unites_is_unites($value)) ? true : false;
            break;
        case "order_by":
            $is = (services_unites_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (services_unites_is_status($value)) ? true : false;
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
