<?php

// plugin = forms_lines
// creation date : 2024-02-11
// 
// 
function forms_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `forms_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `forms_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `forms_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `form_id`,  `m_label`,  `m_type`,  `m_class`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `m_table_external`,  `m_col_external`,  `m_label_external`,  `m_options_values`,  `order_by`,  `status`   
    FROM `forms_lines` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function forms_lines_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `form_id`,  `m_label`,  `m_type`,  `m_class`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `m_table_external`,  `m_col_external`,  `m_label_external`,  `m_options_values`,  `order_by`,  `status`   
    FROM `forms_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function forms_lines_edit($id, $form_id, $m_label, $m_type, $m_class, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $m_table_external, $m_col_external, $m_label_external, $m_options_values, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `form_id` =:form_id, `m_label` =:m_label, `m_type` =:m_type, `m_class` =:m_class, `m_name` =:m_name, `m_id` =:m_id, `m_placeholder` =:m_placeholder, `m_value` =:m_value, `m_only_read` =:m_only_read, `m_mandatory` =:m_mandatory, `m_selected` =:m_selected, `m_disabled` =:m_disabled, `m_table_external` =:m_table_external, `m_col_external` =:m_col_external, `m_label_external` =:m_label_external, `m_options_values` =:m_options_values, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "form_id" => $form_id,
        "m_label" => $m_label,
        "m_type" => $m_type,
        "m_class" => $m_class,
        "m_name" => $m_name,
        "m_id" => $m_id,
        "m_placeholder" => $m_placeholder,
        "m_value" => $m_value,
        "m_only_read" => $m_only_read,
        "m_mandatory" => $m_mandatory,
        "m_selected" => $m_selected,
        "m_disabled" => $m_disabled,
        "m_table_external" => $m_table_external,
        "m_col_external" => $m_col_external,
        "m_label_external" => $m_label_external,
        "m_options_values" => $m_options_values,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function forms_lines_add($form_id, $m_label, $m_type, $m_class, $m_name, $m_id, $m_placeholder, $m_value, $m_only_read, $m_mandatory, $m_selected, $m_disabled, $m_table_external, $m_col_external, $m_label_external, $m_options_values, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `forms_lines` ( `id` ,   `form_id` ,   `m_label` ,   `m_type` ,   `m_class` ,   `m_name` ,   `m_id` ,   `m_placeholder` ,   `m_value` ,   `m_only_read` ,   `m_mandatory` ,   `m_selected` ,   `m_disabled` ,   `m_table_external` ,   `m_col_external` ,   `m_label_external` ,   `m_options_values` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :form_id ,  :m_label ,  :m_type ,  :m_class ,  :m_name ,  :m_id ,  :m_placeholder ,  :m_value ,  :m_only_read ,  :m_mandatory ,  :m_selected ,  :m_disabled ,  :m_table_external ,  :m_col_external ,  :m_label_external ,  :m_options_values ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "form_id" => $form_id,
        "m_label" => $m_label,
        "m_type" => $m_type,
        "m_class" => $m_class,
        "m_name" => $m_name,
        "m_id" => $m_id,
        "m_placeholder" => $m_placeholder,
        "m_value" => $m_value,
        "m_only_read" => $m_only_read,
        "m_mandatory" => $m_mandatory,
        "m_selected" => $m_selected,
        "m_disabled" => $m_disabled,
        "m_table_external" => $m_table_external,
        "m_col_external" => $m_col_external,
        "m_label_external" => $m_label_external,
        "m_options_values" => $m_options_values,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function forms_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `form_id`,  `m_label`,  `m_type`,  `m_class`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `m_table_external`,  `m_col_external`,  `m_label_external`,  `m_options_values`,  `order_by`,  `status`    
            FROM `forms_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `form_id` like :txt
OR `m_label` like :txt
OR `m_type` like :txt
OR `m_class` like :txt
OR `m_name` like :txt
OR `m_id` like :txt
OR `m_placeholder` like :txt
OR `m_value` like :txt
OR `m_only_read` like :txt
OR `m_mandatory` like :txt
OR `m_selected` like :txt
OR `m_disabled` like :txt
OR `m_table_external` like :txt
OR `m_col_external` like :txt
OR `m_label_external` like :txt
OR `m_options_values` like :txt
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

function forms_lines_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (forms_lines_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function forms_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `forms_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function forms_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `form_id`,  `m_label`,  `m_type`,  `m_class`,  `m_name`,  `m_id`,  `m_placeholder`,  `m_value`,  `m_only_read`,  `m_mandatory`,  `m_selected`,  `m_disabled`,  `m_table_external`,  `m_col_external`,  `m_label_external`,  `m_options_values`,  `order_by`,  `status`    FROM `forms_lines` 
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

function forms_lines_db_show_col_from_table($c) {
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
function forms_lines_db_col_list_from_table($c) {
    $list = array();
    foreach (forms_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function forms_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_form_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `form_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_class($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_class`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_placeholder($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_placeholder`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_only_read($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_only_read`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_mandatory($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_mandatory`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_selected($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_selected`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_disabled($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_disabled`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_table_external($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_table_external`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_col_external($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_col_external`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_label_external($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_label_external`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_m_options_values($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `m_options_values`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function forms_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `forms_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function forms_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            forms_lines_update_id($id, $new_data);
            break;

        case "form_id":
            forms_lines_update_form_id($id, $new_data);
            break;

        case "m_label":
            forms_lines_update_m_label($id, $new_data);
            break;

        case "m_type":
            forms_lines_update_m_type($id, $new_data);
            break;

        case "m_class":
            forms_lines_update_m_class($id, $new_data);
            break;

        case "m_name":
            forms_lines_update_m_name($id, $new_data);
            break;

        case "m_id":
            forms_lines_update_m_id($id, $new_data);
            break;

        case "m_placeholder":
            forms_lines_update_m_placeholder($id, $new_data);
            break;

        case "m_value":
            forms_lines_update_m_value($id, $new_data);
            break;

        case "m_only_read":
            forms_lines_update_m_only_read($id, $new_data);
            break;

        case "m_mandatory":
            forms_lines_update_m_mandatory($id, $new_data);
            break;

        case "m_selected":
            forms_lines_update_m_selected($id, $new_data);
            break;

        case "m_disabled":
            forms_lines_update_m_disabled($id, $new_data);
            break;

        case "m_table_external":
            forms_lines_update_m_table_external($id, $new_data);
            break;

        case "m_col_external":
            forms_lines_update_m_col_external($id, $new_data);
            break;

        case "m_label_external":
            forms_lines_update_m_label_external($id, $new_data);
            break;

        case "m_options_values":
            forms_lines_update_m_options_values($id, $new_data);
            break;

        case "order_by":
            forms_lines_update_order_by($id, $new_data);
            break;

        case "status":
            forms_lines_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function forms_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `forms_lines` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/forms_lines/functions.php
// and comment here (this function)
function forms_lines_add_filter($col_name, $value) {

    switch ($col_name) {
        case "form_id":
            return forms_field_id("id", $value);
            break;

        default:
            return $value;
            break;
    }
}

//
//
//
function forms_lines_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `forms_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_form_id($form_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `form_id` FROM `forms_lines` WHERE   `form_id` = ?");
    $req->execute(array($form_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_label($m_label) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_label` FROM `forms_lines` WHERE   `m_label` = ?");
    $req->execute(array($m_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_type($m_type) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_type` FROM `forms_lines` WHERE   `m_type` = ?");
    $req->execute(array($m_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_class($m_class) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_class` FROM `forms_lines` WHERE   `m_class` = ?");
    $req->execute(array($m_class));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_name($m_name) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_name` FROM `forms_lines` WHERE   `m_name` = ?");
    $req->execute(array($m_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_id($m_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_id` FROM `forms_lines` WHERE   `m_id` = ?");
    $req->execute(array($m_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_placeholder($m_placeholder) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_placeholder` FROM `forms_lines` WHERE   `m_placeholder` = ?");
    $req->execute(array($m_placeholder));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_value($m_value) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_value` FROM `forms_lines` WHERE   `m_value` = ?");
    $req->execute(array($m_value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_only_read($m_only_read) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_only_read` FROM `forms_lines` WHERE   `m_only_read` = ?");
    $req->execute(array($m_only_read));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_mandatory($m_mandatory) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_mandatory` FROM `forms_lines` WHERE   `m_mandatory` = ?");
    $req->execute(array($m_mandatory));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_selected($m_selected) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_selected` FROM `forms_lines` WHERE   `m_selected` = ?");
    $req->execute(array($m_selected));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_disabled($m_disabled) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_disabled` FROM `forms_lines` WHERE   `m_disabled` = ?");
    $req->execute(array($m_disabled));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_table_external($m_table_external) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_table_external` FROM `forms_lines` WHERE   `m_table_external` = ?");
    $req->execute(array($m_table_external));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_col_external($m_col_external) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_col_external` FROM `forms_lines` WHERE   `m_col_external` = ?");
    $req->execute(array($m_col_external));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_label_external($m_label_external) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_label_external` FROM `forms_lines` WHERE   `m_label_external` = ?");
    $req->execute(array($m_label_external));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_m_options_values($m_options_values) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `m_options_values` FROM `forms_lines` WHERE   `m_options_values` = ?");
    $req->execute(array($m_options_values));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `forms_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function forms_lines_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `forms_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function forms_lines_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function forms_lines_is_form_id($form_id) {
    return true;
}

function forms_lines_is_m_label($m_label) {
    return true;
}

function forms_lines_is_m_type($m_type) {
    return true;
}

function forms_lines_is_m_class($m_class) {
    return true;
}

function forms_lines_is_m_name($m_name) {
    return true;
}

function forms_lines_is_m_id($m_id) {
    return true;
}

function forms_lines_is_m_placeholder($m_placeholder) {
    return true;
}

function forms_lines_is_m_value($m_value) {
    return true;
}

function forms_lines_is_m_only_read($m_only_read) {
    return true;
}

function forms_lines_is_m_mandatory($m_mandatory) {
    return true;
}

function forms_lines_is_m_selected($m_selected) {
    return true;
}

function forms_lines_is_m_disabled($m_disabled) {
    return true;
}

function forms_lines_is_m_table_external($m_table_external) {
    return true;
}

function forms_lines_is_m_col_external($m_col_external) {
    return true;
}

function forms_lines_is_m_label_external($m_label_external) {
    return true;
}

function forms_lines_is_m_options_values($m_options_values) {
    return true;
}

function forms_lines_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function forms_lines_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function forms_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, forms_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function forms_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (forms_lines_is_id($value)) ? true : false;
            break;
        case "form_id":
            $is = (forms_lines_is_form_id($value)) ? true : false;
            break;
        case "m_label":
            $is = (forms_lines_is_m_label($value)) ? true : false;
            break;
        case "m_type":
            $is = (forms_lines_is_m_type($value)) ? true : false;
            break;
        case "m_class":
            $is = (forms_lines_is_m_class($value)) ? true : false;
            break;
        case "m_name":
            $is = (forms_lines_is_m_name($value)) ? true : false;
            break;
        case "m_id":
            $is = (forms_lines_is_m_id($value)) ? true : false;
            break;
        case "m_placeholder":
            $is = (forms_lines_is_m_placeholder($value)) ? true : false;
            break;
        case "m_value":
            $is = (forms_lines_is_m_value($value)) ? true : false;
            break;
        case "m_only_read":
            $is = (forms_lines_is_m_only_read($value)) ? true : false;
            break;
        case "m_mandatory":
            $is = (forms_lines_is_m_mandatory($value)) ? true : false;
            break;
        case "m_selected":
            $is = (forms_lines_is_m_selected($value)) ? true : false;
            break;
        case "m_disabled":
            $is = (forms_lines_is_m_disabled($value)) ? true : false;
            break;
        case "m_table_external":
            $is = (forms_lines_is_m_table_external($value)) ? true : false;
            break;
        case "m_col_external":
            $is = (forms_lines_is_m_col_external($value)) ? true : false;
            break;
        case "m_label_external":
            $is = (forms_lines_is_m_label_external($value)) ? true : false;
            break;
        case "m_options_values":
            $is = (forms_lines_is_m_options_values($value)) ? true : false;
            break;
        case "order_by":
            $is = (forms_lines_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (forms_lines_is_status($value)) ? true : false;
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
