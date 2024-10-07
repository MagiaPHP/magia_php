<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:26 


// 
// 
function emails_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `emails` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function emails_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `emails` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function emails_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `emails` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function emails_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `father_id`,  `sender_id`,  `reciver_id`,  `folder`,  `subjet`,  `message`,  `date_registre`,  `date_read`,  `order_by`,  `status`   
    FROM `emails` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function emails_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `father_id`,  `sender_id`,  `reciver_id`,  `folder`,  `subjet`,  `message`,  `date_registre`,  `date_read`,  `order_by`,  `status`   
    FROM `emails` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function emails_edit($id ,  $father_id ,  $sender_id ,  $reciver_id ,  $folder ,  $subjet ,  $message ,  $date_registre ,  $date_read ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `father_id` =:father_id, `sender_id` =:sender_id, `reciver_id` =:reciver_id, `folder` =:folder, `subjet` =:subjet, `message` =:message, `date_registre` =:date_registre, `date_read` =:date_read, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "father_id" =>$father_id ,  
 "sender_id" =>$sender_id ,  
 "reciver_id" =>$reciver_id ,  
 "folder" =>$folder ,  
 "subjet" =>$subjet ,  
 "message" =>$message ,  
 "date_registre" =>$date_registre ,  
 "date_read" =>$date_read ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function emails_add($father_id ,  $sender_id ,  $reciver_id ,  $folder ,  $subjet ,  $message ,  $date_registre ,  $date_read ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `emails` ( `id` ,   `father_id` ,   `sender_id` ,   `reciver_id` ,   `folder` ,   `subjet` ,   `message` ,   `date_registre` ,   `date_read` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :father_id ,  :sender_id ,  :reciver_id ,  :folder ,  :subjet ,  :message ,  :date_registre ,  :date_read ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "father_id" => $father_id ,  
 "sender_id" => $sender_id ,  
 "reciver_id" => $reciver_id ,  
 "folder" => $folder ,  
 "subjet" => $subjet ,  
 "message" => $message ,  
 "date_registre" => $date_registre ,  
 "date_read" => $date_read ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function emails_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `father_id`,  `sender_id`,  `reciver_id`,  `folder`,  `subjet`,  `message`,  `date_registre`,  `date_read`,  `order_by`,  `status`    
            FROM `emails` 
            WHERE `id` = :txt OR `id` like :txt
OR `father_id` like :txt
OR `sender_id` like :txt
OR `reciver_id` like :txt
OR `folder` like :txt
OR `subjet` like :txt
OR `message` like :txt
OR `date_registre` like :txt
OR `date_read` like :txt
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

function emails_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (emails_list() as $key => $value) {
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
function emails_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `emails` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function emails_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `father_id`,  `sender_id`,  `reciver_id`,  `folder`,  `subjet`,  `message`,  `date_registre`,  `date_read`,  `order_by`,  `status`    FROM `emails` 
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

function emails_db_show_col_from_table($c) {
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
function emails_db_col_list_from_table($c){
    $list = array();
    foreach (emails_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function emails_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_father_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `father_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_sender_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `sender_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_reciver_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `reciver_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_folder($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `folder`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_subjet($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `subjet`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_message($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `message`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_date_read($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `date_read`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function emails_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `emails` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function emails_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            emails_update_id($id, $new_data);
            break;

        case "father_id":
            emails_update_father_id($id, $new_data);
            break;

        case "sender_id":
            emails_update_sender_id($id, $new_data);
            break;

        case "reciver_id":
            emails_update_reciver_id($id, $new_data);
            break;

        case "folder":
            emails_update_folder($id, $new_data);
            break;

        case "subjet":
            emails_update_subjet($id, $new_data);
            break;

        case "message":
            emails_update_message($id, $new_data);
            break;

        case "date_registre":
            emails_update_date_registre($id, $new_data);
            break;

        case "date_read":
            emails_update_date_read($id, $new_data);
            break;

        case "order_by":
            emails_update_order_by($id, $new_data);
            break;

        case "status":
            emails_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function emails_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `emails` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/emails/functions.php
// and comment here (this function)
function emails_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "father_id":
            //return emails_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "reciver_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "folder":
            //return emails_folders_field_id("folder", $value);
            return ($filtre) ?? $value;                
            break; 
        case "subjet":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "message":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_registre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_read":
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
function emails_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `emails` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_father_id($father_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `father_id` FROM `emails` WHERE   `father_id` = ?");
    $req->execute(array($father_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_sender_id($sender_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_id` FROM `emails` WHERE   `sender_id` = ?");
    $req->execute(array($sender_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_reciver_id($reciver_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `reciver_id` FROM `emails` WHERE   `reciver_id` = ?");
    $req->execute(array($reciver_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_folder($folder){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `folder` FROM `emails` WHERE   `folder` = ?");
    $req->execute(array($folder));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_subjet($subjet){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `subjet` FROM `emails` WHERE   `subjet` = ?");
    $req->execute(array($subjet));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_message($message){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `message` FROM `emails` WHERE   `message` = ?");
    $req->execute(array($message));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `emails` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_date_read($date_read){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_read` FROM `emails` WHERE   `date_read` = ?");
    $req->execute(array($date_read));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `emails` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function emails_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `emails` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function emails_is_id($id){
     return (is_id($id) )? true : false ;
}

function emails_is_father_id($father_id){
     return true;
}

function emails_is_sender_id($sender_id){
     return true;
}

function emails_is_reciver_id($reciver_id){
     return true;
}

function emails_is_folder($folder){
     return true;
}

function emails_is_subjet($subjet){
     return true;
}

function emails_is_message($message){
     return true;
}

function emails_is_date_registre($date_registre){
     return true;
}

function emails_is_date_read($date_read){
     return true;
}

function emails_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function emails_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function emails_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, emails_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function emails_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (emails_is_id($value)) ? true : false;
            break;
     case "father_id":
            $is = (emails_is_father_id($value)) ? true : false;
            break;
     case "sender_id":
            $is = (emails_is_sender_id($value)) ? true : false;
            break;
     case "reciver_id":
            $is = (emails_is_reciver_id($value)) ? true : false;
            break;
     case "folder":
            $is = (emails_is_folder($value)) ? true : false;
            break;
     case "subjet":
            $is = (emails_is_subjet($value)) ? true : false;
            break;
     case "message":
            $is = (emails_is_message($value)) ? true : false;
            break;
     case "date_registre":
            $is = (emails_is_date_registre($value)) ? true : false;
            break;
     case "date_read":
            $is = (emails_is_date_read($value)) ? true : false;
            break;
     case "order_by":
            $is = (emails_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (emails_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function emails_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=emails&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'father_id':
                echo '<th>' . _tr(ucfirst('father_id')) . '</th>';
                break;
case 'sender_id':
                echo '<th>' . _tr(ucfirst('sender_id')) . '</th>';
                break;
case 'reciver_id':
                echo '<th>' . _tr(ucfirst('reciver_id')) . '</th>';
                break;
case 'folder':
                echo '<th>' . _tr(ucfirst('folder')) . '</th>';
                break;
case 'subjet':
                echo '<th>' . _tr(ucfirst('subjet')) . '</th>';
                break;
case 'message':
                echo '<th>' . _tr(ucfirst('message')) . '</th>';
                break;
case 'date_registre':
                echo '<th>' . _tr(ucfirst('date_registre')) . '</th>';
                break;
case 'date_read':
                echo '<th>' . _tr(ucfirst('date_read')) . '</th>';
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

function emails_index_generate_column_body_td($emails, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=emails&a=details&id=' . $emails[$col] . '">' . $emails[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'father_id':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'sender_id':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'reciver_id':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'folder':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'subjet':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'message':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'date_read':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($emails[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=emails&a=details&id=' . $emails['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=emails&a=details_payement&id=' . $emails['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=emails&a=edit&id=' . $emails['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=emails&a=ok_delete&id=' . $emails['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=emails&a=export_pdf&id=' . $emails['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=emails&a=export_pdf&way=pdf&&id=' . $emails['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($emails[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
