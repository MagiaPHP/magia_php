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
# Fecha de creacion del documento: 2024-09-18 06:09:31 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 06:09:31 


// 

//function cv_experiences_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function cv_experiences_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("cv_experiences_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("cv_experiences"); // Obtener columnas de la tabla de la base de datos
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
function cv_experiences_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_experiences` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_experiences_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_experiences` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_experiences_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_experiences` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_experiences_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `cv_id`,  `role`,  `company`,  `employment_type`,  `start_date`,  `end_date`,  `description`,  `order_by`,  `status`   
    
    FROM `cv_experiences` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function cv_experiences_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `cv_id`,  `role`,  `company`,  `employment_type`,  `start_date`,  `end_date`,  `description`,  `order_by`,  `status`   
    FROM `cv_experiences` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cv_experiences_edit($id ,  $cv_id ,  $role ,  $company ,  $employment_type ,  $start_date ,  $end_date ,  $description ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `cv_id` =:cv_id, `role` =:role, `company` =:company, `employment_type` =:employment_type, `start_date` =:start_date, `end_date` =:end_date, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "cv_id" =>$cv_id ,  
 "role" =>$role ,  
 "company" =>$company ,  
 "employment_type" =>$employment_type ,  
 "start_date" =>$start_date ,  
 "end_date" =>$end_date ,  
 "description" =>$description ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cv_experiences_add($cv_id ,  $role ,  $company ,  $employment_type ,  $start_date ,  $end_date ,  $description ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cv_experiences` ( `id` ,   `cv_id` ,   `role` ,   `company` ,   `employment_type` ,   `start_date` ,   `end_date` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :cv_id ,  :role ,  :company ,  :employment_type ,  :start_date ,  :end_date ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "cv_id" => $cv_id ,  
 "role" => $role ,  
 "company" => $company ,  
 "employment_type" => $employment_type ,  
 "start_date" => $start_date ,  
 "end_date" => $end_date ,  
 "description" => $description ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cv_experiences_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `cv_id`,  `role`,  `company`,  `employment_type`,  `start_date`,  `end_date`,  `description`,  `order_by`,  `status`    
            FROM `cv_experiences` 
            WHERE `id` = :txt OR `id` like :txt
OR `cv_id` like :txt
OR `role` like :txt
OR `company` like :txt
OR `employment_type` like :txt
OR `start_date` like :txt
OR `end_date` like :txt
OR `description` like :txt
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

function cv_experiences_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cv_experiences_list() as $key => $value) {
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
function cv_experiences_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cv_experiences` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cv_experiences_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `cv_id`,  `role`,  `company`,  `employment_type`,  `start_date`,  `end_date`,  `description`,  `order_by`,  `status`    FROM `cv_experiences` 

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

function cv_experiences_db_show_col_from_table($c) {
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
function cv_experiences_db_col_list_from_table($c){
    $list = array();
    foreach (cv_experiences_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cv_experiences_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_cv_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `cv_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_role($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `role`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_company($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `company`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_employment_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `employment_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_start_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `start_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_end_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `end_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_experiences_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_experiences` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cv_experiences_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cv_experiences_update_id($id, $new_data);
            break;

        case "cv_id":
            cv_experiences_update_cv_id($id, $new_data);
            break;

        case "role":
            cv_experiences_update_role($id, $new_data);
            break;

        case "company":
            cv_experiences_update_company($id, $new_data);
            break;

        case "employment_type":
            cv_experiences_update_employment_type($id, $new_data);
            break;

        case "start_date":
            cv_experiences_update_start_date($id, $new_data);
            break;

        case "end_date":
            cv_experiences_update_end_date($id, $new_data);
            break;

        case "description":
            cv_experiences_update_description($id, $new_data);
            break;

        case "order_by":
            cv_experiences_update_order_by($id, $new_data);
            break;

        case "status":
            cv_experiences_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cv_experiences_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cv_experiences` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cv_experiences/functions.php
// and comment here (this function)
function cv_experiences_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "cv_id":
            //return cv_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "role":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "company":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employment_type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "start_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "end_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
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
function cv_experiences_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cv_experiences` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_cv_id($cv_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `cv_id` FROM `cv_experiences` WHERE   `cv_id` = ?");
    $req->execute(array($cv_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_role($role){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `role` FROM `cv_experiences` WHERE   `role` = ?");
    $req->execute(array($role));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_company($company){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company` FROM `cv_experiences` WHERE   `company` = ?");
    $req->execute(array($company));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_employment_type($employment_type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employment_type` FROM `cv_experiences` WHERE   `employment_type` = ?");
    $req->execute(array($employment_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_start_date($start_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `start_date` FROM `cv_experiences` WHERE   `start_date` = ?");
    $req->execute(array($start_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_end_date($end_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `end_date` FROM `cv_experiences` WHERE   `end_date` = ?");
    $req->execute(array($end_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `cv_experiences` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cv_experiences` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_experiences_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cv_experiences` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cv_experiences_is_id($id){
     return (is_id($id) )? true : false ;
}

function cv_experiences_is_cv_id($cv_id){
     return true;
}

function cv_experiences_is_role($role){
     return true;
}

function cv_experiences_is_company($company){
     return true;
}

function cv_experiences_is_employment_type($employment_type){
     return true;
}

function cv_experiences_is_start_date($start_date){
     return true;
}

function cv_experiences_is_end_date($end_date){
     return true;
}

function cv_experiences_is_description($description){
     return true;
}

function cv_experiences_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cv_experiences_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cv_experiences_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cv_experiences_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cv_experiences_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cv_experiences_is_id($value)) ? true : false;
            break;
     case "cv_id":
            $is = (cv_experiences_is_cv_id($value)) ? true : false;
            break;
     case "role":
            $is = (cv_experiences_is_role($value)) ? true : false;
            break;
     case "company":
            $is = (cv_experiences_is_company($value)) ? true : false;
            break;
     case "employment_type":
            $is = (cv_experiences_is_employment_type($value)) ? true : false;
            break;
     case "start_date":
            $is = (cv_experiences_is_start_date($value)) ? true : false;
            break;
     case "end_date":
            $is = (cv_experiences_is_end_date($value)) ? true : false;
            break;
     case "description":
            $is = (cv_experiences_is_description($value)) ? true : false;
            break;
     case "order_by":
            $is = (cv_experiences_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cv_experiences_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cv_experiences_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cv_experiences&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'cv_id':
                echo '<th>' . _tr(ucfirst('cv_id')) . '</th>';
                break;
case 'role':
                echo '<th>' . _tr(ucfirst('role')) . '</th>';
                break;
case 'company':
                echo '<th>' . _tr(ucfirst('company')) . '</th>';
                break;
case 'employment_type':
                echo '<th>' . _tr(ucfirst('employment_type')) . '</th>';
                break;
case 'start_date':
                echo '<th>' . _tr(ucfirst('start_date')) . '</th>';
                break;
case 'end_date':
                echo '<th>' . _tr(ucfirst('end_date')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
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

function cv_experiences_index_generate_column_body_td($cv_experiences, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cv_experiences&a=details&id=' . $cv_experiences[$col] . '">' . $cv_experiences[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'cv_id':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'role':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'company':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'employment_type':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'start_date':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'end_date':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cv_experiences&a=details&id=' . $cv_experiences['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cv_experiences&a=details_payement&id=' . $cv_experiences['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_experiences&a=edit&id=' . $cv_experiences['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_experiences&a=ok_delete&id=' . $cv_experiences['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_experiences&a=export_pdf&id=' . $cv_experiences['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_experiences&a=export_pdf&way=pdf&&id=' . $cv_experiences['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cv_experiences[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
