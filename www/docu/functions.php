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
# Fecha de creacion del documento: 2024-09-22 18:09:01 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-22 18:09:01 


// 

//function docu_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function docu_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("docu_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("docu"); // Obtener columnas de la tabla de la base de datos
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
function docu_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `controllers`,  `action`,  `language`,  `father_id`,  `title`,  `post`,  `h`,  `order_by`,  `status`   
    
    FROM `docu` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function docu_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `controllers`,  `action`,  `language`,  `father_id`,  `title`,  `post`,  `h`,  `order_by`,  `status`   
    FROM `docu` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function docu_edit($id ,  $controllers ,  $action ,  $language ,  $father_id ,  $title ,  $post ,  $h ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `controllers` =:controllers, `action` =:action, `language` =:language, `father_id` =:father_id, `title` =:title, `post` =:post, `h` =:h, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "controllers" =>$controllers ,  
 "action" =>$action ,  
 "language" =>$language ,  
 "father_id" =>$father_id ,  
 "title" =>$title ,  
 "post" =>$post ,  
 "h" =>$h ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function docu_add($controllers ,  $action ,  $language ,  $father_id ,  $title ,  $post ,  $h ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `docu` ( `id` ,   `controllers` ,   `action` ,   `language` ,   `father_id` ,   `title` ,   `post` ,   `h` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :controllers ,  :action ,  :language ,  :father_id ,  :title ,  :post ,  :h ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "controllers" => $controllers ,  
 "action" => $action ,  
 "language" => $language ,  
 "father_id" => $father_id ,  
 "title" => $title ,  
 "post" => $post ,  
 "h" => $h ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function docu_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `controllers`,  `action`,  `language`,  `father_id`,  `title`,  `post`,  `h`,  `order_by`,  `status`    
            FROM `docu` 
            WHERE `id` = :txt OR `id` like :txt
OR `controllers` like :txt
OR `action` like :txt
OR `language` like :txt
OR `father_id` like :txt
OR `title` like :txt
OR `post` like :txt
OR `h` like :txt
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

function docu_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (docu_list() as $key => $value) {
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
function docu_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `docu` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function docu_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `controllers`,  `action`,  `language`,  `father_id`,  `title`,  `post`,  `h`,  `order_by`,  `status`    FROM `docu` 

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

function docu_db_show_col_from_table($c) {
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
function docu_db_col_list_from_table($c){
    $list = array();
    foreach (docu_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function docu_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_controllers($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `controllers`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_action($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `action`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_language($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `language`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_father_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `father_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_post($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `post`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_h($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `h`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function docu_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            docu_update_id($id, $new_data);
            break;

        case "controllers":
            docu_update_controllers($id, $new_data);
            break;

        case "action":
            docu_update_action($id, $new_data);
            break;

        case "language":
            docu_update_language($id, $new_data);
            break;

        case "father_id":
            docu_update_father_id($id, $new_data);
            break;

        case "title":
            docu_update_title($id, $new_data);
            break;

        case "post":
            docu_update_post($id, $new_data);
            break;

        case "h":
            docu_update_h($id, $new_data);
            break;

        case "order_by":
            docu_update_order_by($id, $new_data);
            break;

        case "status":
            docu_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function docu_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `docu` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/docu/functions.php
// and comment here (this function)
function docu_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "controllers":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "action":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "language":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "father_id":
            //return docu_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "title":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "post":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "h":
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
function docu_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `docu` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_controllers($controllers){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controllers` FROM `docu` WHERE   `controllers` = ?");
    $req->execute(array($controllers));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_action($action){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `action` FROM `docu` WHERE   `action` = ?");
    $req->execute(array($action));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_language($language){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `language` FROM `docu` WHERE   `language` = ?");
    $req->execute(array($language));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_father_id($father_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `father_id` FROM `docu` WHERE   `father_id` = ?");
    $req->execute(array($father_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_title($title){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `docu` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_post($post){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `post` FROM `docu` WHERE   `post` = ?");
    $req->execute(array($post));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_h($h){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `h` FROM `docu` WHERE   `h` = ?");
    $req->execute(array($h));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `docu` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `docu` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function docu_is_id($id){
     return (is_id($id) )? true : false ;
}

function docu_is_controllers($controllers){
     return true;
}

function docu_is_action($action){
     return true;
}

function docu_is_language($language){
     return true;
}

function docu_is_father_id($father_id){
     return true;
}

function docu_is_title($title){
     return true;
}

function docu_is_post($post){
     return true;
}

function docu_is_h($h){
     return true;
}

function docu_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function docu_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function docu_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, docu_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function docu_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (docu_is_id($value)) ? true : false;
            break;
     case "controllers":
            $is = (docu_is_controllers($value)) ? true : false;
            break;
     case "action":
            $is = (docu_is_action($value)) ? true : false;
            break;
     case "language":
            $is = (docu_is_language($value)) ? true : false;
            break;
     case "father_id":
            $is = (docu_is_father_id($value)) ? true : false;
            break;
     case "title":
            $is = (docu_is_title($value)) ? true : false;
            break;
     case "post":
            $is = (docu_is_post($value)) ? true : false;
            break;
     case "h":
            $is = (docu_is_h($value)) ? true : false;
            break;
     case "order_by":
            $is = (docu_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (docu_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function docu_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=docu&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'controllers':
                echo '<th>' . _tr(ucfirst('controllers')) . '</th>';
                break;
case 'action':
                echo '<th>' . _tr(ucfirst('action')) . '</th>';
                break;
case 'language':
                echo '<th>' . _tr(ucfirst('language')) . '</th>';
                break;
case 'father_id':
                echo '<th>' . _tr(ucfirst('father_id')) . '</th>';
                break;
case 'title':
                echo '<th>' . _tr(ucfirst('title')) . '</th>';
                break;
case 'post':
                echo '<th>' . _tr(ucfirst('post')) . '</th>';
                break;
case 'h':
                echo '<th>' . _tr(ucfirst('h')) . '</th>';
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

function docu_index_generate_column_body_td($docu, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=docu&a=details&id=' . $docu[$col] . '">' . $docu[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'controllers':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'action':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'language':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'father_id':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'title':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'post':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'h':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($docu[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=docu&a=details&id=' . $docu['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=docu&a=details_payement&id=' . $docu['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docu&a=edit&id=' . $docu['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docu&a=ok_delete&id=' . $docu['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docu&a=export_pdf&id=' . $docu['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docu&a=export_pdf&way=pdf&&id=' . $docu['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($docu[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
