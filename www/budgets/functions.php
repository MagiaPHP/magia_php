<?php

// plugin = budgets
// creation date : 
// 
// 
function budgets_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Segun su estatus determina si puede ser editada
 * @param type $budget_id
 * @return boolean
 */
function budgets_listxxxxxxx() {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT * FROM budgets ORDER BY date DESC, id DESC ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_list($start = 0, $limit = 999999) {
    global $db;

    $sql = "SELECT * FROM `budgets` ORDER BY date DESC, id DESC  Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function budgets_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function budgets_details_by_id_and_code($id, $code) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id=:id AND code =:code ");
    $req->execute(array(
        "id" => $id,
        "code" => $code
    ));
    $data = $req->fetch();
    return $data;
}

function budgets_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM budgets WHERE id=? ");
    $req->execute(array($id));
}

function budgets_edit($id, $invoice_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status) {

    global $db;
    $req = $db->prepare(" UPDATE budgets SET "
            . "invoice_id=:invoice_id , "
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
    $req->execute(array(
        "id" => $id, "invoice_id" => $invoice_id, "credit_note_id" => $credit_note_id, "client_id" => $client_id, "seller_id" => $seller_id, "date" => $date, "date_registre" => $date_registre, "total" => $total, "tax" => $tax, "advance" => $advance, "balance" => $balance, "comments" => $comments, "comments_private" => $comments_private, "r1" => $r1, "r2" => $r2, "r3" => $r3, "fc" => $fc, "date_update" => $date_update, "days" => $days, "ce" => $ce, "key" => $key, "status" => $status,
    ));
}

function budgets_add($invoice_id, $credit_note_id, $client_id, $seller_id, $date, $date_registre, $total, $tax, $advance, $balance, $comments, $comments_private, $r1, $r2, $r3, $fc, $date_update, $days, $ce, $key, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budgets` ( `id` ,   `invoice_id` ,   `credit_note_id` ,   `client_id` ,   `seller_id` ,   `date` ,   `date_registre` ,   `total` ,   `tax` ,   `advance` ,   `balance` ,   `comments` ,   `comments_private` ,   `r1` ,   `r2` ,   `r3` ,   `fc` ,   `date_update` ,   `days` ,   `ce` ,   `key` ,   `status`   )
                                       VALUES  (:id ,  :invoice_id ,  :credit_note_id ,  :client_id ,  :seller_id ,  :date ,  :date_registre ,  :total ,  :tax ,  :advance ,  :balance ,  :comments ,  :comments_private ,  :r1 ,  :r2 ,  :r3 ,  :fc ,  :date_update ,  :days ,  :ce ,  :key ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "invoice_id" => $invoice_id,
        "credit_note_id" => $credit_note_id,
        "client_id" => $client_id,
        "seller_id" => $seller_id,
        "date" => $date,
        "date_registre" => $date_registre,
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

function budgets_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT 
        b.id, 
        b.invoice_id, 
        b.credit_note_id, 
        b.client_id, 
        b.title, 
        b.seller_id, 
        b.addresses_billing, 
        b.addresses_delivery, 
        b.date, 
        b.date_registre, 
        b.total,  
        b.tax,
        b.comments,
        b.comments_private,
        b.status,
        c.name,
        c.lastname,
        c.tva
        FROM budgets as b
        LEFT JOIN contacts as c ON b.client_id = c.id
    
WHERE 
b.id                    like :txt
OR b.invoice_id         like :txt
OR b.credit_note_id     like :txt
OR b.client_id          like :txt
OR b.title              like :txt
OR b.seller_id          like :txt
OR b.date               like :txt
OR b.date_registre      like :txt
OR b.total              like :txt
OR b.tax                like :txt
OR b.comments           like :txt
OR b.comments_private   like :txt
OR b.status             like :txt
OR c.name               like :txt
OR c.lastname           like :txt
OR c.tva                like :txt
           
ORDER BY b.date DESC LIMIT 9999999
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (budgets_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function budgets_is_id($id) {
    return true;
}

function budgets_is_invoice_id($invoice_id) {
    return true;
}

function budgets_is_credit_note_id($credit_note_id) {
    return true;
}

function budgets_is_client_id($client_id) {
    return true;
}

function budgets_is_seller_id($seller_id) {
    return true;
}

function budgets_is_date($date) {
    return true;
}

function budgets_is_date_registre($date_registre) {
    return true;
}

function budgets_is_total($total) {
    return true;
}

function budgets_is_tax($tax) {
    return true;
}

function budgets_is_advance($advance) {
    return true;
}

function budgets_is_balance($balance) {
    return true;
}

function budgets_is_comments($comments) {
    return true;
}

function budgets_is_comments_private($comments_private) {
    return true;
}

function budgets_is_r1($r1) {
    return true;
}

function budgets_is_r2($r2) {
    return true;
}

function budgets_is_r3($r3) {
    return true;
}

function budgets_is_fc($fc) {
    return true;
}

function budgets_is_date_update($date_update) {
    return true;
}

function budgets_is_days($days) {
    return true;
}

function budgets_is_ce($ce) {
    return true;
}

function budgets_is_key($key) {
    return true;
}

function budgets_is_status($status) {
    return true;
}

function budgets_field_code($field, $code) {
    global $db;

    if (!$code) {
        return false;
    }
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets WHERE code= ?");
    $req->execute(array(
        $code
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_add_by_client_id(
        $client_id, $code, $status
) {
    global $db;
    $req = $db->prepare(
            "INSERT INTO `budgets` ( `client_id`, `date`, `code`, `status`   )
                            VALUES  (:client_id , :date , :code,  :status  ) ");
    $req->execute(array(
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function budgets_add_by_client_id_and_budget_number(
        $id, $client_id, $code, $status
) {
    global $db;
    $req = $db->prepare(
            "INSERT INTO `budgets` (`id`, `client_id`, `date`, `code`, `status`   )
                            VALUES  (:id, :client_id , :date , :code,  :status  ) ");
    $req->execute(array(
        "id" => $id,
        "client_id" => $client_id,
        "client_id" => $client_id,
        "date" => date("Y-m-d"),
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function budgets_search_by_id($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_code($status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE status = ? order by date_registre DESC LIMIT 200");
    $req->execute(array($status));
    $data = $req->fetchall();
    return $data;
}

//function budgets_search_by_category_code($category_code) {
//    global $db;
//    $req = $db->prepare("SELECT * FROM budgets WHERE category_code = ? order by date_registre DESC LIMIT 999999");
//    $req->execute(array($category_code));
//    $data = $req->fetchall();
//    return $data;
//}

function budgets_search_by_status($status) {
    return budgets_search_by_code($status);
}

function budgets_search_list_clients_no_invoiced() {
    global $db;
    $status = 10;
    $req = $db->prepare(
            "SELECT owner_id, name, tva FROM contacts WHERE id IN (SELECT distinct(client_id)
            FROM budgets 
            WHERE status = :status 
        order by  date_registre DESC) ");

    $req->execute(array(
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

// lista de empresas que tienen notas de envio sin facturar 
// lista de oficinas que tienen notas de envio sin facturar 
// lista de oficinas segun empresa que tienen notas de credito sin facturar
function budgets_search_headoffice_whith_budgets_not_invoices($year, $month) {
    global $db;
    $status = 10;
    $req = $db->prepare(
            "SELECT owner_id, id FROM contacts WHERE id IN (SELECT distinct(client_id)
            FROM budgets 
            WHERE status = :status AND (year(date) = :year AND month(date) = :month)
        ) ORDER BY name");

    $req->execute(array(
        "status" => $status,
        "year" => $year,
        "month" => $month,
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_offices_by_headoffice_whith_budgets_not_invoices($head_office_id) {
    global $db;
    $status = 10;
    $req = $db->prepare("
            SELECT id, client_id, total, addresses_billing
            FROM budgets 
            WHERE client_id IN (SELECT id FROM contacts WHERE owner_id = :head_office_id) 
           AND status = :status
            ORDER BY client_id

"
    );

    $req->execute(array(
        "head_office_id" => $head_office_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id($client_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id= ? ORDER BY id DESC ");
    $req->execute(array($client_id));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_status($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id = :client_id AND status = :status ORDER BY id DESC LIMIT 200");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_status_year_month($client_id, $status, $year, $month) {
    global $db;
    $req = $db->prepare("
            SELECT * 
            FROM budgets 
            WHERE (client_id = :client_id AND status = :status) 
            AND
            (year(date) = :year AND month(date) = :month)
        ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
        "year" => $year,
        "month" => $month
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_statussss($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id= :client_id AND status =:status ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_id_status_same_addresse($client_id, $status, $addresses_delivery) {
    global $db;
    $req = $db->prepare(
            "SELECT * 
            FROM budgets 
            WHERE client_id= :client_id 
            AND status =:status 
            AND addresses_delivery =:addresses_delivery 
            
            ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
        "addresses_delivery" => $addresses_delivery
    ));
    $data = $req->fetchall();
    return $data;
}

//function budgets_search_by_client_id_status_same_addresse_today($client_id, $status, $addresses_delivery) {
//    global $db;
//    $req = $db->prepare(
//            "SELECT * 
//            FROM budgets 
//            WHERE client_id= :client_id 
//            AND status =:status 
//            AND addresses_delivery =:addresses_delivery 
//            AND 
//            ( day(date_registre)=day(now()) AND month(date_registre)=month(now()) AND year(date_registre)=year(now()) )
//            
//            ORDER BY id DESC ");
//    $req->execute(array(
//        "client_id" => $client_id,
//        "status" => $status,
//        "addresses_delivery" => $addresses_delivery
//    ));
//    $data = $req->fetchall();
//    return $data;
//}
//

function budgets_search_by_client_id_status_same_addresse_today($client_id, $status, $address_delivery_id) {
    global $db;
    $req = $db->prepare(
            "SELECT * FROM (SELECT * , 
            JSON_UNQUOTE(JSON_EXTRACT(addresses_delivery, '$.id')) as address_delivery_id
            FROM budgets ) A
            WHERE 
                client_id= :client_id 
            AND status =:status             
            AND address_delivery_id =:address_delivery_id             
            AND 
            ( day(date_registre)=day(now()) AND month(date_registre)=month(now()) AND year(date_registre)=year(now()) )
            
            ORDER BY id DESC ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
        "address_delivery_id" => $address_delivery_id
    ));
    $data = $req->fetchall();
    return $data;
}

// https://stackoverflow.com/questions/27778366/search-as-alias-in-sql-server

function budgets_search_by_client_id_status_same_addresse_others_days($client_id, $status, $address_delivery_id) {
    global $db;
    $req = $db->prepare(
            "SELECT * FROM (SELECT * ,
                
            JSON_UNQUOTE(JSON_EXTRACT(addresses_delivery, '$.id')) as address_delivery_id
            
            FROM budgets ) A

            WHERE (client_id = :client_id 

            AND status = :status )
            
            AND `address_delivery_id` = :address_delivery_id 
           
            
             ");
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status,
        "address_delivery_id" => $address_delivery_id
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_comments_update($budget_id, $comments) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET comments=:comments WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "comments" => $comments
            )
    );
}

function budgets_update_ce($budget_id, $ce) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET ce=:ce WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "ce" => $ce
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_client_id($budget_id, $client_id) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET client_id=:client_id WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "client_id" => $client_id
            )
    );
}

function budgets_update_title($budget_id, $title) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET title=:title WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "title" => $title
            )
    );
}

function budgets_update_seller($budget_id, $seller_id) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET seller_id=:seller_id WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "seller_id" => $seller_id
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_totalsxxxxxxxx($budget_id) {
    global $db;

    $req = $db->prepare(
            " UPDATE budgets SET 
             total= (SELECT SUM(quantity*price)  FROM `budget_lines` WHERE `budget_id` = :id ) , 
             tax=   (SELECT SUM((( quantity * price ) * tax) / 100) FROM `budget_lines` WHERE `budget_id` = :id )  
            
            WHERE id=:id  ");
    //$req = $db->prepare(" UPDATE budgets SET total=:total , tax=:tax WHERE id=:id  ");


    $req->execute(array(
        "id" => $budget_id
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_total_tax($id, $total, $tax) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET total=:total, tax=:tax WHERE id=:id  ");
    $req->execute(array(
        "total" => $total,
        "tax" => $tax,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function budget_lines_totalHTVA($budget_id) {
    global $db;

    $data = null;

    //$req = $db->prepare("SELECT SUM(((quantity * price)-discounts) * (tax/100))  as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");
    // $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,( (quantity * price) - ( (quantity * price) * discounts) / 100), ((quantity * price) - discounts) )) as total  FROM invoice_lines WHERE invoice_id=:invoice_id ");
    $req = $db->prepare("SELECT SUM(if( discounts_mode = '%' ,((quantity * price) - ((quantity * price) * discounts )/100), ((quantity * price) - discounts) )) as total  FROM budget_lines WHERE budget_id=:budget_id ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function budget_lines_totalTVA($budget_id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) ) ) as total  FROM budget_lines WHERE budget_id=:budget_id ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function budgets_update_total_advance($id, $advance) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET advance=:advance WHERE id=:id  ");
    $req->execute(array(
        "advance" => $advance,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function budgets_change_status_to($id, $status) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET status=:status WHERE id=:id  ");
    $req->execute(array(
        "status" => $status,
        "id" => $id
            )
    );
    //return $db->lastInsertId();
}

function budgets_change_date($id, $date) {
    global $db;
    $req = $db->prepare(
            "UPDATE budgets 
            SET date=:date 
            WHERE id=:id          
        ");
    $req->execute(array(
        "date" => $date,
        "id" => $id
            )
    );
}

function budgets_modal_reminder_send($r, $budget_id) {
    include view("budgets", "modal_reminder_send");
}

function budgets_copy_to_invoice($budget_id, $key) {
    global $db;

    $req = $db->prepare(" INSERT INTO `invoices` 
            
            (`budget_id`, `credit_note_id`, `client_id`, `seller_id`, `addresses_billing`, `addresses_delivery`, 
            `date`, `date_registre`, `total`, `tax`, `advance`, `balance`, 
            `comments`, `comments_private`, `r1`, `r2`, `r3`, `fc`, 
            `date_update`, `days`, `ce`, `key`, `status`) 
            
            SELECT   
            
            null,         `credit_note_id`, `client_id`, `seller_id`, `addresses_billing`, `addresses_delivery`, 
            `date`, `date_registre`, `total`, `tax`, `advance`, `balance`, 
            `comments`, `comments_private`, `r1`, `r2`, `r3`, `fc`, 
            `date_update`, `days`, `ce`, :key, `status`  
            
            FROM budgets WHERE id=:id  ");

    $req->execute(array(
        "id" => $budget_id,
        "key" => $key
    ));
    return $db->lastInsertId();
}

function budgets_copy_items_to_invoice_items($budget_id, $invoice_id) {
    global $db;

    $req = $db->prepare(
            "INSERT INTO `invoice_lines` 
            (`invoice_id`, `budget_id`, `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status`) SELECT 
             :invoice_id,  :budget_id,  `code`, `quantity`, `description`, `price`, `discounts`, `discounts_mode`, `tax`, `order_by`, `status` FROM `budget_lines`  WHERE `budget_id` = :budget_id  ");

    $req->execute(array(
        "budget_id" => $budget_id,
        "invoice_id" => $invoice_id
    ));

    return $db->lastInsertId();
}

function budgets_update_invoice_id($budget_id, $invoice_id) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET invoice_id=:invoice_id WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "invoice_id" => $invoice_id
            )
    );
    //return $db->lastInsertId();
}

function budgets_total_by_client_id($client_id) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM budgets WHERE client_id= ?');
    $req->execute(array($client_id));
    $data = $req->fetch();
    return $data[0];
}

function budgets_total_by_status($status) {
    global $db;
    $req = $db->prepare(" SELECT COUNT(*)  FROM budgets  WHERE status=?  ");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}

function budgets_total_by_budget_id($id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total + tax) as total FROM budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetchall();
    return doubleval($data[0][0]);
}

function budgets_total_by_client_id_status($client_id, $status) {
    global $db;
    $data = 0;
    $req = $db->prepare('SELECT COUNT(*) FROM budgets WHERE client_id= :client_id AND status = :status');
    $req->execute(array(
        "client_id" => $client_id,
        "status" => $status
    ));
    $data = $req->fetch();
    return $data[0];
}

function budgets_search_by_client($client_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id = ? order by date_registre DESC");
    $req->execute(array($client_id));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_status($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status order by date_registre DESC");
    $req->execute(array(
        'client_id' => $client_id,
        'status' => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_client_ce($client_id, $ce) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND ce = :ce ");
    $req->execute(array(
        'client_id' => $client_id,
        'ce' => $ce
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_start_by_client_id($client_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND code like :code ");
    $req->execute(array(
        'client_id' => $client_id,
        'code' => "start%"
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_search_advanced(
        $client_id, $status, $year, $month, $unbilled
) {
    global $db;
/////////////
// no facturados unicamente
//    
    if ($unbilled) {
        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status AND id NOT IN (SELECT budget_id FROM `budgets_invoices` ) LIMIT 200 ");
        $req->execute(array(
            'client_id' => $client_id,
            'status' => $status,
        ));
    } else {
        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
        $req->execute(array(
            'client_id' => $client_id,
            'status' => $status,
            'start' => "$year-$month-01 00:00:00",
            'end' => "$year-$month-31 23:59:59"
        ));
    }
//////////////    
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_all(
        $client_id, $status, $year, $month
) {
    global $db;

    // si no envio cliente 
    if ($client_id == "all") {
        if ($status == "all") {
            /////////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE  (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200 ");
            $req->execute(array(
                // 'client_id' => $client_id, 
                // 'status' => $status,                                
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        } else { // un status espeficico
            ///////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
            $req->execute(array(
                //    'client_id' => $client_id, 
                'status' => $status,
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        }
    } else { // si un especifico
        if ($status == "all") {
            /////////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
            $req->execute(array(
                'client_id' => $client_id,
                // 'status' => $status,                                
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        } else { // un status espeficico
            ///////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
            $req->execute(array(
                'client_id' => $client_id,
                'status' => $status,
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        }
    }



//        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
//            $req->execute(array(
//                'client_id' => $client_id, 
//                'status' => $status,                                
//                'start'=>"$year-$month-01 00:00:00", 
//                'end'=>"$year-$month-31 23:59:59"
//        ));       
//////////////    
    $data = $req->fetchall();
    return $data;
}

function budgets_search_by_full($client_id = 'all', $status = 'all', $year = 'all', $month = 'all') {
    global $db;

    // si no envio cliente 
    if ($client_id == "all") {
        if ($status == "all") {
            /////////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE  (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200 ");
            $req->execute(array(
                // 'client_id' => $client_id, 
                // 'status' => $status,                                
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        } else { // un status espeficico
            ///////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
            $req->execute(array(
                //    'client_id' => $client_id, 
                'status' => $status,
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        }
    } else { // si un especifico
        if ($status == "all") {
            /////////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
            $req->execute(array(
                'client_id' => $client_id,
                // 'status' => $status,                                
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        } else { // un status espeficico
            ///////////////////////////////
            $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC LIMIT 200");
            $req->execute(array(
                'client_id' => $client_id,
                'status' => $status,
                'start' => "$year-$month-01 00:00:00",
                'end' => "$year-$month-31 23:59:59"
            ));
            ///////////////////////////////
        }
    }



//        $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status  AND (date_registre BETWEEN :start AND :end) order by date_registre DESC");
//            $req->execute(array(
//                'client_id' => $client_id, 
//                'status' => $status,                                
//                'start'=>"$year-$month-01 00:00:00", 
//                'end'=>"$year-$month-31 23:59:59"
//        ));       
//////////////    
    $data = $req->fetchall();
    return $data;
}

function budgets_not_invoiced_by_client_id($client_id, $status) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id =:client_id AND status = :status AND id NOT IN (SELECT budget_id FROM `budgets_invoices` ) ORDER BY date_registre LIMIT 200");
    $req->execute(array(
        'client_id' => $client_id,
        'status' => $status,
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Invoices by company, headoffice and offices
 * @global type $db
 * @param type $client_id
 * @param type $status
 * @return type
 */
function budgets_not_invoiced_by_company_id($company_id, $status) {
    // debo sacar la lista de oficinas de una compania, 
    // y si una orden tiene el client_id entre esas id, envio 



    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id IN (SELECT id FROM contacts WHERE owner_id =:company_id )  AND status = :status AND id NOT IN (SELECT budget_id FROM `budgets_invoices` ) ORDER BY date_registre ");
    $req->execute(array(
        'company_id' => $company_id,
        'status' => $status,
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_on_this_invoice($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE id IN (SELECT budget_id FROM `budgets_invoices` WHERE invoice_id = :invoice_id ) ");
    $req->execute(array(
        'invoice_id' => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}

# son presupuestos que no estan facturadas, 

function budgets_search_by_not_invoiced($client_id, $y, $m) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets WHERE client_id = :client_id AND invoice_id = null order by date_registre DESC");
    $req->execute(array(
        'cliente_id' => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_update_delivery_address($budget_id, $new_address) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET addresses_delivery =:addresses_delivery WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "addresses_delivery" => $new_address
            )
    );
    //return $db->lastInsertId();
}

function budgets_update_billing_address($budget_id, $new_address) {
    global $db;
    $req = $db->prepare(" UPDATE budgets SET addresses_billing =:addresses_billing WHERE id=:id  ");
    $req->execute(array(
        "id" => $budget_id,
        "addresses_billing" => $new_address
            )
    );
    //return $db->lastInsertId();
}

function budgets_get_year_1_budget() {
    return 2021;
}

function budgets_can_be_edit($budget_id) {
    return (budgets_why_can_not_be_edit($budget_id)) ? false : true;
}

function budgets_why_can_not_be_edit($budget_id) {

    $error = array();

    if (!$budget_id) {
        array_push($error, "ID dont send");
    }

    if (!budgets_is_id($budget_id)) {
        array_push($error, "ID format error");
    }

    switch (budgets_field_id("status", $budget_id)) {
        case 0:
            array_push($error, "This invoice has status error");
            break;

        case -10:
            array_push($error, "Invoice cancel");
            break;

        case 35:
            array_push($error, "Invoice created");
            break;

        default:
            break;
    }

    // si ya pertenece a alguna factura
    if (budgets_invoices_search_invoice_by_budget_id($budget_id)) {
        array_push($error, "This budget is already in an invoice");
    }

    return $error;
}

function budgets_can_change_client($budget_id, $new_client_id) {

    return ( budgets_why_can_not_change_client($budget_id, $new_client_id) ) ? false : true;
}

function budgets_why_can_not_change_client($budget_id, $new_client_id) {

    $error = array();

    if (!budgets_can_be_edit($budget_id)) {
        $error = invoices_why_can_not_be_edit($budget_id);
    }

    if (!contacts_is_id($new_client_id)) {
        array_push($error, '$new_client_id format error');
    }

    // si esta ya en una factura 
    if (budgets_invoices_list_invoice_by_budget_id($budget_id)) {
        array_push($error, "This budget is in a invoice");
    }

    // si el modulo de audio esta activo 
    // y viene de una orden 
    if (modules_field_module('status', "audio") && orders_budgets_list_orders_by_budget($budget_id)) {
        array_push($error, "This budgets come from a order");
    }


    return $error;
}

/**
 * No hay titulo en budgets
 */
//function budgets_update_title($budget_id, $title) {
//    global $db;
//    $req = $db->prepare(" UPDATE budgets SET title=:title WHERE id=:id  ");
//    $req->execute(array(
//        "id" => $budget_id,
//        "title" => $title
//            )
//    );
//}

function budgets_next_number() {
    global $db;
    $req = $db->prepare("SELECT max(id) FROM budgets ORDER BY id DESC LIMIT 1  ");
    $req->execute(array());
    $data = $req->fetch();
    return $data[0] + 1;
}

function budgets_max_id() {
    global $db;
    $req = $db->prepare("SELECT max(id) FROM budgets ORDER BY id DESC LIMIT 1  ");
    $req->execute(array());
    $data = $req->fetch();
    return $data[0];
}

// recibo la factura y lista de array para agregarlos a la factura 

function budgets_add_budget_to_invoice($invoice_id, $budget_id) {

    // agrego una linea a la factura
    invoice_lines_add_with_budget_id($invoice_id, $budget_id, "BUDGET", 1, "Budget $budget_id", 0, 0, '%', 0, 1, 1);
    //invoice_lines_add($invoice_id , null , 1 , "Budget $budget_id " , 0 , 0 , '%' , 0 , 1 , 1); 
    // copio los item del budget a la factura
    budgets_copy_items_to_invoice_items($budget_id, $invoice_id);

    // recalcula el total de los items de esa factura y los actualiza en la DB    
    invoices_update_total_tax($invoice_id, invoice_lines_totalHTVA($invoice_id), invoice_lines_totalTVA($invoice_id));

    // cambio de status el budgets
    budgets_change_status_to($budget_id, 30);

    // registro en la tabla budgets_invoices
    budgets_invoices_add($budget_id, $invoice_id, null, 1, 1);
}

function budget_lines_sum_lines_discounts_by_tax($budget_id, $tax) {
    global $db;
    $data = null;
    //$req = $db->prepare("SELECT SUM( quantity * price ) as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    //$req = $db->prepare("SELECT SUM( if(discounts_mode = '%', ((quantity * price) - ((quantity * price) * discounts )/100) ,        (quantity * price) - discounts ) * ( (tax/100) )  )  as total  FROM invoice_lines WHERE invoice_id=:invoice_id AND tax=:tax");
    $req = $db->prepare("
            
            SELECT SUM( 
                    if
                (discounts_mode = '%', 
                    ((quantity*price)-((quantity*price)*discounts)/100) , 
                    
                    discounts
                            
                            )     
                    )  as total
                    
                            FROM budget_lines 
                            WHERE budget_id=:budget_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budget_lines_total_items_by_tax($budget_id, $tax) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT SUM( quantity ) as total  FROM budget_lines WHERE budget_id=:budget_id AND tax=:tax");
    $req->execute(array(
        "tax" => $tax,
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function budgets_search_by_tva_status($tva, $status = null) {
    global $db;
//    $req = $db->prepare("SELECT * FROM budgets WHERE ( `client_id` = :client_id AND status = :status )");
    $req = $db->prepare("SELECT count(id) FROM budgets  ");
    $req->execute(array(
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_order_by($position, $budget_id) {
    global $db;

    $i = 1;
    foreach ($position as $k => $v) {
        $req = $db->prepare(" Update `budget_lines` SET `order_by`=  :i WHERE `id` = :v AND budget_id = :budget_id ");
        $req->execute(array(
            ":i" => (int) $i,
            ":v" => (int) $v,
            ":budget_id" => (int) $budget_id,
        ));

        $i++;
    }
}

// SEARCH
function services_categories_without_father($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT *   FROM `services_categories` 
    WHERE `category_father` IS NULL  
    ORDER BY `order_by` DESC, `id` DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
//    $query->bindValue(':field', "field", PDO::PARAM_STR);
//    $query->bindValue(':txt',   "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}
