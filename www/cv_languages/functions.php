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
# Fecha de creacion del documento: 2024-09-18 06:09:37 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 06:09:37 


// 

//function cv_languages_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function cv_languages_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("cv_languages_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("cv_languages"); // Obtener columnas de la tabla de la base de datos
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
function cv_languages_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_languages` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_languages_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_languages` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_languages_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_languages` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_languages_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `cv_id`,  `language`,  `level`,  `order_by`,  `status`   
    
    FROM `cv_languages` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function cv_languages_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `cv_id`,  `language`,  `level`,  `order_by`,  `status`   
    FROM `cv_languages` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cv_languages_edit($id ,  $cv_id ,  $language ,  $level ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `cv_id` =:cv_id, `language` =:language, `level` =:level, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "cv_id" =>$cv_id ,  
 "language" =>$language ,  
 "level" =>$level ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cv_languages_add($cv_id ,  $language ,  $level ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cv_languages` ( `id` ,   `cv_id` ,   `language` ,   `level` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :cv_id ,  :language ,  :level ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "cv_id" => $cv_id ,  
 "language" => $language ,  
 "level" => $level ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cv_languages_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `cv_id`,  `language`,  `level`,  `order_by`,  `status`    
            FROM `cv_languages` 
            WHERE `id` = :txt OR `id` like :txt
OR `cv_id` like :txt
OR `language` like :txt
OR `level` like :txt
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

function cv_languages_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cv_languages_list() as $key => $value) {
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
function cv_languages_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cv_languages` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cv_languages_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `cv_id`,  `language`,  `level`,  `order_by`,  `status`    FROM `cv_languages` 

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

function cv_languages_db_show_col_from_table($c) {
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
function cv_languages_db_col_list_from_table($c){
    $list = array();
    foreach (cv_languages_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cv_languages_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_languages_update_cv_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `cv_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_languages_update_language($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `language`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_languages_update_level($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `level`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_languages_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_languages_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_languages` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cv_languages_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cv_languages_update_id($id, $new_data);
            break;

        case "cv_id":
            cv_languages_update_cv_id($id, $new_data);
            break;

        case "language":
            cv_languages_update_language($id, $new_data);
            break;

        case "level":
            cv_languages_update_level($id, $new_data);
            break;

        case "order_by":
            cv_languages_update_order_by($id, $new_data);
            break;

        case "status":
            cv_languages_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cv_languages_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cv_languages` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cv_languages/functions.php
// and comment here (this function)
function cv_languages_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "cv_id":
            //return cv_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "language":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "level":
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
function cv_languages_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cv_languages` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_languages_exists_cv_id($cv_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `cv_id` FROM `cv_languages` WHERE   `cv_id` = ?");
    $req->execute(array($cv_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_languages_exists_language($language){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `language` FROM `cv_languages` WHERE   `language` = ?");
    $req->execute(array($language));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_languages_exists_level($level){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `level` FROM `cv_languages` WHERE   `level` = ?");
    $req->execute(array($level));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_languages_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cv_languages` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_languages_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cv_languages` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cv_languages_is_id($id){
     return (is_id($id) )? true : false ;
}

function cv_languages_is_cv_id($cv_id){
     return true;
}

function cv_languages_is_language($language){
     return true;
}

function cv_languages_is_level($level){
     return true;
}

function cv_languages_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cv_languages_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cv_languages_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cv_languages_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cv_languages_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cv_languages_is_id($value)) ? true : false;
            break;
     case "cv_id":
            $is = (cv_languages_is_cv_id($value)) ? true : false;
            break;
     case "language":
            $is = (cv_languages_is_language($value)) ? true : false;
            break;
     case "level":
            $is = (cv_languages_is_level($value)) ? true : false;
            break;
     case "order_by":
            $is = (cv_languages_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cv_languages_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cv_languages_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cv_languages&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'cv_id':
                echo '<th>' . _tr(ucfirst('cv_id')) . '</th>';
                break;
case 'language':
                echo '<th>' . _tr(ucfirst('language')) . '</th>';
                break;
case 'level':
                echo '<th>' . _tr(ucfirst('level')) . '</th>';
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

function cv_languages_index_generate_column_body_td($cv_languages, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cv_languages&a=details&id=' . $cv_languages[$col] . '">' . $cv_languages[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
case 'cv_id':
                echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
case 'language':
                echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
case 'level':
                echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cv_languages&a=details&id=' . $cv_languages['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cv_languages&a=details_payement&id=' . $cv_languages['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_languages&a=edit&id=' . $cv_languages['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_languages&a=ok_delete&id=' . $cv_languages['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_languages&a=export_pdf&id=' . $cv_languages['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_languages&a=export_pdf&way=pdf&&id=' . $cv_languages['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cv_languages[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
