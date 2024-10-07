<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:31 


// 
// 
function expenses_references_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_references` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_references_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_references` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_references_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_references` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_references_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `expense_id`,  `name`,  `description`,  `order_by`,  `status`   
    FROM `expenses_references` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function expenses_references_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `expense_id`,  `name`,  `description`,  `order_by`,  `status`   
    FROM `expenses_references` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function expenses_references_edit($id ,  $expense_id ,  $name ,  $description ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `expense_id` =:expense_id, `name` =:name, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "expense_id" =>$expense_id ,  
 "name" =>$name ,  
 "description" =>$description ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function expenses_references_add($expense_id ,  $name ,  $description ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses_references` ( `id` ,   `expense_id` ,   `name` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :expense_id ,  :name ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "expense_id" => $expense_id ,  
 "name" => $name ,  
 "description" => $description ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function expenses_references_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `expense_id`,  `name`,  `description`,  `order_by`,  `status`    
            FROM `expenses_references` 
            WHERE `id` = :txt OR `id` like :txt
OR `expense_id` like :txt
OR `name` like :txt
OR `description` like :txt
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

function expenses_references_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (expenses_references_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";        
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";        
        $val = ""; 
        foreach ($values_to_show as $val_to_show) {
            $val = $val . " " . $value[$val_to_show] ;  
        }              
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($val) . "</option>";
    }
    echo $c;     
}
function expenses_references_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `expenses_references` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function expenses_references_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `expense_id`,  `name`,  `description`,  `order_by`,  `status`    FROM `expenses_references` 
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

function expenses_references_db_show_col_from_table($c) {
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
function expenses_references_db_col_list_from_table($c){
    $list = array();
    foreach (expenses_references_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function expenses_references_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_references_update_expense_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `expense_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_references_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_references_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_references_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_references_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_references` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function expenses_references_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            expenses_references_update_id($id, $new_data);
            break;

        case "expense_id":
            expenses_references_update_expense_id($id, $new_data);
            break;

        case "name":
            expenses_references_update_name($id, $new_data);
            break;

        case "description":
            expenses_references_update_description($id, $new_data);
            break;

        case "order_by":
            expenses_references_update_order_by($id, $new_data);
            break;

        case "status":
            expenses_references_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function expenses_references_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `expenses_references` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/expenses_references/functions.php
// and comment here (this function)
function expenses_references_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "expense_id":
            //return expenses_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
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
function expenses_references_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `expenses_references` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_references_exists_expense_id($expense_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `expense_id` FROM `expenses_references` WHERE   `expense_id` = ?");
    $req->execute(array($expense_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_references_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `expenses_references` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_references_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `expenses_references` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_references_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `expenses_references` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_references_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `expenses_references` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function expenses_references_is_id($id){
     return (is_id($id) )? true : false ;
}

function expenses_references_is_expense_id($expense_id){
     return true;
}

function expenses_references_is_name($name){
     return true;
}

function expenses_references_is_description($description){
     return true;
}

function expenses_references_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function expenses_references_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function expenses_references_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, expenses_references_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function expenses_references_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (expenses_references_is_id($value)) ? true : false;
            break;
     case "expense_id":
            $is = (expenses_references_is_expense_id($value)) ? true : false;
            break;
     case "name":
            $is = (expenses_references_is_name($value)) ? true : false;
            break;
     case "description":
            $is = (expenses_references_is_description($value)) ? true : false;
            break;
     case "order_by":
            $is = (expenses_references_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (expenses_references_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function expenses_references_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=expenses_references&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'expense_id':
                echo '<th>' . _tr(ucfirst('expense_id')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
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

function expenses_references_index_generate_column_body_td($expenses_references, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=expenses_references&a=details&id=' . $expenses_references[$col] . '">' . $expenses_references[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
case 'expense_id':
                echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=expenses_references&a=details&id=' . $expenses_references['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=expenses_references&a=details_payement&id=' . $expenses_references['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_references&a=edit&id=' . $expenses_references['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_references&a=ok_delete&id=' . $expenses_references['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_references&a=export_pdf&id=' . $expenses_references['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_references&a=export_pdf&way=pdf&&id=' . $expenses_references['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($expenses_references[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
