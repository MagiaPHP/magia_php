<?php
// plugin = backups
// creation date : 2024-08-11
// 
// 
function backups_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `backups` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function backups_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `backups` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function backups_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `backups` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function backups_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `subdomain`,  `order_by`,  `status`   
    FROM `backups` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function backups_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `date`,  `subdomain`,  `order_by`,  `status`   
    FROM `backups` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function backups_edit($id ,  $date ,  $subdomain ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `backups` SET `date` =:date, `subdomain` =:subdomain, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "date" =>$date ,  
 "subdomain" =>$subdomain ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function backups_add($date ,  $subdomain ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `backups` ( `id` ,   `date` ,   `subdomain` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :date ,  :subdomain ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "date" => $date ,  
 "subdomain" => $subdomain ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function backups_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `subdomain`,  `order_by`,  `status`    
            FROM `backups` 
            WHERE `id` = :txt OR `id` like :txt
OR `date` like :txt
OR `subdomain` like :txt
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

function backups_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (backups_list() as $key => $value) {
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
function backups_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `backups` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function backups_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `date`,  `subdomain`,  `order_by`,  `status`    FROM `backups` 
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

function backups_db_show_col_from_table($c) {
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
function backups_db_col_list_from_table($c){
    $list = array();
    foreach (backups_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function backups_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `backups` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function backups_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `backups` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function backups_update_subdomain($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `backups` SET `subdomain`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function backups_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `backups` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function backups_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `backups` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function backups_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            backups_update_id($id, $new_data);
            break;

        case "date":
            backups_update_date($id, $new_data);
            break;

        case "subdomain":
            backups_update_subdomain($id, $new_data);
            break;

        case "order_by":
            backups_update_order_by($id, $new_data);
            break;

        case "status":
            backups_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function backups_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `backups` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/backups/functions.php
// and comment here (this function)
function backups_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "subdomain":
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
function backups_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `backups` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function backups_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `backups` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function backups_exists_subdomain($subdomain){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `subdomain` FROM `backups` WHERE   `subdomain` = ?");
    $req->execute(array($subdomain));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function backups_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `backups` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function backups_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `backups` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function backups_is_id($id){
     return (is_id($id) )? true : false ;
}

function backups_is_date($date){
     return true;
}

function backups_is_subdomain($subdomain){
     return true;
}

function backups_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function backups_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function backups_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, backups_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function backups_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (backups_is_id($value)) ? true : false;
            break;
     case "date":
            $is = (backups_is_date($value)) ? true : false;
            break;
     case "subdomain":
            $is = (backups_is_subdomain($value)) ? true : false;
            break;
     case "order_by":
            $is = (backups_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (backups_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function backups_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=backups&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'subdomain':
                echo '<th>' . _tr(ucfirst('subdomain')) . '</th>';
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

function backups_index_generate_column_body_td($backups, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=backups&a=details&id=' . $backups[$col] . '">' . $backups[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($backups[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($backups[$col]) . '</td>';
                break;
case 'subdomain':
                echo '<td>' . ($backups[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($backups[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($backups[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=backups&a=details&id=' . $backups['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=backups&a=details_payement&id=' . $backups['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=backups&a=edit&id=' . $backups['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=backups&a=ok_delete&id=' . $backups['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=backups&a=export_pdf&id=' . $backups['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=backups&a=export_pdf&way=pdf&&id=' . $backups['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($backups[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
