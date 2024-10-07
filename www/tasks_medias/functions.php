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
# Fecha de creacion del documento: 2024-09-26 17:09:18 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-26 17:09:18 


// 

//function tasks_medias_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function tasks_medias_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("tasks_medias_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("tasks_medias"); // Obtener columnas de la tabla de la base de datos
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
function tasks_medias_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_medias` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_medias_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_medias` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_medias_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_medias` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_medias_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`   
    
    FROM `tasks_medias` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function tasks_medias_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`   
    FROM `tasks_medias` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function tasks_medias_edit($id ,  $task_id ,  $type ,  $url ,  $description ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `task_id` =:task_id, `type` =:type, `url` =:url, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "task_id" =>$task_id ,  
 "type" =>$type ,  
 "url" =>$url ,  
 "description" =>$description ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function tasks_medias_add($task_id ,  $type ,  $url ,  $description ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tasks_medias` ( `id` ,   `task_id` ,   `type` ,   `url` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :task_id ,  :type ,  :url ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "task_id" => $task_id ,  
 "type" => $type ,  
 "url" => $url ,  
 "description" => $description ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function tasks_medias_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`    
            FROM `tasks_medias` 
            WHERE `id` = :txt OR `id` like :txt
OR `task_id` like :txt
OR `type` like :txt
OR `url` like :txt
OR `description` like :txt
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

function tasks_medias_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (tasks_medias_list() as $key => $value) {
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
function tasks_medias_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `tasks_medias` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function tasks_medias_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `task_id`,  `type`,  `url`,  `description`,  `order_by`,  `status`    FROM `tasks_medias` 

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

function tasks_medias_db_show_col_from_table($c) {
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
function tasks_medias_db_col_list_from_table($c){
    $list = array();
    foreach (tasks_medias_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function tasks_medias_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_medias_update_task_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `task_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_medias_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_medias_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_medias_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_medias_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_medias_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_medias` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function tasks_medias_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            tasks_medias_update_id($id, $new_data);
            break;

        case "task_id":
            tasks_medias_update_task_id($id, $new_data);
            break;

        case "type":
            tasks_medias_update_type($id, $new_data);
            break;

        case "url":
            tasks_medias_update_url($id, $new_data);
            break;

        case "description":
            tasks_medias_update_description($id, $new_data);
            break;

        case "order_by":
            tasks_medias_update_order_by($id, $new_data);
            break;

        case "status":
            tasks_medias_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function tasks_medias_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `tasks_medias` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/tasks_medias/functions.php
// and comment here (this function)
function tasks_medias_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "task_id":
            //return tasks_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "url":
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
function tasks_medias_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `tasks_medias` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_medias_exists_task_id($task_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `task_id` FROM `tasks_medias` WHERE   `task_id` = ?");
    $req->execute(array($task_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_medias_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `tasks_medias` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_medias_exists_url($url){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `tasks_medias` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_medias_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `tasks_medias` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_medias_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `tasks_medias` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_medias_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `tasks_medias` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function tasks_medias_is_id($id){
     return (is_id($id) )? true : false ;
}

function tasks_medias_is_task_id($task_id){
     return true;
}

function tasks_medias_is_type($type){
     return true;
}

function tasks_medias_is_url($url){
     return true;
}

function tasks_medias_is_description($description){
     return true;
}

function tasks_medias_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function tasks_medias_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function tasks_medias_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, tasks_medias_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function tasks_medias_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (tasks_medias_is_id($value)) ? true : false;
            break;
     case "task_id":
            $is = (tasks_medias_is_task_id($value)) ? true : false;
            break;
     case "type":
            $is = (tasks_medias_is_type($value)) ? true : false;
            break;
     case "url":
            $is = (tasks_medias_is_url($value)) ? true : false;
            break;
     case "description":
            $is = (tasks_medias_is_description($value)) ? true : false;
            break;
     case "order_by":
            $is = (tasks_medias_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (tasks_medias_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function tasks_medias_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=tasks_medias&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'task_id':
                echo '<th>' . _tr(ucfirst('task_id')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'url':
                echo '<th>' . _tr(ucfirst('url')) . '</th>';
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

function tasks_medias_index_generate_column_body_td($tasks_medias, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=tasks_medias&a=details&id=' . $tasks_medias[$col] . '">' . $tasks_medias[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
case 'task_id':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
case 'url':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=tasks_medias&a=details&id=' . $tasks_medias['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=tasks_medias&a=details_payement&id=' . $tasks_medias['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=tasks_medias&a=edit&id=' . $tasks_medias['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=tasks_medias&a=ok_delete&id=' . $tasks_medias['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=tasks_medias&a=export_pdf&id=' . $tasks_medias['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=tasks_medias&a=export_pdf&way=pdf&&id=' . $tasks_medias['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($tasks_medias[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
