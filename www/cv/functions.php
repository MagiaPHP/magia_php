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
# Fecha de creacion del documento: 2024-09-18 07:09:40 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 07:09:40 


// 

//function cv_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function cv_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("cv_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("cv"); // Obtener columnas de la tabla de la base de datos
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
function cv_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `first_name`,  `last_name`,  `address`,  `city`,  `postal_code`,  `phone_number`,  `email`,  `driver_license`,  `birth_date`,  `availability`,  `professional_goal`,  `summary`,  `hobbies`,  `created_at`,  `work_experience`,  `education`,  `technologies`,  `skills`,  `projects`,  `languages`,  `order_by`,  `status`   
    
    FROM `cv` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function cv_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `first_name`,  `last_name`,  `address`,  `city`,  `postal_code`,  `phone_number`,  `email`,  `driver_license`,  `birth_date`,  `availability`,  `professional_goal`,  `summary`,  `hobbies`,  `created_at`,  `work_experience`,  `education`,  `technologies`,  `skills`,  `projects`,  `languages`,  `order_by`,  `status`   
    FROM `cv` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cv_edit($id ,  $first_name ,  $last_name ,  $address ,  $city ,  $postal_code ,  $phone_number ,  $email ,  $driver_license ,  $birth_date ,  $availability ,  $professional_goal ,  $summary ,  $hobbies ,  $created_at ,  $work_experience ,  $education ,  $technologies ,  $skills ,  $projects ,  $languages ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `first_name` =:first_name, `last_name` =:last_name, `address` =:address, `city` =:city, `postal_code` =:postal_code, `phone_number` =:phone_number, `email` =:email, `driver_license` =:driver_license, `birth_date` =:birth_date, `availability` =:availability, `professional_goal` =:professional_goal, `summary` =:summary, `hobbies` =:hobbies, `created_at` =:created_at, `work_experience` =:work_experience, `education` =:education, `technologies` =:technologies, `skills` =:skills, `projects` =:projects, `languages` =:languages, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "first_name" =>$first_name ,  
 "last_name" =>$last_name ,  
 "address" =>$address ,  
 "city" =>$city ,  
 "postal_code" =>$postal_code ,  
 "phone_number" =>$phone_number ,  
 "email" =>$email ,  
 "driver_license" =>$driver_license ,  
 "birth_date" =>$birth_date ,  
 "availability" =>$availability ,  
 "professional_goal" =>$professional_goal ,  
 "summary" =>$summary ,  
 "hobbies" =>$hobbies ,  
 "created_at" =>$created_at ,  
 "work_experience" =>$work_experience ,  
 "education" =>$education ,  
 "technologies" =>$technologies ,  
 "skills" =>$skills ,  
 "projects" =>$projects ,  
 "languages" =>$languages ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cv_add($first_name ,  $last_name ,  $address ,  $city ,  $postal_code ,  $phone_number ,  $email ,  $driver_license ,  $birth_date ,  $availability ,  $professional_goal ,  $summary ,  $hobbies ,  $created_at ,  $work_experience ,  $education ,  $technologies ,  $skills ,  $projects ,  $languages ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cv` ( `id` ,   `first_name` ,   `last_name` ,   `address` ,   `city` ,   `postal_code` ,   `phone_number` ,   `email` ,   `driver_license` ,   `birth_date` ,   `availability` ,   `professional_goal` ,   `summary` ,   `hobbies` ,   `created_at` ,   `work_experience` ,   `education` ,   `technologies` ,   `skills` ,   `projects` ,   `languages` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :first_name ,  :last_name ,  :address ,  :city ,  :postal_code ,  :phone_number ,  :email ,  :driver_license ,  :birth_date ,  :availability ,  :professional_goal ,  :summary ,  :hobbies ,  :created_at ,  :work_experience ,  :education ,  :technologies ,  :skills ,  :projects ,  :languages ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "first_name" => $first_name ,  
 "last_name" => $last_name ,  
 "address" => $address ,  
 "city" => $city ,  
 "postal_code" => $postal_code ,  
 "phone_number" => $phone_number ,  
 "email" => $email ,  
 "driver_license" => $driver_license ,  
 "birth_date" => $birth_date ,  
 "availability" => $availability ,  
 "professional_goal" => $professional_goal ,  
 "summary" => $summary ,  
 "hobbies" => $hobbies ,  
 "created_at" => $created_at ,  
 "work_experience" => $work_experience ,  
 "education" => $education ,  
 "technologies" => $technologies ,  
 "skills" => $skills ,  
 "projects" => $projects ,  
 "languages" => $languages ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cv_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `first_name`,  `last_name`,  `address`,  `city`,  `postal_code`,  `phone_number`,  `email`,  `driver_license`,  `birth_date`,  `availability`,  `professional_goal`,  `summary`,  `hobbies`,  `created_at`,  `work_experience`,  `education`,  `technologies`,  `skills`,  `projects`,  `languages`,  `order_by`,  `status`    
            FROM `cv` 
            WHERE `id` = :txt OR `id` like :txt
OR `first_name` like :txt
OR `last_name` like :txt
OR `address` like :txt
OR `city` like :txt
OR `postal_code` like :txt
OR `phone_number` like :txt
OR `email` like :txt
OR `driver_license` like :txt
OR `birth_date` like :txt
OR `availability` like :txt
OR `professional_goal` like :txt
OR `summary` like :txt
OR `hobbies` like :txt
OR `created_at` like :txt
OR `work_experience` like :txt
OR `education` like :txt
OR `technologies` like :txt
OR `skills` like :txt
OR `projects` like :txt
OR `languages` like :txt
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

function cv_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cv_list() as $key => $value) {
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
function cv_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cv` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cv_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `first_name`,  `last_name`,  `address`,  `city`,  `postal_code`,  `phone_number`,  `email`,  `driver_license`,  `birth_date`,  `availability`,  `professional_goal`,  `summary`,  `hobbies`,  `created_at`,  `work_experience`,  `education`,  `technologies`,  `skills`,  `projects`,  `languages`,  `order_by`,  `status`    FROM `cv` 

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

function cv_db_show_col_from_table($c) {
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
function cv_db_col_list_from_table($c){
    $list = array();
    foreach (cv_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cv_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_first_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `first_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_last_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `last_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_address($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `address`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_city($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `city`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_postal_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `postal_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_phone_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `phone_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_email($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `email`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_driver_license($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `driver_license`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_birth_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `birth_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_availability($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `availability`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_professional_goal($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `professional_goal`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_summary($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `summary`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_hobbies($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `hobbies`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_created_at($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `created_at`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_work_experience($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `work_experience`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_education($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `education`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_technologies($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `technologies`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_skills($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `skills`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_projects($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `projects`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_languages($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `languages`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cv_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cv_update_id($id, $new_data);
            break;

        case "first_name":
            cv_update_first_name($id, $new_data);
            break;

        case "last_name":
            cv_update_last_name($id, $new_data);
            break;

        case "address":
            cv_update_address($id, $new_data);
            break;

        case "city":
            cv_update_city($id, $new_data);
            break;

        case "postal_code":
            cv_update_postal_code($id, $new_data);
            break;

        case "phone_number":
            cv_update_phone_number($id, $new_data);
            break;

        case "email":
            cv_update_email($id, $new_data);
            break;

        case "driver_license":
            cv_update_driver_license($id, $new_data);
            break;

        case "birth_date":
            cv_update_birth_date($id, $new_data);
            break;

        case "availability":
            cv_update_availability($id, $new_data);
            break;

        case "professional_goal":
            cv_update_professional_goal($id, $new_data);
            break;

        case "summary":
            cv_update_summary($id, $new_data);
            break;

        case "hobbies":
            cv_update_hobbies($id, $new_data);
            break;

        case "created_at":
            cv_update_created_at($id, $new_data);
            break;

        case "work_experience":
            cv_update_work_experience($id, $new_data);
            break;

        case "education":
            cv_update_education($id, $new_data);
            break;

        case "technologies":
            cv_update_technologies($id, $new_data);
            break;

        case "skills":
            cv_update_skills($id, $new_data);
            break;

        case "projects":
            cv_update_projects($id, $new_data);
            break;

        case "languages":
            cv_update_languages($id, $new_data);
            break;

        case "order_by":
            cv_update_order_by($id, $new_data);
            break;

        case "status":
            cv_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cv_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cv` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cv/functions.php
// and comment here (this function)
function cv_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "first_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "last_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "address":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "city":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "postal_code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "phone_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "email":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "driver_license":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "birth_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "availability":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "professional_goal":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "summary":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "hobbies":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "created_at":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "work_experience":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "education":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "technologies":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "skills":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "projects":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "languages":
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
function cv_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cv` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_first_name($first_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `first_name` FROM `cv` WHERE   `first_name` = ?");
    $req->execute(array($first_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_last_name($last_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `last_name` FROM `cv` WHERE   `last_name` = ?");
    $req->execute(array($last_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_address($address){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `address` FROM `cv` WHERE   `address` = ?");
    $req->execute(array($address));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_city($city){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `city` FROM `cv` WHERE   `city` = ?");
    $req->execute(array($city));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_postal_code($postal_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `postal_code` FROM `cv` WHERE   `postal_code` = ?");
    $req->execute(array($postal_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_phone_number($phone_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `phone_number` FROM `cv` WHERE   `phone_number` = ?");
    $req->execute(array($phone_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_email($email){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `email` FROM `cv` WHERE   `email` = ?");
    $req->execute(array($email));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_driver_license($driver_license){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `driver_license` FROM `cv` WHERE   `driver_license` = ?");
    $req->execute(array($driver_license));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_birth_date($birth_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `birth_date` FROM `cv` WHERE   `birth_date` = ?");
    $req->execute(array($birth_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_availability($availability){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `availability` FROM `cv` WHERE   `availability` = ?");
    $req->execute(array($availability));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_professional_goal($professional_goal){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `professional_goal` FROM `cv` WHERE   `professional_goal` = ?");
    $req->execute(array($professional_goal));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_summary($summary){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `summary` FROM `cv` WHERE   `summary` = ?");
    $req->execute(array($summary));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_hobbies($hobbies){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `hobbies` FROM `cv` WHERE   `hobbies` = ?");
    $req->execute(array($hobbies));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_created_at($created_at){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `created_at` FROM `cv` WHERE   `created_at` = ?");
    $req->execute(array($created_at));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_work_experience($work_experience){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `work_experience` FROM `cv` WHERE   `work_experience` = ?");
    $req->execute(array($work_experience));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_education($education){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `education` FROM `cv` WHERE   `education` = ?");
    $req->execute(array($education));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_technologies($technologies){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `technologies` FROM `cv` WHERE   `technologies` = ?");
    $req->execute(array($technologies));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_skills($skills){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `skills` FROM `cv` WHERE   `skills` = ?");
    $req->execute(array($skills));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_projects($projects){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `projects` FROM `cv` WHERE   `projects` = ?");
    $req->execute(array($projects));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_languages($languages){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `languages` FROM `cv` WHERE   `languages` = ?");
    $req->execute(array($languages));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cv` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cv` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cv_is_id($id){
     return (is_id($id) )? true : false ;
}

function cv_is_first_name($first_name){
     return true;
}

function cv_is_last_name($last_name){
     return true;
}

function cv_is_address($address){
     return true;
}

function cv_is_city($city){
     return true;
}

function cv_is_postal_code($postal_code){
     return true;
}

function cv_is_phone_number($phone_number){
     return true;
}

function cv_is_email($email){
     return true;
}

function cv_is_driver_license($driver_license){
     return true;
}

function cv_is_birth_date($birth_date){
     return true;
}

function cv_is_availability($availability){
     return true;
}

function cv_is_professional_goal($professional_goal){
     return true;
}

function cv_is_summary($summary){
     return true;
}

function cv_is_hobbies($hobbies){
     return true;
}

function cv_is_created_at($created_at){
     return true;
}

function cv_is_work_experience($work_experience){
     return true;
}

function cv_is_education($education){
     return true;
}

function cv_is_technologies($technologies){
     return true;
}

function cv_is_skills($skills){
     return true;
}

function cv_is_projects($projects){
     return true;
}

function cv_is_languages($languages){
     return true;
}

function cv_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cv_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cv_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cv_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cv_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cv_is_id($value)) ? true : false;
            break;
     case "first_name":
            $is = (cv_is_first_name($value)) ? true : false;
            break;
     case "last_name":
            $is = (cv_is_last_name($value)) ? true : false;
            break;
     case "address":
            $is = (cv_is_address($value)) ? true : false;
            break;
     case "city":
            $is = (cv_is_city($value)) ? true : false;
            break;
     case "postal_code":
            $is = (cv_is_postal_code($value)) ? true : false;
            break;
     case "phone_number":
            $is = (cv_is_phone_number($value)) ? true : false;
            break;
     case "email":
            $is = (cv_is_email($value)) ? true : false;
            break;
     case "driver_license":
            $is = (cv_is_driver_license($value)) ? true : false;
            break;
     case "birth_date":
            $is = (cv_is_birth_date($value)) ? true : false;
            break;
     case "availability":
            $is = (cv_is_availability($value)) ? true : false;
            break;
     case "professional_goal":
            $is = (cv_is_professional_goal($value)) ? true : false;
            break;
     case "summary":
            $is = (cv_is_summary($value)) ? true : false;
            break;
     case "hobbies":
            $is = (cv_is_hobbies($value)) ? true : false;
            break;
     case "created_at":
            $is = (cv_is_created_at($value)) ? true : false;
            break;
     case "work_experience":
            $is = (cv_is_work_experience($value)) ? true : false;
            break;
     case "education":
            $is = (cv_is_education($value)) ? true : false;
            break;
     case "technologies":
            $is = (cv_is_technologies($value)) ? true : false;
            break;
     case "skills":
            $is = (cv_is_skills($value)) ? true : false;
            break;
     case "projects":
            $is = (cv_is_projects($value)) ? true : false;
            break;
     case "languages":
            $is = (cv_is_languages($value)) ? true : false;
            break;
     case "order_by":
            $is = (cv_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cv_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cv_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cv&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'first_name':
                echo '<th>' . _tr(ucfirst('first_name')) . '</th>';
                break;
case 'last_name':
                echo '<th>' . _tr(ucfirst('last_name')) . '</th>';
                break;
case 'address':
                echo '<th>' . _tr(ucfirst('address')) . '</th>';
                break;
case 'city':
                echo '<th>' . _tr(ucfirst('city')) . '</th>';
                break;
case 'postal_code':
                echo '<th>' . _tr(ucfirst('postal_code')) . '</th>';
                break;
case 'phone_number':
                echo '<th>' . _tr(ucfirst('phone_number')) . '</th>';
                break;
case 'email':
                echo '<th>' . _tr(ucfirst('email')) . '</th>';
                break;
case 'driver_license':
                echo '<th>' . _tr(ucfirst('driver_license')) . '</th>';
                break;
case 'birth_date':
                echo '<th>' . _tr(ucfirst('birth_date')) . '</th>';
                break;
case 'availability':
                echo '<th>' . _tr(ucfirst('availability')) . '</th>';
                break;
case 'professional_goal':
                echo '<th>' . _tr(ucfirst('professional_goal')) . '</th>';
                break;
case 'summary':
                echo '<th>' . _tr(ucfirst('summary')) . '</th>';
                break;
case 'hobbies':
                echo '<th>' . _tr(ucfirst('hobbies')) . '</th>';
                break;
case 'created_at':
                echo '<th>' . _tr(ucfirst('created_at')) . '</th>';
                break;
case 'work_experience':
                echo '<th>' . _tr(ucfirst('work_experience')) . '</th>';
                break;
case 'education':
                echo '<th>' . _tr(ucfirst('education')) . '</th>';
                break;
case 'technologies':
                echo '<th>' . _tr(ucfirst('technologies')) . '</th>';
                break;
case 'skills':
                echo '<th>' . _tr(ucfirst('skills')) . '</th>';
                break;
case 'projects':
                echo '<th>' . _tr(ucfirst('projects')) . '</th>';
                break;
case 'languages':
                echo '<th>' . _tr(ucfirst('languages')) . '</th>';
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

function cv_index_generate_column_body_td($cv, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cv&a=details&id=' . $cv[$col] . '">' . $cv[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'first_name':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'last_name':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'address':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'city':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'postal_code':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'phone_number':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'email':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'driver_license':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'birth_date':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'availability':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'professional_goal':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'summary':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'hobbies':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'created_at':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'work_experience':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'education':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'technologies':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'skills':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'projects':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'languages':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cv[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cv&a=details&id=' . $cv['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cv&a=details_payement&id=' . $cv['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv&a=edit&id=' . $cv['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv&a=ok_delete&id=' . $cv['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=export_pdf&id=' . $cv['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv&a=export_pdf&way=pdf&&id=' . $cv['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cv[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
