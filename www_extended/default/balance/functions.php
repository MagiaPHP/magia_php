<?php

function balance_search_by_($field, $txt, $start = 0, $limit = 999999) {
    global $db;
    $data = null;
    $query = $db->prepare("
            SELECT * 
            FROM balance 
            WHERE $field = $txt
            ORDER BY id DESC
            LIMIT :start, :limit            
        ");

    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function balance_search_by_id($id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * 
            FROM balance 
            WHERE id = :id
            ORDER BY id DESC
        ");
    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_search_by_expense_id($expense_id) {
    global $db;
    $data = null;
    $req = $db->prepare("
            SELECT * 
            FROM balance 
            WHERE expense_id = :expense_id
            
            ORDER BY id DESC
        
        ");
    $req->execute(array(
        "expense_id" => $expense_id
    ));
    $data = $req->fetchall();
    return $data;
}

function balance_status_list() {
    return array(
        null => "Registred",
        null => "Candeled",
    );
}

function balance_list_home($filter = array(), $start = 0, $limit = 999999) {
    global $db;

    $order_by = ($filter['order_by']) ?? " ORDER BY date ASC ";

    $sql = "                       
            SELECT * 
            

            
            FROM `balance` 
            $order_by   
            Limit :limit OFFSET :start  
        
        ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function balance_field_update($id, $field, $new_value) {

    switch ($field) {
        case 'client_id':
            balance_client_id_update($id, $new_value);
            break;
        case 'expense_id':
            balance_expense_id_update($id, $new_value);
            break;
        case 'invoice_id':
            balance_invoice_id_update($id, $new_value);
            break;
        case 'credit_note_id':
            balance_credit_note_id_update($id, $new_value);
            break;
        case 'type':
            balance_type_update($id, $new_value);
            break;
        case 'account_number':
            balance_account_number_update($id, $new_value);
            break;
        case 'sub_total':
            balance_sub_total_update($id, $new_value);
            break;
        case 'tax':
            balance_tax_update($id, $new_value);
            break;
        case 'total':
            balance_total_update($id, $new_value);
            break;
        case 'ref':
            balance_ref_update($id, $new_value);
            break;
        case 'description':
            balance_description_update($id, $new_value);
            break;
        case 'ce':
            balance_ce_update($id, $new_value);
            break;
        case 'date':
            balance_date_update($id, $new_value);
            break;
        default:
            break;
    }
}

function balance_client_id_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET client_id =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_expense_id_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET expense_id =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_invoice_id_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET invoice_id =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_credit_note_id_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET credit_note_id =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_type_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET type =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_account_number_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET account_number =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_sub_total_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET sub_total =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_total_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET total =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_tax_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET tax =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_ref_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET ref =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_description_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET description =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_ce_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET ce =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}

function balance_date_update($id, $new_value) {
    global $db;
    $req = $db->prepare(" UPDATE balance SET date =:new_value WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "new_value" => $new_value,
    ));
}
