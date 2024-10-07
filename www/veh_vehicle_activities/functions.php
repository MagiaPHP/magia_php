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
# Fecha de creacion del documento: 2024-09-16 17:09:17 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:17 


// 

//function veh_vehicle_activities_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_vehicle_activities_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_vehicle_activities_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_vehicle_activities"); // Obtener columnas de la tabla de la base de datos
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
function veh_vehicle_activities_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_activities` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_activities_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_activities` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_activities_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_activities` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_activities_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `driver_id`,  `start_date`,  `time_start`,  `kl_start`,  `end_date`,  `time_end`,  `kl_end`,  `order_by`,  `status`,  `kl_difference`   
    
    FROM `veh_vehicle_activities` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_vehicle_activities_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `vehicle_id`,  `driver_id`,  `start_date`,  `time_start`,  `kl_start`,  `end_date`,  `time_end`,  `kl_end`,  `order_by`,  `status`,  `kl_difference`   
    FROM `veh_vehicle_activities` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_vehicle_activities_edit($id ,  $vehicle_id ,  $driver_id ,  $start_date ,  $time_start ,  $kl_start ,  $end_date ,  $time_end ,  $kl_end ,  $order_by ,  $status ,  $kl_difference   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `vehicle_id` =:vehicle_id, `driver_id` =:driver_id, `start_date` =:start_date, `time_start` =:time_start, `kl_start` =:kl_start, `end_date` =:end_date, `time_end` =:time_end, `kl_end` =:kl_end, `order_by` =:order_by, `status` =:status, `kl_difference` =:kl_difference  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "vehicle_id" =>$vehicle_id ,  
 "driver_id" =>$driver_id ,  
 "start_date" =>$start_date ,  
 "time_start" =>$time_start ,  
 "kl_start" =>$kl_start ,  
 "end_date" =>$end_date ,  
 "time_end" =>$time_end ,  
 "kl_end" =>$kl_end ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  
 "kl_difference" =>$kl_difference ,  

));
}

function veh_vehicle_activities_add($vehicle_id ,  $driver_id ,  $start_date ,  $time_start ,  $kl_start ,  $end_date ,  $time_end ,  $kl_end ,  $order_by ,  $status ,  $kl_difference   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_vehicle_activities` ( `id` ,   `vehicle_id` ,   `driver_id` ,   `start_date` ,   `time_start` ,   `kl_start` ,   `end_date` ,   `time_end` ,   `kl_end` ,   `order_by` ,   `status` ,   `kl_difference`   )
                                       VALUES  (:id ,  :vehicle_id ,  :driver_id ,  :start_date ,  :time_start ,  :kl_start ,  :end_date ,  :time_end ,  :kl_end ,  :order_by ,  :status ,  :kl_difference   ) ");

    $req->execute(array(

 "id" => null ,  
 "vehicle_id" => $vehicle_id ,  
 "driver_id" => $driver_id ,  
 "start_date" => $start_date ,  
 "time_start" => $time_start ,  
 "kl_start" => $kl_start ,  
 "end_date" => $end_date ,  
 "time_end" => $time_end ,  
 "kl_end" => $kl_end ,  
 "order_by" => $order_by ,  
 "status" => $status ,  
 "kl_difference" => $kl_difference   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_vehicle_activities_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `driver_id`,  `start_date`,  `time_start`,  `kl_start`,  `end_date`,  `time_end`,  `kl_end`,  `order_by`,  `status`,  `kl_difference`    
            FROM `veh_vehicle_activities` 
            WHERE `id` = :txt OR `id` like :txt
OR `vehicle_id` like :txt
OR `driver_id` like :txt
OR `start_date` like :txt
OR `time_start` like :txt
OR `kl_start` like :txt
OR `end_date` like :txt
OR `time_end` like :txt
OR `kl_end` like :txt
OR `order_by` like :txt
OR `status` like :txt
OR `kl_difference` like :txt
 
        

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

function veh_vehicle_activities_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_vehicle_activities_list() as $key => $value) {
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
function veh_vehicle_activities_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_vehicle_activities` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_vehicle_activities_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `driver_id`,  `start_date`,  `time_start`,  `kl_start`,  `end_date`,  `time_end`,  `kl_end`,  `order_by`,  `status`,  `kl_difference`    FROM `veh_vehicle_activities` 

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

function veh_vehicle_activities_db_show_col_from_table($c) {
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
function veh_vehicle_activities_db_col_list_from_table($c){
    $list = array();
    foreach (veh_vehicle_activities_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_vehicle_activities_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_vehicle_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `vehicle_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_driver_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `driver_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_start_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `start_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_time_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `time_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_kl_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `kl_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_end_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `end_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_time_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `time_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_kl_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `kl_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_activities_update_kl_difference($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_activities` SET `kl_difference`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_vehicle_activities_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_vehicle_activities_update_id($id, $new_data);
            break;

        case "vehicle_id":
            veh_vehicle_activities_update_vehicle_id($id, $new_data);
            break;

        case "driver_id":
            veh_vehicle_activities_update_driver_id($id, $new_data);
            break;

        case "start_date":
            veh_vehicle_activities_update_start_date($id, $new_data);
            break;

        case "time_start":
            veh_vehicle_activities_update_time_start($id, $new_data);
            break;

        case "kl_start":
            veh_vehicle_activities_update_kl_start($id, $new_data);
            break;

        case "end_date":
            veh_vehicle_activities_update_end_date($id, $new_data);
            break;

        case "time_end":
            veh_vehicle_activities_update_time_end($id, $new_data);
            break;

        case "kl_end":
            veh_vehicle_activities_update_kl_end($id, $new_data);
            break;

        case "order_by":
            veh_vehicle_activities_update_order_by($id, $new_data);
            break;

        case "status":
            veh_vehicle_activities_update_status($id, $new_data);
            break;

        case "kl_difference":
            veh_vehicle_activities_update_kl_difference($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_vehicle_activities_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_vehicle_activities` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_vehicle_activities/functions.php
// and comment here (this function)
function veh_vehicle_activities_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "vehicle_id":
            //return veh_vehicles_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "driver_id":
            //return veh_drivers_field_id("contact_id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "start_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "time_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "kl_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "end_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "time_end":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "kl_end":
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
        case "kl_difference":
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
function veh_vehicle_activities_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_vehicle_activities` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_vehicle_id($vehicle_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `vehicle_id` FROM `veh_vehicle_activities` WHERE   `vehicle_id` = ?");
    $req->execute(array($vehicle_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_driver_id($driver_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `driver_id` FROM `veh_vehicle_activities` WHERE   `driver_id` = ?");
    $req->execute(array($driver_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_start_date($start_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `start_date` FROM `veh_vehicle_activities` WHERE   `start_date` = ?");
    $req->execute(array($start_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_time_start($time_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `time_start` FROM `veh_vehicle_activities` WHERE   `time_start` = ?");
    $req->execute(array($time_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_kl_start($kl_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `kl_start` FROM `veh_vehicle_activities` WHERE   `kl_start` = ?");
    $req->execute(array($kl_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_end_date($end_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `end_date` FROM `veh_vehicle_activities` WHERE   `end_date` = ?");
    $req->execute(array($end_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_time_end($time_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `time_end` FROM `veh_vehicle_activities` WHERE   `time_end` = ?");
    $req->execute(array($time_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_kl_end($kl_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `kl_end` FROM `veh_vehicle_activities` WHERE   `kl_end` = ?");
    $req->execute(array($kl_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_vehicle_activities` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_vehicle_activities` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_activities_exists_kl_difference($kl_difference){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `kl_difference` FROM `veh_vehicle_activities` WHERE   `kl_difference` = ?");
    $req->execute(array($kl_difference));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_vehicle_activities_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_vehicle_activities_is_vehicle_id($vehicle_id){
     return true;
}

function veh_vehicle_activities_is_driver_id($driver_id){
     return true;
}

function veh_vehicle_activities_is_start_date($start_date){
     return true;
}

function veh_vehicle_activities_is_time_start($time_start){
     return true;
}

function veh_vehicle_activities_is_kl_start($kl_start){
     return true;
}

function veh_vehicle_activities_is_end_date($end_date){
     return true;
}

function veh_vehicle_activities_is_time_end($time_end){
     return true;
}

function veh_vehicle_activities_is_kl_end($kl_end){
     return true;
}

function veh_vehicle_activities_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_vehicle_activities_is_status($status){
     return (is_status($status) )? true : false ;
}

function veh_vehicle_activities_is_kl_difference($kl_difference){
     return true;
}


//
//
function veh_vehicle_activities_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_vehicle_activities_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_vehicle_activities_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_vehicle_activities_is_id($value)) ? true : false;
            break;
     case "vehicle_id":
            $is = (veh_vehicle_activities_is_vehicle_id($value)) ? true : false;
            break;
     case "driver_id":
            $is = (veh_vehicle_activities_is_driver_id($value)) ? true : false;
            break;
     case "start_date":
            $is = (veh_vehicle_activities_is_start_date($value)) ? true : false;
            break;
     case "time_start":
            $is = (veh_vehicle_activities_is_time_start($value)) ? true : false;
            break;
     case "kl_start":
            $is = (veh_vehicle_activities_is_kl_start($value)) ? true : false;
            break;
     case "end_date":
            $is = (veh_vehicle_activities_is_end_date($value)) ? true : false;
            break;
     case "time_end":
            $is = (veh_vehicle_activities_is_time_end($value)) ? true : false;
            break;
     case "kl_end":
            $is = (veh_vehicle_activities_is_kl_end($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_vehicle_activities_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_vehicle_activities_is_status($value)) ? true : false;
            break;
     case "kl_difference":
            $is = (veh_vehicle_activities_is_kl_difference($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_vehicle_activities_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_vehicle_activities&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'vehicle_id':
                echo '<th>' . _tr(ucfirst('vehicle_id')) . '</th>';
                break;
case 'driver_id':
                echo '<th>' . _tr(ucfirst('driver_id')) . '</th>';
                break;
case 'start_date':
                echo '<th>' . _tr(ucfirst('start_date')) . '</th>';
                break;
case 'time_start':
                echo '<th>' . _tr(ucfirst('time_start')) . '</th>';
                break;
case 'kl_start':
                echo '<th>' . _tr(ucfirst('kl_start')) . '</th>';
                break;
case 'end_date':
                echo '<th>' . _tr(ucfirst('end_date')) . '</th>';
                break;
case 'time_end':
                echo '<th>' . _tr(ucfirst('time_end')) . '</th>';
                break;
case 'kl_end':
                echo '<th>' . _tr(ucfirst('kl_end')) . '</th>';
                break;
case 'order_by':
                echo '<th>' . _tr(ucfirst('order_by')) . '</th>';
                break;
case 'status':
                echo '<th>' . _tr(ucfirst('status')) . '</th>';
                break;
case 'kl_difference':
                echo '<th>' . _tr(ucfirst('kl_difference')) . '</th>';
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

function veh_vehicle_activities_index_generate_column_body_td($veh_vehicle_activities, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_vehicle_activities&a=details&id=' . $veh_vehicle_activities[$col] . '">' . $veh_vehicle_activities[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'vehicle_id':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'driver_id':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'start_date':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'time_start':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'kl_start':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'end_date':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'time_end':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'kl_end':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
case 'kl_difference':
                echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_vehicle_activities&a=details&id=' . $veh_vehicle_activities['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_vehicle_activities&a=details_payement&id=' . $veh_vehicle_activities['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicle_activities&a=edit&id=' . $veh_vehicle_activities['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicle_activities&a=ok_delete&id=' . $veh_vehicle_activities['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_activities&a=export_pdf&id=' . $veh_vehicle_activities['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_activities&a=export_pdf&way=pdf&&id=' . $veh_vehicle_activities['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_vehicle_activities[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
