<?php

// plugin = clients
// creation date : 
// 
// 
function clients_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM clients WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function clients_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM clients WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function clients_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM clients ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function clients_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM clients WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function clients_details_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM clients WHERE contact_id= ? ");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return $data;
}

function clients_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM clients WHERE id=? ");
    $req->execute(array($id));
}

function clients_edit($id, $contact_id, $date, $discount, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE clients SET "
            . "contact_id=:contact_id , "
            . "date=:date , "
            . "discount=:discount , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "contact_id" => $contact_id, "date" => $date, "discount" => $discount, "order_by" => $order_by, "status" => $status,
    ));
}

function clients_add($contact_id, $date, $discount, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `clients` ( `id` ,   `contact_id` ,   `date` ,   `discount` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :contact_id ,  :date ,  :discount ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "date" => $date,
        "discount" => $discount,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function clients_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM clients 
    
            WHERE id like :txt OR id like :txt
OR contact_id like :txt
OR date like :txt
OR discount like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function clients_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (clients_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function clients_is_id($id) {
    return true;
}

function clients_is_contact_id($contact_id) {
    return true;
}

function clients_is_date($date) {
    return true;
}

function clients_is_discount($discount) {
    return true;
}

function clients_is_order_by($order_by) {
    return true;
}

function clients_is_status($status) {
    return true;
}

function clients_search_discount_by_client($contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT discount FROM clients WHERE contact_id= ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}
