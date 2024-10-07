<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 12:09:08 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 12:09:08 


// 

//function budget_lines_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function budget_lines_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("budget_lines_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("budget_lines"); // Obtener columnas de la tabla de la base de datos
        //
        // Formatear columnas de la tabla como columnas predeterminadas
        foreach ($columns as $key => $col) {
            $user_cols_array[] = [
                "col_name" => $col["Field"],
                "label" => ucfirst($col["Field"]),
                "show" => true,
                "position" => $key
            ];
        }
    }

    // Ordenar las columnas según la posición definida
    usort($user_cols_array, function ($a, $b) {
        return intval($a["position"]) - intval($b["position"]);
    });

    return $user_cols_array;
}





// 
function budget_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `budget_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function budget_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `budget_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function budget_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `budget_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function budget_lines_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `budget_id`,  `order_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`   
    
    FROM `budget_lines` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function budget_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `budget_id`,  `order_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`   
    FROM `budget_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function budget_lines_edit($id ,  $budget_id ,  $order_id ,  $category_code ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `budget_id` =:budget_id, `order_id` =:order_id, `category_code` =:category_code, `code` =:code, `quantity` =:quantity, `description` =:description, `price` =:price, `discounts` =:discounts, `discounts_mode` =:discounts_mode, `tax` =:tax, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "budget_id" =>$budget_id ,  
 "order_id" =>$order_id ,  
 "category_code" =>$category_code ,  
 "code" =>$code ,  
 "quantity" =>$quantity ,  
 "description" =>$description ,  
 "price" =>$price ,  
 "discounts" =>$discounts ,  
 "discounts_mode" =>$discounts_mode ,  
 "tax" =>$tax ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function budget_lines_add($budget_id ,  $order_id ,  $category_code ,  $code ,  $quantity ,  $description ,  $price ,  $discounts ,  $discounts_mode ,  $tax ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budget_lines` ( `id` ,   `budget_id` ,   `order_id` ,   `category_code` ,   `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :budget_id ,  :order_id ,  :category_code ,  :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "budget_id" => $budget_id ,  
 "order_id" => $order_id ,  
 "category_code" => $category_code ,  
 "code" => $code ,  
 "quantity" => $quantity ,  
 "description" => $description ,  
 "price" => $price ,  
 "discounts" => $discounts ,  
 "discounts_mode" => $discounts_mode ,  
 "tax" => $tax ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function budget_lines_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `budget_id`,  `order_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`    
            FROM `budget_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `budget_id` like :txt
OR `order_id` like :txt
OR `category_code` like :txt
OR `code` like :txt
OR `quantity` like :txt
OR `description` like :txt
OR `price` like :txt
OR `discounts` like :txt
OR `discounts_mode` like :txt
OR `tax` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
        

    ORDER BY $order_col $order_way 
    
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

function budget_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (budget_lines_list() as $key => $value) {
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
function budget_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `budget_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function budget_lines_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `budget_id`,  `order_id`,  `category_code`,  `code`,  `quantity`,  `description`,  `price`,  `discounts`,  `discounts_mode`,  `tax`,  `order_by`,  `status`    FROM `budget_lines` 

    WHERE `$field` = '$txt' 
    
    ORDER BY $order_col $order_way 
    
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

function budget_lines_db_show_col_from_table($c) {
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
function budget_lines_db_col_list_from_table($c){
    $list = array();
    foreach (budget_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function budget_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_budget_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `budget_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_order_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `order_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_category_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `category_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_quantity($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `quantity`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_price($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `price`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_discounts($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `discounts`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_discounts_mode($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `discounts_mode`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_tax($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `tax`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function budget_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `budget_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function budget_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            budget_lines_update_id($id, $new_data);
            break;

        case "budget_id":
            budget_lines_update_budget_id($id, $new_data);
            break;

        case "order_id":
            budget_lines_update_order_id($id, $new_data);
            break;

        case "category_code":
            budget_lines_update_category_code($id, $new_data);
            break;

        case "code":
            budget_lines_update_code($id, $new_data);
            break;

        case "quantity":
            budget_lines_update_quantity($id, $new_data);
            break;

        case "description":
            budget_lines_update_description($id, $new_data);
            break;

        case "price":
            budget_lines_update_price($id, $new_data);
            break;

        case "discounts":
            budget_lines_update_discounts($id, $new_data);
            break;

        case "discounts_mode":
            budget_lines_update_discounts_mode($id, $new_data);
            break;

        case "tax":
            budget_lines_update_tax($id, $new_data);
            break;

        case "order_by":
            budget_lines_update_order_by($id, $new_data);
            break;

        case "status":
            budget_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function budget_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `budget_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/budget_lines/functions.php
// and comment here (this function)
function budget_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "budget_id":
            //return budgets_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_id":
            //return orders_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category_code":
            //return budgets_categories_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "quantity":
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
        case "discounts":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "discounts_mode":
            //return discounts_mode_field_id("discount", $value);
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
function budget_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `budget_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_budget_id($budget_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `budget_id` FROM `budget_lines` WHERE   `budget_id` = ?");
    $req->execute(array($budget_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_order_id($order_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_id` FROM `budget_lines` WHERE   `order_id` = ?");
    $req->execute(array($order_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_category_code($category_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category_code` FROM `budget_lines` WHERE   `category_code` = ?");
    $req->execute(array($category_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `budget_lines` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_quantity($quantity){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `quantity` FROM `budget_lines` WHERE   `quantity` = ?");
    $req->execute(array($quantity));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `budget_lines` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_price($price){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `price` FROM `budget_lines` WHERE   `price` = ?");
    $req->execute(array($price));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_discounts($discounts){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `discounts` FROM `budget_lines` WHERE   `discounts` = ?");
    $req->execute(array($discounts));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_discounts_mode($discounts_mode){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `discounts_mode` FROM `budget_lines` WHERE   `discounts_mode` = ?");
    $req->execute(array($discounts_mode));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_tax($tax){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax` FROM `budget_lines` WHERE   `tax` = ?");
    $req->execute(array($tax));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `budget_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function budget_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `budget_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function budget_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function budget_lines_is_budget_id($budget_id){
     return true;
}

function budget_lines_is_order_id($order_id){
     return true;
}

function budget_lines_is_category_code($category_code){
     return true;
}

function budget_lines_is_code($code){
     return true;
}

function budget_lines_is_quantity($quantity){
     return true;
}

function budget_lines_is_description($description){
     return true;
}

function budget_lines_is_price($price){
     return true;
}

function budget_lines_is_discounts($discounts){
     return true;
}

function budget_lines_is_discounts_mode($discounts_mode){
     return true;
}

function budget_lines_is_tax($tax){
     return true;
}

function budget_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function budget_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function budget_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, budget_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function budget_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (budget_lines_is_id($value)) ? true : false;
            break;
     case "budget_id":
            $is = (budget_lines_is_budget_id($value)) ? true : false;
            break;
     case "order_id":
            $is = (budget_lines_is_order_id($value)) ? true : false;
            break;
     case "category_code":
            $is = (budget_lines_is_category_code($value)) ? true : false;
            break;
     case "code":
            $is = (budget_lines_is_code($value)) ? true : false;
            break;
     case "quantity":
            $is = (budget_lines_is_quantity($value)) ? true : false;
            break;
     case "description":
            $is = (budget_lines_is_description($value)) ? true : false;
            break;
     case "price":
            $is = (budget_lines_is_price($value)) ? true : false;
            break;
     case "discounts":
            $is = (budget_lines_is_discounts($value)) ? true : false;
            break;
     case "discounts_mode":
            $is = (budget_lines_is_discounts_mode($value)) ? true : false;
            break;
     case "tax":
            $is = (budget_lines_is_tax($value)) ? true : false;
            break;
     case "order_by":
            $is = (budget_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (budget_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function budget_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=budget_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'budget_id':
                echo '<th>' . _tr(ucfirst('budget_id')) . '</th>';
                break;
case 'order_id':
                echo '<th>' . _tr(ucfirst('order_id')) . '</th>';
                break;
case 'category_code':
                echo '<th>' . _tr(ucfirst('category_code')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'quantity':
                echo '<th>' . _tr(ucfirst('quantity')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'price':
                echo '<th>' . _tr(ucfirst('price')) . '</th>';
                break;
case 'discounts':
                echo '<th>' . _tr(ucfirst('discounts')) . '</th>';
                break;
case 'discounts_mode':
                echo '<th>' . _tr(ucfirst('discounts_mode')) . '</th>';
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

function budget_lines_index_generate_column_body_td($budget_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=budget_lines&a=details&id=' . $budget_lines[$col] . '">' . $budget_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'budget_id':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'order_id':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'category_code':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'quantity':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'price':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'discounts':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'discounts_mode':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'tax':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=budget_lines&a=details&id=' . $budget_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=budget_lines&a=details_payement&id=' . $budget_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=budget_lines&a=edit&id=' . $budget_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=budget_lines&a=ok_delete&id=' . $budget_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=budget_lines&a=export_pdf&id=' . $budget_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=budget_lines&a=export_pdf&way=pdf&&id=' . $budget_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($budget_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
