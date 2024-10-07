<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-31 17:08:56 


// 
// 
function magia_tables_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_tables` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_tables_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_tables` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_tables_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_tables` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_tables_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `controller`,  `action`,  `name`,  `code`,  `order_by`,  `status`   
    FROM `magia_tables` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function magia_tables_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `label`,  `controller`,  `action`,  `name`,  `code`,  `order_by`,  `status`   
    FROM `magia_tables` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function magia_tables_edit($id ,  $label ,  $controller ,  $action ,  $name ,  $code ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `label` =:label, `controller` =:controller, `action` =:action, `name` =:name, `code` =:code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "label" =>$label ,  
 "controller" =>$controller ,  
 "action" =>$action ,  
 "name" =>$name ,  
 "code" =>$code ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function magia_tables_add($label ,  $controller ,  $action ,  $name ,  $code ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `magia_tables` ( `id` ,   `label` ,   `controller` ,   `action` ,   `name` ,   `code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :label ,  :controller ,  :action ,  :name ,  :code ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "label" => $label ,  
 "controller" => $controller ,  
 "action" => $action ,  
 "name" => $name ,  
 "code" => $code ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function magia_tables_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `controller`,  `action`,  `name`,  `code`,  `order_by`,  `status`    
            FROM `magia_tables` 
            WHERE `id` = :txt OR `id` like :txt
OR `label` like :txt
OR `controller` like :txt
OR `action` like :txt
OR `name` like :txt
OR `code` like :txt
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

function magia_tables_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (magia_tables_list() as $key => $value) {
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
function magia_tables_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `magia_tables` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function magia_tables_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `label`,  `controller`,  `action`,  `name`,  `code`,  `order_by`,  `status`    FROM `magia_tables` 
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

function magia_tables_db_show_col_from_table($c) {
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
function magia_tables_db_col_list_from_table($c){
    $list = array();
    foreach (magia_tables_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function magia_tables_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_action($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `action`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_tables_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_tables` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function magia_tables_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            magia_tables_update_id($id, $new_data);
            break;

        case "label":
            magia_tables_update_label($id, $new_data);
            break;

        case "controller":
            magia_tables_update_controller($id, $new_data);
            break;

        case "action":
            magia_tables_update_action($id, $new_data);
            break;

        case "name":
            magia_tables_update_name($id, $new_data);
            break;

        case "code":
            magia_tables_update_code($id, $new_data);
            break;

        case "order_by":
            magia_tables_update_order_by($id, $new_data);
            break;

        case "status":
            magia_tables_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function magia_tables_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `magia_tables` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/magia_tables/functions.php
// and comment here (this function)
function magia_tables_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "controller":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "action":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
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
function magia_tables_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `magia_tables` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `magia_tables` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_controller($controller){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `magia_tables` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_action($action){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `action` FROM `magia_tables` WHERE   `action` = ?");
    $req->execute(array($action));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `magia_tables` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `magia_tables` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `magia_tables` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_tables_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `magia_tables` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function magia_tables_is_id($id){
     return (is_id($id) )? true : false ;
}

function magia_tables_is_label($label){
     return true;
}

function magia_tables_is_controller($controller){
     return true;
}

function magia_tables_is_action($action){
     return true;
}

function magia_tables_is_name($name){
     return true;
}

function magia_tables_is_code($code){
     return true;
}

function magia_tables_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function magia_tables_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function magia_tables_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, magia_tables_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function magia_tables_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (magia_tables_is_id($value)) ? true : false;
            break;
     case "label":
            $is = (magia_tables_is_label($value)) ? true : false;
            break;
     case "controller":
            $is = (magia_tables_is_controller($value)) ? true : false;
            break;
     case "action":
            $is = (magia_tables_is_action($value)) ? true : false;
            break;
     case "name":
            $is = (magia_tables_is_name($value)) ? true : false;
            break;
     case "code":
            $is = (magia_tables_is_code($value)) ? true : false;
            break;
     case "order_by":
            $is = (magia_tables_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (magia_tables_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function magia_tables_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=magia_tables&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'controller':
                echo '<th>' . _tr(ucfirst('controller')) . '</th>';
                break;
case 'action':
                echo '<th>' . _tr(ucfirst('action')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function magia_tables_index_generate_column_body_td($magia_tables, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=magia_tables&a=details&id=' . $magia_tables[$col] . '">' . $magia_tables[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'controller':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'action':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=magia_tables&a=details&id=' . $magia_tables['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=magia_tables&a=details_payement&id=' . $magia_tables['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=magia_tables&a=edit&id=' . $magia_tables['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=magia_tables&a=ok_delete&id=' . $magia_tables['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_tables&a=export_pdf&id=' . $magia_tables['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_tables&a=export_pdf&way=pdf&&id=' . $magia_tables['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($magia_tables[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
