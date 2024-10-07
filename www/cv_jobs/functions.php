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
# Fecha de creacion del documento: 2024-09-23 19:09:40 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-23 19:09:40 


// 

//function cv_jobs_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function cv_jobs_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("cv_jobs_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("cv_jobs"); // Obtener columnas de la tabla de la base de datos
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
function cv_jobs_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_jobs` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_jobs_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_jobs` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_jobs_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_jobs` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_jobs_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `job_title`,  `reference_number`,  `creation_date`,  `company_name`,  `location`,  `ciudad`,  `working_hours`,  `contract_type`,  `job_family`,  `job_description`,  `profile`,  `language_requirements`,  `employer_name`,  `contact_person`,  `application_mode`,  `website_url`,  `order_by`,  `status`   
    
    FROM `cv_jobs` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function cv_jobs_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `job_title`,  `reference_number`,  `creation_date`,  `company_name`,  `location`,  `ciudad`,  `working_hours`,  `contract_type`,  `job_family`,  `job_description`,  `profile`,  `language_requirements`,  `employer_name`,  `contact_person`,  `application_mode`,  `website_url`,  `order_by`,  `status`   
    FROM `cv_jobs` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cv_jobs_edit($id ,  $job_title ,  $reference_number ,  $creation_date ,  $company_name ,  $location ,  $ciudad ,  $working_hours ,  $contract_type ,  $job_family ,  $job_description ,  $profile ,  $language_requirements ,  $employer_name ,  $contact_person ,  $application_mode ,  $website_url ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `job_title` =:job_title, `reference_number` =:reference_number, `creation_date` =:creation_date, `company_name` =:company_name, `location` =:location, `ciudad` =:ciudad, `working_hours` =:working_hours, `contract_type` =:contract_type, `job_family` =:job_family, `job_description` =:job_description, `profile` =:profile, `language_requirements` =:language_requirements, `employer_name` =:employer_name, `contact_person` =:contact_person, `application_mode` =:application_mode, `website_url` =:website_url, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "job_title" =>$job_title ,  
 "reference_number" =>$reference_number ,  
 "creation_date" =>$creation_date ,  
 "company_name" =>$company_name ,  
 "location" =>$location ,  
 "ciudad" =>$ciudad ,  
 "working_hours" =>$working_hours ,  
 "contract_type" =>$contract_type ,  
 "job_family" =>$job_family ,  
 "job_description" =>$job_description ,  
 "profile" =>$profile ,  
 "language_requirements" =>$language_requirements ,  
 "employer_name" =>$employer_name ,  
 "contact_person" =>$contact_person ,  
 "application_mode" =>$application_mode ,  
 "website_url" =>$website_url ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cv_jobs_add($job_title ,  $reference_number ,  $creation_date ,  $company_name ,  $location ,  $ciudad ,  $working_hours ,  $contract_type ,  $job_family ,  $job_description ,  $profile ,  $language_requirements ,  $employer_name ,  $contact_person ,  $application_mode ,  $website_url ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cv_jobs` ( `id` ,   `job_title` ,   `reference_number` ,   `creation_date` ,   `company_name` ,   `location` ,   `ciudad` ,   `working_hours` ,   `contract_type` ,   `job_family` ,   `job_description` ,   `profile` ,   `language_requirements` ,   `employer_name` ,   `contact_person` ,   `application_mode` ,   `website_url` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :job_title ,  :reference_number ,  :creation_date ,  :company_name ,  :location ,  :ciudad ,  :working_hours ,  :contract_type ,  :job_family ,  :job_description ,  :profile ,  :language_requirements ,  :employer_name ,  :contact_person ,  :application_mode ,  :website_url ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "job_title" => $job_title ,  
 "reference_number" => $reference_number ,  
 "creation_date" => $creation_date ,  
 "company_name" => $company_name ,  
 "location" => $location ,  
 "ciudad" => $ciudad ,  
 "working_hours" => $working_hours ,  
 "contract_type" => $contract_type ,  
 "job_family" => $job_family ,  
 "job_description" => $job_description ,  
 "profile" => $profile ,  
 "language_requirements" => $language_requirements ,  
 "employer_name" => $employer_name ,  
 "contact_person" => $contact_person ,  
 "application_mode" => $application_mode ,  
 "website_url" => $website_url ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cv_jobs_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `job_title`,  `reference_number`,  `creation_date`,  `company_name`,  `location`,  `ciudad`,  `working_hours`,  `contract_type`,  `job_family`,  `job_description`,  `profile`,  `language_requirements`,  `employer_name`,  `contact_person`,  `application_mode`,  `website_url`,  `order_by`,  `status`    
            FROM `cv_jobs` 
            WHERE `id` = :txt OR `id` like :txt
OR `job_title` like :txt
OR `reference_number` like :txt
OR `creation_date` like :txt
OR `company_name` like :txt
OR `location` like :txt
OR `ciudad` like :txt
OR `working_hours` like :txt
OR `contract_type` like :txt
OR `job_family` like :txt
OR `job_description` like :txt
OR `profile` like :txt
OR `language_requirements` like :txt
OR `employer_name` like :txt
OR `contact_person` like :txt
OR `application_mode` like :txt
OR `website_url` like :txt
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

function cv_jobs_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cv_jobs_list() as $key => $value) {
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
function cv_jobs_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cv_jobs` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cv_jobs_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `job_title`,  `reference_number`,  `creation_date`,  `company_name`,  `location`,  `ciudad`,  `working_hours`,  `contract_type`,  `job_family`,  `job_description`,  `profile`,  `language_requirements`,  `employer_name`,  `contact_person`,  `application_mode`,  `website_url`,  `order_by`,  `status`    FROM `cv_jobs` 

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

function cv_jobs_db_show_col_from_table($c) {
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
function cv_jobs_db_col_list_from_table($c){
    $list = array();
    foreach (cv_jobs_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cv_jobs_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_job_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `job_title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_reference_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `reference_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_creation_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `creation_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_company_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `company_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_location($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `location`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_ciudad($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `ciudad`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_working_hours($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `working_hours`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_contract_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `contract_type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_job_family($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `job_family`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_job_description($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `job_description`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_profile($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `profile`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_language_requirements($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `language_requirements`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_employer_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `employer_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_contact_person($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `contact_person`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_application_mode($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `application_mode`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_website_url($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `website_url`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_jobs_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_jobs` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cv_jobs_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cv_jobs_update_id($id, $new_data);
            break;

        case "job_title":
            cv_jobs_update_job_title($id, $new_data);
            break;

        case "reference_number":
            cv_jobs_update_reference_number($id, $new_data);
            break;

        case "creation_date":
            cv_jobs_update_creation_date($id, $new_data);
            break;

        case "company_name":
            cv_jobs_update_company_name($id, $new_data);
            break;

        case "location":
            cv_jobs_update_location($id, $new_data);
            break;

        case "ciudad":
            cv_jobs_update_ciudad($id, $new_data);
            break;

        case "working_hours":
            cv_jobs_update_working_hours($id, $new_data);
            break;

        case "contract_type":
            cv_jobs_update_contract_type($id, $new_data);
            break;

        case "job_family":
            cv_jobs_update_job_family($id, $new_data);
            break;

        case "job_description":
            cv_jobs_update_job_description($id, $new_data);
            break;

        case "profile":
            cv_jobs_update_profile($id, $new_data);
            break;

        case "language_requirements":
            cv_jobs_update_language_requirements($id, $new_data);
            break;

        case "employer_name":
            cv_jobs_update_employer_name($id, $new_data);
            break;

        case "contact_person":
            cv_jobs_update_contact_person($id, $new_data);
            break;

        case "application_mode":
            cv_jobs_update_application_mode($id, $new_data);
            break;

        case "website_url":
            cv_jobs_update_website_url($id, $new_data);
            break;

        case "order_by":
            cv_jobs_update_order_by($id, $new_data);
            break;

        case "status":
            cv_jobs_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cv_jobs_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cv_jobs` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cv_jobs/functions.php
// and comment here (this function)
function cv_jobs_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "job_title":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "reference_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "creation_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "company_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "location":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ciudad":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "working_hours":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contract_type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "job_family":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "job_description":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "profile":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "language_requirements":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "employer_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "contact_person":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "application_mode":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "website_url":
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
function cv_jobs_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cv_jobs` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_job_title($job_title){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `job_title` FROM `cv_jobs` WHERE   `job_title` = ?");
    $req->execute(array($job_title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_reference_number($reference_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `reference_number` FROM `cv_jobs` WHERE   `reference_number` = ?");
    $req->execute(array($reference_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_creation_date($creation_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `creation_date` FROM `cv_jobs` WHERE   `creation_date` = ?");
    $req->execute(array($creation_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_company_name($company_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `company_name` FROM `cv_jobs` WHERE   `company_name` = ?");
    $req->execute(array($company_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_location($location){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `location` FROM `cv_jobs` WHERE   `location` = ?");
    $req->execute(array($location));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_ciudad($ciudad){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ciudad` FROM `cv_jobs` WHERE   `ciudad` = ?");
    $req->execute(array($ciudad));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_working_hours($working_hours){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `working_hours` FROM `cv_jobs` WHERE   `working_hours` = ?");
    $req->execute(array($working_hours));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_contract_type($contract_type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contract_type` FROM `cv_jobs` WHERE   `contract_type` = ?");
    $req->execute(array($contract_type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_job_family($job_family){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `job_family` FROM `cv_jobs` WHERE   `job_family` = ?");
    $req->execute(array($job_family));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_job_description($job_description){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `job_description` FROM `cv_jobs` WHERE   `job_description` = ?");
    $req->execute(array($job_description));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_profile($profile){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `profile` FROM `cv_jobs` WHERE   `profile` = ?");
    $req->execute(array($profile));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_language_requirements($language_requirements){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `language_requirements` FROM `cv_jobs` WHERE   `language_requirements` = ?");
    $req->execute(array($language_requirements));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_employer_name($employer_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `employer_name` FROM `cv_jobs` WHERE   `employer_name` = ?");
    $req->execute(array($employer_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_contact_person($contact_person){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `contact_person` FROM `cv_jobs` WHERE   `contact_person` = ?");
    $req->execute(array($contact_person));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_application_mode($application_mode){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `application_mode` FROM `cv_jobs` WHERE   `application_mode` = ?");
    $req->execute(array($application_mode));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_website_url($website_url){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `website_url` FROM `cv_jobs` WHERE   `website_url` = ?");
    $req->execute(array($website_url));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cv_jobs` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_jobs_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cv_jobs` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cv_jobs_is_id($id){
     return (is_id($id) )? true : false ;
}

function cv_jobs_is_job_title($job_title){
     return true;
}

function cv_jobs_is_reference_number($reference_number){
     return true;
}

function cv_jobs_is_creation_date($creation_date){
     return true;
}

function cv_jobs_is_company_name($company_name){
     return true;
}

function cv_jobs_is_location($location){
     return true;
}

function cv_jobs_is_ciudad($ciudad){
     return true;
}

function cv_jobs_is_working_hours($working_hours){
     return true;
}

function cv_jobs_is_contract_type($contract_type){
     return true;
}

function cv_jobs_is_job_family($job_family){
     return true;
}

function cv_jobs_is_job_description($job_description){
     return true;
}

function cv_jobs_is_profile($profile){
     return true;
}

function cv_jobs_is_language_requirements($language_requirements){
     return true;
}

function cv_jobs_is_employer_name($employer_name){
     return true;
}

function cv_jobs_is_contact_person($contact_person){
     return true;
}

function cv_jobs_is_application_mode($application_mode){
     return true;
}

function cv_jobs_is_website_url($website_url){
     return true;
}

function cv_jobs_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cv_jobs_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cv_jobs_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cv_jobs_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cv_jobs_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cv_jobs_is_id($value)) ? true : false;
            break;
     case "job_title":
            $is = (cv_jobs_is_job_title($value)) ? true : false;
            break;
     case "reference_number":
            $is = (cv_jobs_is_reference_number($value)) ? true : false;
            break;
     case "creation_date":
            $is = (cv_jobs_is_creation_date($value)) ? true : false;
            break;
     case "company_name":
            $is = (cv_jobs_is_company_name($value)) ? true : false;
            break;
     case "location":
            $is = (cv_jobs_is_location($value)) ? true : false;
            break;
     case "ciudad":
            $is = (cv_jobs_is_ciudad($value)) ? true : false;
            break;
     case "working_hours":
            $is = (cv_jobs_is_working_hours($value)) ? true : false;
            break;
     case "contract_type":
            $is = (cv_jobs_is_contract_type($value)) ? true : false;
            break;
     case "job_family":
            $is = (cv_jobs_is_job_family($value)) ? true : false;
            break;
     case "job_description":
            $is = (cv_jobs_is_job_description($value)) ? true : false;
            break;
     case "profile":
            $is = (cv_jobs_is_profile($value)) ? true : false;
            break;
     case "language_requirements":
            $is = (cv_jobs_is_language_requirements($value)) ? true : false;
            break;
     case "employer_name":
            $is = (cv_jobs_is_employer_name($value)) ? true : false;
            break;
     case "contact_person":
            $is = (cv_jobs_is_contact_person($value)) ? true : false;
            break;
     case "application_mode":
            $is = (cv_jobs_is_application_mode($value)) ? true : false;
            break;
     case "website_url":
            $is = (cv_jobs_is_website_url($value)) ? true : false;
            break;
     case "order_by":
            $is = (cv_jobs_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cv_jobs_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cv_jobs_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cv_jobs&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'job_title':
                echo '<th>' . _tr(ucfirst('job_title')) . '</th>';
                break;
case 'reference_number':
                echo '<th>' . _tr(ucfirst('reference_number')) . '</th>';
                break;
case 'creation_date':
                echo '<th>' . _tr(ucfirst('creation_date')) . '</th>';
                break;
case 'company_name':
                echo '<th>' . _tr(ucfirst('company_name')) . '</th>';
                break;
case 'location':
                echo '<th>' . _tr(ucfirst('location')) . '</th>';
                break;
case 'ciudad':
                echo '<th>' . _tr(ucfirst('ciudad')) . '</th>';
                break;
case 'working_hours':
                echo '<th>' . _tr(ucfirst('working_hours')) . '</th>';
                break;
case 'contract_type':
                echo '<th>' . _tr(ucfirst('contract_type')) . '</th>';
                break;
case 'job_family':
                echo '<th>' . _tr(ucfirst('job_family')) . '</th>';
                break;
case 'job_description':
                echo '<th>' . _tr(ucfirst('job_description')) . '</th>';
                break;
case 'profile':
                echo '<th>' . _tr(ucfirst('profile')) . '</th>';
                break;
case 'language_requirements':
                echo '<th>' . _tr(ucfirst('language_requirements')) . '</th>';
                break;
case 'employer_name':
                echo '<th>' . _tr(ucfirst('employer_name')) . '</th>';
                break;
case 'contact_person':
                echo '<th>' . _tr(ucfirst('contact_person')) . '</th>';
                break;
case 'application_mode':
                echo '<th>' . _tr(ucfirst('application_mode')) . '</th>';
                break;
case 'website_url':
                echo '<th>' . _tr(ucfirst('website_url')) . '</th>';
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

function cv_jobs_index_generate_column_body_td($cv_jobs, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cv_jobs&a=details&id=' . $cv_jobs[$col] . '">' . $cv_jobs[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'job_title':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'reference_number':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'creation_date':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'company_name':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'location':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'ciudad':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'working_hours':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'contract_type':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'job_family':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'job_description':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'profile':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'language_requirements':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'employer_name':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'contact_person':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'application_mode':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'website_url':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cv_jobs&a=details&id=' . $cv_jobs['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cv_jobs&a=details_payement&id=' . $cv_jobs['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_jobs&a=edit&id=' . $cv_jobs['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_jobs&a=ok_delete&id=' . $cv_jobs['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_jobs&a=export_pdf&id=' . $cv_jobs['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_jobs&a=export_pdf&way=pdf&&id=' . $cv_jobs['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cv_jobs[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
