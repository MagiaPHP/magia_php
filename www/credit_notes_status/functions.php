<?php

// plugin = credit_notes_status
// creation date : 
// 
// 
function credit_notes_status_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes_status WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_status_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes_status WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_status_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_notes_status  ORDER BY id DESC   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_status_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_notes_status WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function credit_notes_status_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM credit_notes_status WHERE id=? ");
    $req->execute(array($id));
}

function credit_notes_status_edit($id, $code, $status, $order_by) {

    global $db;
    $req = $db->prepare(" UPDATE credit_notes_status SET "
            . "code=:code , "
            . "status=:status , "
            . "order_by=:order_by  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "code" => $code, "status" => $status, "order_by" => $order_by,
    ));
}

function credit_notes_status_add($code, $status, $order_by) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes_status` ( `id` ,   `code` ,   `status` ,   `order_by`   )
                                       VALUES  (:id ,  :code ,  :status ,  :order_by   ) ");

    $req->execute(array(
        "id" => null,
        "code" => $code,
        "status" => $status,
        "order_by" => $order_by
            )
    );

    return $db->lastInsertId();
}

function credit_notes_status_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM credit_notes_status 
    
            WHERE id like :txt OR id like :txt
OR code like :txt
OR status like :txt
OR order_by like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_status_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (credit_notes_status_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function credit_notes_status_is_id($id) {
    return true;
}

function credit_notes_status_is_code($code) {
    return true;
}

function credit_notes_status_is_status($status) {
    return true;
}

function credit_notes_status_is_order_by($order_by) {
    return true;
}

function credit_notes_status_by_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT status FROM credit_notes_status WHERE code = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}
