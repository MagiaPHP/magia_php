<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-04 08:09:19 


// 
// 
function country_tax_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `country_tax` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function country_tax_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `country_tax` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function country_tax_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `country_tax` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function country_tax_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `country`,  `tax`,  `order_by`,  `status`   
    FROM `country_tax` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function country_tax_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `country`,  `tax`,  `order_by`,  `status`   
    FROM `country_tax` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function country_tax_edit($id ,  $country ,  $tax ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `country_tax` SET `country` =:country, `tax` =:tax, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "country" =>$country ,  
 "tax" =>$tax ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function country_tax_add($country ,  $tax ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `country_tax` ( `id` ,   `country` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :country ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "country" => $country ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function country_tax_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `country`,  `tax`,  `order_by`,  `status`    
            FROM `country_tax` 
            WHERE `id` = :txt OR `id` like :txt
OR `country` like :txt
OR `tax` like :txt
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

function country_tax_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (country_tax_list() as $key => $value) {
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
function country_tax_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `country_tax` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function country_tax_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `country`,  `tax`,  `order_by`,  `status`    FROM `country_tax` 
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

function country_tax_db_show_col_from_table($c) {
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
function country_tax_db_col_list_from_table($c){
    $list = array();
    foreach (country_tax_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function country_tax_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `country_tax` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function country_tax_update_country($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `country_tax` SET `country`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function country_tax_update_tax($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `country_tax` SET `tax`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function country_tax_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `country_tax` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function country_tax_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `country_tax` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function country_tax_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            country_tax_update_id($id, $new_data);
            break;

        case "country":
            country_tax_update_country($id, $new_data);
            break;

        case "tax":
            country_tax_update_tax($id, $new_data);
            break;

        case "order_by":
            country_tax_update_order_by($id, $new_data);
            break;

        case "status":
            country_tax_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function country_tax_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `country_tax` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/country_tax/functions.php
// and comment here (this function)
function country_tax_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "country":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "tax":
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
function country_tax_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `country_tax` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function country_tax_exists_country($country){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `country` FROM `country_tax` WHERE   `country` = ?");
    $req->execute(array($country));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function country_tax_exists_tax($tax){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax` FROM `country_tax` WHERE   `tax` = ?");
    $req->execute(array($tax));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function country_tax_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `country_tax` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function country_tax_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `country_tax` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function country_tax_is_id($id){
     return (is_id($id) )? true : false ;
}

function country_tax_is_country($country){
     return true;
}

function country_tax_is_tax($tax){
     return true;
}

function country_tax_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function country_tax_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function country_tax_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, country_tax_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function country_tax_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (country_tax_is_id($value)) ? true : false;
            break;
     case "country":
            $is = (country_tax_is_country($value)) ? true : false;
            break;
     case "tax":
            $is = (country_tax_is_tax($value)) ? true : false;
            break;
     case "order_by":
            $is = (country_tax_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (country_tax_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function country_tax_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=country_tax&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'country':
                echo '<th>' . _tr(ucfirst('country')) . '</th>';
                break;
case 'tax':
                echo '<th>' . _tr(ucfirst('tax')) . '</th>';
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

function country_tax_index_generate_column_body_td($country_tax, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=country_tax&a=details&id=' . $country_tax[$col] . '">' . $country_tax[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($country_tax[$col]) . '</td>';
                break;
case 'country':
                echo '<td>' . ($country_tax[$col]) . '</td>';
                break;
case 'tax':
                echo '<td>' . ($country_tax[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($country_tax[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($country_tax[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=country_tax&a=details&id=' . $country_tax['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=country_tax&a=details_payement&id=' . $country_tax['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=country_tax&a=edit&id=' . $country_tax['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=country_tax&a=ok_delete&id=' . $country_tax['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=country_tax&a=export_pdf&id=' . $country_tax['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=country_tax&a=export_pdf&way=pdf&&id=' . $country_tax['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($country_tax[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
