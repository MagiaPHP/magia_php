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
# Fecha de creacion del documento: 2024-09-27 11:09:56 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-27 11:09:56 


// 

//function projects_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function projects_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("projects_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("projects"); // Obtener columnas de la tabla de la base de datos
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
function projects_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function projects_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function projects_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `projects` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function projects_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `name`,  `description`,  `address`,  `date_start`,  `date_end`,  `code`,  `order_by`,  `status`   
    
    FROM `projects` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function projects_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `name`,  `description`,  `address`,  `date_start`,  `date_end`,  `code`,  `order_by`,  `status`   
    FROM `projects` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function projects_edit($id ,  $contact_id ,  $name ,  $description ,  $address ,  $date_start ,  $date_end ,  $code ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `contact_id` =:contact_id, `name` =:name, `description` =:description, `address` =:address, `date_start` =:date_start, `date_end` =:date_end, `code` =:code, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "name" =>$name ,  
 "description" =>$description ,  
 "address" =>$address ,  
 "date_start" =>$date_start ,  
 "date_end" =>$date_end ,  
 "code" =>$code ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function projects_add($contact_id ,  $name ,  $description ,  $address ,  $date_start ,  $date_end ,  $code ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `projects` ( `id` ,   `contact_id` ,   `name` ,   `description` ,   `address` ,   `date_start` ,   `date_end` ,   `code` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :name ,  :description ,  :address ,  :date_start ,  :date_end ,  :code ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "name" => $name ,  
 "description" => $description ,  
 "address" => $address ,  
 "date_start" => $date_start ,  
 "date_end" => $date_end ,  
 "code" => $code ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function projects_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `name`,  `description`,  `address`,  `date_start`,  `date_end`,  `code`,  `order_by`,  `status`    
            FROM `projects` 
            WHERE `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `name` like :txt
OR `description` like :txt
OR `address` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
OR `code` like :txt
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

function projects_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (projects_list() as $key => $value) {
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
function projects_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `projects` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function projects_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `name`,  `description`,  `address`,  `date_start`,  `date_end`,  `code`,  `order_by`,  `status`    FROM `projects` 

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

function projects_db_show_col_from_table($c) {
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
function projects_db_col_list_from_table($c){
    $list = array();
    foreach (projects_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function projects_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_address($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `address`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function projects_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `projects` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function projects_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            projects_update_id($id, $new_data);
            break;

        case "contact_id":
            projects_update_contact_id($id, $new_data);
            break;

        case "name":
            projects_update_name($id, $new_data);
            break;

        case "description":
            projects_update_description($id, $new_data);
            break;

        case "address":
            projects_update_address($id, $new_data);
            break;

        case "date_start":
            projects_update_date_start($id, $new_data);
            break;

        case "date_end":
            projects_update_date_end($id, $new_data);
            break;

        case "code":
            projects_update_code($id, $new_data);
            break;

        case "order_by":
            projects_update_order_by($id, $new_data);
            break;

        case "status":
            projects_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function projects_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `projects` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/projects/functions.php
// and comment here (this function)
function projects_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "address":
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
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "status":
            //return projects_status_field_id("code", $value);
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
function projects_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `projects` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `projects` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `projects` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `projects` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_address($address){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `address` FROM `projects` WHERE   `address` = ?");
    $req->execute(array($address));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_date_start($date_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `projects` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_date_end($date_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `projects` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `projects` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `projects` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function projects_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `projects` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function projects_is_id($id){
     return (is_id($id) )? true : false ;
}

function projects_is_contact_id($contact_id){
     return true;
}

function projects_is_name($name){
     return true;
}

function projects_is_description($description){
     return true;
}

function projects_is_address($address){
     return true;
}

function projects_is_date_start($date_start){
     return true;
}

function projects_is_date_end($date_end){
     return true;
}

function projects_is_code($code){
     return true;
}

function projects_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function projects_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function projects_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, projects_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function projects_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (projects_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (projects_is_contact_id($value)) ? true : false;
            break;
     case "name":
            $is = (projects_is_name($value)) ? true : false;
            break;
     case "description":
            $is = (projects_is_description($value)) ? true : false;
            break;
     case "address":
            $is = (projects_is_address($value)) ? true : false;
            break;
     case "date_start":
            $is = (projects_is_date_start($value)) ? true : false;
            break;
     case "date_end":
            $is = (projects_is_date_end($value)) ? true : false;
            break;
     case "code":
            $is = (projects_is_code($value)) ? true : false;
            break;
     case "order_by":
            $is = (projects_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (projects_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function projects_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=projects&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'address':
                echo '<th>' . _tr(ucfirst('address')) . '</th>';
                break;
case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function projects_index_generate_column_body_td($projects, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=projects&a=details&id=' . $projects[$col] . '">' . $projects[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'address':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'date_start':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'date_end':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($projects[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=projects&a=details&id=' . $projects['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=projects&a=details_payement&id=' . $projects['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=projects&a=edit&id=' . $projects['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=projects&a=ok_delete&id=' . $projects['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=projects&a=export_pdf&id=' . $projects['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=projects&a=export_pdf&way=pdf&&id=' . $projects['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($projects[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
