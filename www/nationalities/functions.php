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
# Fecha de creacion del documento: 2024-09-27 12:09:58 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-27 12:09:58 


// 

//function nationalities_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function nationalities_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("nationalities_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("nationalities"); // Obtener columnas de la tabla de la base de datos
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
function nationalities_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `nationalities` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function nationalities_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `nationalities` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function nationalities_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `nationalities` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function nationalities_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `num_code`,  `alpha_2_code`,  `alpha_3_code`,  `en_short_name`,  `nationality`,  `order_by`,  `status`   
    
    FROM `nationalities` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function nationalities_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `num_code`,  `alpha_2_code`,  `alpha_3_code`,  `en_short_name`,  `nationality`,  `order_by`,  `status`   
    FROM `nationalities` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function nationalities_edit($id ,  $num_code ,  $alpha_2_code ,  $alpha_3_code ,  $en_short_name ,  $nationality ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `num_code` =:num_code, `alpha_2_code` =:alpha_2_code, `alpha_3_code` =:alpha_3_code, `en_short_name` =:en_short_name, `nationality` =:nationality, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "num_code" =>$num_code ,  
 "alpha_2_code" =>$alpha_2_code ,  
 "alpha_3_code" =>$alpha_3_code ,  
 "en_short_name" =>$en_short_name ,  
 "nationality" =>$nationality ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function nationalities_add($num_code ,  $alpha_2_code ,  $alpha_3_code ,  $en_short_name ,  $nationality ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `nationalities` ( `id` ,   `num_code` ,   `alpha_2_code` ,   `alpha_3_code` ,   `en_short_name` ,   `nationality` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :num_code ,  :alpha_2_code ,  :alpha_3_code ,  :en_short_name ,  :nationality ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "num_code" => $num_code ,  
 "alpha_2_code" => $alpha_2_code ,  
 "alpha_3_code" => $alpha_3_code ,  
 "en_short_name" => $en_short_name ,  
 "nationality" => $nationality ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function nationalities_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `num_code`,  `alpha_2_code`,  `alpha_3_code`,  `en_short_name`,  `nationality`,  `order_by`,  `status`    
            FROM `nationalities` 
            WHERE `id` = :txt OR `id` like :txt
OR `num_code` like :txt
OR `alpha_2_code` like :txt
OR `alpha_3_code` like :txt
OR `en_short_name` like :txt
OR `nationality` like :txt
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

function nationalities_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (nationalities_list() as $key => $value) {
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
function nationalities_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `nationalities` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function nationalities_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `num_code`,  `alpha_2_code`,  `alpha_3_code`,  `en_short_name`,  `nationality`,  `order_by`,  `status`    FROM `nationalities` 

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

function nationalities_db_show_col_from_table($c) {
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
function nationalities_db_col_list_from_table($c){
    $list = array();
    foreach (nationalities_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function nationalities_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_num_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `num_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_alpha_2_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `alpha_2_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_alpha_3_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `alpha_3_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_en_short_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `en_short_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_nationality($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `nationality`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function nationalities_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `nationalities` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function nationalities_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            nationalities_update_id($id, $new_data);
            break;

        case "num_code":
            nationalities_update_num_code($id, $new_data);
            break;

        case "alpha_2_code":
            nationalities_update_alpha_2_code($id, $new_data);
            break;

        case "alpha_3_code":
            nationalities_update_alpha_3_code($id, $new_data);
            break;

        case "en_short_name":
            nationalities_update_en_short_name($id, $new_data);
            break;

        case "nationality":
            nationalities_update_nationality($id, $new_data);
            break;

        case "order_by":
            nationalities_update_order_by($id, $new_data);
            break;

        case "status":
            nationalities_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function nationalities_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `nationalities` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/nationalities/functions.php
// and comment here (this function)
function nationalities_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "num_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "alpha_2_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "alpha_3_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "en_short_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "nationality":
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
function nationalities_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `nationalities` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_num_code($num_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `num_code` FROM `nationalities` WHERE   `num_code` = ?");
    $req->execute(array($num_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_alpha_2_code($alpha_2_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `alpha_2_code` FROM `nationalities` WHERE   `alpha_2_code` = ?");
    $req->execute(array($alpha_2_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_alpha_3_code($alpha_3_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `alpha_3_code` FROM `nationalities` WHERE   `alpha_3_code` = ?");
    $req->execute(array($alpha_3_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_en_short_name($en_short_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `en_short_name` FROM `nationalities` WHERE   `en_short_name` = ?");
    $req->execute(array($en_short_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_nationality($nationality){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `nationality` FROM `nationalities` WHERE   `nationality` = ?");
    $req->execute(array($nationality));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `nationalities` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function nationalities_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `nationalities` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function nationalities_is_id($id){
     return (is_id($id) )? true : false ;
}

function nationalities_is_num_code($num_code){
     return true;
}

function nationalities_is_alpha_2_code($alpha_2_code){
     return true;
}

function nationalities_is_alpha_3_code($alpha_3_code){
     return true;
}

function nationalities_is_en_short_name($en_short_name){
     return true;
}

function nationalities_is_nationality($nationality){
     return true;
}

function nationalities_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function nationalities_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function nationalities_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, nationalities_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function nationalities_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (nationalities_is_id($value)) ? true : false;
            break;
     case "num_code":
            $is = (nationalities_is_num_code($value)) ? true : false;
            break;
     case "alpha_2_code":
            $is = (nationalities_is_alpha_2_code($value)) ? true : false;
            break;
     case "alpha_3_code":
            $is = (nationalities_is_alpha_3_code($value)) ? true : false;
            break;
     case "en_short_name":
            $is = (nationalities_is_en_short_name($value)) ? true : false;
            break;
     case "nationality":
            $is = (nationalities_is_nationality($value)) ? true : false;
            break;
     case "order_by":
            $is = (nationalities_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (nationalities_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function nationalities_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=nationalities&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'num_code':
                echo '<th>' . _tr(ucfirst('num_code')) . '</th>';
                break;
case 'alpha_2_code':
                echo '<th>' . _tr(ucfirst('alpha_2_code')) . '</th>';
                break;
case 'alpha_3_code':
                echo '<th>' . _tr(ucfirst('alpha_3_code')) . '</th>';
                break;
case 'en_short_name':
                echo '<th>' . _tr(ucfirst('en_short_name')) . '</th>';
                break;
case 'nationality':
                echo '<th>' . _tr(ucfirst('nationality')) . '</th>';
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

function nationalities_index_generate_column_body_td($nationalities, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=nationalities&a=details&id=' . $nationalities[$col] . '">' . $nationalities[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'num_code':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'alpha_2_code':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'alpha_3_code':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'en_short_name':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'nationality':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=nationalities&a=details&id=' . $nationalities['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=nationalities&a=details_payement&id=' . $nationalities['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=nationalities&a=edit&id=' . $nationalities['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=nationalities&a=ok_delete&id=' . $nationalities['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=nationalities&a=export_pdf&id=' . $nationalities['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=nationalities&a=export_pdf&way=pdf&&id=' . $nationalities['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($nationalities[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
