<?php

// plugin = reminders_invoices
// creation date : 2024-02-07
// 
// 
function reminders_invoices_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `reminders_invoices` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `reminders_invoices` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `reminders_invoices` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date_registre`,  `invoice_id`,  `invoice_solde`,  `reminder`,  `reminder_percent`,  `invoice_to_add_id`,  `order_by`,  `status`   
    FROM `reminders_invoices` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function reminders_invoices_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `date_registre`,  `invoice_id`,  `invoice_solde`,  `reminder`,  `reminder_percent`,  `invoice_to_add_id`,  `order_by`,  `status`   
    FROM `reminders_invoices` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function reminders_invoices_edit($id, $date_registre, $invoice_id, $invoice_solde, $reminder, $reminder_percent, $invoice_to_add_id, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `date_registre` =:date_registre, `invoice_id` =:invoice_id, `invoice_solde` =:invoice_solde, `reminder` =:reminder, `reminder_percent` =:reminder_percent, `invoice_to_add_id` =:invoice_to_add_id, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "date_registre" => $date_registre,
        "invoice_id" => $invoice_id,
        "invoice_solde" => $invoice_solde,
        "reminder" => $reminder,
        "reminder_percent" => $reminder_percent,
        "invoice_to_add_id" => $invoice_to_add_id,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function reminders_invoices_add($date_registre, $invoice_id, $invoice_solde, $reminder, $reminder_percent, $invoice_to_add_id, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `reminders_invoices` ( `id` ,   `date_registre` ,   `invoice_id` ,   `invoice_solde` ,   `reminder` ,   `reminder_percent` ,   `invoice_to_add_id` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :date_registre ,  :invoice_id ,  :invoice_solde ,  :reminder ,  :reminder_percent ,  :invoice_to_add_id ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "date_registre" => $date_registre,
        "invoice_id" => $invoice_id,
        "invoice_solde" => $invoice_solde,
        "reminder" => $reminder,
        "reminder_percent" => $reminder_percent,
        "invoice_to_add_id" => $invoice_to_add_id,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function reminders_invoices_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date_registre`,  `invoice_id`,  `invoice_solde`,  `reminder`,  `reminder_percent`,  `invoice_to_add_id`,  `order_by`,  `status`    
            FROM `reminders_invoices` 
            WHERE `id` = :txt OR `id` like :txt
OR `date_registre` like :txt
OR `invoice_id` like :txt
OR `invoice_solde` like :txt
OR `reminder` like :txt
OR `reminder_percent` like :txt
OR `invoice_to_add_id` like :txt
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

function reminders_invoices_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (reminders_invoices_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function reminders_invoices_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `reminders_invoices` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function reminders_invoices_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date_registre`,  `invoice_id`,  `invoice_solde`,  `reminder`,  `reminder_percent`,  `invoice_to_add_id`,  `order_by`,  `status`    FROM `reminders_invoices` 
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

function reminders_invoices_db_show_col_from_table($c) {
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
function reminders_invoices_db_col_list_from_table($c) {
    $list = array();
    foreach (reminders_invoices_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function reminders_invoices_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_invoice_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `invoice_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_invoice_solde($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `invoice_solde`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_reminder($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `reminder`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_reminder_percent($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `reminder_percent`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_invoice_to_add_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `invoice_to_add_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function reminders_invoices_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `reminders_invoices` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function reminders_invoices_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            reminders_invoices_update_id($id, $new_data);
            break;

        case "date_registre":
            reminders_invoices_update_date_registre($id, $new_data);
            break;

        case "invoice_id":
            reminders_invoices_update_invoice_id($id, $new_data);
            break;

        case "invoice_solde":
            reminders_invoices_update_invoice_solde($id, $new_data);
            break;

        case "reminder":
            reminders_invoices_update_reminder($id, $new_data);
            break;

        case "reminder_percent":
            reminders_invoices_update_reminder_percent($id, $new_data);
            break;

        case "invoice_to_add_id":
            reminders_invoices_update_invoice_to_add_id($id, $new_data);
            break;

        case "order_by":
            reminders_invoices_update_order_by($id, $new_data);
            break;

        case "status":
            reminders_invoices_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function reminders_invoices_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `reminders_invoices` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/reminders_invoices/functions.php
// and comment here (this function)
function reminders_invoices_add_filter($col_name, $value) {

    switch ($col_name) {


        default:
            return $value;
            break;
    }
}

//
//
//
function reminders_invoices_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `reminders_invoices` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_date_registre($date_registre) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `reminders_invoices` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_invoice_id($invoice_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `invoice_id` FROM `reminders_invoices` WHERE   `invoice_id` = ?");
    $req->execute(array($invoice_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_invoice_solde($invoice_solde) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `invoice_solde` FROM `reminders_invoices` WHERE   `invoice_solde` = ?");
    $req->execute(array($invoice_solde));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_reminder($reminder) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `reminder` FROM `reminders_invoices` WHERE   `reminder` = ?");
    $req->execute(array($reminder));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_reminder_percent($reminder_percent) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `reminder_percent` FROM `reminders_invoices` WHERE   `reminder_percent` = ?");
    $req->execute(array($reminder_percent));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_invoice_to_add_id($invoice_to_add_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `invoice_to_add_id` FROM `reminders_invoices` WHERE   `invoice_to_add_id` = ?");
    $req->execute(array($invoice_to_add_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `reminders_invoices` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function reminders_invoices_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `reminders_invoices` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function reminders_invoices_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function reminders_invoices_is_date_registre($date_registre) {
    return true;
}

function reminders_invoices_is_invoice_id($invoice_id) {
    return true;
}

function reminders_invoices_is_invoice_solde($invoice_solde) {
    return true;
}

function reminders_invoices_is_reminder($reminder) {
    return true;
}

function reminders_invoices_is_reminder_percent($reminder_percent) {
    return true;
}

function reminders_invoices_is_invoice_to_add_id($invoice_to_add_id) {
    return true;
}

function reminders_invoices_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function reminders_invoices_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function reminders_invoices_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, reminders_invoices_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function reminders_invoices_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (reminders_invoices_is_id($value)) ? true : false;
            break;
        case "date_registre":
            $is = (reminders_invoices_is_date_registre($value)) ? true : false;
            break;
        case "invoice_id":
            $is = (reminders_invoices_is_invoice_id($value)) ? true : false;
            break;
        case "invoice_solde":
            $is = (reminders_invoices_is_invoice_solde($value)) ? true : false;
            break;
        case "reminder":
            $is = (reminders_invoices_is_reminder($value)) ? true : false;
            break;
        case "reminder_percent":
            $is = (reminders_invoices_is_reminder_percent($value)) ? true : false;
            break;
        case "invoice_to_add_id":
            $is = (reminders_invoices_is_invoice_to_add_id($value)) ? true : false;
            break;
        case "order_by":
            $is = (reminders_invoices_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (reminders_invoices_is_status($value)) ? true : false;
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
