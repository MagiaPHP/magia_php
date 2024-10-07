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
# Fecha de creacion del documento: 2024-09-16 17:09:02 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:02 


// 

//function veh_fuels_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_fuels_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_fuels_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_fuels"); // Obtener columnas de la tabla de la base de datos
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
function veh_fuels_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_fuels` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_fuels_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_fuels` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_fuels_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_fuels` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_fuels_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `name`,  `code`,  `order_by`,  `status`   
    
    FROM `veh_fuels` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_fuels_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `name`,  `code`,  `order_by`,  `status`   
    FROM `veh_fuels` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_fuels_edit($id ,  $name ,  $code ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_fuels` SET `name` =:name, `code` =:code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "name" =>$name ,  
 "code" =>$code ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_fuels_add($name ,  $code ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_fuels` ( `id` ,   `name` ,   `code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :code ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "name" => $name ,  
 "code" => $code ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_fuels_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `name`,  `code`,  `order_by`,  `status`    
            FROM `veh_fuels` 
            WHERE `id` = :txt OR `id` like :txt
OR `name` like :txt
OR `code` like :txt
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

function veh_fuels_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_fuels_list() as $key => $value) {
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
function veh_fuels_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_fuels` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_fuels_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `name`,  `code`,  `order_by`,  `status`    FROM `veh_fuels` 

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

function veh_fuels_db_show_col_from_table($c) {
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
function veh_fuels_db_col_list_from_table($c){
    $list = array();
    foreach (veh_fuels_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_fuels_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_fuels` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_fuels_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_fuels` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_fuels_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_fuels` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_fuels_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_fuels` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_fuels_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_fuels` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_fuels_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_fuels_update_id($id, $new_data);
            break;

        case "name":
            veh_fuels_update_name($id, $new_data);
            break;

        case "code":
            veh_fuels_update_code($id, $new_data);
            break;

        case "order_by":
            veh_fuels_update_order_by($id, $new_data);
            break;

        case "status":
            veh_fuels_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_fuels_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_fuels` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_fuels/functions.php
// and comment here (this function)
function veh_fuels_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
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
function veh_fuels_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_fuels` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_fuels_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `veh_fuels` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_fuels_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `veh_fuels` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_fuels_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_fuels` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_fuels_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_fuels` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_fuels_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_fuels_is_name($name){
     return true;
}

function veh_fuels_is_code($code){
     return true;
}

function veh_fuels_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_fuels_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_fuels_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_fuels_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_fuels_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_fuels_is_id($value)) ? true : false;
            break;
     case "name":
            $is = (veh_fuels_is_name($value)) ? true : false;
            break;
     case "code":
            $is = (veh_fuels_is_code($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_fuels_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_fuels_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_fuels_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_fuels&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function veh_fuels_index_generate_column_body_td($veh_fuels, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_fuels&a=details&id=' . $veh_fuels[$col] . '">' . $veh_fuels[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_fuels[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($veh_fuels[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($veh_fuels[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_fuels[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_fuels[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_fuels&a=details&id=' . $veh_fuels['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_fuels&a=details_payement&id=' . $veh_fuels['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_fuels&a=edit&id=' . $veh_fuels['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_fuels&a=ok_delete&id=' . $veh_fuels['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_fuels&a=export_pdf&id=' . $veh_fuels['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_fuels&a=export_pdf&way=pdf&&id=' . $veh_fuels['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_fuels[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
