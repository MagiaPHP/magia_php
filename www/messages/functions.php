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
# Fecha de creacion del documento: 2024-09-26 08:09:54 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-26 08:09:54 


// 

//function messages_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function messages_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("messages_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("messages"); // Obtener columnas de la tabla de la base de datos
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
function messages_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `messages` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function messages_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `messages` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function messages_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `messages` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function messages_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `type`,  `message`,  `url_action`,  `url_label`,  `controller`,  `doc_id`,  `contact_id`,  `rol`,  `date_start`,  `date_end`,  `date_registre`,  `read_by`,  `is_logued`,  `order_by`,  `status`   
    
    FROM `messages` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function messages_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `type`,  `message`,  `url_action`,  `url_label`,  `controller`,  `doc_id`,  `contact_id`,  `rol`,  `date_start`,  `date_end`,  `date_registre`,  `read_by`,  `is_logued`,  `order_by`,  `status`   
    FROM `messages` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function messages_edit($id ,  $type ,  $message ,  $url_action ,  $url_label ,  $controller ,  $doc_id ,  $contact_id ,  $rol ,  $date_start ,  $date_end ,  $date_registre ,  $read_by ,  $is_logued ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `type` =:type, `message` =:message, `url_action` =:url_action, `url_label` =:url_label, `controller` =:controller, `doc_id` =:doc_id, `contact_id` =:contact_id, `rol` =:rol, `date_start` =:date_start, `date_end` =:date_end, `date_registre` =:date_registre, `read_by` =:read_by, `is_logued` =:is_logued, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "type" =>$type ,  
 "message" =>$message ,  
 "url_action" =>$url_action ,  
 "url_label" =>$url_label ,  
 "controller" =>$controller ,  
 "doc_id" =>$doc_id ,  
 "contact_id" =>$contact_id ,  
 "rol" =>$rol ,  
 "date_start" =>$date_start ,  
 "date_end" =>$date_end ,  
 "date_registre" =>$date_registre ,  
 "read_by" =>$read_by ,  
 "is_logued" =>$is_logued ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function messages_add($type ,  $message ,  $url_action ,  $url_label ,  $controller ,  $doc_id ,  $contact_id ,  $rol ,  $date_start ,  $date_end ,  $date_registre ,  $read_by ,  $is_logued ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `messages` ( `id` ,   `type` ,   `message` ,   `url_action` ,   `url_label` ,   `controller` ,   `doc_id` ,   `contact_id` ,   `rol` ,   `date_start` ,   `date_end` ,   `date_registre` ,   `read_by` ,   `is_logued` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :type ,  :message ,  :url_action ,  :url_label ,  :controller ,  :doc_id ,  :contact_id ,  :rol ,  :date_start ,  :date_end ,  :date_registre ,  :read_by ,  :is_logued ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "type" => $type ,  
 "message" => $message ,  
 "url_action" => $url_action ,  
 "url_label" => $url_label ,  
 "controller" => $controller ,  
 "doc_id" => $doc_id ,  
 "contact_id" => $contact_id ,  
 "rol" => $rol ,  
 "date_start" => $date_start ,  
 "date_end" => $date_end ,  
 "date_registre" => $date_registre ,  
 "read_by" => $read_by ,  
 "is_logued" => $is_logued ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function messages_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `type`,  `message`,  `url_action`,  `url_label`,  `controller`,  `doc_id`,  `contact_id`,  `rol`,  `date_start`,  `date_end`,  `date_registre`,  `read_by`,  `is_logued`,  `order_by`,  `status`    
            FROM `messages` 
            WHERE `id` = :txt OR `id` like :txt
OR `type` like :txt
OR `message` like :txt
OR `url_action` like :txt
OR `url_label` like :txt
OR `controller` like :txt
OR `doc_id` like :txt
OR `contact_id` like :txt
OR `rol` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
OR `date_registre` like :txt
OR `read_by` like :txt
OR `is_logued` like :txt
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

function messages_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (messages_list() as $key => $value) {
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
function messages_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `messages` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function messages_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `type`,  `message`,  `url_action`,  `url_label`,  `controller`,  `doc_id`,  `contact_id`,  `rol`,  `date_start`,  `date_end`,  `date_registre`,  `read_by`,  `is_logued`,  `order_by`,  `status`    FROM `messages` 

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

function messages_db_show_col_from_table($c) {
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
function messages_db_col_list_from_table($c){
    $list = array();
    foreach (messages_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function messages_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_message($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `message`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_url_action($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `url_action`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_url_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `url_label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_doc_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `doc_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_rol($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `rol`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_read_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `read_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_is_logued($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `is_logued`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function messages_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `messages` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function messages_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            messages_update_id($id, $new_data);
            break;

        case "type":
            messages_update_type($id, $new_data);
            break;

        case "message":
            messages_update_message($id, $new_data);
            break;

        case "url_action":
            messages_update_url_action($id, $new_data);
            break;

        case "url_label":
            messages_update_url_label($id, $new_data);
            break;

        case "controller":
            messages_update_controller($id, $new_data);
            break;

        case "doc_id":
            messages_update_doc_id($id, $new_data);
            break;

        case "contact_id":
            messages_update_contact_id($id, $new_data);
            break;

        case "rol":
            messages_update_rol($id, $new_data);
            break;

        case "date_start":
            messages_update_date_start($id, $new_data);
            break;

        case "date_end":
            messages_update_date_end($id, $new_data);
            break;

        case "date_registre":
            messages_update_date_registre($id, $new_data);
            break;

        case "read_by":
            messages_update_read_by($id, $new_data);
            break;

        case "is_logued":
            messages_update_is_logued($id, $new_data);
            break;

        case "order_by":
            messages_update_order_by($id, $new_data);
            break;

        case "status":
            messages_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function messages_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `messages` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/messages/functions.php
// and comment here (this function)
function messages_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "message":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "url_action":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "url_label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "controller":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "doc_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "rol":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_end":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_registre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "read_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "is_logued":
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
function messages_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `messages` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `messages` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_message($message){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `message` FROM `messages` WHERE   `message` = ?");
    $req->execute(array($message));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_url_action($url_action){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url_action` FROM `messages` WHERE   `url_action` = ?");
    $req->execute(array($url_action));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_url_label($url_label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url_label` FROM `messages` WHERE   `url_label` = ?");
    $req->execute(array($url_label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_controller($controller){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `messages` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_doc_id($doc_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `doc_id` FROM `messages` WHERE   `doc_id` = ?");
    $req->execute(array($doc_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `messages` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_rol($rol){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `rol` FROM `messages` WHERE   `rol` = ?");
    $req->execute(array($rol));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_date_start($date_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `messages` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_date_end($date_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `messages` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `messages` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_read_by($read_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `read_by` FROM `messages` WHERE   `read_by` = ?");
    $req->execute(array($read_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_is_logued($is_logued){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `is_logued` FROM `messages` WHERE   `is_logued` = ?");
    $req->execute(array($is_logued));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `messages` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function messages_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `messages` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function messages_is_id($id){
     return (is_id($id) )? true : false ;
}

function messages_is_type($type){
     return true;
}

function messages_is_message($message){
     return true;
}

function messages_is_url_action($url_action){
     return true;
}

function messages_is_url_label($url_label){
     return true;
}

function messages_is_controller($controller){
     return true;
}

function messages_is_doc_id($doc_id){
     return true;
}

function messages_is_contact_id($contact_id){
     return true;
}

function messages_is_rol($rol){
     return true;
}

function messages_is_date_start($date_start){
     return true;
}

function messages_is_date_end($date_end){
     return true;
}

function messages_is_date_registre($date_registre){
     return true;
}

function messages_is_read_by($read_by){
     return true;
}

function messages_is_is_logued($is_logued){
     return true;
}

function messages_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function messages_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function messages_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, messages_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function messages_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (messages_is_id($value)) ? true : false;
            break;
     case "type":
            $is = (messages_is_type($value)) ? true : false;
            break;
     case "message":
            $is = (messages_is_message($value)) ? true : false;
            break;
     case "url_action":
            $is = (messages_is_url_action($value)) ? true : false;
            break;
     case "url_label":
            $is = (messages_is_url_label($value)) ? true : false;
            break;
     case "controller":
            $is = (messages_is_controller($value)) ? true : false;
            break;
     case "doc_id":
            $is = (messages_is_doc_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (messages_is_contact_id($value)) ? true : false;
            break;
     case "rol":
            $is = (messages_is_rol($value)) ? true : false;
            break;
     case "date_start":
            $is = (messages_is_date_start($value)) ? true : false;
            break;
     case "date_end":
            $is = (messages_is_date_end($value)) ? true : false;
            break;
     case "date_registre":
            $is = (messages_is_date_registre($value)) ? true : false;
            break;
     case "read_by":
            $is = (messages_is_read_by($value)) ? true : false;
            break;
     case "is_logued":
            $is = (messages_is_is_logued($value)) ? true : false;
            break;
     case "order_by":
            $is = (messages_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (messages_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function messages_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=messages&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'message':
                echo '<th>' . _tr(ucfirst('message')) . '</th>';
                break;
case 'url_action':
                echo '<th>' . _tr(ucfirst('url_action')) . '</th>';
                break;
case 'url_label':
                echo '<th>' . _tr(ucfirst('url_label')) . '</th>';
                break;
case 'controller':
                echo '<th>' . _tr(ucfirst('controller')) . '</th>';
                break;
case 'doc_id':
                echo '<th>' . _tr(ucfirst('doc_id')) . '</th>';
                break;
case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'rol':
                echo '<th>' . _tr(ucfirst('rol')) . '</th>';
                break;
case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
                break;
case 'date_registre':
                echo '<th>' . _tr(ucfirst('date_registre')) . '</th>';
                break;
case 'read_by':
                echo '<th>' . _tr(ucfirst('read_by')) . '</th>';
                break;
case 'is_logued':
                echo '<th>' . _tr(ucfirst('is_logued')) . '</th>';
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

function messages_index_generate_column_body_td($messages, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=messages&a=details&id=' . $messages[$col] . '">' . $messages[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'message':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'url_action':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'url_label':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'controller':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'doc_id':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'rol':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'date_start':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'date_end':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'read_by':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'is_logued':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($messages[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=messages&a=details&id=' . $messages['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=messages&a=details_payement&id=' . $messages['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=messages&a=edit&id=' . $messages['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=messages&a=ok_delete&id=' . $messages['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=messages&a=export_pdf&id=' . $messages['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=messages&a=export_pdf&way=pdf&&id=' . $messages['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($messages[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
