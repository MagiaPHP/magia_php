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
# Fecha de creacion del documento: 2024-09-16 17:09:09 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:09 


// 

//function veh_maintenance_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_maintenance_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_maintenance_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_maintenance"); // Obtener columnas de la tabla de la base de datos
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
function veh_maintenance_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_maintenance` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_maintenance_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_maintenance` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_maintenance_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_maintenance` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_maintenance_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `workshop_id`,  `date`,  `type`,  `next_visit`,  `total`,  `kl`,  `notes`,  `date_registre`,  `order_by`,  `status`   
    
    FROM `veh_maintenance` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_maintenance_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `vehicle_id`,  `workshop_id`,  `date`,  `type`,  `next_visit`,  `total`,  `kl`,  `notes`,  `date_registre`,  `order_by`,  `status`   
    FROM `veh_maintenance` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_maintenance_edit($id ,  $vehicle_id ,  $workshop_id ,  $date ,  $type ,  $next_visit ,  $total ,  $kl ,  $notes ,  $date_registre ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `vehicle_id` =:vehicle_id, `workshop_id` =:workshop_id, `date` =:date, `type` =:type, `next_visit` =:next_visit, `total` =:total, `kl` =:kl, `notes` =:notes, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "vehicle_id" =>$vehicle_id ,  
 "workshop_id" =>$workshop_id ,  
 "date" =>$date ,  
 "type" =>$type ,  
 "next_visit" =>$next_visit ,  
 "total" =>$total ,  
 "kl" =>$kl ,  
 "notes" =>$notes ,  
 "date_registre" =>$date_registre ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_maintenance_add($vehicle_id ,  $workshop_id ,  $date ,  $type ,  $next_visit ,  $total ,  $kl ,  $notes ,  $date_registre ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_maintenance` ( `id` ,   `vehicle_id` ,   `workshop_id` ,   `date` ,   `type` ,   `next_visit` ,   `total` ,   `kl` ,   `notes` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :vehicle_id ,  :workshop_id ,  :date ,  :type ,  :next_visit ,  :total ,  :kl ,  :notes ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "vehicle_id" => $vehicle_id ,  
 "workshop_id" => $workshop_id ,  
 "date" => $date ,  
 "type" => $type ,  
 "next_visit" => $next_visit ,  
 "total" => $total ,  
 "kl" => $kl ,  
 "notes" => $notes ,  
 "date_registre" => $date_registre ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_maintenance_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `workshop_id`,  `date`,  `type`,  `next_visit`,  `total`,  `kl`,  `notes`,  `date_registre`,  `order_by`,  `status`    
            FROM `veh_maintenance` 
            WHERE `id` = :txt OR `id` like :txt
OR `vehicle_id` like :txt
OR `workshop_id` like :txt
OR `date` like :txt
OR `type` like :txt
OR `next_visit` like :txt
OR `total` like :txt
OR `kl` like :txt
OR `notes` like :txt
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

function veh_maintenance_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_maintenance_list() as $key => $value) {
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
function veh_maintenance_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_maintenance` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_maintenance_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `workshop_id`,  `date`,  `type`,  `next_visit`,  `total`,  `kl`,  `notes`,  `date_registre`,  `order_by`,  `status`    FROM `veh_maintenance` 

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

function veh_maintenance_db_show_col_from_table($c) {
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
function veh_maintenance_db_col_list_from_table($c){
    $list = array();
    foreach (veh_maintenance_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_maintenance_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_vehicle_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `vehicle_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_workshop_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `workshop_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_next_visit($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `next_visit`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_kl($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `kl`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_notes($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `notes`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_maintenance_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_maintenance_update_id($id, $new_data);
            break;

        case "vehicle_id":
            veh_maintenance_update_vehicle_id($id, $new_data);
            break;

        case "workshop_id":
            veh_maintenance_update_workshop_id($id, $new_data);
            break;

        case "date":
            veh_maintenance_update_date($id, $new_data);
            break;

        case "type":
            veh_maintenance_update_type($id, $new_data);
            break;

        case "next_visit":
            veh_maintenance_update_next_visit($id, $new_data);
            break;

        case "total":
            veh_maintenance_update_total($id, $new_data);
            break;

        case "kl":
            veh_maintenance_update_kl($id, $new_data);
            break;

        case "notes":
            veh_maintenance_update_notes($id, $new_data);
            break;

        case "date_registre":
            veh_maintenance_update_date_registre($id, $new_data);
            break;

        case "order_by":
            veh_maintenance_update_order_by($id, $new_data);
            break;

        case "status":
            veh_maintenance_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_maintenance_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_maintenance` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_maintenance/functions.php
// and comment here (this function)
function veh_maintenance_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "vehicle_id":
            //return veh_vehicles_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "workshop_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "next_visit":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "total":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "kl":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "notes":
            //return _field_id("", $value);
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
function veh_maintenance_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_maintenance` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_vehicle_id($vehicle_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `vehicle_id` FROM `veh_maintenance` WHERE   `vehicle_id` = ?");
    $req->execute(array($vehicle_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_workshop_id($workshop_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `workshop_id` FROM `veh_maintenance` WHERE   `workshop_id` = ?");
    $req->execute(array($workshop_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `veh_maintenance` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `veh_maintenance` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_next_visit($next_visit){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `next_visit` FROM `veh_maintenance` WHERE   `next_visit` = ?");
    $req->execute(array($next_visit));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_total($total){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `veh_maintenance` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_kl($kl){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `kl` FROM `veh_maintenance` WHERE   `kl` = ?");
    $req->execute(array($kl));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_notes($notes){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `notes` FROM `veh_maintenance` WHERE   `notes` = ?");
    $req->execute(array($notes));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `veh_maintenance` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_maintenance` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_maintenance` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_maintenance_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_maintenance_is_vehicle_id($vehicle_id){
     return true;
}

function veh_maintenance_is_workshop_id($workshop_id){
     return true;
}

function veh_maintenance_is_date($date){
     return true;
}

function veh_maintenance_is_type($type){
     return true;
}

function veh_maintenance_is_next_visit($next_visit){
     return true;
}

function veh_maintenance_is_total($total){
     return true;
}

function veh_maintenance_is_kl($kl){
     return true;
}

function veh_maintenance_is_notes($notes){
     return true;
}

function veh_maintenance_is_date_registre($date_registre){
     return true;
}

function veh_maintenance_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_maintenance_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_maintenance_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_maintenance_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_maintenance_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_maintenance_is_id($value)) ? true : false;
            break;
     case "vehicle_id":
            $is = (veh_maintenance_is_vehicle_id($value)) ? true : false;
            break;
     case "workshop_id":
            $is = (veh_maintenance_is_workshop_id($value)) ? true : false;
            break;
     case "date":
            $is = (veh_maintenance_is_date($value)) ? true : false;
            break;
     case "type":
            $is = (veh_maintenance_is_type($value)) ? true : false;
            break;
     case "next_visit":
            $is = (veh_maintenance_is_next_visit($value)) ? true : false;
            break;
     case "total":
            $is = (veh_maintenance_is_total($value)) ? true : false;
            break;
     case "kl":
            $is = (veh_maintenance_is_kl($value)) ? true : false;
            break;
     case "notes":
            $is = (veh_maintenance_is_notes($value)) ? true : false;
            break;
     case "date_registre":
            $is = (veh_maintenance_is_date_registre($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_maintenance_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_maintenance_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_maintenance_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_maintenance&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'vehicle_id':
                echo '<th>' . _tr(ucfirst('vehicle_id')) . '</th>';
                break;
case 'workshop_id':
                echo '<th>' . _tr(ucfirst('workshop_id')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'next_visit':
                echo '<th>' . _tr(ucfirst('next_visit')) . '</th>';
                break;
case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
                break;
case 'kl':
                echo '<th>' . _tr(ucfirst('kl')) . '</th>';
                break;
case 'notes':
                echo '<th>' . _tr(ucfirst('notes')) . '</th>';
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

function veh_maintenance_index_generate_column_body_td($veh_maintenance, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_maintenance&a=details&id=' . $veh_maintenance[$col] . '">' . $veh_maintenance[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'vehicle_id':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'workshop_id':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'next_visit':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'total':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'kl':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'notes':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_maintenance&a=details&id=' . $veh_maintenance['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_maintenance&a=details_payement&id=' . $veh_maintenance['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_maintenance&a=edit&id=' . $veh_maintenance['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_maintenance&a=ok_delete&id=' . $veh_maintenance['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=export_pdf&id=' . $veh_maintenance['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance&a=export_pdf&way=pdf&&id=' . $veh_maintenance['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_maintenance[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
