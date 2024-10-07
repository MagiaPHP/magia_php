<?php

// plugin = discounts_mode
// creation date : 
// 
// 
function discounts_mode_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM discounts_mode WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function discounts_mode_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM discounts_mode WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function discounts_mode_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM discounts_mode ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function discounts_mode_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM discounts_mode WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function discounts_mode_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM discounts_mode WHERE id=? ");
    $req->execute(array($id));
}

function discounts_mode_edit($id, $discount, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE discounts_mode SET "
            . "discount=:discount , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "discount" => $discount, "order_by" => $order_by, "status" => $status,
    ));
}

function discounts_mode_add($discount, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `discounts_mode` ( `id` ,   `discount` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :discount ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "discount" => $discount,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function discounts_mode_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM discounts_mode 
    
            WHERE id like :txt OR id like :txt
OR discount like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function discounts_mode_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (discounts_mode_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function discounts_mode_is_id($id) {
    return true;
}

function discounts_mode_is_discount($discount) {
    return true;
}

function discounts_mode_is_order_by($order_by) {
    return true;
}

function discounts_mode_is_status($status) {
    return true;
}
