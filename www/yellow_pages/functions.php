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
# Fecha de creacion del documento: 2024-10-07 10:10:03 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-07 10:10:03 


// 

//function yellow_pages_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function yellow_pages_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("yellow_pages_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("yellow_pages"); // Obtener columnas de la tabla de la base de datos
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
function yellow_pages_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `yellow_pages` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function yellow_pages_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `yellow_pages` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function yellow_pages_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `yellow_pages` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function yellow_pages_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'label',  'url',  'description',  'category',  'target',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    
    $data = null;
    
    $sql = "SELECT `id`,  `label`,  `url`,  `description`,  `category`,  `target`,  `order_by`,  `status`   
    
    FROM `yellow_pages` 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start  ";
    
    $query = $db->prepare($sql);                
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function yellow_pages_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `label`,  `url`,  `description`,  `category`,  `target`,  `order_by`,  `status`   
    FROM 
        `yellow_pages` 
        WHERE 
            `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function yellow_pages_edit($id ,  $label ,  $url ,  $description ,  $category ,  $target ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `label` =:label, `url` =:url, `description` =:description, `category` =:category, `target` =:target, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "label" =>$label ,  
 "url" =>$url ,  
 "description" =>$description ,  
 "category" =>$category ,  
 "target" =>$target ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function yellow_pages_add($label ,  $url ,  $description ,  $category ,  $target ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `yellow_pages` ( `id` ,   `label` ,   `url` ,   `description` ,   `category` ,   `target` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :label ,  :url ,  :description ,  :category ,  :target ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "label" => $label ,  
 "url" => $url ,  
 "description" => $description ,  
 "category" => $category ,  
 "target" => $target ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function yellow_pages_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    



    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'label',  'url',  'description',  'category',  'target',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    
    
    $data = null;
    
    $sql = "SELECT `id`,  `label`,  `url`,  `description`,  `category`,  `target`,  `order_by`,  `status`    
            FROM 
                `yellow_pages` 
            WHERE 
                `id` = :txt OR `id` like :txt
OR `label` like :txt
OR `url` like :txt
OR `description` like :txt
OR `category` like :txt
OR `target` like :txt
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

function yellow_pages_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (yellow_pages_list() as $key => $value) {
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
function yellow_pages_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `yellow_pages` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function yellow_pages_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 
        
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'label',  'url',  'description',  'category',  'target',  'order_by',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    $data = null;
    
    $sql = "SELECT `id`,  `label`,  `url`,  `description`,  `category`,  `target`,  `order_by`,  `status`    FROM `yellow_pages` 

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

function yellow_pages_db_show_col_from_table($c) {
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
function yellow_pages_db_col_list_from_table($c){
    $list = array();
    foreach (yellow_pages_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function yellow_pages_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_category($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `category`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_target($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `target`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function yellow_pages_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `yellow_pages` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function yellow_pages_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            yellow_pages_update_id($id, $new_data);
            break;

        case "label":
            yellow_pages_update_label($id, $new_data);
            break;

        case "url":
            yellow_pages_update_url($id, $new_data);
            break;

        case "description":
            yellow_pages_update_description($id, $new_data);
            break;

        case "category":
            yellow_pages_update_category($id, $new_data);
            break;

        case "target":
            yellow_pages_update_target($id, $new_data);
            break;

        case "order_by":
            yellow_pages_update_order_by($id, $new_data);
            break;

        case "status":
            yellow_pages_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function yellow_pages_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `yellow_pages` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/yellow_pages/functions.php
// and comment here (this function)
function yellow_pages_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "url":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category":
            //return yellow_pages_categories_field_id("category", $value);
            return ($filtre) ?? $value;                
            break; 
        case "target":
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
function yellow_pages_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `yellow_pages` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `yellow_pages` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_url($url){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `url` FROM `yellow_pages` WHERE   `url` = ?");
    $req->execute(array($url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `yellow_pages` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_category($category){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category` FROM `yellow_pages` WHERE   `category` = ?");
    $req->execute(array($category));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_target($target){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `target` FROM `yellow_pages` WHERE   `target` = ?");
    $req->execute(array($target));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `yellow_pages` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function yellow_pages_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `yellow_pages` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function yellow_pages_is_id($id){
     return (is_id($id) )? true : false ;
}

function yellow_pages_is_label($label){
     return true;
}

function yellow_pages_is_url($url){
     return true;
}

function yellow_pages_is_description($description){
     return true;
}

function yellow_pages_is_category($category){
     return true;
}

function yellow_pages_is_target($target){
     return true;
}

function yellow_pages_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function yellow_pages_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function yellow_pages_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, yellow_pages_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function yellow_pages_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (yellow_pages_is_id($value)) ? true : false;
            break;
     case "label":
            $is = (yellow_pages_is_label($value)) ? true : false;
            break;
     case "url":
            $is = (yellow_pages_is_url($value)) ? true : false;
            break;
     case "description":
            $is = (yellow_pages_is_description($value)) ? true : false;
            break;
     case "category":
            $is = (yellow_pages_is_category($value)) ? true : false;
            break;
     case "target":
            $is = (yellow_pages_is_target($value)) ? true : false;
            break;
     case "order_by":
            $is = (yellow_pages_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (yellow_pages_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function yellow_pages_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=yellow_pages&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'url':
                echo '<th>' . _tr(ucfirst('url')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'category':
                echo '<th>' . _tr(ucfirst('category')) . '</th>';
                break;
case 'target':
                echo '<th>' . _tr(ucfirst('target')) . '</th>';
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

function yellow_pages_index_generate_column_body_td($yellow_pages, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=yellow_pages&a=details&id=' . $yellow_pages[$col] . '">' . $yellow_pages[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'url':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'category':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'target':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=yellow_pages&a=details&id=' . $yellow_pages['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=yellow_pages&a=details_payement&id=' . $yellow_pages['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=yellow_pages&a=edit&id=' . $yellow_pages['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=yellow_pages&a=ok_delete&id=' . $yellow_pages['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=yellow_pages&a=export_pdf&id=' . $yellow_pages['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=yellow_pages&a=export_pdf&way=pdf&&id=' . $yellow_pages['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($yellow_pages[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
