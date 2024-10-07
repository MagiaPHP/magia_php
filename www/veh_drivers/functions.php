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
# Fecha de creacion del documento: 2024-09-16 17:09:55 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:55 


// 

//function veh_drivers_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_drivers_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_drivers_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_drivers"); // Obtener columnas de la tabla de la base de datos
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
function veh_drivers_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_drivers` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_drivers_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_drivers` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_drivers_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_drivers` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_drivers_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `country`,  `license`,  `type`,  `number`,  `date_start`,  `date_end`,  `expired`,  `order_by`,  `status`   
    
    FROM `veh_drivers` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_drivers_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `country`,  `license`,  `type`,  `number`,  `date_start`,  `date_end`,  `expired`,  `order_by`,  `status`   
    FROM `veh_drivers` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_drivers_edit($id ,  $contact_id ,  $country ,  $license ,  $type ,  $number ,  $date_start ,  $date_end ,  $expired ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `contact_id` =:contact_id, `country` =:country, `license` =:license, `type` =:type, `number` =:number, `date_start` =:date_start, `date_end` =:date_end, `expired` =:expired, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "country" =>$country ,  
 "license" =>$license ,  
 "type" =>$type ,  
 "number" =>$number ,  
 "date_start" =>$date_start ,  
 "date_end" =>$date_end ,  
 "expired" =>$expired ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_drivers_add($contact_id ,  $country ,  $license ,  $type ,  $number ,  $date_start ,  $date_end ,  $expired ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_drivers` ( `id` ,   `contact_id` ,   `country` ,   `license` ,   `type` ,   `number` ,   `date_start` ,   `date_end` ,   `expired` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :country ,  :license ,  :type ,  :number ,  :date_start ,  :date_end ,  :expired ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "country" => $country ,  
 "license" => $license ,  
 "type" => $type ,  
 "number" => $number ,  
 "date_start" => $date_start ,  
 "date_end" => $date_end ,  
 "expired" => $expired ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_drivers_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `country`,  `license`,  `type`,  `number`,  `date_start`,  `date_end`,  `expired`,  `order_by`,  `status`    
            FROM `veh_drivers` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `country` like :txt
OR `license` like :txt
OR `type` like :txt
OR `number` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
OR `expired` like :txt
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

function veh_drivers_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_drivers_list() as $key => $value) {
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
function veh_drivers_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_drivers` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_drivers_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `country`,  `license`,  `type`,  `number`,  `date_start`,  `date_end`,  `expired`,  `order_by`,  `status`    FROM `veh_drivers` 

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

function veh_drivers_db_show_col_from_table($c) {
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
function veh_drivers_db_col_list_from_table($c){
    $list = array();
    foreach (veh_drivers_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_drivers_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_country($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `country`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_license($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `license`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_expired($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `expired`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_drivers_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_drivers` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_drivers_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_drivers_update_id($id, $new_data);
            break;

        case "contact_id":
            veh_drivers_update_contact_id($id, $new_data);
            break;

        case "country":
            veh_drivers_update_country($id, $new_data);
            break;

        case "license":
            veh_drivers_update_license($id, $new_data);
            break;

        case "type":
            veh_drivers_update_type($id, $new_data);
            break;

        case "number":
            veh_drivers_update_number($id, $new_data);
            break;

        case "date_start":
            veh_drivers_update_date_start($id, $new_data);
            break;

        case "date_end":
            veh_drivers_update_date_end($id, $new_data);
            break;

        case "expired":
            veh_drivers_update_expired($id, $new_data);
            break;

        case "order_by":
            veh_drivers_update_order_by($id, $new_data);
            break;

        case "status":
            veh_drivers_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_drivers_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_drivers` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_drivers/functions.php
// and comment here (this function)
function veh_drivers_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "country":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "license":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "number":
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
        case "expired":
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
function veh_drivers_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_drivers` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `veh_drivers` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_country($country){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `country` FROM `veh_drivers` WHERE   `country` = ?");
    $req->execute(array($country));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_license($license){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `license` FROM `veh_drivers` WHERE   `license` = ?");
    $req->execute(array($license));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `veh_drivers` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_number($number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `number` FROM `veh_drivers` WHERE   `number` = ?");
    $req->execute(array($number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_date_start($date_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `veh_drivers` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_date_end($date_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `veh_drivers` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_expired($expired){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `expired` FROM `veh_drivers` WHERE   `expired` = ?");
    $req->execute(array($expired));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_drivers` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_drivers_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_drivers` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_drivers_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_drivers_is_contact_id($contact_id){
     return true;
}

function veh_drivers_is_country($country){
     return true;
}

function veh_drivers_is_license($license){
     return true;
}

function veh_drivers_is_type($type){
     return true;
}

function veh_drivers_is_number($number){
     return true;
}

function veh_drivers_is_date_start($date_start){
     return true;
}

function veh_drivers_is_date_end($date_end){
     return true;
}

function veh_drivers_is_expired($expired){
     return true;
}

function veh_drivers_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_drivers_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_drivers_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_drivers_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_drivers_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_drivers_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (veh_drivers_is_contact_id($value)) ? true : false;
            break;
     case "country":
            $is = (veh_drivers_is_country($value)) ? true : false;
            break;
     case "license":
            $is = (veh_drivers_is_license($value)) ? true : false;
            break;
     case "type":
            $is = (veh_drivers_is_type($value)) ? true : false;
            break;
     case "number":
            $is = (veh_drivers_is_number($value)) ? true : false;
            break;
     case "date_start":
            $is = (veh_drivers_is_date_start($value)) ? true : false;
            break;
     case "date_end":
            $is = (veh_drivers_is_date_end($value)) ? true : false;
            break;
     case "expired":
            $is = (veh_drivers_is_expired($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_drivers_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_drivers_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_drivers_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_drivers&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'country':
                echo '<th>' . _tr(ucfirst('country')) . '</th>';
                break;
case 'license':
                echo '<th>' . _tr(ucfirst('license')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'number':
                echo '<th>' . _tr(ucfirst('number')) . '</th>';
                break;
case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
                break;
case 'expired':
                echo '<th>' . _tr(ucfirst('expired')) . '</th>';
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

function veh_drivers_index_generate_column_body_td($veh_drivers, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_drivers&a=details&id=' . $veh_drivers[$col] . '">' . $veh_drivers[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'country':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'license':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'number':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'date_start':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'date_end':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'expired':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_drivers&a=details&id=' . $veh_drivers['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_drivers&a=details_payement&id=' . $veh_drivers['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_drivers&a=edit&id=' . $veh_drivers['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_drivers&a=ok_delete&id=' . $veh_drivers['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_drivers&a=export_pdf&id=' . $veh_drivers['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_drivers&a=export_pdf&way=pdf&&id=' . $veh_drivers['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_drivers[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
