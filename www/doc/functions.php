<?php

// plugin = doc
// creation date : 
// 
// 
function doc_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM doc WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function doc_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM doc WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function doc_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM doc WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function doc_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM doc  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function doc_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM doc WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function doc_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM doc WHERE id=? ");
    $req->execute(array($id));
}

function doc_edit($id, $category_id, $title, $body, $title_icon, $sumary, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE doc SET "
            . "category_id=:category_id , "
            . "title=:title , "
            . "body=:body , "
            . "title_icon=:title_icon , "
            . "sumary=:sumary , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "category_id" => $category_id, "title" => $title, "body" => $body, "title_icon" => $title_icon, "sumary" => $sumary, "order_by" => $order_by, "status" => $status,
    ));
}

function doc_add($category_id, $title, $body, $title_icon, $sumary, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `doc` ( `id` ,   `category_id` ,   `title` ,   `body` ,   `title_icon` ,   `sumary` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :category_id ,  :title ,  :body ,  :title_icon ,  :sumary ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "category_id" => $category_id,
        "title" => $title,
        "body" => $body,
        "title_icon" => $title_icon,
        "sumary" => $sumary,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function doc_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM doc 
    
            WHERE id like :txt OR id like :txt
OR category_id like :txt
OR title like :txt
OR body like :txt
OR title_icon like :txt
OR sumary like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function doc_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (doc_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function doc_is_id($id) {
    return true;
}

function doc_is_category_id($category_id) {
    return true;
}

function doc_is_title($title) {
    return true;
}

function doc_is_body($body) {
    return true;
}

function doc_is_title_icon($title_icon) {
    return true;
}

function doc_is_sumary($sumary) {
    return true;
}

function doc_is_order_by($order_by) {
    return true;
}

function doc_is_status($status) {
    return true;
}
