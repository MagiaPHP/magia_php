<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:56 


// 
// 
function doc_models_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_models` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_models_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_models` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_models_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_models` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_models_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `description`,  `params`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `doc_models` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_models_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `name`,  `description`,  `params`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`   
    FROM `doc_models` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function doc_models_edit($id ,  $name ,  $description ,  $params ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `name` =:name, `description` =:description, `params` =:params, `author` =:author, `author_email` =:author_email, `url` =:url, `version` =:version, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "name" =>$name ,  
 "description" =>$description ,  
 "params" =>$params ,  
 "author" =>$author ,  
 "author_email" =>$author_email ,  
 "url" =>$url ,  
 "version" =>$version ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function doc_models_add($name ,  $description ,  $params ,  $author ,  $author_email ,  $url ,  $version ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `doc_models` ( `id` ,   `name` ,   `description` ,   `params` ,   `author` ,   `author_email` ,   `url` ,   `version` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :description ,  :params ,  :author ,  :author_email ,  :url ,  :version ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "description" => $description ,  
 "params" => $params ,  
 "author" => $author ,  
 "author_email" => $author_email ,  
 "url" => $url ,  
 "version" => $version ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function doc_models_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `description`,  `params`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`    
            FROM `doc_models` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
OR `description` like :txt
OR `params` like :txt
OR `author` like :txt
OR `author_email` like :txt
OR `url` like :txt
OR `version` like :txt
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

function doc_models_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (doc_models_list() as $key => $value) {
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
function doc_models_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `doc_models` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function doc_models_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `description`,  `params`,  `author`,  `author_email`,  `url`,  `version`,  `order_by`,  `status`    FROM `doc_models` 
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

function doc_models_db_show_col_from_table($c) {
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
function doc_models_db_col_list_from_table($c){
    $list = array();
    foreach (doc_models_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function doc_models_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_params($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `params`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_author($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `author`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_author_email($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `author_email`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_version($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `version`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function doc_models_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            doc_models_update_id($id, $new_data);
            break;

        case "name":
            doc_models_update_name($id, $new_data);
            break;

        case "description":
            doc_models_update_description($id, $new_data);
            break;

        case "params":
            doc_models_update_params($id, $new_data);
            break;

        case "author":
            doc_models_update_author($id, $new_data);
            break;

        case "author_email":
            doc_models_update_author_email($id, $new_data);
            break;

        case "url":
            doc_models_update_url($id, $new_data);
            break;

        case "version":
            doc_models_update_version($id, $new_data);
            break;

        case "order_by":
            doc_models_update_order_by($id, $new_data);
            break;

        case "status":
            doc_models_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function doc_models_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `doc_models` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/doc_models/functions.php
// and comment here (this function)
function doc_models_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "params":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "author":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "author_email":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "url":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "version":
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
function doc_models_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `doc_models` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `doc_models` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `doc_models` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_params($params){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `params` FROM `doc_models` WHERE   `params` = ?");
    $req->execute(array($params));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_author($author){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `author` FROM `doc_models` WHERE   `author` = ?");
    $req->execute(array($author));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_author_email($author_email){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `author_email` FROM `doc_models` WHERE   `author_email` = ?");
    $req->execute(array($author_email));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_url($url){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `doc_models` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_version($version){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `version` FROM `doc_models` WHERE   `version` = ?");
    $req->execute(array($version));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `doc_models` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `doc_models` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function doc_models_is_id($id){
     return (is_id($id) )? true : false ;
}

function doc_models_is_name($name){
     return true;
}

function doc_models_is_description($description){
     return true;
}

function doc_models_is_params($params){
     return true;
}

function doc_models_is_author($author){
     return true;
}

function doc_models_is_author_email($author_email){
     return true;
}

function doc_models_is_url($url){
     return true;
}

function doc_models_is_version($version){
     return true;
}

function doc_models_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function doc_models_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function doc_models_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, doc_models_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function doc_models_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (doc_models_is_id($value)) ? true : false;
            break;
     case "name":
            $is = (doc_models_is_name($value)) ? true : false;
            break;
     case "description":
            $is = (doc_models_is_description($value)) ? true : false;
            break;
     case "params":
            $is = (doc_models_is_params($value)) ? true : false;
            break;
     case "author":
            $is = (doc_models_is_author($value)) ? true : false;
            break;
     case "author_email":
            $is = (doc_models_is_author_email($value)) ? true : false;
            break;
     case "url":
            $is = (doc_models_is_url($value)) ? true : false;
            break;
     case "version":
            $is = (doc_models_is_version($value)) ? true : false;
            break;
     case "order_by":
            $is = (doc_models_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (doc_models_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function doc_models_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=doc_models&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'params':
                echo '<th>' . _tr(ucfirst('params')) . '</th>';
                break;
case 'author':
                echo '<th>' . _tr(ucfirst('author')) . '</th>';
                break;
case 'author_email':
                echo '<th>' . _tr(ucfirst('author_email')) . '</th>';
                break;
case 'url':
                echo '<th>' . _tr(ucfirst('url')) . '</th>';
                break;
case 'version':
                echo '<th>' . _tr(ucfirst('version')) . '</th>';
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

function doc_models_index_generate_column_body_td($doc_models, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=doc_models&a=details&id=' . $doc_models[$col] . '">' . $doc_models[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'params':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'author':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'author_email':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'url':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'version':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=doc_models&a=details&id=' . $doc_models['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=doc_models&a=details_payement&id=' . $doc_models['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_models&a=edit&id=' . $doc_models['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_models&a=ok_delete&id=' . $doc_models['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_models&a=export_pdf&id=' . $doc_models['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_models&a=export_pdf&way=pdf&&id=' . $doc_models['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($doc_models[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
