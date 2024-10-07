<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 14:09:29 


// 
// 
function panels_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `panels` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function panels_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `panels` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function panels_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `panels` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function panels_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `controller`,  `action`,  `name`,  `panel`,  `order_by`,  `status`   
    FROM `panels` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function panels_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `controller`,  `action`,  `name`,  `panel`,  `order_by`,  `status`   
    FROM `panels` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function panels_edit($id ,  $controller ,  $action ,  $name ,  $panel ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `controller` =:controller, `action` =:action, `name` =:name, `panel` =:panel, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "controller" =>$controller ,  
 "action" =>$action ,  
 "name" =>$name ,  
 "panel" =>$panel ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function panels_add($controller ,  $action ,  $name ,  $panel ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `panels` ( `id` ,   `controller` ,   `action` ,   `name` ,   `panel` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :controller ,  :action ,  :name ,  :panel ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "controller" => $controller ,  
 "action" => $action ,  
 "name" => $name ,  
 "panel" => $panel ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function panels_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `controller`,  `action`,  `name`,  `panel`,  `order_by`,  `status`    
            FROM `panels` 
            WHERE `id` = :txt OR `id` like :txt
OR `controller` like :txt
OR `action` like :txt
OR `name` like :txt
OR `panel` like :txt
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

function panels_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (panels_list() as $key => $value) {
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
function panels_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `panels` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function panels_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `controller`,  `action`,  `name`,  `panel`,  `order_by`,  `status`    FROM `panels` 
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

function panels_db_show_col_from_table($c) {
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
function panels_db_col_list_from_table($c){
    $list = array();
    foreach (panels_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function panels_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_update_action($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `action`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_update_panel($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `panel`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function panels_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            panels_update_id($id, $new_data);
            break;

        case "controller":
            panels_update_controller($id, $new_data);
            break;

        case "action":
            panels_update_action($id, $new_data);
            break;

        case "name":
            panels_update_name($id, $new_data);
            break;

        case "panel":
            panels_update_panel($id, $new_data);
            break;

        case "order_by":
            panels_update_order_by($id, $new_data);
            break;

        case "status":
            panels_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function panels_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `panels` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/panels/functions.php
// and comment here (this function)
function panels_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "controller":
            //return controllers_field_id("controller", $value);
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
        case "panel":
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
function panels_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `panels` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_exists_controller($controller){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `panels` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_exists_action($action){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `action` FROM `panels` WHERE   `action` = ?");
    $req->execute(array($action));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `panels` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_exists_panel($panel){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `panel` FROM `panels` WHERE   `panel` = ?");
    $req->execute(array($panel));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `panels` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `panels` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function panels_is_id($id){
     return (is_id($id) )? true : false ;
}

function panels_is_controller($controller){
     return true;
}

function panels_is_action($action){
     return true;
}

function panels_is_name($name){
     return true;
}

function panels_is_panel($panel){
     return true;
}

function panels_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function panels_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function panels_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, panels_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function panels_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (panels_is_id($value)) ? true : false;
            break;
     case "controller":
            $is = (panels_is_controller($value)) ? true : false;
            break;
     case "action":
            $is = (panels_is_action($value)) ? true : false;
            break;
     case "name":
            $is = (panels_is_name($value)) ? true : false;
            break;
     case "panel":
            $is = (panels_is_panel($value)) ? true : false;
            break;
     case "order_by":
            $is = (panels_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (panels_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function panels_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=panels&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
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
case 'panel':
                echo '<th>' . _tr(ucfirst('panel')) . '</th>';
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

function panels_index_generate_column_body_td($panels, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=panels&a=details&id=' . $panels[$col] . '">' . $panels[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
case 'controller':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
case 'action':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
case 'panel':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($panels[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=panels&a=details&id=' . $panels['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=panels&a=details_payement&id=' . $panels['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=panels&a=edit&id=' . $panels['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=panels&a=ok_delete&id=' . $panels['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=panels&a=export_pdf&id=' . $panels['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=panels&a=export_pdf&way=pdf&&id=' . $panels['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($panels[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
