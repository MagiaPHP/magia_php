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
# Fecha de creacion del documento: 2024-09-21 12:09:50 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:50 


// 

//function hr_payroll_by_month_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_payroll_by_month_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_payroll_by_month_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_payroll_by_month"); // Obtener columnas de la tabla de la base de datos
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
function hr_payroll_by_month_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll_by_month` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_by_month_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll_by_month` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_by_month_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll_by_month` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_by_month_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `year`,  `month`,  `column`,  `value`,  `formule`,  `notes`,  `code`,  `date_registre`,  `order_by`,  `status`   
    
    FROM `hr_payroll_by_month` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_payroll_by_month_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `employee_id`,  `year`,  `month`,  `column`,  `value`,  `formule`,  `notes`,  `code`,  `date_registre`,  `order_by`,  `status`   
    FROM `hr_payroll_by_month` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_payroll_by_month_edit($id ,  $employee_id ,  $year ,  $month ,  $column ,  $value ,  $formule ,  $notes ,  $code ,  $date_registre ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `employee_id` =:employee_id, `year` =:year, `month` =:month, `column` =:column, `value` =:value, `formule` =:formule, `notes` =:notes, `code` =:code, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "employee_id" =>$employee_id ,  
 "year" =>$year ,  
 "month" =>$month ,  
 "column" =>$column ,  
 "value" =>$value ,  
 "formule" =>$formule ,  
 "notes" =>$notes ,  
 "code" =>$code ,  
 "date_registre" =>$date_registre ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_payroll_by_month_add($employee_id ,  $year ,  $month ,  $column ,  $value ,  $formule ,  $notes ,  $code ,  $date_registre ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_payroll_by_month` ( `id` ,   `employee_id` ,   `year` ,   `month` ,   `column` ,   `value` ,   `formule` ,   `notes` ,   `code` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :year ,  :month ,  :column ,  :value ,  :formule ,  :notes ,  :code ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "year" => $year ,  
 "month" => $month ,  
 "column" => $column ,  
 "value" => $value ,  
 "formule" => $formule ,  
 "notes" => $notes ,  
 "code" => $code ,  
 "date_registre" => $date_registre ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_payroll_by_month_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `year`,  `month`,  `column`,  `value`,  `formule`,  `notes`,  `code`,  `date_registre`,  `order_by`,  `status`    
            FROM `hr_payroll_by_month` 
            WHERE `id` = :txt OR `id` like :txt
OR `employee_id` like :txt
OR `year` like :txt
OR `month` like :txt
OR `column` like :txt
OR `value` like :txt
OR `formule` like :txt
OR `notes` like :txt
OR `code` like :txt
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

function hr_payroll_by_month_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_payroll_by_month_list() as $key => $value) {
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
function hr_payroll_by_month_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_payroll_by_month` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_payroll_by_month_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `year`,  `month`,  `column`,  `value`,  `formule`,  `notes`,  `code`,  `date_registre`,  `order_by`,  `status`    FROM `hr_payroll_by_month` 

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

function hr_payroll_by_month_db_show_col_from_table($c) {
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
function hr_payroll_by_month_db_col_list_from_table($c){
    $list = array();
    foreach (hr_payroll_by_month_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_payroll_by_month_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_employee_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `employee_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_year($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `year`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_month($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `month`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_column($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `column`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_value($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `value`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_formule($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `formule`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_notes($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `notes`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_by_month_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll_by_month` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_payroll_by_month_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_payroll_by_month_update_id($id, $new_data);
            break;

        case "employee_id":
            hr_payroll_by_month_update_employee_id($id, $new_data);
            break;

        case "year":
            hr_payroll_by_month_update_year($id, $new_data);
            break;

        case "month":
            hr_payroll_by_month_update_month($id, $new_data);
            break;

        case "column":
            hr_payroll_by_month_update_column($id, $new_data);
            break;

        case "value":
            hr_payroll_by_month_update_value($id, $new_data);
            break;

        case "formule":
            hr_payroll_by_month_update_formule($id, $new_data);
            break;

        case "notes":
            hr_payroll_by_month_update_notes($id, $new_data);
            break;

        case "code":
            hr_payroll_by_month_update_code($id, $new_data);
            break;

        case "date_registre":
            hr_payroll_by_month_update_date_registre($id, $new_data);
            break;

        case "order_by":
            hr_payroll_by_month_update_order_by($id, $new_data);
            break;

        case "status":
            hr_payroll_by_month_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_payroll_by_month_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_payroll_by_month` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_payroll_by_month/functions.php
// and comment here (this function)
function hr_payroll_by_month_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employee_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "year":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "month":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "column":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "value":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "formule":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "notes":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
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
function hr_payroll_by_month_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_payroll_by_month` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_employee_id($employee_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employee_id` FROM `hr_payroll_by_month` WHERE   `employee_id` = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_year($year){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `year` FROM `hr_payroll_by_month` WHERE   `year` = ?");
    $req->execute(array($year));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_month($month){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `month` FROM `hr_payroll_by_month` WHERE   `month` = ?");
    $req->execute(array($month));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_column($column){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `column` FROM `hr_payroll_by_month` WHERE   `column` = ?");
    $req->execute(array($column));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_value($value){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value` FROM `hr_payroll_by_month` WHERE   `value` = ?");
    $req->execute(array($value));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_formule($formule){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `formule` FROM `hr_payroll_by_month` WHERE   `formule` = ?");
    $req->execute(array($formule));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_notes($notes){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `notes` FROM `hr_payroll_by_month` WHERE   `notes` = ?");
    $req->execute(array($notes));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `hr_payroll_by_month` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `hr_payroll_by_month` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_payroll_by_month` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_by_month_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_payroll_by_month` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_payroll_by_month_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_payroll_by_month_is_employee_id($employee_id){
     return true;
}

function hr_payroll_by_month_is_year($year){
     return true;
}

function hr_payroll_by_month_is_month($month){
     return true;
}

function hr_payroll_by_month_is_column($column){
     return true;
}

function hr_payroll_by_month_is_value($value){
     return true;
}

function hr_payroll_by_month_is_formule($formule){
     return true;
}

function hr_payroll_by_month_is_notes($notes){
     return true;
}

function hr_payroll_by_month_is_code($code){
     return true;
}

function hr_payroll_by_month_is_date_registre($date_registre){
     return true;
}

function hr_payroll_by_month_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_payroll_by_month_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_payroll_by_month_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_payroll_by_month_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_payroll_by_month_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_payroll_by_month_is_id($value)) ? true : false;
            break;
     case "employee_id":
            $is = (hr_payroll_by_month_is_employee_id($value)) ? true : false;
            break;
     case "year":
            $is = (hr_payroll_by_month_is_year($value)) ? true : false;
            break;
     case "month":
            $is = (hr_payroll_by_month_is_month($value)) ? true : false;
            break;
     case "column":
            $is = (hr_payroll_by_month_is_column($value)) ? true : false;
            break;
     case "value":
            $is = (hr_payroll_by_month_is_value($value)) ? true : false;
            break;
     case "formule":
            $is = (hr_payroll_by_month_is_formule($value)) ? true : false;
            break;
     case "notes":
            $is = (hr_payroll_by_month_is_notes($value)) ? true : false;
            break;
     case "code":
            $is = (hr_payroll_by_month_is_code($value)) ? true : false;
            break;
     case "date_registre":
            $is = (hr_payroll_by_month_is_date_registre($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_payroll_by_month_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_payroll_by_month_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_payroll_by_month_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_payroll_by_month&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'employee_id':
                echo '<th>' . _tr(ucfirst('employee_id')) . '</th>';
                break;
case 'year':
                echo '<th>' . _tr(ucfirst('year')) . '</th>';
                break;
case 'month':
                echo '<th>' . _tr(ucfirst('month')) . '</th>';
                break;
case 'column':
                echo '<th>' . _tr(ucfirst('column')) . '</th>';
                break;
case 'value':
                echo '<th>' . _tr(ucfirst('value')) . '</th>';
                break;
case 'formule':
                echo '<th>' . _tr(ucfirst('formule')) . '</th>';
                break;
case 'notes':
                echo '<th>' . _tr(ucfirst('notes')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function hr_payroll_by_month_index_generate_column_body_td($hr_payroll_by_month, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_payroll_by_month&a=details&id=' . $hr_payroll_by_month[$col] . '">' . $hr_payroll_by_month[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'employee_id':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'year':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'month':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'column':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'value':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'formule':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'notes':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_payroll_by_month&a=details&id=' . $hr_payroll_by_month['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_payroll_by_month&a=details_payement&id=' . $hr_payroll_by_month['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_payroll_by_month&a=edit&id=' . $hr_payroll_by_month['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_payroll_by_month&a=ok_delete&id=' . $hr_payroll_by_month['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll_by_month&a=export_pdf&id=' . $hr_payroll_by_month['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll_by_month&a=export_pdf&way=pdf&&id=' . $hr_payroll_by_month['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_payroll_by_month[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
