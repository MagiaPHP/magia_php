<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-31 17:08:04 


// 
// 
function magia_table_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_table_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_table_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_table_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_table_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `magia_table_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function magia_table_lines_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `table_id`,  `header_icon`,  `header_pre_label`,  `header_label`,  `header_url`,  `header_post_label`,  `body_icon`,  `body_pre_label`,  `body_label`,  `body_post_label`,  `footer_icon`,  `footer_pre_label`,  `footer_label`,  `footer_post_label`,  `description`,  `permission`,  `align`,  `show`,  `translate`,  `order_by`,  `status`   
    FROM `magia_table_lines` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function magia_table_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `table_id`,  `header_icon`,  `header_pre_label`,  `header_label`,  `header_url`,  `header_post_label`,  `body_icon`,  `body_pre_label`,  `body_label`,  `body_post_label`,  `footer_icon`,  `footer_pre_label`,  `footer_label`,  `footer_post_label`,  `description`,  `permission`,  `align`,  `show`,  `translate`,  `order_by`,  `status`   
    FROM `magia_table_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function magia_table_lines_edit($id ,  $table_id ,  $header_icon ,  $header_pre_label ,  $header_label ,  $header_url ,  $header_post_label ,  $body_icon ,  $body_pre_label ,  $body_label ,  $body_post_label ,  $footer_icon ,  $footer_pre_label ,  $footer_label ,  $footer_post_label ,  $description ,  $permission ,  $align ,  $show ,  $translate ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `table_id` =:table_id, `header_icon` =:header_icon, `header_pre_label` =:header_pre_label, `header_label` =:header_label, `header_url` =:header_url, `header_post_label` =:header_post_label, `body_icon` =:body_icon, `body_pre_label` =:body_pre_label, `body_label` =:body_label, `body_post_label` =:body_post_label, `footer_icon` =:footer_icon, `footer_pre_label` =:footer_pre_label, `footer_label` =:footer_label, `footer_post_label` =:footer_post_label, `description` =:description, `permission` =:permission, `align` =:align, `show` =:show, `translate` =:translate, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "table_id" =>$table_id ,  
 "header_icon" =>$header_icon ,  
 "header_pre_label" =>$header_pre_label ,  
 "header_label" =>$header_label ,  
 "header_url" =>$header_url ,  
 "header_post_label" =>$header_post_label ,  
 "body_icon" =>$body_icon ,  
 "body_pre_label" =>$body_pre_label ,  
 "body_label" =>$body_label ,  
 "body_post_label" =>$body_post_label ,  
 "footer_icon" =>$footer_icon ,  
 "footer_pre_label" =>$footer_pre_label ,  
 "footer_label" =>$footer_label ,  
 "footer_post_label" =>$footer_post_label ,  
 "description" =>$description ,  
 "permission" =>$permission ,  
 "align" =>$align ,  
 "show" =>$show ,  
 "translate" =>$translate ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function magia_table_lines_add($table_id ,  $header_icon ,  $header_pre_label ,  $header_label ,  $header_url ,  $header_post_label ,  $body_icon ,  $body_pre_label ,  $body_label ,  $body_post_label ,  $footer_icon ,  $footer_pre_label ,  $footer_label ,  $footer_post_label ,  $description ,  $permission ,  $align ,  $show ,  $translate ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `magia_table_lines` ( `id` ,   `table_id` ,   `header_icon` ,   `header_pre_label` ,   `header_label` ,   `header_url` ,   `header_post_label` ,   `body_icon` ,   `body_pre_label` ,   `body_label` ,   `body_post_label` ,   `footer_icon` ,   `footer_pre_label` ,   `footer_label` ,   `footer_post_label` ,   `description` ,   `permission` ,   `align` ,   `show` ,   `translate` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :table_id ,  :header_icon ,  :header_pre_label ,  :header_label ,  :header_url ,  :header_post_label ,  :body_icon ,  :body_pre_label ,  :body_label ,  :body_post_label ,  :footer_icon ,  :footer_pre_label ,  :footer_label ,  :footer_post_label ,  :description ,  :permission ,  :align ,  :show ,  :translate ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "table_id" => $table_id ,  
 "header_icon" => $header_icon ,  
 "header_pre_label" => $header_pre_label ,  
 "header_label" => $header_label ,  
 "header_url" => $header_url ,  
 "header_post_label" => $header_post_label ,  
 "body_icon" => $body_icon ,  
 "body_pre_label" => $body_pre_label ,  
 "body_label" => $body_label ,  
 "body_post_label" => $body_post_label ,  
 "footer_icon" => $footer_icon ,  
 "footer_pre_label" => $footer_pre_label ,  
 "footer_label" => $footer_label ,  
 "footer_post_label" => $footer_post_label ,  
 "description" => $description ,  
 "permission" => $permission ,  
 "align" => $align ,  
 "show" => $show ,  
 "translate" => $translate ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function magia_table_lines_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `table_id`,  `header_icon`,  `header_pre_label`,  `header_label`,  `header_url`,  `header_post_label`,  `body_icon`,  `body_pre_label`,  `body_label`,  `body_post_label`,  `footer_icon`,  `footer_pre_label`,  `footer_label`,  `footer_post_label`,  `description`,  `permission`,  `align`,  `show`,  `translate`,  `order_by`,  `status`    
            FROM `magia_table_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `table_id` like :txt
OR `header_icon` like :txt
OR `header_pre_label` like :txt
OR `header_label` like :txt
OR `header_url` like :txt
OR `header_post_label` like :txt
OR `body_icon` like :txt
OR `body_pre_label` like :txt
OR `body_label` like :txt
OR `body_post_label` like :txt
OR `footer_icon` like :txt
OR `footer_pre_label` like :txt
OR `footer_label` like :txt
OR `footer_post_label` like :txt
OR `description` like :txt
OR `permission` like :txt
OR `align` like :txt
OR `show` like :txt
OR `translate` like :txt
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

function magia_table_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (magia_table_lines_list() as $key => $value) {
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
function magia_table_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `magia_table_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function magia_table_lines_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `table_id`,  `header_icon`,  `header_pre_label`,  `header_label`,  `header_url`,  `header_post_label`,  `body_icon`,  `body_pre_label`,  `body_label`,  `body_post_label`,  `footer_icon`,  `footer_pre_label`,  `footer_label`,  `footer_post_label`,  `description`,  `permission`,  `align`,  `show`,  `translate`,  `order_by`,  `status`    FROM `magia_table_lines` 
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

function magia_table_lines_db_show_col_from_table($c) {
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
function magia_table_lines_db_col_list_from_table($c){
    $list = array();
    foreach (magia_table_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function magia_table_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_table_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `table_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_header_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `header_icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_header_pre_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `header_pre_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_header_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `header_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_header_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `header_url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_header_post_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `header_post_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_body_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `body_icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_body_pre_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `body_pre_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_body_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `body_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_body_post_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `body_post_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_footer_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `footer_icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_footer_pre_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `footer_pre_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_footer_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `footer_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_footer_post_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `footer_post_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_permission($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `permission`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_align($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `align`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_show($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `show`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_translate($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `translate`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function magia_table_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `magia_table_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function magia_table_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            magia_table_lines_update_id($id, $new_data);
            break;

        case "table_id":
            magia_table_lines_update_table_id($id, $new_data);
            break;

        case "header_icon":
            magia_table_lines_update_header_icon($id, $new_data);
            break;

        case "header_pre_label":
            magia_table_lines_update_header_pre_label($id, $new_data);
            break;

        case "header_label":
            magia_table_lines_update_header_label($id, $new_data);
            break;

        case "header_url":
            magia_table_lines_update_header_url($id, $new_data);
            break;

        case "header_post_label":
            magia_table_lines_update_header_post_label($id, $new_data);
            break;

        case "body_icon":
            magia_table_lines_update_body_icon($id, $new_data);
            break;

        case "body_pre_label":
            magia_table_lines_update_body_pre_label($id, $new_data);
            break;

        case "body_label":
            magia_table_lines_update_body_label($id, $new_data);
            break;

        case "body_post_label":
            magia_table_lines_update_body_post_label($id, $new_data);
            break;

        case "footer_icon":
            magia_table_lines_update_footer_icon($id, $new_data);
            break;

        case "footer_pre_label":
            magia_table_lines_update_footer_pre_label($id, $new_data);
            break;

        case "footer_label":
            magia_table_lines_update_footer_label($id, $new_data);
            break;

        case "footer_post_label":
            magia_table_lines_update_footer_post_label($id, $new_data);
            break;

        case "description":
            magia_table_lines_update_description($id, $new_data);
            break;

        case "permission":
            magia_table_lines_update_permission($id, $new_data);
            break;

        case "align":
            magia_table_lines_update_align($id, $new_data);
            break;

        case "show":
            magia_table_lines_update_show($id, $new_data);
            break;

        case "translate":
            magia_table_lines_update_translate($id, $new_data);
            break;

        case "order_by":
            magia_table_lines_update_order_by($id, $new_data);
            break;

        case "status":
            magia_table_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function magia_table_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `magia_table_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/magia_table_lines/functions.php
// and comment here (this function)
function magia_table_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "table_id":
            //return magia_tables_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "header_icon":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "header_pre_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "header_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "header_url":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "header_post_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "body_icon":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "body_pre_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "body_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "body_post_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "footer_icon":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "footer_pre_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "footer_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "footer_post_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "permission":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "align":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "show":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "translate":
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
function magia_table_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `magia_table_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_table_id($table_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `table_id` FROM `magia_table_lines` WHERE   `table_id` = ?");
    $req->execute(array($table_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_header_icon($header_icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `header_icon` FROM `magia_table_lines` WHERE   `header_icon` = ?");
    $req->execute(array($header_icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_header_pre_label($header_pre_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `header_pre_label` FROM `magia_table_lines` WHERE   `header_pre_label` = ?");
    $req->execute(array($header_pre_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_header_label($header_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `header_label` FROM `magia_table_lines` WHERE   `header_label` = ?");
    $req->execute(array($header_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_header_url($header_url){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `header_url` FROM `magia_table_lines` WHERE   `header_url` = ?");
    $req->execute(array($header_url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_header_post_label($header_post_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `header_post_label` FROM `magia_table_lines` WHERE   `header_post_label` = ?");
    $req->execute(array($header_post_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_body_icon($body_icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `body_icon` FROM `magia_table_lines` WHERE   `body_icon` = ?");
    $req->execute(array($body_icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_body_pre_label($body_pre_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `body_pre_label` FROM `magia_table_lines` WHERE   `body_pre_label` = ?");
    $req->execute(array($body_pre_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_body_label($body_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `body_label` FROM `magia_table_lines` WHERE   `body_label` = ?");
    $req->execute(array($body_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_body_post_label($body_post_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `body_post_label` FROM `magia_table_lines` WHERE   `body_post_label` = ?");
    $req->execute(array($body_post_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_footer_icon($footer_icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `footer_icon` FROM `magia_table_lines` WHERE   `footer_icon` = ?");
    $req->execute(array($footer_icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_footer_pre_label($footer_pre_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `footer_pre_label` FROM `magia_table_lines` WHERE   `footer_pre_label` = ?");
    $req->execute(array($footer_pre_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_footer_label($footer_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `footer_label` FROM `magia_table_lines` WHERE   `footer_label` = ?");
    $req->execute(array($footer_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_footer_post_label($footer_post_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `footer_post_label` FROM `magia_table_lines` WHERE   `footer_post_label` = ?");
    $req->execute(array($footer_post_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `magia_table_lines` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_permission($permission){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `permission` FROM `magia_table_lines` WHERE   `permission` = ?");
    $req->execute(array($permission));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_align($align){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `align` FROM `magia_table_lines` WHERE   `align` = ?");
    $req->execute(array($align));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_show($show){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `show` FROM `magia_table_lines` WHERE   `show` = ?");
    $req->execute(array($show));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_translate($translate){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `translate` FROM `magia_table_lines` WHERE   `translate` = ?");
    $req->execute(array($translate));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `magia_table_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function magia_table_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `magia_table_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function magia_table_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function magia_table_lines_is_table_id($table_id){
     return true;
}

function magia_table_lines_is_header_icon($header_icon){
     return true;
}

function magia_table_lines_is_header_pre_label($header_pre_label){
     return true;
}

function magia_table_lines_is_header_label($header_label){
     return true;
}

function magia_table_lines_is_header_url($header_url){
     return true;
}

function magia_table_lines_is_header_post_label($header_post_label){
     return true;
}

function magia_table_lines_is_body_icon($body_icon){
     return true;
}

function magia_table_lines_is_body_pre_label($body_pre_label){
     return true;
}

function magia_table_lines_is_body_label($body_label){
     return true;
}

function magia_table_lines_is_body_post_label($body_post_label){
     return true;
}

function magia_table_lines_is_footer_icon($footer_icon){
     return true;
}

function magia_table_lines_is_footer_pre_label($footer_pre_label){
     return true;
}

function magia_table_lines_is_footer_label($footer_label){
     return true;
}

function magia_table_lines_is_footer_post_label($footer_post_label){
     return true;
}

function magia_table_lines_is_description($description){
     return true;
}

function magia_table_lines_is_permission($permission){
     return true;
}

function magia_table_lines_is_align($align){
     return true;
}

function magia_table_lines_is_show($show){
     return true;
}

function magia_table_lines_is_translate($translate){
     return true;
}

function magia_table_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function magia_table_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function magia_table_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, magia_table_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function magia_table_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (magia_table_lines_is_id($value)) ? true : false;
            break;
     case "table_id":
            $is = (magia_table_lines_is_table_id($value)) ? true : false;
            break;
     case "header_icon":
            $is = (magia_table_lines_is_header_icon($value)) ? true : false;
            break;
     case "header_pre_label":
            $is = (magia_table_lines_is_header_pre_label($value)) ? true : false;
            break;
     case "header_label":
            $is = (magia_table_lines_is_header_label($value)) ? true : false;
            break;
     case "header_url":
            $is = (magia_table_lines_is_header_url($value)) ? true : false;
            break;
     case "header_post_label":
            $is = (magia_table_lines_is_header_post_label($value)) ? true : false;
            break;
     case "body_icon":
            $is = (magia_table_lines_is_body_icon($value)) ? true : false;
            break;
     case "body_pre_label":
            $is = (magia_table_lines_is_body_pre_label($value)) ? true : false;
            break;
     case "body_label":
            $is = (magia_table_lines_is_body_label($value)) ? true : false;
            break;
     case "body_post_label":
            $is = (magia_table_lines_is_body_post_label($value)) ? true : false;
            break;
     case "footer_icon":
            $is = (magia_table_lines_is_footer_icon($value)) ? true : false;
            break;
     case "footer_pre_label":
            $is = (magia_table_lines_is_footer_pre_label($value)) ? true : false;
            break;
     case "footer_label":
            $is = (magia_table_lines_is_footer_label($value)) ? true : false;
            break;
     case "footer_post_label":
            $is = (magia_table_lines_is_footer_post_label($value)) ? true : false;
            break;
     case "description":
            $is = (magia_table_lines_is_description($value)) ? true : false;
            break;
     case "permission":
            $is = (magia_table_lines_is_permission($value)) ? true : false;
            break;
     case "align":
            $is = (magia_table_lines_is_align($value)) ? true : false;
            break;
     case "show":
            $is = (magia_table_lines_is_show($value)) ? true : false;
            break;
     case "translate":
            $is = (magia_table_lines_is_translate($value)) ? true : false;
            break;
     case "order_by":
            $is = (magia_table_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (magia_table_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function magia_table_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=magia_table_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'table_id':
                echo '<th>' . _tr(ucfirst('table_id')) . '</th>';
                break;
case 'header_icon':
                echo '<th>' . _tr(ucfirst('header_icon')) . '</th>';
                break;
case 'header_pre_label':
                echo '<th>' . _tr(ucfirst('header_pre_label')) . '</th>';
                break;
case 'header_label':
                echo '<th>' . _tr(ucfirst('header_label')) . '</th>';
                break;
case 'header_url':
                echo '<th>' . _tr(ucfirst('header_url')) . '</th>';
                break;
case 'header_post_label':
                echo '<th>' . _tr(ucfirst('header_post_label')) . '</th>';
                break;
case 'body_icon':
                echo '<th>' . _tr(ucfirst('body_icon')) . '</th>';
                break;
case 'body_pre_label':
                echo '<th>' . _tr(ucfirst('body_pre_label')) . '</th>';
                break;
case 'body_label':
                echo '<th>' . _tr(ucfirst('body_label')) . '</th>';
                break;
case 'body_post_label':
                echo '<th>' . _tr(ucfirst('body_post_label')) . '</th>';
                break;
case 'footer_icon':
                echo '<th>' . _tr(ucfirst('footer_icon')) . '</th>';
                break;
case 'footer_pre_label':
                echo '<th>' . _tr(ucfirst('footer_pre_label')) . '</th>';
                break;
case 'footer_label':
                echo '<th>' . _tr(ucfirst('footer_label')) . '</th>';
                break;
case 'footer_post_label':
                echo '<th>' . _tr(ucfirst('footer_post_label')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'permission':
                echo '<th>' . _tr(ucfirst('permission')) . '</th>';
                break;
case 'align':
                echo '<th>' . _tr(ucfirst('align')) . '</th>';
                break;
case 'show':
                echo '<th>' . _tr(ucfirst('show')) . '</th>';
                break;
case 'translate':
                echo '<th>' . _tr(ucfirst('translate')) . '</th>';
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

function magia_table_lines_index_generate_column_body_td($magia_table_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=magia_table_lines&a=details&id=' . $magia_table_lines[$col] . '">' . $magia_table_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'table_id':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'header_icon':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'header_pre_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'header_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'header_url':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'header_post_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'body_icon':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'body_pre_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'body_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'body_post_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'footer_icon':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'footer_pre_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'footer_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'footer_post_label':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'permission':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'align':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'show':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'translate':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=magia_table_lines&a=details&id=' . $magia_table_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=magia_table_lines&a=details_payement&id=' . $magia_table_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=magia_table_lines&a=edit&id=' . $magia_table_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=magia_table_lines&a=ok_delete&id=' . $magia_table_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_table_lines&a=export_pdf&id=' . $magia_table_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=magia_table_lines&a=export_pdf&way=pdf&&id=' . $magia_table_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($magia_table_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
