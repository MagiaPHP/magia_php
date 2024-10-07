<?php

// plugin = comment_folder
// creation date : 
// 
// 
function comment_folder_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comment_folder WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comment_folder_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comment_folder WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comment_folder_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comment_folder WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comment_folder_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM comment_folder  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function comment_folder_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comment_folder WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function comment_folder_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM comment_folder WHERE id=? ");
    $req->execute(array($id));
}

function comment_folder_edit($id, $doc_id, $folder, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE comment_folder SET "
            . "doc_id=:doc_id , "
            . "folder=:folder , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "doc_id" => $doc_id,
        "folder" => $folder,
        "order_by" => $order_by,
        "status" => $status,
    ));
}

function comment_folder_add($doc_id, $folder, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `comment_folder` ( `id` ,   `doc_id` ,   `folder` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :doc_id ,  :folder ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "doc_id" => $doc_id,
        "folder" => $folder,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function comment_folder_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comment_folder 
    
            WHERE id like :txt OR id like :txt
OR doc_id like :txt
OR folder like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function comment_folder_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (comment_folder_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function comment_folder_is_id($id) {
    return true;
}

function comment_folder_is_doc_id($doc_id) {
    return true;
}

function comment_folder_is_folder($folder) {
    return true;
}

function comment_folder_is_order_by($order_by) {
    return true;
}

function comment_folder_is_status($status) {
    return true;
}

//
function comment_folder_field_by_doc_id($field, $doc_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comment_folder WHERE doc_id= ?");
    $req->execute(array($doc_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

//
function comment_folder_push_folder($doc_id, $folder) {

    if (comment_folder_field_by_doc_id('id', $doc_id)) {
        comment_folder_update_folder($doc_id, $folder);
    } else {
        comment_folder_add($doc_id, $folder, 1, 1);
    }
}

//
function comment_folder_update_folder($doc_id, $folder) {
    global $db;
    $req = $db->prepare(
            "UPDATE comment_folder SET "
            . "folder= :folder  WHERE doc_id=:doc_id ");
    $req->execute(array(
        "doc_id" => $doc_id,
        "folder" => $folder
    ));
}

function comment_folder_search_by_folder($folder) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT c.id, c.date, c.sender_id, c.doc, c.doc_id, c.comment, c.order_by, c.status, 
                cf.doc_id, cf.folder, cf.order_by, cf.status  
                FROM comments as c
                JOIN comment_folder as cf  
                ON c.doc_id = cf.doc_id   
    
            WHERE 
                cf.folder like :folder
                           
");
    $req->execute(array(
        "folder" => $folder
    ));
    $data = $req->fetchall();
    return $data;
}
