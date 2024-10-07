<?php

// plugin = transport
// creation date : 2023-02-06
// 
// 
function transport_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM transport WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function transport_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM transport WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function transport_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM transport WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function transport_list($start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT * FROM `transport` ORDER BY order_by DESC, id DESC  Limit  :limit OFFSET :start  ";

    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function transport_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM transport WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function transport_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM transport WHERE id=? ");
    $req->execute(array($id));
}

function transport_edit($id, $code, $name, $price, $tax, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE transport SET "
            . "code=:code , "
            . "name=:name , "
            . "price=:price , "
            . "tax=:tax , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "code" => $code, "name" => $name, "price" => $price, "tax" => $tax, "order_by" => $order_by, "status" => $status,
    ));
}

function transport_add($code, $name, $price, $tax, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `transport` ( `id` ,   `code` ,   `name` ,   `price` ,   `tax` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :code ,  :name ,  :price ,  :tax ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "code" => $code,
        "name" => $name,
        "price" => $price,
        "tax" => $tax,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

// SEARCH
function transport_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM transport 
            WHERE id = :txt OR id like :txt
OR code like :txt
OR name like :txt
OR price like :txt
OR tax like :txt
OR order_by like :txt
OR status like :txt
 
    ORDER BY order_by DESC, id DESC
    Limit  :limit OFFSET :start
";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function transport_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (transport_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function transport_is_id($id) {
    return true;
}

function transport_is_code($code) {
    return true;
}

function transport_is_name($name) {
    return true;
}

function transport_is_price($price) {
    return true;
}

function transport_is_tax($tax) {
    return true;
}

function transport_is_order_by($order_by) {
    return true;
}

function transport_is_status($status) {
    return true;
}

################################################################################
################################################################################
################################################################################

function transport_list_code_by_status($status) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT code FROM transport WHERE status = :status");
    $req->execute(array(
        "status" => $status
    ));
    $data = $req->fetchall(PDO::FETCH_COLUMN, 0);
    return $data;
}

function transport_details_by_code($code) {
    global $db;
    $req = $db->prepare("SELECT * FROM transport WHERE code= ? ");
    $req->execute(array($code));
    $data = $req->fetch();
    return $data;
}
