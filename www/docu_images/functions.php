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
# Fecha de creacion del documento: 2024-09-22 18:09:50 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-22 18:09:50 


// 

//function docu_images_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function docu_images_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("docu_images_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("docu_images"); // Obtener columnas de la tabla de la base de datos
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
function docu_images_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu_images` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_images_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu_images` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_images_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `docu_images` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function docu_images_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `docu_id`,  `bloc_id`,  `image`,  `order_by`,  `status`   
    
    FROM `docu_images` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function docu_images_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `docu_id`,  `bloc_id`,  `image`,  `order_by`,  `status`   
    FROM `docu_images` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function docu_images_edit($id ,  $docu_id ,  $bloc_id ,  $image ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `docu_id` =:docu_id, `bloc_id` =:bloc_id, `image` =:image, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "docu_id" =>$docu_id ,  
 "bloc_id" =>$bloc_id ,  
 "image" =>$image ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function docu_images_add($docu_id ,  $bloc_id ,  $image ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `docu_images` ( `id` ,   `docu_id` ,   `bloc_id` ,   `image` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :docu_id ,  :bloc_id ,  :image ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "docu_id" => $docu_id ,  
 "bloc_id" => $bloc_id ,  
 "image" => $image ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function docu_images_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `docu_id`,  `bloc_id`,  `image`,  `order_by`,  `status`    
            FROM `docu_images` 
            WHERE `id` = :txt OR `id` like :txt
OR `docu_id` like :txt
OR `bloc_id` like :txt
OR `image` like :txt
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

function docu_images_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (docu_images_list() as $key => $value) {
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
function docu_images_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `docu_images` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function docu_images_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `docu_id`,  `bloc_id`,  `image`,  `order_by`,  `status`    FROM `docu_images` 

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

function docu_images_db_show_col_from_table($c) {
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
function docu_images_db_col_list_from_table($c){
    $list = array();
    foreach (docu_images_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function docu_images_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_images_update_docu_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `docu_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_images_update_bloc_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `bloc_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_images_update_image($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `image`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_images_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function docu_images_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `docu_images` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function docu_images_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            docu_images_update_id($id, $new_data);
            break;

        case "docu_id":
            docu_images_update_docu_id($id, $new_data);
            break;

        case "bloc_id":
            docu_images_update_bloc_id($id, $new_data);
            break;

        case "image":
            docu_images_update_image($id, $new_data);
            break;

        case "order_by":
            docu_images_update_order_by($id, $new_data);
            break;

        case "status":
            docu_images_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function docu_images_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `docu_images` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/docu_images/functions.php
// and comment here (this function)
function docu_images_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "docu_id":
            //return docu_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "bloc_id":
            //return docu_blocs_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "image":
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
function docu_images_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `docu_images` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_images_exists_docu_id($docu_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `docu_id` FROM `docu_images` WHERE   `docu_id` = ?");
    $req->execute(array($docu_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_images_exists_bloc_id($bloc_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `bloc_id` FROM `docu_images` WHERE   `bloc_id` = ?");
    $req->execute(array($bloc_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_images_exists_image($image){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `image` FROM `docu_images` WHERE   `image` = ?");
    $req->execute(array($image));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_images_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `docu_images` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function docu_images_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `docu_images` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function docu_images_is_id($id){
     return (is_id($id) )? true : false ;
}

function docu_images_is_docu_id($docu_id){
     return true;
}

function docu_images_is_bloc_id($bloc_id){
     return true;
}

function docu_images_is_image($image){
     return true;
}

function docu_images_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function docu_images_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function docu_images_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, docu_images_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function docu_images_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (docu_images_is_id($value)) ? true : false;
            break;
     case "docu_id":
            $is = (docu_images_is_docu_id($value)) ? true : false;
            break;
     case "bloc_id":
            $is = (docu_images_is_bloc_id($value)) ? true : false;
            break;
     case "image":
            $is = (docu_images_is_image($value)) ? true : false;
            break;
     case "order_by":
            $is = (docu_images_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (docu_images_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function docu_images_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=docu_images&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'docu_id':
                echo '<th>' . _tr(ucfirst('docu_id')) . '</th>';
                break;
case 'bloc_id':
                echo '<th>' . _tr(ucfirst('bloc_id')) . '</th>';
                break;
case 'image':
                echo '<th>' . _tr(ucfirst('image')) . '</th>';
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

function docu_images_index_generate_column_body_td($docu_images, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=docu_images&a=details&id=' . $docu_images[$col] . '">' . $docu_images[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
case 'docu_id':
                echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
case 'bloc_id':
                echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
case 'image':
                echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=docu_images&a=details&id=' . $docu_images['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=docu_images&a=details_payement&id=' . $docu_images['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docu_images&a=edit&id=' . $docu_images['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=docu_images&a=ok_delete&id=' . $docu_images['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docu_images&a=export_pdf&id=' . $docu_images['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=docu_images&a=export_pdf&way=pdf&&id=' . $docu_images['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($docu_images[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
