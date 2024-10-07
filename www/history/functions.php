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
# Fecha de creacion del documento: 2024-10-06 08:10:46 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-06 08:10:46 


// 

//function history_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function history_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("history_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("history"); // Obtener columnas de la tabla de la base de datos
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
function history_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `history` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function history_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `history` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function history_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `history` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function history_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'details',  'registre_date',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    
    $data = null;
    
    $sql = "SELECT `id`,  `details`,  `registre_date`,  `order_by`,  `status`   
    
    FROM `history` 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start  ";
    
    $query = $db->prepare($sql);                
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function history_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `details`,  `registre_date`,  `order_by`,  `status`   
    FROM 
        `history` 
        WHERE 
            `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function history_edit($id ,  $details ,  $registre_date ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `history` SET `details` =:details, `registre_date` =:registre_date, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "details" =>$details ,  
 "registre_date" =>$registre_date ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function history_add($details ,  $registre_date ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `history` ( `id` ,   `details` ,   `registre_date` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :details ,  :registre_date ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "details" => $details ,  
 "registre_date" => $registre_date ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function history_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    



    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'details',  'registre_date',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    
    
    $data = null;
    
    $sql = "SELECT `id`,  `details`,  `registre_date`,  `order_by`,  `status`    
            FROM 
                `history` 
            WHERE 
                `id` = :txt OR `id` like :txt
OR `details` like :txt
OR `registre_date` like :txt
OR `order_by` like :txt
OR `status` like :txt
 
        

    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);        
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function history_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (history_list() as $key => $value) {
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
function history_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `history` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function history_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 
        
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'details',  'registre_date',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    $data = null;
    
    $sql = "SELECT `id`,  `details`,  `registre_date`,  `order_by`,  `status`    FROM `history` 

    WHERE `$field` = '$txt' 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function history_db_show_col_from_table($c) {
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
function history_db_col_list_from_table($c){
    $list = array();
    foreach (history_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function history_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `history` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function history_update_details($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `history` SET `details`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function history_update_registre_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `history` SET `registre_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function history_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `history` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function history_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `history` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function history_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            history_update_id($id, $new_data);
            break;

        case "details":
            history_update_details($id, $new_data);
            break;

        case "registre_date":
            history_update_registre_date($id, $new_data);
            break;

        case "order_by":
            history_update_order_by($id, $new_data);
            break;

        case "status":
            history_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function history_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `history` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/history/functions.php
// and comment here (this function)
function history_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "details":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "registre_date":
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
function history_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `history` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function history_exists_details($details){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `details` FROM `history` WHERE   `details` = ?");
    $req->execute(array($details));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function history_exists_registre_date($registre_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `registre_date` FROM `history` WHERE   `registre_date` = ?");
    $req->execute(array($registre_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function history_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `history` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function history_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `history` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function history_is_id($id){
     return (is_id($id) )? true : false ;
}

function history_is_details($details){
     return true;
}

function history_is_registre_date($registre_date){
     return true;
}

function history_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function history_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function history_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, history_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function history_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (history_is_id($value)) ? true : false;
            break;
     case "details":
            $is = (history_is_details($value)) ? true : false;
            break;
     case "registre_date":
            $is = (history_is_registre_date($value)) ? true : false;
            break;
     case "order_by":
            $is = (history_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (history_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function history_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=history&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'details':
                echo '<th>' . _tr(ucfirst('details')) . '</th>';
                break;
case 'registre_date':
                echo '<th>' . _tr(ucfirst('registre_date')) . '</th>';
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

function history_index_generate_column_body_td($history, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=history&a=details&id=' . $history[$col] . '">' . $history[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($history[$col]) . '</td>';
                break;
case 'details':
                echo '<td>' . ($history[$col]) . '</td>';
                break;
case 'registre_date':
                echo '<td>' . ($history[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($history[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($history[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=history&a=details&id=' . $history['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=history&a=details_payement&id=' . $history['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=history&a=edit&id=' . $history['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=history&a=ok_delete&id=' . $history['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=history&a=export_pdf&id=' . $history['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=history&a=export_pdf&way=pdf&&id=' . $history['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($history[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
