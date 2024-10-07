<?php
// plugin = products_presentation_names
// creation date : 2024-07-31
// 
// 
function products_presentation_names_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_presentation_names` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_presentation_names_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_presentation_names` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_presentation_names_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_presentation_names` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_presentation_names_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `presentation`,  `order_by`,  `status`   
    FROM `products_presentation_names` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function products_presentation_names_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `presentation`,  `order_by`,  `status`   
    FROM `products_presentation_names` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function products_presentation_names_edit($id ,  $presentation ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation_names` SET `presentation` =:presentation, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "presentation" =>$presentation ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function products_presentation_names_add($presentation ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `products_presentation_names` ( `id` ,   `presentation` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :presentation ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "presentation" => $presentation ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function products_presentation_names_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `presentation`,  `order_by`,  `status`    
            FROM `products_presentation_names` 
            WHERE `id` = :txt OR `id` like :txt
OR `presentation` like :txt
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

function products_presentation_names_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (products_presentation_names_list() as $key => $value) {
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
function products_presentation_names_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `products_presentation_names` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function products_presentation_names_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `presentation`,  `order_by`,  `status`    FROM `products_presentation_names` 
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

function products_presentation_names_db_show_col_from_table($c) {
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
function products_presentation_names_db_col_list_from_table($c){
    $list = array();
    foreach (products_presentation_names_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function products_presentation_names_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation_names` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_names_update_presentation($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation_names` SET `presentation`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_names_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation_names` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_names_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation_names` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function products_presentation_names_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            products_presentation_names_update_id($id, $new_data);
            break;

        case "presentation":
            products_presentation_names_update_presentation($id, $new_data);
            break;

        case "order_by":
            products_presentation_names_update_order_by($id, $new_data);
            break;

        case "status":
            products_presentation_names_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function products_presentation_names_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `products_presentation_names` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/products_presentation_names/functions.php
// and comment here (this function)
function products_presentation_names_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "presentation":
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
function products_presentation_names_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `products_presentation_names` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_names_exists_presentation($presentation){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `presentation` FROM `products_presentation_names` WHERE   `presentation` = ?");
    $req->execute(array($presentation));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_names_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `products_presentation_names` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_names_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `products_presentation_names` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function products_presentation_names_is_id($id){
     return (is_id($id) )? true : false ;
}

function products_presentation_names_is_presentation($presentation){
     return true;
}

function products_presentation_names_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function products_presentation_names_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function products_presentation_names_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, products_presentation_names_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function products_presentation_names_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (products_presentation_names_is_id($value)) ? true : false;
            break;
     case "presentation":
            $is = (products_presentation_names_is_presentation($value)) ? true : false;
            break;
     case "order_by":
            $is = (products_presentation_names_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (products_presentation_names_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function products_presentation_names_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=products_presentation_names&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'presentation':
                echo '<th>' . _tr(ucfirst('presentation')) . '</th>';
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

function products_presentation_names_index_generate_column_body_td($products_presentation_names, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=products_presentation_names&a=details&id=' . $products_presentation_names[$col] . '">' . $products_presentation_names[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($products_presentation_names[$col]) . '</td>';
                break;
case 'presentation':
                echo '<td>' . ($products_presentation_names[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($products_presentation_names[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($products_presentation_names[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=products_presentation_names&a=details&id=' . $products_presentation_names['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=products_presentation_names&a=details_payement&id=' . $products_presentation_names['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products_presentation_names&a=edit&id=' . $products_presentation_names['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products_presentation_names&a=ok_delete&id=' . $products_presentation_names['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation_names&a=export_pdf&id=' . $products_presentation_names['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation_names&a=export_pdf&way=pdf&&id=' . $products_presentation_names['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($products_presentation_names[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
