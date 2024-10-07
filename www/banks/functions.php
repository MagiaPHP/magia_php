<?php

// plugin = banks
// creation date : 2024-05-27
// 
// 
function banks_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `bank`,  `account_number`,  `bic`,  `iban`,  `code`,  `codification`,  `delimiter`,  `date_format`,  `thousands_separator`,  `decimal_separator`,  `invoices`,  `order_by`,  `status`   
    FROM `banks` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function banks_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `contact_id`,  `bank`,  `account_number`,  `bic`,  `iban`,  `code`,  `codification`,  `delimiter`,  `date_format`,  `thousands_separator`,  `decimal_separator`,  `invoices`,  `order_by`,  `status`   
    FROM `banks` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function banks_edit($id, $contact_id, $bank, $account_number, $bic, $iban, $code, $codification, $delimiter, $date_format, $thousands_separator, $decimal_separator, $invoices, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `contact_id` =:contact_id, `bank` =:bank, `account_number` =:account_number, `bic` =:bic, `iban` =:iban, `code` =:code, `codification` =:codification, `delimiter` =:delimiter, `date_format` =:date_format, `thousands_separator` =:thousands_separator, `decimal_separator` =:decimal_separator, `invoices` =:invoices, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
        "bank" => $bank,
        "account_number" => $account_number,
        "bic" => $bic,
        "iban" => $iban,
        "code" => $code,
        "codification" => $codification,
        "delimiter" => $delimiter,
        "date_format" => $date_format,
        "thousands_separator" => $thousands_separator,
        "decimal_separator" => $decimal_separator,
        "invoices" => $invoices,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function banks_add($contact_id, $bank, $account_number, $bic, $iban, $code, $codification, $delimiter, $date_format, $thousands_separator, $decimal_separator, $invoices, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `banks` ( `id` ,   `contact_id` ,   `bank` ,   `account_number` ,   `bic` ,   `iban` ,   `code` ,   `codification` ,   `delimiter` ,   `date_format` ,   `thousands_separator` ,   `decimal_separator` ,   `invoices` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :bank ,  :account_number ,  :bic ,  :iban ,  :code ,  :codification ,  :delimiter ,  :date_format ,  :thousands_separator ,  :decimal_separator ,  :invoices ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "bank" => $bank,
        "account_number" => $account_number,
        "bic" => $bic,
        "iban" => $iban,
        "code" => $code,
        "codification" => $codification,
        "delimiter" => $delimiter,
        "date_format" => $date_format,
        "thousands_separator" => $thousands_separator,
        "decimal_separator" => $decimal_separator,
        "invoices" => $invoices,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function banks_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `bank`,  `account_number`,  `bic`,  `iban`,  `code`,  `codification`,  `delimiter`,  `date_format`,  `thousands_separator`,  `decimal_separator`,  `invoices`,  `order_by`,  `status`    
            FROM `banks` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `bank` like :txt
OR `account_number` like :txt
OR `bic` like :txt
OR `iban` like :txt
OR `code` like :txt
OR `codification` like :txt
OR `delimiter` like :txt
OR `date_format` like :txt
OR `thousands_separator` like :txt
OR `decimal_separator` like :txt
OR `invoices` like :txt
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

function banks_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (banks_list() as $key => $value) {
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

function banks_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `banks` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function banks_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `bank`,  `account_number`,  `bic`,  `iban`,  `code`,  `codification`,  `delimiter`,  `date_format`,  `thousands_separator`,  `decimal_separator`,  `invoices`,  `order_by`,  `status`    FROM `banks` 
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

function banks_db_show_col_from_table($c) {
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
function banks_db_col_list_from_table($c) {
    $list = array();
    foreach (banks_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function banks_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_bank($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `bank`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_account_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `account_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_bic($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `bic`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_iban($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `iban`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_codification($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `codification`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_delimiter($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `delimiter`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_date_format($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `date_format`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_thousands_separator($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `thousands_separator`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_decimal_separator($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `decimal_separator`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_invoices($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `invoices`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function banks_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function banks_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            banks_update_id($id, $new_data);
            break;

        case "contact_id":
            banks_update_contact_id($id, $new_data);
            break;

        case "bank":
            banks_update_bank($id, $new_data);
            break;

        case "account_number":
            banks_update_account_number($id, $new_data);
            break;

        case "bic":
            banks_update_bic($id, $new_data);
            break;

        case "iban":
            banks_update_iban($id, $new_data);
            break;

        case "code":
            banks_update_code($id, $new_data);
            break;

        case "codification":
            banks_update_codification($id, $new_data);
            break;

        case "delimiter":
            banks_update_delimiter($id, $new_data);
            break;

        case "date_format":
            banks_update_date_format($id, $new_data);
            break;

        case "thousands_separator":
            banks_update_thousands_separator($id, $new_data);
            break;

        case "decimal_separator":
            banks_update_decimal_separator($id, $new_data);
            break;

        case "invoices":
            banks_update_invoices($id, $new_data);
            break;

        case "order_by":
            banks_update_order_by($id, $new_data);
            break;

        case "status":
            banks_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function banks_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `banks` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/banks/functions.php
// and comment here (this function)
function banks_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "bank":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "account_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "bic":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "iban":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "codification":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "delimiter":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date_format":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "thousands_separator":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "decimal_separator":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "invoices":
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
function banks_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `banks` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_contact_id($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `banks` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_bank($bank) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `bank` FROM `banks` WHERE   `bank` = ?");
    $req->execute(array($bank));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_account_number($account_number) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `account_number` FROM `banks` WHERE   `account_number` = ?");
    $req->execute(array($account_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_bic($bic) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `bic` FROM `banks` WHERE   `bic` = ?");
    $req->execute(array($bic));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_iban($iban) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `iban` FROM `banks` WHERE   `iban` = ?");
    $req->execute(array($iban));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `banks` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_codification($codification) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `codification` FROM `banks` WHERE   `codification` = ?");
    $req->execute(array($codification));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_delimiter($delimiter) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `delimiter` FROM `banks` WHERE   `delimiter` = ?");
    $req->execute(array($delimiter));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_date_format($date_format) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_format` FROM `banks` WHERE   `date_format` = ?");
    $req->execute(array($date_format));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_thousands_separator($thousands_separator) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `thousands_separator` FROM `banks` WHERE   `thousands_separator` = ?");
    $req->execute(array($thousands_separator));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_decimal_separator($decimal_separator) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `decimal_separator` FROM `banks` WHERE   `decimal_separator` = ?");
    $req->execute(array($decimal_separator));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_invoices($invoices) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `invoices` FROM `banks` WHERE   `invoices` = ?");
    $req->execute(array($invoices));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `banks` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function banks_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `banks` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function banks_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function banks_is_contact_id($contact_id) {
    return true;
}

function banks_is_bank($bank) {
    return true;
}

function banks_is_account_number($account_number) {
    return true;
}

function banks_is_bic($bic) {
    return true;
}

function banks_is_iban($iban) {
    return true;
}

function banks_is_code($code) {
    return true;
}

function banks_is_codification($codification) {
    return true;
}

function banks_is_delimiter($delimiter) {
    return true;
}

function banks_is_date_format($date_format) {
    return true;
}

function banks_is_thousands_separator($thousands_separator) {
    return true;
}

function banks_is_decimal_separator($decimal_separator) {
    return true;
}

function banks_is_invoices($invoices) {
    return true;
}

function banks_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function banks_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function banks_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, banks_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function banks_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (banks_is_id($value)) ? true : false;
            break;
        case "contact_id":
            $is = (banks_is_contact_id($value)) ? true : false;
            break;
        case "bank":
            $is = (banks_is_bank($value)) ? true : false;
            break;
        case "account_number":
            $is = (banks_is_account_number($value)) ? true : false;
            break;
        case "bic":
            $is = (banks_is_bic($value)) ? true : false;
            break;
        case "iban":
            $is = (banks_is_iban($value)) ? true : false;
            break;
        case "code":
            $is = (banks_is_code($value)) ? true : false;
            break;
        case "codification":
            $is = (banks_is_codification($value)) ? true : false;
            break;
        case "delimiter":
            $is = (banks_is_delimiter($value)) ? true : false;
            break;
        case "date_format":
            $is = (banks_is_date_format($value)) ? true : false;
            break;
        case "thousands_separator":
            $is = (banks_is_thousands_separator($value)) ? true : false;
            break;
        case "decimal_separator":
            $is = (banks_is_decimal_separator($value)) ? true : false;
            break;
        case "invoices":
            $is = (banks_is_invoices($value)) ? true : false;
            break;
        case "order_by":
            $is = (banks_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (banks_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//

function banks_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=banks&a=details&id=' . $col_to_show . '">' . $col_to_show . '</a></th>';
                break;

            case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
            case 'bank':
                echo '<th>' . _tr(ucfirst('bank')) . '</th>';
                break;
            case 'account_number':
                echo '<th>' . _tr(ucfirst('account_number')) . '</th>';
                break;
            case 'bic':
                echo '<th>' . _tr(ucfirst('bic')) . '</th>';
                break;
            case 'iban':
                echo '<th>' . _tr(ucfirst('iban')) . '</th>';
                break;
            case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
            case 'codification':
                echo '<th>' . _tr(ucfirst('codification')) . '</th>';
                break;
            case 'delimiter':
                echo '<th>' . _tr(ucfirst('delimiter')) . '</th>';
                break;
            case 'date_format':
                echo '<th>' . _tr(ucfirst('date_format')) . '</th>';
                break;
            case 'thousands_separator':
                echo '<th>' . _tr(ucfirst('thousands_separator')) . '</th>';
                break;
            case 'decimal_separator':
                echo '<th>' . _tr(ucfirst('decimal_separator')) . '</th>';
                break;
            case 'invoices':
                echo '<th>' . _tr(ucfirst('invoices')) . '</th>';
                break;
            case 'order_by':
                echo '<th>' . _tr(ucfirst('order_by')) . '</th>';
                break;
            case 'status':
                echo '<th>' . _tr(ucfirst('status')) . '</th>';
                break;

            case 'button_details':
            case 'button_pay':
            case 'button_edit':
            case 'button_print':
            case 'button_save':
                echo '<th></th>';
                break;

            default:
                echo '<th>' . _tr(ucfirst($col_to_show)) . '</th>';
                break;
        }
    }
}

function banks_index_generate_column_body_td($banks, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=banks&a=details&id=' . $banks[$col] . '">' . $banks[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'contact_id':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'bank':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'account_number':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'bic':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'iban':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'code':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'codification':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'delimiter':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'date_format':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'thousands_separator':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'decimal_separator':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'invoices':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks&a=details&id=' . $banks['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks&a=details_payement&id=' . $banks['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks&a=edit&id=' . $banks['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks&a=export_pdf&id=' . $banks['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks&a=export_pdf&way=pdf&&id=' . $banks['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($banks[$col]) . '</td>';
                break;
        }
    }
}

//
//        
################################################################################
################################################################################
################################################################################
