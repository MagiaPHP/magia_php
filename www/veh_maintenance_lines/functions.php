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
# Fecha de creacion del documento: 2024-09-16 17:09:13 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 17:09:13 


// 

//function veh_maintenance_lines_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function veh_maintenance_lines_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("veh_maintenance_lines_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("veh_maintenance_lines"); // Obtener columnas de la tabla de la base de datos
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
function veh_maintenance_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_maintenance_lines` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_maintenance_lines_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_maintenance_lines` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_maintenance_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `veh_maintenance_lines` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function veh_maintenance_lines_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `maintenance_id`,  `description`,  `price`,  `quantity`,  `total`,  `order_by`,  `status`   
    
    FROM `veh_maintenance_lines` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function veh_maintenance_lines_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `maintenance_id`,  `description`,  `price`,  `quantity`,  `total`,  `order_by`,  `status`   
    FROM `veh_maintenance_lines` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function veh_maintenance_lines_edit($id ,  $maintenance_id ,  $description ,  $price ,  $quantity ,  $total ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `maintenance_id` =:maintenance_id, `description` =:description, `price` =:price, `quantity` =:quantity, `total` =:total, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "maintenance_id" =>$maintenance_id ,  
 "description" =>$description ,  
 "price" =>$price ,  
 "quantity" =>$quantity ,  
 "total" =>$total ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function veh_maintenance_lines_add($maintenance_id ,  $description ,  $price ,  $quantity ,  $total ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `veh_maintenance_lines` ( `id` ,   `maintenance_id` ,   `description` ,   `price` ,   `quantity` ,   `total` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :maintenance_id ,  :description ,  :price ,  :quantity ,  :total ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "maintenance_id" => $maintenance_id ,  
 "description" => $description ,  
 "price" => $price ,  
 "quantity" => $quantity ,  
 "total" => $total ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function veh_maintenance_lines_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `maintenance_id`,  `description`,  `price`,  `quantity`,  `total`,  `order_by`,  `status`    
            FROM `veh_maintenance_lines` 
            WHERE `id` = :txt OR `id` like :txt
OR `maintenance_id` like :txt
OR `description` like :txt
OR `price` like :txt
OR `quantity` like :txt
OR `total` like :txt
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

function veh_maintenance_lines_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (veh_maintenance_lines_list() as $key => $value) {
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
function veh_maintenance_lines_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `veh_maintenance_lines` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function veh_maintenance_lines_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `maintenance_id`,  `description`,  `price`,  `quantity`,  `total`,  `order_by`,  `status`    FROM `veh_maintenance_lines` 

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

function veh_maintenance_lines_db_show_col_from_table($c) {
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
function veh_maintenance_lines_db_col_list_from_table($c){
    $list = array();
    foreach (veh_maintenance_lines_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function veh_maintenance_lines_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_maintenance_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `maintenance_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_price($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `price`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_quantity($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `quantity`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function veh_maintenance_lines_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `veh_maintenance_lines` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function veh_maintenance_lines_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            veh_maintenance_lines_update_id($id, $new_data);
            break;

        case "maintenance_id":
            veh_maintenance_lines_update_maintenance_id($id, $new_data);
            break;

        case "description":
            veh_maintenance_lines_update_description($id, $new_data);
            break;

        case "price":
            veh_maintenance_lines_update_price($id, $new_data);
            break;

        case "quantity":
            veh_maintenance_lines_update_quantity($id, $new_data);
            break;

        case "total":
            veh_maintenance_lines_update_total($id, $new_data);
            break;

        case "order_by":
            veh_maintenance_lines_update_order_by($id, $new_data);
            break;

        case "status":
            veh_maintenance_lines_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function veh_maintenance_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `veh_maintenance_lines` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/veh_maintenance_lines/functions.php
// and comment here (this function)
function veh_maintenance_lines_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "maintenance_id":
            //return veh_maintenance_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "price":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "quantity":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "total":
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
function veh_maintenance_lines_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `veh_maintenance_lines` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_maintenance_id($maintenance_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `maintenance_id` FROM `veh_maintenance_lines` WHERE   `maintenance_id` = ?");
    $req->execute(array($maintenance_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `veh_maintenance_lines` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_price($price){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `price` FROM `veh_maintenance_lines` WHERE   `price` = ?");
    $req->execute(array($price));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_quantity($quantity){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `quantity` FROM `veh_maintenance_lines` WHERE   `quantity` = ?");
    $req->execute(array($quantity));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_total($total){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `veh_maintenance_lines` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `veh_maintenance_lines` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function veh_maintenance_lines_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `veh_maintenance_lines` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function veh_maintenance_lines_is_id($id){
     return (is_id($id) )? true : false ;
}

function veh_maintenance_lines_is_maintenance_id($maintenance_id){
     return true;
}

function veh_maintenance_lines_is_description($description){
     return true;
}

function veh_maintenance_lines_is_price($price){
     return true;
}

function veh_maintenance_lines_is_quantity($quantity){
     return true;
}

function veh_maintenance_lines_is_total($total){
     return true;
}

function veh_maintenance_lines_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function veh_maintenance_lines_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function veh_maintenance_lines_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, veh_maintenance_lines_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function veh_maintenance_lines_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (veh_maintenance_lines_is_id($value)) ? true : false;
            break;
     case "maintenance_id":
            $is = (veh_maintenance_lines_is_maintenance_id($value)) ? true : false;
            break;
     case "description":
            $is = (veh_maintenance_lines_is_description($value)) ? true : false;
            break;
     case "price":
            $is = (veh_maintenance_lines_is_price($value)) ? true : false;
            break;
     case "quantity":
            $is = (veh_maintenance_lines_is_quantity($value)) ? true : false;
            break;
     case "total":
            $is = (veh_maintenance_lines_is_total($value)) ? true : false;
            break;
     case "order_by":
            $is = (veh_maintenance_lines_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (veh_maintenance_lines_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function veh_maintenance_lines_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=veh_maintenance_lines&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'maintenance_id':
                echo '<th>' . _tr(ucfirst('maintenance_id')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'price':
                echo '<th>' . _tr(ucfirst('price')) . '</th>';
                break;
case 'quantity':
                echo '<th>' . _tr(ucfirst('quantity')) . '</th>';
                break;
case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
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

function veh_maintenance_lines_index_generate_column_body_td($veh_maintenance_lines, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=veh_maintenance_lines&a=details&id=' . $veh_maintenance_lines[$col] . '">' . $veh_maintenance_lines[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'maintenance_id':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'price':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'quantity':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'total':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=veh_maintenance_lines&a=details&id=' . $veh_maintenance_lines['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=veh_maintenance_lines&a=details_payement&id=' . $veh_maintenance_lines['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_maintenance_lines&a=edit&id=' . $veh_maintenance_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=veh_maintenance_lines&a=ok_delete&id=' . $veh_maintenance_lines['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance_lines&a=export_pdf&id=' . $veh_maintenance_lines['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=veh_maintenance_lines&a=export_pdf&way=pdf&&id=' . $veh_maintenance_lines['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($veh_maintenance_lines[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
