<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 18:08:12 


// 
// 
function inv_periods_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `inv_periods` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function inv_periods_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `inv_periods` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function inv_periods_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `inv_periods` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function inv_periods_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `period`,  `description`,  `order_by`,  `status`   
    FROM `inv_periods` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function inv_periods_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `period`,  `description`,  `order_by`,  `status`   
    FROM `inv_periods` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}

////////////////////////////////////////////////////////////////////////////////
function inv_periods_edit($id ,  $period ,  $description ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_periods` SET `period` =:period, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "period" =>$period ,  
 "description" =>$description ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}
////////////////////////////////////////////////////////////////////////////////
function inv_periods_add($period ,  $description ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `inv_periods` ( `id` ,   `period` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :period ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "period" => $period ,  
 "description" => $description ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function inv_periods_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `period`,  `description`,  `order_by`,  `status`    
            FROM `inv_periods` 
            WHERE `id` = :txt OR `id` like :txt
OR `period` like :txt
OR `description` like :txt
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

function inv_periods_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (inv_periods_list() as $key => $value) {
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
function inv_periods_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `inv_periods` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function inv_periods_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `period`,  `description`,  `order_by`,  `status`    FROM `inv_periods` 
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

function inv_periods_db_show_col_from_table($c) {
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
function inv_periods_db_col_list_from_table($c){
    $list = array();
    foreach (inv_periods_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function inv_periods_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_periods` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function inv_periods_update_period($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_periods` SET `period`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function inv_periods_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_periods` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function inv_periods_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_periods` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function inv_periods_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `inv_periods` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function inv_periods_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            inv_periods_update_id($id, $new_data);
            break;

        case "period":
            inv_periods_update_period($id, $new_data);
            break;

        case "description":
            inv_periods_update_description($id, $new_data);
            break;

        case "order_by":
            inv_periods_update_order_by($id, $new_data);
            break;

        case "status":
            inv_periods_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function inv_periods_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `inv_periods` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/inv_periods/functions.php
// and comment here (this function)
function inv_periods_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "period":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
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
function inv_periods_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `inv_periods` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function inv_periods_exists_period($period){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `period` FROM `inv_periods` WHERE   `period` = ?");
    $req->execute(array($period));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function inv_periods_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `inv_periods` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function inv_periods_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `inv_periods` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function inv_periods_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `inv_periods` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function inv_periods_is_id($id){
     return (is_id($id) )? true : false ;
}

function inv_periods_is_period($period){
     return true;
}

function inv_periods_is_description($description){
     return true;
}

function inv_periods_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function inv_periods_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function inv_periods_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, inv_periods_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function inv_periods_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (inv_periods_is_id($value)) ? true : false;
            break;
     case "period":
            $is = (inv_periods_is_period($value)) ? true : false;
            break;
     case "description":
            $is = (inv_periods_is_description($value)) ? true : false;
            break;
     case "order_by":
            $is = (inv_periods_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (inv_periods_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function inv_periods_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=inv_periods&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'period':
                echo '<th>' . _tr(ucfirst('period')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
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

function inv_periods_index_generate_column_body_td($inv_periods, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=inv_periods&a=details&id=' . $inv_periods[$col] . '">' . $inv_periods[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
case 'period':
                echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=inv_periods&a=details&id=' . $inv_periods['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=inv_periods&a=details_payement&id=' . $inv_periods['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=inv_periods&a=edit&id=' . $inv_periods['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=inv_periods&a=ok_delete&id=' . $inv_periods['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_periods&a=export_pdf&id=' . $inv_periods['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=inv_periods&a=export_pdf&way=pdf&&id=' . $inv_periods['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($inv_periods[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
