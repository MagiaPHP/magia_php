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
# Fecha de creacion del documento: 2024-09-21 12:09:42 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:42 


// 

//function hr_employee_worked_days_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_employee_worked_days_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_employee_worked_days_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_employee_worked_days"); // Obtener columnas de la tabla de la base de datos
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
function hr_employee_worked_days_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_worked_days` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_worked_days_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_worked_days` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_worked_days_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_worked_days` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_worked_days_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `date`,  `start_am`,  `end_am`,  `lunch`,  `start_pm`,  `end_pm`,  `total_hours`,  `project_id`,  `notes`,  `order_by`,  `status`,  `year`,  `month`   
    
    FROM `hr_employee_worked_days` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_employee_worked_days_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `employee_id`,  `date`,  `start_am`,  `end_am`,  `lunch`,  `start_pm`,  `end_pm`,  `total_hours`,  `project_id`,  `notes`,  `order_by`,  `status`,  `year`,  `month`   
    FROM `hr_employee_worked_days` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_employee_worked_days_edit($id ,  $employee_id ,  $date ,  $start_am ,  $end_am ,  $lunch ,  $start_pm ,  $end_pm ,  $total_hours ,  $project_id ,  $notes ,  $order_by ,  $status ,  $year ,  $month   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `employee_id` =:employee_id, `date` =:date, `start_am` =:start_am, `end_am` =:end_am, `lunch` =:lunch, `start_pm` =:start_pm, `end_pm` =:end_pm, `total_hours` =:total_hours, `project_id` =:project_id, `notes` =:notes, `order_by` =:order_by, `status` =:status, `year` =:year, `month` =:month  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "employee_id" =>$employee_id ,  
 "date" =>$date ,  
 "start_am" =>$start_am ,  
 "end_am" =>$end_am ,  
 "lunch" =>$lunch ,  
 "start_pm" =>$start_pm ,  
 "end_pm" =>$end_pm ,  
 "total_hours" =>$total_hours ,  
 "project_id" =>$project_id ,  
 "notes" =>$notes ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  
 "year" =>$year ,  
 "month" =>$month ,  

));
}

function hr_employee_worked_days_add($employee_id ,  $date ,  $start_am ,  $end_am ,  $lunch ,  $start_pm ,  $end_pm ,  $total_hours ,  $project_id ,  $notes ,  $order_by ,  $status ,  $year ,  $month   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_worked_days` ( `id` ,   `employee_id` ,   `date` ,   `start_am` ,   `end_am` ,   `lunch` ,   `start_pm` ,   `end_pm` ,   `total_hours` ,   `project_id` ,   `notes` ,   `order_by` ,   `status` ,   `year` ,   `month`   )
                                       VALUES  (:id ,  :employee_id ,  :date ,  :start_am ,  :end_am ,  :lunch ,  :start_pm ,  :end_pm ,  :total_hours ,  :project_id ,  :notes ,  :order_by ,  :status ,  :year ,  :month   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "date" => $date ,  
 "start_am" => $start_am ,  
 "end_am" => $end_am ,  
 "lunch" => $lunch ,  
 "start_pm" => $start_pm ,  
 "end_pm" => $end_pm ,  
 "total_hours" => $total_hours ,  
 "project_id" => $project_id ,  
 "notes" => $notes ,  
 "order_by" => $order_by ,  
 "status" => $status ,  
 "year" => $year ,  
 "month" => $month   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_employee_worked_days_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `date`,  `start_am`,  `end_am`,  `lunch`,  `start_pm`,  `end_pm`,  `total_hours`,  `project_id`,  `notes`,  `order_by`,  `status`,  `year`,  `month`    
            FROM `hr_employee_worked_days` 
            WHERE `id` = :txt OR `id` like :txt
OR `employee_id` like :txt
OR `date` like :txt
OR `start_am` like :txt
OR `end_am` like :txt
OR `lunch` like :txt
OR `start_pm` like :txt
OR `end_pm` like :txt
OR `total_hours` like :txt
OR `project_id` like :txt
OR `notes` like :txt
OR `order_by` like :txt
OR `status` like :txt
OR `year` like :txt
OR `month` like :txt
 
        

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

function hr_employee_worked_days_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_employee_worked_days_list() as $key => $value) {
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
function hr_employee_worked_days_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_employee_worked_days` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_employee_worked_days_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `date`,  `start_am`,  `end_am`,  `lunch`,  `start_pm`,  `end_pm`,  `total_hours`,  `project_id`,  `notes`,  `order_by`,  `status`,  `year`,  `month`    FROM `hr_employee_worked_days` 

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

function hr_employee_worked_days_db_show_col_from_table($c) {
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
function hr_employee_worked_days_db_col_list_from_table($c){
    $list = array();
    foreach (hr_employee_worked_days_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_employee_worked_days_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_employee_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `employee_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_start_am($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `start_am`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_end_am($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `end_am`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_lunch($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `lunch`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_start_pm($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `start_pm`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_end_pm($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `end_pm`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_total_hours($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `total_hours`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_project_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `project_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_notes($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `notes`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_year($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `year`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_worked_days_update_month($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_worked_days` SET `month`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_employee_worked_days_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_employee_worked_days_update_id($id, $new_data);
            break;

        case "employee_id":
            hr_employee_worked_days_update_employee_id($id, $new_data);
            break;

        case "date":
            hr_employee_worked_days_update_date($id, $new_data);
            break;

        case "start_am":
            hr_employee_worked_days_update_start_am($id, $new_data);
            break;

        case "end_am":
            hr_employee_worked_days_update_end_am($id, $new_data);
            break;

        case "lunch":
            hr_employee_worked_days_update_lunch($id, $new_data);
            break;

        case "start_pm":
            hr_employee_worked_days_update_start_pm($id, $new_data);
            break;

        case "end_pm":
            hr_employee_worked_days_update_end_pm($id, $new_data);
            break;

        case "total_hours":
            hr_employee_worked_days_update_total_hours($id, $new_data);
            break;

        case "project_id":
            hr_employee_worked_days_update_project_id($id, $new_data);
            break;

        case "notes":
            hr_employee_worked_days_update_notes($id, $new_data);
            break;

        case "order_by":
            hr_employee_worked_days_update_order_by($id, $new_data);
            break;

        case "status":
            hr_employee_worked_days_update_status($id, $new_data);
            break;

        case "year":
            hr_employee_worked_days_update_year($id, $new_data);
            break;

        case "month":
            hr_employee_worked_days_update_month($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_employee_worked_days_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_employee_worked_days` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_employee_worked_days/functions.php
// and comment here (this function)
function hr_employee_worked_days_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employee_id":
            //return employees_field_id("contact_id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "start_am":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "end_am":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "lunch":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "start_pm":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "end_pm":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "total_hours":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "project_id":
            //return projects_field_id("id", $value);
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
            //return hr_worked_days_status_field_id("code", $value);
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
       

        default:
            return $value;
            break;
    }
}
//
//
//
function hr_employee_worked_days_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_employee_worked_days` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_employee_id($employee_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employee_id` FROM `hr_employee_worked_days` WHERE   `employee_id` = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `hr_employee_worked_days` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_start_am($start_am){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `start_am` FROM `hr_employee_worked_days` WHERE   `start_am` = ?");
    $req->execute(array($start_am));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_end_am($end_am){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `end_am` FROM `hr_employee_worked_days` WHERE   `end_am` = ?");
    $req->execute(array($end_am));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_lunch($lunch){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `lunch` FROM `hr_employee_worked_days` WHERE   `lunch` = ?");
    $req->execute(array($lunch));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_start_pm($start_pm){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `start_pm` FROM `hr_employee_worked_days` WHERE   `start_pm` = ?");
    $req->execute(array($start_pm));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_end_pm($end_pm){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `end_pm` FROM `hr_employee_worked_days` WHERE   `end_pm` = ?");
    $req->execute(array($end_pm));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_total_hours($total_hours){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total_hours` FROM `hr_employee_worked_days` WHERE   `total_hours` = ?");
    $req->execute(array($total_hours));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_project_id($project_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `project_id` FROM `hr_employee_worked_days` WHERE   `project_id` = ?");
    $req->execute(array($project_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_notes($notes){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `notes` FROM `hr_employee_worked_days` WHERE   `notes` = ?");
    $req->execute(array($notes));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_employee_worked_days` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_employee_worked_days` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_year($year){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `year` FROM `hr_employee_worked_days` WHERE   `year` = ?");
    $req->execute(array($year));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_worked_days_exists_month($month){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `month` FROM `hr_employee_worked_days` WHERE   `month` = ?");
    $req->execute(array($month));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_employee_worked_days_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_employee_worked_days_is_employee_id($employee_id){
     return true;
}

function hr_employee_worked_days_is_date($date){
     return true;
}

function hr_employee_worked_days_is_start_am($start_am){
     return true;
}

function hr_employee_worked_days_is_end_am($end_am){
     return true;
}

function hr_employee_worked_days_is_lunch($lunch){
     return true;
}

function hr_employee_worked_days_is_start_pm($start_pm){
     return true;
}

function hr_employee_worked_days_is_end_pm($end_pm){
     return true;
}

function hr_employee_worked_days_is_total_hours($total_hours){
     return true;
}

function hr_employee_worked_days_is_project_id($project_id){
     return true;
}

function hr_employee_worked_days_is_notes($notes){
     return true;
}

function hr_employee_worked_days_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_employee_worked_days_is_status($status){
     return (is_status($status) )? true : false ;
}

function hr_employee_worked_days_is_year($year){
     return true;
}

function hr_employee_worked_days_is_month($month){
     return true;
}


//
//
function hr_employee_worked_days_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_employee_worked_days_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_employee_worked_days_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_employee_worked_days_is_id($value)) ? true : false;
            break;
     case "employee_id":
            $is = (hr_employee_worked_days_is_employee_id($value)) ? true : false;
            break;
     case "date":
            $is = (hr_employee_worked_days_is_date($value)) ? true : false;
            break;
     case "start_am":
            $is = (hr_employee_worked_days_is_start_am($value)) ? true : false;
            break;
     case "end_am":
            $is = (hr_employee_worked_days_is_end_am($value)) ? true : false;
            break;
     case "lunch":
            $is = (hr_employee_worked_days_is_lunch($value)) ? true : false;
            break;
     case "start_pm":
            $is = (hr_employee_worked_days_is_start_pm($value)) ? true : false;
            break;
     case "end_pm":
            $is = (hr_employee_worked_days_is_end_pm($value)) ? true : false;
            break;
     case "total_hours":
            $is = (hr_employee_worked_days_is_total_hours($value)) ? true : false;
            break;
     case "project_id":
            $is = (hr_employee_worked_days_is_project_id($value)) ? true : false;
            break;
     case "notes":
            $is = (hr_employee_worked_days_is_notes($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_employee_worked_days_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_employee_worked_days_is_status($value)) ? true : false;
            break;
     case "year":
            $is = (hr_employee_worked_days_is_year($value)) ? true : false;
            break;
     case "month":
            $is = (hr_employee_worked_days_is_month($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_employee_worked_days_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_employee_worked_days&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'employee_id':
                echo '<th>' . _tr(ucfirst('employee_id')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'start_am':
                echo '<th>' . _tr(ucfirst('start_am')) . '</th>';
                break;
case 'end_am':
                echo '<th>' . _tr(ucfirst('end_am')) . '</th>';
                break;
case 'lunch':
                echo '<th>' . _tr(ucfirst('lunch')) . '</th>';
                break;
case 'start_pm':
                echo '<th>' . _tr(ucfirst('start_pm')) . '</th>';
                break;
case 'end_pm':
                echo '<th>' . _tr(ucfirst('end_pm')) . '</th>';
                break;
case 'total_hours':
                echo '<th>' . _tr(ucfirst('total_hours')) . '</th>';
                break;
case 'project_id':
                echo '<th>' . _tr(ucfirst('project_id')) . '</th>';
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
case 'year':
                echo '<th>' . _tr(ucfirst('year')) . '</th>';
                break;
case 'month':
                echo '<th>' . _tr(ucfirst('month')) . '</th>';
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

function hr_employee_worked_days_index_generate_column_body_td($hr_employee_worked_days, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_employee_worked_days&a=details&id=' . $hr_employee_worked_days[$col] . '">' . $hr_employee_worked_days[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'employee_id':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'start_am':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'end_am':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'lunch':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'start_pm':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'end_pm':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'total_hours':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'project_id':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'notes':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'year':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
case 'month':
                echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_worked_days&a=details&id=' . $hr_employee_worked_days['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_worked_days&a=details_payement&id=' . $hr_employee_worked_days['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_worked_days&a=edit&id=' . $hr_employee_worked_days['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_worked_days&a=ok_delete&id=' . $hr_employee_worked_days['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=export_pdf&id=' . $hr_employee_worked_days['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_worked_days&a=export_pdf&way=pdf&&id=' . $hr_employee_worked_days['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_employee_worked_days[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
