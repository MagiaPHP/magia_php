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
# Fecha de creacion del documento: 2024-09-16 17:09:25 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:25 


// 

//function veh_vehicle_kilometers_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_vehicle_kilometers_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_vehicle_kilometers_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_vehicle_kilometers"); // Obtener columnas de la tabla de la base de datos
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
function veh_vehicle_kilometers_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_kilometers` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_kilometers_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_kilometers` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_kilometers_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_kilometers` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_kilometers_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `event_date`,  `kl`,  `event_type`,  `event_id`,  `created_at`,  `order_by`,  `status`   
    
    FROM `veh_vehicle_kilometers` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_vehicle_kilometers_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `vehicle_id`,  `event_date`,  `kl`,  `event_type`,  `event_id`,  `created_at`,  `order_by`,  `status`   
    FROM `veh_vehicle_kilometers` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_vehicle_kilometers_edit($id ,  $vehicle_id ,  $event_date ,  $kl ,  $event_type ,  $event_id ,  $created_at ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `vehicle_id` =:vehicle_id, `event_date` =:event_date, `kl` =:kl, `event_type` =:event_type, `event_id` =:event_id, `created_at` =:created_at, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "vehicle_id" =>$vehicle_id ,  
 "event_date" =>$event_date ,  
 "kl" =>$kl ,  
 "event_type" =>$event_type ,  
 "event_id" =>$event_id ,  
 "created_at" =>$created_at ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_vehicle_kilometers_add($vehicle_id ,  $event_date ,  $kl ,  $event_type ,  $event_id ,  $created_at ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_vehicle_kilometers` ( `id` ,   `vehicle_id` ,   `event_date` ,   `kl` ,   `event_type` ,   `event_id` ,   `created_at` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :vehicle_id ,  :event_date ,  :kl ,  :event_type ,  :event_id ,  :created_at ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "vehicle_id" => $vehicle_id ,  
 "event_date" => $event_date ,  
 "kl" => $kl ,  
 "event_type" => $event_type ,  
 "event_id" => $event_id ,  
 "created_at" => $created_at ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_vehicle_kilometers_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `event_date`,  `kl`,  `event_type`,  `event_id`,  `created_at`,  `order_by`,  `status`    
            FROM `veh_vehicle_kilometers` 
            WHERE `id` = :txt OR `id` like :txt
OR `vehicle_id` like :txt
OR `event_date` like :txt
OR `kl` like :txt
OR `event_type` like :txt
OR `event_id` like :txt
OR `created_at` like :txt
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

function veh_vehicle_kilometers_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_vehicle_kilometers_list() as $key => $value) {
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
function veh_vehicle_kilometers_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_vehicle_kilometers` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_vehicle_kilometers_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `event_date`,  `kl`,  `event_type`,  `event_id`,  `created_at`,  `order_by`,  `status`    FROM `veh_vehicle_kilometers` 

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

function veh_vehicle_kilometers_db_show_col_from_table($c) {
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
function veh_vehicle_kilometers_db_col_list_from_table($c){
    $list = array();
    foreach (veh_vehicle_kilometers_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_vehicle_kilometers_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_vehicle_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `vehicle_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_event_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `event_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_kl($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `kl`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_event_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `event_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_event_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `event_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_created_at($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `created_at`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_kilometers_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_kilometers` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_vehicle_kilometers_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_vehicle_kilometers_update_id($id, $new_data);
            break;

        case "vehicle_id":
            veh_vehicle_kilometers_update_vehicle_id($id, $new_data);
            break;

        case "event_date":
            veh_vehicle_kilometers_update_event_date($id, $new_data);
            break;

        case "kl":
            veh_vehicle_kilometers_update_kl($id, $new_data);
            break;

        case "event_type":
            veh_vehicle_kilometers_update_event_type($id, $new_data);
            break;

        case "event_id":
            veh_vehicle_kilometers_update_event_id($id, $new_data);
            break;

        case "created_at":
            veh_vehicle_kilometers_update_created_at($id, $new_data);
            break;

        case "order_by":
            veh_vehicle_kilometers_update_order_by($id, $new_data);
            break;

        case "status":
            veh_vehicle_kilometers_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_vehicle_kilometers_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_vehicle_kilometers` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_vehicle_kilometers/functions.php
// and comment here (this function)
function veh_vehicle_kilometers_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "vehicle_id":
            //return veh_vehicles_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "event_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "kl":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "event_type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "event_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "created_at":
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
function veh_vehicle_kilometers_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_vehicle_kilometers` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_vehicle_id($vehicle_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `vehicle_id` FROM `veh_vehicle_kilometers` WHERE   `vehicle_id` = ?");
    $req->execute(array($vehicle_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_event_date($event_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `event_date` FROM `veh_vehicle_kilometers` WHERE   `event_date` = ?");
    $req->execute(array($event_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_kl($kl){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `kl` FROM `veh_vehicle_kilometers` WHERE   `kl` = ?");
    $req->execute(array($kl));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_event_type($event_type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `event_type` FROM `veh_vehicle_kilometers` WHERE   `event_type` = ?");
    $req->execute(array($event_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_event_id($event_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `event_id` FROM `veh_vehicle_kilometers` WHERE   `event_id` = ?");
    $req->execute(array($event_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_created_at($created_at){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `created_at` FROM `veh_vehicle_kilometers` WHERE   `created_at` = ?");
    $req->execute(array($created_at));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_vehicle_kilometers` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_kilometers_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_vehicle_kilometers` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_vehicle_kilometers_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_vehicle_kilometers_is_vehicle_id($vehicle_id){
     return true;
}

function veh_vehicle_kilometers_is_event_date($event_date){
     return true;
}

function veh_vehicle_kilometers_is_kl($kl){
     return true;
}

function veh_vehicle_kilometers_is_event_type($event_type){
     return true;
}

function veh_vehicle_kilometers_is_event_id($event_id){
     return true;
}

function veh_vehicle_kilometers_is_created_at($created_at){
     return true;
}

function veh_vehicle_kilometers_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_vehicle_kilometers_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_vehicle_kilometers_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_vehicle_kilometers_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_vehicle_kilometers_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_vehicle_kilometers_is_id($value)) ? true : false;
            break;
     case "vehicle_id":
            $is = (veh_vehicle_kilometers_is_vehicle_id($value)) ? true : false;
            break;
     case "event_date":
            $is = (veh_vehicle_kilometers_is_event_date($value)) ? true : false;
            break;
     case "kl":
            $is = (veh_vehicle_kilometers_is_kl($value)) ? true : false;
            break;
     case "event_type":
            $is = (veh_vehicle_kilometers_is_event_type($value)) ? true : false;
            break;
     case "event_id":
            $is = (veh_vehicle_kilometers_is_event_id($value)) ? true : false;
            break;
     case "created_at":
            $is = (veh_vehicle_kilometers_is_created_at($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_vehicle_kilometers_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_vehicle_kilometers_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_vehicle_kilometers_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_vehicle_kilometers&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'vehicle_id':
                echo '<th>' . _tr(ucfirst('vehicle_id')) . '</th>';
                break;
case 'event_date':
                echo '<th>' . _tr(ucfirst('event_date')) . '</th>';
                break;
case 'kl':
                echo '<th>' . _tr(ucfirst('kl')) . '</th>';
                break;
case 'event_type':
                echo '<th>' . _tr(ucfirst('event_type')) . '</th>';
                break;
case 'event_id':
                echo '<th>' . _tr(ucfirst('event_id')) . '</th>';
                break;
case 'created_at':
                echo '<th>' . _tr(ucfirst('created_at')) . '</th>';
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

function veh_vehicle_kilometers_index_generate_column_body_td($veh_vehicle_kilometers, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_vehicle_kilometers&a=details&id=' . $veh_vehicle_kilometers[$col] . '">' . $veh_vehicle_kilometers[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'vehicle_id':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'event_date':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'kl':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'event_type':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'event_id':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'created_at':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_vehicle_kilometers&a=details&id=' . $veh_vehicle_kilometers['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_vehicle_kilometers&a=details_payement&id=' . $veh_vehicle_kilometers['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicle_kilometers&a=edit&id=' . $veh_vehicle_kilometers['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicle_kilometers&a=ok_delete&id=' . $veh_vehicle_kilometers['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_kilometers&a=export_pdf&id=' . $veh_vehicle_kilometers['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_kilometers&a=export_pdf&way=pdf&&id=' . $veh_vehicle_kilometers['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_vehicle_kilometers[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
