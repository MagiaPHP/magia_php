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
# Fecha de creacion del documento: 2024-09-21 12:09:17 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:17 


// 

//function hr_employee_family_dependents_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function hr_employee_family_dependents_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("hr_employee_family_dependents_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("hr_employee_family_dependents"); // Obtener columnas de la tabla de la base de datos
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
function hr_employee_family_dependents_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_family_dependents` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_family_dependents_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_family_dependents` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_family_dependents_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `hr_employee_family_dependents` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function hr_employee_family_dependents_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `name`,  `lastname`,  `birthday`,  `relation`,  `in_charge`,  `handicap`,  `notes`,  `order_by`,  `status`   
    
    FROM `hr_employee_family_dependents` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function hr_employee_family_dependents_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `employee_id`,  `name`,  `lastname`,  `birthday`,  `relation`,  `in_charge`,  `handicap`,  `notes`,  `order_by`,  `status`   
    FROM `hr_employee_family_dependents` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function hr_employee_family_dependents_edit($id ,  $employee_id ,  $name ,  $lastname ,  $birthday ,  $relation ,  $in_charge ,  $handicap ,  $notes ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `employee_id` =:employee_id, `name` =:name, `lastname` =:lastname, `birthday` =:birthday, `relation` =:relation, `in_charge` =:in_charge, `handicap` =:handicap, `notes` =:notes, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "employee_id" =>$employee_id ,  
 "name" =>$name ,  
 "lastname" =>$lastname ,  
 "birthday" =>$birthday ,  
 "relation" =>$relation ,  
 "in_charge" =>$in_charge ,  
 "handicap" =>$handicap ,  
 "notes" =>$notes ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function hr_employee_family_dependents_add($employee_id ,  $name ,  $lastname ,  $birthday ,  $relation ,  $in_charge ,  $handicap ,  $notes ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `hr_employee_family_dependents` ( `id` ,   `employee_id` ,   `name` ,   `lastname` ,   `birthday` ,   `relation` ,   `in_charge` ,   `handicap` ,   `notes` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :employee_id ,  :name ,  :lastname ,  :birthday ,  :relation ,  :in_charge ,  :handicap ,  :notes ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "employee_id" => $employee_id ,  
 "name" => $name ,  
 "lastname" => $lastname ,  
 "birthday" => $birthday ,  
 "relation" => $relation ,  
 "in_charge" => $in_charge ,  
 "handicap" => $handicap ,  
 "notes" => $notes ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function hr_employee_family_dependents_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `name`,  `lastname`,  `birthday`,  `relation`,  `in_charge`,  `handicap`,  `notes`,  `order_by`,  `status`    
            FROM `hr_employee_family_dependents` 
            WHERE `id` = :txt OR `id` like :txt
OR `employee_id` like :txt
OR `name` like :txt
OR `lastname` like :txt
OR `birthday` like :txt
OR `relation` like :txt
OR `in_charge` like :txt
OR `handicap` like :txt
OR `notes` like :txt
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

function hr_employee_family_dependents_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (hr_employee_family_dependents_list() as $key => $value) {
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
function hr_employee_family_dependents_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `hr_employee_family_dependents` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function hr_employee_family_dependents_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `employee_id`,  `name`,  `lastname`,  `birthday`,  `relation`,  `in_charge`,  `handicap`,  `notes`,  `order_by`,  `status`    FROM `hr_employee_family_dependents` 

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

function hr_employee_family_dependents_db_show_col_from_table($c) {
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
function hr_employee_family_dependents_db_col_list_from_table($c){
    $list = array();
    foreach (hr_employee_family_dependents_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function hr_employee_family_dependents_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_employee_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `employee_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_lastname($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `lastname`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_birthday($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `birthday`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_relation($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `relation`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_in_charge($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `in_charge`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_handicap($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `handicap`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_notes($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `notes`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function hr_employee_family_dependents_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `hr_employee_family_dependents` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function hr_employee_family_dependents_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            hr_employee_family_dependents_update_id($id, $new_data);
            break;

        case "employee_id":
            hr_employee_family_dependents_update_employee_id($id, $new_data);
            break;

        case "name":
            hr_employee_family_dependents_update_name($id, $new_data);
            break;

        case "lastname":
            hr_employee_family_dependents_update_lastname($id, $new_data);
            break;

        case "birthday":
            hr_employee_family_dependents_update_birthday($id, $new_data);
            break;

        case "relation":
            hr_employee_family_dependents_update_relation($id, $new_data);
            break;

        case "in_charge":
            hr_employee_family_dependents_update_in_charge($id, $new_data);
            break;

        case "handicap":
            hr_employee_family_dependents_update_handicap($id, $new_data);
            break;

        case "notes":
            hr_employee_family_dependents_update_notes($id, $new_data);
            break;

        case "order_by":
            hr_employee_family_dependents_update_order_by($id, $new_data);
            break;

        case "status":
            hr_employee_family_dependents_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function hr_employee_family_dependents_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `hr_employee_family_dependents` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/hr_employee_family_dependents/functions.php
// and comment here (this function)
function hr_employee_family_dependents_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employee_id":
            //return employees_field_id("contact_id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "lastname":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "birthday":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "relation":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "in_charge":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "handicap":
            //return _field_id("", $value);
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
function hr_employee_family_dependents_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `hr_employee_family_dependents` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_employee_id($employee_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employee_id` FROM `hr_employee_family_dependents` WHERE   `employee_id` = ?");
    $req->execute(array($employee_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `hr_employee_family_dependents` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_lastname($lastname){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `lastname` FROM `hr_employee_family_dependents` WHERE   `lastname` = ?");
    $req->execute(array($lastname));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_birthday($birthday){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `birthday` FROM `hr_employee_family_dependents` WHERE   `birthday` = ?");
    $req->execute(array($birthday));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_relation($relation){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `relation` FROM `hr_employee_family_dependents` WHERE   `relation` = ?");
    $req->execute(array($relation));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_in_charge($in_charge){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `in_charge` FROM `hr_employee_family_dependents` WHERE   `in_charge` = ?");
    $req->execute(array($in_charge));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_handicap($handicap){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `handicap` FROM `hr_employee_family_dependents` WHERE   `handicap` = ?");
    $req->execute(array($handicap));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_notes($notes){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `notes` FROM `hr_employee_family_dependents` WHERE   `notes` = ?");
    $req->execute(array($notes));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `hr_employee_family_dependents` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function hr_employee_family_dependents_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `hr_employee_family_dependents` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function hr_employee_family_dependents_is_id($id){
     return (is_id($id) )? true : false ;
}

function hr_employee_family_dependents_is_employee_id($employee_id){
     return true;
}

function hr_employee_family_dependents_is_name($name){
     return true;
}

function hr_employee_family_dependents_is_lastname($lastname){
     return true;
}

function hr_employee_family_dependents_is_birthday($birthday){
     return true;
}

function hr_employee_family_dependents_is_relation($relation){
     return true;
}

function hr_employee_family_dependents_is_in_charge($in_charge){
     return true;
}

function hr_employee_family_dependents_is_handicap($handicap){
     return true;
}

function hr_employee_family_dependents_is_notes($notes){
     return true;
}

function hr_employee_family_dependents_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function hr_employee_family_dependents_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function hr_employee_family_dependents_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, hr_employee_family_dependents_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function hr_employee_family_dependents_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (hr_employee_family_dependents_is_id($value)) ? true : false;
            break;
     case "employee_id":
            $is = (hr_employee_family_dependents_is_employee_id($value)) ? true : false;
            break;
     case "name":
            $is = (hr_employee_family_dependents_is_name($value)) ? true : false;
            break;
     case "lastname":
            $is = (hr_employee_family_dependents_is_lastname($value)) ? true : false;
            break;
     case "birthday":
            $is = (hr_employee_family_dependents_is_birthday($value)) ? true : false;
            break;
     case "relation":
            $is = (hr_employee_family_dependents_is_relation($value)) ? true : false;
            break;
     case "in_charge":
            $is = (hr_employee_family_dependents_is_in_charge($value)) ? true : false;
            break;
     case "handicap":
            $is = (hr_employee_family_dependents_is_handicap($value)) ? true : false;
            break;
     case "notes":
            $is = (hr_employee_family_dependents_is_notes($value)) ? true : false;
            break;
     case "order_by":
            $is = (hr_employee_family_dependents_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (hr_employee_family_dependents_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function hr_employee_family_dependents_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=hr_employee_family_dependents&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'employee_id':
                echo '<th>' . _tr(ucfirst('employee_id')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'lastname':
                echo '<th>' . _tr(ucfirst('lastname')) . '</th>';
                break;
case 'birthday':
                echo '<th>' . _tr(ucfirst('birthday')) . '</th>';
                break;
case 'relation':
                echo '<th>' . _tr(ucfirst('relation')) . '</th>';
                break;
case 'in_charge':
                echo '<th>' . _tr(ucfirst('in_charge')) . '</th>';
                break;
case 'handicap':
                echo '<th>' . _tr(ucfirst('handicap')) . '</th>';
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

function hr_employee_family_dependents_index_generate_column_body_td($hr_employee_family_dependents, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=hr_employee_family_dependents&a=details&id=' . $hr_employee_family_dependents[$col] . '">' . $hr_employee_family_dependents[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'employee_id':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'lastname':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'birthday':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'relation':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'in_charge':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'handicap':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'notes':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=hr_employee_family_dependents&a=details&id=' . $hr_employee_family_dependents['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=hr_employee_family_dependents&a=details_payement&id=' . $hr_employee_family_dependents['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_family_dependents&a=edit&id=' . $hr_employee_family_dependents['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=hr_employee_family_dependents&a=ok_delete&id=' . $hr_employee_family_dependents['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=export_pdf&id=' . $hr_employee_family_dependents['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=hr_employee_family_dependents&a=export_pdf&way=pdf&&id=' . $hr_employee_family_dependents['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($hr_employee_family_dependents[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
