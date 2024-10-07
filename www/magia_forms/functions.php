<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-31 17:08:27 


// 
// 
function magia_forms_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_forms` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_forms_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_forms` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_forms_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_forms` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_forms_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `form`,  `order_by`,  `status`   
    FROM `magia_forms` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function magia_forms_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `form`,  `order_by`,  `status`   
    FROM `magia_forms` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function magia_forms_edit($id ,  $form ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_forms` SET `form` =:form, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "form" =>$form ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function magia_forms_add($form ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `magia_forms` ( `id` ,   `form` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :form ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "form" => $form ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function magia_forms_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `form`,  `order_by`,  `status`    
            FROM `magia_forms` 
            WHERE `id` = :txt OR `id` like :txt
OR `form` like :txt
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

function magia_forms_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (magia_forms_list() as $key => $value) {
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
function magia_forms_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `magia_forms` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function magia_forms_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `form`,  `order_by`,  `status`    FROM `magia_forms` 
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

function magia_forms_db_show_col_from_table($c) {
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
function magia_forms_db_col_list_from_table($c){
    $list = array();
    foreach (magia_forms_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function magia_forms_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_forms` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_forms_update_form($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_forms` SET `form`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_forms_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_forms` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_forms_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_forms` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function magia_forms_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            magia_forms_update_id($id, $new_data);
            break;

        case "form":
            magia_forms_update_form($id, $new_data);
            break;

        case "order_by":
            magia_forms_update_order_by($id, $new_data);
            break;

        case "status":
            magia_forms_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function magia_forms_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `magia_forms` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/magia_forms/functions.php
// and comment here (this function)
function magia_forms_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "form":
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
function magia_forms_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `magia_forms` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_forms_exists_form($form){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `form` FROM `magia_forms` WHERE   `form` = ?");
    $req->execute(array($form));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_forms_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `magia_forms` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_forms_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `magia_forms` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function magia_forms_is_id($id){
     return (is_id($id) )? true : false ;
}

function magia_forms_is_form($form){
     return true;
}

function magia_forms_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function magia_forms_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function magia_forms_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, magia_forms_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function magia_forms_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (magia_forms_is_id($value)) ? true : false;
            break;
     case "form":
            $is = (magia_forms_is_form($value)) ? true : false;
            break;
     case "order_by":
            $is = (magia_forms_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (magia_forms_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function magia_forms_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=magia_forms&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'form':
                echo '<th>' . _tr(ucfirst('form')) . '</th>';
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

function magia_forms_index_generate_column_body_td($magia_forms, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=magia_forms&a=details&id=' . $magia_forms[$col] . '">' . $magia_forms[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($magia_forms[$col]) . '</td>';
                break;
case 'form':
                echo '<td>' . ($magia_forms[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($magia_forms[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($magia_forms[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=magia_forms&a=details&id=' . $magia_forms['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=magia_forms&a=details_payement&id=' . $magia_forms['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=magia_forms&a=edit&id=' . $magia_forms['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=magia_forms&a=ok_delete&id=' . $magia_forms['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_forms&a=export_pdf&id=' . $magia_forms['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_forms&a=export_pdf&way=pdf&&id=' . $magia_forms['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($magia_forms[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
