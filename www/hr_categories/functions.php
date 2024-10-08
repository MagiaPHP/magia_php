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
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:52 


// 

//function hr_categories_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_categories_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_categories_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_categories"); // Obtener columnas de la tabla de la base de datos
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
function hr_categories_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_categories` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_categories_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_categories` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_categories_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_categories` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_categories_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `code`,  `description`,  `parent_id`,  `child_ids`,  `order_by`,  `status`   
    
    FROM `hr_categories` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_categories_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `code`,  `description`,  `parent_id`,  `child_ids`,  `order_by`,  `status`   
    FROM `hr_categories` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_categories_edit($id ,  $code ,  $description ,  $parent_id ,  $child_ids ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `code` =:code, `description` =:description, `parent_id` =:parent_id, `child_ids` =:child_ids, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "code" =>$code ,  
 "description" =>$description ,  
 "parent_id" =>$parent_id ,  
 "child_ids" =>$child_ids ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_categories_add($code ,  $description ,  $parent_id ,  $child_ids ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_categories` ( `id` ,   `code` ,   `description` ,   `parent_id` ,   `child_ids` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :description ,  :parent_id ,  :child_ids ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "code" => $code ,  
 "description" => $description ,  
 "parent_id" => $parent_id ,  
 "child_ids" => $child_ids ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_categories_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `code`,  `description`,  `parent_id`,  `child_ids`,  `order_by`,  `status`    
            FROM `hr_categories` 
            WHERE `id` = :txt OR `id` like :txt
OR `code` like :txt
OR `description` like :txt
OR `parent_id` like :txt
OR `child_ids` like :txt
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

function hr_categories_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_categories_list() as $key => $value) {
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
function hr_categories_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_categories` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_categories_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `code`,  `description`,  `parent_id`,  `child_ids`,  `order_by`,  `status`    FROM `hr_categories` 

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

function hr_categories_db_show_col_from_table($c) {
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
function hr_categories_db_col_list_from_table($c){
    $list = array();
    foreach (hr_categories_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_categories_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_categories_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_categories_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_categories_update_parent_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `parent_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_categories_update_child_ids($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `child_ids`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_categories_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_categories_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_categories` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_categories_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_categories_update_id($id, $new_data);
            break;

        case "code":
            hr_categories_update_code($id, $new_data);
            break;

        case "description":
            hr_categories_update_description($id, $new_data);
            break;

        case "parent_id":
            hr_categories_update_parent_id($id, $new_data);
            break;

        case "child_ids":
            hr_categories_update_child_ids($id, $new_data);
            break;

        case "order_by":
            hr_categories_update_order_by($id, $new_data);
            break;

        case "status":
            hr_categories_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_categories_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_categories` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_categories/functions.php
// and comment here (this function)
function hr_categories_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "parent_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "child_ids":
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
function hr_categories_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_categories` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_categories_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `hr_categories` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_categories_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `hr_categories` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_categories_exists_parent_id($parent_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `parent_id` FROM `hr_categories` WHERE   `parent_id` = ?");
    $req->execute(array($parent_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_categories_exists_child_ids($child_ids){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `child_ids` FROM `hr_categories` WHERE   `child_ids` = ?");
    $req->execute(array($child_ids));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_categories_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_categories` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_categories_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_categories` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_categories_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_categories_is_code($code){
     return true;
}

function hr_categories_is_description($description){
     return true;
}

function hr_categories_is_parent_id($parent_id){
     return true;
}

function hr_categories_is_child_ids($child_ids){
     return true;
}

function hr_categories_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_categories_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_categories_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_categories_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_categories_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_categories_is_id($value)) ? true : false;
            break;
     case "code":
            $is = (hr_categories_is_code($value)) ? true : false;
            break;
     case "description":
            $is = (hr_categories_is_description($value)) ? true : false;
            break;
     case "parent_id":
            $is = (hr_categories_is_parent_id($value)) ? true : false;
            break;
     case "child_ids":
            $is = (hr_categories_is_child_ids($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_categories_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_categories_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_categories_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_categories&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'parent_id':
                echo '<th>' . _tr(ucfirst('parent_id')) . '</th>';
                break;
case 'child_ids':
                echo '<th>' . _tr(ucfirst('child_ids')) . '</th>';
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

function hr_categories_index_generate_column_body_td($hr_categories, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_categories&a=details&id=' . $hr_categories[$col] . '">' . $hr_categories[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
case 'parent_id':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
case 'child_ids':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_categories&a=details&id=' . $hr_categories['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_categories&a=details_payement&id=' . $hr_categories['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_categories&a=edit&id=' . $hr_categories['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_categories&a=ok_delete&id=' . $hr_categories['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_categories&a=export_pdf&id=' . $hr_categories['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_categories&a=export_pdf&way=pdf&&id=' . $hr_categories['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_categories[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
