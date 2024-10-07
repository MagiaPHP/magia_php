<?php

// plugin = subdomains_plan
// creation date : 2024-01-19
// 
// 
function subdomains_plan_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_plan` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_plan` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_plan` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `features`,  `price`,  `order_by`,  `status`   
    FROM `subdomains_plan` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function subdomains_plan_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `plan`,  `features`,  `price`,  `order_by`,  `status`   
    FROM `subdomains_plan` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function subdomains_plan_edit($id, $plan, $features, $price, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `plan` =:plan, `features` =:features, `price` =:price, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "plan" => $plan,
        "features" => $features,
        "price" => $price,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function subdomains_plan_add($plan, $features, $price, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `subdomains_plan` ( `id` ,   `plan` ,   `features` ,   `price` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :plan ,  :features ,  :price ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "plan" => $plan,
        "features" => $features,
        "price" => $price,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function subdomains_plan_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `features`,  `price`,  `order_by`,  `status`    
            FROM `subdomains_plan` 
            WHERE `id` = :txt OR `id` like :txt
OR `plan` like :txt
OR `features` like :txt
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

function subdomains_plan_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (subdomains_plan_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function subdomains_plan_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `subdomains_plan` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function subdomains_plan_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `features`,  `price`,  `order_by`,  `status`    FROM `subdomains_plan` 
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

function subdomains_plan_db_show_col_from_table($c) {
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
function subdomains_plan_db_col_list_from_table($c) {
    $list = array();
    foreach (subdomains_plan_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function subdomains_plan_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_update_plan($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `plan`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_update_features($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `features`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_update_price($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `price`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function subdomains_plan_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            subdomains_plan_update_id($id, $new_data);
            break;

        case "plan":
            subdomains_plan_update_plan($id, $new_data);
            break;

        case "features":
            subdomains_plan_update_features($id, $new_data);
            break;

        case "price":
            subdomains_plan_update_price($id, $new_data);
            break;

        case "order_by":
            subdomains_plan_update_order_by($id, $new_data);
            break;

        case "status":
            subdomains_plan_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function subdomains_plan_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `subdomains_plan` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/subdomains_plan/functions.php
// and comment here (this function)
function subdomains_plan_add_filter($col_name, $value) {

    switch ($col_name) {


        default:
            return $value;
            break;
    }
}

//
//
//
function subdomains_plan_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `subdomains_plan` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_exists_plan($plan) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `plan` FROM `subdomains_plan` WHERE   `plan` = ?");
    $req->execute(array($plan));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_exists_features($features) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `features` FROM `subdomains_plan` WHERE   `features` = ?");
    $req->execute(array($features));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_exists_price($price) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `price` FROM `subdomains_plan` WHERE   `price` = ?");
    $req->execute(array($price));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `subdomains_plan` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `subdomains_plan` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function subdomains_plan_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function subdomains_plan_is_plan($plan) {
    return true;
}

function subdomains_plan_is_features($features) {
    return true;
}

function subdomains_plan_is_price($price) {
    return true;
}

function subdomains_plan_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function subdomains_plan_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function subdomains_plan_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, subdomains_plan_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function subdomains_plan_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (subdomains_plan_is_id($value)) ? true : false;
            break;
        case "plan":
            $is = (subdomains_plan_is_plan($value)) ? true : false;
            break;
        case "features":
            $is = (subdomains_plan_is_features($value)) ? true : false;
            break;
        case "price":
            $is = (subdomains_plan_is_price($value)) ? true : false;
            break;
        case "order_by":
            $is = (subdomains_plan_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (subdomains_plan_is_status($value)) ? true : false;
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
