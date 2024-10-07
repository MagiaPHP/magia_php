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
# Fecha de creacion del documento: 2024-09-21 12:09:14 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:14 


// 

//function hr_employee_documents_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_employee_documents_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_employee_documents_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_employee_documents"); // Obtener columnas de la tabla de la base de datos
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
function hr_employee_documents_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_documents` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_documents_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_documents` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_documents_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_documents` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_documents_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `document`,  `document_number`,  `date_delivery`,  `date_expiration`,  `follow`,  `order_by`,  `status`   
    
    FROM `hr_employee_documents` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_employee_documents_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `employee_id`,  `document`,  `document_number`,  `date_delivery`,  `date_expiration`,  `follow`,  `order_by`,  `status`   
    FROM `hr_employee_documents` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_employee_documents_edit($id ,  $employee_id ,  $document ,  $document_number ,  $date_delivery ,  $date_expiration ,  $follow ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `employee_id` =:employee_id, `document` =:document, `document_number` =:document_number, `date_delivery` =:date_delivery, `date_expiration` =:date_expiration, `follow` =:follow, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "employee_id" =>$employee_id ,  
 "document" =>$document ,  
 "document_number" =>$document_number ,  
 "date_delivery" =>$date_delivery ,  
 "date_expiration" =>$date_expiration ,  
 "follow" =>$follow ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_employee_documents_add($employee_id ,  $document ,  $document_number ,  $date_delivery ,  $date_expiration ,  $follow ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_documents` ( `id` ,   `employee_id` ,   `document` ,   `document_number` ,   `date_delivery` ,   `date_expiration` ,   `follow` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :document ,  :document_number ,  :date_delivery ,  :date_expiration ,  :follow ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "document" => $document ,  
 "document_number" => $document_number ,  
 "date_delivery" => $date_delivery ,  
 "date_expiration" => $date_expiration ,  
 "follow" => $follow ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_employee_documents_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `document`,  `document_number`,  `date_delivery`,  `date_expiration`,  `follow`,  `order_by`,  `status`    
            FROM `hr_employee_documents` 
            WHERE `id` = :txt OR `id` like :txt
OR `employee_id` like :txt
OR `document` like :txt
OR `document_number` like :txt
OR `date_delivery` like :txt
OR `date_expiration` like :txt
OR `follow` like :txt
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

function hr_employee_documents_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_employee_documents_list() as $key => $value) {
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
function hr_employee_documents_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_employee_documents` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_employee_documents_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `document`,  `document_number`,  `date_delivery`,  `date_expiration`,  `follow`,  `order_by`,  `status`    FROM `hr_employee_documents` 

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

function hr_employee_documents_db_show_col_from_table($c) {
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
function hr_employee_documents_db_col_list_from_table($c){
    $list = array();
    foreach (hr_employee_documents_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_employee_documents_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_employee_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `employee_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_document($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `document`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_document_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `document_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_date_delivery($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `date_delivery`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_date_expiration($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `date_expiration`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_follow($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `follow`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_documents_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_documents` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_employee_documents_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_employee_documents_update_id($id, $new_data);
            break;

        case "employee_id":
            hr_employee_documents_update_employee_id($id, $new_data);
            break;

        case "document":
            hr_employee_documents_update_document($id, $new_data);
            break;

        case "document_number":
            hr_employee_documents_update_document_number($id, $new_data);
            break;

        case "date_delivery":
            hr_employee_documents_update_date_delivery($id, $new_data);
            break;

        case "date_expiration":
            hr_employee_documents_update_date_expiration($id, $new_data);
            break;

        case "follow":
            hr_employee_documents_update_follow($id, $new_data);
            break;

        case "order_by":
            hr_employee_documents_update_order_by($id, $new_data);
            break;

        case "status":
            hr_employee_documents_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_employee_documents_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_employee_documents` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_employee_documents/functions.php
// and comment here (this function)
function hr_employee_documents_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employee_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "document":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "document_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_delivery":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_expiration":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "follow":
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
function hr_employee_documents_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_employee_documents` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_employee_id($employee_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employee_id` FROM `hr_employee_documents` WHERE   `employee_id` = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_document($document){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `document` FROM `hr_employee_documents` WHERE   `document` = ?");
    $req->execute(array($document));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_document_number($document_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `document_number` FROM `hr_employee_documents` WHERE   `document_number` = ?");
    $req->execute(array($document_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_date_delivery($date_delivery){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_delivery` FROM `hr_employee_documents` WHERE   `date_delivery` = ?");
    $req->execute(array($date_delivery));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_date_expiration($date_expiration){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_expiration` FROM `hr_employee_documents` WHERE   `date_expiration` = ?");
    $req->execute(array($date_expiration));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_follow($follow){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `follow` FROM `hr_employee_documents` WHERE   `follow` = ?");
    $req->execute(array($follow));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_employee_documents` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_documents_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_employee_documents` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_employee_documents_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_employee_documents_is_employee_id($employee_id){
     return true;
}

function hr_employee_documents_is_document($document){
     return true;
}

function hr_employee_documents_is_document_number($document_number){
     return true;
}

function hr_employee_documents_is_date_delivery($date_delivery){
     return true;
}

function hr_employee_documents_is_date_expiration($date_expiration){
     return true;
}

function hr_employee_documents_is_follow($follow){
     return true;
}

function hr_employee_documents_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_employee_documents_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_employee_documents_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_employee_documents_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_employee_documents_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_employee_documents_is_id($value)) ? true : false;
            break;
     case "employee_id":
            $is = (hr_employee_documents_is_employee_id($value)) ? true : false;
            break;
     case "document":
            $is = (hr_employee_documents_is_document($value)) ? true : false;
            break;
     case "document_number":
            $is = (hr_employee_documents_is_document_number($value)) ? true : false;
            break;
     case "date_delivery":
            $is = (hr_employee_documents_is_date_delivery($value)) ? true : false;
            break;
     case "date_expiration":
            $is = (hr_employee_documents_is_date_expiration($value)) ? true : false;
            break;
     case "follow":
            $is = (hr_employee_documents_is_follow($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_employee_documents_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_employee_documents_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_employee_documents_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_employee_documents&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'employee_id':
                echo '<th>' . _tr(ucfirst('employee_id')) . '</th>';
                break;
case 'document':
                echo '<th>' . _tr(ucfirst('document')) . '</th>';
                break;
case 'document_number':
                echo '<th>' . _tr(ucfirst('document_number')) . '</th>';
                break;
case 'date_delivery':
                echo '<th>' . _tr(ucfirst('date_delivery')) . '</th>';
                break;
case 'date_expiration':
                echo '<th>' . _tr(ucfirst('date_expiration')) . '</th>';
                break;
case 'follow':
                echo '<th>' . _tr(ucfirst('follow')) . '</th>';
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

function hr_employee_documents_index_generate_column_body_td($hr_employee_documents, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_employee_documents&a=details&id=' . $hr_employee_documents[$col] . '">' . $hr_employee_documents[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'employee_id':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'document':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'document_number':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'date_delivery':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'date_expiration':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'follow':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_documents&a=details&id=' . $hr_employee_documents['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_documents&a=details_payement&id=' . $hr_employee_documents['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_documents&a=edit&id=' . $hr_employee_documents['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_documents&a=ok_delete&id=' . $hr_employee_documents['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_documents&a=export_pdf&id=' . $hr_employee_documents['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_documents&a=export_pdf&way=pdf&&id=' . $hr_employee_documents['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_employee_documents[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
