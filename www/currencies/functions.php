<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:19 


// 
// 
function currencies_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `currencies` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function currencies_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `currencies` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function currencies_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `currencies` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function currencies_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `code`,  `rate`,  `rate_silent`,  `rate_id`,  `accuracy`,  `rounding`,  `active`,  `company_id`,  `date`,  `base`,  `position`,  `order_by`,  `status`   
    FROM `currencies` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function currencies_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `name`,  `code`,  `rate`,  `rate_silent`,  `rate_id`,  `accuracy`,  `rounding`,  `active`,  `company_id`,  `date`,  `base`,  `position`,  `order_by`,  `status`   
    FROM `currencies` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function currencies_edit($id ,  $name ,  $code ,  $rate ,  $rate_silent ,  $rate_id ,  $accuracy ,  $rounding ,  $active ,  $company_id ,  $date ,  $base ,  $position ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `name` =:name, `code` =:code, `rate` =:rate, `rate_silent` =:rate_silent, `rate_id` =:rate_id, `accuracy` =:accuracy, `rounding` =:rounding, `active` =:active, `company_id` =:company_id, `date` =:date, `base` =:base, `position` =:position, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "name" =>$name ,  
 "code" =>$code ,  
 "rate" =>$rate ,  
 "rate_silent" =>$rate_silent ,  
 "rate_id" =>$rate_id ,  
 "accuracy" =>$accuracy ,  
 "rounding" =>$rounding ,  
 "active" =>$active ,  
 "company_id" =>$company_id ,  
 "date" =>$date ,  
 "base" =>$base ,  
 "position" =>$position ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function currencies_add($name ,  $code ,  $rate ,  $rate_silent ,  $rate_id ,  $accuracy ,  $rounding ,  $active ,  $company_id ,  $date ,  $base ,  $position ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `currencies` ( `id` ,   `name` ,   `code` ,   `rate` ,   `rate_silent` ,   `rate_id` ,   `accuracy` ,   `rounding` ,   `active` ,   `company_id` ,   `date` ,   `base` ,   `position` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :code ,  :rate ,  :rate_silent ,  :rate_id ,  :accuracy ,  :rounding ,  :active ,  :company_id ,  :date ,  :base ,  :position ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "code" => $code ,  
 "rate" => $rate ,  
 "rate_silent" => $rate_silent ,  
 "rate_id" => $rate_id ,  
 "accuracy" => $accuracy ,  
 "rounding" => $rounding ,  
 "active" => $active ,  
 "company_id" => $company_id ,  
 "date" => $date ,  
 "base" => $base ,  
 "position" => $position ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function currencies_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `code`,  `rate`,  `rate_silent`,  `rate_id`,  `accuracy`,  `rounding`,  `active`,  `company_id`,  `date`,  `base`,  `position`,  `order_by`,  `status`    
            FROM `currencies` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
OR `code` like :txt
OR `rate` like :txt
OR `rate_silent` like :txt
OR `rate_id` like :txt
OR `accuracy` like :txt
OR `rounding` like :txt
OR `active` like :txt
OR `company_id` like :txt
OR `date` like :txt
OR `base` like :txt
OR `position` like :txt
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

function currencies_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (currencies_list() as $key => $value) {
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
function currencies_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `currencies` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function currencies_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `name`,  `code`,  `rate`,  `rate_silent`,  `rate_id`,  `accuracy`,  `rounding`,  `active`,  `company_id`,  `date`,  `base`,  `position`,  `order_by`,  `status`    FROM `currencies` 
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

function currencies_db_show_col_from_table($c) {
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
function currencies_db_col_list_from_table($c){
    $list = array();
    foreach (currencies_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function currencies_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_rate($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `rate`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_rate_silent($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `rate_silent`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_rate_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `rate_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_accuracy($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `accuracy`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_rounding($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `rounding`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_active($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `active`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_company_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `company_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_base($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `base`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_position($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `position`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function currencies_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `currencies` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function currencies_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            currencies_update_id($id, $new_data);
            break;

        case "name":
            currencies_update_name($id, $new_data);
            break;

        case "code":
            currencies_update_code($id, $new_data);
            break;

        case "rate":
            currencies_update_rate($id, $new_data);
            break;

        case "rate_silent":
            currencies_update_rate_silent($id, $new_data);
            break;

        case "rate_id":
            currencies_update_rate_id($id, $new_data);
            break;

        case "accuracy":
            currencies_update_accuracy($id, $new_data);
            break;

        case "rounding":
            currencies_update_rounding($id, $new_data);
            break;

        case "active":
            currencies_update_active($id, $new_data);
            break;

        case "company_id":
            currencies_update_company_id($id, $new_data);
            break;

        case "date":
            currencies_update_date($id, $new_data);
            break;

        case "base":
            currencies_update_base($id, $new_data);
            break;

        case "position":
            currencies_update_position($id, $new_data);
            break;

        case "order_by":
            currencies_update_order_by($id, $new_data);
            break;

        case "status":
            currencies_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function currencies_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `currencies` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/currencies/functions.php
// and comment here (this function)
function currencies_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
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
        case "rate":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "rate_silent":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "rate_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "accuracy":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "rounding":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "active":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "company_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "base":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "position":
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
function currencies_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `currencies` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `currencies` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `currencies` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_rate($rate){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `rate` FROM `currencies` WHERE   `rate` = ?");
    $req->execute(array($rate));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_rate_silent($rate_silent){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `rate_silent` FROM `currencies` WHERE   `rate_silent` = ?");
    $req->execute(array($rate_silent));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_rate_id($rate_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `rate_id` FROM `currencies` WHERE   `rate_id` = ?");
    $req->execute(array($rate_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_accuracy($accuracy){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `accuracy` FROM `currencies` WHERE   `accuracy` = ?");
    $req->execute(array($accuracy));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_rounding($rounding){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `rounding` FROM `currencies` WHERE   `rounding` = ?");
    $req->execute(array($rounding));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_active($active){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `active` FROM `currencies` WHERE   `active` = ?");
    $req->execute(array($active));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_company_id($company_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company_id` FROM `currencies` WHERE   `company_id` = ?");
    $req->execute(array($company_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `currencies` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_base($base){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `base` FROM `currencies` WHERE   `base` = ?");
    $req->execute(array($base));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_position($position){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `position` FROM `currencies` WHERE   `position` = ?");
    $req->execute(array($position));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `currencies` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function currencies_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `currencies` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function currencies_is_id($id){
     return (is_id($id) )? true : false ;
}

function currencies_is_name($name){
     return true;
}

function currencies_is_code($code){
     return true;
}

function currencies_is_rate($rate){
     return true;
}

function currencies_is_rate_silent($rate_silent){
     return true;
}

function currencies_is_rate_id($rate_id){
     return true;
}

function currencies_is_accuracy($accuracy){
     return true;
}

function currencies_is_rounding($rounding){
     return true;
}

function currencies_is_active($active){
     return true;
}

function currencies_is_company_id($company_id){
     return true;
}

function currencies_is_date($date){
     return true;
}

function currencies_is_base($base){
     return true;
}

function currencies_is_position($position){
     return true;
}

function currencies_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function currencies_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function currencies_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, currencies_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function currencies_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (currencies_is_id($value)) ? true : false;
            break;
     case "name":
            $is = (currencies_is_name($value)) ? true : false;
            break;
     case "code":
            $is = (currencies_is_code($value)) ? true : false;
            break;
     case "rate":
            $is = (currencies_is_rate($value)) ? true : false;
            break;
     case "rate_silent":
            $is = (currencies_is_rate_silent($value)) ? true : false;
            break;
     case "rate_id":
            $is = (currencies_is_rate_id($value)) ? true : false;
            break;
     case "accuracy":
            $is = (currencies_is_accuracy($value)) ? true : false;
            break;
     case "rounding":
            $is = (currencies_is_rounding($value)) ? true : false;
            break;
     case "active":
            $is = (currencies_is_active($value)) ? true : false;
            break;
     case "company_id":
            $is = (currencies_is_company_id($value)) ? true : false;
            break;
     case "date":
            $is = (currencies_is_date($value)) ? true : false;
            break;
     case "base":
            $is = (currencies_is_base($value)) ? true : false;
            break;
     case "position":
            $is = (currencies_is_position($value)) ? true : false;
            break;
     case "order_by":
            $is = (currencies_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (currencies_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function currencies_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=currencies&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'rate':
                echo '<th>' . _tr(ucfirst('rate')) . '</th>';
                break;
case 'rate_silent':
                echo '<th>' . _tr(ucfirst('rate_silent')) . '</th>';
                break;
case 'rate_id':
                echo '<th>' . _tr(ucfirst('rate_id')) . '</th>';
                break;
case 'accuracy':
                echo '<th>' . _tr(ucfirst('accuracy')) . '</th>';
                break;
case 'rounding':
                echo '<th>' . _tr(ucfirst('rounding')) . '</th>';
                break;
case 'active':
                echo '<th>' . _tr(ucfirst('active')) . '</th>';
                break;
case 'company_id':
                echo '<th>' . _tr(ucfirst('company_id')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'base':
                echo '<th>' . _tr(ucfirst('base')) . '</th>';
                break;
case 'position':
                echo '<th>' . _tr(ucfirst('position')) . '</th>';
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

function currencies_index_generate_column_body_td($currencies, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=currencies&a=details&id=' . $currencies[$col] . '">' . $currencies[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'rate':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'rate_silent':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'rate_id':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'accuracy':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'rounding':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'active':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'company_id':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'base':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'position':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($currencies[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=currencies&a=details&id=' . $currencies['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=currencies&a=details_payement&id=' . $currencies['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=currencies&a=edit&id=' . $currencies['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=currencies&a=ok_delete&id=' . $currencies['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=currencies&a=export_pdf&id=' . $currencies['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=currencies&a=export_pdf&way=pdf&&id=' . $currencies['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($currencies[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
