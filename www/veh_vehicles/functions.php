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
# Fecha de creacion del documento: 2024-09-16 17:09:35 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:35 


// 

//function veh_vehicles_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_vehicles_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_vehicles_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_vehicles"); // Obtener columnas de la tabla de la base de datos
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
function veh_vehicles_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicles` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicles_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicles` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicles_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicles` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicles_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `name`,  `marca`,  `modelo`,  `serie`,  `type`,  `pasangers`,  `year`,  `chasis`,  `color`,  `alto`,  `ancho`,  `largo`,  `date_buy`,  `mma`,  `towing_system`,  `towing_system_kl`,  `date_registre`,  `order_by`,  `status`   
    
    FROM `veh_vehicles` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_vehicles_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `name`,  `marca`,  `modelo`,  `serie`,  `type`,  `pasangers`,  `year`,  `chasis`,  `color`,  `alto`,  `ancho`,  `largo`,  `date_buy`,  `mma`,  `towing_system`,  `towing_system_kl`,  `date_registre`,  `order_by`,  `status`   
    FROM `veh_vehicles` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_vehicles_edit($id ,  $name ,  $marca ,  $modelo ,  $serie ,  $type ,  $pasangers ,  $year ,  $chasis ,  $color ,  $alto ,  $ancho ,  $largo ,  $date_buy ,  $mma ,  $towing_system ,  $towing_system_kl ,  $date_registre ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `name` =:name, `marca` =:marca, `modelo` =:modelo, `serie` =:serie, `type` =:type, `pasangers` =:pasangers, `year` =:year, `chasis` =:chasis, `color` =:color, `alto` =:alto, `ancho` =:ancho, `largo` =:largo, `date_buy` =:date_buy, `mma` =:mma, `towing_system` =:towing_system, `towing_system_kl` =:towing_system_kl, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "name" =>$name ,  
 "marca" =>$marca ,  
 "modelo" =>$modelo ,  
 "serie" =>$serie ,  
 "type" =>$type ,  
 "pasangers" =>$pasangers ,  
 "year" =>$year ,  
 "chasis" =>$chasis ,  
 "color" =>$color ,  
 "alto" =>$alto ,  
 "ancho" =>$ancho ,  
 "largo" =>$largo ,  
 "date_buy" =>$date_buy ,  
 "mma" =>$mma ,  
 "towing_system" =>$towing_system ,  
 "towing_system_kl" =>$towing_system_kl ,  
 "date_registre" =>$date_registre ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_vehicles_add($name ,  $marca ,  $modelo ,  $serie ,  $type ,  $pasangers ,  $year ,  $chasis ,  $color ,  $alto ,  $ancho ,  $largo ,  $date_buy ,  $mma ,  $towing_system ,  $towing_system_kl ,  $date_registre ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_vehicles` ( `id` ,   `name` ,   `marca` ,   `modelo` ,   `serie` ,   `type` ,   `pasangers` ,   `year` ,   `chasis` ,   `color` ,   `alto` ,   `ancho` ,   `largo` ,   `date_buy` ,   `mma` ,   `towing_system` ,   `towing_system_kl` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :marca ,  :modelo ,  :serie ,  :type ,  :pasangers ,  :year ,  :chasis ,  :color ,  :alto ,  :ancho ,  :largo ,  :date_buy ,  :mma ,  :towing_system ,  :towing_system_kl ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "marca" => $marca ,  
 "modelo" => $modelo ,  
 "serie" => $serie ,  
 "type" => $type ,  
 "pasangers" => $pasangers ,  
 "year" => $year ,  
 "chasis" => $chasis ,  
 "color" => $color ,  
 "alto" => $alto ,  
 "ancho" => $ancho ,  
 "largo" => $largo ,  
 "date_buy" => $date_buy ,  
 "mma" => $mma ,  
 "towing_system" => $towing_system ,  
 "towing_system_kl" => $towing_system_kl ,  
 "date_registre" => $date_registre ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_vehicles_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `name`,  `marca`,  `modelo`,  `serie`,  `type`,  `pasangers`,  `year`,  `chasis`,  `color`,  `alto`,  `ancho`,  `largo`,  `date_buy`,  `mma`,  `towing_system`,  `towing_system_kl`,  `date_registre`,  `order_by`,  `status`    
            FROM `veh_vehicles` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
OR `marca` like :txt
OR `modelo` like :txt
OR `serie` like :txt
OR `type` like :txt
OR `pasangers` like :txt
OR `year` like :txt
OR `chasis` like :txt
OR `color` like :txt
OR `alto` like :txt
OR `ancho` like :txt
OR `largo` like :txt
OR `date_buy` like :txt
OR `mma` like :txt
OR `towing_system` like :txt
OR `towing_system_kl` like :txt
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

function veh_vehicles_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_vehicles_list() as $key => $value) {
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
function veh_vehicles_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_vehicles` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_vehicles_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `name`,  `marca`,  `modelo`,  `serie`,  `type`,  `pasangers`,  `year`,  `chasis`,  `color`,  `alto`,  `ancho`,  `largo`,  `date_buy`,  `mma`,  `towing_system`,  `towing_system_kl`,  `date_registre`,  `order_by`,  `status`    FROM `veh_vehicles` 

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

function veh_vehicles_db_show_col_from_table($c) {
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
function veh_vehicles_db_col_list_from_table($c){
    $list = array();
    foreach (veh_vehicles_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_vehicles_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_marca($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `marca`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_modelo($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `modelo`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_serie($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `serie`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_pasangers($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `pasangers`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_year($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `year`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_chasis($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `chasis`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_color($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `color`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_alto($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `alto`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_ancho($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `ancho`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_largo($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `largo`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_date_buy($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `date_buy`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_mma($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `mma`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_towing_system($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `towing_system`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_towing_system_kl($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `towing_system_kl`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicles_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicles` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_vehicles_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_vehicles_update_id($id, $new_data);
            break;

        case "name":
            veh_vehicles_update_name($id, $new_data);
            break;

        case "marca":
            veh_vehicles_update_marca($id, $new_data);
            break;

        case "modelo":
            veh_vehicles_update_modelo($id, $new_data);
            break;

        case "serie":
            veh_vehicles_update_serie($id, $new_data);
            break;

        case "type":
            veh_vehicles_update_type($id, $new_data);
            break;

        case "pasangers":
            veh_vehicles_update_pasangers($id, $new_data);
            break;

        case "year":
            veh_vehicles_update_year($id, $new_data);
            break;

        case "chasis":
            veh_vehicles_update_chasis($id, $new_data);
            break;

        case "color":
            veh_vehicles_update_color($id, $new_data);
            break;

        case "alto":
            veh_vehicles_update_alto($id, $new_data);
            break;

        case "ancho":
            veh_vehicles_update_ancho($id, $new_data);
            break;

        case "largo":
            veh_vehicles_update_largo($id, $new_data);
            break;

        case "date_buy":
            veh_vehicles_update_date_buy($id, $new_data);
            break;

        case "mma":
            veh_vehicles_update_mma($id, $new_data);
            break;

        case "towing_system":
            veh_vehicles_update_towing_system($id, $new_data);
            break;

        case "towing_system_kl":
            veh_vehicles_update_towing_system_kl($id, $new_data);
            break;

        case "date_registre":
            veh_vehicles_update_date_registre($id, $new_data);
            break;

        case "order_by":
            veh_vehicles_update_order_by($id, $new_data);
            break;

        case "status":
            veh_vehicles_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_vehicles_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_vehicles` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_vehicles/functions.php
// and comment here (this function)
function veh_vehicles_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "marca":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "modelo":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "serie":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "pasangers":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "year":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "chasis":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "color":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "alto":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ancho":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "largo":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_buy":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "mma":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "towing_system":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "towing_system_kl":
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
function veh_vehicles_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_vehicles` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `veh_vehicles` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_marca($marca){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `marca` FROM `veh_vehicles` WHERE   `marca` = ?");
    $req->execute(array($marca));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_modelo($modelo){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `modelo` FROM `veh_vehicles` WHERE   `modelo` = ?");
    $req->execute(array($modelo));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_serie($serie){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `serie` FROM `veh_vehicles` WHERE   `serie` = ?");
    $req->execute(array($serie));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `veh_vehicles` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_pasangers($pasangers){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `pasangers` FROM `veh_vehicles` WHERE   `pasangers` = ?");
    $req->execute(array($pasangers));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_year($year){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `year` FROM `veh_vehicles` WHERE   `year` = ?");
    $req->execute(array($year));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_chasis($chasis){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `chasis` FROM `veh_vehicles` WHERE   `chasis` = ?");
    $req->execute(array($chasis));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_color($color){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `color` FROM `veh_vehicles` WHERE   `color` = ?");
    $req->execute(array($color));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_alto($alto){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `alto` FROM `veh_vehicles` WHERE   `alto` = ?");
    $req->execute(array($alto));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_ancho($ancho){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ancho` FROM `veh_vehicles` WHERE   `ancho` = ?");
    $req->execute(array($ancho));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_largo($largo){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `largo` FROM `veh_vehicles` WHERE   `largo` = ?");
    $req->execute(array($largo));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_date_buy($date_buy){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_buy` FROM `veh_vehicles` WHERE   `date_buy` = ?");
    $req->execute(array($date_buy));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_mma($mma){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `mma` FROM `veh_vehicles` WHERE   `mma` = ?");
    $req->execute(array($mma));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_towing_system($towing_system){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `towing_system` FROM `veh_vehicles` WHERE   `towing_system` = ?");
    $req->execute(array($towing_system));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_towing_system_kl($towing_system_kl){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `towing_system_kl` FROM `veh_vehicles` WHERE   `towing_system_kl` = ?");
    $req->execute(array($towing_system_kl));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `veh_vehicles` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_vehicles` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicles_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_vehicles` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_vehicles_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_vehicles_is_name($name){
     return true;
}

function veh_vehicles_is_marca($marca){
     return true;
}

function veh_vehicles_is_modelo($modelo){
     return true;
}

function veh_vehicles_is_serie($serie){
     return true;
}

function veh_vehicles_is_type($type){
     return true;
}

function veh_vehicles_is_pasangers($pasangers){
     return true;
}

function veh_vehicles_is_year($year){
     return true;
}

function veh_vehicles_is_chasis($chasis){
     return true;
}

function veh_vehicles_is_color($color){
     return true;
}

function veh_vehicles_is_alto($alto){
     return true;
}

function veh_vehicles_is_ancho($ancho){
     return true;
}

function veh_vehicles_is_largo($largo){
     return true;
}

function veh_vehicles_is_date_buy($date_buy){
     return true;
}

function veh_vehicles_is_mma($mma){
     return true;
}

function veh_vehicles_is_towing_system($towing_system){
     return true;
}

function veh_vehicles_is_towing_system_kl($towing_system_kl){
     return true;
}

function veh_vehicles_is_date_registre($date_registre){
     return true;
}

function veh_vehicles_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_vehicles_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_vehicles_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_vehicles_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_vehicles_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_vehicles_is_id($value)) ? true : false;
            break;
     case "name":
            $is = (veh_vehicles_is_name($value)) ? true : false;
            break;
     case "marca":
            $is = (veh_vehicles_is_marca($value)) ? true : false;
            break;
     case "modelo":
            $is = (veh_vehicles_is_modelo($value)) ? true : false;
            break;
     case "serie":
            $is = (veh_vehicles_is_serie($value)) ? true : false;
            break;
     case "type":
            $is = (veh_vehicles_is_type($value)) ? true : false;
            break;
     case "pasangers":
            $is = (veh_vehicles_is_pasangers($value)) ? true : false;
            break;
     case "year":
            $is = (veh_vehicles_is_year($value)) ? true : false;
            break;
     case "chasis":
            $is = (veh_vehicles_is_chasis($value)) ? true : false;
            break;
     case "color":
            $is = (veh_vehicles_is_color($value)) ? true : false;
            break;
     case "alto":
            $is = (veh_vehicles_is_alto($value)) ? true : false;
            break;
     case "ancho":
            $is = (veh_vehicles_is_ancho($value)) ? true : false;
            break;
     case "largo":
            $is = (veh_vehicles_is_largo($value)) ? true : false;
            break;
     case "date_buy":
            $is = (veh_vehicles_is_date_buy($value)) ? true : false;
            break;
     case "mma":
            $is = (veh_vehicles_is_mma($value)) ? true : false;
            break;
     case "towing_system":
            $is = (veh_vehicles_is_towing_system($value)) ? true : false;
            break;
     case "towing_system_kl":
            $is = (veh_vehicles_is_towing_system_kl($value)) ? true : false;
            break;
     case "date_registre":
            $is = (veh_vehicles_is_date_registre($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_vehicles_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_vehicles_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_vehicles_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_vehicles&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'marca':
                echo '<th>' . _tr(ucfirst('marca')) . '</th>';
                break;
case 'modelo':
                echo '<th>' . _tr(ucfirst('modelo')) . '</th>';
                break;
case 'serie':
                echo '<th>' . _tr(ucfirst('serie')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'pasangers':
                echo '<th>' . _tr(ucfirst('pasangers')) . '</th>';
                break;
case 'year':
                echo '<th>' . _tr(ucfirst('year')) . '</th>';
                break;
case 'chasis':
                echo '<th>' . _tr(ucfirst('chasis')) . '</th>';
                break;
case 'color':
                echo '<th>' . _tr(ucfirst('color')) . '</th>';
                break;
case 'alto':
                echo '<th>' . _tr(ucfirst('alto')) . '</th>';
                break;
case 'ancho':
                echo '<th>' . _tr(ucfirst('ancho')) . '</th>';
                break;
case 'largo':
                echo '<th>' . _tr(ucfirst('largo')) . '</th>';
                break;
case 'date_buy':
                echo '<th>' . _tr(ucfirst('date_buy')) . '</th>';
                break;
case 'mma':
                echo '<th>' . _tr(ucfirst('mma')) . '</th>';
                break;
case 'towing_system':
                echo '<th>' . _tr(ucfirst('towing_system')) . '</th>';
                break;
case 'towing_system_kl':
                echo '<th>' . _tr(ucfirst('towing_system_kl')) . '</th>';
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

function veh_vehicles_index_generate_column_body_td($veh_vehicles, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_vehicles&a=details&id=' . $veh_vehicles[$col] . '">' . $veh_vehicles[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'marca':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'modelo':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'serie':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'pasangers':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'year':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'chasis':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'color':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'alto':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'ancho':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'largo':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'date_buy':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'mma':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'towing_system':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'towing_system_kl':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_vehicles&a=details&id=' . $veh_vehicles['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_vehicles&a=details_payement&id=' . $veh_vehicles['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicles&a=edit&id=' . $veh_vehicles['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicles&a=ok_delete&id=' . $veh_vehicles['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=export_pdf&id=' . $veh_vehicles['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicles&a=export_pdf&way=pdf&&id=' . $veh_vehicles['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_vehicles[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
