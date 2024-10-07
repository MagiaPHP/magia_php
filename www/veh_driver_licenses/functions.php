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
# Fecha de creacion del documento: 2024-09-16 17:09:51 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:51 


// 

//function veh_driver_licenses_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_driver_licenses_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_driver_licenses_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_driver_licenses"); // Obtener columnas de la tabla de la base de datos
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
function veh_driver_licenses_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_driver_licenses` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_driver_licenses_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_driver_licenses` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_driver_licenses_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_driver_licenses` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_driver_licenses_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `category`,  `description`,  `min_age`,  `max_weight`,  `max_passengers`,  `notes`,  `order_by`,  `status`   
    
    FROM `veh_driver_licenses` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_driver_licenses_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `category`,  `description`,  `min_age`,  `max_weight`,  `max_passengers`,  `notes`,  `order_by`,  `status`   
    FROM `veh_driver_licenses` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_driver_licenses_edit($id ,  $category ,  $description ,  $min_age ,  $max_weight ,  $max_passengers ,  $notes ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `category` =:category, `description` =:description, `min_age` =:min_age, `max_weight` =:max_weight, `max_passengers` =:max_passengers, `notes` =:notes, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "category" =>$category ,  
 "description" =>$description ,  
 "min_age" =>$min_age ,  
 "max_weight" =>$max_weight ,  
 "max_passengers" =>$max_passengers ,  
 "notes" =>$notes ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_driver_licenses_add($category ,  $description ,  $min_age ,  $max_weight ,  $max_passengers ,  $notes ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_driver_licenses` ( `id` ,   `category` ,   `description` ,   `min_age` ,   `max_weight` ,   `max_passengers` ,   `notes` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :category ,  :description ,  :min_age ,  :max_weight ,  :max_passengers ,  :notes ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "category" => $category ,  
 "description" => $description ,  
 "min_age" => $min_age ,  
 "max_weight" => $max_weight ,  
 "max_passengers" => $max_passengers ,  
 "notes" => $notes ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_driver_licenses_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `category`,  `description`,  `min_age`,  `max_weight`,  `max_passengers`,  `notes`,  `order_by`,  `status`    
            FROM `veh_driver_licenses` 
            WHERE `id` = :txt OR `id` like :txt
OR `category` like :txt
OR `description` like :txt
OR `min_age` like :txt
OR `max_weight` like :txt
OR `max_passengers` like :txt
OR `notes` like :txt
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

function veh_driver_licenses_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_driver_licenses_list() as $key => $value) {
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
function veh_driver_licenses_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_driver_licenses` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_driver_licenses_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `category`,  `description`,  `min_age`,  `max_weight`,  `max_passengers`,  `notes`,  `order_by`,  `status`    FROM `veh_driver_licenses` 

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

function veh_driver_licenses_db_show_col_from_table($c) {
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
function veh_driver_licenses_db_col_list_from_table($c){
    $list = array();
    foreach (veh_driver_licenses_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_driver_licenses_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_category($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `category`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_min_age($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `min_age`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_max_weight($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `max_weight`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_max_passengers($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `max_passengers`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_notes($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `notes`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_driver_licenses_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_driver_licenses` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_driver_licenses_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_driver_licenses_update_id($id, $new_data);
            break;

        case "category":
            veh_driver_licenses_update_category($id, $new_data);
            break;

        case "description":
            veh_driver_licenses_update_description($id, $new_data);
            break;

        case "min_age":
            veh_driver_licenses_update_min_age($id, $new_data);
            break;

        case "max_weight":
            veh_driver_licenses_update_max_weight($id, $new_data);
            break;

        case "max_passengers":
            veh_driver_licenses_update_max_passengers($id, $new_data);
            break;

        case "notes":
            veh_driver_licenses_update_notes($id, $new_data);
            break;

        case "order_by":
            veh_driver_licenses_update_order_by($id, $new_data);
            break;

        case "status":
            veh_driver_licenses_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_driver_licenses_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_driver_licenses` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_driver_licenses/functions.php
// and comment here (this function)
function veh_driver_licenses_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "min_age":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "max_weight":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "max_passengers":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "notes":
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
function veh_driver_licenses_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_driver_licenses` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_category($category){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category` FROM `veh_driver_licenses` WHERE   `category` = ?");
    $req->execute(array($category));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `veh_driver_licenses` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_min_age($min_age){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `min_age` FROM `veh_driver_licenses` WHERE   `min_age` = ?");
    $req->execute(array($min_age));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_max_weight($max_weight){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `max_weight` FROM `veh_driver_licenses` WHERE   `max_weight` = ?");
    $req->execute(array($max_weight));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_max_passengers($max_passengers){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `max_passengers` FROM `veh_driver_licenses` WHERE   `max_passengers` = ?");
    $req->execute(array($max_passengers));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_notes($notes){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `notes` FROM `veh_driver_licenses` WHERE   `notes` = ?");
    $req->execute(array($notes));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_driver_licenses` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_driver_licenses_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_driver_licenses` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_driver_licenses_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_driver_licenses_is_category($category){
     return true;
}

function veh_driver_licenses_is_description($description){
     return true;
}

function veh_driver_licenses_is_min_age($min_age){
     return true;
}

function veh_driver_licenses_is_max_weight($max_weight){
     return true;
}

function veh_driver_licenses_is_max_passengers($max_passengers){
     return true;
}

function veh_driver_licenses_is_notes($notes){
     return true;
}

function veh_driver_licenses_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_driver_licenses_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_driver_licenses_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_driver_licenses_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_driver_licenses_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_driver_licenses_is_id($value)) ? true : false;
            break;
     case "category":
            $is = (veh_driver_licenses_is_category($value)) ? true : false;
            break;
     case "description":
            $is = (veh_driver_licenses_is_description($value)) ? true : false;
            break;
     case "min_age":
            $is = (veh_driver_licenses_is_min_age($value)) ? true : false;
            break;
     case "max_weight":
            $is = (veh_driver_licenses_is_max_weight($value)) ? true : false;
            break;
     case "max_passengers":
            $is = (veh_driver_licenses_is_max_passengers($value)) ? true : false;
            break;
     case "notes":
            $is = (veh_driver_licenses_is_notes($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_driver_licenses_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_driver_licenses_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_driver_licenses_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_driver_licenses&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'category':
                echo '<th>' . _tr(ucfirst('category')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'min_age':
                echo '<th>' . _tr(ucfirst('min_age')) . '</th>';
                break;
case 'max_weight':
                echo '<th>' . _tr(ucfirst('max_weight')) . '</th>';
                break;
case 'max_passengers':
                echo '<th>' . _tr(ucfirst('max_passengers')) . '</th>';
                break;
case 'notes':
                echo '<th>' . _tr(ucfirst('notes')) . '</th>';
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

function veh_driver_licenses_index_generate_column_body_td($veh_driver_licenses, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_driver_licenses&a=details&id=' . $veh_driver_licenses[$col] . '">' . $veh_driver_licenses[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'category':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'min_age':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'max_weight':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'max_passengers':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'notes':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_driver_licenses&a=details&id=' . $veh_driver_licenses['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_driver_licenses&a=details_payement&id=' . $veh_driver_licenses['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_driver_licenses&a=edit&id=' . $veh_driver_licenses['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_driver_licenses&a=ok_delete&id=' . $veh_driver_licenses['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_driver_licenses&a=export_pdf&id=' . $veh_driver_licenses['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_driver_licenses&a=export_pdf&way=pdf&&id=' . $veh_driver_licenses['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_driver_licenses[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
