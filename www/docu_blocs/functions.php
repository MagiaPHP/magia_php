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
# Fecha de creacion del documento: 2024-09-22 18:09:53 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-22 18:09:53 


// 

//function docu_blocs_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function docu_blocs_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("docu_blocs_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("docu_blocs"); // Obtener columnas de la tabla de la base de datos
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
function docu_blocs_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu_blocs` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_blocs_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu_blocs` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_blocs_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu_blocs` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_blocs_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `docu_id`,  `bloc`,  `title`,  `post`,  `h`,  `order_by`,  `status`   
    
    FROM `docu_blocs` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function docu_blocs_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `docu_id`,  `bloc`,  `title`,  `post`,  `h`,  `order_by`,  `status`   
    FROM `docu_blocs` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function docu_blocs_edit($id ,  $docu_id ,  $bloc ,  $title ,  $post ,  $h ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `docu_id` =:docu_id, `bloc` =:bloc, `title` =:title, `post` =:post, `h` =:h, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "docu_id" =>$docu_id ,  
 "bloc" =>$bloc ,  
 "title" =>$title ,  
 "post" =>$post ,  
 "h" =>$h ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function docu_blocs_add($docu_id ,  $bloc ,  $title ,  $post ,  $h ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `docu_blocs` ( `id` ,   `docu_id` ,   `bloc` ,   `title` ,   `post` ,   `h` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :docu_id ,  :bloc ,  :title ,  :post ,  :h ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "docu_id" => $docu_id ,  
 "bloc" => $bloc ,  
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
function docu_blocs_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `docu_id`,  `bloc`,  `title`,  `post`,  `h`,  `order_by`,  `status`    
            FROM `docu_blocs` 
            WHERE `id` = :txt OR `id` like :txt
OR `docu_id` like :txt
OR `bloc` like :txt
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

function docu_blocs_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (docu_blocs_list() as $key => $value) {
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
function docu_blocs_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `docu_blocs` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function docu_blocs_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `docu_id`,  `bloc`,  `title`,  `post`,  `h`,  `order_by`,  `status`    FROM `docu_blocs` 

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

function docu_blocs_db_show_col_from_table($c) {
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
function docu_blocs_db_col_list_from_table($c){
    $list = array();
    foreach (docu_blocs_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function docu_blocs_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_docu_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `docu_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_bloc($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `bloc`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_post($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `post`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_h($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `h`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_blocs_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_blocs` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function docu_blocs_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            docu_blocs_update_id($id, $new_data);
            break;

        case "docu_id":
            docu_blocs_update_docu_id($id, $new_data);
            break;

        case "bloc":
            docu_blocs_update_bloc($id, $new_data);
            break;

        case "title":
            docu_blocs_update_title($id, $new_data);
            break;

        case "post":
            docu_blocs_update_post($id, $new_data);
            break;

        case "h":
            docu_blocs_update_h($id, $new_data);
            break;

        case "order_by":
            docu_blocs_update_order_by($id, $new_data);
            break;

        case "status":
            docu_blocs_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function docu_blocs_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `docu_blocs` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/docu_blocs/functions.php
// and comment here (this function)
function docu_blocs_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "docu_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "bloc":
            //return _field_id("", $value);
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
function docu_blocs_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `docu_blocs` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_docu_id($docu_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `docu_id` FROM `docu_blocs` WHERE   `docu_id` = ?");
    $req->execute(array($docu_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_bloc($bloc){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `bloc` FROM `docu_blocs` WHERE   `bloc` = ?");
    $req->execute(array($bloc));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_title($title){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `docu_blocs` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_post($post){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `post` FROM `docu_blocs` WHERE   `post` = ?");
    $req->execute(array($post));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_h($h){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `h` FROM `docu_blocs` WHERE   `h` = ?");
    $req->execute(array($h));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `docu_blocs` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_blocs_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `docu_blocs` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function docu_blocs_is_id($id){
     return (is_id($id) )? true : false ;
}

function docu_blocs_is_docu_id($docu_id){
     return true;
}

function docu_blocs_is_bloc($bloc){
     return true;
}

function docu_blocs_is_title($title){
     return true;
}

function docu_blocs_is_post($post){
     return true;
}

function docu_blocs_is_h($h){
     return true;
}

function docu_blocs_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function docu_blocs_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function docu_blocs_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, docu_blocs_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function docu_blocs_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (docu_blocs_is_id($value)) ? true : false;
            break;
     case "docu_id":
            $is = (docu_blocs_is_docu_id($value)) ? true : false;
            break;
     case "bloc":
            $is = (docu_blocs_is_bloc($value)) ? true : false;
            break;
     case "title":
            $is = (docu_blocs_is_title($value)) ? true : false;
            break;
     case "post":
            $is = (docu_blocs_is_post($value)) ? true : false;
            break;
     case "h":
            $is = (docu_blocs_is_h($value)) ? true : false;
            break;
     case "order_by":
            $is = (docu_blocs_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (docu_blocs_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function docu_blocs_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=docu_blocs&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'docu_id':
                echo '<th>' . _tr(ucfirst('docu_id')) . '</th>';
                break;
case 'bloc':
                echo '<th>' . _tr(ucfirst('bloc')) . '</th>';
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

function docu_blocs_index_generate_column_body_td($docu_blocs, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=docu_blocs&a=details&id=' . $docu_blocs[$col] . '">' . $docu_blocs[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'docu_id':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'bloc':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'title':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'post':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'h':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=docu_blocs&a=details&id=' . $docu_blocs['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=docu_blocs&a=details_payement&id=' . $docu_blocs['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docu_blocs&a=edit&id=' . $docu_blocs['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docu_blocs&a=ok_delete&id=' . $docu_blocs['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docu_blocs&a=export_pdf&id=' . $docu_blocs['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docu_blocs&a=export_pdf&way=pdf&&id=' . $docu_blocs['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($docu_blocs[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
