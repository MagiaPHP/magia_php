<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:51 


// 
// 
function directory_names_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `directory_names` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function directory_names_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `directory_names` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function directory_names_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `directory_names` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function directory_names_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `order_by`,  `status`   
    FROM `directory_names` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function directory_names_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `name`,  `order_by`,  `status`   
    FROM `directory_names` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function directory_names_edit($id ,  $name ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `directory_names` SET `name` =:name, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "name" =>$name ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function directory_names_add($name ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `directory_names` ( `id` ,   `name` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function directory_names_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `order_by`,  `status`    
            FROM `directory_names` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
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

function directory_names_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (directory_names_list() as $key => $value) {
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
function directory_names_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `directory_names` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function directory_names_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `order_by`,  `status`    FROM `directory_names` 
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

function directory_names_db_show_col_from_table($c) {
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
function directory_names_db_col_list_from_table($c){
    $list = array();
    foreach (directory_names_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function directory_names_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `directory_names` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function directory_names_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `directory_names` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function directory_names_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `directory_names` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function directory_names_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `directory_names` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function directory_names_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            directory_names_update_id($id, $new_data);
            break;

        case "name":
            directory_names_update_name($id, $new_data);
            break;

        case "order_by":
            directory_names_update_order_by($id, $new_data);
            break;

        case "status":
            directory_names_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function directory_names_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `directory_names` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/directory_names/functions.php
// and comment here (this function)
function directory_names_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
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
function directory_names_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `directory_names` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function directory_names_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `directory_names` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function directory_names_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `directory_names` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function directory_names_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `directory_names` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function directory_names_is_id($id){
     return (is_id($id) )? true : false ;
}

function directory_names_is_name($name){
     return true;
}

function directory_names_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function directory_names_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function directory_names_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, directory_names_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function directory_names_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (directory_names_is_id($value)) ? true : false;
            break;
     case "name":
            $is = (directory_names_is_name($value)) ? true : false;
            break;
     case "order_by":
            $is = (directory_names_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (directory_names_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function directory_names_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=directory_names&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
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

function directory_names_index_generate_column_body_td($directory_names, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=directory_names&a=details&id=' . $directory_names[$col] . '">' . $directory_names[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($directory_names[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($directory_names[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($directory_names[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($directory_names[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=directory_names&a=details&id=' . $directory_names['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=directory_names&a=details_payement&id=' . $directory_names['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=directory_names&a=edit&id=' . $directory_names['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=directory_names&a=ok_delete&id=' . $directory_names['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=directory_names&a=export_pdf&id=' . $directory_names['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=directory_names&a=export_pdf&way=pdf&&id=' . $directory_names['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($directory_names[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
