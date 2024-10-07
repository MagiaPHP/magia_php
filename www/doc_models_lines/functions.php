<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:01 


// 
// 
function doc_models_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_models_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_models_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_models_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_models_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `doc_models_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function doc_models_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `modele`,  `doc`,  `section`,  `element`,  `name`,  `params`,  `order_by`,  `status`   
    FROM `doc_models_lines` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function doc_models_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `modele`,  `doc`,  `section`,  `element`,  `name`,  `params`,  `order_by`,  `status`   
    FROM `doc_models_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function doc_models_lines_edit($id ,  $modele ,  $doc ,  $section ,  $element ,  $name ,  $params ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `modele` =:modele, `doc` =:doc, `section` =:section, `element` =:element, `name` =:name, `params` =:params, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "modele" =>$modele ,  
 "doc" =>$doc ,  
 "section" =>$section ,  
 "element" =>$element ,  
 "name" =>$name ,  
 "params" =>$params ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function doc_models_lines_add($modele ,  $doc ,  $section ,  $element ,  $name ,  $params ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `doc_models_lines` ( `id` ,   `modele` ,   `doc` ,   `section` ,   `element` ,   `name` ,   `params` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :modele ,  :doc ,  :section ,  :element ,  :name ,  :params ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "modele" => $modele ,  
 "doc" => $doc ,  
 "section" => $section ,  
 "element" => $element ,  
 "name" => $name ,  
 "params" => $params ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function doc_models_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `modele`,  `doc`,  `section`,  `element`,  `name`,  `params`,  `order_by`,  `status`    
            FROM `doc_models_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `modele` like :txt
OR `doc` like :txt
OR `section` like :txt
OR `element` like :txt
OR `name` like :txt
OR `params` like :txt
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

function doc_models_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (doc_models_lines_list() as $key => $value) {
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
function doc_models_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `doc_models_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function doc_models_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `modele`,  `doc`,  `section`,  `element`,  `name`,  `params`,  `order_by`,  `status`    FROM `doc_models_lines` 
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

function doc_models_lines_db_show_col_from_table($c) {
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
function doc_models_lines_db_col_list_from_table($c){
    $list = array();
    foreach (doc_models_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function doc_models_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_modele($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `modele`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_doc($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `doc`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_section($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `section`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_element($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `element`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_params($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `params`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function doc_models_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `doc_models_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function doc_models_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            doc_models_lines_update_id($id, $new_data);
            break;

        case "modele":
            doc_models_lines_update_modele($id, $new_data);
            break;

        case "doc":
            doc_models_lines_update_doc($id, $new_data);
            break;

        case "section":
            doc_models_lines_update_section($id, $new_data);
            break;

        case "element":
            doc_models_lines_update_element($id, $new_data);
            break;

        case "name":
            doc_models_lines_update_name($id, $new_data);
            break;

        case "params":
            doc_models_lines_update_params($id, $new_data);
            break;

        case "order_by":
            doc_models_lines_update_order_by($id, $new_data);
            break;

        case "status":
            doc_models_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function doc_models_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `doc_models_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/doc_models_lines/functions.php
// and comment here (this function)
function doc_models_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "modele":
            //return doc_models_field_id("name", $value);
            return ($filtre) ?? $value;                
            break; 
        case "doc":
            //return doc_docs_field_id("doc", $value);
            return ($filtre) ?? $value;                
            break; 
        case "section":
            //return doc_sections_field_id("section", $value);
            return ($filtre) ?? $value;                
            break; 
        case "element":
            //return doc_elements_field_id("element", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "params":
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
function doc_models_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `doc_models_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_modele($modele){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `modele` FROM `doc_models_lines` WHERE   `modele` = ?");
    $req->execute(array($modele));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_doc($doc){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `doc` FROM `doc_models_lines` WHERE   `doc` = ?");
    $req->execute(array($doc));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_section($section){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `section` FROM `doc_models_lines` WHERE   `section` = ?");
    $req->execute(array($section));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_element($element){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `element` FROM `doc_models_lines` WHERE   `element` = ?");
    $req->execute(array($element));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `doc_models_lines` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_params($params){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `params` FROM `doc_models_lines` WHERE   `params` = ?");
    $req->execute(array($params));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `doc_models_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function doc_models_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `doc_models_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function doc_models_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function doc_models_lines_is_modele($modele){
     return true;
}

function doc_models_lines_is_doc($doc){
     return true;
}

function doc_models_lines_is_section($section){
     return true;
}

function doc_models_lines_is_element($element){
     return true;
}

function doc_models_lines_is_name($name){
     return true;
}

function doc_models_lines_is_params($params){
     return true;
}

function doc_models_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function doc_models_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function doc_models_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, doc_models_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function doc_models_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (doc_models_lines_is_id($value)) ? true : false;
            break;
     case "modele":
            $is = (doc_models_lines_is_modele($value)) ? true : false;
            break;
     case "doc":
            $is = (doc_models_lines_is_doc($value)) ? true : false;
            break;
     case "section":
            $is = (doc_models_lines_is_section($value)) ? true : false;
            break;
     case "element":
            $is = (doc_models_lines_is_element($value)) ? true : false;
            break;
     case "name":
            $is = (doc_models_lines_is_name($value)) ? true : false;
            break;
     case "params":
            $is = (doc_models_lines_is_params($value)) ? true : false;
            break;
     case "order_by":
            $is = (doc_models_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (doc_models_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function doc_models_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=doc_models_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'modele':
                echo '<th>' . _tr(ucfirst('modele')) . '</th>';
                break;
case 'doc':
                echo '<th>' . _tr(ucfirst('doc')) . '</th>';
                break;
case 'section':
                echo '<th>' . _tr(ucfirst('section')) . '</th>';
                break;
case 'element':
                echo '<th>' . _tr(ucfirst('element')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'params':
                echo '<th>' . _tr(ucfirst('params')) . '</th>';
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

function doc_models_lines_index_generate_column_body_td($doc_models_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=doc_models_lines&a=details&id=' . $doc_models_lines[$col] . '">' . $doc_models_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'modele':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'doc':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'section':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'element':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'params':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=doc_models_lines&a=details&id=' . $doc_models_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=doc_models_lines&a=details_payement&id=' . $doc_models_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_models_lines&a=edit&id=' . $doc_models_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=doc_models_lines&a=ok_delete&id=' . $doc_models_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_models_lines&a=export_pdf&id=' . $doc_models_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=doc_models_lines&a=export_pdf&way=pdf&&id=' . $doc_models_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($doc_models_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
