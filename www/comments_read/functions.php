<?php

//
// plugin = comments_read
// creation date : 
// 
// 
function comments_read_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_read WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_read_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_read WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_read_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM comments_read WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function comments_read_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM comments_read  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_read_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comments_read WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function comments_read_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM comments_read WHERE id=? ");
    $req->execute(array($id));
}

function comments_read_edit($id, $order_id, $contact_id, $date_read, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE comments_read SET "
            . "order_id=:order_id , "
            . "contact_id=:contact_id , "
            . "date_read=:date_read , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "order_id" => $order_id, "contact_id" => $contact_id, "date_read" => $date_read, "order_by" => $order_by, "status" => $status,
    ));
}

function comments_read_add($order_id, $contact_id, $date_read, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `comments_read` ( `id` ,   `order_id` ,   `contact_id` ,   `date_read` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :order_id ,  :contact_id ,  :date_read ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "order_id" => $order_id,
        "contact_id" => $contact_id,
        "date_read" => null,
        "order_by" => 1,
        "status" => 1
            )
    );

    return $db->lastInsertId();
}

function comments_read_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM comments_read 
    
            WHERE id like :txt OR id like :txt
OR order_id like :txt
OR contact_id like :txt
OR date_read like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function comments_read_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (comments_read_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function comments_read_is_id($id) {
    return true;
}

function comments_read_is_order_id($order_id) {
    return true;
}

function comments_read_is_contact_id($contact_id) {
    return true;
}

function comments_read_is_date_read($date_read) {
    return true;
}

function comments_read_is_order_by($order_by) {
    return true;
}

function comments_read_is_status($status) {
    return true;
}

function comments_read_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare("SELECT * FROM comments_read WHERE contact_id = ? ");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    return $data;
}

//// si no existe lo crea
//function _options_push($option , $new_data, $group = null) {
//    
//    // si existe lo pone al dia
//    if(_options_exist($option)){
//        //echo "$option " ;
//        _options_update($option , $new_data);
//        
//        
//    }else{ // si no lo crea
//        _options_add($option, $new_data, $group);
//
//    }
//  
//}
// si no existe lo crea
// 
//function _options_push($option, $new_data, $group = null) {
//    //
//    // si existe lo pone al dia
//    if (_options_exist($option)) {
//        //echo "$option " ;
//        _options_update($option, $new_data);
//    } else { // si no lo crea
//        _options_add($option, $new_data, $group);
//    }
//}

function comments_read_update_date_read($order_id, $contact_id) {

    global $db;
    $req = $db->prepare(" UPDATE comments_read SET  date_read = CURRENT_TIMESTAMP  WHERE order_id  = :order_id AND contact_id = :contact_id ");
    $req->execute(array(
        "order_id" => $order_id,
        "contact_id" => $contact_id
    ));
}

function comments_read_search_date_read_by_order_id_contact_id($order_id, $contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT date_read FROM comments_read WHERE order_id=:order_id AND contact_id=:contact_id ");
    $req->execute(array(
        "order_id" => $order_id,
        "contact_id" => $contact_id,
    ));
    $data = $req->fetch();

    return (isset($data[0])) ? $data[0] : false;
}

// si no existe lo crea
function comments_read_push($order_id, $contact_id) {

    if (comments_read_search_date_read_by_order_id_contact_id($order_id, $contact_id)) {

        comments_read_update_date_read($order_id, $contact_id);
    } else { // si no lo crea
        comments_read_add($order_id, $contact_id, null, null, null);
    }

    return comments_read_search_date_read_by_order_id_contact_id($order_id, $contact_id);
}
