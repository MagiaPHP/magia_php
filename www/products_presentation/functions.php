<?php
// plugin = products_presentation
// creation date : 2024-07-31
// 
// 
function products_presentation_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_presentation` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_presentation_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_presentation` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_presentation_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `products_presentation` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function products_presentation_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `product_code`,  `presentation_code`,  `contains_total`,  `contains_code`,  `height`,  `width`,  `depth`,  `weight`,  `code`,  `order_by`,  `status`   
    FROM `products_presentation` ORDER BY `order_by` , `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function products_presentation_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `product_code`,  `presentation_code`,  `contains_total`,  `contains_code`,  `height`,  `width`,  `depth`,  `weight`,  `code`,  `order_by`,  `status`   
    FROM `products_presentation` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function products_presentation_edit($id ,  $product_code ,  $presentation_code ,  $contains_total ,  $contains_code ,  $height ,  $width ,  $depth ,  $weight ,  $code ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `product_code` =:product_code, `presentation_code` =:presentation_code, `contains_total` =:contains_total, `contains_code` =:contains_code, `height` =:height, `width` =:width, `depth` =:depth, `weight` =:weight, `code` =:code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "product_code" =>$product_code ,  
 "presentation_code" =>$presentation_code ,  
 "contains_total" =>$contains_total ,  
 "contains_code" =>$contains_code ,  
 "height" =>$height ,  
 "width" =>$width ,  
 "depth" =>$depth ,  
 "weight" =>$weight ,  
 "code" =>$code ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function products_presentation_add($product_code ,  $presentation_code ,  $contains_total ,  $contains_code ,  $height ,  $width ,  $depth ,  $weight ,  $code ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `products_presentation` ( `id` ,   `product_code` ,   `presentation_code` ,   `contains_total` ,   `contains_code` ,   `height` ,   `width` ,   `depth` ,   `weight` ,   `code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :product_code ,  :presentation_code ,  :contains_total ,  :contains_code ,  :height ,  :width ,  :depth ,  :weight ,  :code ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "product_code" => $product_code ,  
 "presentation_code" => $presentation_code ,  
 "contains_total" => $contains_total ,  
 "contains_code" => $contains_code ,  
 "height" => $height ,  
 "width" => $width ,  
 "depth" => $depth ,  
 "weight" => $weight ,  
 "code" => $code ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function products_presentation_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `product_code`,  `presentation_code`,  `contains_total`,  `contains_code`,  `height`,  `width`,  `depth`,  `weight`,  `code`,  `order_by`,  `status`    
            FROM `products_presentation` 
            WHERE `id` = :txt OR `id` like :txt
OR `product_code` like :txt
OR `presentation_code` like :txt
OR `contains_total` like :txt
OR `contains_code` like :txt
OR `height` like :txt
OR `width` like :txt
OR `depth` like :txt
OR `weight` like :txt
OR `code` like :txt
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

function products_presentation_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (products_presentation_list() as $key => $value) {
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
function products_presentation_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `products_presentation` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function products_presentation_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `product_code`,  `presentation_code`,  `contains_total`,  `contains_code`,  `height`,  `width`,  `depth`,  `weight`,  `code`,  `order_by`,  `status`    FROM `products_presentation` 
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

function products_presentation_db_show_col_from_table($c) {
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
function products_presentation_db_col_list_from_table($c){
    $list = array();
    foreach (products_presentation_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function products_presentation_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_product_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `product_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_presentation_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `presentation_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_contains_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `contains_total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_contains_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `contains_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_height($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `height`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_width($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `width`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_depth($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `depth`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_weight($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `weight`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function products_presentation_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `products_presentation` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function products_presentation_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            products_presentation_update_id($id, $new_data);
            break;

        case "product_code":
            products_presentation_update_product_code($id, $new_data);
            break;

        case "presentation_code":
            products_presentation_update_presentation_code($id, $new_data);
            break;

        case "contains_total":
            products_presentation_update_contains_total($id, $new_data);
            break;

        case "contains_code":
            products_presentation_update_contains_code($id, $new_data);
            break;

        case "height":
            products_presentation_update_height($id, $new_data);
            break;

        case "width":
            products_presentation_update_width($id, $new_data);
            break;

        case "depth":
            products_presentation_update_depth($id, $new_data);
            break;

        case "weight":
            products_presentation_update_weight($id, $new_data);
            break;

        case "code":
            products_presentation_update_code($id, $new_data);
            break;

        case "order_by":
            products_presentation_update_order_by($id, $new_data);
            break;

        case "status":
            products_presentation_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function products_presentation_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `products_presentation` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/products_presentation/functions.php
// and comment here (this function)
function products_presentation_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "product_code":
            //return products_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "presentation_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contains_total":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contains_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "height":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "width":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "depth":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "weight":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
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
function products_presentation_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `products_presentation` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_product_code($product_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `product_code` FROM `products_presentation` WHERE   `product_code` = ?");
    $req->execute(array($product_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_presentation_code($presentation_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `presentation_code` FROM `products_presentation` WHERE   `presentation_code` = ?");
    $req->execute(array($presentation_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_contains_total($contains_total){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contains_total` FROM `products_presentation` WHERE   `contains_total` = ?");
    $req->execute(array($contains_total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_contains_code($contains_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contains_code` FROM `products_presentation` WHERE   `contains_code` = ?");
    $req->execute(array($contains_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_height($height){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `height` FROM `products_presentation` WHERE   `height` = ?");
    $req->execute(array($height));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_width($width){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `width` FROM `products_presentation` WHERE   `width` = ?");
    $req->execute(array($width));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_depth($depth){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `depth` FROM `products_presentation` WHERE   `depth` = ?");
    $req->execute(array($depth));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_weight($weight){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `weight` FROM `products_presentation` WHERE   `weight` = ?");
    $req->execute(array($weight));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `products_presentation` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `products_presentation` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function products_presentation_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `products_presentation` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function products_presentation_is_id($id){
     return (is_id($id) )? true : false ;
}

function products_presentation_is_product_code($product_code){
     return true;
}

function products_presentation_is_presentation_code($presentation_code){
     return true;
}

function products_presentation_is_contains_total($contains_total){
     return true;
}

function products_presentation_is_contains_code($contains_code){
     return true;
}

function products_presentation_is_height($height){
     return true;
}

function products_presentation_is_width($width){
     return true;
}

function products_presentation_is_depth($depth){
     return true;
}

function products_presentation_is_weight($weight){
     return true;
}

function products_presentation_is_code($code){
     return true;
}

function products_presentation_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function products_presentation_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function products_presentation_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, products_presentation_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function products_presentation_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (products_presentation_is_id($value)) ? true : false;
            break;
     case "product_code":
            $is = (products_presentation_is_product_code($value)) ? true : false;
            break;
     case "presentation_code":
            $is = (products_presentation_is_presentation_code($value)) ? true : false;
            break;
     case "contains_total":
            $is = (products_presentation_is_contains_total($value)) ? true : false;
            break;
     case "contains_code":
            $is = (products_presentation_is_contains_code($value)) ? true : false;
            break;
     case "height":
            $is = (products_presentation_is_height($value)) ? true : false;
            break;
     case "width":
            $is = (products_presentation_is_width($value)) ? true : false;
            break;
     case "depth":
            $is = (products_presentation_is_depth($value)) ? true : false;
            break;
     case "weight":
            $is = (products_presentation_is_weight($value)) ? true : false;
            break;
     case "code":
            $is = (products_presentation_is_code($value)) ? true : false;
            break;
     case "order_by":
            $is = (products_presentation_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (products_presentation_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function products_presentation_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=products_presentation&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'product_code':
                echo '<th>' . _tr(ucfirst('product_code')) . '</th>';
                break;
case 'presentation_code':
                echo '<th>' . _tr(ucfirst('presentation_code')) . '</th>';
                break;
case 'contains_total':
                echo '<th>' . _tr(ucfirst('contains_total')) . '</th>';
                break;
case 'contains_code':
                echo '<th>' . _tr(ucfirst('contains_code')) . '</th>';
                break;
case 'height':
                echo '<th>' . _tr(ucfirst('height')) . '</th>';
                break;
case 'width':
                echo '<th>' . _tr(ucfirst('width')) . '</th>';
                break;
case 'depth':
                echo '<th>' . _tr(ucfirst('depth')) . '</th>';
                break;
case 'weight':
                echo '<th>' . _tr(ucfirst('weight')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function products_presentation_index_generate_column_body_td($products_presentation, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=products_presentation&a=details&id=' . $products_presentation[$col] . '">' . $products_presentation[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'product_code':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'presentation_code':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'contains_total':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'contains_code':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'height':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'width':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'depth':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'weight':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=products_presentation&a=details&id=' . $products_presentation['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=products_presentation&a=details_payement&id=' . $products_presentation['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products_presentation&a=edit&id=' . $products_presentation['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=products_presentation&a=ok_delete&id=' . $products_presentation['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation&a=export_pdf&id=' . $products_presentation['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=products_presentation&a=export_pdf&way=pdf&&id=' . $products_presentation['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($products_presentation[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
