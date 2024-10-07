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
# Fecha de creacion del documento: 2024-09-23 21:09:21 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-23 21:09:21 


// 

//function holidays_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function holidays_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("holidays_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("holidays"); // Obtener columnas de la tabla de la base de datos
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
function holidays_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `holidays` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function holidays_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `holidays` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function holidays_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `holidays` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function holidays_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `country`,  `category_code`,  `date`,  `description`,  `order_by`,  `status`   
    
    FROM `holidays` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function holidays_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `country`,  `category_code`,  `date`,  `description`,  `order_by`,  `status`   
    FROM `holidays` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function holidays_edit($id ,  $country ,  $category_code ,  $date ,  $description ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `country` =:country, `category_code` =:category_code, `date` =:date, `description` =:description, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "country" =>$country ,  
 "category_code" =>$category_code ,  
 "date" =>$date ,  
 "description" =>$description ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function holidays_add($country ,  $category_code ,  $date ,  $description ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `holidays` ( `id` ,   `country` ,   `category_code` ,   `date` ,   `description` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :country ,  :category_code ,  :date ,  :description ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "country" => $country ,  
 "category_code" => $category_code ,  
 "date" => $date ,  
 "description" => $description ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function holidays_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `country`,  `category_code`,  `date`,  `description`,  `order_by`,  `status`    
            FROM `holidays` 
            WHERE `id` = :txt OR `id` like :txt
OR `country` like :txt
OR `category_code` like :txt
OR `date` like :txt
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

function holidays_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (holidays_list() as $key => $value) {
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
function holidays_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `holidays` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function holidays_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `country`,  `category_code`,  `date`,  `description`,  `order_by`,  `status`    FROM `holidays` 

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

function holidays_db_show_col_from_table($c) {
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
function holidays_db_col_list_from_table($c){
    $list = array();
    foreach (holidays_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function holidays_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function holidays_update_country($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `country`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function holidays_update_category_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `category_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function holidays_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function holidays_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function holidays_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function holidays_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `holidays` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function holidays_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            holidays_update_id($id, $new_data);
            break;

        case "country":
            holidays_update_country($id, $new_data);
            break;

        case "category_code":
            holidays_update_category_code($id, $new_data);
            break;

        case "date":
            holidays_update_date($id, $new_data);
            break;

        case "description":
            holidays_update_description($id, $new_data);
            break;

        case "order_by":
            holidays_update_order_by($id, $new_data);
            break;

        case "status":
            holidays_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function holidays_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `holidays` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/holidays/functions.php
// and comment here (this function)
function holidays_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "country":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category_code":
            //return holidays_categories_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
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
function holidays_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `holidays` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function holidays_exists_country($country){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `country` FROM `holidays` WHERE   `country` = ?");
    $req->execute(array($country));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function holidays_exists_category_code($category_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category_code` FROM `holidays` WHERE   `category_code` = ?");
    $req->execute(array($category_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function holidays_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `holidays` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function holidays_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `holidays` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function holidays_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `holidays` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function holidays_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `holidays` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function holidays_is_id($id){
     return (is_id($id) )? true : false ;
}

function holidays_is_country($country){
     return true;
}

function holidays_is_category_code($category_code){
     return true;
}

function holidays_is_date($date){
     return true;
}

function holidays_is_description($description){
     return true;
}

function holidays_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function holidays_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function holidays_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, holidays_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function holidays_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (holidays_is_id($value)) ? true : false;
            break;
     case "country":
            $is = (holidays_is_country($value)) ? true : false;
            break;
     case "category_code":
            $is = (holidays_is_category_code($value)) ? true : false;
            break;
     case "date":
            $is = (holidays_is_date($value)) ? true : false;
            break;
     case "description":
            $is = (holidays_is_description($value)) ? true : false;
            break;
     case "order_by":
            $is = (holidays_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (holidays_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function holidays_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=holidays&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'country':
                echo '<th>' . _tr(ucfirst('country')) . '</th>';
                break;
case 'category_code':
                echo '<th>' . _tr(ucfirst('category_code')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
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

function holidays_index_generate_column_body_td($holidays, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=holidays&a=details&id=' . $holidays[$col] . '">' . $holidays[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
case 'country':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
case 'category_code':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($holidays[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=holidays&a=details&id=' . $holidays['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=holidays&a=details_payement&id=' . $holidays['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=holidays&a=edit&id=' . $holidays['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=holidays&a=ok_delete&id=' . $holidays['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=holidays&a=export_pdf&id=' . $holidays['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=holidays&a=export_pdf&way=pdf&&id=' . $holidays['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($holidays[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
