<?php

// plugin = subdomains_plan_features
// creation date : 2024-01-19
// 
// 
function subdomains_plan_features_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_plan_features` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_plan_features` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains_plan_features` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `feature`,  `order_by`,  `stattus`   
    FROM `subdomains_plan_features` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function subdomains_plan_features_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `plan`,  `feature`,  `order_by`,  `stattus`   
    FROM `subdomains_plan_features` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function subdomains_plan_features_edit($id, $plan, $feature, $order_by, $stattus) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan_features` SET `plan` =:plan, `feature` =:feature, `order_by` =:order_by, `stattus` =:stattus  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "plan" => $plan,
        "feature" => $feature,
        "order_by" => $order_by,
        "stattus" => $stattus,
    ));
}

function subdomains_plan_features_add($plan, $feature, $order_by, $stattus) {
    global $db;
    $req = $db->prepare(" INSERT INTO `subdomains_plan_features` ( `id` ,   `plan` ,   `feature` ,   `order_by` ,   `stattus`   )
                                       VALUES  (:id ,  :plan ,  :feature ,  :order_by ,  :stattus   ) ");

    $req->execute(array(
        "id" => null,
        "plan" => $plan,
        "feature" => $feature,
        "order_by" => $order_by,
        "stattus" => $stattus
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function subdomains_plan_features_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `feature`,  `order_by`,  `stattus`    
            FROM `subdomains_plan_features` 
            WHERE `id` = :txt OR `id` like :txt
OR `plan` like :txt
OR `feature` like :txt
OR `order_by` like :txt
OR `stattus` like :txt
 
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

function subdomains_plan_features_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (subdomains_plan_features_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function subdomains_plan_features_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `subdomains_plan_features` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function subdomains_plan_features_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `plan`,  `feature`,  `order_by`,  `stattus`    FROM `subdomains_plan_features` 
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

function subdomains_plan_features_db_show_col_from_table($c) {
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
function subdomains_plan_features_db_col_list_from_table($c) {
    $list = array();
    foreach (subdomains_plan_features_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function subdomains_plan_features_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan_features` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_features_update_plan($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan_features` SET `plan`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_features_update_feature($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan_features` SET `feature`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_features_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan_features` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_plan_features_update_stattus($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains_plan_features` SET `stattus`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function subdomains_plan_features_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            subdomains_plan_features_update_id($id, $new_data);
            break;

        case "plan":
            subdomains_plan_features_update_plan($id, $new_data);
            break;

        case "feature":
            subdomains_plan_features_update_feature($id, $new_data);
            break;

        case "order_by":
            subdomains_plan_features_update_order_by($id, $new_data);
            break;

        case "stattus":
            subdomains_plan_features_update_stattus($id, $new_data);
            break;

        default:
            break;
    }
}

//
function subdomains_plan_features_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `subdomains_plan_features` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/subdomains_plan_features/functions.php
// and comment here (this function)
function subdomains_plan_features_add_filter($col_name, $value) {

    switch ($col_name) {


        default:
            return $value;
            break;
    }
}

//
//
//
function subdomains_plan_features_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `subdomains_plan_features` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_exists_plan($plan) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `plan` FROM `subdomains_plan_features` WHERE   `plan` = ?");
    $req->execute(array($plan));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_exists_feature($feature) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `feature` FROM `subdomains_plan_features` WHERE   `feature` = ?");
    $req->execute(array($feature));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `subdomains_plan_features` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_plan_features_exists_stattus($stattus) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `stattus` FROM `subdomains_plan_features` WHERE   `stattus` = ?");
    $req->execute(array($stattus));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function subdomains_plan_features_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function subdomains_plan_features_is_plan($plan) {
    return true;
}

function subdomains_plan_features_is_feature($feature) {
    return true;
}

function subdomains_plan_features_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function subdomains_plan_features_is_stattus($stattus) {
    return true;
}

//
//
function subdomains_plan_features_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, subdomains_plan_features_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function subdomains_plan_features_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (subdomains_plan_features_is_id($value)) ? true : false;
            break;
        case "plan":
            $is = (subdomains_plan_features_is_plan($value)) ? true : false;
            break;
        case "feature":
            $is = (subdomains_plan_features_is_feature($value)) ? true : false;
            break;
        case "order_by":
            $is = (subdomains_plan_features_is_order_by($value)) ? true : false;
            break;
        case "stattus":
            $is = (subdomains_plan_features_is_stattus($value)) ? true : false;
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
