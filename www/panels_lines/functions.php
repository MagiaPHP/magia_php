<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 14:09:33 


// 
// 
function panels_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `panels_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function panels_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `panels_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function panels_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `panels_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function panels_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `panel_id`,  `icon`,  `label`,  `translate`,  `url`,  `badge`,  `controller`,  `action`,  `order_by`,  `status`   
    FROM `panels_lines` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function panels_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `panel_id`,  `icon`,  `label`,  `translate`,  `url`,  `badge`,  `controller`,  `action`,  `order_by`,  `status`   
    FROM `panels_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function panels_lines_edit($id ,  $panel_id ,  $icon ,  $label ,  $translate ,  $url ,  $badge ,  $controller ,  $action ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `panel_id` =:panel_id, `icon` =:icon, `label` =:label, `translate` =:translate, `url` =:url, `badge` =:badge, `controller` =:controller, `action` =:action, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "panel_id" =>$panel_id ,  
 "icon" =>$icon ,  
 "label" =>$label ,  
 "translate" =>$translate ,  
 "url" =>$url ,  
 "badge" =>$badge ,  
 "controller" =>$controller ,  
 "action" =>$action ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function panels_lines_add($panel_id ,  $icon ,  $label ,  $translate ,  $url ,  $badge ,  $controller ,  $action ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `panels_lines` ( `id` ,   `panel_id` ,   `icon` ,   `label` ,   `translate` ,   `url` ,   `badge` ,   `controller` ,   `action` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :panel_id ,  :icon ,  :label ,  :translate ,  :url ,  :badge ,  :controller ,  :action ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "panel_id" => $panel_id ,  
 "icon" => $icon ,  
 "label" => $label ,  
 "translate" => $translate ,  
 "url" => $url ,  
 "badge" => $badge ,  
 "controller" => $controller ,  
 "action" => $action ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function panels_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `panel_id`,  `icon`,  `label`,  `translate`,  `url`,  `badge`,  `controller`,  `action`,  `order_by`,  `status`    
            FROM `panels_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `panel_id` like :txt
OR `icon` like :txt
OR `label` like :txt
OR `translate` like :txt
OR `url` like :txt
OR `badge` like :txt
OR `controller` like :txt
OR `action` like :txt
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

function panels_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (panels_lines_list() as $key => $value) {
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
function panels_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `panels_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function panels_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `panel_id`,  `icon`,  `label`,  `translate`,  `url`,  `badge`,  `controller`,  `action`,  `order_by`,  `status`    FROM `panels_lines` 
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

function panels_lines_db_show_col_from_table($c) {
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
function panels_lines_db_col_list_from_table($c){
    $list = array();
    foreach (panels_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function panels_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_panel_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `panel_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_translate($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `translate`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_badge($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `badge`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_action($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `action`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function panels_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `panels_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function panels_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            panels_lines_update_id($id, $new_data);
            break;

        case "panel_id":
            panels_lines_update_panel_id($id, $new_data);
            break;

        case "icon":
            panels_lines_update_icon($id, $new_data);
            break;

        case "label":
            panels_lines_update_label($id, $new_data);
            break;

        case "translate":
            panels_lines_update_translate($id, $new_data);
            break;

        case "url":
            panels_lines_update_url($id, $new_data);
            break;

        case "badge":
            panels_lines_update_badge($id, $new_data);
            break;

        case "controller":
            panels_lines_update_controller($id, $new_data);
            break;

        case "action":
            panels_lines_update_action($id, $new_data);
            break;

        case "order_by":
            panels_lines_update_order_by($id, $new_data);
            break;

        case "status":
            panels_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function panels_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `panels_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/panels_lines/functions.php
// and comment here (this function)
function panels_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "panel_id":
            //return panels_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "icon":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "translate":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "url":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "badge":
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
function panels_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `panels_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_panel_id($panel_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `panel_id` FROM `panels_lines` WHERE   `panel_id` = ?");
    $req->execute(array($panel_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_icon($icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `panels_lines` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `panels_lines` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_translate($translate){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `translate` FROM `panels_lines` WHERE   `translate` = ?");
    $req->execute(array($translate));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_url($url){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `panels_lines` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_badge($badge){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `badge` FROM `panels_lines` WHERE   `badge` = ?");
    $req->execute(array($badge));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_controller($controller){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `panels_lines` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_action($action){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `action` FROM `panels_lines` WHERE   `action` = ?");
    $req->execute(array($action));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `panels_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function panels_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `panels_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function panels_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function panels_lines_is_panel_id($panel_id){
     return true;
}

function panels_lines_is_icon($icon){
     return true;
}

function panels_lines_is_label($label){
     return true;
}

function panels_lines_is_translate($translate){
     return true;
}

function panels_lines_is_url($url){
     return true;
}

function panels_lines_is_badge($badge){
     return true;
}

function panels_lines_is_controller($controller){
     return true;
}

function panels_lines_is_action($action){
     return true;
}

function panels_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function panels_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function panels_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, panels_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function panels_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (panels_lines_is_id($value)) ? true : false;
            break;
     case "panel_id":
            $is = (panels_lines_is_panel_id($value)) ? true : false;
            break;
     case "icon":
            $is = (panels_lines_is_icon($value)) ? true : false;
            break;
     case "label":
            $is = (panels_lines_is_label($value)) ? true : false;
            break;
     case "translate":
            $is = (panels_lines_is_translate($value)) ? true : false;
            break;
     case "url":
            $is = (panels_lines_is_url($value)) ? true : false;
            break;
     case "badge":
            $is = (panels_lines_is_badge($value)) ? true : false;
            break;
     case "controller":
            $is = (panels_lines_is_controller($value)) ? true : false;
            break;
     case "action":
            $is = (panels_lines_is_action($value)) ? true : false;
            break;
     case "order_by":
            $is = (panels_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (panels_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function panels_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=panels_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'panel_id':
                echo '<th>' . _tr(ucfirst('panel_id')) . '</th>';
                break;
case 'icon':
                echo '<th>' . _tr(ucfirst('icon')) . '</th>';
                break;
case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'translate':
                echo '<th>' . _tr(ucfirst('translate')) . '</th>';
                break;
case 'url':
                echo '<th>' . _tr(ucfirst('url')) . '</th>';
                break;
case 'badge':
                echo '<th>' . _tr(ucfirst('badge')) . '</th>';
                break;
case 'controller':
                echo '<th>' . _tr(ucfirst('controller')) . '</th>';
                break;
case 'action':
                echo '<th>' . _tr(ucfirst('action')) . '</th>';
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

function panels_lines_index_generate_column_body_td($panels_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=panels_lines&a=details&id=' . $panels_lines[$col] . '">' . $panels_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'panel_id':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'icon':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'translate':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'url':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'badge':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'controller':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'action':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=panels_lines&a=details&id=' . $panels_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=panels_lines&a=details_payement&id=' . $panels_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=panels_lines&a=edit&id=' . $panels_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=panels_lines&a=ok_delete&id=' . $panels_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=panels_lines&a=export_pdf&id=' . $panels_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=panels_lines&a=export_pdf&way=pdf&&id=' . $panels_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($panels_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
