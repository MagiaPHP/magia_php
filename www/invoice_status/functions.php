<?php

// plugin = invoice_status
// creation date : 
// 
// 
function invoice_status_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoice_status WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoice_status_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoice_status WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoice_status_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM invoice_status ORDER BY id   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_status_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM invoice_status WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function invoice_status_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM invoice_status WHERE id=? ");
    $req->execute(array($id));
}

function invoice_status_edit($id, $code, $status) {
    global $db;
    $req = $db->prepare(" UPDATE invoice_status SET "
            . "code=:code , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "code" => $code, "status" => $status,
    ));
}

function invoice_status_add($code, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `invoice_status` ( `id` ,   `code` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "code" => $code,
        "status" => $status
            )
    );
    return $db->lastInsertId();
}

function invoice_status_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoice_status 
    
            WHERE id like :txt OR id like :txt
OR code like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function invoice_status_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (invoice_status_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function invoice_status_is_id($id) {
    return true;
}

function invoice_status_is_code($code) {
    return true;
}

function invoice_status_is_status($status_code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT id FROM invoice_status WHERE code = :status_code ");
    $req->execute(array(
        "status_code" => $status_code
    ));
    $data = $req->fetch();
    return ($data) ? true : false;
}

function invoice_status_by_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT status FROM invoice_status WHERE code = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}
