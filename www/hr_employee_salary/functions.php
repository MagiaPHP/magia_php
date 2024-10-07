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
# Fecha de creacion del documento: 2024-09-21 12:09:36 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:36 


// 

//function hr_employee_salary_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_employee_salary_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_employee_salary_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_employee_salary"); // Obtener columnas de la tabla de la base de datos
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
function hr_employee_salary_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_salary` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_salary_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_salary` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_salary_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_salary` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_salary_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `month`,  `hour`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    
    FROM `hr_employee_salary` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_employee_salary_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `employee_id`,  `month`,  `hour`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    FROM `hr_employee_salary` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_employee_salary_edit($id ,  $employee_id ,  $month ,  $hour ,  $date_start ,  $date_end ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `employee_id` =:employee_id, `month` =:month, `hour` =:hour, `date_start` =:date_start, `date_end` =:date_end, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "employee_id" =>$employee_id ,  
 "month" =>$month ,  
 "hour" =>$hour ,  
 "date_start" =>$date_start ,  
 "date_end" =>$date_end ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_employee_salary_add($employee_id ,  $month ,  $hour ,  $date_start ,  $date_end ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_salary` ( `id` ,   `employee_id` ,   `month` ,   `hour` ,   `date_start` ,   `date_end` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :month ,  :hour ,  :date_start ,  :date_end ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "month" => $month ,  
 "hour" => $hour ,  
 "date_start" => $date_start ,  
 "date_end" => $date_end ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_employee_salary_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `month`,  `hour`,  `date_start`,  `date_end`,  `order_by`,  `status`    
            FROM `hr_employee_salary` 
            WHERE `id` = :txt OR `id` like :txt
OR `employee_id` like :txt
OR `month` like :txt
OR `hour` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
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

function hr_employee_salary_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_employee_salary_list() as $key => $value) {
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
function hr_employee_salary_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_employee_salary` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_employee_salary_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `month`,  `hour`,  `date_start`,  `date_end`,  `order_by`,  `status`    FROM `hr_employee_salary` 

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

function hr_employee_salary_db_show_col_from_table($c) {
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
function hr_employee_salary_db_col_list_from_table($c){
    $list = array();
    foreach (hr_employee_salary_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_employee_salary_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_employee_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `employee_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_month($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `month`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_hour($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `hour`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_salary_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_salary` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_employee_salary_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_employee_salary_update_id($id, $new_data);
            break;

        case "employee_id":
            hr_employee_salary_update_employee_id($id, $new_data);
            break;

        case "month":
            hr_employee_salary_update_month($id, $new_data);
            break;

        case "hour":
            hr_employee_salary_update_hour($id, $new_data);
            break;

        case "date_start":
            hr_employee_salary_update_date_start($id, $new_data);
            break;

        case "date_end":
            hr_employee_salary_update_date_end($id, $new_data);
            break;

        case "order_by":
            hr_employee_salary_update_order_by($id, $new_data);
            break;

        case "status":
            hr_employee_salary_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_employee_salary_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_employee_salary` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_employee_salary/functions.php
// and comment here (this function)
function hr_employee_salary_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employee_id":
            //return employees_field_id("contact_id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "month":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "hour":
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
function hr_employee_salary_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_employee_salary` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_employee_id($employee_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employee_id` FROM `hr_employee_salary` WHERE   `employee_id` = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_month($month){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `month` FROM `hr_employee_salary` WHERE   `month` = ?");
    $req->execute(array($month));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_hour($hour){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `hour` FROM `hr_employee_salary` WHERE   `hour` = ?");
    $req->execute(array($hour));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_date_start($date_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `hr_employee_salary` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_date_end($date_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `hr_employee_salary` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_employee_salary` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_salary_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_employee_salary` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_employee_salary_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_employee_salary_is_employee_id($employee_id){
     return true;
}

function hr_employee_salary_is_month($month){
     return true;
}

function hr_employee_salary_is_hour($hour){
     return true;
}

function hr_employee_salary_is_date_start($date_start){
     return true;
}

function hr_employee_salary_is_date_end($date_end){
     return true;
}

function hr_employee_salary_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_employee_salary_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_employee_salary_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_employee_salary_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_employee_salary_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_employee_salary_is_id($value)) ? true : false;
            break;
     case "employee_id":
            $is = (hr_employee_salary_is_employee_id($value)) ? true : false;
            break;
     case "month":
            $is = (hr_employee_salary_is_month($value)) ? true : false;
            break;
     case "hour":
            $is = (hr_employee_salary_is_hour($value)) ? true : false;
            break;
     case "date_start":
            $is = (hr_employee_salary_is_date_start($value)) ? true : false;
            break;
     case "date_end":
            $is = (hr_employee_salary_is_date_end($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_employee_salary_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_employee_salary_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_employee_salary_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_employee_salary&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'employee_id':
                echo '<th>' . _tr(ucfirst('employee_id')) . '</th>';
                break;
case 'month':
                echo '<th>' . _tr(ucfirst('month')) . '</th>';
                break;
case 'hour':
                echo '<th>' . _tr(ucfirst('hour')) . '</th>';
                break;
case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
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

function hr_employee_salary_index_generate_column_body_td($hr_employee_salary, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_employee_salary&a=details&id=' . $hr_employee_salary[$col] . '">' . $hr_employee_salary[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'employee_id':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'month':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'hour':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'date_start':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'date_end':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_salary&a=details&id=' . $hr_employee_salary['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_salary&a=details_payement&id=' . $hr_employee_salary['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_salary&a=edit&id=' . $hr_employee_salary['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_salary&a=ok_delete&id=' . $hr_employee_salary['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_salary&a=export_pdf&id=' . $hr_employee_salary['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_salary&a=export_pdf&way=pdf&&id=' . $hr_employee_salary['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_employee_salary[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
