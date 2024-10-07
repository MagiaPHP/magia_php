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
# Fecha de creacion del documento: 2024-09-21 12:09:54 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:54 


// 

//function hr_payroll_lines_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_payroll_lines_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_payroll_lines_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_payroll_lines"); // Obtener columnas de la tabla de la base de datos
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
function hr_payroll_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_lines_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `payroll_id`,  `code`,  `in_out`,  `days`,  `quantity`,  `value`,  `description`,  `formula`,  `order_by`,  `status`   
    
    FROM `hr_payroll_lines` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_payroll_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `payroll_id`,  `code`,  `in_out`,  `days`,  `quantity`,  `value`,  `description`,  `formula`,  `order_by`,  `status`   
    FROM `hr_payroll_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_payroll_lines_edit($id ,  $payroll_id ,  $code ,  $in_out ,  $days ,  $quantity ,  $value ,  $description ,  $formula ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `payroll_id` =:payroll_id, `code` =:code, `in_out` =:in_out, `days` =:days, `quantity` =:quantity, `value` =:value, `description` =:description, `formula` =:formula, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "payroll_id" =>$payroll_id ,  
 "code" =>$code ,  
 "in_out" =>$in_out ,  
 "days" =>$days ,  
 "quantity" =>$quantity ,  
 "value" =>$value ,  
 "description" =>$description ,  
 "formula" =>$formula ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_payroll_lines_add($payroll_id ,  $code ,  $in_out ,  $days ,  $quantity ,  $value ,  $description ,  $formula ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_payroll_lines` ( `id` ,   `payroll_id` ,   `code` ,   `in_out` ,   `days` ,   `quantity` ,   `value` ,   `description` ,   `formula` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :payroll_id ,  :code ,  :in_out ,  :days ,  :quantity ,  :value ,  :description ,  :formula ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "payroll_id" => $payroll_id ,  
 "code" => $code ,  
 "in_out" => $in_out ,  
 "days" => $days ,  
 "quantity" => $quantity ,  
 "value" => $value ,  
 "description" => $description ,  
 "formula" => $formula ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_payroll_lines_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `payroll_id`,  `code`,  `in_out`,  `days`,  `quantity`,  `value`,  `description`,  `formula`,  `order_by`,  `status`    
            FROM `hr_payroll_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `payroll_id` like :txt
OR `code` like :txt
OR `in_out` like :txt
OR `days` like :txt
OR `quantity` like :txt
OR `value` like :txt
OR `description` like :txt
OR `formula` like :txt
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

function hr_payroll_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_payroll_lines_list() as $key => $value) {
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
function hr_payroll_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_payroll_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_payroll_lines_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `payroll_id`,  `code`,  `in_out`,  `days`,  `quantity`,  `value`,  `description`,  `formula`,  `order_by`,  `status`    FROM `hr_payroll_lines` 

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

function hr_payroll_lines_db_show_col_from_table($c) {
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
function hr_payroll_lines_db_col_list_from_table($c){
    $list = array();
    foreach (hr_payroll_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_payroll_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_payroll_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `payroll_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_in_out($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `in_out`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_days($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `days`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_quantity($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `quantity`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_formula($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `formula`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_payroll_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_payroll_lines_update_id($id, $new_data);
            break;

        case "payroll_id":
            hr_payroll_lines_update_payroll_id($id, $new_data);
            break;

        case "code":
            hr_payroll_lines_update_code($id, $new_data);
            break;

        case "in_out":
            hr_payroll_lines_update_in_out($id, $new_data);
            break;

        case "days":
            hr_payroll_lines_update_days($id, $new_data);
            break;

        case "quantity":
            hr_payroll_lines_update_quantity($id, $new_data);
            break;

        case "value":
            hr_payroll_lines_update_value($id, $new_data);
            break;

        case "description":
            hr_payroll_lines_update_description($id, $new_data);
            break;

        case "formula":
            hr_payroll_lines_update_formula($id, $new_data);
            break;

        case "order_by":
            hr_payroll_lines_update_order_by($id, $new_data);
            break;

        case "status":
            hr_payroll_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_payroll_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_payroll_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_payroll_lines/functions.php
// and comment here (this function)
function hr_payroll_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "payroll_id":
            //return hr_payroll_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return hr_payroll_items_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "in_out":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "days":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "quantity":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "value":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "formula":
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
function hr_payroll_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_payroll_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_payroll_id($payroll_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `payroll_id` FROM `hr_payroll_lines` WHERE   `payroll_id` = ?");
    $req->execute(array($payroll_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `hr_payroll_lines` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_in_out($in_out){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `in_out` FROM `hr_payroll_lines` WHERE   `in_out` = ?");
    $req->execute(array($in_out));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_days($days){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `days` FROM `hr_payroll_lines` WHERE   `days` = ?");
    $req->execute(array($days));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_quantity($quantity){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `quantity` FROM `hr_payroll_lines` WHERE   `quantity` = ?");
    $req->execute(array($quantity));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_value($value){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value` FROM `hr_payroll_lines` WHERE   `value` = ?");
    $req->execute(array($value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `hr_payroll_lines` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_formula($formula){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `formula` FROM `hr_payroll_lines` WHERE   `formula` = ?");
    $req->execute(array($formula));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_payroll_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_payroll_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_payroll_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_payroll_lines_is_payroll_id($payroll_id){
     return true;
}

function hr_payroll_lines_is_code($code){
     return true;
}

function hr_payroll_lines_is_in_out($in_out){
     return true;
}

function hr_payroll_lines_is_days($days){
     return true;
}

function hr_payroll_lines_is_quantity($quantity){
     return true;
}

function hr_payroll_lines_is_value($value){
     return true;
}

function hr_payroll_lines_is_description($description){
     return true;
}

function hr_payroll_lines_is_formula($formula){
     return true;
}

function hr_payroll_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_payroll_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_payroll_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_payroll_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_payroll_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_payroll_lines_is_id($value)) ? true : false;
            break;
     case "payroll_id":
            $is = (hr_payroll_lines_is_payroll_id($value)) ? true : false;
            break;
     case "code":
            $is = (hr_payroll_lines_is_code($value)) ? true : false;
            break;
     case "in_out":
            $is = (hr_payroll_lines_is_in_out($value)) ? true : false;
            break;
     case "days":
            $is = (hr_payroll_lines_is_days($value)) ? true : false;
            break;
     case "quantity":
            $is = (hr_payroll_lines_is_quantity($value)) ? true : false;
            break;
     case "value":
            $is = (hr_payroll_lines_is_value($value)) ? true : false;
            break;
     case "description":
            $is = (hr_payroll_lines_is_description($value)) ? true : false;
            break;
     case "formula":
            $is = (hr_payroll_lines_is_formula($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_payroll_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_payroll_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_payroll_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_payroll_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'payroll_id':
                echo '<th>' . _tr(ucfirst('payroll_id')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'in_out':
                echo '<th>' . _tr(ucfirst('in_out')) . '</th>';
                break;
case 'days':
                echo '<th>' . _tr(ucfirst('days')) . '</th>';
                break;
case 'quantity':
                echo '<th>' . _tr(ucfirst('quantity')) . '</th>';
                break;
case 'value':
                echo '<th>' . _tr(ucfirst('value')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'formula':
                echo '<th>' . _tr(ucfirst('formula')) . '</th>';
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

function hr_payroll_lines_index_generate_column_body_td($hr_payroll_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_payroll_lines&a=details&id=' . $hr_payroll_lines[$col] . '">' . $hr_payroll_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'payroll_id':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'in_out':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'days':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'quantity':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'value':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'formula':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_payroll_lines&a=details&id=' . $hr_payroll_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_payroll_lines&a=details_payement&id=' . $hr_payroll_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_payroll_lines&a=edit&id=' . $hr_payroll_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_payroll_lines&a=ok_delete&id=' . $hr_payroll_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll_lines&a=export_pdf&id=' . $hr_payroll_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll_lines&a=export_pdf&way=pdf&&id=' . $hr_payroll_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_payroll_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
