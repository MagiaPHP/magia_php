<?php

// plugin = docs_comments
// creation date : 
// 
// 
function docs_comments_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM docs_comments WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
//return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function docs_comments_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM docs_comments WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
//return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function docs_comments_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM docs_comments WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
//return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function docs_comments_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM docs_comments  ORDER BY order_by, comments    ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function docs_comments_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM docs_comments WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function docs_comments_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM docs_comments WHERE id=? ");
    $req->execute(array($id));
}

function docs_comments_edit($id, $controller, $comments, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE docs_comments SET "
            . "controller=:controller , "
            . "comments=:comments , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "controller" => $controller, "comments" => $comments, "order_by" => $order_by, "status" => $status,
    ));
}

function docs_comments_add($controller, $comments, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `docs_comments` ( `id` ,   `controller` ,   `comments` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :controller ,  :comments ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "controller" => $controller,
        "comments" => $comments,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function docs_comments_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM docs_comments 
    
            WHERE id like :txt OR id like :txt
OR controller like :txt
OR comments like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function docs_comments_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (docs_comments_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function docs_comments_is_id($id) {
    return true;
}

function docs_comments_is_controller($controller) {
    return true;
}

function docs_comments_is_comments($comments) {
    return true;
}

function docs_comments_is_order_by($order_by) {
    return true;
}

function docs_comments_is_status($status) {
    return true;
}

################################################################################
################################################################################
################################################################################
################################################################################
// Busco un comentario en un tipo de controlador 
//
//

function docs_comments_search_by_controller($c) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM docs_comments 
    
WHERE 
controller = :c 
ORDER BY order_by, comments

");
    $req->execute(array(
        "c" => $c
    ));
    $data = $req->fetchall();
    return $data;
}

//
function docs_comments_search_by_controller_comment($c, $comments) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT id FROM docs_comments 
    
WHERE 
controller = :c
AND comments = :comments

");
    $req->execute(array(
        "c" => $c,
        "comments" => $comments
    ));
    $data = $req->fetch();
    return $data;
}

// lista de diferentes controllers presentes en los comentarios
//
function docs_comments_list_controllers() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT DISTINCT(controller) FROM docs_comments 
     

");
    $req->execute(array(
            // "c" => $c
    ));
    $data = $req->fetchall();
    return $data;
}
