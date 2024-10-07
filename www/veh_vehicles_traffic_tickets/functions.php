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
# Fecha de creacion del documento: 2024-09-16 17:09:46 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:46 


// 

//function veh_vehicles_traffic_tickets_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_vehicles_traffic_tickets_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_vehicles_traffic_tickets_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_vehicles_traffic_tickets"); // Obtener columnas de la tabla de la base de datos
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
function veh_vehicles_traffic_tickets_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicles_traffic_tickets` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicles_traffic_tickets_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicles_traffic_tickets` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicles_traffic_tickets_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicles_traffic_tickets` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicles_traffic_tickets_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `date`,  `time`,  `pv_police`,  `driver_id`,  `date_registre`,  `order_by`,  `status`   
    
    FROM `veh_vehicles_traffic_tickets` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_vehicles_traffic_tickets_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `vehicle_id`,  `date`,  `time`,  `pv_police`,  `driver_id`,  `date_registre`,  `order_by`,  `status`   
    FROM `veh_vehicles_traffic_tickets` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_vehicles_traffic_tickets_edit($id ,  $vehicle_id ,  $date ,  $time ,  $pv_police ,  $driver_id ,  $date_registre ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `vehicle_id` =:vehicle_id, `date` =:date, `time` =:time, `pv_police` =:pv_police, `driver_id` =:driver_id, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "vehicle_id" =>$vehicle_id ,  
 "date" =>$date ,  
 "time" =>$time ,  
 "pv_police" =>$pv_police ,  
 "driver_id" =>$driver_id ,  
 "date_registre" =>$date_registre ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_vehicles_traffic_tickets_add($vehicle_id ,  $date ,  $time ,  $pv_police ,  $driver_id ,  $date_registre ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_vehicles_traffic_tickets` ( `id` ,   `vehicle_id` ,   `date` ,   `time` ,   `pv_police` ,   `driver_id` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :vehicle_id ,  :date ,  :time ,  :pv_police ,  :driver_id ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "vehicle_id" => $vehicle_id ,  
 "date" => $date ,  
 "time" => $time ,  
 "pv_police" => $pv_police ,  
 "driver_id" => $driver_id ,  
 "date_registre" => $date_registre ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_vehicles_traffic_tickets_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `date`,  `time`,  `pv_police`,  `driver_id`,  `date_registre`,  `order_by`,  `status`    
            FROM `veh_vehicles_traffic_tickets` 
            WHERE `id` = :txt OR `id` like :txt
OR `vehicle_id` like :txt
OR `date` like :txt
OR `time` like :txt
OR `pv_police` like :txt
OR `driver_id` like :txt
OR `date_registre` like :txt
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

function veh_vehicles_traffic_tickets_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_vehicles_traffic_tickets_list() as $key => $value) {
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
function veh_vehicles_traffic_tickets_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_vehicles_traffic_tickets` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_vehicles_traffic_tickets_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `date`,  `time`,  `pv_police`,  `driver_id`,  `date_registre`,  `order_by`,  `status`    FROM `veh_vehicles_traffic_tickets` 

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

function veh_vehicles_traffic_tickets_db_show_col_from_table($c) {
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
function veh_vehicles_traffic_tickets_db_col_list_from_table($c){
    $list = array();
    foreach (veh_vehicles_traffic_tickets_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_vehicles_traffic_tickets_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_vehicle_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `vehicle_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_time($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `time`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_pv_police($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `pv_police`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_driver_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `driver_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_traffic_tickets_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles_traffic_tickets` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_vehicles_traffic_tickets_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_vehicles_traffic_tickets_update_id($id, $new_data);
            break;

        case "vehicle_id":
            veh_vehicles_traffic_tickets_update_vehicle_id($id, $new_data);
            break;

        case "date":
            veh_vehicles_traffic_tickets_update_date($id, $new_data);
            break;

        case "time":
            veh_vehicles_traffic_tickets_update_time($id, $new_data);
            break;

        case "pv_police":
            veh_vehicles_traffic_tickets_update_pv_police($id, $new_data);
            break;

        case "driver_id":
            veh_vehicles_traffic_tickets_update_driver_id($id, $new_data);
            break;

        case "date_registre":
            veh_vehicles_traffic_tickets_update_date_registre($id, $new_data);
            break;

        case "order_by":
            veh_vehicles_traffic_tickets_update_order_by($id, $new_data);
            break;

        case "status":
            veh_vehicles_traffic_tickets_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_vehicles_traffic_tickets_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_vehicles_traffic_tickets` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_vehicles_traffic_tickets/functions.php
// and comment here (this function)
function veh_vehicles_traffic_tickets_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "vehicle_id":
            //return veh_vehicles_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "time":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "pv_police":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "driver_id":
            //return veh_drivers_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_registre":
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
function veh_vehicles_traffic_tickets_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_vehicles_traffic_tickets` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_vehicle_id($vehicle_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `vehicle_id` FROM `veh_vehicles_traffic_tickets` WHERE   `vehicle_id` = ?");
    $req->execute(array($vehicle_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `veh_vehicles_traffic_tickets` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_time($time){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `time` FROM `veh_vehicles_traffic_tickets` WHERE   `time` = ?");
    $req->execute(array($time));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_pv_police($pv_police){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `pv_police` FROM `veh_vehicles_traffic_tickets` WHERE   `pv_police` = ?");
    $req->execute(array($pv_police));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_driver_id($driver_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `driver_id` FROM `veh_vehicles_traffic_tickets` WHERE   `driver_id` = ?");
    $req->execute(array($driver_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `veh_vehicles_traffic_tickets` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_vehicles_traffic_tickets` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_traffic_tickets_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_vehicles_traffic_tickets` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_vehicles_traffic_tickets_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_vehicles_traffic_tickets_is_vehicle_id($vehicle_id){
     return true;
}

function veh_vehicles_traffic_tickets_is_date($date){
     return true;
}

function veh_vehicles_traffic_tickets_is_time($time){
     return true;
}

function veh_vehicles_traffic_tickets_is_pv_police($pv_police){
     return true;
}

function veh_vehicles_traffic_tickets_is_driver_id($driver_id){
     return true;
}

function veh_vehicles_traffic_tickets_is_date_registre($date_registre){
     return true;
}

function veh_vehicles_traffic_tickets_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_vehicles_traffic_tickets_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_vehicles_traffic_tickets_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_vehicles_traffic_tickets_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_vehicles_traffic_tickets_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_vehicles_traffic_tickets_is_id($value)) ? true : false;
            break;
     case "vehicle_id":
            $is = (veh_vehicles_traffic_tickets_is_vehicle_id($value)) ? true : false;
            break;
     case "date":
            $is = (veh_vehicles_traffic_tickets_is_date($value)) ? true : false;
            break;
     case "time":
            $is = (veh_vehicles_traffic_tickets_is_time($value)) ? true : false;
            break;
     case "pv_police":
            $is = (veh_vehicles_traffic_tickets_is_pv_police($value)) ? true : false;
            break;
     case "driver_id":
            $is = (veh_vehicles_traffic_tickets_is_driver_id($value)) ? true : false;
            break;
     case "date_registre":
            $is = (veh_vehicles_traffic_tickets_is_date_registre($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_vehicles_traffic_tickets_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_vehicles_traffic_tickets_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_vehicles_traffic_tickets_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_vehicles_traffic_tickets&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'vehicle_id':
                echo '<th>' . _tr(ucfirst('vehicle_id')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'time':
                echo '<th>' . _tr(ucfirst('time')) . '</th>';
                break;
case 'pv_police':
                echo '<th>' . _tr(ucfirst('pv_police')) . '</th>';
                break;
case 'driver_id':
                echo '<th>' . _tr(ucfirst('driver_id')) . '</th>';
                break;
case 'date_registre':
                echo '<th>' . _tr(ucfirst('date_registre')) . '</th>';
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

function veh_vehicles_traffic_tickets_index_generate_column_body_td($veh_vehicles_traffic_tickets, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_vehicles_traffic_tickets&a=details&id=' . $veh_vehicles_traffic_tickets[$col] . '">' . $veh_vehicles_traffic_tickets[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'vehicle_id':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'time':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'pv_police':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'driver_id':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_vehicles_traffic_tickets&a=details&id=' . $veh_vehicles_traffic_tickets['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_vehicles_traffic_tickets&a=details_payement&id=' . $veh_vehicles_traffic_tickets['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicles_traffic_tickets&a=edit&id=' . $veh_vehicles_traffic_tickets['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicles_traffic_tickets&a=ok_delete&id=' . $veh_vehicles_traffic_tickets['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles_traffic_tickets&a=export_pdf&id=' . $veh_vehicles_traffic_tickets['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles_traffic_tickets&a=export_pdf&way=pdf&&id=' . $veh_vehicles_traffic_tickets['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_vehicles_traffic_tickets[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
