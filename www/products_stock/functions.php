<?php
// plugin = products_stock
// creation date : 2024-07-31
// 
// 
function products_stock_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_stock` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_stock_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_stock` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_stock_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_stock` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_stock_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `product_code`,  `office_id`,  `stock`,  `stock_min`,  `stock_max`,  `order_by`,  `status`   
    FROM `products_stock` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function products_stock_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `product_code`,  `office_id`,  `stock`,  `stock_min`,  `stock_max`,  `order_by`,  `status`   
    FROM `products_stock` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function products_stock_edit($id ,  $product_code ,  $office_id ,  $stock ,  $stock_min ,  $stock_max ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `product_code` =:product_code, `office_id` =:office_id, `stock` =:stock, `stock_min` =:stock_min, `stock_max` =:stock_max, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "product_code" =>$product_code ,  
 "office_id" =>$office_id ,  
 "stock" =>$stock ,  
 "stock_min" =>$stock_min ,  
 "stock_max" =>$stock_max ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function products_stock_add($product_code ,  $office_id ,  $stock ,  $stock_min ,  $stock_max ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `products_stock` ( `id` ,   `product_code` ,   `office_id` ,   `stock` ,   `stock_min` ,   `stock_max` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :product_code ,  :office_id ,  :stock ,  :stock_min ,  :stock_max ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "product_code" => $product_code ,  
 "office_id" => $office_id ,  
 "stock" => $stock ,  
 "stock_min" => $stock_min ,  
 "stock_max" => $stock_max ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function products_stock_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `product_code`,  `office_id`,  `stock`,  `stock_min`,  `stock_max`,  `order_by`,  `status`    
            FROM `products_stock` 
            WHERE `id` = :txt OR `id` like :txt
OR `product_code` like :txt
OR `office_id` like :txt
OR `stock` like :txt
OR `stock_min` like :txt
OR `stock_max` like :txt
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

function products_stock_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (products_stock_list() as $key => $value) {
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
function products_stock_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `products_stock` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function products_stock_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `product_code`,  `office_id`,  `stock`,  `stock_min`,  `stock_max`,  `order_by`,  `status`    FROM `products_stock` 
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

function products_stock_db_show_col_from_table($c) {
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
function products_stock_db_col_list_from_table($c){
    $list = array();
    foreach (products_stock_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function products_stock_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_product_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `product_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_office_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `office_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_stock($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `stock`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_stock_min($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `stock_min`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_stock_max($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `stock_max`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_stock_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_stock` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function products_stock_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            products_stock_update_id($id, $new_data);
            break;

        case "product_code":
            products_stock_update_product_code($id, $new_data);
            break;

        case "office_id":
            products_stock_update_office_id($id, $new_data);
            break;

        case "stock":
            products_stock_update_stock($id, $new_data);
            break;

        case "stock_min":
            products_stock_update_stock_min($id, $new_data);
            break;

        case "stock_max":
            products_stock_update_stock_max($id, $new_data);
            break;

        case "order_by":
            products_stock_update_order_by($id, $new_data);
            break;

        case "status":
            products_stock_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function products_stock_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `products_stock` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/products_stock/functions.php
// and comment here (this function)
function products_stock_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "product_code":
            //return products_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "office_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "stock":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "stock_min":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "stock_max":
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
function products_stock_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `products_stock` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_product_code($product_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `product_code` FROM `products_stock` WHERE   `product_code` = ?");
    $req->execute(array($product_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_office_id($office_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `office_id` FROM `products_stock` WHERE   `office_id` = ?");
    $req->execute(array($office_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_stock($stock){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `stock` FROM `products_stock` WHERE   `stock` = ?");
    $req->execute(array($stock));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_stock_min($stock_min){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `stock_min` FROM `products_stock` WHERE   `stock_min` = ?");
    $req->execute(array($stock_min));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_stock_max($stock_max){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `stock_max` FROM `products_stock` WHERE   `stock_max` = ?");
    $req->execute(array($stock_max));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `products_stock` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_stock_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `products_stock` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function products_stock_is_id($id){
     return (is_id($id) )? true : false ;
}

function products_stock_is_product_code($product_code){
     return true;
}

function products_stock_is_office_id($office_id){
     return true;
}

function products_stock_is_stock($stock){
     return true;
}

function products_stock_is_stock_min($stock_min){
     return true;
}

function products_stock_is_stock_max($stock_max){
     return true;
}

function products_stock_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function products_stock_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function products_stock_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, products_stock_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function products_stock_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (products_stock_is_id($value)) ? true : false;
            break;
     case "product_code":
            $is = (products_stock_is_product_code($value)) ? true : false;
            break;
     case "office_id":
            $is = (products_stock_is_office_id($value)) ? true : false;
            break;
     case "stock":
            $is = (products_stock_is_stock($value)) ? true : false;
            break;
     case "stock_min":
            $is = (products_stock_is_stock_min($value)) ? true : false;
            break;
     case "stock_max":
            $is = (products_stock_is_stock_max($value)) ? true : false;
            break;
     case "order_by":
            $is = (products_stock_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (products_stock_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function products_stock_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=products_stock&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'product_code':
                echo '<th>' . _tr(ucfirst('product_code')) . '</th>';
                break;
case 'office_id':
                echo '<th>' . _tr(ucfirst('office_id')) . '</th>';
                break;
case 'stock':
                echo '<th>' . _tr(ucfirst('stock')) . '</th>';
                break;
case 'stock_min':
                echo '<th>' . _tr(ucfirst('stock_min')) . '</th>';
                break;
case 'stock_max':
                echo '<th>' . _tr(ucfirst('stock_max')) . '</th>';
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

function products_stock_index_generate_column_body_td($products_stock, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=products_stock&a=details&id=' . $products_stock[$col] . '">' . $products_stock[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'product_code':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'office_id':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'stock':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'stock_min':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'stock_max':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=products_stock&a=details&id=' . $products_stock['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=products_stock&a=details_payement&id=' . $products_stock['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products_stock&a=edit&id=' . $products_stock['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products_stock&a=ok_delete&id=' . $products_stock['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_stock&a=export_pdf&id=' . $products_stock['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_stock&a=export_pdf&way=pdf&&id=' . $products_stock['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($products_stock[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
