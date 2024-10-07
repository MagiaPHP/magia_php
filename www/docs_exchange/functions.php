<?php
// plugin = docs_exchange
// creation date : 2024-07-31
// 
// 
function docs_exchange_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docs_exchange` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docs_exchange_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docs_exchange` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docs_exchange_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docs_exchange` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docs_exchange_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `reciver_tva`,  `sender_name`,  `label`,  `sender_tva`,  `doc_type`,  `doc_id`,  `json`,  `pdf_base64`,  `date_send`,  `order_by`,  `status`   
    FROM `docs_exchange` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function docs_exchange_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `reciver_tva`,  `sender_name`,  `label`,  `sender_tva`,  `doc_type`,  `doc_id`,  `json`,  `pdf_base64`,  `date_send`,  `order_by`,  `status`   
    FROM `docs_exchange` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function docs_exchange_edit($id ,  $reciver_tva ,  $sender_name ,  $label ,  $sender_tva ,  $doc_type ,  $doc_id ,  $json ,  $pdf_base64 ,  $date_send ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `reciver_tva` =:reciver_tva, `sender_name` =:sender_name, `label` =:label, `sender_tva` =:sender_tva, `doc_type` =:doc_type, `doc_id` =:doc_id, `json` =:json, `pdf_base64` =:pdf_base64, `date_send` =:date_send, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "reciver_tva" =>$reciver_tva ,  
 "sender_name" =>$sender_name ,  
 "label" =>$label ,  
 "sender_tva" =>$sender_tva ,  
 "doc_type" =>$doc_type ,  
 "doc_id" =>$doc_id ,  
 "json" =>$json ,  
 "pdf_base64" =>$pdf_base64 ,  
 "date_send" =>$date_send ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function docs_exchange_add($reciver_tva ,  $sender_name ,  $label ,  $sender_tva ,  $doc_type ,  $doc_id ,  $json ,  $pdf_base64 ,  $date_send ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `docs_exchange` ( `id` ,   `reciver_tva` ,   `sender_name` ,   `label` ,   `sender_tva` ,   `doc_type` ,   `doc_id` ,   `json` ,   `pdf_base64` ,   `date_send` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :reciver_tva ,  :sender_name ,  :label ,  :sender_tva ,  :doc_type ,  :doc_id ,  :json ,  :pdf_base64 ,  :date_send ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "reciver_tva" => $reciver_tva ,  
 "sender_name" => $sender_name ,  
 "label" => $label ,  
 "sender_tva" => $sender_tva ,  
 "doc_type" => $doc_type ,  
 "doc_id" => $doc_id ,  
 "json" => $json ,  
 "pdf_base64" => $pdf_base64 ,  
 "date_send" => $date_send ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function docs_exchange_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `reciver_tva`,  `sender_name`,  `label`,  `sender_tva`,  `doc_type`,  `doc_id`,  `json`,  `pdf_base64`,  `date_send`,  `order_by`,  `status`    
            FROM `docs_exchange` 
            WHERE `id` = :txt OR `id` like :txt
OR `reciver_tva` like :txt
OR `sender_name` like :txt
OR `label` like :txt
OR `sender_tva` like :txt
OR `doc_type` like :txt
OR `doc_id` like :txt
OR `json` like :txt
OR `pdf_base64` like :txt
OR `date_send` like :txt
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

function docs_exchange_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (docs_exchange_list() as $key => $value) {
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
function docs_exchange_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `docs_exchange` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function docs_exchange_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `reciver_tva`,  `sender_name`,  `label`,  `sender_tva`,  `doc_type`,  `doc_id`,  `json`,  `pdf_base64`,  `date_send`,  `order_by`,  `status`    FROM `docs_exchange` 
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

function docs_exchange_db_show_col_from_table($c) {
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
function docs_exchange_db_col_list_from_table($c){
    $list = array();
    foreach (docs_exchange_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function docs_exchange_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_reciver_tva($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `reciver_tva`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_sender_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `sender_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_sender_tva($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `sender_tva`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_doc_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `doc_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_doc_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `doc_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_json($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `json`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_pdf_base64($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `pdf_base64`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_date_send($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `date_send`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docs_exchange_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docs_exchange` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function docs_exchange_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            docs_exchange_update_id($id, $new_data);
            break;

        case "reciver_tva":
            docs_exchange_update_reciver_tva($id, $new_data);
            break;

        case "sender_name":
            docs_exchange_update_sender_name($id, $new_data);
            break;

        case "label":
            docs_exchange_update_label($id, $new_data);
            break;

        case "sender_tva":
            docs_exchange_update_sender_tva($id, $new_data);
            break;

        case "doc_type":
            docs_exchange_update_doc_type($id, $new_data);
            break;

        case "doc_id":
            docs_exchange_update_doc_id($id, $new_data);
            break;

        case "json":
            docs_exchange_update_json($id, $new_data);
            break;

        case "pdf_base64":
            docs_exchange_update_pdf_base64($id, $new_data);
            break;

        case "date_send":
            docs_exchange_update_date_send($id, $new_data);
            break;

        case "order_by":
            docs_exchange_update_order_by($id, $new_data);
            break;

        case "status":
            docs_exchange_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function docs_exchange_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `docs_exchange` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/docs_exchange/functions.php
// and comment here (this function)
function docs_exchange_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "reciver_tva":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_tva":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "doc_type":
            //return controllers_field_id("controller", $value);
            return ($filtre) ?? $value;                
            break; 
        case "doc_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "json":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "pdf_base64":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_send":
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
function docs_exchange_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `docs_exchange` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_reciver_tva($reciver_tva){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `reciver_tva` FROM `docs_exchange` WHERE   `reciver_tva` = ?");
    $req->execute(array($reciver_tva));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_sender_name($sender_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_name` FROM `docs_exchange` WHERE   `sender_name` = ?");
    $req->execute(array($sender_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `docs_exchange` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_sender_tva($sender_tva){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_tva` FROM `docs_exchange` WHERE   `sender_tva` = ?");
    $req->execute(array($sender_tva));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_doc_type($doc_type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `doc_type` FROM `docs_exchange` WHERE   `doc_type` = ?");
    $req->execute(array($doc_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_doc_id($doc_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `doc_id` FROM `docs_exchange` WHERE   `doc_id` = ?");
    $req->execute(array($doc_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_json($json){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `json` FROM `docs_exchange` WHERE   `json` = ?");
    $req->execute(array($json));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_pdf_base64($pdf_base64){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `pdf_base64` FROM `docs_exchange` WHERE   `pdf_base64` = ?");
    $req->execute(array($pdf_base64));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_date_send($date_send){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_send` FROM `docs_exchange` WHERE   `date_send` = ?");
    $req->execute(array($date_send));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `docs_exchange` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docs_exchange_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `docs_exchange` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function docs_exchange_is_id($id){
     return (is_id($id) )? true : false ;
}

function docs_exchange_is_reciver_tva($reciver_tva){
     return true;
}

function docs_exchange_is_sender_name($sender_name){
     return true;
}

function docs_exchange_is_label($label){
     return true;
}

function docs_exchange_is_sender_tva($sender_tva){
     return true;
}

function docs_exchange_is_doc_type($doc_type){
     return true;
}

function docs_exchange_is_doc_id($doc_id){
     return true;
}

function docs_exchange_is_json($json){
     return true;
}

function docs_exchange_is_pdf_base64($pdf_base64){
     return true;
}

function docs_exchange_is_date_send($date_send){
     return true;
}

function docs_exchange_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function docs_exchange_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function docs_exchange_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, docs_exchange_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function docs_exchange_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (docs_exchange_is_id($value)) ? true : false;
            break;
     case "reciver_tva":
            $is = (docs_exchange_is_reciver_tva($value)) ? true : false;
            break;
     case "sender_name":
            $is = (docs_exchange_is_sender_name($value)) ? true : false;
            break;
     case "label":
            $is = (docs_exchange_is_label($value)) ? true : false;
            break;
     case "sender_tva":
            $is = (docs_exchange_is_sender_tva($value)) ? true : false;
            break;
     case "doc_type":
            $is = (docs_exchange_is_doc_type($value)) ? true : false;
            break;
     case "doc_id":
            $is = (docs_exchange_is_doc_id($value)) ? true : false;
            break;
     case "json":
            $is = (docs_exchange_is_json($value)) ? true : false;
            break;
     case "pdf_base64":
            $is = (docs_exchange_is_pdf_base64($value)) ? true : false;
            break;
     case "date_send":
            $is = (docs_exchange_is_date_send($value)) ? true : false;
            break;
     case "order_by":
            $is = (docs_exchange_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (docs_exchange_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function docs_exchange_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=docs_exchange&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'reciver_tva':
                echo '<th>' . _tr(ucfirst('reciver_tva')) . '</th>';
                break;
case 'sender_name':
                echo '<th>' . _tr(ucfirst('sender_name')) . '</th>';
                break;
case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'sender_tva':
                echo '<th>' . _tr(ucfirst('sender_tva')) . '</th>';
                break;
case 'doc_type':
                echo '<th>' . _tr(ucfirst('doc_type')) . '</th>';
                break;
case 'doc_id':
                echo '<th>' . _tr(ucfirst('doc_id')) . '</th>';
                break;
case 'json':
                echo '<th>' . _tr(ucfirst('json')) . '</th>';
                break;
case 'pdf_base64':
                echo '<th>' . _tr(ucfirst('pdf_base64')) . '</th>';
                break;
case 'date_send':
                echo '<th>' . _tr(ucfirst('date_send')) . '</th>';
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

function docs_exchange_index_generate_column_body_td($docs_exchange, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=docs_exchange&a=details&id=' . $docs_exchange[$col] . '">' . $docs_exchange[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'reciver_tva':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'sender_name':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'sender_tva':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'doc_type':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'doc_id':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'json':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'pdf_base64':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'date_send':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=docs_exchange&a=details&id=' . $docs_exchange['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=docs_exchange&a=details_payement&id=' . $docs_exchange['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docs_exchange&a=edit&id=' . $docs_exchange['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docs_exchange&a=ok_delete&id=' . $docs_exchange['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docs_exchange&a=export_pdf&id=' . $docs_exchange['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docs_exchange&a=export_pdf&way=pdf&&id=' . $docs_exchange['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($docs_exchange[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
