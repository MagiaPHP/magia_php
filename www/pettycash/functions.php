<?php

// plugin = pettycash
// creation date : 2024-05-30
// 
// 
function pettycash_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `pettycash` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `pettycash` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `pettycash` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `description`,  `total`,  `date_registre`,  `order_by`,  `status`   
    FROM `pettycash` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function pettycash_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `date`,  `description`,  `total`,  `date_registre`,  `order_by`,  `status`   
    FROM `pettycash` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function pettycash_edit($id, $date, $description, $total, $date_registre, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `date` =:date, `description` =:description, `total` =:total, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "date" => $date,
        "description" => $description,
        "total" => $total,
        "date_registre" => $date_registre,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function pettycash_add($date, $description, $total, $date_registre, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `pettycash` ( `id` ,   `date` ,   `description` ,   `total` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :date ,  :description ,  :total ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "date" => $date,
        "description" => $description,
        "total" => $total,
        "date_registre" => $date_registre,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function pettycash_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `description`,  `total`,  `date_registre`,  `order_by`,  `status`    
            FROM `pettycash` 
            WHERE `id` = :txt OR `id` like :txt
OR `date` like :txt
OR `description` like :txt
OR `total` like :txt
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

function pettycash_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (pettycash_list() as $key => $value) {
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

function pettycash_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `pettycash` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function pettycash_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `description`,  `total`,  `date_registre`,  `order_by`,  `status`    FROM `pettycash` 
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

function pettycash_db_show_col_from_table($c) {
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
function pettycash_db_col_list_from_table($c) {
    $list = array();
    foreach (pettycash_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function pettycash_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function pettycash_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function pettycash_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function pettycash_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function pettycash_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function pettycash_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function pettycash_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `pettycash` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function pettycash_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            pettycash_update_id($id, $new_data);
            break;

        case "date":
            pettycash_update_date($id, $new_data);
            break;

        case "description":
            pettycash_update_description($id, $new_data);
            break;

        case "total":
            pettycash_update_total($id, $new_data);
            break;

        case "date_registre":
            pettycash_update_date_registre($id, $new_data);
            break;

        case "order_by":
            pettycash_update_order_by($id, $new_data);
            break;

        case "status":
            pettycash_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function pettycash_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `pettycash` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/pettycash/functions.php
// and comment here (this function)
function pettycash_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "total":
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
function pettycash_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `pettycash` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_exists_date($date) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `pettycash` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `pettycash` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_exists_total($total) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `pettycash` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_exists_date_registre($date_registre) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `pettycash` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `pettycash` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function pettycash_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `pettycash` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function pettycash_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function pettycash_is_date($date) {
    return true;
}

function pettycash_is_description($description) {
    return true;
}

function pettycash_is_total($total) {
    return true;
}

function pettycash_is_date_registre($date_registre) {
    return true;
}

function pettycash_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function pettycash_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function pettycash_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, pettycash_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function pettycash_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (pettycash_is_id($value)) ? true : false;
            break;
        case "date":
            $is = (pettycash_is_date($value)) ? true : false;
            break;
        case "description":
            $is = (pettycash_is_description($value)) ? true : false;
            break;
        case "total":
            $is = (pettycash_is_total($value)) ? true : false;
            break;
        case "date_registre":
            $is = (pettycash_is_date_registre($value)) ? true : false;
            break;
        case "order_by":
            $is = (pettycash_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (pettycash_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//

function pettycash_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=pettycash&a=details&id=' . $col_to_show . '">' . $col_to_show . '</a></th>';
                break;

            case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
            case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
            case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
                break;
            case 'date_registre':
                echo '<th>' . _tr(ucfirst('date_registre')) . '</th>';
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

function pettycash_index_generate_column_body_td($pettycash, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=pettycash&a=details&id=' . $pettycash[$col] . '">' . $pettycash[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'date':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'description':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'total':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'date_registre':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=pettycash&a=details&id=' . $pettycash['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=pettycash&a=details_payement&id=' . $pettycash['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=pettycash&a=edit&id=' . $pettycash['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=pettycash&a=export_pdf&id=' . $pettycash['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=pettycash&a=export_pdf&way=pdf&&id=' . $pettycash['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($pettycash[$col]) . '</td>';
                break;
        }
    }
}

//
//        
################################################################################
################################################################################
################################################################################
