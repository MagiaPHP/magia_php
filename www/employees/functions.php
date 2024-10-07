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
# Fecha de creacion del documento: 2024-10-03 18:10:04 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-03 18:10:04 


// 

//function employees_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function employees_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("employees_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("employees"); // Obtener columnas de la tabla de la base de datos
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
function employees_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `employees` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function employees_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `employees` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function employees_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `employees` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function employees_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'company_id',  'contact_id',  'owner_ref',  'date',  'cargo',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    
    $data = null;
    
    $sql = "SELECT `id`,  `company_id`,  `contact_id`,  `owner_ref`,  `date`,  `cargo`,  `order_by`,  `status`   
    
    FROM `employees` 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start  ";
    
    $query = $db->prepare($sql);                
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function employees_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `company_id`,  `contact_id`,  `owner_ref`,  `date`,  `cargo`,  `order_by`,  `status`   
    FROM 
        `employees` 
        WHERE 
            `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function employees_edit($id ,  $company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `company_id` =:company_id, `contact_id` =:contact_id, `owner_ref` =:owner_ref, `date` =:date, `cargo` =:cargo, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "company_id" =>$company_id ,  
 "contact_id" =>$contact_id ,  
 "owner_ref" =>$owner_ref ,  
 "date" =>$date ,  
 "cargo" =>$cargo ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function employees_add($company_id ,  $contact_id ,  $owner_ref ,  $date ,  $cargo ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `employees` ( `id` ,   `company_id` ,   `contact_id` ,   `owner_ref` ,   `date` ,   `cargo` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :company_id ,  :contact_id ,  :owner_ref ,  :date ,  :cargo ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "company_id" => $company_id ,  
 "contact_id" => $contact_id ,  
 "owner_ref" => $owner_ref ,  
 "date" => $date ,  
 "cargo" => $cargo ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function employees_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    



    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'company_id',  'contact_id',  'owner_ref',  'date',  'cargo',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    
    
    $data = null;
    
    $sql = "SELECT `id`,  `company_id`,  `contact_id`,  `owner_ref`,  `date`,  `cargo`,  `order_by`,  `status`    
            FROM 
                `employees` 
            WHERE 
                `id` = :txt OR `id` like :txt
OR `company_id` like :txt
OR `contact_id` like :txt
OR `owner_ref` like :txt
OR `date` like :txt
OR `cargo` like :txt
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

function employees_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (employees_list() as $key => $value) {
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
function employees_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `employees` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function employees_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 
        
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'company_id',  'contact_id',  'owner_ref',  'date',  'cargo',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    $data = null;
    
    $sql = "SELECT `id`,  `company_id`,  `contact_id`,  `owner_ref`,  `date`,  `cargo`,  `order_by`,  `status`    FROM `employees` 

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

function employees_db_show_col_from_table($c) {
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
function employees_db_col_list_from_table($c){
    $list = array();
    foreach (employees_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function employees_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_company_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `company_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_owner_ref($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `owner_ref`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_cargo($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `cargo`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function employees_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `employees` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function employees_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            employees_update_id($id, $new_data);
            break;

        case "company_id":
            employees_update_company_id($id, $new_data);
            break;

        case "contact_id":
            employees_update_contact_id($id, $new_data);
            break;

        case "owner_ref":
            employees_update_owner_ref($id, $new_data);
            break;

        case "date":
            employees_update_date($id, $new_data);
            break;

        case "cargo":
            employees_update_cargo($id, $new_data);
            break;

        case "order_by":
            employees_update_order_by($id, $new_data);
            break;

        case "status":
            employees_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function employees_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `employees` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/employees/functions.php
// and comment here (this function)
function employees_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "company_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "owner_ref":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "cargo":
            //return employees_categories_field_id("category", $value);
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
function employees_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `employees` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_company_id($company_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company_id` FROM `employees` WHERE   `company_id` = ?");
    $req->execute(array($company_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `employees` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_owner_ref($owner_ref){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `owner_ref` FROM `employees` WHERE   `owner_ref` = ?");
    $req->execute(array($owner_ref));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `employees` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_cargo($cargo){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `cargo` FROM `employees` WHERE   `cargo` = ?");
    $req->execute(array($cargo));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `employees` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function employees_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `employees` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function employees_is_id($id){
     return (is_id($id) )? true : false ;
}

function employees_is_company_id($company_id){
     return true;
}

function employees_is_contact_id($contact_id){
     return true;
}

function employees_is_owner_ref($owner_ref){
     return true;
}

function employees_is_date($date){
     return true;
}

function employees_is_cargo($cargo){
     return true;
}

function employees_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function employees_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function employees_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, employees_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function employees_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (employees_is_id($value)) ? true : false;
            break;
     case "company_id":
            $is = (employees_is_company_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (employees_is_contact_id($value)) ? true : false;
            break;
     case "owner_ref":
            $is = (employees_is_owner_ref($value)) ? true : false;
            break;
     case "date":
            $is = (employees_is_date($value)) ? true : false;
            break;
     case "cargo":
            $is = (employees_is_cargo($value)) ? true : false;
            break;
     case "order_by":
            $is = (employees_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (employees_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function employees_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=employees&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'company_id':
                echo '<th>' . _tr(ucfirst('company_id')) . '</th>';
                break;
case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'owner_ref':
                echo '<th>' . _tr(ucfirst('owner_ref')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'cargo':
                echo '<th>' . _tr(ucfirst('cargo')) . '</th>';
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

function employees_index_generate_column_body_td($employees, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=employees&a=details&id=' . $employees[$col] . '">' . $employees[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'company_id':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'owner_ref':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'cargo':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($employees[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=employees&a=details&id=' . $employees['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=employees&a=details_payement&id=' . $employees['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=employees&a=edit&id=' . $employees['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=employees&a=ok_delete&id=' . $employees['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=employees&a=export_pdf&id=' . $employees['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=employees&a=export_pdf&way=pdf&&id=' . $employees['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($employees[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
