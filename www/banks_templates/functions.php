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
# Fecha de creacion del documento: 2024-09-16 12:09:32 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 12:09:32 


// 

//function banks_templates_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function banks_templates_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("banks_templates_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("banks_templates"); // Obtener columnas de la tabla de la base de datos
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
function banks_templates_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_templates` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_templates_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_templates` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_templates_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `banks_templates` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function banks_templates_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `template`,  `label`,  `description`,  `icon`,  `order_by`,  `status`   
    
    FROM `banks_templates` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function banks_templates_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `template`,  `label`,  `description`,  `icon`,  `order_by`,  `status`   
    FROM `banks_templates` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function banks_templates_edit($id ,  $template ,  $label ,  $description ,  $icon ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `template` =:template, `label` =:label, `description` =:description, `icon` =:icon, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "template" =>$template ,  
 "label" =>$label ,  
 "description" =>$description ,  
 "icon" =>$icon ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function banks_templates_add($template ,  $label ,  $description ,  $icon ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `banks_templates` ( `id` ,   `template` ,   `label` ,   `description` ,   `icon` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :template ,  :label ,  :description ,  :icon ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "template" => $template ,  
 "label" => $label ,  
 "description" => $description ,  
 "icon" => $icon ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function banks_templates_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `template`,  `label`,  `description`,  `icon`,  `order_by`,  `status`    
            FROM `banks_templates` 
            WHERE `id` = :txt OR `id` like :txt
OR `template` like :txt
OR `label` like :txt
OR `description` like :txt
OR `icon` like :txt
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

function banks_templates_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (banks_templates_list() as $key => $value) {
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
function banks_templates_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `banks_templates` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function banks_templates_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `template`,  `label`,  `description`,  `icon`,  `order_by`,  `status`    FROM `banks_templates` 

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

function banks_templates_db_show_col_from_table($c) {
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
function banks_templates_db_col_list_from_table($c){
    $list = array();
    foreach (banks_templates_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function banks_templates_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_templates_update_template($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `template`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_templates_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_templates_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_templates_update_icon($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `icon`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_templates_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function banks_templates_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `banks_templates` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function banks_templates_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            banks_templates_update_id($id, $new_data);
            break;

        case "template":
            banks_templates_update_template($id, $new_data);
            break;

        case "label":
            banks_templates_update_label($id, $new_data);
            break;

        case "description":
            banks_templates_update_description($id, $new_data);
            break;

        case "icon":
            banks_templates_update_icon($id, $new_data);
            break;

        case "order_by":
            banks_templates_update_order_by($id, $new_data);
            break;

        case "status":
            banks_templates_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function banks_templates_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `banks_templates` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/banks_templates/functions.php
// and comment here (this function)
function banks_templates_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "template":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "icon":
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
function banks_templates_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `banks_templates` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_templates_exists_template($template){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `template` FROM `banks_templates` WHERE   `template` = ?");
    $req->execute(array($template));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_templates_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `banks_templates` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_templates_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `banks_templates` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_templates_exists_icon($icon){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `icon` FROM `banks_templates` WHERE   `icon` = ?");
    $req->execute(array($icon));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_templates_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `banks_templates` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function banks_templates_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `banks_templates` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function banks_templates_is_id($id){
     return (is_id($id) )? true : false ;
}

function banks_templates_is_template($template){
     return true;
}

function banks_templates_is_label($label){
     return true;
}

function banks_templates_is_description($description){
     return true;
}

function banks_templates_is_icon($icon){
     return true;
}

function banks_templates_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function banks_templates_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function banks_templates_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, banks_templates_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function banks_templates_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (banks_templates_is_id($value)) ? true : false;
            break;
     case "template":
            $is = (banks_templates_is_template($value)) ? true : false;
            break;
     case "label":
            $is = (banks_templates_is_label($value)) ? true : false;
            break;
     case "description":
            $is = (banks_templates_is_description($value)) ? true : false;
            break;
     case "icon":
            $is = (banks_templates_is_icon($value)) ? true : false;
            break;
     case "order_by":
            $is = (banks_templates_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (banks_templates_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function banks_templates_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=banks_templates&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'template':
                echo '<th>' . _tr(ucfirst('template')) . '</th>';
                break;
case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'icon':
                echo '<th>' . _tr(ucfirst('icon')) . '</th>';
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

function banks_templates_index_generate_column_body_td($banks_templates, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=banks_templates&a=details&id=' . $banks_templates[$col] . '">' . $banks_templates[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
case 'template':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
case 'icon':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=banks_templates&a=details&id=' . $banks_templates['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=banks_templates&a=details_payement&id=' . $banks_templates['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_templates&a=edit&id=' . $banks_templates['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=banks_templates&a=ok_delete&id=' . $banks_templates['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_templates&a=export_pdf&id=' . $banks_templates['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=banks_templates&a=export_pdf&way=pdf&&id=' . $banks_templates['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($banks_templates[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
