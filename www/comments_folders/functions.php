<?php

//
//
// plugin = comments_folders
// creation date : 
// 
// 
function comments_folders_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_folders WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_folders_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_folders WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_folders_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_folders WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_folders_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM comments_folders  ORDER BY order_by, label   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_folders_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comments_folders WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function comments_folders_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM comments_folders WHERE id=? ");
    $req->execute(array($id));
}

function comments_folders_edit($id, $name, $label, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE comments_folders SET "
            . "name=:name , "
            . "label=:label , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "name" => $name, "label" => $label, "order_by" => $order_by, "status" => $status,
    ));
}

function comments_folders_add($name, $label, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `comments_folders` ( `id` ,   `name` ,   `label` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :name ,  :label ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "name" => $name,
        "label" => $label,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function comments_folders_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments_folders 
    
            WHERE id like :txt OR id like :txt
OR name like :txt
OR label like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_folders_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (comments_folders_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function comments_folders_is_id($id) {
    return true;
}

function comments_folders_is_name($name) {
    return true;
}

function comments_folders_is_label($label) {
    return true;
}

function comments_folders_is_order_by($order_by) {
    return true;
}

function comments_folders_is_status($status) {
    return true;
}
