<?php

// plugin = services_price
// creation date : 2024-04-29
// 
// 
function services_price_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_price` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_price` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_price` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `service_code`,  `unite_code`,  `price`,  `order_by`,  `status`   
    FROM `services_price` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function services_price_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `service_code`,  `unite_code`,  `price`,  `order_by`,  `status`   
    FROM `services_price` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function services_price_edit($id, $service_code, $unite_code, $price, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `service_code` =:service_code, `unite_code` =:unite_code, `price` =:price, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "service_code" => $service_code,
        "unite_code" => $unite_code,
        "price" => $price,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function services_price_add($service_code, $unite_code, $price, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `services_price` ( `id` ,   `service_code` ,   `unite_code` ,   `price` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :service_code ,  :unite_code ,  :price ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "service_code" => $service_code,
        "unite_code" => $unite_code,
        "price" => $price,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function services_price_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `service_code`,  `unite_code`,  `price`,  `order_by`,  `status`    
            FROM `services_price` 
            WHERE `id` = :txt OR `id` like :txt
OR `service_code` like :txt
OR `unite_code` like :txt
OR `price` like :txt
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

function services_price_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (services_price_list() as $key => $value) {
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

function services_price_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `services_price` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function services_price_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `service_code`,  `unite_code`,  `price`,  `order_by`,  `status`    FROM `services_price` 
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

function services_price_db_show_col_from_table($c) {
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
function services_price_db_col_list_from_table($c) {
    $list = array();
    foreach (services_price_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function services_price_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_price_update_service_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `service_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_price_update_unite_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `unite_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_price_update_price($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `price`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_price_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_price_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_price` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function services_price_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            services_price_update_id($id, $new_data);
            break;

        case "service_code":
            services_price_update_service_code($id, $new_data);
            break;

        case "unite_code":
            services_price_update_unite_code($id, $new_data);
            break;

        case "price":
            services_price_update_price($id, $new_data);
            break;

        case "order_by":
            services_price_update_order_by($id, $new_data);
            break;

        case "status":
            services_price_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function services_price_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `services_price` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/services_price/functions.php
// and comment here (this function)
function services_price_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "service_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "unite_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "price":
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
function services_price_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `services_price` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_exists_service_code($service_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `service_code` FROM `services_price` WHERE   `service_code` = ?");
    $req->execute(array($service_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_exists_unite_code($unite_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `unite_code` FROM `services_price` WHERE   `unite_code` = ?");
    $req->execute(array($unite_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_exists_price($price) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `price` FROM `services_price` WHERE   `price` = ?");
    $req->execute(array($price));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `services_price` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_price_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `services_price` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function services_price_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function services_price_is_service_code($service_code) {
    return true;
}

function services_price_is_unite_code($unite_code) {
    return true;
}

function services_price_is_price($price) {
    return true;
}

function services_price_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function services_price_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function services_price_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, services_price_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function services_price_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (services_price_is_id($value)) ? true : false;
            break;
        case "service_code":
            $is = (services_price_is_service_code($value)) ? true : false;
            break;
        case "unite_code":
            $is = (services_price_is_unite_code($value)) ? true : false;
            break;
        case "price":
            $is = (services_price_is_price($value)) ? true : false;
            break;
        case "order_by":
            $is = (services_price_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (services_price_is_status($value)) ? true : false;
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
