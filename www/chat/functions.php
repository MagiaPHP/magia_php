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
# Fecha de creacion del documento: 2024-09-16 19:09:36 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 19:09:36 


// 

//function chat_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function chat_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("chat_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("chat"); // Obtener columnas de la tabla de la base de datos
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
function chat_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `chat` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function chat_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `chat` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function chat_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `chat` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function chat_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `order_id`,  `message`,  `user`   
    
    FROM `chat` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function chat_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `order_id`,  `message`,  `user`   
    FROM `chat` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function chat_edit($id ,  $contact_id ,  $order_id ,  $message ,  $user   ) {

    global $db;
    $req = $db->prepare(" UPDATE `chat` SET `contact_id` =:contact_id, `order_id` =:order_id, `message` =:message, `user` =:user  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "order_id" =>$order_id ,  
 "message" =>$message ,  
 "user" =>$user ,  

));
}

function chat_add($contact_id ,  $order_id ,  $message ,  $user   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `chat` ( `id` ,   `contact_id` ,   `order_id` ,   `message` ,   `user`   )
                                       VALUES  (:id ,  :contact_id ,  :order_id ,  :message ,  :user   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "order_id" => $order_id ,  
 "message" => $message ,  
 "user" => $user   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function chat_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `order_id`,  `message`,  `user`    
            FROM `chat` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `order_id` like :txt
OR `message` like :txt
OR `user` like :txt
 
        

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

function chat_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (chat_list() as $key => $value) {
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
function chat_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `chat` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function chat_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `order_id`,  `message`,  `user`    FROM `chat` 

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

function chat_db_show_col_from_table($c) {
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
function chat_db_col_list_from_table($c){
    $list = array();
    foreach (chat_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function chat_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `chat` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function chat_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `chat` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function chat_update_order_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `chat` SET `order_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function chat_update_message($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `chat` SET `message`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function chat_update_user($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `chat` SET `user`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function chat_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            chat_update_id($id, $new_data);
            break;

        case "contact_id":
            chat_update_contact_id($id, $new_data);
            break;

        case "order_id":
            chat_update_order_id($id, $new_data);
            break;

        case "message":
            chat_update_message($id, $new_data);
            break;

        case "user":
            chat_update_user($id, $new_data);
            break;


        default:
            break;
    }
}
//
function chat_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `chat` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/chat/functions.php
// and comment here (this function)
function chat_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return users_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "message":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "user":
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
function chat_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `chat` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function chat_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `chat` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function chat_exists_order_id($order_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_id` FROM `chat` WHERE   `order_id` = ?");
    $req->execute(array($order_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function chat_exists_message($message){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `message` FROM `chat` WHERE   `message` = ?");
    $req->execute(array($message));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function chat_exists_user($user){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `user` FROM `chat` WHERE   `user` = ?");
    $req->execute(array($user));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function chat_is_id($id){
     return (is_id($id) )? true : false ;
}

function chat_is_contact_id($contact_id){
     return true;
}

function chat_is_order_id($order_id){
     return true;
}

function chat_is_message($message){
     return true;
}

function chat_is_user($user){
     return true;
}


//
//
function chat_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, chat_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function chat_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (chat_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (chat_is_contact_id($value)) ? true : false;
            break;
     case "order_id":
            $is = (chat_is_order_id($value)) ? true : false;
            break;
     case "message":
            $is = (chat_is_message($value)) ? true : false;
            break;
     case "user":
            $is = (chat_is_user($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function chat_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=chat&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'order_id':
                echo '<th>' . _tr(ucfirst('order_id')) . '</th>';
                break;
case 'message':
                echo '<th>' . _tr(ucfirst('message')) . '</th>';
                break;
case 'user':
                echo '<th>' . _tr(ucfirst('user')) . '</th>';
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

function chat_index_generate_column_body_td($chat, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=chat&a=details&id=' . $chat[$col] . '">' . $chat[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($chat[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($chat[$col]) . '</td>';
                break;
case 'order_id':
                echo '<td>' . ($chat[$col]) . '</td>';
                break;
case 'message':
                echo '<td>' . ($chat[$col]) . '</td>';
                break;
case 'user':
                echo '<td>' . ($chat[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=chat&a=details&id=' . $chat['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=chat&a=details_payement&id=' . $chat['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=chat&a=edit&id=' . $chat['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=chat&a=ok_delete&id=' . $chat['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=chat&a=export_pdf&id=' . $chat['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=chat&a=export_pdf&way=pdf&&id=' . $chat['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($chat[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
