<?php

// plugin = providers
// creation date : 2024-04-05
// 
// 
function providers_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `providers` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `providers` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `providers` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `company_id`,  `client_number`,  `date`,  `discount`,  `order_by`,  `status`   
    FROM `providers` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function providers_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `company_id`,  `client_number`,  `date`,  `discount`,  `order_by`,  `status`   
    FROM `providers` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function providers_edit($id, $company_id, $client_number, $date, $discount, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `company_id` =:company_id, `client_number` =:client_number, `date` =:date, `discount` =:discount, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "company_id" => $company_id,
        "client_number" => $client_number,
        "date" => $date,
        "discount" => $discount,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function providers_add($company_id, $client_number, $date, $discount, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `providers` ( `id` ,   `company_id` ,   `client_number` ,   `date` ,   `discount` ,   `order_by` ,   `status`   )
                                            VALUES  (:id ,  :company_id ,  :client_number ,  :date ,  :discount ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "company_id" => $company_id,
        "client_number" => $client_number,
        "date" => $date,
        "discount" => $discount,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function providers_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `company_id`,  `client_number`,  `date`,  `discount`,  `order_by`,  `status`    
            FROM `providers` 
            WHERE `id` = :txt OR `id` like :txt
OR `company_id` like :txt
OR `client_number` like :txt
OR `date` like :txt
OR `discount` like :txt
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

function providers_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (providers_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function providers_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `providers` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function providers_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `company_id`,  `client_number`,  `date`,  `discount`,  `order_by`,  `status`    FROM `providers` 
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

function providers_db_show_col_from_table($c) {
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
function providers_db_col_list_from_table($c) {
    $list = array();
    foreach (providers_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function providers_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function providers_update_company_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `company_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function providers_update_client_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `client_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function providers_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function providers_update_discount($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `discount`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function providers_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function providers_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `providers` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function providers_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            providers_update_id($id, $new_data);
            break;

        case "company_id":
            providers_update_company_id($id, $new_data);
            break;

        case "client_number":
            providers_update_client_number($id, $new_data);
            break;

        case "date":
            providers_update_date($id, $new_data);
            break;

        case "discount":
            providers_update_discount($id, $new_data);
            break;

        case "order_by":
            providers_update_order_by($id, $new_data);
            break;

        case "status":
            providers_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function providers_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `providers` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/providers/functions.php
// and comment here (this function)
function providers_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "company_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "client_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "discount":
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
function providers_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `providers` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_exists_company_id($company_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company_id` FROM `providers` WHERE   `company_id` = ?");
    $req->execute(array($company_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_exists_client_number($client_number) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `client_number` FROM `providers` WHERE   `client_number` = ?");
    $req->execute(array($client_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_exists_date($date) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `providers` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_exists_discount($discount) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `discount` FROM `providers` WHERE   `discount` = ?");
    $req->execute(array($discount));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `providers` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function providers_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `providers` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function providers_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function providers_is_company_id($company_id) {
    return true;
}

function providers_is_client_number($client_number) {
    return true;
}

function providers_is_date($date) {
    return true;
}

function providers_is_discount($discount) {
    return true;
}

function providers_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function providers_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function providers_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, providers_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function providers_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (providers_is_id($value)) ? true : false;
            break;
        case "company_id":
            $is = (providers_is_company_id($value)) ? true : false;
            break;
        case "client_number":
            $is = (providers_is_client_number($value)) ? true : false;
            break;
        case "date":
            $is = (providers_is_date($value)) ? true : false;
            break;
        case "discount":
            $is = (providers_is_discount($value)) ? true : false;
            break;
        case "order_by":
            $is = (providers_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (providers_is_status($value)) ? true : false;
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
