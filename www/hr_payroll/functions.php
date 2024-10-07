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
# Fecha de creacion del documento: 2024-09-26 16:09:00 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-26 16:09:00 


// 

//function hr_payroll_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_payroll_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_payroll_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_payroll"); // Obtener columnas de la tabla de la base de datos
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
function hr_payroll_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_payroll` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_payroll_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `date_entry`,  `address`,  `fonction`,  `salary_base`,  `civil_status`,  `tax_system`,  `date_start`,  `date_end`,  `value_round`,  `to_pay`,  `account_number`,  `notes`,  `extras`,  `code`,  `date_registre`,  `order_by`,  `status`   
    
    FROM `hr_payroll` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_payroll_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `employee_id`,  `date_entry`,  `address`,  `fonction`,  `salary_base`,  `civil_status`,  `tax_system`,  `date_start`,  `date_end`,  `value_round`,  `to_pay`,  `account_number`,  `notes`,  `extras`,  `code`,  `date_registre`,  `order_by`,  `status`   
    FROM `hr_payroll` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_payroll_edit($id ,  $employee_id ,  $date_entry ,  $address ,  $fonction ,  $salary_base ,  $civil_status ,  $tax_system ,  $date_start ,  $date_end ,  $value_round ,  $to_pay ,  $account_number ,  $notes ,  $extras ,  $code ,  $date_registre ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `employee_id` =:employee_id, `date_entry` =:date_entry, `address` =:address, `fonction` =:fonction, `salary_base` =:salary_base, `civil_status` =:civil_status, `tax_system` =:tax_system, `date_start` =:date_start, `date_end` =:date_end, `value_round` =:value_round, `to_pay` =:to_pay, `account_number` =:account_number, `notes` =:notes, `extras` =:extras, `code` =:code, `date_registre` =:date_registre, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "employee_id" =>$employee_id ,  
 "date_entry" =>$date_entry ,  
 "address" =>$address ,  
 "fonction" =>$fonction ,  
 "salary_base" =>$salary_base ,  
 "civil_status" =>$civil_status ,  
 "tax_system" =>$tax_system ,  
 "date_start" =>$date_start ,  
 "date_end" =>$date_end ,  
 "value_round" =>$value_round ,  
 "to_pay" =>$to_pay ,  
 "account_number" =>$account_number ,  
 "notes" =>$notes ,  
 "extras" =>$extras ,  
 "code" =>$code ,  
 "date_registre" =>$date_registre ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_payroll_add($employee_id ,  $date_entry ,  $address ,  $fonction ,  $salary_base ,  $civil_status ,  $tax_system ,  $date_start ,  $date_end ,  $value_round ,  $to_pay ,  $account_number ,  $notes ,  $extras ,  $code ,  $date_registre ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_payroll` ( `id` ,   `employee_id` ,   `date_entry` ,   `address` ,   `fonction` ,   `salary_base` ,   `civil_status` ,   `tax_system` ,   `date_start` ,   `date_end` ,   `value_round` ,   `to_pay` ,   `account_number` ,   `notes` ,   `extras` ,   `code` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :date_entry ,  :address ,  :fonction ,  :salary_base ,  :civil_status ,  :tax_system ,  :date_start ,  :date_end ,  :value_round ,  :to_pay ,  :account_number ,  :notes ,  :extras ,  :code ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "date_entry" => $date_entry ,  
 "address" => $address ,  
 "fonction" => $fonction ,  
 "salary_base" => $salary_base ,  
 "civil_status" => $civil_status ,  
 "tax_system" => $tax_system ,  
 "date_start" => $date_start ,  
 "date_end" => $date_end ,  
 "value_round" => $value_round ,  
 "to_pay" => $to_pay ,  
 "account_number" => $account_number ,  
 "notes" => $notes ,  
 "extras" => $extras ,  
 "code" => $code ,  
 "date_registre" => $date_registre ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_payroll_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `date_entry`,  `address`,  `fonction`,  `salary_base`,  `civil_status`,  `tax_system`,  `date_start`,  `date_end`,  `value_round`,  `to_pay`,  `account_number`,  `notes`,  `extras`,  `code`,  `date_registre`,  `order_by`,  `status`    
            FROM `hr_payroll` 
            WHERE `id` = :txt OR `id` like :txt
OR `employee_id` like :txt
OR `date_entry` like :txt
OR `address` like :txt
OR `fonction` like :txt
OR `salary_base` like :txt
OR `civil_status` like :txt
OR `tax_system` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
OR `value_round` like :txt
OR `to_pay` like :txt
OR `account_number` like :txt
OR `notes` like :txt
OR `extras` like :txt
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

function hr_payroll_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_payroll_list() as $key => $value) {
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
function hr_payroll_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_payroll` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_payroll_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `date_entry`,  `address`,  `fonction`,  `salary_base`,  `civil_status`,  `tax_system`,  `date_start`,  `date_end`,  `value_round`,  `to_pay`,  `account_number`,  `notes`,  `extras`,  `code`,  `date_registre`,  `order_by`,  `status`    FROM `hr_payroll` 

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

function hr_payroll_db_show_col_from_table($c) {
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
function hr_payroll_db_col_list_from_table($c){
    $list = array();
    foreach (hr_payroll_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_payroll_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_employee_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `employee_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_date_entry($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `date_entry`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_address($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `address`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_fonction($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `fonction`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_salary_base($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `salary_base`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_civil_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `civil_status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_tax_system($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `tax_system`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_value_round($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `value_round`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_to_pay($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `to_pay`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_account_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `account_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_notes($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `notes`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_extras($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `extras`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_payroll_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_payroll` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_payroll_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_payroll_update_id($id, $new_data);
            break;

        case "employee_id":
            hr_payroll_update_employee_id($id, $new_data);
            break;

        case "date_entry":
            hr_payroll_update_date_entry($id, $new_data);
            break;

        case "address":
            hr_payroll_update_address($id, $new_data);
            break;

        case "fonction":
            hr_payroll_update_fonction($id, $new_data);
            break;

        case "salary_base":
            hr_payroll_update_salary_base($id, $new_data);
            break;

        case "civil_status":
            hr_payroll_update_civil_status($id, $new_data);
            break;

        case "tax_system":
            hr_payroll_update_tax_system($id, $new_data);
            break;

        case "date_start":
            hr_payroll_update_date_start($id, $new_data);
            break;

        case "date_end":
            hr_payroll_update_date_end($id, $new_data);
            break;

        case "value_round":
            hr_payroll_update_value_round($id, $new_data);
            break;

        case "to_pay":
            hr_payroll_update_to_pay($id, $new_data);
            break;

        case "account_number":
            hr_payroll_update_account_number($id, $new_data);
            break;

        case "notes":
            hr_payroll_update_notes($id, $new_data);
            break;

        case "extras":
            hr_payroll_update_extras($id, $new_data);
            break;

        case "code":
            hr_payroll_update_code($id, $new_data);
            break;

        case "date_registre":
            hr_payroll_update_date_registre($id, $new_data);
            break;

        case "order_by":
            hr_payroll_update_order_by($id, $new_data);
            break;

        case "status":
            hr_payroll_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_payroll_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_payroll` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_payroll/functions.php
// and comment here (this function)
function hr_payroll_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employee_id":
            //return employees_field_id("contact_id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_entry":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "address":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "fonction":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "salary_base":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "civil_status":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "tax_system":
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
        case "value_round":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "to_pay":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "account_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "notes":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "extras":
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
            //return hr_payroll_status_field_id("code", $value);
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
function hr_payroll_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_payroll` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_employee_id($employee_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employee_id` FROM `hr_payroll` WHERE   `employee_id` = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_date_entry($date_entry){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_entry` FROM `hr_payroll` WHERE   `date_entry` = ?");
    $req->execute(array($date_entry));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_address($address){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `address` FROM `hr_payroll` WHERE   `address` = ?");
    $req->execute(array($address));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_fonction($fonction){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `fonction` FROM `hr_payroll` WHERE   `fonction` = ?");
    $req->execute(array($fonction));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_salary_base($salary_base){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `salary_base` FROM `hr_payroll` WHERE   `salary_base` = ?");
    $req->execute(array($salary_base));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_civil_status($civil_status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `civil_status` FROM `hr_payroll` WHERE   `civil_status` = ?");
    $req->execute(array($civil_status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_tax_system($tax_system){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax_system` FROM `hr_payroll` WHERE   `tax_system` = ?");
    $req->execute(array($tax_system));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_date_start($date_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `hr_payroll` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_date_end($date_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `hr_payroll` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_value_round($value_round){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `value_round` FROM `hr_payroll` WHERE   `value_round` = ?");
    $req->execute(array($value_round));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_to_pay($to_pay){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `to_pay` FROM `hr_payroll` WHERE   `to_pay` = ?");
    $req->execute(array($to_pay));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_account_number($account_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `account_number` FROM `hr_payroll` WHERE   `account_number` = ?");
    $req->execute(array($account_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_notes($notes){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `notes` FROM `hr_payroll` WHERE   `notes` = ?");
    $req->execute(array($notes));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_extras($extras){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `extras` FROM `hr_payroll` WHERE   `extras` = ?");
    $req->execute(array($extras));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `hr_payroll` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `hr_payroll` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_payroll` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_payroll_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_payroll` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_payroll_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_payroll_is_employee_id($employee_id){
     return true;
}

function hr_payroll_is_date_entry($date_entry){
     return true;
}

function hr_payroll_is_address($address){
     return true;
}

function hr_payroll_is_fonction($fonction){
     return true;
}

function hr_payroll_is_salary_base($salary_base){
     return true;
}

function hr_payroll_is_civil_status($civil_status){
     return true;
}

function hr_payroll_is_tax_system($tax_system){
     return true;
}

function hr_payroll_is_date_start($date_start){
     return true;
}

function hr_payroll_is_date_end($date_end){
     return true;
}

function hr_payroll_is_value_round($value_round){
     return true;
}

function hr_payroll_is_to_pay($to_pay){
     return true;
}

function hr_payroll_is_account_number($account_number){
     return true;
}

function hr_payroll_is_notes($notes){
     return true;
}

function hr_payroll_is_extras($extras){
     return true;
}

function hr_payroll_is_code($code){
     return true;
}

function hr_payroll_is_date_registre($date_registre){
     return true;
}

function hr_payroll_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_payroll_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_payroll_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_payroll_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_payroll_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_payroll_is_id($value)) ? true : false;
            break;
     case "employee_id":
            $is = (hr_payroll_is_employee_id($value)) ? true : false;
            break;
     case "date_entry":
            $is = (hr_payroll_is_date_entry($value)) ? true : false;
            break;
     case "address":
            $is = (hr_payroll_is_address($value)) ? true : false;
            break;
     case "fonction":
            $is = (hr_payroll_is_fonction($value)) ? true : false;
            break;
     case "salary_base":
            $is = (hr_payroll_is_salary_base($value)) ? true : false;
            break;
     case "civil_status":
            $is = (hr_payroll_is_civil_status($value)) ? true : false;
            break;
     case "tax_system":
            $is = (hr_payroll_is_tax_system($value)) ? true : false;
            break;
     case "date_start":
            $is = (hr_payroll_is_date_start($value)) ? true : false;
            break;
     case "date_end":
            $is = (hr_payroll_is_date_end($value)) ? true : false;
            break;
     case "value_round":
            $is = (hr_payroll_is_value_round($value)) ? true : false;
            break;
     case "to_pay":
            $is = (hr_payroll_is_to_pay($value)) ? true : false;
            break;
     case "account_number":
            $is = (hr_payroll_is_account_number($value)) ? true : false;
            break;
     case "notes":
            $is = (hr_payroll_is_notes($value)) ? true : false;
            break;
     case "extras":
            $is = (hr_payroll_is_extras($value)) ? true : false;
            break;
     case "code":
            $is = (hr_payroll_is_code($value)) ? true : false;
            break;
     case "date_registre":
            $is = (hr_payroll_is_date_registre($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_payroll_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_payroll_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_payroll_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_payroll&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'employee_id':
                echo '<th>' . _tr(ucfirst('employee_id')) . '</th>';
                break;
case 'date_entry':
                echo '<th>' . _tr(ucfirst('date_entry')) . '</th>';
                break;
case 'address':
                echo '<th>' . _tr(ucfirst('address')) . '</th>';
                break;
case 'fonction':
                echo '<th>' . _tr(ucfirst('fonction')) . '</th>';
                break;
case 'salary_base':
                echo '<th>' . _tr(ucfirst('salary_base')) . '</th>';
                break;
case 'civil_status':
                echo '<th>' . _tr(ucfirst('civil_status')) . '</th>';
                break;
case 'tax_system':
                echo '<th>' . _tr(ucfirst('tax_system')) . '</th>';
                break;
case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
                break;
case 'value_round':
                echo '<th>' . _tr(ucfirst('value_round')) . '</th>';
                break;
case 'to_pay':
                echo '<th>' . _tr(ucfirst('to_pay')) . '</th>';
                break;
case 'account_number':
                echo '<th>' . _tr(ucfirst('account_number')) . '</th>';
                break;
case 'notes':
                echo '<th>' . _tr(ucfirst('notes')) . '</th>';
                break;
case 'extras':
                echo '<th>' . _tr(ucfirst('extras')) . '</th>';
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

function hr_payroll_index_generate_column_body_td($hr_payroll, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_payroll&a=details&id=' . $hr_payroll[$col] . '">' . $hr_payroll[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'employee_id':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'date_entry':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'address':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'fonction':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'salary_base':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'civil_status':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'tax_system':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'date_start':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'date_end':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'value_round':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'to_pay':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'account_number':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'notes':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'extras':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_payroll&a=details&id=' . $hr_payroll['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_payroll&a=details_payement&id=' . $hr_payroll['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_payroll&a=edit&id=' . $hr_payroll['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_payroll&a=ok_delete&id=' . $hr_payroll['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll&a=export_pdf&id=' . $hr_payroll['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_payroll&a=export_pdf&way=pdf&&id=' . $hr_payroll['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_payroll[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
