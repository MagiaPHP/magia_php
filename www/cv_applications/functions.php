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
# Fecha de creacion del documento: 2024-09-18 12:09:00 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-18 12:09:00 


// 

//function cv_applications_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function cv_applications_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("cv_applications_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("cv_applications"); // Obtener columnas de la tabla de la base de datos
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
function cv_applications_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_applications` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_applications_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_applications` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_applications_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `cv_applications` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function cv_applications_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `job_id`,  `applicant_name`,  `applicant_email`,  `application_date`,  `resume`,  `cover_letter`,  `order_by`,  `status`   
    
    FROM `cv_applications` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function cv_applications_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `job_id`,  `applicant_name`,  `applicant_email`,  `application_date`,  `resume`,  `cover_letter`,  `order_by`,  `status`   
    FROM `cv_applications` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function cv_applications_edit($id ,  $job_id ,  $applicant_name ,  $applicant_email ,  $application_date ,  $resume ,  $cover_letter ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `job_id` =:job_id, `applicant_name` =:applicant_name, `applicant_email` =:applicant_email, `application_date` =:application_date, `resume` =:resume, `cover_letter` =:cover_letter, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "job_id" =>$job_id ,  
 "applicant_name" =>$applicant_name ,  
 "applicant_email" =>$applicant_email ,  
 "application_date" =>$application_date ,  
 "resume" =>$resume ,  
 "cover_letter" =>$cover_letter ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function cv_applications_add($job_id ,  $applicant_name ,  $applicant_email ,  $application_date ,  $resume ,  $cover_letter ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `cv_applications` ( `id` ,   `job_id` ,   `applicant_name` ,   `applicant_email` ,   `application_date` ,   `resume` ,   `cover_letter` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :job_id ,  :applicant_name ,  :applicant_email ,  :application_date ,  :resume ,  :cover_letter ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "job_id" => $job_id ,  
 "applicant_name" => $applicant_name ,  
 "applicant_email" => $applicant_email ,  
 "application_date" => $application_date ,  
 "resume" => $resume ,  
 "cover_letter" => $cover_letter ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function cv_applications_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `job_id`,  `applicant_name`,  `applicant_email`,  `application_date`,  `resume`,  `cover_letter`,  `order_by`,  `status`    
            FROM `cv_applications` 
            WHERE `id` = :txt OR `id` like :txt
OR `job_id` like :txt
OR `applicant_name` like :txt
OR `applicant_email` like :txt
OR `application_date` like :txt
OR `resume` like :txt
OR `cover_letter` like :txt
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

function cv_applications_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (cv_applications_list() as $key => $value) {
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
function cv_applications_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `cv_applications` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function cv_applications_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `job_id`,  `applicant_name`,  `applicant_email`,  `application_date`,  `resume`,  `cover_letter`,  `order_by`,  `status`    FROM `cv_applications` 

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

function cv_applications_db_show_col_from_table($c) {
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
function cv_applications_db_col_list_from_table($c){
    $list = array();
    foreach (cv_applications_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function cv_applications_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_job_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `job_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_applicant_name($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `applicant_name`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_applicant_email($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `applicant_email`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_application_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `application_date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_resume($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `resume`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_cover_letter($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `cover_letter`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function cv_applications_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `cv_applications` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function cv_applications_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            cv_applications_update_id($id, $new_data);
            break;

        case "job_id":
            cv_applications_update_job_id($id, $new_data);
            break;

        case "applicant_name":
            cv_applications_update_applicant_name($id, $new_data);
            break;

        case "applicant_email":
            cv_applications_update_applicant_email($id, $new_data);
            break;

        case "application_date":
            cv_applications_update_application_date($id, $new_data);
            break;

        case "resume":
            cv_applications_update_resume($id, $new_data);
            break;

        case "cover_letter":
            cv_applications_update_cover_letter($id, $new_data);
            break;

        case "order_by":
            cv_applications_update_order_by($id, $new_data);
            break;

        case "status":
            cv_applications_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function cv_applications_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `cv_applications` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/cv_applications/functions.php
// and comment here (this function)
function cv_applications_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "job_id":
            //return cv_jobs_field_id("id", $value);
            return ($filtre) ?? $value;                
            break; 
        case "applicant_name":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "applicant_email":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "application_date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "resume":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "cover_letter":
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
function cv_applications_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `cv_applications` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_job_id($job_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `job_id` FROM `cv_applications` WHERE   `job_id` = ?");
    $req->execute(array($job_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_applicant_name($applicant_name){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `applicant_name` FROM `cv_applications` WHERE   `applicant_name` = ?");
    $req->execute(array($applicant_name));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_applicant_email($applicant_email){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `applicant_email` FROM `cv_applications` WHERE   `applicant_email` = ?");
    $req->execute(array($applicant_email));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_application_date($application_date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `application_date` FROM `cv_applications` WHERE   `application_date` = ?");
    $req->execute(array($application_date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_resume($resume){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `resume` FROM `cv_applications` WHERE   `resume` = ?");
    $req->execute(array($resume));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_cover_letter($cover_letter){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `cover_letter` FROM `cv_applications` WHERE   `cover_letter` = ?");
    $req->execute(array($cover_letter));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `cv_applications` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function cv_applications_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `cv_applications` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function cv_applications_is_id($id){
     return (is_id($id) )? true : false ;
}

function cv_applications_is_job_id($job_id){
     return true;
}

function cv_applications_is_applicant_name($applicant_name){
     return true;
}

function cv_applications_is_applicant_email($applicant_email){
     return true;
}

function cv_applications_is_application_date($application_date){
     return true;
}

function cv_applications_is_resume($resume){
     return true;
}

function cv_applications_is_cover_letter($cover_letter){
     return true;
}

function cv_applications_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function cv_applications_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function cv_applications_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, cv_applications_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function cv_applications_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (cv_applications_is_id($value)) ? true : false;
            break;
     case "job_id":
            $is = (cv_applications_is_job_id($value)) ? true : false;
            break;
     case "applicant_name":
            $is = (cv_applications_is_applicant_name($value)) ? true : false;
            break;
     case "applicant_email":
            $is = (cv_applications_is_applicant_email($value)) ? true : false;
            break;
     case "application_date":
            $is = (cv_applications_is_application_date($value)) ? true : false;
            break;
     case "resume":
            $is = (cv_applications_is_resume($value)) ? true : false;
            break;
     case "cover_letter":
            $is = (cv_applications_is_cover_letter($value)) ? true : false;
            break;
     case "order_by":
            $is = (cv_applications_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (cv_applications_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function cv_applications_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=cv_applications&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'job_id':
                echo '<th>' . _tr(ucfirst('job_id')) . '</th>';
                break;
case 'applicant_name':
                echo '<th>' . _tr(ucfirst('applicant_name')) . '</th>';
                break;
case 'applicant_email':
                echo '<th>' . _tr(ucfirst('applicant_email')) . '</th>';
                break;
case 'application_date':
                echo '<th>' . _tr(ucfirst('application_date')) . '</th>';
                break;
case 'resume':
                echo '<th>' . _tr(ucfirst('resume')) . '</th>';
                break;
case 'cover_letter':
                echo '<th>' . _tr(ucfirst('cover_letter')) . '</th>';
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

function cv_applications_index_generate_column_body_td($cv_applications, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=cv_applications&a=details&id=' . $cv_applications[$col] . '">' . $cv_applications[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'job_id':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'applicant_name':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'applicant_email':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'application_date':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'resume':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'cover_letter':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=cv_applications&a=details&id=' . $cv_applications['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=cv_applications&a=details_payement&id=' . $cv_applications['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_applications&a=edit&id=' . $cv_applications['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=cv_applications&a=ok_delete&id=' . $cv_applications['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_applications&a=export_pdf&id=' . $cv_applications['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=cv_applications&a=export_pdf&way=pdf&&id=' . $cv_applications['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($cv_applications[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
