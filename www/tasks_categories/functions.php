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
# Fecha de creacion del documento: 2024-09-27 08:09:04 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-27 08:09:04 


// 

//function tasks_categories_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function tasks_categories_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("tasks_categories_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("tasks_categories"); // Obtener columnas de la tabla de la base de datos
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
function tasks_categories_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_categories` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_categories_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_categories` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_categories_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_categories` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_categories_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `father_id`,  `category`,  `color`,  `icon`,  `order_by`,  `status`   
    
    FROM `tasks_categories` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function tasks_categories_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `father_id`,  `category`,  `color`,  `icon`,  `order_by`,  `status`   
    FROM `tasks_categories` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function tasks_categories_edit($id ,  $father_id ,  $category ,  $color ,  $icon ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `father_id` =:father_id, `category` =:category, `color` =:color, `icon` =:icon, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "father_id" =>$father_id ,  
 "category" =>$category ,  
 "color" =>$color ,  
 "icon" =>$icon ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function tasks_categories_add($father_id ,  $category ,  $color ,  $icon ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tasks_categories` ( `id` ,   `father_id` ,   `category` ,   `color` ,   `icon` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :father_id ,  :category ,  :color ,  :icon ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "father_id" => $father_id ,  
 "category" => $category ,  
 "color" => $color ,  
 "icon" => $icon ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function tasks_categories_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `father_id`,  `category`,  `color`,  `icon`,  `order_by`,  `status`    
            FROM `tasks_categories` 
            WHERE `id` = :txt OR `id` like :txt
OR `father_id` like :txt
OR `category` like :txt
OR `color` like :txt
OR `icon` like :txt
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

function tasks_categories_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (tasks_categories_list() as $key => $value) {
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
function tasks_categories_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `tasks_categories` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function tasks_categories_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `father_id`,  `category`,  `color`,  `icon`,  `order_by`,  `status`    FROM `tasks_categories` 

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

function tasks_categories_db_show_col_from_table($c) {
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
function tasks_categories_db_col_list_from_table($c){
    $list = array();
    foreach (tasks_categories_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function tasks_categories_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_categories_update_father_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `father_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_categories_update_category($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `category`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_categories_update_color($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `color`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_categories_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_categories_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_categories_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_categories` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function tasks_categories_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            tasks_categories_update_id($id, $new_data);
            break;

        case "father_id":
            tasks_categories_update_father_id($id, $new_data);
            break;

        case "category":
            tasks_categories_update_category($id, $new_data);
            break;

        case "color":
            tasks_categories_update_color($id, $new_data);
            break;

        case "icon":
            tasks_categories_update_icon($id, $new_data);
            break;

        case "order_by":
            tasks_categories_update_order_by($id, $new_data);
            break;

        case "status":
            tasks_categories_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function tasks_categories_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `tasks_categories` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/tasks_categories/functions.php
// and comment here (this function)
function tasks_categories_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "father_id":
            //return tasks_categories_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "color":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "icon":
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
function tasks_categories_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `tasks_categories` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_categories_exists_father_id($father_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `father_id` FROM `tasks_categories` WHERE   `father_id` = ?");
    $req->execute(array($father_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_categories_exists_category($category){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category` FROM `tasks_categories` WHERE   `category` = ?");
    $req->execute(array($category));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_categories_exists_color($color){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `color` FROM `tasks_categories` WHERE   `color` = ?");
    $req->execute(array($color));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_categories_exists_icon($icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `tasks_categories` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_categories_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `tasks_categories` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_categories_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `tasks_categories` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function tasks_categories_is_id($id){
     return (is_id($id) )? true : false ;
}

function tasks_categories_is_father_id($father_id){
     return true;
}

function tasks_categories_is_category($category){
     return true;
}

function tasks_categories_is_color($color){
     return true;
}

function tasks_categories_is_icon($icon){
     return true;
}

function tasks_categories_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function tasks_categories_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function tasks_categories_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, tasks_categories_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function tasks_categories_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (tasks_categories_is_id($value)) ? true : false;
            break;
     case "father_id":
            $is = (tasks_categories_is_father_id($value)) ? true : false;
            break;
     case "category":
            $is = (tasks_categories_is_category($value)) ? true : false;
            break;
     case "color":
            $is = (tasks_categories_is_color($value)) ? true : false;
            break;
     case "icon":
            $is = (tasks_categories_is_icon($value)) ? true : false;
            break;
     case "order_by":
            $is = (tasks_categories_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (tasks_categories_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function tasks_categories_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=tasks_categories&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'father_id':
                echo '<th>' . _tr(ucfirst('father_id')) . '</th>';
                break;
case 'category':
                echo '<th>' . _tr(ucfirst('category')) . '</th>';
                break;
case 'color':
                echo '<th>' . _tr(ucfirst('color')) . '</th>';
                break;
case 'icon':
                echo '<th>' . _tr(ucfirst('icon')) . '</th>';
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

function tasks_categories_index_generate_column_body_td($tasks_categories, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=tasks_categories&a=details&id=' . $tasks_categories[$col] . '">' . $tasks_categories[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
case 'father_id':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
case 'category':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
case 'color':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
case 'icon':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=tasks_categories&a=details&id=' . $tasks_categories['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=tasks_categories&a=details_payement&id=' . $tasks_categories['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=tasks_categories&a=edit&id=' . $tasks_categories['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=tasks_categories&a=ok_delete&id=' . $tasks_categories['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=tasks_categories&a=export_pdf&id=' . $tasks_categories['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=tasks_categories&a=export_pdf&way=pdf&&id=' . $tasks_categories['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($tasks_categories[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
