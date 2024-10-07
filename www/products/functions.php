<?php
// plugin = products
// creation date : 2024-07-31
// 
// 
function products_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `category_code`,  `code`,  `name`,  `description`,  `price`,  `tax`,  `order_by`,  `status`   
    FROM `products` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function products_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `category_code`,  `code`,  `name`,  `description`,  `price`,  `tax`,  `order_by`,  `status`   
    FROM `products` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function products_edit($id ,  $category_code ,  $code ,  $name ,  $description ,  $price ,  $tax ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `category_code` =:category_code, `code` =:code, `name` =:name, `description` =:description, `price` =:price, `tax` =:tax, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "category_code" =>$category_code ,  
 "code" =>$code ,  
 "name" =>$name ,  
 "description" =>$description ,  
 "price" =>$price ,  
 "tax" =>$tax ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function products_add($category_code ,  $code ,  $name ,  $description ,  $price ,  $tax ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `products` ( `id` ,   `category_code` ,   `code` ,   `name` ,   `description` ,   `price` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :category_code ,  :code ,  :name ,  :description ,  :price ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "category_code" => $category_code ,  
 "code" => $code ,  
 "name" => $name ,  
 "description" => $description ,  
 "price" => $price ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function products_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `category_code`,  `code`,  `name`,  `description`,  `price`,  `tax`,  `order_by`,  `status`    
            FROM `products` 
            WHERE `id` = :txt OR `id` like :txt
OR `category_code` like :txt
OR `code` like :txt
OR `name` like :txt
OR `description` like :txt
OR `price` like :txt
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

function products_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (products_list() as $key => $value) {
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
function products_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `products` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function products_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `category_code`,  `code`,  `name`,  `description`,  `price`,  `tax`,  `order_by`,  `status`    FROM `products` 
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

function products_db_show_col_from_table($c) {
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
function products_db_col_list_from_table($c){
    $list = array();
    foreach (products_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function products_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_category_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `category_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_price($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `price`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_tax($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `tax`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function products_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            products_update_id($id, $new_data);
            break;

        case "category_code":
            products_update_category_code($id, $new_data);
            break;

        case "code":
            products_update_code($id, $new_data);
            break;

        case "name":
            products_update_name($id, $new_data);
            break;

        case "description":
            products_update_description($id, $new_data);
            break;

        case "price":
            products_update_price($id, $new_data);
            break;

        case "tax":
            products_update_tax($id, $new_data);
            break;

        case "order_by":
            products_update_order_by($id, $new_data);
            break;

        case "status":
            products_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function products_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `products` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/products/functions.php
// and comment here (this function)
function products_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category_code":
            //return products_categories_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
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
        case "price":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "tax":
            //return tax_field_id("value", $value);
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
function products_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `products` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_category_code($category_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category_code` FROM `products` WHERE   `category_code` = ?");
    $req->execute(array($category_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `products` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `products` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `products` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_price($price){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `price` FROM `products` WHERE   `price` = ?");
    $req->execute(array($price));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_tax($tax){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax` FROM `products` WHERE   `tax` = ?");
    $req->execute(array($tax));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `products` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `products` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function products_is_id($id){
     return (is_id($id) )? true : false ;
}

function products_is_category_code($category_code){
     return true;
}

function products_is_code($code){
     return true;
}

function products_is_name($name){
     return true;
}

function products_is_description($description){
     return true;
}

function products_is_price($price){
     return true;
}

function products_is_tax($tax){
     return true;
}

function products_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function products_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function products_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, products_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function products_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (products_is_id($value)) ? true : false;
            break;
     case "category_code":
            $is = (products_is_category_code($value)) ? true : false;
            break;
     case "code":
            $is = (products_is_code($value)) ? true : false;
            break;
     case "name":
            $is = (products_is_name($value)) ? true : false;
            break;
     case "description":
            $is = (products_is_description($value)) ? true : false;
            break;
     case "price":
            $is = (products_is_price($value)) ? true : false;
            break;
     case "tax":
            $is = (products_is_tax($value)) ? true : false;
            break;
     case "order_by":
            $is = (products_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (products_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function products_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=products&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'category_code':
                echo '<th>' . _tr(ucfirst('category_code')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'price':
                echo '<th>' . _tr(ucfirst('price')) . '</th>';
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

function products_index_generate_column_body_td($products, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=products&a=details&id=' . $products[$col] . '">' . $products[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'category_code':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'price':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'tax':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($products[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=products&a=details&id=' . $products['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=products&a=details_payement&id=' . $products['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products&a=edit&id=' . $products['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products&a=ok_delete&id=' . $products['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products&a=export_pdf&id=' . $products['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products&a=export_pdf&way=pdf&&id=' . $products['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($products[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
