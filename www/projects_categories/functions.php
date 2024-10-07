<?php

// plugin = projects_categories
// creation date : 2024-04-09
// 
// 
function projects_categories_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects_categories` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects_categories` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects_categories` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `fader_code`,  `code`,  `category`,  `description`,  `icon`,  `color`,  `order_by`,  `status`   
    FROM `projects_categories` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function projects_categories_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `fader_code`,  `code`,  `category`,  `description`,  `icon`,  `color`,  `order_by`,  `status`   
    FROM `projects_categories` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function projects_categories_edit($id, $fader_code, $code, $category, $description, $icon, $color, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `fader_code` =:fader_code, `code` =:code, `category` =:category, `description` =:description, `icon` =:icon, `color` =:color, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "fader_code" => $fader_code,
        "code" => $code,
        "category" => $category,
        "description" => $description,
        "icon" => $icon,
        "color" => $color,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function projects_categories_add($fader_code, $code, $category, $description, $icon, $color, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `projects_categories` ( `id` ,   `fader_code` ,   `code` ,   `category` ,   `description` ,   `icon` ,   `color` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :fader_code ,  :code ,  :category ,  :description ,  :icon ,  :color ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "fader_code" => $fader_code,
        "code" => $code,
        "category" => $category,
        "description" => $description,
        "icon" => $icon,
        "color" => $color,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function projects_categories_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `fader_code`,  `code`,  `category`,  `description`,  `icon`,  `color`,  `order_by`,  `status`    
            FROM `projects_categories` 
            WHERE `id` = :txt OR `id` like :txt
OR `fader_code` like :txt
OR `code` like :txt
OR `category` like :txt
OR `description` like :txt
OR `icon` like :txt
OR `color` like :txt
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

function projects_categories_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (projects_categories_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function projects_categories_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `projects_categories` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function projects_categories_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `fader_code`,  `code`,  `category`,  `description`,  `icon`,  `color`,  `order_by`,  `status`    FROM `projects_categories` 
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

function projects_categories_db_show_col_from_table($c) {
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
function projects_categories_db_col_list_from_table($c) {
    $list = array();
    foreach (projects_categories_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function projects_categories_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_fader_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `fader_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_category($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `category`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_color($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `color`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_categories_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_categories` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function projects_categories_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            projects_categories_update_id($id, $new_data);
            break;

        case "fader_code":
            projects_categories_update_fader_code($id, $new_data);
            break;

        case "code":
            projects_categories_update_code($id, $new_data);
            break;

        case "category":
            projects_categories_update_category($id, $new_data);
            break;

        case "description":
            projects_categories_update_description($id, $new_data);
            break;

        case "icon":
            projects_categories_update_icon($id, $new_data);
            break;

        case "color":
            projects_categories_update_color($id, $new_data);
            break;

        case "order_by":
            projects_categories_update_order_by($id, $new_data);
            break;

        case "status":
            projects_categories_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function projects_categories_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `projects_categories` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/projects_categories/functions.php
// and comment here (this function)
function projects_categories_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "fader_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "category":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "icon":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "color":
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
function projects_categories_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `projects_categories` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_fader_code($fader_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `fader_code` FROM `projects_categories` WHERE   `fader_code` = ?");
    $req->execute(array($fader_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `projects_categories` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_category($category) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category` FROM `projects_categories` WHERE   `category` = ?");
    $req->execute(array($category));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `projects_categories` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_icon($icon) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `projects_categories` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_color($color) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `color` FROM `projects_categories` WHERE   `color` = ?");
    $req->execute(array($color));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `projects_categories` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_categories_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `projects_categories` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function projects_categories_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function projects_categories_is_fader_code($fader_code) {
    return true;
}

function projects_categories_is_code($code) {
    return true;
}

function projects_categories_is_category($category) {
    return true;
}

function projects_categories_is_description($description) {
    return true;
}

function projects_categories_is_icon($icon) {
    return true;
}

function projects_categories_is_color($color) {
    return true;
}

function projects_categories_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function projects_categories_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function projects_categories_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, projects_categories_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function projects_categories_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (projects_categories_is_id($value)) ? true : false;
            break;
        case "fader_code":
            $is = (projects_categories_is_fader_code($value)) ? true : false;
            break;
        case "code":
            $is = (projects_categories_is_code($value)) ? true : false;
            break;
        case "category":
            $is = (projects_categories_is_category($value)) ? true : false;
            break;
        case "description":
            $is = (projects_categories_is_description($value)) ? true : false;
            break;
        case "icon":
            $is = (projects_categories_is_icon($value)) ? true : false;
            break;
        case "color":
            $is = (projects_categories_is_color($value)) ? true : false;
            break;
        case "order_by":
            $is = (projects_categories_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (projects_categories_is_status($value)) ? true : false;
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
