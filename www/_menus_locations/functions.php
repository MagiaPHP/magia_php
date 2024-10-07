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
# Fecha de creacion del documento: 2024-09-16 20:09:49 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 20:09:49 


// 

//function _menus_locations_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function _menus_locations_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("_menus_locations_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("_menus_locations"); // Obtener columnas de la tabla de la base de datos
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
function _menus_locations_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `_menus_locations` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _menus_locations_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `_menus_locations` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _menus_locations_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `_menus_locations` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function _menus_locations_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `location`,  `label`,  `icon`,  `order_by`,  `status`   
    
    FROM `_menus_locations` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function _menus_locations_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `location`,  `label`,  `icon`,  `order_by`,  `status`   
    FROM `_menus_locations` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function _menus_locations_edit($id ,  $location ,  $label ,  $icon ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `location` =:location, `label` =:label, `icon` =:icon, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "location" =>$location ,  
 "label" =>$label ,  
 "icon" =>$icon ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function _menus_locations_add($location ,  $label ,  $icon ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `_menus_locations` ( `id` ,   `location` ,   `label` ,   `icon` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :location ,  :label ,  :icon ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "location" => $location ,  
 "label" => $label ,  
 "icon" => $icon ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function _menus_locations_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `location`,  `label`,  `icon`,  `order_by`,  `status`    
            FROM `_menus_locations` 
            WHERE `id` = :txt OR `id` like :txt
OR `location` like :txt
OR `label` like :txt
OR `icon` like :txt
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

function _menus_locations_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (_menus_locations_list() as $key => $value) {
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
function _menus_locations_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `_menus_locations` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function _menus_locations_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `location`,  `label`,  `icon`,  `order_by`,  `status`    FROM `_menus_locations` 

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

function _menus_locations_db_show_col_from_table($c) {
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
function _menus_locations_db_col_list_from_table($c){
    $list = array();
    foreach (_menus_locations_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function _menus_locations_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function _menus_locations_update_location($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `location`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function _menus_locations_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function _menus_locations_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function _menus_locations_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function _menus_locations_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `_menus_locations` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function _menus_locations_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            _menus_locations_update_id($id, $new_data);
            break;

        case "location":
            _menus_locations_update_location($id, $new_data);
            break;

        case "label":
            _menus_locations_update_label($id, $new_data);
            break;

        case "icon":
            _menus_locations_update_icon($id, $new_data);
            break;

        case "order_by":
            _menus_locations_update_order_by($id, $new_data);
            break;

        case "status":
            _menus_locations_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function _menus_locations_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `_menus_locations` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/_menus_locations/functions.php
// and comment here (this function)
function _menus_locations_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "location":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "icon":
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
function _menus_locations_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `_menus_locations` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function _menus_locations_exists_location($location){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `location` FROM `_menus_locations` WHERE   `location` = ?");
    $req->execute(array($location));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function _menus_locations_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `_menus_locations` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function _menus_locations_exists_icon($icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `_menus_locations` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function _menus_locations_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `_menus_locations` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function _menus_locations_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `_menus_locations` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function _menus_locations_is_id($id){
     return (is_id($id) )? true : false ;
}

function _menus_locations_is_location($location){
     return true;
}

function _menus_locations_is_label($label){
     return true;
}

function _menus_locations_is_icon($icon){
     return true;
}

function _menus_locations_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function _menus_locations_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function _menus_locations_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, _menus_locations_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function _menus_locations_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (_menus_locations_is_id($value)) ? true : false;
            break;
     case "location":
            $is = (_menus_locations_is_location($value)) ? true : false;
            break;
     case "label":
            $is = (_menus_locations_is_label($value)) ? true : false;
            break;
     case "icon":
            $is = (_menus_locations_is_icon($value)) ? true : false;
            break;
     case "order_by":
            $is = (_menus_locations_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (_menus_locations_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function _menus_locations_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=_menus_locations&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'location':
                echo '<th>' . _tr(ucfirst('location')) . '</th>';
                break;
case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'icon':
                echo '<th>' . _tr(ucfirst('icon')) . '</th>';
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

function _menus_locations_index_generate_column_body_td($_menus_locations, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=_menus_locations&a=details&id=' . $_menus_locations[$col] . '">' . $_menus_locations[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
case 'location':
                echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
case 'icon':
                echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=_menus_locations&a=details&id=' . $_menus_locations['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=_menus_locations&a=details_payement&id=' . $_menus_locations['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=_menus_locations&a=edit&id=' . $_menus_locations['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=_menus_locations&a=ok_delete&id=' . $_menus_locations['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=_menus_locations&a=export_pdf&id=' . $_menus_locations['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=_menus_locations&a=export_pdf&way=pdf&&id=' . $_menus_locations['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($_menus_locations[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
