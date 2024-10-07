<?php

# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:28 

// 
// 
function expenses_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `expense_id`,  `budget_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`   
    FROM `expenses_lines` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function expenses_lines_details($id) {
    global $db;
    $req = $db->prepare(
            "
    SELECT `id`,  `expense_id`,  `budget_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`   
    FROM `expenses_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

function expenses_lines_edit($id, $expense_id, $budget_id, $category_code, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `expense_id` =:expense_id, `budget_id` =:budget_id, `category_code` =:category_code, `code` =:code, `quantity` =:quantity, `description` =:description, `price` =:price, `discounts` =:discounts, `discounts_mode` =:discounts_mode, `tax` =:tax, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
        "id" => $id,
        "expense_id" => $expense_id,
        "budget_id" => $budget_id,
        "category_code" => $category_code,
        "code" => $code,
        "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "discounts" => $discounts,
        "discounts_mode" => $discounts_mode,
        "tax" => $tax,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function expenses_lines_add($expense_id, $budget_id, $category_code, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses_lines` ( `id` ,   `expense_id` ,   `budget_id` ,   `category_code` ,   `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :expense_id ,  :budget_id ,  :category_code ,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "expense_id" => $expense_id,
        "budget_id" => $budget_id,
        "category_code" => $category_code,
        "code" => $code,
        "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "discounts" => $discounts,
        "discounts_mode" => $discounts_mode,
        "tax" => $tax,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function expenses_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `expense_id`,  `budget_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`    
            FROM `expenses_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `expense_id` like :txt
OR `budget_id` like :txt
OR `category_code` like :txt
OR `code` like :txt
OR `quantity` like :txt
OR `description` like :txt
OR `price` like :txt
OR `discounts` like :txt
OR `discounts_mode` like :txt
OR `tax` like :txt
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

function expenses_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (expenses_lines_list() as $key => $value) {
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

function expenses_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `expenses_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function expenses_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `expense_id`,  `budget_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`    FROM `expenses_lines` 
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

function expenses_lines_db_show_col_from_table($c) {
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
function expenses_lines_db_col_list_from_table($c) {
    $list = array();
    foreach (expenses_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
//
function expenses_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_expense_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `expense_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_budget_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `budget_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_category_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `category_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_quantity($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `quantity`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_price($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `price`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_discounts($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `discounts`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_discounts_mode($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `discounts_mode`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_tax($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `tax`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
function expenses_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

//
//
function expenses_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            expenses_lines_update_id($id, $new_data);
            break;

        case "expense_id":
            expenses_lines_update_expense_id($id, $new_data);
            break;

        case "budget_id":
            expenses_lines_update_budget_id($id, $new_data);
            break;

        case "category_code":
            expenses_lines_update_category_code($id, $new_data);
            break;

        case "code":
            expenses_lines_update_code($id, $new_data);
            break;

        case "quantity":
            expenses_lines_update_quantity($id, $new_data);
            break;

        case "description":
            expenses_lines_update_description($id, $new_data);
            break;

        case "price":
            expenses_lines_update_price($id, $new_data);
            break;

        case "discounts":
            expenses_lines_update_discounts($id, $new_data);
            break;

        case "discounts_mode":
            expenses_lines_update_discounts_mode($id, $new_data);
            break;

        case "tax":
            expenses_lines_update_tax($id, $new_data);
            break;

        case "order_by":
            expenses_lines_update_order_by($id, $new_data);
            break;

        case "status":
            expenses_lines_update_status($id, $new_data);
            break;

        default:
            break;
    }
}

//
function expenses_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `expenses_lines` WHERE `id` =? ");
    $req->execute(array($id));
}

//
// To modify this function
// Copy tis function in /www_extended/expenses_lines/functions.php
// and comment here (this function)
function expenses_lines_add_filter($col_name, $value, $filtre = NULL) {

    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "expense_id":
            //return expenses_field_id("id", $value);
            return ($filtre) ?? $value;
            break;
        case "budget_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "category_code":
            //return expenses_categories_field_id("code", $value);
            return ($filtre) ?? $value;
            break;
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "quantity":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "price":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "discounts":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "discounts_mode":
            //return _field_id("", $value);
            return ($filtre) ?? $value;
            break;
        case "tax":
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
function expenses_lines_exists_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `expenses_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_expense_id($expense_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `expense_id` FROM `expenses_lines` WHERE   `expense_id` = ?");
    $req->execute(array($expense_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_budget_id($budget_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `budget_id` FROM `expenses_lines` WHERE   `budget_id` = ?");
    $req->execute(array($budget_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_category_code($category_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category_code` FROM `expenses_lines` WHERE   `category_code` = ?");
    $req->execute(array($category_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_code($code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `expenses_lines` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_quantity($quantity) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `quantity` FROM `expenses_lines` WHERE   `quantity` = ?");
    $req->execute(array($quantity));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_description($description) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `expenses_lines` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_price($price) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `price` FROM `expenses_lines` WHERE   `price` = ?");
    $req->execute(array($price));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_discounts($discounts) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `discounts` FROM `expenses_lines` WHERE   `discounts` = ?");
    $req->execute(array($discounts));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_discounts_mode($discounts_mode) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `discounts_mode` FROM `expenses_lines` WHERE   `discounts_mode` = ?");
    $req->execute(array($discounts_mode));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_tax($tax) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax` FROM `expenses_lines` WHERE   `tax` = ?");
    $req->execute(array($tax));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_order_by($order_by) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `expenses_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_lines_exists_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `expenses_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//        
//        
//    

function expenses_lines_is_id($id) {
    return (is_id($id) ) ? true : false;
}

function expenses_lines_is_expense_id($expense_id) {
    return true;
}

function expenses_lines_is_budget_id($budget_id) {
    return true;
}

function expenses_lines_is_category_code($category_code) {
    return true;
}

function expenses_lines_is_code($code) {
    return true;
}

function expenses_lines_is_quantity($quantity) {
    return true;
}

function expenses_lines_is_description($description) {
    return true;
}

function expenses_lines_is_price($price) {
    return true;
}

function expenses_lines_is_discounts($discounts) {
    return true;
}

function expenses_lines_is_discounts_mode($discounts_mode) {
    return true;
}

function expenses_lines_is_tax($tax) {
    return true;
}

function expenses_lines_is_order_by($order_by) {
    return (is_order_by($order_by) ) ? true : false;
}

function expenses_lines_is_status($status) {
    return (is_status($status) ) ? true : false;
}

//
//
function expenses_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, expenses_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}

//
//
//
function expenses_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
        case "id":
            $is = (expenses_lines_is_id($value)) ? true : false;
            break;
        case "expense_id":
            $is = (expenses_lines_is_expense_id($value)) ? true : false;
            break;
        case "budget_id":
            $is = (expenses_lines_is_budget_id($value)) ? true : false;
            break;
        case "category_code":
            $is = (expenses_lines_is_category_code($value)) ? true : false;
            break;
        case "code":
            $is = (expenses_lines_is_code($value)) ? true : false;
            break;
        case "quantity":
            $is = (expenses_lines_is_quantity($value)) ? true : false;
            break;
        case "description":
            $is = (expenses_lines_is_description($value)) ? true : false;
            break;
        case "price":
            $is = (expenses_lines_is_price($value)) ? true : false;
            break;
        case "discounts":
            $is = (expenses_lines_is_discounts($value)) ? true : false;
            break;
        case "discounts_mode":
            $is = (expenses_lines_is_discounts_mode($value)) ? true : false;
            break;
        case "tax":
            $is = (expenses_lines_is_tax($value)) ? true : false;
            break;
        case "order_by":
            $is = (expenses_lines_is_order_by($value)) ? true : false;
            break;
        case "status":
            $is = (expenses_lines_is_status($value)) ? true : false;
            break;

        default:
            $is = false;
            break;
    }

    return $is;
}

//

function expenses_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=expenses_lines&a=details&id=' . $col_to_show . '">' . $col_to_show . '</a></th>';
                break;

            case 'expense_id':
                echo '<th>' . _tr(ucfirst('expense_id')) . '</th>';
                break;
            case 'budget_id':
                echo '<th>' . _tr(ucfirst('budget_id')) . '</th>';
                break;
            case 'category_code':
                echo '<th>' . _tr(ucfirst('category_code')) . '</th>';
                break;
            case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
            case 'quantity':
                echo '<th>' . _tr(ucfirst('quantity')) . '</th>';
                break;
            case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
            case 'price':
                echo '<th>' . _tr(ucfirst('price')) . '</th>';
                break;
            case 'discounts':
                echo '<th>' . _tr(ucfirst('discounts')) . '</th>';
                break;
            case 'discounts_mode':
                echo '<th>' . _tr(ucfirst('discounts_mode')) . '</th>';
                break;
            case 'tax':
                echo '<th>' . _tr(ucfirst('tax')) . '</th>';
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
            case 'modal_edit':
            case 'button_delete':
            case 'modal_delete':
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

function expenses_lines_index_generate_column_body_td($expenses_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=expenses_lines&a=details&id=' . $expenses_lines[$col] . '">' . $expenses_lines[$col] . '</a></td>';
                break;

            case 'id':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'expense_id':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'budget_id':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'category_code':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'code':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'quantity':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'description':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'price':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'discounts':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'discounts_mode':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'tax':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'order_by':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'status':
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=expenses_lines&a=details&id=' . $expenses_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=expenses_lines&a=details_payement&id=' . $expenses_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_lines&a=edit&id=' . $expenses_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_lines&a=ok_delete&id=' . $expenses_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_lines&a=export_pdf&id=' . $expenses_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_lines&a=export_pdf&way=pdf&&id=' . $expenses_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

            default:
                echo '<td>' . ($expenses_lines[$col]) . '</td>';
                break;
        }
    }
}

//
//        
################################################################################
################################################################################
################################################################################
