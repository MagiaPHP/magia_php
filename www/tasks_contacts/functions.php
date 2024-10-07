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
# Fecha de creacion del documento: 2024-09-26 17:09:16 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-26 17:09:16 


// 

//function tasks_contacts_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function tasks_contacts_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("tasks_contacts_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("tasks_contacts"); // Obtener columnas de la tabla de la base de datos
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
function tasks_contacts_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_contacts` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_contacts_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_contacts` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_contacts_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `tasks_contacts` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function tasks_contacts_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `task_id`,  `contact_id`,  `date_registred`,  `order_by`,  `status`   
    
    FROM `tasks_contacts` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function tasks_contacts_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `task_id`,  `contact_id`,  `date_registred`,  `order_by`,  `status`   
    FROM `tasks_contacts` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function tasks_contacts_edit($id ,  $task_id ,  $contact_id ,  $date_registred ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `task_id` =:task_id, `contact_id` =:contact_id, `date_registred` =:date_registred, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "task_id" =>$task_id ,  
 "contact_id" =>$contact_id ,  
 "date_registred" =>$date_registred ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function tasks_contacts_add($task_id ,  $contact_id ,  $date_registred ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `tasks_contacts` ( `id` ,   `task_id` ,   `contact_id` ,   `date_registred` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :task_id ,  :contact_id ,  :date_registred ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "task_id" => $task_id ,  
 "contact_id" => $contact_id ,  
 "date_registred" => $date_registred ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function tasks_contacts_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `task_id`,  `contact_id`,  `date_registred`,  `order_by`,  `status`    
            FROM `tasks_contacts` 
            WHERE `id` = :txt OR `id` like :txt
OR `task_id` like :txt
OR `contact_id` like :txt
OR `date_registred` like :txt
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

function tasks_contacts_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (tasks_contacts_list() as $key => $value) {
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
function tasks_contacts_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `tasks_contacts` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function tasks_contacts_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `task_id`,  `contact_id`,  `date_registred`,  `order_by`,  `status`    FROM `tasks_contacts` 

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

function tasks_contacts_db_show_col_from_table($c) {
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
function tasks_contacts_db_col_list_from_table($c){
    $list = array();
    foreach (tasks_contacts_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function tasks_contacts_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_contacts_update_task_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `task_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_contacts_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_contacts_update_date_registred($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `date_registred`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_contacts_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function tasks_contacts_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `tasks_contacts` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function tasks_contacts_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            tasks_contacts_update_id($id, $new_data);
            break;

        case "task_id":
            tasks_contacts_update_task_id($id, $new_data);
            break;

        case "contact_id":
            tasks_contacts_update_contact_id($id, $new_data);
            break;

        case "date_registred":
            tasks_contacts_update_date_registred($id, $new_data);
            break;

        case "order_by":
            tasks_contacts_update_order_by($id, $new_data);
            break;

        case "status":
            tasks_contacts_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function tasks_contacts_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `tasks_contacts` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/tasks_contacts/functions.php
// and comment here (this function)
function tasks_contacts_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "task_id":
            //return tasks_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_registred":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "status":
            //return tasks_status_field_id("code", $value);
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
function tasks_contacts_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `tasks_contacts` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_contacts_exists_task_id($task_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `task_id` FROM `tasks_contacts` WHERE   `task_id` = ?");
    $req->execute(array($task_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_contacts_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `tasks_contacts` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_contacts_exists_date_registred($date_registred){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registred` FROM `tasks_contacts` WHERE   `date_registred` = ?");
    $req->execute(array($date_registred));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_contacts_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `tasks_contacts` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function tasks_contacts_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `tasks_contacts` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function tasks_contacts_is_id($id){
     return (is_id($id) )? true : false ;
}

function tasks_contacts_is_task_id($task_id){
     return true;
}

function tasks_contacts_is_contact_id($contact_id){
     return true;
}

function tasks_contacts_is_date_registred($date_registred){
     return true;
}

function tasks_contacts_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function tasks_contacts_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function tasks_contacts_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, tasks_contacts_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function tasks_contacts_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (tasks_contacts_is_id($value)) ? true : false;
            break;
     case "task_id":
            $is = (tasks_contacts_is_task_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (tasks_contacts_is_contact_id($value)) ? true : false;
            break;
     case "date_registred":
            $is = (tasks_contacts_is_date_registred($value)) ? true : false;
            break;
     case "order_by":
            $is = (tasks_contacts_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (tasks_contacts_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function tasks_contacts_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=tasks_contacts&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'task_id':
                echo '<th>' . _tr(ucfirst('task_id')) . '</th>';
                break;
case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'date_registred':
                echo '<th>' . _tr(ucfirst('date_registred')) . '</th>';
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

function tasks_contacts_index_generate_column_body_td($tasks_contacts, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=tasks_contacts&a=details&id=' . $tasks_contacts[$col] . '">' . $tasks_contacts[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
case 'task_id':
                echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
case 'date_registred':
                echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=tasks_contacts&a=details&id=' . $tasks_contacts['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=tasks_contacts&a=details_payement&id=' . $tasks_contacts['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=tasks_contacts&a=edit&id=' . $tasks_contacts['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=tasks_contacts&a=ok_delete&id=' . $tasks_contacts['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=tasks_contacts&a=export_pdf&id=' . $tasks_contacts['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=tasks_contacts&a=export_pdf&way=pdf&&id=' . $tasks_contacts['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($tasks_contacts[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
