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
# Fecha de creacion del documento: 2024-09-16 12:09:23 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 12:09:23 


// 

//function banks_transactions_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function banks_transactions_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("banks_transactions_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("banks_transactions"); // Obtener columnas de la tabla de la base de datos
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
function banks_transactions_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_transactions` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_transactions_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_transactions` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_transactions_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_transactions` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_transactions_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `client_id`,  `document`,  `document_id`,  `type`,  `account_number`,  `total`,  `operation_number`,  `date`,  `ref`,  `description`,  `ce`,  `details`,  `message`,  `currency`,  `code`,  `registre_date`,  `created_date`,  `updated_date`,  `canceled_code`,  `order_by`,  `status`   
    
    FROM `banks_transactions` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function banks_transactions_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `client_id`,  `document`,  `document_id`,  `type`,  `account_number`,  `total`,  `operation_number`,  `date`,  `ref`,  `description`,  `ce`,  `details`,  `message`,  `currency`,  `code`,  `registre_date`,  `created_date`,  `updated_date`,  `canceled_code`,  `order_by`,  `status`   
    FROM `banks_transactions` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function banks_transactions_edit($id ,  $client_id ,  $document ,  $document_id ,  $type ,  $account_number ,  $total ,  $operation_number ,  $date ,  $ref ,  $description ,  $ce ,  $details ,  $message ,  $currency ,  $code ,  $registre_date ,  $created_date ,  $updated_date ,  $canceled_code ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `client_id` =:client_id, `document` =:document, `document_id` =:document_id, `type` =:type, `account_number` =:account_number, `total` =:total, `operation_number` =:operation_number, `date` =:date, `ref` =:ref, `description` =:description, `ce` =:ce, `details` =:details, `message` =:message, `currency` =:currency, `code` =:code, `registre_date` =:registre_date, `created_date` =:created_date, `updated_date` =:updated_date, `canceled_code` =:canceled_code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "client_id" =>$client_id ,  
 "document" =>$document ,  
 "document_id" =>$document_id ,  
 "type" =>$type ,  
 "account_number" =>$account_number ,  
 "total" =>$total ,  
 "operation_number" =>$operation_number ,  
 "date" =>$date ,  
 "ref" =>$ref ,  
 "description" =>$description ,  
 "ce" =>$ce ,  
 "details" =>$details ,  
 "message" =>$message ,  
 "currency" =>$currency ,  
 "code" =>$code ,  
 "registre_date" =>$registre_date ,  
 "created_date" =>$created_date ,  
 "updated_date" =>$updated_date ,  
 "canceled_code" =>$canceled_code ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function banks_transactions_add($client_id ,  $document ,  $document_id ,  $type ,  $account_number ,  $total ,  $operation_number ,  $date ,  $ref ,  $description ,  $ce ,  $details ,  $message ,  $currency ,  $code ,  $registre_date ,  $created_date ,  $updated_date ,  $canceled_code ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `banks_transactions` ( `id` ,   `client_id` ,   `document` ,   `document_id` ,   `type` ,   `account_number` ,   `total` ,   `operation_number` ,   `date` ,   `ref` ,   `description` ,   `ce` ,   `details` ,   `message` ,   `currency` ,   `code` ,   `registre_date` ,   `created_date` ,   `updated_date` ,   `canceled_code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :client_id ,  :document ,  :document_id ,  :type ,  :account_number ,  :total ,  :operation_number ,  :date ,  :ref ,  :description ,  :ce ,  :details ,  :message ,  :currency ,  :code ,  :registre_date ,  :created_date ,  :updated_date ,  :canceled_code ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "client_id" => $client_id ,  
 "document" => $document ,  
 "document_id" => $document_id ,  
 "type" => $type ,  
 "account_number" => $account_number ,  
 "total" => $total ,  
 "operation_number" => $operation_number ,  
 "date" => $date ,  
 "ref" => $ref ,  
 "description" => $description ,  
 "ce" => $ce ,  
 "details" => $details ,  
 "message" => $message ,  
 "currency" => $currency ,  
 "code" => $code ,  
 "registre_date" => $registre_date ,  
 "created_date" => $created_date ,  
 "updated_date" => $updated_date ,  
 "canceled_code" => $canceled_code ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function banks_transactions_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `client_id`,  `document`,  `document_id`,  `type`,  `account_number`,  `total`,  `operation_number`,  `date`,  `ref`,  `description`,  `ce`,  `details`,  `message`,  `currency`,  `code`,  `registre_date`,  `created_date`,  `updated_date`,  `canceled_code`,  `order_by`,  `status`    
            FROM `banks_transactions` 
            WHERE `id` = :txt OR `id` like :txt
OR `client_id` like :txt
OR `document` like :txt
OR `document_id` like :txt
OR `type` like :txt
OR `account_number` like :txt
OR `total` like :txt
OR `operation_number` like :txt
OR `date` like :txt
OR `ref` like :txt
OR `description` like :txt
OR `ce` like :txt
OR `details` like :txt
OR `message` like :txt
OR `currency` like :txt
OR `code` like :txt
OR `registre_date` like :txt
OR `created_date` like :txt
OR `updated_date` like :txt
OR `canceled_code` like :txt
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

function banks_transactions_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (banks_transactions_list() as $key => $value) {
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
function banks_transactions_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `banks_transactions` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function banks_transactions_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `client_id`,  `document`,  `document_id`,  `type`,  `account_number`,  `total`,  `operation_number`,  `date`,  `ref`,  `description`,  `ce`,  `details`,  `message`,  `currency`,  `code`,  `registre_date`,  `created_date`,  `updated_date`,  `canceled_code`,  `order_by`,  `status`    FROM `banks_transactions` 

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

function banks_transactions_db_show_col_from_table($c) {
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
function banks_transactions_db_col_list_from_table($c){
    $list = array();
    foreach (banks_transactions_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function banks_transactions_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_client_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `client_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_document($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `document`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_document_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `document_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_account_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `account_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_operation_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `operation_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_ref($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `ref`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_ce($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `ce`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_details($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `details`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_message($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `message`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_currency($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `currency`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_registre_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `registre_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_created_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `created_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_updated_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `updated_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_canceled_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `canceled_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_transactions_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_transactions` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function banks_transactions_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            banks_transactions_update_id($id, $new_data);
            break;

        case "client_id":
            banks_transactions_update_client_id($id, $new_data);
            break;

        case "document":
            banks_transactions_update_document($id, $new_data);
            break;

        case "document_id":
            banks_transactions_update_document_id($id, $new_data);
            break;

        case "type":
            banks_transactions_update_type($id, $new_data);
            break;

        case "account_number":
            banks_transactions_update_account_number($id, $new_data);
            break;

        case "total":
            banks_transactions_update_total($id, $new_data);
            break;

        case "operation_number":
            banks_transactions_update_operation_number($id, $new_data);
            break;

        case "date":
            banks_transactions_update_date($id, $new_data);
            break;

        case "ref":
            banks_transactions_update_ref($id, $new_data);
            break;

        case "description":
            banks_transactions_update_description($id, $new_data);
            break;

        case "ce":
            banks_transactions_update_ce($id, $new_data);
            break;

        case "details":
            banks_transactions_update_details($id, $new_data);
            break;

        case "message":
            banks_transactions_update_message($id, $new_data);
            break;

        case "currency":
            banks_transactions_update_currency($id, $new_data);
            break;

        case "code":
            banks_transactions_update_code($id, $new_data);
            break;

        case "registre_date":
            banks_transactions_update_registre_date($id, $new_data);
            break;

        case "created_date":
            banks_transactions_update_created_date($id, $new_data);
            break;

        case "updated_date":
            banks_transactions_update_updated_date($id, $new_data);
            break;

        case "canceled_code":
            banks_transactions_update_canceled_code($id, $new_data);
            break;

        case "order_by":
            banks_transactions_update_order_by($id, $new_data);
            break;

        case "status":
            banks_transactions_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function banks_transactions_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `banks_transactions` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/banks_transactions/functions.php
// and comment here (this function)
function banks_transactions_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "client_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "document":
            //return controllers_field_id("controller", $value);
            return ($filtre) ?? $value;                
            break; 
        case "document_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "account_number":
            //return banks_field_id("account_number", $value);
            return ($filtre) ?? $value;                
            break; 
        case "total":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "operation_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ce":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "details":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "message":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "currency":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "registre_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "created_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "updated_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "canceled_code":
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
function banks_transactions_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `banks_transactions` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_client_id($client_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `client_id` FROM `banks_transactions` WHERE   `client_id` = ?");
    $req->execute(array($client_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_document($document){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `document` FROM `banks_transactions` WHERE   `document` = ?");
    $req->execute(array($document));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_document_id($document_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `document_id` FROM `banks_transactions` WHERE   `document_id` = ?");
    $req->execute(array($document_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `banks_transactions` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_account_number($account_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `account_number` FROM `banks_transactions` WHERE   `account_number` = ?");
    $req->execute(array($account_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_total($total){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `banks_transactions` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_operation_number($operation_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `operation_number` FROM `banks_transactions` WHERE   `operation_number` = ?");
    $req->execute(array($operation_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `banks_transactions` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_ref($ref){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref` FROM `banks_transactions` WHERE   `ref` = ?");
    $req->execute(array($ref));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `banks_transactions` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_ce($ce){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ce` FROM `banks_transactions` WHERE   `ce` = ?");
    $req->execute(array($ce));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_details($details){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `details` FROM `banks_transactions` WHERE   `details` = ?");
    $req->execute(array($details));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_message($message){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `message` FROM `banks_transactions` WHERE   `message` = ?");
    $req->execute(array($message));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_currency($currency){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `currency` FROM `banks_transactions` WHERE   `currency` = ?");
    $req->execute(array($currency));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `banks_transactions` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_registre_date($registre_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `registre_date` FROM `banks_transactions` WHERE   `registre_date` = ?");
    $req->execute(array($registre_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_created_date($created_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `created_date` FROM `banks_transactions` WHERE   `created_date` = ?");
    $req->execute(array($created_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_updated_date($updated_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `updated_date` FROM `banks_transactions` WHERE   `updated_date` = ?");
    $req->execute(array($updated_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_canceled_code($canceled_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `canceled_code` FROM `banks_transactions` WHERE   `canceled_code` = ?");
    $req->execute(array($canceled_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `banks_transactions` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_transactions_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `banks_transactions` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function banks_transactions_is_id($id){
     return (is_id($id) )? true : false ;
}

function banks_transactions_is_client_id($client_id){
     return true;
}

function banks_transactions_is_document($document){
     return true;
}

function banks_transactions_is_document_id($document_id){
     return true;
}

function banks_transactions_is_type($type){
     return true;
}

function banks_transactions_is_account_number($account_number){
     return true;
}

function banks_transactions_is_total($total){
     return true;
}

function banks_transactions_is_operation_number($operation_number){
     return true;
}

function banks_transactions_is_date($date){
     return true;
}

function banks_transactions_is_ref($ref){
     return true;
}

function banks_transactions_is_description($description){
     return true;
}

function banks_transactions_is_ce($ce){
     return true;
}

function banks_transactions_is_details($details){
     return true;
}

function banks_transactions_is_message($message){
     return true;
}

function banks_transactions_is_currency($currency){
     return true;
}

function banks_transactions_is_code($code){
     return true;
}

function banks_transactions_is_registre_date($registre_date){
     return true;
}

function banks_transactions_is_created_date($created_date){
     return true;
}

function banks_transactions_is_updated_date($updated_date){
     return true;
}

function banks_transactions_is_canceled_code($canceled_code){
     return true;
}

function banks_transactions_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function banks_transactions_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function banks_transactions_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, banks_transactions_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function banks_transactions_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (banks_transactions_is_id($value)) ? true : false;
            break;
     case "client_id":
            $is = (banks_transactions_is_client_id($value)) ? true : false;
            break;
     case "document":
            $is = (banks_transactions_is_document($value)) ? true : false;
            break;
     case "document_id":
            $is = (banks_transactions_is_document_id($value)) ? true : false;
            break;
     case "type":
            $is = (banks_transactions_is_type($value)) ? true : false;
            break;
     case "account_number":
            $is = (banks_transactions_is_account_number($value)) ? true : false;
            break;
     case "total":
            $is = (banks_transactions_is_total($value)) ? true : false;
            break;
     case "operation_number":
            $is = (banks_transactions_is_operation_number($value)) ? true : false;
            break;
     case "date":
            $is = (banks_transactions_is_date($value)) ? true : false;
            break;
     case "ref":
            $is = (banks_transactions_is_ref($value)) ? true : false;
            break;
     case "description":
            $is = (banks_transactions_is_description($value)) ? true : false;
            break;
     case "ce":
            $is = (banks_transactions_is_ce($value)) ? true : false;
            break;
     case "details":
            $is = (banks_transactions_is_details($value)) ? true : false;
            break;
     case "message":
            $is = (banks_transactions_is_message($value)) ? true : false;
            break;
     case "currency":
            $is = (banks_transactions_is_currency($value)) ? true : false;
            break;
     case "code":
            $is = (banks_transactions_is_code($value)) ? true : false;
            break;
     case "registre_date":
            $is = (banks_transactions_is_registre_date($value)) ? true : false;
            break;
     case "created_date":
            $is = (banks_transactions_is_created_date($value)) ? true : false;
            break;
     case "updated_date":
            $is = (banks_transactions_is_updated_date($value)) ? true : false;
            break;
     case "canceled_code":
            $is = (banks_transactions_is_canceled_code($value)) ? true : false;
            break;
     case "order_by":
            $is = (banks_transactions_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (banks_transactions_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function banks_transactions_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=banks_transactions&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'client_id':
                echo '<th>' . _tr(ucfirst('client_id')) . '</th>';
                break;
case 'document':
                echo '<th>' . _tr(ucfirst('document')) . '</th>';
                break;
case 'document_id':
                echo '<th>' . _tr(ucfirst('document_id')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'account_number':
                echo '<th>' . _tr(ucfirst('account_number')) . '</th>';
                break;
case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
                break;
case 'operation_number':
                echo '<th>' . _tr(ucfirst('operation_number')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'ref':
                echo '<th>' . _tr(ucfirst('ref')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'ce':
                echo '<th>' . _tr(ucfirst('ce')) . '</th>';
                break;
case 'details':
                echo '<th>' . _tr(ucfirst('details')) . '</th>';
                break;
case 'message':
                echo '<th>' . _tr(ucfirst('message')) . '</th>';
                break;
case 'currency':
                echo '<th>' . _tr(ucfirst('currency')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'registre_date':
                echo '<th>' . _tr(ucfirst('registre_date')) . '</th>';
                break;
case 'created_date':
                echo '<th>' . _tr(ucfirst('created_date')) . '</th>';
                break;
case 'updated_date':
                echo '<th>' . _tr(ucfirst('updated_date')) . '</th>';
                break;
case 'canceled_code':
                echo '<th>' . _tr(ucfirst('canceled_code')) . '</th>';
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

function banks_transactions_index_generate_column_body_td($banks_transactions, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=banks_transactions&a=details&id=' . $banks_transactions[$col] . '">' . $banks_transactions[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'client_id':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'document':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'document_id':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'account_number':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'total':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'operation_number':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'ref':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'ce':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'details':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'message':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'currency':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'registre_date':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'created_date':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'updated_date':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'canceled_code':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks_transactions&a=details&id=' . $banks_transactions['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks_transactions&a=details_payement&id=' . $banks_transactions['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_transactions&a=edit&id=' . $banks_transactions['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_transactions&a=ok_delete&id=' . $banks_transactions['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=export_pdf&id=' . $banks_transactions['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_transactions&a=export_pdf&way=pdf&&id=' . $banks_transactions['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($banks_transactions[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
