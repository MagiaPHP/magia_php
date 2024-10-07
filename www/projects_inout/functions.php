<?php

// plugin = projects_inout
// creation date : 2024-04-02
// 
// 
function projects_inout_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects_inout` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects_inout` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects_inout` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `project_id`,  `budget_id`,  `invoice_id`,  `expense_id`,  `value`,  `order_by`,  `status`   
    FROM `projects_inout` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function projects_inout_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `project_id`,  `budget_id`,  `invoice_id`,  `expense_id`,  `value`,  `order_by`,  `status`   
    FROM `projects_inout` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function projects_inout_edit($id, $project_id, $budget_id, $invoice_id, $expense_id, $value, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `project_id` =:project_id, `budget_id` =:budget_id, `invoice_id` =:invoice_id, `expense_id` =:expense_id, `value` =:value, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "project_id" => $project_id,
        "budget_id" => $budget_id,
        "invoice_id" => $invoice_id,
        "expense_id" => $expense_id,
        "value" => $value,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function projects_inout_add($project_id, $budget_id, $invoice_id, $expense_id, $value, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `projects_inout` ( `id` ,   `project_id` ,   `budget_id` ,   `invoice_id` ,   `expense_id` ,   `value` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :project_id ,  :budget_id ,  :invoice_id ,  :expense_id ,  :value ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "project_id" => $project_id,
        "budget_id" => $budget_id,
        "invoice_id" => $invoice_id,
        "expense_id" => $expense_id,
        "value" => $value,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function projects_inout_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `project_id`,  `budget_id`,  `invoice_id`,  `expense_id`,  `value`,  `order_by`,  `status`    
            FROM `projects_inout` 
            WHERE `id` = :txt OR `id` like :txt
OR `project_id` like :txt
OR `budget_id` like :txt
OR `invoice_id` like :txt
OR `expense_id` like :txt
OR `value` like :txt
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

function projects_inout_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (projects_inout_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function projects_inout_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `projects_inout` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function projects_inout_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `project_id`,  `budget_id`,  `invoice_id`,  `expense_id`,  `value`,  `order_by`,  `status`    FROM `projects_inout` 
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

function projects_inout_db_show_col_from_table($c) {
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
function projects_inout_db_col_list_from_table($c) {
    $list = array();
    foreach (projects_inout_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function projects_inout_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_project_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `project_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_budget_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `budget_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_invoice_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `invoice_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_expense_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `expense_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function projects_inout_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects_inout` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function projects_inout_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            projects_inout_update_id($id, $new_data);
            break;

        case "project_id":
            projects_inout_update_project_id($id, $new_data);
            break;

        case "budget_id":
            projects_inout_update_budget_id($id, $new_data);
            break;

        case "invoice_id":
            projects_inout_update_invoice_id($id, $new_data);
            break;

        case "expense_id":
            projects_inout_update_expense_id($id, $new_data);
            break;

        case "value":
            projects_inout_update_value($id, $new_data);
            break;

        case "order_by":
            projects_inout_update_order_by($id, $new_data);
            break;

        case "status":
            projects_inout_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function projects_inout_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `projects_inout` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/projects_inout/functions.php
// and comment here (this function)
function projects_inout_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "project_id":
            //return projects_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "budget_id":
            //return budgets_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "invoice_id":
            //return invoices_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "expense_id":
            //return expenses_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "value":
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
function projects_inout_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `projects_inout` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_project_id($project_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `project_id` FROM `projects_inout` WHERE   `project_id` = ?");
    $req->execute(array($project_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_budget_id($budget_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `budget_id` FROM `projects_inout` WHERE   `budget_id` = ?");
    $req->execute(array($budget_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_invoice_id($invoice_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `invoice_id` FROM `projects_inout` WHERE   `invoice_id` = ?");
    $req->execute(array($invoice_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_expense_id($expense_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `expense_id` FROM `projects_inout` WHERE   `expense_id` = ?");
    $req->execute(array($expense_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_value($value) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value` FROM `projects_inout` WHERE   `value` = ?");
    $req->execute(array($value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `projects_inout` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function projects_inout_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `projects_inout` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function projects_inout_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function projects_inout_is_project_id($project_id) {
    return true;
}

function projects_inout_is_budget_id($budget_id) {
    return true;
}

function projects_inout_is_invoice_id($invoice_id) {
    return true;
}

function projects_inout_is_expense_id($expense_id) {
    return true;
}

function projects_inout_is_value($value) {
    return true;
}

function projects_inout_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function projects_inout_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function projects_inout_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, projects_inout_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function projects_inout_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (projects_inout_is_id($value)) ? true : false;
            break;
        case "project_id":
            $is = (projects_inout_is_project_id($value)) ? true : false;
            break;
        case "budget_id":
            $is = (projects_inout_is_budget_id($value)) ? true : false;
            break;
        case "invoice_id":
            $is = (projects_inout_is_invoice_id($value)) ? true : false;
            break;
        case "expense_id":
            $is = (projects_inout_is_expense_id($value)) ? true : false;
            break;
        case "value":
            $is = (projects_inout_is_value($value)) ? true : false;
            break;
        case "order_by":
            $is = (projects_inout_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (projects_inout_is_status($value)) ? true : false;
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
