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
# Fecha de creacion del documento: 2024-09-18 03:09:07 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 03:09:07 


// 

//function cv_motivation_letter_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function cv_motivation_letter_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("cv_motivation_letter_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("cv_motivation_letter"); // Obtener columnas de la tabla de la base de datos
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
function cv_motivation_letter_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_motivation_letter` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_motivation_letter_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_motivation_letter` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_motivation_letter_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_motivation_letter` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_motivation_letter_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `sender_name`,  `sender_email`,  `sender_phone`,  `sender_address`,  `letter_date`,  `recipient_name`,  `recipient_position`,  `recipient_company`,  `recipient_address`,  `greeting`,  `introduction`,  `body_experience`,  `body_achievements`,  `motivation`,  `closing`,  `farewell`,  `signature`,  `order_by`,  `status`   
    
    FROM `cv_motivation_letter` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function cv_motivation_letter_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `sender_name`,  `sender_email`,  `sender_phone`,  `sender_address`,  `letter_date`,  `recipient_name`,  `recipient_position`,  `recipient_company`,  `recipient_address`,  `greeting`,  `introduction`,  `body_experience`,  `body_achievements`,  `motivation`,  `closing`,  `farewell`,  `signature`,  `order_by`,  `status`   
    FROM `cv_motivation_letter` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cv_motivation_letter_edit($id ,  $sender_name ,  $sender_email ,  $sender_phone ,  $sender_address ,  $letter_date ,  $recipient_name ,  $recipient_position ,  $recipient_company ,  $recipient_address ,  $greeting ,  $introduction ,  $body_experience ,  $body_achievements ,  $motivation ,  $closing ,  $farewell ,  $signature ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `sender_name` =:sender_name, `sender_email` =:sender_email, `sender_phone` =:sender_phone, `sender_address` =:sender_address, `letter_date` =:letter_date, `recipient_name` =:recipient_name, `recipient_position` =:recipient_position, `recipient_company` =:recipient_company, `recipient_address` =:recipient_address, `greeting` =:greeting, `introduction` =:introduction, `body_experience` =:body_experience, `body_achievements` =:body_achievements, `motivation` =:motivation, `closing` =:closing, `farewell` =:farewell, `signature` =:signature, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "sender_name" =>$sender_name ,  
 "sender_email" =>$sender_email ,  
 "sender_phone" =>$sender_phone ,  
 "sender_address" =>$sender_address ,  
 "letter_date" =>$letter_date ,  
 "recipient_name" =>$recipient_name ,  
 "recipient_position" =>$recipient_position ,  
 "recipient_company" =>$recipient_company ,  
 "recipient_address" =>$recipient_address ,  
 "greeting" =>$greeting ,  
 "introduction" =>$introduction ,  
 "body_experience" =>$body_experience ,  
 "body_achievements" =>$body_achievements ,  
 "motivation" =>$motivation ,  
 "closing" =>$closing ,  
 "farewell" =>$farewell ,  
 "signature" =>$signature ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cv_motivation_letter_add($sender_name ,  $sender_email ,  $sender_phone ,  $sender_address ,  $letter_date ,  $recipient_name ,  $recipient_position ,  $recipient_company ,  $recipient_address ,  $greeting ,  $introduction ,  $body_experience ,  $body_achievements ,  $motivation ,  $closing ,  $farewell ,  $signature ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cv_motivation_letter` ( `id` ,   `sender_name` ,   `sender_email` ,   `sender_phone` ,   `sender_address` ,   `letter_date` ,   `recipient_name` ,   `recipient_position` ,   `recipient_company` ,   `recipient_address` ,   `greeting` ,   `introduction` ,   `body_experience` ,   `body_achievements` ,   `motivation` ,   `closing` ,   `farewell` ,   `signature` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :sender_name ,  :sender_email ,  :sender_phone ,  :sender_address ,  :letter_date ,  :recipient_name ,  :recipient_position ,  :recipient_company ,  :recipient_address ,  :greeting ,  :introduction ,  :body_experience ,  :body_achievements ,  :motivation ,  :closing ,  :farewell ,  :signature ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "sender_name" => $sender_name ,  
 "sender_email" => $sender_email ,  
 "sender_phone" => $sender_phone ,  
 "sender_address" => $sender_address ,  
 "letter_date" => $letter_date ,  
 "recipient_name" => $recipient_name ,  
 "recipient_position" => $recipient_position ,  
 "recipient_company" => $recipient_company ,  
 "recipient_address" => $recipient_address ,  
 "greeting" => $greeting ,  
 "introduction" => $introduction ,  
 "body_experience" => $body_experience ,  
 "body_achievements" => $body_achievements ,  
 "motivation" => $motivation ,  
 "closing" => $closing ,  
 "farewell" => $farewell ,  
 "signature" => $signature ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cv_motivation_letter_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `sender_name`,  `sender_email`,  `sender_phone`,  `sender_address`,  `letter_date`,  `recipient_name`,  `recipient_position`,  `recipient_company`,  `recipient_address`,  `greeting`,  `introduction`,  `body_experience`,  `body_achievements`,  `motivation`,  `closing`,  `farewell`,  `signature`,  `order_by`,  `status`    
            FROM `cv_motivation_letter` 
            WHERE `id` = :txt OR `id` like :txt
OR `sender_name` like :txt
OR `sender_email` like :txt
OR `sender_phone` like :txt
OR `sender_address` like :txt
OR `letter_date` like :txt
OR `recipient_name` like :txt
OR `recipient_position` like :txt
OR `recipient_company` like :txt
OR `recipient_address` like :txt
OR `greeting` like :txt
OR `introduction` like :txt
OR `body_experience` like :txt
OR `body_achievements` like :txt
OR `motivation` like :txt
OR `closing` like :txt
OR `farewell` like :txt
OR `signature` like :txt
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

function cv_motivation_letter_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cv_motivation_letter_list() as $key => $value) {
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
function cv_motivation_letter_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cv_motivation_letter` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cv_motivation_letter_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `sender_name`,  `sender_email`,  `sender_phone`,  `sender_address`,  `letter_date`,  `recipient_name`,  `recipient_position`,  `recipient_company`,  `recipient_address`,  `greeting`,  `introduction`,  `body_experience`,  `body_achievements`,  `motivation`,  `closing`,  `farewell`,  `signature`,  `order_by`,  `status`    FROM `cv_motivation_letter` 

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

function cv_motivation_letter_db_show_col_from_table($c) {
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
function cv_motivation_letter_db_col_list_from_table($c){
    $list = array();
    foreach (cv_motivation_letter_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cv_motivation_letter_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_sender_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `sender_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_sender_email($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `sender_email`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_sender_phone($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `sender_phone`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_sender_address($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `sender_address`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_letter_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `letter_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_recipient_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `recipient_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_recipient_position($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `recipient_position`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_recipient_company($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `recipient_company`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_recipient_address($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `recipient_address`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_greeting($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `greeting`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_introduction($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `introduction`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_body_experience($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `body_experience`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_body_achievements($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `body_achievements`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_motivation($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `motivation`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_closing($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `closing`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_farewell($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `farewell`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_signature($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `signature`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_motivation_letter_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_motivation_letter` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cv_motivation_letter_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cv_motivation_letter_update_id($id, $new_data);
            break;

        case "sender_name":
            cv_motivation_letter_update_sender_name($id, $new_data);
            break;

        case "sender_email":
            cv_motivation_letter_update_sender_email($id, $new_data);
            break;

        case "sender_phone":
            cv_motivation_letter_update_sender_phone($id, $new_data);
            break;

        case "sender_address":
            cv_motivation_letter_update_sender_address($id, $new_data);
            break;

        case "letter_date":
            cv_motivation_letter_update_letter_date($id, $new_data);
            break;

        case "recipient_name":
            cv_motivation_letter_update_recipient_name($id, $new_data);
            break;

        case "recipient_position":
            cv_motivation_letter_update_recipient_position($id, $new_data);
            break;

        case "recipient_company":
            cv_motivation_letter_update_recipient_company($id, $new_data);
            break;

        case "recipient_address":
            cv_motivation_letter_update_recipient_address($id, $new_data);
            break;

        case "greeting":
            cv_motivation_letter_update_greeting($id, $new_data);
            break;

        case "introduction":
            cv_motivation_letter_update_introduction($id, $new_data);
            break;

        case "body_experience":
            cv_motivation_letter_update_body_experience($id, $new_data);
            break;

        case "body_achievements":
            cv_motivation_letter_update_body_achievements($id, $new_data);
            break;

        case "motivation":
            cv_motivation_letter_update_motivation($id, $new_data);
            break;

        case "closing":
            cv_motivation_letter_update_closing($id, $new_data);
            break;

        case "farewell":
            cv_motivation_letter_update_farewell($id, $new_data);
            break;

        case "signature":
            cv_motivation_letter_update_signature($id, $new_data);
            break;

        case "order_by":
            cv_motivation_letter_update_order_by($id, $new_data);
            break;

        case "status":
            cv_motivation_letter_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cv_motivation_letter_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cv_motivation_letter` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cv_motivation_letter/functions.php
// and comment here (this function)
function cv_motivation_letter_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_email":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_phone":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sender_address":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "letter_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "recipient_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "recipient_position":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "recipient_company":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "recipient_address":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "greeting":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "introduction":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "body_experience":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "body_achievements":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "motivation":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "closing":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "farewell":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "signature":
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
function cv_motivation_letter_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cv_motivation_letter` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_sender_name($sender_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_name` FROM `cv_motivation_letter` WHERE   `sender_name` = ?");
    $req->execute(array($sender_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_sender_email($sender_email){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_email` FROM `cv_motivation_letter` WHERE   `sender_email` = ?");
    $req->execute(array($sender_email));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_sender_phone($sender_phone){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_phone` FROM `cv_motivation_letter` WHERE   `sender_phone` = ?");
    $req->execute(array($sender_phone));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_sender_address($sender_address){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sender_address` FROM `cv_motivation_letter` WHERE   `sender_address` = ?");
    $req->execute(array($sender_address));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_letter_date($letter_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `letter_date` FROM `cv_motivation_letter` WHERE   `letter_date` = ?");
    $req->execute(array($letter_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_recipient_name($recipient_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `recipient_name` FROM `cv_motivation_letter` WHERE   `recipient_name` = ?");
    $req->execute(array($recipient_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_recipient_position($recipient_position){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `recipient_position` FROM `cv_motivation_letter` WHERE   `recipient_position` = ?");
    $req->execute(array($recipient_position));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_recipient_company($recipient_company){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `recipient_company` FROM `cv_motivation_letter` WHERE   `recipient_company` = ?");
    $req->execute(array($recipient_company));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_recipient_address($recipient_address){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `recipient_address` FROM `cv_motivation_letter` WHERE   `recipient_address` = ?");
    $req->execute(array($recipient_address));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_greeting($greeting){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `greeting` FROM `cv_motivation_letter` WHERE   `greeting` = ?");
    $req->execute(array($greeting));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_introduction($introduction){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `introduction` FROM `cv_motivation_letter` WHERE   `introduction` = ?");
    $req->execute(array($introduction));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_body_experience($body_experience){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `body_experience` FROM `cv_motivation_letter` WHERE   `body_experience` = ?");
    $req->execute(array($body_experience));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_body_achievements($body_achievements){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `body_achievements` FROM `cv_motivation_letter` WHERE   `body_achievements` = ?");
    $req->execute(array($body_achievements));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_motivation($motivation){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `motivation` FROM `cv_motivation_letter` WHERE   `motivation` = ?");
    $req->execute(array($motivation));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_closing($closing){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `closing` FROM `cv_motivation_letter` WHERE   `closing` = ?");
    $req->execute(array($closing));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_farewell($farewell){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `farewell` FROM `cv_motivation_letter` WHERE   `farewell` = ?");
    $req->execute(array($farewell));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_signature($signature){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `signature` FROM `cv_motivation_letter` WHERE   `signature` = ?");
    $req->execute(array($signature));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cv_motivation_letter` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_motivation_letter_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cv_motivation_letter` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cv_motivation_letter_is_id($id){
     return (is_id($id) )? true : false ;
}

function cv_motivation_letter_is_sender_name($sender_name){
     return true;
}

function cv_motivation_letter_is_sender_email($sender_email){
     return true;
}

function cv_motivation_letter_is_sender_phone($sender_phone){
     return true;
}

function cv_motivation_letter_is_sender_address($sender_address){
     return true;
}

function cv_motivation_letter_is_letter_date($letter_date){
     return true;
}

function cv_motivation_letter_is_recipient_name($recipient_name){
     return true;
}

function cv_motivation_letter_is_recipient_position($recipient_position){
     return true;
}

function cv_motivation_letter_is_recipient_company($recipient_company){
     return true;
}

function cv_motivation_letter_is_recipient_address($recipient_address){
     return true;
}

function cv_motivation_letter_is_greeting($greeting){
     return true;
}

function cv_motivation_letter_is_introduction($introduction){
     return true;
}

function cv_motivation_letter_is_body_experience($body_experience){
     return true;
}

function cv_motivation_letter_is_body_achievements($body_achievements){
     return true;
}

function cv_motivation_letter_is_motivation($motivation){
     return true;
}

function cv_motivation_letter_is_closing($closing){
     return true;
}

function cv_motivation_letter_is_farewell($farewell){
     return true;
}

function cv_motivation_letter_is_signature($signature){
     return true;
}

function cv_motivation_letter_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cv_motivation_letter_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cv_motivation_letter_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cv_motivation_letter_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cv_motivation_letter_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cv_motivation_letter_is_id($value)) ? true : false;
            break;
     case "sender_name":
            $is = (cv_motivation_letter_is_sender_name($value)) ? true : false;
            break;
     case "sender_email":
            $is = (cv_motivation_letter_is_sender_email($value)) ? true : false;
            break;
     case "sender_phone":
            $is = (cv_motivation_letter_is_sender_phone($value)) ? true : false;
            break;
     case "sender_address":
            $is = (cv_motivation_letter_is_sender_address($value)) ? true : false;
            break;
     case "letter_date":
            $is = (cv_motivation_letter_is_letter_date($value)) ? true : false;
            break;
     case "recipient_name":
            $is = (cv_motivation_letter_is_recipient_name($value)) ? true : false;
            break;
     case "recipient_position":
            $is = (cv_motivation_letter_is_recipient_position($value)) ? true : false;
            break;
     case "recipient_company":
            $is = (cv_motivation_letter_is_recipient_company($value)) ? true : false;
            break;
     case "recipient_address":
            $is = (cv_motivation_letter_is_recipient_address($value)) ? true : false;
            break;
     case "greeting":
            $is = (cv_motivation_letter_is_greeting($value)) ? true : false;
            break;
     case "introduction":
            $is = (cv_motivation_letter_is_introduction($value)) ? true : false;
            break;
     case "body_experience":
            $is = (cv_motivation_letter_is_body_experience($value)) ? true : false;
            break;
     case "body_achievements":
            $is = (cv_motivation_letter_is_body_achievements($value)) ? true : false;
            break;
     case "motivation":
            $is = (cv_motivation_letter_is_motivation($value)) ? true : false;
            break;
     case "closing":
            $is = (cv_motivation_letter_is_closing($value)) ? true : false;
            break;
     case "farewell":
            $is = (cv_motivation_letter_is_farewell($value)) ? true : false;
            break;
     case "signature":
            $is = (cv_motivation_letter_is_signature($value)) ? true : false;
            break;
     case "order_by":
            $is = (cv_motivation_letter_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cv_motivation_letter_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cv_motivation_letter_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cv_motivation_letter&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'sender_name':
                echo '<th>' . _tr(ucfirst('sender_name')) . '</th>';
                break;
case 'sender_email':
                echo '<th>' . _tr(ucfirst('sender_email')) . '</th>';
                break;
case 'sender_phone':
                echo '<th>' . _tr(ucfirst('sender_phone')) . '</th>';
                break;
case 'sender_address':
                echo '<th>' . _tr(ucfirst('sender_address')) . '</th>';
                break;
case 'letter_date':
                echo '<th>' . _tr(ucfirst('letter_date')) . '</th>';
                break;
case 'recipient_name':
                echo '<th>' . _tr(ucfirst('recipient_name')) . '</th>';
                break;
case 'recipient_position':
                echo '<th>' . _tr(ucfirst('recipient_position')) . '</th>';
                break;
case 'recipient_company':
                echo '<th>' . _tr(ucfirst('recipient_company')) . '</th>';
                break;
case 'recipient_address':
                echo '<th>' . _tr(ucfirst('recipient_address')) . '</th>';
                break;
case 'greeting':
                echo '<th>' . _tr(ucfirst('greeting')) . '</th>';
                break;
case 'introduction':
                echo '<th>' . _tr(ucfirst('introduction')) . '</th>';
                break;
case 'body_experience':
                echo '<th>' . _tr(ucfirst('body_experience')) . '</th>';
                break;
case 'body_achievements':
                echo '<th>' . _tr(ucfirst('body_achievements')) . '</th>';
                break;
case 'motivation':
                echo '<th>' . _tr(ucfirst('motivation')) . '</th>';
                break;
case 'closing':
                echo '<th>' . _tr(ucfirst('closing')) . '</th>';
                break;
case 'farewell':
                echo '<th>' . _tr(ucfirst('farewell')) . '</th>';
                break;
case 'signature':
                echo '<th>' . _tr(ucfirst('signature')) . '</th>';
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

function cv_motivation_letter_index_generate_column_body_td($cv_motivation_letter, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cv_motivation_letter&a=details&id=' . $cv_motivation_letter[$col] . '">' . $cv_motivation_letter[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'sender_name':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'sender_email':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'sender_phone':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'sender_address':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'letter_date':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'recipient_name':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'recipient_position':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'recipient_company':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'recipient_address':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'greeting':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'introduction':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'body_experience':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'body_achievements':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'motivation':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'closing':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'farewell':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'signature':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cv_motivation_letter&a=details&id=' . $cv_motivation_letter['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cv_motivation_letter&a=details_payement&id=' . $cv_motivation_letter['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_motivation_letter&a=edit&id=' . $cv_motivation_letter['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_motivation_letter&a=ok_delete&id=' . $cv_motivation_letter['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_motivation_letter&a=export_pdf&id=' . $cv_motivation_letter['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_motivation_letter&a=export_pdf&way=pdf&&id=' . $cv_motivation_letter['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cv_motivation_letter[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
