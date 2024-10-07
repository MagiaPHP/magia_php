<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:23 


// 
// 
function expenses_frecuencies_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_frecuencies` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_frecuencies_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_frecuencies` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_frecuencies_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses_frecuencies` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_frecuencies_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `frecuency`,  `order_by`,  `status`   
    FROM `expenses_frecuencies` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function expenses_frecuencies_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `frecuency`,  `order_by`,  `status`   
    FROM `expenses_frecuencies` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function expenses_frecuencies_edit($id ,  $frecuency ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_frecuencies` SET `frecuency` =:frecuency, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "frecuency" =>$frecuency ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function expenses_frecuencies_add($frecuency ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses_frecuencies` ( `id` ,   `frecuency` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :frecuency ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "frecuency" => $frecuency ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function expenses_frecuencies_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `frecuency`,  `order_by`,  `status`    
            FROM `expenses_frecuencies` 
            WHERE `id` = :txt OR `id` like :txt
OR `frecuency` like :txt
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

function expenses_frecuencies_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (expenses_frecuencies_list() as $key => $value) {
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
function expenses_frecuencies_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `expenses_frecuencies` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function expenses_frecuencies_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `frecuency`,  `order_by`,  `status`    FROM `expenses_frecuencies` 
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

function expenses_frecuencies_db_show_col_from_table($c) {
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
function expenses_frecuencies_db_col_list_from_table($c){
    $list = array();
    foreach (expenses_frecuencies_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function expenses_frecuencies_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_frecuencies` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_frecuencies_update_frecuency($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_frecuencies` SET `frecuency`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_frecuencies_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_frecuencies` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_frecuencies_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses_frecuencies` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function expenses_frecuencies_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            expenses_frecuencies_update_id($id, $new_data);
            break;

        case "frecuency":
            expenses_frecuencies_update_frecuency($id, $new_data);
            break;

        case "order_by":
            expenses_frecuencies_update_order_by($id, $new_data);
            break;

        case "status":
            expenses_frecuencies_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function expenses_frecuencies_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `expenses_frecuencies` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/expenses_frecuencies/functions.php
// and comment here (this function)
function expenses_frecuencies_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "frecuency":
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
function expenses_frecuencies_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `expenses_frecuencies` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_frecuencies_exists_frecuency($frecuency){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `frecuency` FROM `expenses_frecuencies` WHERE   `frecuency` = ?");
    $req->execute(array($frecuency));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_frecuencies_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `expenses_frecuencies` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_frecuencies_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `expenses_frecuencies` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function expenses_frecuencies_is_id($id){
     return (is_id($id) )? true : false ;
}

function expenses_frecuencies_is_frecuency($frecuency){
     return true;
}

function expenses_frecuencies_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function expenses_frecuencies_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function expenses_frecuencies_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, expenses_frecuencies_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function expenses_frecuencies_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (expenses_frecuencies_is_id($value)) ? true : false;
            break;
     case "frecuency":
            $is = (expenses_frecuencies_is_frecuency($value)) ? true : false;
            break;
     case "order_by":
            $is = (expenses_frecuencies_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (expenses_frecuencies_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function expenses_frecuencies_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=expenses_frecuencies&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'frecuency':
                echo '<th>' . _tr(ucfirst('frecuency')) . '</th>';
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

function expenses_frecuencies_index_generate_column_body_td($expenses_frecuencies, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=expenses_frecuencies&a=details&id=' . $expenses_frecuencies[$col] . '">' . $expenses_frecuencies[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($expenses_frecuencies[$col]) . '</td>';
                break;
case 'frecuency':
                echo '<td>' . ($expenses_frecuencies[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($expenses_frecuencies[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($expenses_frecuencies[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=expenses_frecuencies&a=details&id=' . $expenses_frecuencies['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=expenses_frecuencies&a=details_payement&id=' . $expenses_frecuencies['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_frecuencies&a=edit&id=' . $expenses_frecuencies['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses_frecuencies&a=ok_delete&id=' . $expenses_frecuencies['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_frecuencies&a=export_pdf&id=' . $expenses_frecuencies['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses_frecuencies&a=export_pdf&way=pdf&&id=' . $expenses_frecuencies['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($expenses_frecuencies[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
