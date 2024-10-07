<?php

// plugin = services_sections
// creation date : 2024-04-29
// 
// 
function services_sections_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_sections` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_sections` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `services_sections` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section_father`,  `code`,  `section`,  `order_by`,  `status`   
    FROM `services_sections` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function services_sections_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `section_father`,  `code`,  `section`,  `order_by`,  `status`   
    FROM `services_sections` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function services_sections_edit($id, $section_father, $code, $section, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `section_father` =:section_father, `code` =:code, `section` =:section, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "section_father" => $section_father,
        "code" => $code,
        "section" => $section,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function services_sections_add($section_father, $code, $section, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `services_sections` ( `id` ,   `section_father` ,   `code` ,   `section` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :section_father ,  :code ,  :section ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "section_father" => $section_father,
        "code" => $code,
        "section" => $section,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function services_sections_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section_father`,  `code`,  `section`,  `order_by`,  `status`    
            FROM `services_sections` 
            WHERE `id` = :txt OR `id` like :txt
OR `section_father` like :txt
OR `code` like :txt
OR `section` like :txt
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

function services_sections_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (services_sections_list() as $key => $value) {
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

function services_sections_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `services_sections` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function services_sections_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section_father`,  `code`,  `section`,  `order_by`,  `status`    FROM `services_sections` 
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

function services_sections_db_show_col_from_table($c) {
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
function services_sections_db_col_list_from_table($c) {
    $list = array();
    foreach (services_sections_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function services_sections_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_sections_update_section_father($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `section_father`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_sections_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_sections_update_section($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `section`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_sections_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function services_sections_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `services_sections` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function services_sections_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            services_sections_update_id($id, $new_data);
            break;

        case "section_father":
            services_sections_update_section_father($id, $new_data);
            break;

        case "code":
            services_sections_update_code($id, $new_data);
            break;

        case "section":
            services_sections_update_section($id, $new_data);
            break;

        case "order_by":
            services_sections_update_order_by($id, $new_data);
            break;

        case "status":
            services_sections_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function services_sections_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `services_sections` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/services_sections/functions.php
// and comment here (this function)
function services_sections_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "section_father":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "section":
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
function services_sections_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `services_sections` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_exists_section_father($section_father) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `section_father` FROM `services_sections` WHERE   `section_father` = ?");
    $req->execute(array($section_father));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `services_sections` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_exists_section($section) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `section` FROM `services_sections` WHERE   `section` = ?");
    $req->execute(array($section));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `services_sections` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function services_sections_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `services_sections` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function services_sections_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function services_sections_is_section_father($section_father) {
    return true;
}

function services_sections_is_code($code) {
    return true;
}

function services_sections_is_section($section) {
    return true;
}

function services_sections_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function services_sections_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function services_sections_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, services_sections_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function services_sections_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (services_sections_is_id($value)) ? true : false;
            break;
        case "section_father":
            $is = (services_sections_is_section_father($value)) ? true : false;
            break;
        case "code":
            $is = (services_sections_is_code($value)) ? true : false;
            break;
        case "section":
            $is = (services_sections_is_section($value)) ? true : false;
            break;
        case "order_by":
            $is = (services_sections_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (services_sections_is_status($value)) ? true : false;
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
