<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:12 


// 
// 
function expenses_categories_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_categories` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_categories_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_categories` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_categories_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_categories` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_categories_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `father_code`,  `category`,  `description`,  `order_by`,  `status`   
    FROM `expenses_categories` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function expenses_categories_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `code`,  `father_code`,  `category`,  `description`,  `order_by`,  `status`   
    FROM `expenses_categories` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function expenses_categories_edit($id ,  $code ,  $father_code ,  $category ,  $description ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `code` =:code, `father_code` =:father_code, `category` =:category, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "code" =>$code ,  
 "father_code" =>$father_code ,  
 "category" =>$category ,  
 "description" =>$description ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function expenses_categories_add($code ,  $father_code ,  $category ,  $description ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses_categories` ( `id` ,   `code` ,   `father_code` ,   `category` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :father_code ,  :category ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "code" => $code ,  
 "father_code" => $father_code ,  
 "category" => $category ,  
 "description" => $description ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function expenses_categories_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `father_code`,  `category`,  `description`,  `order_by`,  `status`    
            FROM `expenses_categories` 
            WHERE `id` = :txt OR `id` like :txt
OR `code` like :txt
OR `father_code` like :txt
OR `category` like :txt
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

function expenses_categories_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (expenses_categories_list() as $key => $value) {
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
function expenses_categories_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `expenses_categories` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function expenses_categories_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `code`,  `father_code`,  `category`,  `description`,  `order_by`,  `status`    FROM `expenses_categories` 
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

function expenses_categories_db_show_col_from_table($c) {
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
function expenses_categories_db_col_list_from_table($c){
    $list = array();
    foreach (expenses_categories_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function expenses_categories_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_categories_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_categories_update_father_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `father_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_categories_update_category($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `category`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_categories_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_categories_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_categories_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_categories` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function expenses_categories_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            expenses_categories_update_id($id, $new_data);
            break;

        case "code":
            expenses_categories_update_code($id, $new_data);
            break;

        case "father_code":
            expenses_categories_update_father_code($id, $new_data);
            break;

        case "category":
            expenses_categories_update_category($id, $new_data);
            break;

        case "description":
            expenses_categories_update_description($id, $new_data);
            break;

        case "order_by":
            expenses_categories_update_order_by($id, $new_data);
            break;

        case "status":
            expenses_categories_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function expenses_categories_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `expenses_categories` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/expenses_categories/functions.php
// and comment here (this function)
function expenses_categories_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "father_code":
            //return expenses_categories_field_id("code", $value);
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
function expenses_categories_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `expenses_categories` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_categories_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `expenses_categories` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_categories_exists_father_code($father_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `father_code` FROM `expenses_categories` WHERE   `father_code` = ?");
    $req->execute(array($father_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_categories_exists_category($category){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category` FROM `expenses_categories` WHERE   `category` = ?");
    $req->execute(array($category));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_categories_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `expenses_categories` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_categories_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `expenses_categories` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_categories_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `expenses_categories` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function expenses_categories_is_id($id){
     return (is_id($id) )? true : false ;
}

function expenses_categories_is_code($code){
     return true;
}

function expenses_categories_is_father_code($father_code){
     return true;
}

function expenses_categories_is_category($category){
     return true;
}

function expenses_categories_is_description($description){
     return true;
}

function expenses_categories_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function expenses_categories_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function expenses_categories_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, expenses_categories_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function expenses_categories_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (expenses_categories_is_id($value)) ? true : false;
            break;
     case "code":
            $is = (expenses_categories_is_code($value)) ? true : false;
            break;
     case "father_code":
            $is = (expenses_categories_is_father_code($value)) ? true : false;
            break;
     case "category":
            $is = (expenses_categories_is_category($value)) ? true : false;
            break;
     case "description":
            $is = (expenses_categories_is_description($value)) ? true : false;
            break;
     case "order_by":
            $is = (expenses_categories_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (expenses_categories_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function expenses_categories_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=expenses_categories&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'father_code':
                echo '<th>' . _tr(ucfirst('father_code')) . '</th>';
                break;
case 'category':
                echo '<th>' . _tr(ucfirst('category')) . '</th>';
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

function expenses_categories_index_generate_column_body_td($expenses_categories, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=expenses_categories&a=details&id=' . $expenses_categories[$col] . '">' . $expenses_categories[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
case 'father_code':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
case 'category':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=expenses_categories&a=details&id=' . $expenses_categories['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=expenses_categories&a=details_payement&id=' . $expenses_categories['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_categories&a=edit&id=' . $expenses_categories['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_categories&a=ok_delete&id=' . $expenses_categories['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_categories&a=export_pdf&id=' . $expenses_categories['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_categories&a=export_pdf&way=pdf&&id=' . $expenses_categories['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($expenses_categories[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
