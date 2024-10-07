<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:31 


// 
// 
function emails_folders_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `emails_folders` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function emails_folders_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `emails_folders` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function emails_folders_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `emails_folders` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function emails_folders_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `folder`,  `icon`,  `order_by`,  `status`   
    FROM `emails_folders` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function emails_folders_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `folder`,  `icon`,  `order_by`,  `status`   
    FROM `emails_folders` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function emails_folders_edit($id ,  $contact_id ,  $folder ,  $icon ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `contact_id` =:contact_id, `folder` =:folder, `icon` =:icon, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "folder" =>$folder ,  
 "icon" =>$icon ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function emails_folders_add($contact_id ,  $folder ,  $icon ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `emails_folders` ( `id` ,   `contact_id` ,   `folder` ,   `icon` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :folder ,  :icon ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "folder" => $folder ,  
 "icon" => $icon ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function emails_folders_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `folder`,  `icon`,  `order_by`,  `status`    
            FROM `emails_folders` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `folder` like :txt
OR `icon` like :txt
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

function emails_folders_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (emails_folders_list() as $key => $value) {
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
function emails_folders_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `emails_folders` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function emails_folders_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `contact_id`,  `folder`,  `icon`,  `order_by`,  `status`    FROM `emails_folders` 
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

function emails_folders_db_show_col_from_table($c) {
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
function emails_folders_db_col_list_from_table($c){
    $list = array();
    foreach (emails_folders_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function emails_folders_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_folders_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_folders_update_folder($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `folder`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_folders_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_folders_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_folders_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails_folders` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function emails_folders_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            emails_folders_update_id($id, $new_data);
            break;

        case "contact_id":
            emails_folders_update_contact_id($id, $new_data);
            break;

        case "folder":
            emails_folders_update_folder($id, $new_data);
            break;

        case "icon":
            emails_folders_update_icon($id, $new_data);
            break;

        case "order_by":
            emails_folders_update_order_by($id, $new_data);
            break;

        case "status":
            emails_folders_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function emails_folders_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `emails_folders` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/emails_folders/functions.php
// and comment here (this function)
function emails_folders_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "folder":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "icon":
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
function emails_folders_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `emails_folders` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_folders_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `emails_folders` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_folders_exists_folder($folder){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `folder` FROM `emails_folders` WHERE   `folder` = ?");
    $req->execute(array($folder));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_folders_exists_icon($icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `emails_folders` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_folders_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `emails_folders` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_folders_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `emails_folders` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function emails_folders_is_id($id){
     return (is_id($id) )? true : false ;
}

function emails_folders_is_contact_id($contact_id){
     return true;
}

function emails_folders_is_folder($folder){
     return true;
}

function emails_folders_is_icon($icon){
     return true;
}

function emails_folders_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function emails_folders_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function emails_folders_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, emails_folders_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function emails_folders_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (emails_folders_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (emails_folders_is_contact_id($value)) ? true : false;
            break;
     case "folder":
            $is = (emails_folders_is_folder($value)) ? true : false;
            break;
     case "icon":
            $is = (emails_folders_is_icon($value)) ? true : false;
            break;
     case "order_by":
            $is = (emails_folders_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (emails_folders_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function emails_folders_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=emails_folders&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'folder':
                echo '<th>' . _tr(ucfirst('folder')) . '</th>';
                break;
case 'icon':
                echo '<th>' . _tr(ucfirst('icon')) . '</th>';
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

function emails_folders_index_generate_column_body_td($emails_folders, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=emails_folders&a=details&id=' . $emails_folders[$col] . '">' . $emails_folders[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
case 'folder':
                echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
case 'icon':
                echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=emails_folders&a=details&id=' . $emails_folders['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=emails_folders&a=details_payement&id=' . $emails_folders['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=emails_folders&a=edit&id=' . $emails_folders['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=emails_folders&a=ok_delete&id=' . $emails_folders['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=emails_folders&a=export_pdf&id=' . $emails_folders['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=emails_folders&a=export_pdf&way=pdf&&id=' . $emails_folders['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($emails_folders[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
