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
# Fecha de creacion del documento: 2024-10-02 17:10:10 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-02 17:10:10 


// 

//function addresses_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function addresses_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("addresses_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("addresses"); // Obtener columnas de la tabla de la base de datos
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
function addresses_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `addresses` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `addresses` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `addresses` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function addresses_list($start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'contact_id',  'name',  'address',  'number',  'postcode',  'barrio',  'sector',  'ref',  'city',  'province',  'region',  'country',  'code',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `name`,  `address`,  `number`,  `postcode`,  `barrio`,  `sector`,  `ref`,  `city`,  `province`,  `region`,  `country`,  `code`,  `status`   
    
    FROM `addresses` 
    
    ORDER BY $order_col $order_way 
    
    Limit  $limit OFFSET $start  ";
    
    $query = $db->prepare($sql);                
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function addresses_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `contact_id`,  `name`,  `address`,  `number`,  `postcode`,  `barrio`,  `sector`,  `ref`,  `city`,  `province`,  `region`,  `country`,  `code`,  `status`   
    FROM 
        `addresses` 
        WHERE 
            `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function addresses_edit($id ,  $contact_id ,  $name ,  $address ,  $number ,  $postcode ,  $barrio ,  $sector ,  $ref ,  $city ,  $province ,  $region ,  $country ,  $code ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `contact_id` =:contact_id, `name` =:name, `address` =:address, `number` =:number, `postcode` =:postcode, `barrio` =:barrio, `sector` =:sector, `ref` =:ref, `city` =:city, `province` =:province, `region` =:region, `country` =:country, `code` =:code, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "contact_id" =>$contact_id ,  
 "name" =>$name ,  
 "address" =>$address ,  
 "number" =>$number ,  
 "postcode" =>$postcode ,  
 "barrio" =>$barrio ,  
 "sector" =>$sector ,  
 "ref" =>$ref ,  
 "city" =>$city ,  
 "province" =>$province ,  
 "region" =>$region ,  
 "country" =>$country ,  
 "code" =>$code ,  
 "status" =>$status ,  

));
}

function addresses_add($contact_id ,  $name ,  $address ,  $number ,  $postcode ,  $barrio ,  $sector ,  $ref ,  $city ,  $province ,  $region ,  $country ,  $code ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `addresses` ( `id` ,  `contact_id`, `name`,  `address` ,  `number`,  `postcode`, `barrio`,   `sector` ,   `ref` ,   `city` ,   `province` ,   `region` ,   `country` ,   `code` ,   `status`   )
                                            VALUES  (:id ,  :contact_id ,  :name ,  :address ,  :number ,  :postcode ,  :barrio ,  :sector ,  :ref ,  :city ,  :province ,  :region ,  :country ,  :code ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "contact_id" => $contact_id ,  
 "name" => $name ,  
 "address" => $address ,  
 "number" => $number ,  
 "postcode" => $postcode ,  
 "barrio" => $barrio ,  
 "sector" => $sector ,  
 "ref" => $ref ,  
 "city" => $city ,  
 "province" => $province ,  
 "region" => $region ,  
 "country" => $country ,  
 "code" => $code ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function addresses_search($txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    



    $start = (int) $start; 
    $limit = (int) $limit; 

    
    
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'contact_id',  'name',  'address',  'number',  'postcode',  'barrio',  'sector',  'ref',  'city',  'province',  'region',  'country',  'code',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    
    
    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `name`,  `address`,  `number`,  `postcode`,  `barrio`,  `sector`,  `ref`,  `city`,  `province`,  `region`,  `country`,  `code`,  `status`    
            FROM 
                `addresses` 
            WHERE 
                `id` = :txt OR `id` like :txt
OR `contact_id` like :txt
OR `name` like :txt
OR `address` like :txt
OR `number` like :txt
OR `postcode` like :txt
OR `barrio` like :txt
OR `sector` like :txt
OR `ref` like :txt
OR `city` like :txt
OR `province` like :txt
OR `region` like :txt
OR `country` like :txt
OR `code` like :txt
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

function addresses_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (addresses_list() as $key => $value) {
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
function addresses_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `addresses` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function addresses_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "order_by", $order_way = "desc") {
    global $db;
    
    $start = (int) $start; 
    $limit = (int) $limit; 
        
     // Validar $order_col y $order_way
    $allowed_order_cols = ['id',  'contact_id',  'name',  'address',  'number',  'postcode',  'barrio',  'sector',  'ref',  'city',  'province',  'region',  'country',  'code',  'status'  ]; // Lista de columnas permitidas
    $allowed_order_ways = ["asc", "desc"]; // Solo "asc" o "desc"
    
    if (!in_array($order_col, $allowed_order_cols)) {
        $order_col = "order_by"; // Valor por defecto
    }
    
    if (!in_array($order_way, $allowed_order_ways)) {
        $order_way = "desc"; // Valor por defecto
    }
    

    $data = null;
    
    $sql = "SELECT `id`,  `contact_id`,  `name`,  `address`,  `number`,  `postcode`,  `barrio`,  `sector`,  `ref`,  `city`,  `province`,  `region`,  `country`,  `code`,  `status`    FROM `addresses` 

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

function addresses_db_show_col_from_table($c) {
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
function addresses_db_col_list_from_table($c){
    $list = array();
    foreach (addresses_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function addresses_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_contact_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `contact_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_address($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `address`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_postcode($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `postcode`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_barrio($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `barrio`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_sector($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `sector`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_ref($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `ref`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_city($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `city`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_province($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `province`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_region($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `region`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_country($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `country`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function addresses_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `addresses` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function addresses_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            addresses_update_id($id, $new_data);
            break;

        case "contact_id":
            addresses_update_contact_id($id, $new_data);
            break;

        case "name":
            addresses_update_name($id, $new_data);
            break;

        case "address":
            addresses_update_address($id, $new_data);
            break;

        case "number":
            addresses_update_number($id, $new_data);
            break;

        case "postcode":
            addresses_update_postcode($id, $new_data);
            break;

        case "barrio":
            addresses_update_barrio($id, $new_data);
            break;

        case "sector":
            addresses_update_sector($id, $new_data);
            break;

        case "ref":
            addresses_update_ref($id, $new_data);
            break;

        case "city":
            addresses_update_city($id, $new_data);
            break;

        case "province":
            addresses_update_province($id, $new_data);
            break;

        case "region":
            addresses_update_region($id, $new_data);
            break;

        case "country":
            addresses_update_country($id, $new_data);
            break;

        case "code":
            addresses_update_code($id, $new_data);
            break;

        case "status":
            addresses_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function addresses_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `addresses` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/addresses/functions.php
// and comment here (this function)
function addresses_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_id":
            //return contacts_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "address":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "postcode":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "barrio":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "sector":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ref":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "city":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "province":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "region":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "country":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
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
function addresses_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `addresses` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_contact_id($contact_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_id` FROM `addresses` WHERE   `contact_id` = ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_name($name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `name` FROM `addresses` WHERE   `name` = ?");
    $req->execute(array($name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_address($address){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `address` FROM `addresses` WHERE   `address` = ?");
    $req->execute(array($address));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_number($number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `number` FROM `addresses` WHERE   `number` = ?");
    $req->execute(array($number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_postcode($postcode){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `postcode` FROM `addresses` WHERE   `postcode` = ?");
    $req->execute(array($postcode));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_barrio($barrio){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `barrio` FROM `addresses` WHERE   `barrio` = ?");
    $req->execute(array($barrio));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_sector($sector){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `sector` FROM `addresses` WHERE   `sector` = ?");
    $req->execute(array($sector));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_ref($ref){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ref` FROM `addresses` WHERE   `ref` = ?");
    $req->execute(array($ref));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_city($city){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `city` FROM `addresses` WHERE   `city` = ?");
    $req->execute(array($city));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_province($province){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `province` FROM `addresses` WHERE   `province` = ?");
    $req->execute(array($province));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_region($region){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `region` FROM `addresses` WHERE   `region` = ?");
    $req->execute(array($region));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_country($country){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `country` FROM `addresses` WHERE   `country` = ?");
    $req->execute(array($country));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `addresses` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function addresses_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `addresses` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function addresses_is_id($id){
     return (is_id($id) )? true : false ;
}

function addresses_is_contact_id($contact_id){
     return true;
}

function addresses_is_name($name){
     return true;
}

function addresses_is_address($address){
     return true;
}

function addresses_is_number($number){
     return true;
}

function addresses_is_postcode($postcode){
     return true;
}

function addresses_is_barrio($barrio){
     return true;
}

function addresses_is_sector($sector){
     return true;
}

function addresses_is_ref($ref){
     return true;
}

function addresses_is_city($city){
     return true;
}

function addresses_is_province($province){
     return true;
}

function addresses_is_region($region){
     return true;
}

function addresses_is_country($country){
     return true;
}

function addresses_is_code($code){
     return true;
}

function addresses_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function addresses_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, addresses_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function addresses_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (addresses_is_id($value)) ? true : false;
            break;
     case "contact_id":
            $is = (addresses_is_contact_id($value)) ? true : false;
            break;
     case "name":
            $is = (addresses_is_name($value)) ? true : false;
            break;
     case "address":
            $is = (addresses_is_address($value)) ? true : false;
            break;
     case "number":
            $is = (addresses_is_number($value)) ? true : false;
            break;
     case "postcode":
            $is = (addresses_is_postcode($value)) ? true : false;
            break;
     case "barrio":
            $is = (addresses_is_barrio($value)) ? true : false;
            break;
     case "sector":
            $is = (addresses_is_sector($value)) ? true : false;
            break;
     case "ref":
            $is = (addresses_is_ref($value)) ? true : false;
            break;
     case "city":
            $is = (addresses_is_city($value)) ? true : false;
            break;
     case "province":
            $is = (addresses_is_province($value)) ? true : false;
            break;
     case "region":
            $is = (addresses_is_region($value)) ? true : false;
            break;
     case "country":
            $is = (addresses_is_country($value)) ? true : false;
            break;
     case "code":
            $is = (addresses_is_code($value)) ? true : false;
            break;
     case "status":
            $is = (addresses_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function addresses_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=addresses&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'contact_id':
                echo '<th>' . _tr(ucfirst('contact_id')) . '</th>';
                break;
case 'name':
                echo '<th>' . _tr(ucfirst('name')) . '</th>';
                break;
case 'address':
                echo '<th>' . _tr(ucfirst('address')) . '</th>';
                break;
case 'number':
                echo '<th>' . _tr(ucfirst('number')) . '</th>';
                break;
case 'postcode':
                echo '<th>' . _tr(ucfirst('postcode')) . '</th>';
                break;
case 'barrio':
                echo '<th>' . _tr(ucfirst('barrio')) . '</th>';
                break;
case 'sector':
                echo '<th>' . _tr(ucfirst('sector')) . '</th>';
                break;
case 'ref':
                echo '<th>' . _tr(ucfirst('ref')) . '</th>';
                break;
case 'city':
                echo '<th>' . _tr(ucfirst('city')) . '</th>';
                break;
case 'province':
                echo '<th>' . _tr(ucfirst('province')) . '</th>';
                break;
case 'region':
                echo '<th>' . _tr(ucfirst('region')) . '</th>';
                break;
case 'country':
                echo '<th>' . _tr(ucfirst('country')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
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

function addresses_index_generate_column_body_td($addresses, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=addresses&a=details&id=' . $addresses[$col] . '">' . $addresses[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'contact_id':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'name':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'address':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'number':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'postcode':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'barrio':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'sector':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'ref':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'city':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'province':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'region':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'country':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($addresses[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=addresses&a=details&id=' . $addresses['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=addresses&a=details_payement&id=' . $addresses['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=addresses&a=edit&id=' . $addresses['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=addresses&a=ok_delete&id=' . $addresses['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=addresses&a=export_pdf&id=' . $addresses['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=addresses&a=export_pdf&way=pdf&&id=' . $addresses['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($addresses[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
