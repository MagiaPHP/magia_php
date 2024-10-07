<?php

// plugin = orders_budgets
// creation date : 
// 
// 
function orders_budgets_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM orders_budgets WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function orders_budgets_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM orders_budgets WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function orders_budgets_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM orders_budgets WHERE status = 1 ORDER BY id DESC   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_budgets_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM orders_budgets WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function orders_budgets_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM orders_budgets WHERE id=? ");
    $req->execute(array($id));
}

function orders_budgets_edit($id, $order_id, $budget_id, $date_registre, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE orders_budgets SET "
            . "order_id=:order_id , "
            . "budget_id=:budget_id , "
            . "date_registre=:date_registre , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "order_id" => $order_id, "budget_id" => $budget_id, "date_registre" => $date_registre, "order_by" => $order_by, "status" => $status,
    ));
}

function orders_budgets_add($order_id, $budget_id, $date_registre, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `orders_budgets` ( `id` ,   `order_id` ,   `budget_id` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :order_id ,  :budget_id ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "order_id" => $order_id,
        "budget_id" => $budget_id,
        "date_registre" => $date_registre,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function orders_budgets_remove($order_id, $budget_id) {
    global $db;
    $req = $db->prepare(
            "DELETE FROM `orders_budgets` 
            WHERE `order_id`=:order_id 
            AND `budget_id` = :budget_id   ");

    $req->execute(array(
        "order_id" => $order_id,
        "budget_id" => $budget_id,
            )
    );

    return $db->lastInsertId();
}

function orders_budgets_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM orders_budgets 
    
            WHERE id like :txt OR id like :txt
OR order_id like :txt
OR budget_id like :txt
OR date_registre like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function orders_budgets_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (orders_budgets_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function orders_budgets_is_id($id) {
    return true;
}

function orders_budgets_is_order_id($order_id) {
    return true;
}

function orders_budgets_is_budget_id($budget_id) {
    return true;
}

function orders_budgets_is_date_registre($date_registre) {
    return true;
}

function orders_budgets_is_order_by($order_by) {
    return true;
}

function orders_budgets_is_status($status) {
    return true;
}

function orders_budgets_search_budget_by_order($order_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `budget_id` FROM `orders_budgets` WHERE `order_id` = ?");
    $req->execute(array(
        $order_id
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function orders_budgets_search_order_by_budget($budget_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT `order_id` FROM `orders_budgets` WHERE `budget_id` = ?");
    $req->execute(array(
        $budget_id
    ));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function orders_budgets_list_orders_by_budget($budget_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM `orders_budgets` as ob INNER JOIN `orders` as o ON `ob`.`order_id` = `o`.`id` WHERE `ob`.`budget_id` = ?");
    $req->execute(array(
        $budget_id
    ));
    $data = $req->fetchall();
    //return $data[0];
    return (isset($data)) ? $data : false;
}
