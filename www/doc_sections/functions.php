<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:03 


// 
// 
function doc_sections_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_sections` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_sections_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_sections` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_sections_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_sections` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_sections_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section`,  `open`,  `items`,  `order_by`,  `status`   
    FROM `doc_sections` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_sections_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `section`,  `open`,  `items`,  `order_by`,  `status`   
    FROM `doc_sections` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function doc_sections_edit($id ,  $section ,  $open ,  $items ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `section` =:section, `open` =:open, `items` =:items, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "section" =>$section ,  
 "open" =>$open ,  
 "items" =>$items ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function doc_sections_add($section ,  $open ,  $items ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `doc_sections` ( `id` ,   `section` ,   `open` ,   `items` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :section ,  :open ,  :items ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "section" => $section ,  
 "open" => $open ,  
 "items" => $items ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function doc_sections_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section`,  `open`,  `items`,  `order_by`,  `status`    
            FROM `doc_sections` 
            WHERE `id` = :txt OR `id` like :txt
OR `section` like :txt
OR `open` like :txt
OR `items` like :txt
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

function doc_sections_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (doc_sections_list() as $key => $value) {
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
function doc_sections_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `doc_sections` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function doc_sections_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `section`,  `open`,  `items`,  `order_by`,  `status`    FROM `doc_sections` 
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

function doc_sections_db_show_col_from_table($c) {
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
function doc_sections_db_col_list_from_table($c){
    $list = array();
    foreach (doc_sections_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function doc_sections_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_sections_update_section($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `section`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_sections_update_open($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `open`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_sections_update_items($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `items`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_sections_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_sections_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_sections` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function doc_sections_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            doc_sections_update_id($id, $new_data);
            break;

        case "section":
            doc_sections_update_section($id, $new_data);
            break;

        case "open":
            doc_sections_update_open($id, $new_data);
            break;

        case "items":
            doc_sections_update_items($id, $new_data);
            break;

        case "order_by":
            doc_sections_update_order_by($id, $new_data);
            break;

        case "status":
            doc_sections_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function doc_sections_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `doc_sections` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/doc_sections/functions.php
// and comment here (this function)
function doc_sections_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "section":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "open":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "items":
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
function doc_sections_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `doc_sections` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_sections_exists_section($section){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `section` FROM `doc_sections` WHERE   `section` = ?");
    $req->execute(array($section));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_sections_exists_open($open){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `open` FROM `doc_sections` WHERE   `open` = ?");
    $req->execute(array($open));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_sections_exists_items($items){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `items` FROM `doc_sections` WHERE   `items` = ?");
    $req->execute(array($items));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_sections_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `doc_sections` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_sections_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `doc_sections` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function doc_sections_is_id($id){
     return (is_id($id) )? true : false ;
}

function doc_sections_is_section($section){
     return true;
}

function doc_sections_is_open($open){
     return true;
}

function doc_sections_is_items($items){
     return true;
}

function doc_sections_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function doc_sections_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function doc_sections_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, doc_sections_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function doc_sections_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (doc_sections_is_id($value)) ? true : false;
            break;
     case "section":
            $is = (doc_sections_is_section($value)) ? true : false;
            break;
     case "open":
            $is = (doc_sections_is_open($value)) ? true : false;
            break;
     case "items":
            $is = (doc_sections_is_items($value)) ? true : false;
            break;
     case "order_by":
            $is = (doc_sections_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (doc_sections_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function doc_sections_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=doc_sections&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'section':
                echo '<th>' . _tr(ucfirst('section')) . '</th>';
                break;
case 'open':
                echo '<th>' . _tr(ucfirst('open')) . '</th>';
                break;
case 'items':
                echo '<th>' . _tr(ucfirst('items')) . '</th>';
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

function doc_sections_index_generate_column_body_td($doc_sections, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=doc_sections&a=details&id=' . $doc_sections[$col] . '">' . $doc_sections[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
case 'section':
                echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
case 'open':
                echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
case 'items':
                echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=doc_sections&a=details&id=' . $doc_sections['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=doc_sections&a=details_payement&id=' . $doc_sections['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_sections&a=edit&id=' . $doc_sections['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_sections&a=ok_delete&id=' . $doc_sections['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_sections&a=export_pdf&id=' . $doc_sections['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_sections&a=export_pdf&way=pdf&&id=' . $doc_sections['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($doc_sections[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
