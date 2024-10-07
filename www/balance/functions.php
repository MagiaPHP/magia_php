<?php

// plugin = balance
// creation date : 
// 
// 
function balance_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM balance WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function balance_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM balance WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function balance_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM balance WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Check the operation number $ref in this $account_number
 * @global type $db
 * @param type $account_number Account number where check the $ref
 * @param type $ref Operation number in the $account_number
 * @return Retourne array [id, canceled_code ]
 * // Error if exist
 * array_push($error , 'This reference already exists in this account number') ;
 */
function balance_search_by_account_ref($account_number, $ref) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT id, canceled_code             
            FROM balance 
            WHERE (account_number=:account_number and ref = :ref) AND  canceled_code is NULL"
    );
    $req->execute(array(
        "account_number" => $account_number,
        "ref" => $ref,
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function balance_listxxxxxxx() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance  ORDER BY id DESC   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_list($start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM `balance` ORDER BY id DESC  Limit :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function balance_search_by_year_month_status($year, $month, $only_cancelled, $order = 1, $start = 0, $limit = 999999) {
    global $db;

    switch ($order) {
        case 1:
            $order_by = 'id';
            break;
        case 2:
            $order_by = 'client_id';
            break;
        case 3:
            $order_by = 'expense_id';
            break;
        case 4:
            $order_by = 'invoice_id';
            break;
        case 5:
            $order_by = 'credit_note_id';
            break;
        case 6:
            $order_by = 'type';
            break;
        case 7:
            $order_by = 'account_number';
            break;
        case 8:
            $order_by = 'sub_total';
            break;
        case 9:
            $order_by = 'tax';
            break;
        case 10:
            $order_by = 'total';
            break;
        case 11:
            $order_by = 'ref';
            break;
        case 12:
            $order_by = 'description';
            break;
        case 13:
            $order_by = 'ce';
            break;
        case 14:
            $order_by = 'date';
            break;
        case 15:
            $order_by = 'date_registre';
            break;
        case 16:
            $order_by = 'canceled';
            break;
        case 17:
            $order_by = 'canceled_code';
            break;

        default:
            $order_by = 'id';
            break;
    }

    if ($only_cancelled) {
        $query = $db->prepare(
                "   SELECT * 
            FROM balance 
            WHERE 
            (YEAR(date) =:year AND MONTH(date)=:month)    
            AND canceled_code IS NOT NULL
            ORDER BY :order_by
            Limit  :limit OFFSET :start        
        ");
    } else {
        $query = $db->prepare(
                "   SELECT * 
            FROM balance 
            WHERE 
            (YEAR(date) =:year AND MONTH(date)=:month)             
            ORDER BY :order_by
            Limit  :limit OFFSET :start
        ");
    }

    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();

    $data = $query->fetchall();
    return (isset($data)) ? $data : false;
}

function balance_search_by_year_trimestre_status($year, $tri, $only_cancelled, $order = 1) {
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
            $order_by = 'id';
            break;
        case 2:
            $order_by = 'client_id';
            break;
        case 3:
            $order_by = 'expense_id';
            break;
        case 4:
            $order_by = 'invoice_id';
            break;
        case 5:
            $order_by = 'credit_note_id';
            break;
        case 6:
            $order_by = 'type';
            break;
        case 7:
            $order_by = 'account_number';
            break;
        case 8:
            $order_by = 'sub_total';
            break;
        case 9:
            $order_by = 'tax';
            break;
        case 10:
            $order_by = 'total';
            break;
        case 11:
            $order_by = 'ref';
            break;
        case 12:
            $order_by = 'description';
            break;
        case 13:
            $order_by = 'ce';
            break;
        case 14:
            $order_by = 'date';
            break;
        case 15:
            $order_by = 'date_registre';
            break;
        case 16:
            $order_by = 'canceled';
            break;
        case 17:
            $order_by = 'canceled_code';
            break;

        default:
            $order_by = 'id';
            break;
    }


    if ($only_cancelled) {
        $req = $db->prepare(
                "   SELECT * 
            FROM balance 
            WHERE YEAR(date) =:year AND 
            (
            MONTH(date)=:m1 OR 
            MONTH(date)=:m2 OR 
            MONTH(date)=:m3 
            ) AND canceled_code IS NOT NULL             
            ORDER BY $order_by          
        ");
    } else {
        $req = $db->prepare(
                "   SELECT * 
            FROM balance 
            WHERE YEAR(date) =:year AND 
            (
            MONTH(date)=:m1 OR 
            MONTH(date)=:m2 OR 
            MONTH(date)=:m3 
            )             
            ORDER BY $order_by           
        ");
    }

    $req->execute(array(
        "year" => $year,
        "m1" => $m1,
        "m2" => $m2,
        "m3" => $m3,
    ));

    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function balance_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM balance WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function balance_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM balance WHERE id=? ");
    $req->execute(array($id));
}

function balance_edit($id, $client_id, $invoice_id, $credit_note_id, $type, $account_number, $sub_total, $tax, $total, $ref, $description, $ce, $date, $date_registre, $code, $canceled, $canceled_code) {

    global $db;
    $req = $db->prepare(" UPDATE balance SET "
            . "client_id=:client_id , "
            . "invoice_id=:invoice_id , "
            . "credit_note_id=:credit_note_id , "
            . "type=:type , "
            . "account_number=:account_number , "
            . "sub_total=:sub_total , "
            . "tax=:tax , "
            . "total=:total , "
            . "ref=:ref , "
            . "description=:description , "
            . "ce=:ce , "
            . "date=:date , "
            . "date_registre=:date_registre , "
            . "code=:code , "
            . "canceled=:canceled , "
            . "canceled_code=:canceled_code  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "client_id" => $client_id, "invoice_id" => $invoice_id, "credit_note_id" => $credit_note_id, "type" => $type, "account_number" => $account_number, "sub_total" => $sub_total, "tax" => $tax, "total" => $total, "ref" => $ref, "description" => $description, "ce" => $ce, "date" => $date, "date_registre" => $date_registre, "code" => $code, "canceled" => $canceled, "canceled_code" => $canceled_code,
    ));
}

function balance_add(
        $client_id, $expense_id, $invoice_id, $credit_note_id, $type,
        $account_number, $sub_total, $tax, $total,
        $ref, $description, $ce, $date, $date_registre, $code, $canceled, $canceled_code) {
    global $db;
    $req = $db->prepare(" INSERT INTO `balance` (`id`, `client_id`, `expense_id`,  `invoice_id`, `credit_note_id`,   `type`,  `account_number`,  `sub_total`,  `tax`,  `total`,  `ref`,  `description`,  `ce`,  `date`,  `date_registre`, `code` ,   `canceled` ,   `canceled_code`   )
                                       VALUES   (:id ,  :client_id , :expense_id,  :invoice_id ,  :credit_note_id ,  :type ,  :account_number ,  :sub_total ,  :tax ,  :total ,  :ref ,  :description ,  :ce ,  :date ,  :date_registre,  :code ,  :canceled ,  :canceled_code   ) ");

    $req->execute(array(
        "id" => null,
        "client_id" => $client_id,
        "expense_id" => $expense_id,
        "invoice_id" => $invoice_id,
        "credit_note_id" => $credit_note_id,
        "type" => $type,
        "account_number" => $account_number,
        "sub_total" => $sub_total,
        "tax" => $tax,
        "total" => $total,
        "ref" => $ref,
        "description" => $description,
        "ce" => $ce,
        "date" => $date,
        "date_registre" => date("Y-m-d H:m:s"),
        "code" => $code,
        "canceled" => $canceled,
        "canceled_code" => $canceled_code
            )
    );

    return $db->lastInsertId();
}

function balance_search($txt, $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT * FROM balance 
            WHERE 
            id like :txt
            OR client_id like :txt
            OR invoice_id like :txt
            OR credit_note_id like :txt
            OR type like :txt
            OR account_number like :txt
            OR sub_total like :txt
            OR tax like :txt
            OR total like :txt
            OR ref like :txt
            OR description like :txt
            OR ce like :txt
            OR date like :txt
            OR date_registre like :txt
            OR code like :txt
            OR canceled like :txt
            OR canceled_code like :txt ORDER BY id DESC
            Limit :limit OFFSET :start 
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function balance_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (balance_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function balance_is_id($id) {
    return true;
}

function balance_is_client_id($client_id) {
    return true;
}

function balance_is_invoice_id($invoice_id) {
    return true;
}

function balance_is_credit_note_id($credit_note_id) {
    return true;
}

function balance_is_type($type) {
    return true;
}

function balance_is_account_number($account_number) {
    return true;
}

function balance_is_sub_total($sub_total) {
    return true;
}

function balance_is_tax($tax) {
    return true;
}

function balance_is_total($total) {
    return true;
}

function balance_is_ref($ref) {
    return true;
}

function balance_is_description($description) {
    return true;
}

function balance_is_ce($ce) {
    return true;
}

function balance_is_date($date) {
    return true;
}

function balance_is_date_registre($date_registre) {
    return true;
}

function balance_is_code($code) {
    return true;
}

function balance_is_canceled($canceled) {
    return true;
}

function balance_is_canceled_code($canceled_code) {
    return true;
}

function balance_list_by_invoice($invoice_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM balance WHERE invoice_id = :invoice_id ORDER BY id   ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_list_by_expense($expense_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM balance WHERE expense_id = :expense_id ORDER BY id   ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_list_by_credit_note($credit_note_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance WHERE credit_note_id = :credit_note_id ORDER BY id   ");

    $req->execute(array(
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_list_by_invoice_id($invoice_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM balance WHERE invoice_id = :invoice_id ORDER BY id   ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_e_add(
        $client_id, $invoice_id, $credit_note_id, $type, $account_number, $sub_total, $tax, $total,
        $ref, $description, $ce, $date, $date_registre, $code, $canceled, $canceled_code
) {
    global $db;
    $req = $db->prepare(" INSERT INTO `balance` "
            . "(`id`, `client_id`, `invoice_id`, `credit_note_id`, `type`, `account_number`, `sub_total`, `tax`, `total`, `ref`, `description`, `ce`, `date`,`date_registre`, `code`, `canceled`, `canceled_code`) "
            . "VALUES (:id,  :client_id,  :invoice_id,  :credit_note_id,  :type,  :account_number,  :sub_total,  :tax,   :total,  :ref, :description,  :ce,  :date, :date_registre, :code,  :canceled, :canceled_code);");

    $req->execute(array(
        "id" => null,
        "client_id" => $client_id,
        "invoice_id" => $invoice_id,
        "credit_note_id" => $credit_note_id,
        "type" => $type,
        "account_number" => $account_number,
        "sub_total" => $sub_total,
        "tax" => $tax,
        "total" => $total,
        "ref" => $ref,
        "description" => $description,
        "ce" => $ce,
        "date" => $date,
        "date_registre" => $date_registre,
        "code" => $code,
        "canceled" => $canceled,
        "canceled_code" => $canceled_code
            )
    );

    return $db->lastInsertId();
}

function balance_total_pay_by_invoice($invoice_id) {
    global $db;
    $req = $db->prepare(" SELECT SUM(sub_total + tax) as total FROM balance WHERE invoice_id = :invoice_id ");

    $req->execute(array(
        "invoice_id" => $invoice_id
            )
    );
    $data = $req->fetch();
    return (float) $data[0];
}

/**
 * Copia la linea de labalanza y la pone en negativo
 * @global type $db
 * @param type $id
 * @param type $canceled_code
 * @return type
 */
function balance_cancel($id, $canceled_code) {
    global $db;
    $req = $db->prepare("  INSERT INTO `balance` (`client_id`,`expense_id`, `invoice_id`, `credit_note_id`, `type`, `account_number`, `sub_total`, `tax`, `total`, `ref`, `description`, `ce`, `date`, `canceled`, `canceled_code`) SELECT `client_id`, `expense_id`, `invoice_id`, `credit_note_id`, -`type`, `account_number`, -`sub_total`, -`tax`, -`total`, `ref`, `description`, `ce`, `date`, `canceled`, :canceled_code FROM balance WHERE id=:id  ");
    $req->execute(array(
        "id" => $id,
        "canceled_code" => $canceled_code
    ));
    return $db->lastInsertId();
}

function balance_next_cancel_code() {
    global $db;
    $req = $db->prepare("SELECT MAX(canceled_code) FROM `balance`  ");
    $req->execute();
    $data = $req->fetch();
    return $data[0] + 1;
}

function balance_set_cancel_code($id, $canceled_code) {
    global $db;
    $req = $db->prepare(" UPDATE `balance` SET canceled_code=:canceled_code WHERE id=:id ");
    $req->execute(array(
        "canceled_code" => $canceled_code,
        "id" => $id
    ));

    return $db->lastInsertId();
}

function balance_set_credit_note_id_by_invoice($credit_note_id, $invoice_id) {
    global $db;
    $req = $db->prepare(" UPDATE `balance` SET credit_note_id=:credit_note_id WHERE invoice_id=:invoice_id AND type = -1 ");
    $req->execute(array(
        "credit_note_id" => $credit_note_id,
        "invoice_id" => $invoice_id
    ));

    return $db->lastInsertId();
}

function balance_total_total_by_invoice($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total) FROM `balance` WHERE invoice_id=:invoice_id  ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function balance_total_total_by_expense($expense_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(total) FROM `balance` WHERE expense_id =:expense_id  ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function balance_total_total_by_credit_note($credit_note_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(sub_total + tax ) FROM `balance` WHERE credit_note_id=:credit_note_id  ");
    $req->execute(array(
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

/**
 * El saldo del la cuenta
 * @global type $db
 * @param type $account_number
 * @return type
 */
function balance_total_by_account_number($account_number) {
    global $db;
    $req = $db->prepare("SELECT SUM(sub_total) + SUM(tax) as total  FROM `balance` WHERE account_number=:account_number  ");
    $req->execute(array(
        "account_number" => $account_number
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function balance_total_by_client_id_status_year($client_id, $canceled, $year, $start = 0, $limit = 999999) {
    global $db;

    if ($canceled === null) {
        $query = $db->prepare(
                "
            SELECT SUM(sub_total) + sum(tax) as total 
            FROM balance 
            WHERE client_id = :client_id AND 
            (
                canceled IS NULL 
                AND
                YEAR(date) =:year 
            )             
            ORDER BY id DESC LIMIT :start, :limit ");
    } else {
        $query = $db->prepare(
                "
            SELECT SUM(sub_total) + sum(tax) as total 
            FROM balance 
            WHERE client_id = :client_id AND 
            (
                canceled IS NOT NULL 
                AND
                YEAR(date) =:year 
            )             
            ORDER BY id DESC LIMIT :start, :limit ");
    }

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data[0];
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################

function balance_list_by_budget($budget_id) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM balance WHERE budget_id = :budget_id ORDER BY id DESC  ");

    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_search_by_codeCancel($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM balance WHERE canceled_code =:txt");
    $req->execute(array(
        "txt" => $txt
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_search_by_client_id($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * 
            FROM balance 
            WHERE client_id IN (SELECT id FROM contacts WHERE id = :client_id)
            OR expense_id IN (SELECT id FROM expenses WHERE client_id = :client_id )
            OR invoice_id IN (SELECT id FROM invoices WHERE client_id = :client_id )
            OR credit_note_id IN (SELECT id FROM credit_notes WHERE client_id = :client_id )
            
ORDER BY id DESC
        
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * payment list by client number and not documents
 * @global type $db
 * @param type $client_id
 * @return type
 */
function balance_total_payments_received_by_client_id_year($client_id, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT SUM(sub_total) + sum(tax) as total 
            FROM balance 
            WHERE client_id = :client_id AND type = '1'
            AND
            YEAR(date) =:year 
            AND 
            canceled_code IS NULL            
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

function balance_payments_received_by_client_id_year($client_id, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT *
            FROM balance 
            WHERE client_id = :client_id AND type = '1'
            AND
            YEAR(date) =:year 
            AND 
            canceled_code IS NULL
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

function balance_total_payments_send_to_client_by_client_id_year($client_id, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare("
            SELECT SUM(sub_total) + sum(tax) as total 
            FROM balance 
            WHERE client_id = :client_id AND type = '-1'
            AND
            YEAR(date) =:year 
            AND
            canceled_code IS NULL            
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

function balance_total_all_transactions_by_client_id_year($client_id, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT sum(sub_total) + sum(tax) as total 
            FROM balance 
            WHERE client_id = :client_id 
             AND
            YEAR(date) =:year 
            
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

function balance_all_transactions_by_client_id_year($client_id, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare(
            "
            SELECT *
            FROM balance 
            WHERE client_id = :client_id 
            AND
            YEAR(date) =:year 
            
            ORDER BY id  LIMIT :start, :limit ");

    $query->bindValue(':client_id', (int) $client_id, PDO::PARAM_INT);
    $query->bindValue(':year', (int) $year, PDO::PARAM_INT);
//    $query->bindValue(':month', (int) $month, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function balance_payments_send_to_client_by_client_id_year($client_id, $year, $start = 0, $limit = 999999) {
    global $db;
    $query = $db->prepare("
            SELECT SUM(sub_total) + sum(tax) as total 
            FROM balance 
            WHERE client_id = :client_id AND type = '-1'
            AND
            YEAR(date) =:year 
            AND
            canceled_code IS NULL            
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

function balance_search_by_payement_direct_by_client_id($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * 
            FROM balance WHERE client_id = :client_id            
            ORDER BY id DESC
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_total_by_payement_direct_by_client_id($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT SUM(sub_total + tax) as total
            FROM balance WHERE client_id = :client_id
            ORDER BY id DESC
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetch();
    return (float) $data[0] ?? false;
}

/**
 * selecciono invoice [id, (total+tax) as total, date_registre, status ] de cliente_id
 * balance [id, (total+tax) as total, date_registre, status ] que el invoice_id sea del de cliente_id
 * 
 * @global type $db
 * @param type $client_id
 * @return type
 */
function balance_business_situation_client_id($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
                    
SELECT 'invoice' as doc , i.id as id, (total + tax) as total, date_registre, i.status as status 

FROM invoices as i WHERE client_id = :client_id

UNION 

SELECT 'balance' as doc, b.id as id, (sub_total + tax) as total, date_registre , b.canceled as status

FROM balance as b 

WHERE b.invoice_id IN (SELECT id FROM invoices WHERE client_id = :client_id) 

OR b.client_id  = :client_id 

ORDER BY date_registre DESC 

        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * 
 * @global type $db
 * @param type $client_id
 * @return type
 */
function balance_business_situation_balance_client_id($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
                    
SELECT 'invoice' as doc , i.id as id, (total + tax) as total, date_registre, i.status as status 

FROM invoices as i WHERE client_id = :client_id

UNION 

SELECT 'balance' as doc, b.id as id, (sub_total + tax) as total, date_registre , b.canceled as status

FROM balance as b 

WHERE b.invoice_id IN (SELECT id FROM invoices WHERE client_id = :client_id) 

OR b.client_id  = :client_id 

ORDER BY date_registre DESC 

        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_business_situation_client_id_in($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
        
SELECT 'invoice' as doc , i.id as id, (total + tax) as total, date_registre, i.status as status

FROM invoices as i WHERE client_id = :client_id

UNION 

SELECT 
'balance' as doc, b.id as id, (sub_total + tax) as total, date_registre , b.canceled as status, b.`type` 

FROM 
balance as b 

WHERE 
b.`type` = 1  AND ( b.invoice_id IN (SELECT id FROM invoices WHERE client_id = :client_id) 
OR b.client_id  = :client_id ) 

ORDER BY date_registre DESC         
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_business_situation_client_id_out($client_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
        
SELECT 'invoice' as doc , i.id as id, (total + tax) as total, date_registre, i.status as status

FROM invoices as i WHERE client_id = :client_id

UNION 

SELECT 
'balance' as doc, 
b.id as id, 
(sub_total + tax) as total, 
date_registre , 
b.canceled as status, 
b.`type` 

FROM balance as b 

WHERE b.invoice_id IN (SELECT id FROM invoices WHERE client_id = :client_id) 

OR b.client_id  = :client_id

ORDER BY date_registre DESC         
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_business_situation() {
    global $db;
    $data = null;
    $req = $db->prepare("
        
SELECT 'invoice' as doc , i.id as id, (total + tax) as total, date_registre, i.status as status 

FROM invoices as i WHERE client_id = :client_id

UNION 

SELECT 'balance' as doc, b.id as id, (sub_total + tax) as total, date_registre , b.canceled as status

FROM balance as b 

ORDER BY date_registre DESC 
        
        ");
    $req->execute(array(
        "client_id" => $client_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_type($type) {
    if ($type == 1) {
        return _tr("Income");
    }

    if ($type == - 1) {
        return _tr("Expenses");
    }

    return _t("undefined");
}

function balance_general_list($limit = 50, $start = 0) {
    global $db;

    if ($limit) {
        $sql = "
                SELECT 
                c.id as contact_id, 
                i.id as invoice_id, (i.total + i.tax) as invoice_total                                                
                FROM `invoices` as i                 
                INNER JOIN contacts as c on c.id = i.client_id
                
                Limit :limit OFFSET :start  ";
    } else {
        $sql = "SELECT * FROM `invoices` ";
    }

    $query = $db->prepare($sql);

    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);

    $query->execute();

    $data = $query->fetchall();

    return $data;
}

function balance_show_($controller, $view, $data, $name) {

    $$name = $data;

    include view($controller, $view);
}

function balance_sum_subtotal_by_invoice($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(sub_total) FROM `balance` WHERE invoice_id=:invoice_id AND canceled_code IS NULL  ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}

function balance_sum_tax_by_invoice($invoice_id) {
    global $db;
    $req = $db->prepare("SELECT SUM(tax) FROM `balance` WHERE invoice_id=:invoice_id  AND canceled_code IS NULL ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetch();
    return (float) $data[0];
}
