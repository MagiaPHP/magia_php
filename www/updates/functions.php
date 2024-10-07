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
# Fecha de creacion del documento: 2024-09-23 09:09:43 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-23 09:09:43 


// 

//function updates_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function updates_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("updates_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("updates"); // Obtener columnas de la tabla de la base de datos
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
function updates_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `updates` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function updates_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `updates` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function updates_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `updates` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function updates_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `code`,  `date`,  `controller`,  `version`,  `name`,  `description`,  `code_install`,  `code_uninstall`,  `code_check`,  `installed`,  `pass`,  `order_by`,  `status`   
    
    FROM `updates` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function updates_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `code`,  `date`,  `controller`,  `version`,  `name`,  `description`,  `code_install`,  `code_uninstall`,  `code_check`,  `installed`,  `pass`,  `order_by`,  `status`   
    FROM `updates` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function updates_edit($id ,  $code ,  $date ,  $controller ,  $version ,  $name ,  $description ,  $code_install ,  $code_uninstall ,  $code_check ,  $installed ,  $pass ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `code` =:code, `date` =:date, `controller` =:controller, `version` =:version, `name` =:name, `description` =:description, `code_install` =:code_install, `code_uninstall` =:code_uninstall, `code_check` =:code_check, `installed` =:installed, `pass` =:pass, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "code" =>$code ,  
 "date" =>$date ,  
 "controller" =>$controller ,  
 "version" =>$version ,  
 "name" =>$name ,  
 "description" =>$description ,  
 "code_install" =>$code_install ,  
 "code_uninstall" =>$code_uninstall ,  
 "code_check" =>$code_check ,  
 "installed" =>$installed ,  
 "pass" =>$pass ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function updates_add($code ,  $date ,  $controller ,  $version ,  $name ,  $description ,  $code_install ,  $code_uninstall ,  $code_check ,  $installed ,  $pass ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `updates` ( `id` ,   `code` ,   `date` ,   `controller` ,   `version` ,   `name` ,   `description` ,   `code_install` ,   `code_uninstall` ,   `code_check` ,   `installed` ,   `pass` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :date ,  :controller ,  :version ,  :name ,  :description ,  :code_install ,  :code_uninstall ,  :code_check ,  :installed ,  :pass ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "code" => $code ,  
 "date" => $date ,  
 "controller" => $controller ,  
 "version" => $version ,  
 "name" => $name ,  
 "description" => $description ,  
 "code_install" => $code_install ,  
 "code_uninstall" => $code_uninstall ,  
 "code_check" => $code_check ,  
 "installed" => $installed ,  
 "pass" => $pass ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function updates_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `code`,  `date`,  `controller`,  `version`,  `name`,  `description`,  `code_install`,  `code_uninstall`,  `code_check`,  `installed`,  `pass`,  `order_by`,  `status`    
            FROM `updates` 
            WHERE `id` = :txt OR `id` like :txt
OR `code` like :txt
OR `date` like :txt
OR `controller` like :txt
OR `version` like :txt
OR `name` like :txt
OR `description` like :txt
OR `code_install` like :txt
OR `code_uninstall` like :txt
OR `code_check` like :txt
OR `installed` like :txt
OR `pass` like :txt
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

function updates_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (updates_list() as $key => $value) {
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
function updates_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `updates` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function updates_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `code`,  `date`,  `controller`,  `version`,  `name`,  `description`,  `code_install`,  `code_uninstall`,  `code_check`,  `installed`,  `pass`,  `order_by`,  `status`    FROM `updates` 

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

function updates_db_show_col_from_table($c) {
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
function updates_db_col_list_from_table($c){
    $list = array();
    foreach (updates_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function updates_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_controller($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `controller`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_version($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `version`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_code_install($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `code_install`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_code_uninstall($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `code_uninstall`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_code_check($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `code_check`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_installed($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `installed`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_pass($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `pass`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function updates_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `updates` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function updates_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            updates_update_id($id, $new_data);
            break;

        case "code":
            updates_update_code($id, $new_data);
            break;

        case "date":
            updates_update_date($id, $new_data);
            break;

        case "controller":
            updates_update_controller($id, $new_data);
            break;

        case "version":
            updates_update_version($id, $new_data);
            break;

        case "name":
            updates_update_name($id, $new_data);
            break;

        case "description":
            updates_update_description($id, $new_data);
            break;

        case "code_install":
            updates_update_code_install($id, $new_data);
            break;

        case "code_uninstall":
            updates_update_code_uninstall($id, $new_data);
            break;

        case "code_check":
            updates_update_code_check($id, $new_data);
            break;

        case "installed":
            updates_update_installed($id, $new_data);
            break;

        case "pass":
            updates_update_pass($id, $new_data);
            break;

        case "order_by":
            updates_update_order_by($id, $new_data);
            break;

        case "status":
            updates_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function updates_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `updates` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/updates/functions.php
// and comment here (this function)
function updates_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "controller":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "version":
            //return _field_id("", $value);
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
        case "code_install":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code_uninstall":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code_check":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "installed":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "pass":
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
function updates_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `updates` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `updates` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `updates` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_controller($controller){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `controller` FROM `updates` WHERE   `controller` = ?");
    $req->execute(array($controller));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_version($version){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `version` FROM `updates` WHERE   `version` = ?");
    $req->execute(array($version));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `updates` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_description($description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `description` FROM `updates` WHERE   `description` = ?");
    $req->execute(array($description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_code_install($code_install){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code_install` FROM `updates` WHERE   `code_install` = ?");
    $req->execute(array($code_install));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_code_uninstall($code_uninstall){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code_uninstall` FROM `updates` WHERE   `code_uninstall` = ?");
    $req->execute(array($code_uninstall));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_code_check($code_check){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code_check` FROM `updates` WHERE   `code_check` = ?");
    $req->execute(array($code_check));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_installed($installed){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `installed` FROM `updates` WHERE   `installed` = ?");
    $req->execute(array($installed));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_pass($pass){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `pass` FROM `updates` WHERE   `pass` = ?");
    $req->execute(array($pass));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `updates` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function updates_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `updates` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function updates_is_id($id){
     return (is_id($id) )? true : false ;
}

function updates_is_code($code){
     return true;
}

function updates_is_date($date){
     return true;
}

function updates_is_controller($controller){
     return true;
}

function updates_is_version($version){
     return true;
}

function updates_is_name($name){
     return true;
}

function updates_is_description($description){
     return true;
}

function updates_is_code_install($code_install){
     return true;
}

function updates_is_code_uninstall($code_uninstall){
     return true;
}

function updates_is_code_check($code_check){
     return true;
}

function updates_is_installed($installed){
     return true;
}

function updates_is_pass($pass){
     return true;
}

function updates_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function updates_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function updates_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, updates_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function updates_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (updates_is_id($value)) ? true : false;
            break;
     case "code":
            $is = (updates_is_code($value)) ? true : false;
            break;
     case "date":
            $is = (updates_is_date($value)) ? true : false;
            break;
     case "controller":
            $is = (updates_is_controller($value)) ? true : false;
            break;
     case "version":
            $is = (updates_is_version($value)) ? true : false;
            break;
     case "name":
            $is = (updates_is_name($value)) ? true : false;
            break;
     case "description":
            $is = (updates_is_description($value)) ? true : false;
            break;
     case "code_install":
            $is = (updates_is_code_install($value)) ? true : false;
            break;
     case "code_uninstall":
            $is = (updates_is_code_uninstall($value)) ? true : false;
            break;
     case "code_check":
            $is = (updates_is_code_check($value)) ? true : false;
            break;
     case "installed":
            $is = (updates_is_installed($value)) ? true : false;
            break;
     case "pass":
            $is = (updates_is_pass($value)) ? true : false;
            break;
     case "order_by":
            $is = (updates_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (updates_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function updates_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=updates&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'controller':
                echo '<th>' . _tr(ucfirst('controller')) . '</th>';
                break;
case 'version':
                echo '<th>' . _tr(ucfirst('version')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'description':
                echo '<th>' . _tr(ucfirst('description')) . '</th>';
                break;
case 'code_install':
                echo '<th>' . _tr(ucfirst('code_install')) . '</th>';
                break;
case 'code_uninstall':
                echo '<th>' . _tr(ucfirst('code_uninstall')) . '</th>';
                break;
case 'code_check':
                echo '<th>' . _tr(ucfirst('code_check')) . '</th>';
                break;
case 'installed':
                echo '<th>' . _tr(ucfirst('installed')) . '</th>';
                break;
case 'pass':
                echo '<th>' . _tr(ucfirst('pass')) . '</th>';
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

function updates_index_generate_column_body_td($updates, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=updates&a=details&id=' . $updates[$col] . '">' . $updates[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'controller':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'version':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'description':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'code_install':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'code_uninstall':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'code_check':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'installed':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'pass':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($updates[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=updates&a=details&id=' . $updates['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=updates&a=details_payement&id=' . $updates['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=updates&a=edit&id=' . $updates['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=updates&a=ok_delete&id=' . $updates['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=updates&a=export_pdf&id=' . $updates['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=updates&a=export_pdf&way=pdf&&id=' . $updates['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($updates[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
