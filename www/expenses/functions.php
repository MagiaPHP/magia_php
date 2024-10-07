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
# Fecha de creacion del documento: 2024-09-23 11:09:25 
#################################################################################
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-23 11:09:25 


// 

//function expenses_can_be_edit($id){
//    return true; 
//}



/**
 * Obtener las columnas para mostrar en la tabla.
 * Si el usuario ha configurado columnas personalizadas, las utiliza.
 * Si no, usa las columnas por defecto de la tabla de la base de datos.
 *
 * @return array Columnas a mostrar en la tabla.
 */
function expenses_get_user_or_default_columns() {

    // Obtener columnas seleccionadas por el usuario
    $user_cols = user_options("expenses_show_col_from_table");

    // Inicializar el array de columnas del usuario
    $user_cols_array = [];

    // Verificar si hay columnas seleccionadas por el usuario y si es un JSON válido
    if ($user_cols && is_json($user_cols)) {

        // Decodificar JSON a un array asociativo
        $user_cols_array = json_decode($user_cols, true);
    } else {

        // Si no hay datos del usuario o no es JSON válido, usar columnas por defecto desde la tabla
        $columns = db_cols_from_table("expenses"); // Obtener columnas de la tabla de la base de datos
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
function expenses_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses` WHERE `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `expenses` WHERE   `$FieldUnique` = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false;
}

function expenses_list($start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `office_id`,  `office_id_counter_year_month`,  `office_id_counter_year_trimestre`,  `office_id_counter`,  `my_ref`,  `father_id`,  `category_code`,  `invoice_number`,  `budget_id`,  `credit_note_id`,  `provider_id`,  `seller_id`,  `clon_from_id`,  `title`,  `addresses_billing`,  `addresses_delivery`,  `date`,  `date_registre`,  `deadline`,  `total`,  `tax`,  `advance`,  `balance`,  `comments`,  `comments_private`,  `r1`,  `r2`,  `r3`,  `fc`,  `date_update`,  `days`,  `ce`,  `code`,  `type`,  `every`,  `times`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    
    FROM `expenses` 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";
    
    $query = $db->prepare($sql);
    
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    
    $query->execute();
    
    $data = $query->fetchall();
    
    return $data;
}

function expenses_details($id) {
    global $db;
    $req = $db->prepare(
    "
    SELECT `id`,  `office_id`,  `office_id_counter_year_month`,  `office_id_counter_year_trimestre`,  `office_id_counter`,  `my_ref`,  `father_id`,  `category_code`,  `invoice_number`,  `budget_id`,  `credit_note_id`,  `provider_id`,  `seller_id`,  `clon_from_id`,  `title`,  `addresses_billing`,  `addresses_delivery`,  `date`,  `date_registre`,  `deadline`,  `total`,  `tax`,  `advance`,  `balance`,  `comments`,  `comments_private`,  `r1`,  `r2`,  `r3`,  `fc`,  `date_update`,  `days`,  `ce`,  `code`,  `type`,  `every`,  `times`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    FROM `expenses` 
    WHERE `id` = ? 
    ");
    $req->execute(array(
        $id
    ));
    $data = $req->fetch();
    return $data;
}


function expenses_edit($id ,  $office_id ,  $office_id_counter_year_month ,  $office_id_counter_year_trimestre ,  $office_id_counter ,  $my_ref ,  $father_id ,  $category_code ,  $invoice_number ,  $budget_id ,  $credit_note_id ,  $provider_id ,  $seller_id ,  $clon_from_id ,  $title ,  $addresses_billing ,  $addresses_delivery ,  $date ,  $date_registre ,  $deadline ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $code ,  $type ,  $every ,  $times ,  $date_start ,  $date_end ,  $order_by ,  $status   ) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `office_id` =:office_id, `office_id_counter_year_month` =:office_id_counter_year_month, `office_id_counter_year_trimestre` =:office_id_counter_year_trimestre, `office_id_counter` =:office_id_counter, `my_ref` =:my_ref, `father_id` =:father_id, `category_code` =:category_code, `invoice_number` =:invoice_number, `budget_id` =:budget_id, `credit_note_id` =:credit_note_id, `provider_id` =:provider_id, `seller_id` =:seller_id, `clon_from_id` =:clon_from_id, `title` =:title, `addresses_billing` =:addresses_billing, `addresses_delivery` =:addresses_delivery, `date` =:date, `date_registre` =:date_registre, `deadline` =:deadline, `total` =:total, `tax` =:tax, `advance` =:advance, `balance` =:balance, `comments` =:comments, `comments_private` =:comments_private, `r1` =:r1, `r2` =:r2, `r3` =:r3, `fc` =:fc, `date_update` =:date_update, `days` =:days, `ce` =:ce, `code` =:code, `type` =:type, `every` =:every, `times` =:times, `date_start` =:date_start, `date_end` =:date_end, `order_by` =:order_by, `status` =:status  WHERE `id`=:id ");
    $req->execute(array(
 "id" =>$id ,  
 "office_id" =>$office_id ,  
 "office_id_counter_year_month" =>$office_id_counter_year_month ,  
 "office_id_counter_year_trimestre" =>$office_id_counter_year_trimestre ,  
 "office_id_counter" =>$office_id_counter ,  
 "my_ref" =>$my_ref ,  
 "father_id" =>$father_id ,  
 "category_code" =>$category_code ,  
 "invoice_number" =>$invoice_number ,  
 "budget_id" =>$budget_id ,  
 "credit_note_id" =>$credit_note_id ,  
 "provider_id" =>$provider_id ,  
 "seller_id" =>$seller_id ,  
 "clon_from_id" =>$clon_from_id ,  
 "title" =>$title ,  
 "addresses_billing" =>$addresses_billing ,  
 "addresses_delivery" =>$addresses_delivery ,  
 "date" =>$date ,  
 "date_registre" =>$date_registre ,  
 "deadline" =>$deadline ,  
 "total" =>$total ,  
 "tax" =>$tax ,  
 "advance" =>$advance ,  
 "balance" =>$balance ,  
 "comments" =>$comments ,  
 "comments_private" =>$comments_private ,  
 "r1" =>$r1 ,  
 "r2" =>$r2 ,  
 "r3" =>$r3 ,  
 "fc" =>$fc ,  
 "date_update" =>$date_update ,  
 "days" =>$days ,  
 "ce" =>$ce ,  
 "code" =>$code ,  
 "type" =>$type ,  
 "every" =>$every ,  
 "times" =>$times ,  
 "date_start" =>$date_start ,  
 "date_end" =>$date_end ,  
 "order_by" =>$order_by ,  
 "status" =>$status ,  

));
}

function expenses_add($office_id ,  $office_id_counter_year_month ,  $office_id_counter_year_trimestre ,  $office_id_counter ,  $my_ref ,  $father_id ,  $category_code ,  $invoice_number ,  $budget_id ,  $credit_note_id ,  $provider_id ,  $seller_id ,  $clon_from_id ,  $title ,  $addresses_billing ,  $addresses_delivery ,  $date ,  $date_registre ,  $deadline ,  $total ,  $tax ,  $advance ,  $balance ,  $comments ,  $comments_private ,  $r1 ,  $r2 ,  $r3 ,  $fc ,  $date_update ,  $days ,  $ce ,  $code ,  $type ,  $every ,  $times ,  $date_start ,  $date_end ,  $order_by ,  $status   ) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses` ( `id` ,   `office_id` ,   `office_id_counter_year_month` ,   `office_id_counter_year_trimestre` ,   `office_id_counter` ,   `my_ref` ,   `father_id` ,   `category_code` ,   `invoice_number` ,   `budget_id` ,   `credit_note_id` ,   `provider_id` ,   `seller_id` ,   `clon_from_id` ,   `title` ,   `addresses_billing` ,   `addresses_delivery` ,   `date` ,   `date_registre` ,   `deadline` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `code` ,   `type` ,   `every` ,   `times` ,   `date_start` ,   `date_end` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :office_id ,  :office_id_counter_year_month ,  :office_id_counter_year_trimestre ,  :office_id_counter ,  :my_ref ,  :father_id ,  :category_code ,  :invoice_number ,  :budget_id ,  :credit_note_id ,  :provider_id ,  :seller_id ,  :clon_from_id ,  :title ,  :addresses_billing ,  :addresses_delivery ,  :date ,  :date_registre ,  :deadline ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :code ,  :type ,  :every ,  :times ,  :date_start ,  :date_end ,  :order_by ,  :status   ) ");

    $req->execute(array(

 "id" => null ,  
 "office_id" => $office_id ,  
 "office_id_counter_year_month" => $office_id_counter_year_month ,  
 "office_id_counter_year_trimestre" => $office_id_counter_year_trimestre ,  
 "office_id_counter" => $office_id_counter ,  
 "my_ref" => $my_ref ,  
 "father_id" => $father_id ,  
 "category_code" => $category_code ,  
 "invoice_number" => $invoice_number ,  
 "budget_id" => $budget_id ,  
 "credit_note_id" => $credit_note_id ,  
 "provider_id" => $provider_id ,  
 "seller_id" => $seller_id ,  
 "clon_from_id" => $clon_from_id ,  
 "title" => $title ,  
 "addresses_billing" => $addresses_billing ,  
 "addresses_delivery" => $addresses_delivery ,  
 "date" => $date ,  
 "date_registre" => $date_registre ,  
 "deadline" => $deadline ,  
 "total" => $total ,  
 "tax" => $tax ,  
 "advance" => $advance ,  
 "balance" => $balance ,  
 "comments" => $comments ,  
 "comments_private" => $comments_private ,  
 "r1" => $r1 ,  
 "r2" => $r2 ,  
 "r3" => $r3 ,  
 "fc" => $fc ,  
 "date_update" => $date_update ,  
 "days" => $days ,  
 "ce" => $ce ,  
 "code" => $code ,  
 "type" => $type ,  
 "every" => $every ,  
 "times" => $times ,  
 "date_start" => $date_start ,  
 "date_end" => $date_end ,  
 "order_by" => $order_by ,  
 "status" => $status   
                        
            )
    );
    
     return $db->lastInsertId();
}

// SEARCH
function expenses_search($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `office_id`,  `office_id_counter_year_month`,  `office_id_counter_year_trimestre`,  `office_id_counter`,  `my_ref`,  `father_id`,  `category_code`,  `invoice_number`,  `budget_id`,  `credit_note_id`,  `provider_id`,  `seller_id`,  `clon_from_id`,  `title`,  `addresses_billing`,  `addresses_delivery`,  `date`,  `date_registre`,  `deadline`,  `total`,  `tax`,  `advance`,  `balance`,  `comments`,  `comments_private`,  `r1`,  `r2`,  `r3`,  `fc`,  `date_update`,  `days`,  `ce`,  `code`,  `type`,  `every`,  `times`,  `date_start`,  `date_end`,  `order_by`,  `status`    
            FROM `expenses` 
            WHERE `id` = :txt OR `id` like :txt
OR `office_id` like :txt
OR `office_id_counter_year_month` like :txt
OR `office_id_counter_year_trimestre` like :txt
OR `office_id_counter` like :txt
OR `my_ref` like :txt
OR `father_id` like :txt
OR `category_code` like :txt
OR `invoice_number` like :txt
OR `budget_id` like :txt
OR `credit_note_id` like :txt
OR `provider_id` like :txt
OR `seller_id` like :txt
OR `clon_from_id` like :txt
OR `title` like :txt
OR `addresses_billing` like :txt
OR `addresses_delivery` like :txt
OR `date` like :txt
OR `date_registre` like :txt
OR `deadline` like :txt
OR `total` like :txt
OR `tax` like :txt
OR `advance` like :txt
OR `balance` like :txt
OR `comments` like :txt
OR `comments_private` like :txt
OR `r1` like :txt
OR `r2` like :txt
OR `r3` like :txt
OR `fc` like :txt
OR `date_update` like :txt
OR `days` like :txt
OR `ce` like :txt
OR `code` like :txt
OR `type` like :txt
OR `every` like :txt
OR `times` like :txt
OR `date_start` like :txt
OR `date_end` like :txt
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

function expenses_select($k, $values_to_show = array(), $selected = "", $disabled = array()) {
    $c = "";
    foreach (expenses_list() as $key => $value) {
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
function expenses_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `expenses` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

// SEARCH
function expenses_search_by($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    
    $data = null;
    
    $sql = "SELECT `id`,  `office_id`,  `office_id_counter_year_month`,  `office_id_counter_year_trimestre`,  `office_id_counter`,  `my_ref`,  `father_id`,  `category_code`,  `invoice_number`,  `budget_id`,  `credit_note_id`,  `provider_id`,  `seller_id`,  `clon_from_id`,  `title`,  `addresses_billing`,  `addresses_delivery`,  `date`,  `date_registre`,  `deadline`,  `total`,  `tax`,  `advance`,  `balance`,  `comments`,  `comments_private`,  `r1`,  `r2`,  `r3`,  `fc`,  `date_update`,  `days`,  `ce`,  `code`,  `type`,  `every`,  `times`,  `date_start`,  `date_end`,  `order_by`,  `status`    FROM `expenses` 

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

function expenses_db_show_col_from_table($c) {
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
function expenses_db_col_list_from_table($c){
    $list = array();
    foreach (expenses_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);   
    }
    return $list;
}
//
//
function expenses_update_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_office_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `office_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_office_id_counter_year_month($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `office_id_counter_year_month`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_office_id_counter_year_trimestre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `office_id_counter_year_trimestre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_office_id_counter($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `office_id_counter`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_my_ref($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `my_ref`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_father_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `father_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_category_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `category_code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_invoice_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `invoice_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_budget_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `budget_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_credit_note_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `credit_note_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_provider_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `provider_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_seller_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `seller_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_clon_from_id($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `clon_from_id`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_title($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `title`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_addresses_billing($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `addresses_billing`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_addresses_delivery($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `addresses_delivery`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_date($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `date`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_date_registre($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `date_registre`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_deadline($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `deadline`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_total($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `total`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_tax($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `tax`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_advance($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `advance`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_balance($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `balance`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_comments($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `comments`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_comments_private($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `comments_private`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_r1($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `r1`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_r2($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `r2`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_r3($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `r3`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_fc($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `fc`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_date_update($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `date_update`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_days($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `days`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_ce($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `ce`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_code($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `code`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_type($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `type`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_every($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `every`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_times($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `times`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_date_start($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `date_start`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_date_end($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `date_end`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_order_by($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `order_by`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//
function expenses_update_status($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `status`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}
//

//
function expenses_update_field($id, $field, $new_data) {
    switch ($field) {
        case "id":
            expenses_update_id($id, $new_data);
            break;

        case "office_id":
            expenses_update_office_id($id, $new_data);
            break;

        case "office_id_counter_year_month":
            expenses_update_office_id_counter_year_month($id, $new_data);
            break;

        case "office_id_counter_year_trimestre":
            expenses_update_office_id_counter_year_trimestre($id, $new_data);
            break;

        case "office_id_counter":
            expenses_update_office_id_counter($id, $new_data);
            break;

        case "my_ref":
            expenses_update_my_ref($id, $new_data);
            break;

        case "father_id":
            expenses_update_father_id($id, $new_data);
            break;

        case "category_code":
            expenses_update_category_code($id, $new_data);
            break;

        case "invoice_number":
            expenses_update_invoice_number($id, $new_data);
            break;

        case "budget_id":
            expenses_update_budget_id($id, $new_data);
            break;

        case "credit_note_id":
            expenses_update_credit_note_id($id, $new_data);
            break;

        case "provider_id":
            expenses_update_provider_id($id, $new_data);
            break;

        case "seller_id":
            expenses_update_seller_id($id, $new_data);
            break;

        case "clon_from_id":
            expenses_update_clon_from_id($id, $new_data);
            break;

        case "title":
            expenses_update_title($id, $new_data);
            break;

        case "addresses_billing":
            expenses_update_addresses_billing($id, $new_data);
            break;

        case "addresses_delivery":
            expenses_update_addresses_delivery($id, $new_data);
            break;

        case "date":
            expenses_update_date($id, $new_data);
            break;

        case "date_registre":
            expenses_update_date_registre($id, $new_data);
            break;

        case "deadline":
            expenses_update_deadline($id, $new_data);
            break;

        case "total":
            expenses_update_total($id, $new_data);
            break;

        case "tax":
            expenses_update_tax($id, $new_data);
            break;

        case "advance":
            expenses_update_advance($id, $new_data);
            break;

        case "balance":
            expenses_update_balance($id, $new_data);
            break;

        case "comments":
            expenses_update_comments($id, $new_data);
            break;

        case "comments_private":
            expenses_update_comments_private($id, $new_data);
            break;

        case "r1":
            expenses_update_r1($id, $new_data);
            break;

        case "r2":
            expenses_update_r2($id, $new_data);
            break;

        case "r3":
            expenses_update_r3($id, $new_data);
            break;

        case "fc":
            expenses_update_fc($id, $new_data);
            break;

        case "date_update":
            expenses_update_date_update($id, $new_data);
            break;

        case "days":
            expenses_update_days($id, $new_data);
            break;

        case "ce":
            expenses_update_ce($id, $new_data);
            break;

        case "code":
            expenses_update_code($id, $new_data);
            break;

        case "type":
            expenses_update_type($id, $new_data);
            break;

        case "every":
            expenses_update_every($id, $new_data);
            break;

        case "times":
            expenses_update_times($id, $new_data);
            break;

        case "date_start":
            expenses_update_date_start($id, $new_data);
            break;

        case "date_end":
            expenses_update_date_end($id, $new_data);
            break;

        case "order_by":
            expenses_update_order_by($id, $new_data);
            break;

        case "status":
            expenses_update_status($id, $new_data);
            break;


        default:
            break;
    }
}
//
function expenses_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM `expenses` WHERE `id` =? ");
    $req->execute(array($id));
}
//
// To modify this function
// Copy tis function in /www_extended/expenses/functions.php
// and comment here (this function)
function expenses_add_filter($col_name, $value, $filtre = NULL) {
    
    switch ($col_name) {
        case "id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "office_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "office_id_counter_year_month":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "office_id_counter_year_trimestre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "office_id_counter":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "my_ref":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "father_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "category_code":
            //return expenses_categories_field_id("code", $value);
            return ($filtre) ?? $value;                
            break; 
        case "invoice_number":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "budget_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "credit_note_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "provider_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "seller_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "clon_from_id":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "title":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "addresses_billing":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "addresses_delivery":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_registre":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "deadline":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "total":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "tax":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "advance":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "balance":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "comments":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "comments_private":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "r1":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "r2":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "r3":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "fc":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_update":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "days":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "ce":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "code":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "type":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "every":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "times":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_start":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "date_end":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "order_by":
            //return _field_id("", $value);
            return ($filtre) ?? $value;                
            break; 
        case "status":
            //return expenses_status_field_id("code", $value);
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
function expenses_exists_id($id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `id` FROM `expenses` WHERE   `id` = ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_office_id($office_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `office_id` FROM `expenses` WHERE   `office_id` = ?");
    $req->execute(array($office_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_office_id_counter_year_month($office_id_counter_year_month){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `office_id_counter_year_month` FROM `expenses` WHERE   `office_id_counter_year_month` = ?");
    $req->execute(array($office_id_counter_year_month));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_office_id_counter_year_trimestre($office_id_counter_year_trimestre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `office_id_counter_year_trimestre` FROM `expenses` WHERE   `office_id_counter_year_trimestre` = ?");
    $req->execute(array($office_id_counter_year_trimestre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_office_id_counter($office_id_counter){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `office_id_counter` FROM `expenses` WHERE   `office_id_counter` = ?");
    $req->execute(array($office_id_counter));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_my_ref($my_ref){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `my_ref` FROM `expenses` WHERE   `my_ref` = ?");
    $req->execute(array($my_ref));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_father_id($father_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `father_id` FROM `expenses` WHERE   `father_id` = ?");
    $req->execute(array($father_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_category_code($category_code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `category_code` FROM `expenses` WHERE   `category_code` = ?");
    $req->execute(array($category_code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_invoice_number($invoice_number){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `invoice_number` FROM `expenses` WHERE   `invoice_number` = ?");
    $req->execute(array($invoice_number));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_budget_id($budget_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `budget_id` FROM `expenses` WHERE   `budget_id` = ?");
    $req->execute(array($budget_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_credit_note_id($credit_note_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `credit_note_id` FROM `expenses` WHERE   `credit_note_id` = ?");
    $req->execute(array($credit_note_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_provider_id($provider_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `provider_id` FROM `expenses` WHERE   `provider_id` = ?");
    $req->execute(array($provider_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_seller_id($seller_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `seller_id` FROM `expenses` WHERE   `seller_id` = ?");
    $req->execute(array($seller_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_clon_from_id($clon_from_id){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `clon_from_id` FROM `expenses` WHERE   `clon_from_id` = ?");
    $req->execute(array($clon_from_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_title($title){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `title` FROM `expenses` WHERE   `title` = ?");
    $req->execute(array($title));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_addresses_billing($addresses_billing){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `addresses_billing` FROM `expenses` WHERE   `addresses_billing` = ?");
    $req->execute(array($addresses_billing));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_addresses_delivery($addresses_delivery){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `addresses_delivery` FROM `expenses` WHERE   `addresses_delivery` = ?");
    $req->execute(array($addresses_delivery));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_date($date){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date` FROM `expenses` WHERE   `date` = ?");
    $req->execute(array($date));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_date_registre($date_registre){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_registre` FROM `expenses` WHERE   `date_registre` = ?");
    $req->execute(array($date_registre));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_deadline($deadline){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `deadline` FROM `expenses` WHERE   `deadline` = ?");
    $req->execute(array($deadline));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_total($total){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `expenses` WHERE   `total` = ?");
    $req->execute(array($total));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_tax($tax){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax` FROM `expenses` WHERE   `tax` = ?");
    $req->execute(array($tax));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_advance($advance){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `advance` FROM `expenses` WHERE   `advance` = ?");
    $req->execute(array($advance));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_balance($balance){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `balance` FROM `expenses` WHERE   `balance` = ?");
    $req->execute(array($balance));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_comments($comments){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `comments` FROM `expenses` WHERE   `comments` = ?");
    $req->execute(array($comments));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_comments_private($comments_private){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `comments_private` FROM `expenses` WHERE   `comments_private` = ?");
    $req->execute(array($comments_private));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_r1($r1){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `r1` FROM `expenses` WHERE   `r1` = ?");
    $req->execute(array($r1));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_r2($r2){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `r2` FROM `expenses` WHERE   `r2` = ?");
    $req->execute(array($r2));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_r3($r3){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `r3` FROM `expenses` WHERE   `r3` = ?");
    $req->execute(array($r3));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_fc($fc){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `fc` FROM `expenses` WHERE   `fc` = ?");
    $req->execute(array($fc));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_date_update($date_update){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_update` FROM `expenses` WHERE   `date_update` = ?");
    $req->execute(array($date_update));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_days($days){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `days` FROM `expenses` WHERE   `days` = ?");
    $req->execute(array($days));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_ce($ce){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `ce` FROM `expenses` WHERE   `ce` = ?");
    $req->execute(array($ce));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_code($code){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `code` FROM `expenses` WHERE   `code` = ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_type($type){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `type` FROM `expenses` WHERE   `type` = ?");
    $req->execute(array($type));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_every($every){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `every` FROM `expenses` WHERE   `every` = ?");
    $req->execute(array($every));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_times($times){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `times` FROM `expenses` WHERE   `times` = ?");
    $req->execute(array($times));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_date_start($date_start){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_start` FROM `expenses` WHERE   `date_start` = ?");
    $req->execute(array($date_start));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_date_end($date_end){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `date_end` FROM `expenses` WHERE   `date_end` = ?");
    $req->execute(array($date_end));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_order_by($order_by){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_by` FROM `expenses` WHERE   `order_by` = ?");
    $req->execute(array($order_by));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}

function expenses_exists_status($status){
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `status` FROM `expenses` WHERE   `status` = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0]))? $data[0] :  false; 
}


//        
//        
//    

function expenses_is_id($id){
     return (is_id($id) )? true : false ;
}

function expenses_is_office_id($office_id){
     return true;
}

function expenses_is_office_id_counter_year_month($office_id_counter_year_month){
     return true;
}

function expenses_is_office_id_counter_year_trimestre($office_id_counter_year_trimestre){
     return true;
}

function expenses_is_office_id_counter($office_id_counter){
     return true;
}

function expenses_is_my_ref($my_ref){
     return true;
}

function expenses_is_father_id($father_id){
     return true;
}

function expenses_is_category_code($category_code){
     return true;
}

function expenses_is_invoice_number($invoice_number){
     return true;
}

function expenses_is_budget_id($budget_id){
     return true;
}

function expenses_is_credit_note_id($credit_note_id){
     return true;
}

function expenses_is_provider_id($provider_id){
     return true;
}

function expenses_is_seller_id($seller_id){
     return true;
}

function expenses_is_clon_from_id($clon_from_id){
     return true;
}

function expenses_is_title($title){
     return true;
}

function expenses_is_addresses_billing($addresses_billing){
     return true;
}

function expenses_is_addresses_delivery($addresses_delivery){
     return true;
}

function expenses_is_date($date){
     return true;
}

function expenses_is_date_registre($date_registre){
     return true;
}

function expenses_is_deadline($deadline){
     return true;
}

function expenses_is_total($total){
     return true;
}

function expenses_is_tax($tax){
     return true;
}

function expenses_is_advance($advance){
     return true;
}

function expenses_is_balance($balance){
     return true;
}

function expenses_is_comments($comments){
     return true;
}

function expenses_is_comments_private($comments_private){
     return true;
}

function expenses_is_r1($r1){
     return true;
}

function expenses_is_r2($r2){
     return true;
}

function expenses_is_r3($r3){
     return true;
}

function expenses_is_fc($fc){
     return true;
}

function expenses_is_date_update($date_update){
     return true;
}

function expenses_is_days($days){
     return true;
}

function expenses_is_ce($ce){
     return true;
}

function expenses_is_code($code){
     return true;
}

function expenses_is_type($type){
     return true;
}

function expenses_is_every($every){
     return true;
}

function expenses_is_times($times){
     return true;
}

function expenses_is_date_start($date_start){
     return true;
}

function expenses_is_date_end($date_end){
     return true;
}

function expenses_is_order_by($order_by){
     return (is_order_by($order_by) )? true : false ;
}

function expenses_is_status($status){
     return (is_status($status) )? true : false ;
}


//
//
function expenses_db_is_col_from_table($col, $table) {

    $is = false;

    if ($col == "") {
        $is = false;
    }

    if (in_array($col, expenses_db_col_list_from_table($table))) {
        $is = true;
    }

    return $is;
}
//
//
//
function expenses_is_field($field, $value) {
    $is = false;

    switch ($field) {
     case "id":
            $is = (expenses_is_id($value)) ? true : false;
            break;
     case "office_id":
            $is = (expenses_is_office_id($value)) ? true : false;
            break;
     case "office_id_counter_year_month":
            $is = (expenses_is_office_id_counter_year_month($value)) ? true : false;
            break;
     case "office_id_counter_year_trimestre":
            $is = (expenses_is_office_id_counter_year_trimestre($value)) ? true : false;
            break;
     case "office_id_counter":
            $is = (expenses_is_office_id_counter($value)) ? true : false;
            break;
     case "my_ref":
            $is = (expenses_is_my_ref($value)) ? true : false;
            break;
     case "father_id":
            $is = (expenses_is_father_id($value)) ? true : false;
            break;
     case "category_code":
            $is = (expenses_is_category_code($value)) ? true : false;
            break;
     case "invoice_number":
            $is = (expenses_is_invoice_number($value)) ? true : false;
            break;
     case "budget_id":
            $is = (expenses_is_budget_id($value)) ? true : false;
            break;
     case "credit_note_id":
            $is = (expenses_is_credit_note_id($value)) ? true : false;
            break;
     case "provider_id":
            $is = (expenses_is_provider_id($value)) ? true : false;
            break;
     case "seller_id":
            $is = (expenses_is_seller_id($value)) ? true : false;
            break;
     case "clon_from_id":
            $is = (expenses_is_clon_from_id($value)) ? true : false;
            break;
     case "title":
            $is = (expenses_is_title($value)) ? true : false;
            break;
     case "addresses_billing":
            $is = (expenses_is_addresses_billing($value)) ? true : false;
            break;
     case "addresses_delivery":
            $is = (expenses_is_addresses_delivery($value)) ? true : false;
            break;
     case "date":
            $is = (expenses_is_date($value)) ? true : false;
            break;
     case "date_registre":
            $is = (expenses_is_date_registre($value)) ? true : false;
            break;
     case "deadline":
            $is = (expenses_is_deadline($value)) ? true : false;
            break;
     case "total":
            $is = (expenses_is_total($value)) ? true : false;
            break;
     case "tax":
            $is = (expenses_is_tax($value)) ? true : false;
            break;
     case "advance":
            $is = (expenses_is_advance($value)) ? true : false;
            break;
     case "balance":
            $is = (expenses_is_balance($value)) ? true : false;
            break;
     case "comments":
            $is = (expenses_is_comments($value)) ? true : false;
            break;
     case "comments_private":
            $is = (expenses_is_comments_private($value)) ? true : false;
            break;
     case "r1":
            $is = (expenses_is_r1($value)) ? true : false;
            break;
     case "r2":
            $is = (expenses_is_r2($value)) ? true : false;
            break;
     case "r3":
            $is = (expenses_is_r3($value)) ? true : false;
            break;
     case "fc":
            $is = (expenses_is_fc($value)) ? true : false;
            break;
     case "date_update":
            $is = (expenses_is_date_update($value)) ? true : false;
            break;
     case "days":
            $is = (expenses_is_days($value)) ? true : false;
            break;
     case "ce":
            $is = (expenses_is_ce($value)) ? true : false;
            break;
     case "code":
            $is = (expenses_is_code($value)) ? true : false;
            break;
     case "type":
            $is = (expenses_is_type($value)) ? true : false;
            break;
     case "every":
            $is = (expenses_is_every($value)) ? true : false;
            break;
     case "times":
            $is = (expenses_is_times($value)) ? true : false;
            break;
     case "date_start":
            $is = (expenses_is_date_start($value)) ? true : false;
            break;
     case "date_end":
            $is = (expenses_is_date_end($value)) ? true : false;
            break;
     case "order_by":
            $is = (expenses_is_order_by($value)) ? true : false;
            break;
     case "status":
            $is = (expenses_is_status($value)) ? true : false;
            break;

        
        default:
            $is = false;
            break;
    }

    return $is;
}
//

function expenses_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'id':
                echo '<th><a href="index.php?c=expenses&a=details&id='.$col_to_show.'">' . $col_to_show . '</a></th>';
                break;

case 'office_id':
                echo '<th>' . _tr(ucfirst('office_id')) . '</th>';
                break;
case 'office_id_counter_year_month':
                echo '<th>' . _tr(ucfirst('office_id_counter_year_month')) . '</th>';
                break;
case 'office_id_counter_year_trimestre':
                echo '<th>' . _tr(ucfirst('office_id_counter_year_trimestre')) . '</th>';
                break;
case 'office_id_counter':
                echo '<th>' . _tr(ucfirst('office_id_counter')) . '</th>';
                break;
case 'my_ref':
                echo '<th>' . _tr(ucfirst('my_ref')) . '</th>';
                break;
case 'father_id':
                echo '<th>' . _tr(ucfirst('father_id')) . '</th>';
                break;
case 'category_code':
                echo '<th>' . _tr(ucfirst('category_code')) . '</th>';
                break;
case 'invoice_number':
                echo '<th>' . _tr(ucfirst('invoice_number')) . '</th>';
                break;
case 'budget_id':
                echo '<th>' . _tr(ucfirst('budget_id')) . '</th>';
                break;
case 'credit_note_id':
                echo '<th>' . _tr(ucfirst('credit_note_id')) . '</th>';
                break;
case 'provider_id':
                echo '<th>' . _tr(ucfirst('provider_id')) . '</th>';
                break;
case 'seller_id':
                echo '<th>' . _tr(ucfirst('seller_id')) . '</th>';
                break;
case 'clon_from_id':
                echo '<th>' . _tr(ucfirst('clon_from_id')) . '</th>';
                break;
case 'title':
                echo '<th>' . _tr(ucfirst('title')) . '</th>';
                break;
case 'addresses_billing':
                echo '<th>' . _tr(ucfirst('addresses_billing')) . '</th>';
                break;
case 'addresses_delivery':
                echo '<th>' . _tr(ucfirst('addresses_delivery')) . '</th>';
                break;
case 'date':
                echo '<th>' . _tr(ucfirst('date')) . '</th>';
                break;
case 'date_registre':
                echo '<th>' . _tr(ucfirst('date_registre')) . '</th>';
                break;
case 'deadline':
                echo '<th>' . _tr(ucfirst('deadline')) . '</th>';
                break;
case 'total':
                echo '<th>' . _tr(ucfirst('total')) . '</th>';
                break;
case 'tax':
                echo '<th>' . _tr(ucfirst('tax')) . '</th>';
                break;
case 'advance':
                echo '<th>' . _tr(ucfirst('advance')) . '</th>';
                break;
case 'balance':
                echo '<th>' . _tr(ucfirst('balance')) . '</th>';
                break;
case 'comments':
                echo '<th>' . _tr(ucfirst('comments')) . '</th>';
                break;
case 'comments_private':
                echo '<th>' . _tr(ucfirst('comments_private')) . '</th>';
                break;
case 'r1':
                echo '<th>' . _tr(ucfirst('r1')) . '</th>';
                break;
case 'r2':
                echo '<th>' . _tr(ucfirst('r2')) . '</th>';
                break;
case 'r3':
                echo '<th>' . _tr(ucfirst('r3')) . '</th>';
                break;
case 'fc':
                echo '<th>' . _tr(ucfirst('fc')) . '</th>';
                break;
case 'date_update':
                echo '<th>' . _tr(ucfirst('date_update')) . '</th>';
                break;
case 'days':
                echo '<th>' . _tr(ucfirst('days')) . '</th>';
                break;
case 'ce':
                echo '<th>' . _tr(ucfirst('ce')) . '</th>';
                break;
case 'code':
                echo '<th>' . _tr(ucfirst('code')) . '</th>';
                break;
case 'type':
                echo '<th>' . _tr(ucfirst('type')) . '</th>';
                break;
case 'every':
                echo '<th>' . _tr(ucfirst('every')) . '</th>';
                break;
case 'times':
                echo '<th>' . _tr(ucfirst('times')) . '</th>';
                break;
case 'date_start':
                echo '<th>' . _tr(ucfirst('date_start')) . '</th>';
                break;
case 'date_end':
                echo '<th>' . _tr(ucfirst('date_end')) . '</th>';
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

function expenses_index_generate_column_body_td($expenses, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=expenses&a=details&id=' . $expenses[$col] . '">' . $expenses[$col] . '</a></td>';
                break;
                


case 'id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'office_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'office_id_counter_year_month':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'office_id_counter_year_trimestre':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'office_id_counter':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'my_ref':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'father_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'category_code':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'invoice_number':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'budget_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'credit_note_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'provider_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'seller_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'clon_from_id':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'title':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'addresses_billing':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'addresses_delivery':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'date':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'date_registre':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'deadline':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'total':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'tax':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'advance':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'balance':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'comments':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'comments_private':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'r1':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'r2':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'r3':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'fc':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'date_update':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'days':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'ce':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'code':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'type':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'every':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'times':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'date_start':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'date_end':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'order_by':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
case 'status':
                echo '<td>' . ($expenses[$col]) . '</td>';
                break;
            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=expenses&a=details&id=' . $expenses['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class = "btn btn-sm btn-primary" href = "index.php?c=expenses&a=details_payement&id=' . $expenses['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;


            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses&a=edit&id=' . $expenses['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_delete':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=expenses&a=ok_delete&id=' . $expenses['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;
                

            case 'button_print':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=export_pdf&id=' . $expenses['id'] . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a class = "btn btn-sm btn-default" href = "index.php?c=expenses&a=export_pdf&way=pdf&&id=' . $expenses['id'] . '">' . icon("floppy-save") . '</a></td > ';
                break;

    
    default:
    echo '<td>' . ($expenses[$col]) . '</td>';
                break;
        }
    }
}




//
//        
################################################################################
################################################################################
################################################################################
