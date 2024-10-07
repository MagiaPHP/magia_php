<?php

// plugin = comments_files
// creation date : 
// 
// 
function comments_files_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_files WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_files_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_files WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_files_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_files WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_files_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM comments_files  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_files_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comments_files WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function comments_files_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM comments_files WHERE id=? ");
    $req->execute(array($id));
}

function comments_files_edit($id, $comment_id, $file, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE comments_files SET "
            . "comment_id=:comment_id , "
            . "file=:file , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "comment_id" => $comment_id, "file" => $file, "order_by" => $order_by, "status" => $status,
    ));
}

function comments_files_add($comment_id, $file, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `comments_files` ( `id` ,   `comment_id` ,   `file` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :comment_id ,  :file ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "comment_id" => $comment_id,
        "file" => $file,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function comments_files_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments_files 
    
            WHERE id like :txt OR id like :txt
OR comment_id like :txt
OR file like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_files_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (comments_files_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function comments_files_is_id($id) {
    return true;
}

function comments_files_is_comment_id($comment_id) {
    return true;
}

function comments_files_is_file($file) {
    return true;
}

function comments_files_is_order_by($order_by) {
    return true;
}

function comments_files_is_status($status) {
    return true;
}

function comments_files_by_comment_id($comment_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comments_files WHERE comment_id= ? ");
    $req->execute(array($comment_id));
    $data = $req->fetchall();
    return $data;
}
