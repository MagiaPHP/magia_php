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
# Fecha de creacion del documento: 2024-09-16 17:09:28 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:28 


// 

//function veh_vehicle_management_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_vehicle_management_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_vehicle_management_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_vehicle_management"); // Obtener columnas de la tabla de la base de datos
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
function veh_vehicle_management_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_management` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_management_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_management` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_management_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_vehicle_management` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_vehicle_management_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `maintenance_type`,  `description`,  `date`,  `cost`,  `mileage`,  `next_due_date`   
    
    FROM `veh_vehicle_management` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_vehicle_management_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `vehicle_id`,  `maintenance_type`,  `description`,  `date`,  `cost`,  `mileage`,  `next_due_date`   
    FROM `veh_vehicle_management` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_vehicle_management_edit($id ,  $vehicle_id ,  $maintenance_type ,  $description ,  $date ,  $cost ,  $mileage ,  $next_due_date   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `vehicle_id` =:vehicle_id, `maintenance_type` =:maintenance_type, `description` =:description, `date` =:date, `cost` =:cost, `mileage` =:mileage, `next_due_date` =:next_due_date  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "vehicle_id" =>$vehicle_id ,  
 "maintenance_type" =>$maintenance_type ,  
 "description" =>$description ,  
 "date" =>$date ,  
 "cost" =>$cost ,  
 "mileage" =>$mileage ,  
 "next_due_date" =>$next_due_date ,  

));
}

function veh_vehicle_management_add($vehicle_id ,  $maintenance_type ,  $description ,  $date ,  $cost ,  $mileage ,  $next_due_date   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_vehicle_management` ( `id` ,   `vehicle_id` ,   `maintenance_type` ,   `description` ,   `date` ,   `cost` ,   `mileage` ,   `next_due_date`   )
                                       VALUES  (:id ,  :vehicle_id ,  :maintenance_type ,  :description ,  :date ,  :cost ,  :mileage ,  :next_due_date   ) ");

    $req->execute(array(

 "id" => null ,  
 "vehicle_id" => $vehicle_id ,  
 "maintenance_type" => $maintenance_type ,  
 "description" => $description ,  
 "date" => $date ,  
 "cost" => $cost ,  
 "mileage" => $mileage ,  
 "next_due_date" => $next_due_date   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_vehicle_management_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `maintenance_type`,  `description`,  `date`,  `cost`,  `mileage`,  `next_due_date`    
            FROM `veh_vehicle_management` 
            WHERE `id` = :txt OR `id` like :txt
OR `vehicle_id` like :txt
OR `maintenance_type` like :txt
OR `description` like :txt
OR `date` like :txt
OR `cost` like :txt
OR `mileage` like :txt
OR `next_due_date` like :txt
 
        

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

function veh_vehicle_management_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_vehicle_management_list() as $key => $value) {
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
function veh_vehicle_management_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_vehicle_management` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_vehicle_management_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `vehicle_id`,  `maintenance_type`,  `description`,  `date`,  `cost`,  `mileage`,  `next_due_date`    FROM `veh_vehicle_management` 

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

function veh_vehicle_management_db_show_col_from_table($c) {
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
function veh_vehicle_management_db_col_list_from_table($c){
    $list = array();
    foreach (veh_vehicle_management_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_vehicle_management_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_vehicle_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `vehicle_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_maintenance_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `maintenance_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_cost($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `cost`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_mileage($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `mileage`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_vehicle_management_update_next_due_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_vehicle_management` SET `next_due_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_vehicle_management_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_vehicle_management_update_id($id, $new_data);
            break;

        case "vehicle_id":
            veh_vehicle_management_update_vehicle_id($id, $new_data);
            break;

        case "maintenance_type":
            veh_vehicle_management_update_maintenance_type($id, $new_data);
            break;

        case "description":
            veh_vehicle_management_update_description($id, $new_data);
            break;

        case "date":
            veh_vehicle_management_update_date($id, $new_data);
            break;

        case "cost":
            veh_vehicle_management_update_cost($id, $new_data);
            break;

        case "mileage":
            veh_vehicle_management_update_mileage($id, $new_data);
            break;

        case "next_due_date":
            veh_vehicle_management_update_next_due_date($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_vehicle_management_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_vehicle_management` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_vehicle_management/functions.php
// and comment here (this function)
function veh_vehicle_management_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "vehicle_id":
            //return veh_vehicles_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "maintenance_type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "cost":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "mileage":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "next_due_date":
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
function veh_vehicle_management_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_vehicle_management` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_vehicle_id($vehicle_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `vehicle_id` FROM `veh_vehicle_management` WHERE   `vehicle_id` = ?");
    $req->execute(array($vehicle_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_maintenance_type($maintenance_type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `maintenance_type` FROM `veh_vehicle_management` WHERE   `maintenance_type` = ?");
    $req->execute(array($maintenance_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `veh_vehicle_management` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `veh_vehicle_management` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_cost($cost){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `cost` FROM `veh_vehicle_management` WHERE   `cost` = ?");
    $req->execute(array($cost));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_mileage($mileage){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `mileage` FROM `veh_vehicle_management` WHERE   `mileage` = ?");
    $req->execute(array($mileage));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_vehicle_management_exists_next_due_date($next_due_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `next_due_date` FROM `veh_vehicle_management` WHERE   `next_due_date` = ?");
    $req->execute(array($next_due_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_vehicle_management_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_vehicle_management_is_vehicle_id($vehicle_id){
     return true;
}

function veh_vehicle_management_is_maintenance_type($maintenance_type){
     return true;
}

function veh_vehicle_management_is_description($description){
     return true;
}

function veh_vehicle_management_is_date($date){
     return true;
}

function veh_vehicle_management_is_cost($cost){
     return true;
}

function veh_vehicle_management_is_mileage($mileage){
     return true;
}

function veh_vehicle_management_is_next_due_date($next_due_date){
     return true;
}


//
//
function veh_vehicle_management_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_vehicle_management_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_vehicle_management_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_vehicle_management_is_id($value)) ? true : false;
            break;
     case "vehicle_id":
            $is = (veh_vehicle_management_is_vehicle_id($value)) ? true : false;
            break;
     case "maintenance_type":
            $is = (veh_vehicle_management_is_maintenance_type($value)) ? true : false;
            break;
     case "description":
            $is = (veh_vehicle_management_is_description($value)) ? true : false;
            break;
     case "date":
            $is = (veh_vehicle_management_is_date($value)) ? true : false;
            break;
     case "cost":
            $is = (veh_vehicle_management_is_cost($value)) ? true : false;
            break;
     case "mileage":
            $is = (veh_vehicle_management_is_mileage($value)) ? true : false;
            break;
     case "next_due_date":
            $is = (veh_vehicle_management_is_next_due_date($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_vehicle_management_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_vehicle_management&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'vehicle_id':
                echo '<th>' . _tr(ucfirst('vehicle_id')) . '</th>';
                break;
case 'maintenance_type':
                echo '<th>' . _tr(ucfirst('maintenance_type')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'cost':
                echo '<th>' . _tr(ucfirst('cost')) . '</th>';
                break;
case 'mileage':
                echo '<th>' . _tr(ucfirst('mileage')) . '</th>';
                break;
case 'next_due_date':
                echo '<th>' . _tr(ucfirst('next_due_date')) . '</th>';
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

function veh_vehicle_management_index_generate_column_body_td($veh_vehicle_management, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_vehicle_management&a=details&id=' . $veh_vehicle_management[$col] . '">' . $veh_vehicle_management[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'vehicle_id':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'maintenance_type':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'cost':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'mileage':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
case 'next_due_date':
                echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_vehicle_management&a=details&id=' . $veh_vehicle_management['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_vehicle_management&a=details_payement&id=' . $veh_vehicle_management['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicle_management&a=edit&id=' . $veh_vehicle_management['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_vehicle_management&a=ok_delete&id=' . $veh_vehicle_management['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_management&a=export_pdf&id=' . $veh_vehicle_management['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_vehicle_management&a=export_pdf&way=pdf&&id=' . $veh_vehicle_management['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_vehicle_management[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
