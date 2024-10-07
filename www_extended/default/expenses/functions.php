<?php

function expenses_order_by($order_col, $order_way) {

    $order = array("col" => 'id', "way" => 'desc');

    $config_expenses_order_col_json = _options_option('config_expenses_order_col');

    $order_array = is_json($config_expenses_order_col_json) ? json_decode($config_expenses_order_col_json, true) : [];

// si no es una columna de la tabla, pasara a id por defecto 
    if (isset($order_array) && !magia_db_is_col_from_table($order_array['order_col'], 'expenses')) {
        $order['col'] = 'id';
    } else {
        $order['col'] = $order_array['order_col'];
    }

    switch ($order_array['order_way']) {
        case 'desc':
            $order['way'] = 'desc';
            break;

        case 'asc':
            $order['way'] = 'asc';
            break;

        default:
            $order['way'] = 'desc';
            break;
    }

    return $order;
}

// SEARCH
function expenses_search_full($txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;


    $data = null;
    $sql = "SELECT 
       
        `e`.`id` ,
         `e`.`office_id` ,
         `e`.`office_id_counter` ,
         `e`.`office_id_counter_year_month` ,
         `e`.`office_id_counter_year_trimestre` ,
         `e`.`my_ref` ,
         `e`.`father_id` ,
         `e`.`category_code` ,
         `e`.`invoice_number` ,
         `e`.`budget_id` ,
         `e`.`credit_note_id` ,
         `e`.`provider_id` ,
         `e`.`seller_id` ,
         `e`.`clon_from_id` ,
         `e`.`title` ,
         `e`.`addresses_billing` ,
         `e`.`addresses_delivery` ,
         `e`.`date` ,
         `e`.`date_registre` ,
         `e`.`deadline` ,
         `e`.`total` ,
         `e`.`tax` ,
                
        (`e`.`total` + `e`.`tax`) as tvac,              
        `e`.`advance`,  
        
        CASE
            WHEN `e`.`advance` IS NULL  THEN (`e`.`total` + `e`.`tax`)
            WHEN `e`.`advance` = 0      THEN (`e`.`total` + `e`.`tax`)
            WHEN `e`.`advance` < 0      THEN (`e`.`total` + `e`.`tax`) - ABS(`e`.`advance`)
        END as balance, 
        
       
         `e`.`comments` ,
         
         `e`.`comments_private` ,
         `e`.`r1` ,
         `e`.`r2` ,
         `e`.`r3` ,
         `e`.`fc` ,
         `e`.`date_update` ,
         `e`.`days` ,
         `e`.`ce` ,
         `e`.`code` ,
         `e`.`type` ,
         `e`.`every` ,
         `e`.`times` ,
         `e`.`date_start` ,
         `e`.`date_end` ,
         `e`.`order_by` ,
         `e`.`status` ,
         
        `c`.`id` as contact_id , 
        `c`.`name`,
        `c`.`lastname`
        

FROM `expenses` as e

INNER JOIN `contacts`  as c on provider_id = c.id

WHERE    
   `c`.`name` like :txt
OR `c`.`lastname` like :txt

OR `e`.`id` like :txt
OR `e`.`office_id` like :txt
OR `e`.`my_ref` like :txt
OR `e`.`father_id` like :txt
OR `e`.`category_code` like :txt
OR `e`.`invoice_number` like :txt
OR `e`.`budget_id` like :txt
OR `e`.`credit_note_id` like :txt
OR `e`.`provider_id` like :txt
OR `e`.`seller_id` like :txt
OR `e`.`clon_from_id` like :txt
OR `e`.`title` like :txt
OR `e`.`addresses_billing` like :txt
OR `e`.`addresses_delivery` like :txt
OR `e`.`date` like :txt
OR `e`.`date_registre` like :txt
OR `e`.`deadline` like :txt
OR `e`.`total` like :txt
OR `e`.`tax` like :txt
OR `e`.`advance` like :txt
OR `e`.`balance` like :txt
OR `e`.`comments` like :txt

OR `e`.`comments_private` like :txt
OR `e`.`r1` like :txt
OR `e`.`r2` like :txt
OR `e`.`r3` like :txt
OR `e`.`fc` like :txt
OR `e`.`date_update` like :txt
OR `e`.`days` like :txt
OR `e`.`ce` like :txt
OR `e`.`code` like :txt
OR `e`.`type` like :txt
OR `e`.`every` like :txt
OR `e`.`times` like :txt
OR `e`.`date_start` like :txt
OR `e`.`date_end` like :txt
OR `e`.`order_by` like :txt
OR `e`.`status` like :txt
 
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

// SEARCH
function expenses_search_by_field($field, $txt, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    $data = null;

    $sql = "SELECT 
        *, 
       
        (`total` + `tax`) as tvac,     
        
        `advance`,  
        
        CASE
            WHEN `advance` IS NULL  THEN (`total` + `tax`)
            WHEN `advance` = 0      THEN (`total` + `tax`)
            WHEN `advance` < 0      THEN (`total` + `tax`) - ABS(`advance`)
        END as balance 
                                                               
        
    FROM `expenses` 
    
    WHERE `$field` = '$txt' 
        
    ORDER BY $order_col $order_way 
    
        
    Limit  $limit OFFSET $start
";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function expense_status_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `$field` FROM `contacts` WHERE `id`= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_add_short($provider_id, $invoice_number) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses` ( `id` ,   `my_ref` ,   `father_id` ,   `category_code` ,   `invoice_number` ,   `budget_id` ,   `credit_note_id` ,   `provider_id` ,   `seller_id` ,   `clon_from_id` ,   `title` ,   `addresses_billing` ,   `addresses_delivery` ,   `date` ,   `date_registre` ,   `deadline` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `code` ,   `type` ,   `every` ,   `times` ,   `date_start` ,   `date_end` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :my_ref ,  :father_id ,  :category_code ,  :invoice_number ,  :budget_id ,  :credit_note_id ,  :provider_id ,  :seller_id ,  :clon_from_id ,  :title ,  :addresses_billing ,  :addresses_delivery ,  :date ,  :date_registre ,  :deadline ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :code ,  :type ,  :every ,  :times ,  :date_start ,  :date_end ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "my_ref" => null,
        "father_id" => null,
        "category_code" => null,
        "invoice_number" => $invoice_number,
        "budget_id" => null,
        "credit_note_id" => null,
        "provider_id" => $provider_id,
        "seller_id" => null,
        "clon_from_id" => null,
        "title" => null,
        "addresses_billing" => null,
        "addresses_delivery" => null,
        "date" => null,
        "date_registre" => date("Y-m-d H:m:s"),
        "deadline" => null,
        "total" => null,
        "tax" => null,
        "advance" => null,
        "balance" => null,
        "comments" => null,
        "comments_private" => null,
        "r1" => null,
        "r2" => null,
        "r3" => null,
        "fc" => null,
        "date_update" => null,
        "days" => null,
        "ce" => null,
        "code" => magia_uniqid(),
        "type" => null,
        "every" => null,
        "times" => null,
        "date_start" => null,
        "date_end" => null,
        "order_by" => 1,
        "status" => 5
            )
    );

    return $db->lastInsertId();
}

function expenses_search_by_year_trimestre_status($year, $tri, $status_array, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    switch ($tri) {
        case 't1': // enero, feb, marzo
            $m1 = 1;
            $m2 = 2;
            $m3 = 3;
            break;
        case 't2': // abril, mayo, junio
            $m1 = 4;
            $m2 = 5;
            $m3 = 6;
            break;
        case 't3': // julio, agos, sept
            $m1 = 7;
            $m2 = 8;
            $m3 = 9;
            break;
        case 't4': // oct, nov , dic
            $m1 = 10;
            $m2 = 11;
            $m3 = 12;
            break;

        default:
            break;
    }

    switch ($order) {
        case 1:
            $order_by = "id";
            break;
        case 2:
            $order_by = "invoice_number";
            break;
        case 3:
            $order_by = "budget_id";
            break;
        case 4:
            $order_by = "credit_note_id";
            break;
        case 5:
            $order_by = "provider_id";
            break;
        case 6:
            $order_by = "seller_id";
            break;
        case 7:
            $order_by = "clon_from_id";
            break;
        case 8:
            $order_by = "title";
            break;
        case 9:
            $order_by = "addresses_billing";
            break;
        case 10:
            $order_by = "addresses_delivery";
            break;
        case 11:
            $order_by = "date";
            break;
        case 12:
            $order_by = "date_registre";
            break;
        case 13:
            $order_by = "deadline";
            break;
        case 14:
            $order_by = "total";
            break;
        case 15:
            $order_by = "tax";
            break;
        case 16:
            $order_by = "advance";
            break;
        case 17:
            $order_by = "balance";
            break;
        case 18:
            $order_by = "comments";
            break;
        case 19:
            $order_by = "comments_private";
            break;
        case 20:
            $order_by = "r1";
            break;
        case 21:
            $order_by = "r2";
            break;
        case 22:
            $order_by = "r3";
            break;
        case 23:
            $order_by = "fc";
            break;
        case 24:
            $order_by = "date_update";
            break;
        case 25:
            $order_by = "ce";
            break;
        case 26:
            $order_by = "code";
            break;
        case 27:
            $order_by = "type";
            break;
        case 28:
            $order_by = "order_by";
            break;
        case 29:
            $order_by = "status";
            break;
        default:
            $order_by = "id";
            break;
    }

    $status_str = implode(",", $status_array);

    $query = $db->prepare(
            "   SELECT * 
            FROM expenses 
            
            WHERE YEAR(date) =:year AND 
            (
            MONTH(date)=:m1 OR 
            MONTH(date)=:m2 OR 
            MONTH(date)=:m3 
            )
            AND status IN ($status_str)
            ORDER BY $order_by
                         
        ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':m1', (int) $m1, PDO::PARAM_INT);
    $query->bindValue(':m2', (int) $m2, PDO::PARAM_INT);
    $query->bindValue(':m3', (int) $m3, PDO::PARAM_INT);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function expenses_search_by_year_month_status($year, $month, $status_array, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    switch ($order) {
        case 1:
            $order_by = "id";
            break;
        case 2:
            $order_by = "invoice_number";
            break;
        case 3:
            $order_by = "budget_id";
            break;
        case 4:
            $order_by = "credit_note_id";
            break;
        case 5:
            $order_by = "provider_id";
            break;
        case 6:
            $order_by = "seller_id";
            break;
        case 7:
            $order_by = "clon_from_id";
            break;
        case 8:
            $order_by = "title";
            break;
        case 9:
            $order_by = "addresses_billing";
            break;
        case 10:
            $order_by = "addresses_delivery";
            break;
        case 11:
            $order_by = "date";
            break;
        case 12:
            $order_by = "date_registre";
            break;
        case 13:
            $order_by = "deadline";
            break;
        case 14:
            $order_by = "total";
            break;
        case 15:
            $order_by = "tax";
            break;
        case 16:
            $order_by = "advance";
            break;
        case 17:
            $order_by = "balance";
            break;
        case 18:
            $order_by = "comments";
            break;
        case 19:
            $order_by = "comments_private";
            break;
        case 20:
            $order_by = "r1";
            break;
        case 21:
            $order_by = "r2";
            break;
        case 22:
            $order_by = "r3";
            break;
        case 23:
            $order_by = "fc";
            break;
        case 24:
            $order_by = "date_update";
            break;
        case 25:
            $order_by = "ce";
            break;
        case 26:
            $order_by = "code";
            break;
        case 27:
            $order_by = "type";
            break;
        case 28:
            $order_by = "order_by";
            break;
        case 29:
            $order_by = "status";
            break;
        default:
            $order_by = "id";
            break;
    }

    $status_str = implode(",", $status_array);

    $query = $db->prepare(
            "   SELECT * 
            FROM expenses 
            WHERE 
            ((YEAR(date) =:year AND MONTH(date)=:month)   )
            AND status IN ($status_str)
            ORDER BY $order_by
            Limit  :limit OFFSET :start
                         
        ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function expenses_search_by_provider_year_trimestre_status($provider_id, $year, $tri, $status_array, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    switch ($tri) {
        case 't1': // enero, feb, marzo
            $m1 = 1;
            $m2 = 2;
            $m3 = 3;
            break;
        case 't2': // abril, mayo, junio
            $m1 = 4;
            $m2 = 5;
            $m3 = 6;
            break;
        case 't3': // julio, agos, sept
            $m1 = 7;
            $m2 = 8;
            $m3 = 9;
            break;
        case 't4': // oct, nov , dic
            $m1 = 10;
            $m2 = 11;
            $m3 = 12;
            break;

        default:
            break;
    }

//    switch ($order) {
//        case 1:
//            $order_by = "id";
//            break;
//        case 2:
//            $order_by = "invoice_number";
//            break;
//        case 3:
//            $order_by = "budget_id";
//            break;
//        case 4:
//            $order_by = "credit_note_id";
//            break;
//        case 5:
//            $order_by = "provider_id";
//            break;
//        case 6:
//            $order_by = "seller_id";
//            break;
//        case 7:
//            $order_by = "clon_from_id";
//            break;
//        case 8:
//            $order_by = "title";
//            break;
//        case 9:
//            $order_by = "addresses_billing";
//            break;
//        case 10:
//            $order_by = "addresses_delivery";
//            break;
//        case 11:
//            $order_by = "date";
//            break;
//        case 12:
//            $order_by = "date_registre";
//            break;
//        case 13:
//            $order_by = "deadline";
//            break;
//        case 14:
//            $order_by = "total";
//            break;
//        case 15:
//            $order_by = "tax";
//            break;
//        case 16:
//            $order_by = "advance";
//            break;
//        case 17:
//            $order_by = "balance";
//            break;
//        case 18:
//            $order_by = "comments";
//            break;
//        case 19:
//            $order_by = "comments_private";
//            break;
//        case 20:
//            $order_by = "r1";
//            break;
//        case 21:
//            $order_by = "r2";
//            break;
//        case 22:
//            $order_by = "r3";
//            break;
//        case 23:
//            $order_by = "fc";
//            break;
//        case 24:
//            $order_by = "date_update";
//            break;
//        case 25:
//            $order_by = "ce";
//            break;
//        case 26:
//            $order_by = "code";
//            break;
//        case 27:
//            $order_by = "type";
//            break;
//        case 28:
//            $order_by = "order_by";
//            break;
//        case 29:
//            $order_by = "status";
//            break;
//        default:
//            $order_by = "id";
//            break;
//    }

    $status_str = implode(",", $status_array);

    if (strtolower($provider_id) == "all") {
        // uno en especial
        $query = $db->prepare(
                "   SELECT * 
            FROM expenses 
            WHERE 
                (
                YEAR(date) =:year AND 
                    (
                    MONTH(date)=:m1 OR 
                    MONTH(date)=:m2 OR 
                    MONTH(date)=:m3 
                )
                AND status IN ($status_str)
            )
            

        ");
    } else {
        // todos
        $query = $db->prepare(
                "   SELECT * 
            FROM expenses 
            WHERE 
            provider_id = :provider_id 
            AND
                (
                YEAR(date) =:year AND 
                    (
                    MONTH(date)=:m1 OR 
                    MONTH(date)=:m2 OR 
                    MONTH(date)=:m3 
                )
                AND status IN ($status_str)
            )   
            
            ORDER BY $order_col $order_way  
        ");

        $query->bindValue(':provider_id', (int) $provider_id, PDO::PARAM_INT);
    }
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':m1', (int) $m1, PDO::PARAM_INT);
    $query->bindValue(':m2', (int) $m2, PDO::PARAM_INT);
    $query->bindValue(':m3', (int) $m3, PDO::PARAM_INT);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function expenses_search_by_provider_year_month_status($provider_id, $year, $month, $status_array, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

//    switch ($order) {
//        case 1:
//            $order_by = "id";
//            break;
//        case 2:
//            $order_by = "invoice_number";
//            break;
//        case 3:
//            $order_by = "budget_id";
//            break;
//        case 4:
//            $order_by = "credit_note_id";
//            break;
//        case 5:
//            $order_by = "provider_id";
//            break;
//        case 6:
//            $order_by = "seller_id";
//            break;
//        case 7:
//            $order_by = "clon_from_id";
//            break;
//        case 8:
//            $order_by = "title";
//            break;
//        case 9:
//            $order_by = "addresses_billing";
//            break;
//        case 10:
//            $order_by = "addresses_delivery";
//            break;
//        case 11:
//            $order_by = "date";
//            break;
//        case 12:
//            $order_by = "date_registre";
//            break;
//        case 13:
//            $order_by = "deadline";
//            break;
//        case 14:
//            $order_by = "total";
//            break;
//        case 15:
//            $order_by = "tax";
//            break;
//        case 16:
//            $order_by = "advance";
//            break;
//        case 17:
//            $order_by = "balance";
//            break;
//        case 18:
//            $order_by = "comments";
//            break;
//        case 19:
//            $order_by = "comments_private";
//            break;
//        case 20:
//            $order_by = "r1";
//            break;
//        case 21:
//            $order_by = "r2";
//            break;
//        case 22:
//            $order_by = "r3";
//            break;
//        case 23:
//            $order_by = "fc";
//            break;
//        case 24:
//            $order_by = "date_update";
//            break;
//        case 25:
//            $order_by = "ce";
//            break;
//        case 26:
//            $order_by = "code";
//            break;
//        case 27:
//            $order_by = "type";
//            break;
//        case 28:
//            $order_by = "order_by";
//            break;
//        case 29:
//            $order_by = "status";
//            break;
//        default:
//            $order_by = "id";
//            break;
//    }

    $status_str = implode(",", $status_array);

    $query = $db->prepare(
            "   SELECT * 
            FROM expenses 
            WHERE 
                provider_id = :provider_id 
            AND
            (
                ((YEAR(date) =:year AND MONTH(date)=:month)   )
                AND status IN ($status_str)
            )   

            ORDER BY $order_col $order_way 
                
            Limit  :limit OFFSET :start
                         
        ");

    $query->bindValue(':provider_id', (int) $provider_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function expenses_search_by_client_id($provider_id, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    $query = $db->prepare(
            "   SELECT * 
            FROM expenses 
            WHERE 
                provider_id = :provider_id 
                
            ORDER BY $order_col $order_way 
            
            Limit  :limit OFFSET :start
                         
        ");

    $query->bindValue(':provider_id', (int) $provider_id, PDO::PARAM_INT);
//    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function expenses_providers_list() {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * FROM contacts WHERE id  IN (SELECT provider_id FROM expenses) 
    ");
    $req->execute(array(
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : null;
}

function expenses_can_be_edit($expense_id) {
    // return (invoices_why_can_not_be_edit($invoice_id)) ? false : true;
    return $expense_id;
}

function expenses_why_can_not_be_edit($expense_id) {

    $error = array("Edit las razones en functions");

//    if (!invoices_is_id($invoice_id)) {
//        array_push($error, "ID format error");
//    }
//
//    $status = invoices_field_id("status", $invoice_id);
//
//    switch ($status) {
////        case 0:
////            array_push($error, "This invoice has status error");
////            break;
//
//        case -10:
//        case -20:
//            array_push($error, "An invoice with this status cannot be edited");
//            break;
//
//        default:
//            break;
//    }
//
//    if (invoices_field_id('advance', $invoice_id) > 0) {
//        array_push($error, "If there are already payments on the invoice it can't be edited");
//    }

    return $error;
}

function expenses_list_by_father_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * FROM expenses WHERE father_id  = :id 
    ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : null;
}

function expenses_update_total_advance($id, $advance) {
    global $db;
    $query = $db->prepare(" UPDATE expenses SET advance=:advance WHERE id=:id  ");
    $query->execute(array(
        "advance" => $advance,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function expenses_change_status_to($id, $status) {
    global $db;
    $query = $db->prepare(" UPDATE expenses SET status=:status WHERE id=:id  ");
    $query->execute(array(
        "status" => $status,
        "id" => $id
            )
    );
}

function expenses_update_total_tax($id, $total, $tax) {
    global $db;
    $query = $db->prepare(" UPDATE `expenses` SET `total` =:total, `tax` =:tax WHERE `id` =:id  ");
    $query->execute(array(
        "total" => $total,
        "tax" => $tax,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function expenses_lines_average_tax($expense_id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT AVG(tax)  FROM expenses_lines WHERE expense_id=:expense_id ");

    $req->execute(array(
        "expense_id" => $expense_id,
    ));
    $data = $req->fetch();
    return $data[0];
}

function expenses_total_by_client_id($provider_id) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM expenses WHERE provider_id= ?');
    $query->execute(array($provider_id));
    $data = $query->fetch();
    return $data[0];
}

function expenses_total_by_client_id_status($provider_id, $status) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM expenses WHERE provider_id= :provider_id AND status = :status');
    $query->execute(array(
        "provider_id" => $provider_id,
        "status" => $status
    ));
    $data = $query->fetch();
    return $data[0];
}

function expenses_total_by_status($status) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM expenses WHERE status = :status');
    $query->execute(array(
        "status" => $status
    ));
    $data = $query->fetch();
    return $data[0];
}

function expenses_total_by_category_code($code) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM expenses WHERE category_code = :code');
    $query->execute(array(
        "code" => $code
    ));
    $data = $query->fetch();
    return $data[0];
}

function expenses_comments_update($expense_id, $comments) {
    global $db;
    $req = $db->prepare(" UPDATE expenses SET comments=:comments WHERE id=:id  ");
    $req->execute(array(
        "id" => $expense_id,
        "comments" => $comments
            )
    );
}

function expenses_search_by_provider_invoice($provider_id, $invoice_number, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    $query = $db->prepare(
            "   SELECT * 
            FROM expenses 
            WHERE 
            provider_id = :provider_id             
            AND                    
            invoice_number = :invoice_number        
            
            ORDER BY $order_col $order_way 
            
            Limit  :limit OFFSET :start
                         
        ");

    $query->bindValue(':provider_id', (int) $provider_id, PDO::PARAM_INT);
    $query->bindValue(':invoice_number', $invoice_number, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function expenses_add_largo($office_id, $my_ref, $category_code, $invoice_number, $provider_id, $date, $deadline, $total, $tax) {
    global $db;
    $req = $db->prepare(" INSERT INTO `expenses` ( `office_id` ,   `my_ref` ,   `father_id` ,   `category_code` ,   `invoice_number` ,   `budget_id` ,   `credit_note_id` ,   `provider_id` ,   `seller_id` ,   `clon_from_id` ,   `title` ,   `addresses_billing` ,   `addresses_delivery` ,   `date` ,   `date_registre` ,   `deadline` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `code` ,   `type` ,   `every` ,   `times` ,   `date_start` ,   `date_end` ,   `order_by` ,   `status`   )
                                       VALUES    (:office_id ,      :my_ref ,  :father_id ,  :category_code ,  :invoice_number ,  :budget_id ,  :credit_note_id ,  :provider_id ,  :seller_id ,  :clon_from_id ,  :title ,  :addresses_billing ,  :addresses_delivery ,  :date ,  :date_registre ,  :deadline ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :code ,  :type ,  :every ,  :times ,  :date_start ,  :date_end ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "office_id" => $office_id,
        "my_ref" => $my_ref,
        "father_id" => null,
        "category_code" => $category_code,
        "invoice_number" => $invoice_number,
        "budget_id" => null,
        "credit_note_id" => null,
        "provider_id" => $provider_id,
        "seller_id" => null,
        "clon_from_id" => null,
        "title" => null,
        "addresses_billing" => null,
        "addresses_delivery" => null,
        "date" => $date,
        "date_registre" => date("Y-m-d H:m:s"),
        "deadline" => $deadline,
        "total" => $total,
        "tax" => $tax,
        "advance" => null,
        "balance" => null,
        "comments" => null,
        "comments_private" => null,
        "r1" => null,
        "r2" => null,
        "r3" => null,
        "fc" => null,
        "date_update" => null,
        "days" => null,
        "ce" => null,
        "code" => magia_uniqid(),
        "type" => null,
        "every" => null,
        "times" => null,
        "date_start" => null,
        "date_end" => null,
        "order_by" => 1,
        "status" => 10
            )
    );

    return $db->lastInsertId();
}

function expenses_available_to_assign($expense_id) {

    $exp = new Expenses();
    $exp->setExpenses($expense_id);

    $solde = ($exp->getTotal() + $exp->getTax() ) - projects_inout_total_by_expense_id($exp->getId());

    return round($solde, 2);
}

function expenses_get_total($expense_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `total` FROM `expenses` WHERE `id`= ?");
    $req->execute(array($expense_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_get_tax($expense_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `tax` FROM `expenses` WHERE `id`= ?");
    $req->execute(array($expense_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_get_advance($expense_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `advance` FROM `expenses` WHERE `id`= ?");
    $req->execute(array($expense_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function expenses_update_provider_id_invoice_number($id, $new_data) {

    global $db;
    $req = $db->prepare(" UPDATE `expenses` SET `invoice_number`=:new_data WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_data" => $new_data,
    ));
}

function balance_sum_subtotal_by_expense($expense_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(sub_total) FROM `balance` WHERE expense_id=:expense_id AND canceled_code IS NULL  ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function balance_sum_tax_by_expense($expense_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(tax) FROM `balance` WHERE expense_id=:expense_id  AND canceled_code IS NULL ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function expenses_list_full($order, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;

    $order_by = isset($order['col']) ? $order['col'] : 'id';

    $way = isset($order['way']) ? $order['way'] : 'ASC';

    $data = null;
    $sql = "SELECT 
        `id`,  
        `office_id`,  
        `my_ref`,  
        `father_id`,  
        `category_code`,  
        `invoice_number`,  
        `budget_id`,  
        `credit_note_id`,  
        `provider_id`,  
        `seller_id`,  
        `clon_from_id`,  
        `title`,  `addresses_billing`,  `addresses_delivery`,  `date`,  `date_registre`,  `deadline`,  
        `total`,  `tax`,  
       
        (`total` + `tax`) as tvac,              
        `advance`,  
        
        CASE
            WHEN `advance` IS NULL  THEN (`total` + `tax`)
            WHEN `advance` = 0      THEN (`total` + `tax`)
            WHEN `advance` < 0      THEN (`total` + `tax`) - ABS(`advance`)
        END as balance, 
            
        
        
        `comments`, `comments_private`,  `r1`,  `r2`,  `r3`,  `fc`,  
        `date_update`,  `days`,  `ce`,  `code`,  `type`,  `every`,  
        `times`,  `date_start`,  `date_end`,  `order_by`,  `status`   
    

        FROM `expenses` 
        
        ORDER BY $order_col $order_way 
            
        Limit  :limit OFFSET :start 
            
        ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function expenses_status_list_by_status($status, $start = 0, $limit = 999, $order_col = "id", $order_way = "desc") {
    global $db;
    $data = null;

    $sql = "SELECT `id`,  `code`,  `name`,  `icon`,  `color`,  `order_by`,  `status`   
    
    FROM `expenses_status` 
    
    WHERE `status`  = :status 
    
    ORDER BY $order_col $order_way 
    
    Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
