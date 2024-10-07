<?php

// plugin = subdomains
// creation date : 2024-05-15
// 
// 
function subdomains_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `subdomains` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `create_by`,  `plan`,  `prefix`,  `subdomain`,  `domain`,  `code`,  `date_registre`,  `order_by`,  `status`   
    FROM `subdomains` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function subdomains_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `contact_id`,  `create_by`,  `plan`,  `prefix`,  `subdomain`,  `domain`,  `code`,  `date_registre`,  `order_by`,  `status`   
    FROM `subdomains` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function subdomains_edit($id, $contact_id, $create_by, $plan, $prefix, $subdomain, $domain, $code, $date_registre, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `contact_id` =:contact_id, `create_by` =:create_by, `plan` =:plan, `prefix` =:prefix, `subdomain` =:subdomain, `domain` =:domain, `code` =:code, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
        "create_by" => $create_by,
        "plan" => $plan,
        "prefix" => $prefix,
        "subdomain" => $subdomain,
        "domain" => $domain,
        "code" => $code,
        "date_registre" => $date_registre,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function subdomains_add($contact_id, $create_by, $plan, $prefix, $subdomain, $domain, $code, $date_registre, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `subdomains` ( `id` ,   `contact_id` ,   `create_by` ,   `plan` ,   `prefix` ,   `subdomain` ,   `domain` ,   `code` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :create_by ,  :plan ,  :prefix ,  :subdomain ,  :domain ,  :code ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "create_by" => $create_by,
        "plan" => $plan,
        "prefix" => $prefix,
        "subdomain" => $subdomain,
        "domain" => $domain,
        "code" => $code,
        "date_registre" => $date_registre,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function subdomains_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `create_by`,  `plan`,  `prefix`,  `subdomain`,  `domain`,  `code`,  `date_registre`,  `order_by`,  `status`    
            FROM `subdomains` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `create_by` like :txt
OR `plan` like :txt
OR `prefix` like :txt
OR `subdomain` like :txt
OR `domain` like :txt
OR `code` like :txt
OR `date_registre` like :txt
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

function subdomains_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (subdomains_list() as $key => $value) {
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

function subdomains_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `subdomains` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function subdomains_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `create_by`,  `plan`,  `prefix`,  `subdomain`,  `domain`,  `code`,  `date_registre`,  `order_by`,  `status`    FROM `subdomains` 
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

function subdomains_db_show_col_from_table($c) {
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
function subdomains_db_col_list_from_table($c) {
    $list = array();
    foreach (subdomains_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function subdomains_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_create_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `create_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_plan($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `plan`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_prefix($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `prefix`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_subdomain($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `subdomain`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_domain($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `domain`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function subdomains_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `subdomains` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function subdomains_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            subdomains_update_id($id, $new_data);
            break;

        case "contact_id":
            subdomains_update_contact_id($id, $new_data);
            break;

        case "create_by":
            subdomains_update_create_by($id, $new_data);
            break;

        case "plan":
            subdomains_update_plan($id, $new_data);
            break;

        case "prefix":
            subdomains_update_prefix($id, $new_data);
            break;

        case "subdomain":
            subdomains_update_subdomain($id, $new_data);
            break;

        case "domain":
            subdomains_update_domain($id, $new_data);
            break;

        case "code":
            subdomains_update_code($id, $new_data);
            break;

        case "date_registre":
            subdomains_update_date_registre($id, $new_data);
            break;

        case "order_by":
            subdomains_update_order_by($id, $new_data);
            break;

        case "status":
            subdomains_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function subdomains_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `subdomains` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/subdomains/functions.php
// and comment here (this function)
function subdomains_add_filterxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "create_by":
            //return contacts_field_id("tva", $value);
            return ($filtre) ?? $value;
            break;
        case "plan":
            //return subdomains_plan_field_id("plan", $value);
            return ($filtre) ?? $value;
            break;
        case "prefix":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "subdomain":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "domain":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date_registre":
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
function subdomains_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `subdomains` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_contact_id($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `subdomains` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_create_by($create_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `create_by` FROM `subdomains` WHERE   `create_by` = ?");
    $req->execute(array($create_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_plan($plan) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `plan` FROM `subdomains` WHERE   `plan` = ?");
    $req->execute(array($plan));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_prefix($prefix) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `prefix` FROM `subdomains` WHERE   `prefix` = ?");
    $req->execute(array($prefix));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_subdomain($subdomain) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `subdomain` FROM `subdomains` WHERE   `subdomain` = ?");
    $req->execute(array($subdomain));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_domain($domain) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `domain` FROM `subdomains` WHERE   `domain` = ?");
    $req->execute(array($domain));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `subdomains` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_date_registre($date_registre) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `subdomains` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `subdomains` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function subdomains_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `subdomains` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function subdomains_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function subdomains_is_contact_id($contact_id) {
    return true;
}

function subdomains_is_create_by($create_by) {
    return true;
}

function subdomains_is_plan($plan) {
    return true;
}

function subdomains_is_prefix($prefix) {
    return true;
}

function subdomains_is_subdomain($subdomain) {
    return true;
}

function subdomains_is_domain($domain) {
    return true;
}

function subdomains_is_code($code) {
    return true;
}

function subdomains_is_date_registre($date_registre) {
    return true;
}

function subdomains_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function subdomains_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function subdomains_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, subdomains_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function subdomains_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (subdomains_is_id($value)) ? true : false;
            break;
        case "contact_id":
            $is = (subdomains_is_contact_id($value)) ? true : false;
            break;
        case "create_by":
            $is = (subdomains_is_create_by($value)) ? true : false;
            break;
        case "plan":
            $is = (subdomains_is_plan($value)) ? true : false;
            break;
        case "prefix":
            $is = (subdomains_is_prefix($value)) ? true : false;
            break;
        case "subdomain":
            $is = (subdomains_is_subdomain($value)) ? true : false;
            break;
        case "domain":
            $is = (subdomains_is_domain($value)) ? true : false;
            break;
        case "code":
            $is = (subdomains_is_code($value)) ? true : false;
            break;
        case "date_registre":
            $is = (subdomains_is_date_registre($value)) ? true : false;
            break;
        case "order_by":
            $is = (subdomains_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (subdomains_is_status($value)) ? true : false;
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
