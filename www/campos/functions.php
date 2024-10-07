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
# Fecha de creacion del documento: 2024-09-16 19:09:41 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-16 19:09:41 


// 

//function campos_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function campos_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("campos_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("campos"); // Obtener columnas de la tabla de la base de datos
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
function campos_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `campos` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function campos_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `campos` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function campos_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `campos` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function campos_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `base_datos`,  `tabla`,  `campo`,  `accion`,  `label`,  `tipo`,  `clase`,  `nombre`,  `identificador`,  `marca_agua`,  `valor`,  `solo_lectura`,  `obligatorio`,  `seleccionado`,  `desactivado`,  `orden`,  `estatus`   
    
    FROM `campos` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function campos_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `base_datos`,  `tabla`,  `campo`,  `accion`,  `label`,  `tipo`,  `clase`,  `nombre`,  `identificador`,  `marca_agua`,  `valor`,  `solo_lectura`,  `obligatorio`,  `seleccionado`,  `desactivado`,  `orden`,  `estatus`   
    FROM `campos` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function campos_edit($id ,  $base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus   ) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `base_datos` =:base_datos, `tabla` =:tabla, `campo` =:campo, `accion` =:accion, `label` =:label, `tipo` =:tipo, `clase` =:clase, `nombre` =:nombre, `identificador` =:identificador, `marca_agua` =:marca_agua, `valor` =:valor, `solo_lectura` =:solo_lectura, `obligatorio` =:obligatorio, `seleccionado` =:seleccionado, `desactivado` =:desactivado, `orden` =:orden, `estatus` =:estatus  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "base_datos" =>$base_datos ,  
 "tabla" =>$tabla ,  
 "campo" =>$campo ,  
 "accion" =>$accion ,  
 "label" =>$label ,  
 "tipo" =>$tipo ,  
 "clase" =>$clase ,  
 "nombre" =>$nombre ,  
 "identificador" =>$identificador ,  
 "marca_agua" =>$marca_agua ,  
 "valor" =>$valor ,  
 "solo_lectura" =>$solo_lectura ,  
 "obligatorio" =>$obligatorio ,  
 "seleccionado" =>$seleccionado ,  
 "desactivado" =>$desactivado ,  
 "orden" =>$orden ,  
 "estatus" =>$estatus ,  

));
}

function campos_add($base_datos ,  $tabla ,  $campo ,  $accion ,  $label ,  $tipo ,  $clase ,  $nombre ,  $identificador ,  $marca_agua ,  $valor ,  $solo_lectura ,  $obligatorio ,  $seleccionado ,  $desactivado ,  $orden ,  $estatus   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `campos` ( `id` ,   `base_datos` ,   `tabla` ,   `campo` ,   `accion` ,   `label` ,   `tipo` ,   `clase` ,   `nombre` ,   `identificador` ,   `marca_agua` ,   `valor` ,   `solo_lectura` ,   `obligatorio` ,   `seleccionado` ,   `desactivado` ,   `orden` ,   `estatus`   )
                                       VALUES  (:id ,  :base_datos ,  :tabla ,  :campo ,  :accion ,  :label ,  :tipo ,  :clase ,  :nombre ,  :identificador ,  :marca_agua ,  :valor ,  :solo_lectura ,  :obligatorio ,  :seleccionado ,  :desactivado ,  :orden ,  :estatus   ) ");

    $req->execute(array(

 "id" => null ,  
 "base_datos" => $base_datos ,  
 "tabla" => $tabla ,  
 "campo" => $campo ,  
 "accion" => $accion ,  
 "label" => $label ,  
 "tipo" => $tipo ,  
 "clase" => $clase ,  
 "nombre" => $nombre ,  
 "identificador" => $identificador ,  
 "marca_agua" => $marca_agua ,  
 "valor" => $valor ,  
 "solo_lectura" => $solo_lectura ,  
 "obligatorio" => $obligatorio ,  
 "seleccionado" => $seleccionado ,  
 "desactivado" => $desactivado ,  
 "orden" => $orden ,  
 "estatus" => $estatus   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function campos_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `base_datos`,  `tabla`,  `campo`,  `accion`,  `label`,  `tipo`,  `clase`,  `nombre`,  `identificador`,  `marca_agua`,  `valor`,  `solo_lectura`,  `obligatorio`,  `seleccionado`,  `desactivado`,  `orden`,  `estatus`    
            FROM `campos` 
            WHERE `id` = :txt OR `id` like :txt
OR `base_datos` like :txt
OR `tabla` like :txt
OR `campo` like :txt
OR `accion` like :txt
OR `label` like :txt
OR `tipo` like :txt
OR `clase` like :txt
OR `nombre` like :txt
OR `identificador` like :txt
OR `marca_agua` like :txt
OR `valor` like :txt
OR `solo_lectura` like :txt
OR `obligatorio` like :txt
OR `seleccionado` like :txt
OR `desactivado` like :txt
OR `orden` like :txt
OR `estatus` like :txt
 
        

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

function campos_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (campos_list() as $key => $value) {
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
function campos_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `campos` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function campos_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `base_datos`,  `tabla`,  `campo`,  `accion`,  `label`,  `tipo`,  `clase`,  `nombre`,  `identificador`,  `marca_agua`,  `valor`,  `solo_lectura`,  `obligatorio`,  `seleccionado`,  `desactivado`,  `orden`,  `estatus`    FROM `campos` 

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

function campos_db_show_col_from_table($c) {
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
function campos_db_col_list_from_table($c){
    $list = array();
    foreach (campos_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function campos_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_base_datos($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `base_datos`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_tabla($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `tabla`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_campo($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `campo`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_accion($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `accion`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_label($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `label`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_tipo($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `tipo`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_clase($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `clase`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_nombre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `nombre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_identificador($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `identificador`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_marca_agua($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `marca_agua`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_valor($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `valor`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_solo_lectura($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `solo_lectura`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_obligatorio($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `obligatorio`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_seleccionado($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `seleccionado`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_desactivado($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `desactivado`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_orden($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `orden`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function campos_update_estatus($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `campos` SET `estatus`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function campos_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            campos_update_id($id, $new_data);
            break;

        case "base_datos":
            campos_update_base_datos($id, $new_data);
            break;

        case "tabla":
            campos_update_tabla($id, $new_data);
            break;

        case "campo":
            campos_update_campo($id, $new_data);
            break;

        case "accion":
            campos_update_accion($id, $new_data);
            break;

        case "label":
            campos_update_label($id, $new_data);
            break;

        case "tipo":
            campos_update_tipo($id, $new_data);
            break;

        case "clase":
            campos_update_clase($id, $new_data);
            break;

        case "nombre":
            campos_update_nombre($id, $new_data);
            break;

        case "identificador":
            campos_update_identificador($id, $new_data);
            break;

        case "marca_agua":
            campos_update_marca_agua($id, $new_data);
            break;

        case "valor":
            campos_update_valor($id, $new_data);
            break;

        case "solo_lectura":
            campos_update_solo_lectura($id, $new_data);
            break;

        case "obligatorio":
            campos_update_obligatorio($id, $new_data);
            break;

        case "seleccionado":
            campos_update_seleccionado($id, $new_data);
            break;

        case "desactivado":
            campos_update_desactivado($id, $new_data);
            break;

        case "orden":
            campos_update_orden($id, $new_data);
            break;

        case "estatus":
            campos_update_estatus($id, $new_data);
            break;


        default:
            break;
    }
}
//
function campos_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `campos` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/campos/functions.php
// and comment here (this function)
function campos_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "base_datos":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "tabla":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "campo":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "accion":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "label":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "tipo":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "clase":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "nombre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "identificador":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "marca_agua":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "valor":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "solo_lectura":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "obligatorio":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "seleccionado":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "desactivado":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "orden":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "estatus":
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
function campos_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `campos` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_base_datos($base_datos){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `base_datos` FROM `campos` WHERE   `base_datos` = ?");
    $req->execute(array($base_datos));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_tabla($tabla){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tabla` FROM `campos` WHERE   `tabla` = ?");
    $req->execute(array($tabla));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_campo($campo){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `campo` FROM `campos` WHERE   `campo` = ?");
    $req->execute(array($campo));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_accion($accion){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `accion` FROM `campos` WHERE   `accion` = ?");
    $req->execute(array($accion));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_label($label){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `label` FROM `campos` WHERE   `label` = ?");
    $req->execute(array($label));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_tipo($tipo){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tipo` FROM `campos` WHERE   `tipo` = ?");
    $req->execute(array($tipo));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_clase($clase){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `clase` FROM `campos` WHERE   `clase` = ?");
    $req->execute(array($clase));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_nombre($nombre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `nombre` FROM `campos` WHERE   `nombre` = ?");
    $req->execute(array($nombre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_identificador($identificador){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `identificador` FROM `campos` WHERE   `identificador` = ?");
    $req->execute(array($identificador));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_marca_agua($marca_agua){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `marca_agua` FROM `campos` WHERE   `marca_agua` = ?");
    $req->execute(array($marca_agua));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_valor($valor){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `valor` FROM `campos` WHERE   `valor` = ?");
    $req->execute(array($valor));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_solo_lectura($solo_lectura){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `solo_lectura` FROM `campos` WHERE   `solo_lectura` = ?");
    $req->execute(array($solo_lectura));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_obligatorio($obligatorio){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `obligatorio` FROM `campos` WHERE   `obligatorio` = ?");
    $req->execute(array($obligatorio));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_seleccionado($seleccionado){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `seleccionado` FROM `campos` WHERE   `seleccionado` = ?");
    $req->execute(array($seleccionado));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_desactivado($desactivado){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `desactivado` FROM `campos` WHERE   `desactivado` = ?");
    $req->execute(array($desactivado));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_orden($orden){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `orden` FROM `campos` WHERE   `orden` = ?");
    $req->execute(array($orden));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function campos_exists_estatus($estatus){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `estatus` FROM `campos` WHERE   `estatus` = ?");
    $req->execute(array($estatus));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function campos_is_id($id){
     return (is_id($id) )? true : false ;
}

function campos_is_base_datos($base_datos){
     return true;
}

function campos_is_tabla($tabla){
     return true;
}

function campos_is_campo($campo){
     return true;
}

function campos_is_accion($accion){
     return true;
}

function campos_is_label($label){
     return true;
}

function campos_is_tipo($tipo){
     return true;
}

function campos_is_clase($clase){
     return true;
}

function campos_is_nombre($nombre){
     return true;
}

function campos_is_identificador($identificador){
     return true;
}

function campos_is_marca_agua($marca_agua){
     return true;
}

function campos_is_valor($valor){
     return true;
}

function campos_is_solo_lectura($solo_lectura){
     return true;
}

function campos_is_obligatorio($obligatorio){
     return true;
}

function campos_is_seleccionado($seleccionado){
     return true;
}

function campos_is_desactivado($desactivado){
     return true;
}

function campos_is_orden($orden){
     return true;
}

function campos_is_estatus($estatus){
     return true;
}


//
//
function campos_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, campos_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function campos_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (campos_is_id($value)) ? true : false;
            break;
     case "base_datos":
            $is = (campos_is_base_datos($value)) ? true : false;
            break;
     case "tabla":
            $is = (campos_is_tabla($value)) ? true : false;
            break;
     case "campo":
            $is = (campos_is_campo($value)) ? true : false;
            break;
     case "accion":
            $is = (campos_is_accion($value)) ? true : false;
            break;
     case "label":
            $is = (campos_is_label($value)) ? true : false;
            break;
     case "tipo":
            $is = (campos_is_tipo($value)) ? true : false;
            break;
     case "clase":
            $is = (campos_is_clase($value)) ? true : false;
            break;
     case "nombre":
            $is = (campos_is_nombre($value)) ? true : false;
            break;
     case "identificador":
            $is = (campos_is_identificador($value)) ? true : false;
            break;
     case "marca_agua":
            $is = (campos_is_marca_agua($value)) ? true : false;
            break;
     case "valor":
            $is = (campos_is_valor($value)) ? true : false;
            break;
     case "solo_lectura":
            $is = (campos_is_solo_lectura($value)) ? true : false;
            break;
     case "obligatorio":
            $is = (campos_is_obligatorio($value)) ? true : false;
            break;
     case "seleccionado":
            $is = (campos_is_seleccionado($value)) ? true : false;
            break;
     case "desactivado":
            $is = (campos_is_desactivado($value)) ? true : false;
            break;
     case "orden":
            $is = (campos_is_orden($value)) ? true : false;
            break;
     case "estatus":
            $is = (campos_is_estatus($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function campos_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=campos&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'base_datos':
                echo '<th>' . _tr(ucfirst('base_datos')) . '</th>';
                break;
case 'tabla':
                echo '<th>' . _tr(ucfirst('tabla')) . '</th>';
                break;
case 'campo':
                echo '<th>' . _tr(ucfirst('campo')) . '</th>';
                break;
case 'accion':
                echo '<th>' . _tr(ucfirst('accion')) . '</th>';
                break;
case 'label':
                echo '<th>' . _tr(ucfirst('label')) . '</th>';
                break;
case 'tipo':
                echo '<th>' . _tr(ucfirst('tipo')) . '</th>';
                break;
case 'clase':
                echo '<th>' . _tr(ucfirst('clase')) . '</th>';
                break;
case 'nombre':
                echo '<th>' . _tr(ucfirst('nombre')) . '</th>';
                break;
case 'identificador':
                echo '<th>' . _tr(ucfirst('identificador')) . '</th>';
                break;
case 'marca_agua':
                echo '<th>' . _tr(ucfirst('marca_agua')) . '</th>';
                break;
case 'valor':
                echo '<th>' . _tr(ucfirst('valor')) . '</th>';
                break;
case 'solo_lectura':
                echo '<th>' . _tr(ucfirst('solo_lectura')) . '</th>';
                break;
case 'obligatorio':
                echo '<th>' . _tr(ucfirst('obligatorio')) . '</th>';
                break;
case 'seleccionado':
                echo '<th>' . _tr(ucfirst('seleccionado')) . '</th>';
                break;
case 'desactivado':
                echo '<th>' . _tr(ucfirst('desactivado')) . '</th>';
                break;
case 'orden':
                echo '<th>' . _tr(ucfirst('orden')) . '</th>';
                break;
case 'estatus':
                echo '<th>' . _tr(ucfirst('estatus')) . '</th>';
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

function campos_index_generate_column_body_td($campos, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=campos&a=details&id=' . $campos[$col] . '">' . $campos[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'base_datos':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'tabla':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'campo':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'accion':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'label':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'tipo':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'clase':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'nombre':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'identificador':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'marca_agua':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'valor':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'solo_lectura':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'obligatorio':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'seleccionado':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'desactivado':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'orden':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
case 'estatus':
                echo '<td>' . ($campos[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=campos&a=details&id=' . $campos['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=campos&a=details_payement&id=' . $campos['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=campos&a=edit&id=' . $campos['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=campos&a=ok_delete&id=' . $campos['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=campos&a=export_pdf&id=' . $campos['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=campos&a=export_pdf&way=pdf&&id=' . $campos['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($campos[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
