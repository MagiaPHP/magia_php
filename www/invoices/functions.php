<?php

// plugin = invoices
// creation date : 
// 
// 
function invoices_field_id($field, $id) {
    global $db;
    $data = null;
    $query = $db->prepare(
            "SELECT $field
    FROM invoices
    INNER JOIN
    invoices_counter
    ON invoices.id = invoices_counter.invoice_id
    WHERE invoices.id = $id");

    $query->execute(array(
    ));
    $data = $query->fetch();

    return (isset($data[0])) ? $data[0] : false;
}

//
//
function invoices_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $query = $db->prepare("SELECT $field FROM invoices WHERE $FieldUnique = ?");
    $query->execute(array($valueUnique));
    $data = $query->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//
//
function invoices_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM `invoices` ORDER BY date DESC , id DESC   Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//
//
function invoices_list_update_counter($start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM `invoices` ORDER BY id ASC  Limit  :limit OFFSET :start   ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_list_check_ce($start = 0, $limit = 999) {
    global $db;
    $sql = "SELECT * FROM `invoices` ORDER BY id   Limit  :limit OFFSET :start   ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_list_clients_id($start = 0, $limit = 999999) {
    global $db;
    $sql = "SELECT * FROM contacts WHERE id IN (SELECT DISTINCT(client_id) FROM `invoices`)   Limit  :limit OFFSET :start   ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_receivable_by_client($client_id, $start = 0, $limit = 999) {

    global $db;
    $query = $db->prepare(
            "
            SELECT * 
            FROM `invoices`
            
            INNER JOIN
            
            invoices_counter 
            
            ON invoices.id = invoices_counter.invoice_id 
            

            WHERE `client_id` = :client_id
            
        AND (status = 10 OR status = 20) 
        
        ORDER BY year DESC  Limit  :limit OFFSET :start 


            ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_stat($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT office_id, client_id, SUM(total) as total, SUM(tax) as tva FROM `invoices` GROUP BY client_id ORDER BY id  Limit  :limit OFFSET :start ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_details($id) {
    global $db;
    $query = $db->prepare(
            "
            SELECT 
          *
            FROM invoices 
            
            INNER JOIN 
            
            invoices_counter 
            
            ON invoices.id = invoices_counter.invoice_id 
            
            WHERE invoices.id= :id 
            
            ");

    $query->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function invoices_delete($id) {
    global $db;
    $query = $db->prepare("DELETE FROM invoices WHERE id=? ");
    $query->execute(array($id));
}

function invoices_edit($id, $budget_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status) {

    global $db;
    $query = $db->prepare(" UPDATE invoices SET "
            . "budget_id=:budget_id , "
            . "credit_note_id=:credit_note_id , "
            . "client_id=:client_id , "
            . "seller_id=:seller_id , "
            . "date=:date , "
            . "date_registre=:date_registre , "
            . "total=:total , "
            . "tax=:tax , "
            . "advance=:advance , "
            . "balance=:balance , "
            . "comments=:comments , "
            . "comments_private=:comments_private , "
            . "r1=:r1 , "
            . "r2=:r2 , "
            . "r3=:r3 , "
            . "fc=:fc , "
            . "date_update=:date_update , "
            . "days=:days , "
            . "ce=:ce , "
            . "key=:key , "
            . "status=:status  "
            . " WHERE id=:id ");
    $query->execute(array(
        "id" => $id, "budget_id" => $budget_id,
        "credit_note_id" => $credit_note_id, "client_id" => $client_id,
        "seller_id" => $seller_id,
        "date" => $date,
        "date_registre" => date("Y-m-d h:m:s"),
        "total" => $total, "tax" => $tax, "advance" => $advance, "balance" => $balance, "comments" => $comments, "comments_private" => $comments_private, "r1" => $r1, "r2" => $r2, "r3" => $r3, "fc" => $fc, "date_update" => $date_update, "days" => $days, "ce" => $ce, "key" => $key, "status" => $status,
    ));
}

function invoices_add(
        $budget_id,
        $credit_note_id,
        $client_id,
        $seller_id,
        $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status) {
    global $db;
    $query = $db->prepare(" INSERT INTO `invoices` ( `id` ,   `budget_id` ,   `credit_note_id` ,   `client_id` ,   `seller_id` ,   `date` ,   `date_registre` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `key` ,   `status`   )
                                       VALUES  (:id ,  :budget_id ,  :credit_note_id ,  :client_id ,  :seller_id ,  :date ,  :date_registre ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :key ,  :status   ) ");

    $query->execute(array(
        "id" => null,
        "budget_id" => $budget_id,
        "credit_note_id" => $credit_note_id,
        "client_id" => $client_id,
        "seller_id" => $seller_id,
        "date" => $date,
        "date_registre" => date("Y-m-d h:m:s"),
        "total" => $total,
        "tax" => $tax,
        "advance" => $advance,
        "balance" => $balance,
        "comments" => $comments,
        "comments_private" => $comments_private,
        "r1" => $r1,
        "r2" => $r2,
        "r3" => $r3,
        "fc" => $fc,
        "date_update" => $date_update,
        "days" => $days,
        "ce" => $ce,
        "key" => $key,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function invoices_search_full_year($year, $txt, $start = 0, $limit = 99) {
    global $db;
    $data = null;
    $query = $db->prepare(
            "
    SELECT
        invoices.id            
        ,invoices.office_id    
        ,invoices.budget_id        
        ,invoices.credit_note_id   
        ,invoices.client_id        
        ,invoices.title        
        ,invoices.seller_id        
        ,invoices.date
        ,invoices.date_registre    
        ,invoices.date_expiration    
        ,invoices.total            
        ,invoices.tax              
        ,invoices.advance          
        ,invoices.balance          
        ,invoices.comments         
        ,invoices.comments_private 
        ,invoices.r1               
        ,invoices.r2               
        ,invoices.r3               
        ,invoices.fc               
        ,invoices.date_update      
        ,invoices.days             
        ,invoices.ce               
        ,invoices.code              
        ,invoices.type              
        ,invoices.status
        ,name
        ,lastname
        ,tva

    FROM 
        invoices 
        
    INNER JOIN 
        contacts 
        
    ON contacts.id = invoices.client_id

    WHERE 
        ( 
           invoices.id              like :txt 
        OR invoices.office_id       like :txt 
        OR invoices.budget_id       like :txt
        OR invoices.credit_note_id  like :txt
        OR invoices.client_id       like :txt
        OR invoices.title            like :txt
        OR invoices.seller_id        like :txt
        OR invoices.date             like :txt
        OR invoices.date_registre    like :txt
        OR invoices.date_expiration  like :txt
        OR invoices.total            like :txt
        OR invoices.tax              like :txt
        OR invoices.advance          like :txt
        OR invoices.balance          like :txt
        OR invoices.comments         like :txt
        OR invoices.comments_private like :txt
        OR invoices.r1               like :txt
        OR invoices.r2              like :txt
        OR invoices.r3              like :txt
        OR invoices.fc              like :txt
        OR invoices.date_update     like :txt
        OR invoices.days            like :txt
        OR invoices.ce              like :txt
        OR invoices.code            like :txt
        OR invoices.status          like :txt
        
        OR contacts.name            like :txt
        OR contacts.lastname        like :txt
        OR contacts.tva             like :txt
        ) 

    AND 
        YEAR(`date`) =:year

    ORDER BY     
        id DESC
            
    Limit  :limit OFFSET :start
                        
");

    $query->bindValue(':year', $year, PDO::PARAM_STR);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $query = $db->prepare(
            "
            SELECT
                    *         
            FROM 
                invoices 
            
            WHERE 
                ( 
                id                  like :txt 
                OR office_id        like :txt
                OR budget_id        like :txt
                OR credit_note_id   like :txt
                OR client_id        like :txt
                OR title            like :txt
                OR seller_id        like :txt
                OR date_registre    like :txt
                OR date_expiration  like :txt
                OR total            like :txt
                OR tax              like :txt
                OR advance          like :txt
                OR balance          like :txt
                OR comments         like :txt
                OR comments_private like :txt
                OR r1               like :txt
                OR r2               like :txt
                OR r3               like :txt
                OR fc               like :txt
                OR date_update      like :txt
                OR days             like :txt
                OR ce               like :txt
                OR code             like :txt
                OR status           like :txt)

             ORDER BY 
                date DESC

            Limit  :limit OFFSET :start




                           
");

    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (invoices_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function invoices_is_id($id) {

    if (!is_id($id)) {
        return 0;
    }

    return true;
}

function invoices_is_budget_id($budget_id) {
    return true;
}

function invoices_is_credit_note_id($credit_note_id) {
    return true;
}

function invoices_is_client_id($client_id) {
    return true;
}

function invoices_is_seller_id($seller_id) {
    return true;
}

function invoices_is_date($date) {
    return true;
}

function invoices_is_date_registre($date_registre) {
    return true;
}

function invoices_is_total($total) {
    return true;
}

function invoices_is_tax($tax) {
    return true;
}

function invoices_is_advance($advance) {
    return true;
}

function invoices_is_balance($balance) {
    return true;
}

function invoices_is_comments($comments) {
    return true;
}

function invoices_is_comments_private($comments_private) {
    return true;
}

function invoices_is_r1($r1) {
    return true;
}

function invoices_is_r2($r2) {
    return true;
}

function invoices_is_r3($r3) {
    return true;
}

function invoices_is_fc($fc) {
    return true;
}

function invoices_is_date_update($date_update) {
    return true;
}

function invoices_is_days($days) {
    return true;
}

function invoices_is_ce($ce) {
    return true;
}

function invoices_is_key($key) {
    return true;
}

function invoices_is_code($code) {
    return true;
}

function invoices_is_status($status) {
    return true;
}

################################################################################

function invoices_update_client_id($invoice_id, $client_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET client_id=:client_id WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "client_id" => $client_id
            )
    );
}

/**
 * Poner en lugares donde no necesito explicar el motivo 
 * Com en la barra nav
 * @param type $invoices_id
 * @return boolean
 */
function invoices_can_be_edit($invoice_id) {
    return (invoices_why_can_not_be_edit($invoice_id)) ? false : true;
}

function invoices_why_can_not_be_edit($invoice_id) {

    $error = array();

    if (!invoices_is_id($invoice_id)) {
        array_push($error, "ID format error");
    }

    $status = invoices_field_id("status", $invoice_id);

    switch ($status) {
//        case 0:
//            array_push($error, "This invoice has status error");
//            break;

        case -10:
        case -20:
            array_push($error, "An invoice with this status cannot be edited");
            break;

        default:
            break;
    }

    if (invoices_field_id('advance', $invoice_id) > 0) {
        array_push($error, "If there are already payments on the invoice it can't be edited");
    }

    return $error;
}

function invoices_add_by_client_id($client_id, $code, $date_expiration, $status, $budget_id = null) {
    global $db;
    $query = $db->prepare(
            "INSERT INTO `invoices` (`client_id`, `date`, `date_expiration`, `code`, `status`   )
                            VALUES  (:client_id , :date , :date_expiration,  :code,  :status  ) ");
    $query->execute(array(
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "date_expiration" => $date_expiration,
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function invoices_add_by_client_id_and_invoice_number($id, $office_id, $client_id, $code, $date_expiration, $status, $budget_id = null) {
    global $db;
    $query = $db->prepare(
            "INSERT INTO `invoices` (`id`, `office_id`, `client_id`, `date`, `date_expiration`, `code`, `status`   )
                            VALUES  (:id,  :office_id, :client_id , :date , :date_expiration,  :code,  :status  ) ");
    $query->execute(array(
        "id" => (int) $id,
        "office_id" => $office_id,
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "date_expiration" => $date_expiration,
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function invoices_add_individual_by_client_id($client_id, $ab, $ad, $code, $status, $budget_id) {
    global $db;
    $query = $db->prepare(
            "INSERT INTO `invoices` ( `client_id`, `date`, `budget_id`, `addresses_billing`, `addresses_delivery`, `code`, `type`, `status`   )
                         VALUES    (  :client_id , :date , :budget_id, :addresses_billing, :addresses_delivery,  :code,  :type,  :status  ) ");
    $query->execute(array(
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "budget_id" => $budget_id,
        "addresses_billing" => $ab,
        "addresses_delivery" => $ad,
        "code" => $code,
        "type" => "I",
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function invoices_add_partial_by_client_id($client_id, $ab, $ad, $code, $status, $budget_id) {
    global $db;
    $query = $db->prepare(
            "INSERT INTO `invoices` ( `client_id`, `date`, `budget_id`, `addresses_billing`, `addresses_delivery`, `code`, `type`, `status`   )
                         VALUES    (  :client_id , :date , :budget_id, :addresses_billing, :addresses_delivery,  :code,  :type,  :status  ) ");
    $query->execute(array(
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "budget_id" => $budget_id,
        "addresses_billing" => $ab,
        "addresses_delivery" => $ad,
        "code" => $code,
        "type" => "P",
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function invoices_search_by_id($id, $start = 0, $limit = 999) {
    global $db;

    $query = $db->prepare("SELECT * FROM invoices WHERE id= :id Limit  :limit OFFSET :start ");

    $query->bindValue(':id', (int) $id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_year_counter($year, $counter, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "SELECT * 
            FROM invoices 
            INNER JOIN invoices_counter  
            ON invoices.id=invoices_counter.invoice_id
            WHERE year=:year AND counter=:counter  Limit  :limit OFFSET :start ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':counter', (int) $counter, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_code($code, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM invoices WHERE status= :code ORDER BY id DESC LIMIT :start, :limit ");
    $query->bindValue(':code', (int) $code, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function invoices_search_by($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `invoices` 
            WHERE `$field` = '$txt' 
     ORDER BY `id` DESC
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

function invoices_search_by_multi_code($code_array, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM invoices WHERE status IN (" . implode(',', $code_array) . ") ORDER BY id DESC LIMIT :start, :limit ");
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_multi_code_full($code_array, $txt, $start = 0, $limit = 999) {
    global $db;

    $codes = implode(',', $code_array);

    $query = $db->prepare(
            "
    SELECT * 
    FROM invoices 
    WHERE status IN ( " . implode(',', $code_array) . " ) 
    AND (
        id                  LIKE :txt 
        OR budget_id        LIKE :txt
        OR credit_note_id   LIKE :txt
        OR client_id        LIKE :txt
        OR invoices.title   LIKE :txt
        OR seller_id        LIKE :txt
        OR date             LIKE :txt
        OR date_registre    LIKE :txt
        OR date_expiration  LIKE :txt
        OR total            LIKE :txt
        OR tax              LIKE :txt
        OR advance          LIKE :txt
        OR balance          LIKE :txt
        OR comments         LIKE :txt
        OR comments_private LIKE :txt
        OR r1               LIKE :txt
        OR r2               LIKE :txt
        OR r3               LIKE :txt
        OR fc               LIKE :txt
        OR date_update      LIKE :txt
        OR days             LIKE :txt
        OR ce               LIKE :txt
        OR code             LIKE :txt
        OR status           LIKE :txt
        
        
        
    )
    ORDER BY date DESC LIMIT :start, :limit ");

    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':codes', $codes, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchAll();
    return $data;
}

function invoices_search_by_multi_code_year_month_day($code_array, $year, $month, $day, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT * 
            FROM invoices 
            WHERE status IN (" . implode(',', $code_array) . ") 
            AND
            (YEAR(date) =:year AND MONTH(date)=:month AND DAY(date)=:day) 
            
            ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':day', (int) $day, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_total_by_multi_code_year($code_array, $year, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT id, SUM(total) as total, SUM(tax) as tax    
            FROM invoices 
            WHERE status IN (" . implode(',', $code_array) . ") 
            AND
            (YEAR(date) =:year) 
            
            ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':day', (int) $day, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function invoices_total_by_multi_code_year_month($code_array, $year, $month, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT id, SUM(total) as total, SUM(tax) as tax    
            FROM invoices 
            WHERE status IN (" . implode(',', $code_array) . ") 
            AND
            (YEAR(date) =:year AND MONTH(date)=:month ) 
            
            ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':day', (int) $day, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function invoices_total_by_multi_code_year_month_day($code_array, $year, $month, $day, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT `id`, SUM(`total`) as total, SUM(`tax`) as tax    
            FROM `invoices` 
            WHERE `status` IN (" . implode(',', $code_array) . ") 
            AND
            (YEAR(`date`) =:year AND MONTH(`date`)=:month AND DAY(`date`)=:day) 
            
            ORDER BY `id` DESC LIMIT :start, :limit ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':day', (int) $day, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function invoices_search_by_client_id($client_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM invoices WHERE client_id = :client_id ORDER BY date DESC Limit  :limit OFFSET :start ");
    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_client_id_status($client_id, $status, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM invoices WHERE client_id= :client_id AND status = :status ORDER BY id DESC Limit  :limit OFFSET :start");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_client_id_multi_code_year($client_id, $code_array, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT * 
            FROM invoices 
            WHERE client_id = :client_id AND ( status IN (" . implode(',', $code_array) . ") 
            AND
            YEAR(date) =:year ) 
            
            ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_total_by_client_id_multi_code_year($client_id, $code_array, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT SUM(total) + sum(tax) as total 
            FROM invoices 
            WHERE client_id = :client_id AND ( status IN (" . implode(',', $code_array) . ") 
            AND
            YEAR(date) =:year ) 
            
            ORDER BY id DESC LIMIT :start, :limit ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

function invoices_search_registre_by_cliente_id_type($client_id, $type, $status = 10, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT id FROM invoices WHERE type= :type AND ( client_id = :client_id AND :status = :status Limit  :limit OFFSET :start )");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':type', (int) $type, PDO::PARAM_INT);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_search_by_year_month_status($year, $month, $status_array, $order = 1, $start = 0, $limit = 999) {
    global $db;

    switch ($order) {
        case 1:
            $order_by = "id";
            break;
        case 2:
            $order_by = "budget_id";
            break;
        case 3:
            $order_by = "credit_note_id";
            break;
        case 4:
            $order_by = "client_id";
            break;
        case 5:
            $order_by = "title";
            break;
        case 6:
            $order_by = "seller_id";
            break;
        case 7:
            $order_by = "date";
            break;
        case 8:
            $order_by = "date_registre";
            break;
        case 9:
            $order_by = "date_expiration";
            break;
        case 10:
            $order_by = "total";
            break;
        case 11:
            $order_by = "tax";
            break;
        case 12:
            $order_by = "advance";
            break;
        case 13:
            $order_by = "balance";
            break;
        case 14:
            $order_by = "comments";
            break;
        case 15:
            $order_by = "comments_private";
            break;
        case 16:
            $order_by = "r1";
            break;
        case 17:
            $order_by = "r2";
            break;
        case 18:
            $order_by = "r3";
            break;
        case 19:
            $order_by = "date_update";
            break;
        case 20:
            $order_by = "ce";
            break;
        case 21:
            $order_by = "type";
            break;
        case 22:
            $order_by = "status";
            break;

        default:
            break;
    }

    $status_str = implode(",", $status_array);

    $query = $db->prepare(
            "   SELECT * 
            FROM invoices 
            WHERE 
            (YEAR(date) =:year AND MONTH(date)=:month)    
            AND status IN ($status_str)
            ORDER BY $order_by
            Limit  :limit OFFSET :start
                         
        ");

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
//    $query->bindValue(':order_by', (int) $order_by, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function invoices_search_by_year_trimestre_status($year, $tri, $status_array, $order = null) {
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
            $order_by = "budget_id";
            break;
        case 3:
            $order_by = "credit_note_id";
            break;
        case 4:
            $order_by = "client_id";
            break;
        case 5:
            $order_by = "title";
            break;
        case 6:
            $order_by = "seller_id";
            break;
        case 7:
            $order_by = "date";
            break;
        case 8:
            $order_by = "date_registre";
            break;
        case 9:
            $order_by = "date_expiration";
            break;
        case 10:
            $order_by = "total";
            break;
        case 11:
            $order_by = "tax";
            break;
        case 12:
            $order_by = "advance";
            break;
        case 13:
            $order_by = "balance";
            break;
        case 14:
            $order_by = "comments";
            break;
        case 15:
            $order_by = "comments_private";
            break;
        case 16:
            $order_by = "r1";
            break;
        case 17:
            $order_by = "r2";
            break;
        case 18:
            $order_by = "r3";
            break;
        case 19:
            $order_by = "date_update";
            break;
        case 20:
            $order_by = "ce";
            break;
        case 21:
            $order_by = "type";
            break;
        case 22:
            $order_by = "status";
            break;

        default:
            $order_by = "id";
            break;
    }


    $status_str = implode(",", $status_array);

//    var_dump($status_str);

    $query = $db->prepare(
            "   SELECT * 
            FROM invoices             
            INNER JOIN invoices_counter  
            ON invoices.id=invoices_counter.invoice_id
            WHERE YEAR(date) =:year AND 
            (
            MONTH(date)=:m1 OR 
            MONTH(date)=:m2 OR 
            MONTH(date)=:m3 
            ) AND status IN ($status_str)
            ORDER BY $order_by
                         
        ");

//    vardump($status_array);

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':m1', (int) $m1, PDO::PARAM_INT);
    $query->bindValue(':m2', (int) $m2, PDO::PARAM_INT);
    $query->bindValue(':m3', (int) $m3, PDO::PARAM_INT);
//    $query->bindValue(':status_array', implode(",", $status_array), PDO::PARAM_STR);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function invoices_export($invoice_id) {
    global $db;

    $query = $db->prepare(
            "   
SELECT i.date as 'date', i.id, i.client_id, (SELECT name FROM contacts WHERE id = i.client_id) as client, 
il.code, il.description, il.quantity, il.price, il.tax, il.discounts,
JSON_VALUE(i.addresses_billing, '$.barrio') as 'barrio', 
CONCAT( 
JSON_VALUE(i.addresses_billing, '$.number') , ' ' ,
JSON_VALUE(i.addresses_billing, '$.address') )  as 'address',

(SELECT name FROM contacts WHERE id = (SELECT contact_id FROM addresses WHERE id = JSON_VALUE((SELECT address_delivery FROM orders WHERE id = if(il.code = 'ORDER', il.description , null ) ), '$.id') ) ) as 'office'
    
FROM `invoices` as i JOIN invoice_lines as il ON i.id = il.invoice_id WHERE i.id = :invoice_id;
                         
        ");

    $query->bindValue(':invoice_id', (int) $invoice_id, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function invoices_search_without_date($start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT id FROM invoices WHERE date IS NULL Limit  :limit OFFSET :start  ");

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_client_id_type_status($client_id, $type, $status, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM invoices WHERE type= :type AND ( client_id = :client_id AND status = :status ) Limit  :limit OFFSET :start   ");
    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':type', (int) $type, PDO::PARAM_INT);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

//
function invoices_search_monthly_invoices_by_client_id_y_m($client_id, $year, $month, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("
            SELECT * 
            FROM invoices 
            WHERE (date between :start AND :end  ) 
            AND type = :type 
            AND client_id = :client_id
            AND status >= :status 
            Limit  999 OFFSET 0

            ");

    $query->execute(array(
        "client_id" => $client_id,
        'start' => "$year-$month-01 00:00:00",
        'end' => "$year-$month-31 23:59:59",
        "type" => 'M',
        "status" => 0,
        "start" => $start,
        "limit" => $limit
    ));
    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

//
function invoices_comments_update($invoice_id, $comments) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET comments=:comments WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "comments" => $comments
            )
    );
}

//
function invoices_update_ce($invoice_id, $ce) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET ce=:ce WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "ce" => $ce
            )
    );
    //return $db->lastInsertId();
}

function invoices_update_budget_id($invoice_id, $budget_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET budget_id=:budget_id WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "budget_id" => $budget_id
            )
    );
    //return $db->lastInsertId();
}

/**
 * Recalcula la suma de los items de una factura y los registra en la factura 
 * @global type $db
 * @param type $invoice_id
 * @param type $ce
 */
function invoices_update_total_invoicexxxxxxxxxxxxxx($invoice_id) {
    /**
     * valtax = (tax/100+1)
     * 
     * if( discounts_mode = '%') 
     *      total_discount = precio - ((precio * discounts)/100)
     * 
     * if( discounts_mode != '%')
     *      total_discount = precio - discounts
     * 
     * 
     * if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts) as total_discount 
     * 
     * 
     * (quantity * (price - if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)
     */
    //if( discounts_mode = '%' , price - ((price * discounts)/100) , price - discounts))) * (tax/100+1)) 

    global $db;
    $query = $db->prepare("
            UPDATE invoices 
            SET 
            
            total = (SELECT SUM(quantity * price) FROM invoice_lines WHERE invoice_id=:id ), 
            
            tax   = (SELECT SUM(quantity * price) FROM invoice_lines WHERE invoice_id=:id )
        
            WHERE id=:id  ");

    $query->execute(array(
        "id" => $invoice_id,
            )
    );
    //return $db->lastInsertId();
}

function invoices_update_type($invoice_id, $type) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET type=:type WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "type" => $type
            )
    );
    //return $db->lastInsertId();
}

function invoices_update_credit_note_id($invoice_id, $credit_note_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET credit_note_id=:credit_note_id WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "credit_note_id" => $credit_note_id
            )
    );
    //return $db->lastInsertId();
}

function invoices_update_total_tax($id, $total, $tax) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET total=:total, tax=:tax WHERE id=:id  ");
    $query->execute(array(
        "total" => $total,
        "tax" => $tax,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function invoices_update_total_advance($id, $advance) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET advance=:advance WHERE id=:id  ");
    $query->execute(array(
        "advance" => $advance,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function invoices_change_status_to($id, $status) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET status=:status WHERE id=:id  ");
    $query->execute(array(
        "status" => $status,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function invoices_modal_reminder_send($r, $invoice_id) {
    include view("invoices", "modal_reminder_send");
}

function invoices_total_by_status($status) {
    global $db;
    $query = $db->prepare(" SELECT COUNT(*)  FROM invoices  WHERE status=?  ");
    $query->execute(array($status));
    $data = $query->fetch();
    return $data[0];
}

function invoices_total_by_client_id($client_id) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM invoices WHERE client_id= ?');
    $query->execute(array($client_id));
    $data = $query->fetch();
    return $data[0];
}

function invoices_total_by_client_id_status($client_id, $status) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM invoices WHERE client_id= :client_id AND status = :status');
    $query->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $query->fetch();
    return $data[0];
}

function invoices_total_by_client_id_type($client_id, $type) {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT COUNT(*) FROM invoices WHERE client_id= :client_id AND type = :type');
    $query->execute(array(
        "client_id" => $client_id,
        "type" => $type
    ));
    $data = $query->fetch();
    return $data[0];
}

// ordernar por clientes mas facturados
function invoices_total_invoices_clients() {
    global $db;
    $data = 0;
    $query = $db->prepare('SELECT client_id, count(*) as total FROM invoices GROUP BY client_id ORDER BY total DESC');
    $query->execute(array());
    $data = $query->fetchall();
    return $data;
}

function invoices_total_invoices_by_client_type($type) {
    global $db;
    $data = 0;

    if ($type == 1) {
        $query = $db->prepare('SELECT client_id, count(*) as total FROM invoices WHERE client_id IN (SELECT id FROM contacts WHERE tva IS NOT NULL) GROUP BY client_id ORDER BY total DESC');
    } else {
        $query = $db->prepare('SELECT client_id, count(*) as total FROM invoices WHERE client_id IN (SELECT id FROM contacts WHERE tva IS NULL) GROUP BY client_id ORDER BY total DESC');
    }

    $query->execute(array());
    $data = $query->fetchall();
    return $data;
}

function invoices_search_by_budget_id($budget_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare("SELECT * FROM invoices WHERE budget_id= :budget_id Limit  :limit OFFSET :start ");

    $query->bindValue(':budget_id', (int) $budget_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

function invoices_total_invoiced_budget_id($budget_id) {
    global $db;
    $query = $db->prepare("SELECT SUM(total + tax) as total FROM invoices WHERE budget_id= ? ");
    $query->execute(array($budget_id));
    $data = $query->fetchall();
    return doubleval($data[0][0]);
}

function invoices_update_billing_address($invoice_id, $new_address_json) {
    global $db;
    $query = $db->prepare(" UPDATE `invoices` SET `addresses_billing` =:addresses_billing WHERE `id`=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "addresses_billing" => $new_address_json
            )
    );
}

function invoices_update_delivery_address($invoice_id, $new_address_json) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET addresses_delivery =:addresses_delivery WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "addresses_delivery" => $new_address_json
            )
    );
    //return $db->lastInsertId();
}

function invoices_update_date($invoice_id, $new_date) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET date =:new_date WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "new_date" => $new_date
            )
    );
    //return $db->lastInsertId();
}

function invoice_status_list_e() {
    global $db;
    $limit = 999;

    $data = null;

    $query = $db->prepare("SELECT * FROM invoice_status ORDER BY order_by   ");

    $query->execute(array(
    ));
    $data = $query->fetchall();
    return $data;
}

function invoices_field_code($field, $code) {
    global $db;

    $query = $db->prepare("SELECT $field FROM `invoices` WHERE `code`= ?");

    $query->execute(array(
        $code
    ));

    $data = $query->fetch();

    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Mustra el numero de factura formateado 
 * @param type $id
 */
function invoices_numberf($id) {

    if (!$id) {
        return false;
    }

    // saco la fecha segun el $id de la factura
    $date = invoices_field_id('date', $id);
    // ahora saco el ano los primeros 4 caracteres
    $year = magia_dates_get_year_from_date($date);
    $type = ( invoices_field_id("type", $id) ) ? invoices_field_id("type", $id) : "";
    $counter = invoices_counter_by_invoice_year($id, $year);

    if (_options_option("config_invoices_print_counter")) {
        return "$year - " . "$counter";
    } else {
        return "$year-$id";
    }
}

function invoices_numberf_to_print($id, $format = 1) {

    if (!$id) {
        return false;
    }

    // saco la fecha segun el $id de la factura
    $date = invoices_field_id('date', $id);
    // ahora saco el ano los primeros 4 caracteres
    $year = magia_dates_get_year_from_date($date);
    $type = ( invoices_field_id("type", $id) ) ? invoices_field_id("type", $id) : "";
    $counter = invoices_counter_by_invoice_year($id, $year);

    if (_options_option("config_invoices_print_counter")) {
        // $number_to_print = "$year" . "$counter";
        $number_to_print = $counter;
    } else {
//        $number_to_print = "$year-$id";
        $number_to_print = "$id";
    }



    $length = 4;
    $number_to_print_formated = $string = substr(str_repeat(0, $length) . $number_to_print, - $length);

    switch ($format) {
        case 1: // ano-[contador | id] // segun config
            $number_to_print = "$year-$number_to_print";
            break;

        case 2:
            $number_to_print = "$year-$number_to_print_formated";
            break;

        case 3:
            $number_to_print = "$year" . "$number_to_print";
            break;

        case 4:
            $number_to_print = "$year" . "$number_to_print_formated";
            break;

        default:
            $number_to_print = "$year-$number_to_print";
            break;
    }

    return $number_to_print;
}

function invoices_search_advanced(
        $client_id, $status, $year, $month, $monthly, $start = 0, $limit = 999
) {
    global $db;
// no facturados unicamente
    if ($monthly) {
        $query = $db->prepare(" SELECT * FROM invoices WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) AND type = :type order by date_registre DESC LIMIT :start, :limit ");
        $query->execute(array(
            'client_id' => $client_id,
            'status' => $status,
            'start' => "$year-$month-01 00:00:00",
            'end' => "$year-$month-31 23:59:59",
            'type' => 'M',
            'start' => $start,
            'limit' => $limit
        ));
    } else {
        $query = $db->prepare("SELECT * FROM invoices WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT :start, :limit ");
        $query->execute(array(
            'client_id' => $client_id,
            'status' => $status,
            'start' => "$year-$month-01 00:00:00",
            'end' => "$year-$month-31 23:59:59",
            'start' => $start,
            'limit' => $limit
        ));
    }
//////////////    
    $data = $query->fetchall();
    return $data;
}

/**
 * Buscar invoices_search_advanced_by_client
 * @global type $db
 * @param type $client_id
 * @param type $status
 * @param type $year
 * @param type $month
 * @param type $start
 * @param type $limit
 * @return type
 */
function invoices_search_advanced_by_client($client_id, $status, $year, $month, $start = 0, $limit = 999) {
    global $db;

    // todos los status
    if (strtolower($status) == 'all') {
        $sql = "SELECT * 
            FROM invoices 
            WHERE client_id = :client_id
            AND (date BETWEEN :date_start AND :date_end)  ORDER BY id   ";

        $exe = array(
            "client_id" => $client_id,
            "date_start" => "$year-$month-01 00:00:00",
            "date_end" => "$year-$month-31 23:59:59");
    } else {
        $sql = "SELECT * 
            FROM invoices 
            WHERE client_id = :client_id
            AND status = :status
            AND (date BETWEEN :date_start AND :date_end) ORDER BY id   ";

        $exe = array(
            "client_id" => $client_id,
            "status" => $status,
            "date_start" => "$year-$month-01 00:00:00",
            "date_end" => "$year-$month-31 23:59:59");
    }



    $query = $db->prepare($sql);

    $query->execute(
            $exe
    );

    $data = $query->fetchall();
    return $data;
}

function invoices_search_advanced_status($status, $year, $month, $start = 0, $limit = 999) {
    global $db;

    // todos los status
    if (strtolower($status) == 'all') {
        $sql = "SELECT * 
            FROM invoices 
            WHERE (date BETWEEN :date_start AND :date_end)  ORDER BY id   ";

        $exe = array(
            "date_start" => "$year-$month-01 00:00:00",
            "date_end" => "$year-$month-31 23:59:59");
    } else {
        $sql = "SELECT * 
            FROM invoices 
            WHERE status = :status
            AND (date BETWEEN :date_start AND :date_end) ORDER BY id   ";

        $exe = array(
            "status" => $status,
            "date_start" => "$year-$month-01 00:00:00",
            "date_end" => "$year-$month-31 23:59:59");
    }



    $query = $db->prepare($sql);

    $query->execute(
            $exe
    );

    $data = $query->fetchall();
    return $data;
}

function invoice_remove_items_by_budget_id($budget_id) {
    global $db;

    $query = $db->prepare(" DELETE  FROM `invoice_lines` WHERE `budget_id` = :budget_id ");

    $query->execute(array(
        "budget_id" => $budget_id
    ));
}

// PDF FILES
function invoices_year_from_invoice($id) {
    // saco el año de la fecha de una factura 

    $y = date('Y', strtotime(invoices_field_id("date", $id)));
    // la regreso 
    return $y;
}

// PDF FILES
function invoices_pdf_formated_id($id) {

//    $y = date('Y', strtotime(invoices_field_id("date_registre", $id)));
    // saco la fecha, y no la fecha de registro
    $y = date('Y', strtotime(invoices_field_id("date", $id)));
// extraigo el año de la factura 
    // la agrego antes del numero 
    return $y . " - " . $id;
}

function invoice_lines_add_with_budget_id(
        $invoice_id, $budget_id, $code, $quantity, $description, $price, $discounts, $discounts_mode, $tax, $order_by, $status
) {
    global $db;
    $query = $db->prepare(" INSERT INTO `invoice_lines` ( `id` ,   `invoice_id` , `budget_id`,  `code` ,   `quantity` ,   `description` ,   `price` ,   `discounts` ,   `discounts_mode` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :invoice_id , :budget_id, :code ,  :quantity ,  :description ,  :price ,  :discounts ,  :discounts_mode ,  :tax ,  :order_by ,  :status   ) ");

    $query->execute(array(
        "id" => null,
        "invoice_id" => $invoice_id,
        "budget_id" => $budget_id,
        "code" => $code,
        "quantity" => $quantity,
        "description" => $description,
        "price" => $price,
        "discounts" => $discounts,
        "discounts_mode" => $discounts_mode,
        "tax" => $tax,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function invoices_add_r1($invoice_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET r1=:r1 WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "r1" => date("Y-m-d"),
            )
    );
}

function invoices_add_r2($invoice_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET r2=:r2 WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "r2" => date("Y-m-d"),
            )
    );
}

function invoices_add_r3($invoice_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET r3=:r3 WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "r3" => date("Y-m-d"),
            )
    );
}

function invoices_title_update($invoice_id, $title) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET title=:title WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "title" => $title,
            )
    );
}

function invoices_seller_id_update($invoice_id, $seller_id) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET seller_id=:seller_id WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "seller_id" => $seller_id
            )
    );
}

function invoices_date_expiration_update($invoice_id, $date) {
    global $db;
    $query = $db->prepare(" UPDATE invoices SET date_expiration=:date_expiration WHERE id=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "date_expiration" => $date,
            )
    );
}

function invoices_type($type) {

    $t = null;

    if (isset($type)) {
        switch (strtoupper($type)) {
            case 'I':
                $t = "Individual";
                break;
            case 'M':
                $t = "Monthly";
                break;
            case 'P':
                $t = "Partial";
                break;

            default:
                $t = "Unknown";
                break;
        }
    }

    return $t;
}

function invoices_search_by_not_in_project($client_id, $project_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "SELECT * 
            FROM invoices 
            WHERE client_id = :client_id  
            AND id NOT IN (SELECT invoice_id FROM projects_inout WHERE  invoice_id IS NOT NULL  )  Limit  :limit OFFSET :start ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':project_id', (int) $project_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return $data;
}

/**
 * Total de una factura
 * @global type $db
 * @param type $invoice_id
 * @return type
 */
function invoices_total_invoice($invoice_id) {
    global $db;
    $query = $db->prepare(" SELECT (total + tax) as total  FROM invoices  WHERE id= :invoice_id  ");

    $query->bindValue(':invoice_id', (int) $invoice_id, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetch();
    return $data[0];
}

function invoices_can_change_client($invoice_id, $new_client_id) {

    return ( invoices_why_can_not_change_client($invoice_id, $new_client_id) ) ? false : true;
}

function invoices_why_can_not_change_client($invoice_id, $new_client_id) {

# PUEDE SER EDITADA???
# PUEDE SER EDITADA???
# PUEDE SER EDITADA???
# id formato error
# -tiene pagos?
# - estatus error
# ADEMAS DE ESTO SI 
# ADEMAS DE ESTO SI 
# ADEMAS DE ESTO SI 
# - Si viene de un presupuesto 
# - si projectos activos y pertenece a un proyecto   


    $error = array();

    if (!invoices_can_be_edit($invoice_id)) {
        $error = invoices_why_can_not_be_edit($invoice_id);
    }

    if (!contacts_is_id($new_client_id)) {
        array_push($error, '$new_client_id format error');
    }

    if (budgets_invoices_list_budgets_by_invoice_id($invoice_id)) {
        array_push($error, "The invoice comes from a budget");
    }

    // poner esto en proyectos, no en facturas
    // 
//    if (projects_inout_search_by_invoice_id($invoice_id)) {
//        array_push($error, "This invoice is in a project");
//    }

    return $error;
}

function invoices_next_number() {
    global $db;
    $query = $db->prepare(" SELECT max(id) FROM invoices ORDER BY id DESC LIMIT 1    ");
    $query->execute(array());
    $data = $query->fetch();
    return $data[0] + 1;
}

function invoices_max_id() {
    global $db;
    $req = $db->prepare("SELECT max(id) FROM invoices ORDER BY id DESC LIMIT 1  ");
    $req->execute(array());
    $data = $req->fetch();
    return $data[0];
}

function invoices_total_in_db() {
    global $db;
    $query = $db->prepare(" SELECT COUNT(*)  FROM invoices  ");
    $query->execute(array());
    $data = $query->fetch();
    return $data[0];
}

function invoices_total_in_db_by_year($y) {
    global $db;
    $query = $db->prepare("SELECT count(*) FROM invoices WHERE (date BETWEEN :start AND :end) ");
    $query->execute(array(
        'start' => "$y-01-01",
        'end' => "$y-12-31"
    ));
    $data = $query->fetch();
    return $data[0];
}

//------------------------------------------------------------------------------
function invoices_add_comment_automatically($invoice_id) {

    global $u_id, $u_rol;

    $comment = false;

    $invoices = invoices_details($invoice_id);

    $country_destination = json_decode($invoices['addresses_billing'], true)['country'];

    /**
     * Casos 
     * 0 si no hay pais 
     * 1 si es Belgica
     * 2 si EEE pero no Belgica 
     * 3 Resto del mundo 
     * 
     */
    if ($country_destination == 'BE') {  // belgica 
        // estamos en Belgica 
        $comment = "";
    } else { // fuera de belgica 
        if (countries_economic_union_by_country($country_destination) == "EEE") {
            // estoy dentro de la EEE
            $comment = "Autoliquidation - Article 146 directive TVA";
        } else {
            // Estoy fuera de la EEE
            $comment = "Exonération - Article 39 du Code TVA";
        }
    }
//
//    if (countries_economic_union_by_country($country_destination) == "EEE" && $country_destination != 'BE') {
//        $comment = 'Autoliquidation - Article 146 directive TVA';
//    }
//
//    if (countries_economic_union_by_country($country_destination) !== "EEE") { // fuera de Europa
//        $comment = 'Exonération - Article 39 du Code TVA';
//    }

    /**
     *  
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'AT';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'BE';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'BG';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'CY';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'CZ';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'DE';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'DK';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'BE';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'EE';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'ES';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'FI';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'FR';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'GR';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'HR';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'HU';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'IE';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'IS';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'IT';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'LI';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'LT';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'LU';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'LV';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'MT';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'NL';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'NO';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'PL';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'PT';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'RO';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'SE';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'SI';
      UPDATE `countries` SET `eu` = 'EEE' WHERE `countries`.`countryCode` = 'SK';


     */
// saco el pais de destino 
// si es belgica nada
// si el pais hace parte de la eu= EEE
//  -- mensaje
    // si el pais de destino es != pais de la sede de mi empresa 
    //
//    $invoices = invoices_details($invoice_id);
//    $addresses_billing = json_decode($invoices['addresses_billing'], true);
////    vardump($addresses_billing);
////    vardump($addresses_billing['country']);
//    $my_headoffice_country = addresses_billing_by_contact_id(1022)['country'];
////
//    if ($country_destination != $my_headoffice_country) { // si no es belgica 
//        // Si hace parte de la EEE
//        // Si hace parte de la EEE
//        // Si hace parte de la EEE
//        //  if (in_array($country_destination, countries_list_by_economic_union('EEE'))) {
//        if (countries_economic_union_by_country($country_destination) == "EEE") {
//            // message('info', 'Esta en EEE');
//            $comment = 'Autoliquidation - Article 146 directive TVA';
////            invoices_comments_update($invoice_id, $comment);
//            //    echo "<p>Autoliquidation – Article 146 directive TVA</p>";
//        } else {
//            // sino pues es todo pais fuera de la comunidad europeaµ
//            // message('info', 'Esta en fuera de EEE');
////            invoices_comments_update($invoice_id, 'Exonération - Article 39 du Code TVA');
//            // echo "<p>Exonération – Article 39 du Code TVA</p>"; 
//
//            $comment = 'Exonération - Article 39 du Code TVA';
//        }
//    }


    if ($comment) { // si hay comentario lo agrego 
        invoices_comments_update($invoice_id, $comment);

        ############################################################################
        ############################################################################
        ############################################################################
        //$id = $lastInsertId;

        $level = null;
        $date = null;
        //$u_id
        //$u_rol , 
        $c = "invoices";
        $a = "update";
        $w = null;
        $description = "Add comment automatically to invoice: $invoice_id comment: [$comment]";
        //$doc_id = $id;
        $crud = "update";
        $error = null;
        $val_get = ( isset($_GET) ) ? json_encode($_GET) : null;
        $val_post = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $val_request = ( isset($_REQUEST) ) ? json_encode($_REQUEST) : null;
        $ip4 = get_user_ip();
        $ip6 = get_user_ip6();
        $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php

        logs_add(
                $level, $date, $u_id, $u_rol, $c, $a, $w,
                $description, $invoice_id, $crud, $error,
                $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
        );
        ############################################################################
        ############################################################################
    }
}

/**
 * 
 * @global type $db
 * @param type $invoice_id
 * @param type $credit_note_id
 * @return type
  SELECT :id, credit_note_id, quantity, description, price, tax (
  if( discounts_mode = '%' , ((quantity * price) - ((quantity * price) * discounts )/100) , ((quantity * price) - discounts) )) as subtotal,
  if( discounts_mode = '%' , ((quantity * price) * discounts ) / 100  , discounts) as totaldiscounts  ,
  if(discounts_mode = '%',  ((quantity * price) - ((quantity * price) * discounts )/100), (quantity * price) - discounts ) * ( (tax/100) ) as totaltax
  FROM invoice_lines WHERE invoice_id = :invoice_id
 * 
 */
//SELECT id, invoice_id, code, quantity, description, price, discounts, discounts_mode, tax, (
//
//if( discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100), ((quantity * price) - discounts) )) as subtotal
//
//FROM invoice_lines WHERE invoice_id = 351

function invoices_copy_items_to_credit_notes($invoice_id, $credit_note_id, $tax) {
    global $db;

    $query = $db->prepare("

INSERT INTO `credit_note_lines`  

SELECT :id, :credit_note_id, :quantity, :description, 


if
(
    `price` = 0 , 
    0,
    (
        if( 
            `discounts_mode` = '%', 
            SUM((`quantity` * `price`) - ((`quantity` * `price`) * `discounts` )/100), 
            SUM((`quantity` * `price`) - `discounts`)
        )
    )
)

as value, 

tax

FROM `invoice_lines` WHERE `invoice_id` = :invoice_id AND `tax` = :tax

");

    $query->execute(array(
        "id" => null,
        "invoice_id" => $invoice_id,
        "quantity" => 1,
        "description" => "Total values: VAT $tax%",
        "credit_note_id" => $credit_note_id,
        "tax" => $tax
    ));

    return $db->lastInsertId();
}

function invoices_copy_items_to_invoice_items($old_id, $new_id) {
    global $db;

    $query = $db->prepare(
            "INSERT INTO `invoice_lines` 
            (`invoice_id`, `budget_id`, `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status`) SELECT 
             :new_id,      :budget_id,  `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status` FROM `invoice_lines`  WHERE `invoice_id` = :old_id  ");

    $query->execute(array(
        "old_id" => $old_id,
        "budget_id" => null,
        "new_id" => $new_id
    ));

    return $db->lastInsertId();
}

function invoices_unique_from_col($col) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $col FROM `invoices` GROUP BY $col ");
    $req->execute(array());
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function invoices_db_show_col_from_table($c) {
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

// envia un array con la lista de columnas de la tabla 
function invoices_db_col_list_from_table($c) {
    $list = array();
    foreach (invoices_db_show_col_from_table($c) as $key => $value) {
        array_push($list, $value['Field']);
    }
    return $list;
}

//
function invoices_comments_private_update($invoice_id, $comments_private) {
    global $db;
    $query = $db->prepare(" UPDATE `invoices` SET `comments_private`=:comments_private WHERE `id`=:id  ");
    $query->execute(array(
        "id" => $invoice_id,
        "comments_private" => $comments_private
            )
    );
}

function invoices_search_by_client_id_for_balance($client_id, $start = 0, $limit = 999) {
    global $db;
    $query = $db->prepare(
            "SELECT * 
            FROM invoices 
            WHERE 
            status NOT IN(0, -10, -20) AND 
            client_id = :client_id         
        ORDER BY date DESC Limit  :limit OFFSET :start ");
    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function invoices_search_by_ce_tvac($ce, $tvac, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT id, title, client_id,  ce, total, tax  FROM invoices WHERE ce = :ce AND (total+tax) = :tvac
     
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':ce', $ce, PDO::PARAM_STR);
    $query->bindValue(':tvac', $tvac, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

// SEARCH
function invoices_search_by_tvac($tvac, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT id, title, client_id,  ce, total, tax  FROM invoices WHERE  (total+tax) = :tvac
     
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':ce', $ce, PDO::PARAM_STR);
    $query->bindValue(':tvac', $tvac, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function invoices_available_to_assign($invoice_id) {

    $inv = new Invoices();
    $inv->setInvoice($invoice_id);

    $solde = ($inv->getTotal() + $inv->getTax() ) - projects_inout_total_by_invoice_id($inv->getId());

    return round($solde, 2);
}

function invoices_index_generate_column_headers($colsToShow) {
    foreach ($colsToShow as $col_to_show) {
        switch ($col_to_show) {
            case 'owner_id':
                echo '<th>' . _tr('Company') . '</th>';
                break;

            case 'button_details':
            case 'button_pay':
            case 'button_edit':
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

function invoices_index_generate_column_body_td($invoice, $colsToShow) {

    foreach ($colsToShow as $key => $col) {

        switch ($col) {
            case 'id':
                echo '<td><a href="index.php?c=invoices&a=details&id=' . $invoice[$col] . '">' . $invoice[$col] . '</a></td>';
                break;

            case 'budget_id':
                echo '<td><a href="index.php?c=budgets&a=details&id=' . $invoice[$col] . '">' . $invoice[$col] . '</a></td>';
                break;

            case 'credit_note_id':
                echo '<td><a href="index.php?c=credit_notes&a=details&id=' . $invoice[$col] . '">' . $invoice[$col] . '</a></td>';
                break;

            case 'office_id':
            case 'client_id':
            case 'seller_id':
                echo '<td><a href="index.php?c=contacts&a=details&id=' . $invoice[$col] . '">' . contacts_formated($invoice[$col]) . '</a></td>';
                break;

            case 'addresses_billing':
            case 'addresses_delivery':
                echo '<td>' . addresses_formated_html($invoice[$col]) . '</td>';
                break;

            case 'date':
            case 'date_expiration':
                echo '<td>' . magia_dates_formated($invoice[$col]) . '</td>';
                break;

            case 'total':
            case 'tax':
            case 'advance':
            case 'balance':
                echo '<td class="text-right">' . moneda($invoice[$col]) . '</td>';
                break;

            case 'status':
                echo '<td>' . invoice_status_by_status($invoice[$col]) . '</td>';
                break;

            case 'button_details':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=invoices&a=details&id=' . $invoice['id'] . '">' . icon("eye-open") . ' ' . _tr('Details') . '</a></td>';
                break;

            case 'button_pay':
                echo '<td><a class="btn btn-sm btn-primary" href="index.php?c=invoices&a=details_payement&id=' . $invoice['id'] . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a></td>';
                break;

            case 'button_edit':
                echo '<td><a class="btn btn-sm btn-danger" href="index.php?c=invoices&a=edit&id=' . $invoice['id'] . '">' . icon("pencil") . ' ' . _tr('Edit') . '</a></td>';
                break;

            case 'button_print':
                echo '<td><a target="print" class="btn btn-sm btn-default" href="index.php?c=invoices&a=export_pdf&id=' . $invoice['id'] . '&lang=' . contacts_language(contacts_headoffice_of_contact_id(invoices_field_id('client_id', $invoice['id']))) . '">' . icon("print") . '</a></td>';
                break;

            case 'button_save':
                echo '<td><a target="print"  class="btn btn-sm btn-default" href="index.php?c=invoices&a=export_pdf&way=pdf&&id=' . $invoice['id'] . '&lang=' . contacts_language(contacts_headoffice_of_contact_id(invoices_field_id('client_id', $invoice['id']))) . '">' . icon("floppy-save") . '</a></td>';
                break;

            default:
                //   echo '<td>' . ($invoice[$col]) . '</td>';
                echo '<td>' . ($invoice[$col]) . '</td>';
                break;
        }
    }
}

function invoices_max_year() {
    global $db;
    $data = null;
    $query = $db->prepare(" SELECT YEAR(MAX(date_expiration)) FROM invoices ");
    $query->execute(array());
    $data = $query->fetch();
    return (isset($data[0])) ? $data[0] : date('Y');
}

function invoices_min_year() {
    global $db;
    $data = null;
    $query = $db->prepare(" SELECT YEAR(MIN(date)) FROM invoices ");
    $query->execute(array());
    $data = $query->fetch();
    return (isset($data[0])) ? $data[0] : date('Y');
}
