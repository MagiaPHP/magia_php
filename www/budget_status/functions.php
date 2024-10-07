<?php

// plugin = budget_status
// creation date : 
// 
// 
function budget_status_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budget_status WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budget_status_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budget_status WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budget_status_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM budget_status  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function budget_status_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budget_status WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function budget_status_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM budget_status WHERE id=? ");
    $req->execute(array($id));
}

function budget_status_edit($id, $code, $status) {

    global $db;
    $req = $db->prepare(" UPDATE budget_status SET "
            . "code=:code , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "code" => $code, "status" => $status,
    ));
}

function budget_status_add($code, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budget_status` ( `id` ,   `code` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function budget_status_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM budget_status 
    
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

function budget_status_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (budget_status_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function budget_status_is_id($id) {
    return true;
}

function budget_status_is_code($code) {
    return true;
}

function budget_status_is_status($status) {
    return true;
}

function budget_status_by_status($status) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT status FROM budget_status WHERE code = ?");
    $req->execute(array($status));
    $data = $req->fetch();
    return $data[0];
}

function budget_status_list_extended() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM budget_status  ORDER BY order_by    ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}
