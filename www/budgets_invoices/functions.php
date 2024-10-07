<?php

// plugin = budgets_invoices
// creation date : 
// 
// 
function budgets_invoices_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets_invoices WHERE status = 1 AND id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_invoices_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM budgets_invoices WHERE status = 1 AND  $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_invoices_list() {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT * FROM budgets_invoices WHERE status = 1 ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_invoices_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM budgets_invoices WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function budgets_invoices_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM budgets_invoices WHERE id=? ");
    $req->execute(array($id));
}

function budgets_invoices_edit($id, $budget_id, $invoice_id, $date_registre, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE budgets_invoices SET "
            . "budget_id=:budget_id , "
            . "invoice_id=:invoice_id , "
            . "date_registre=:date_registre , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "budget_id" => $budget_id, "invoice_id" => $invoice_id, 
        "date_registre" => date("Y-m-d h:m:s"), 
        "order_by" => $order_by, "status" => $status,
    ));
}

function budgets_invoices_add($budget_id, $invoice_id, $date_registre, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `budgets_invoices` ( `id` ,   `budget_id` ,   `invoice_id` ,   `date_registre` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :budget_id ,  :invoice_id ,  :date_registre ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "budget_id" => $budget_id,
        "invoice_id" => $invoice_id,
        "date_registre" => date("Y-m-d h:m:s"),
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function budgets_invoices_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM budgets_invoices 
    
            WHERE id like :txt OR id like :txt
OR budget_id like :txt
OR invoice_id like :txt
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

function budgets_invoices_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (budgets_invoices_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function budgets_invoices_is_id($id) {
    return true;
}

function budgets_invoices_is_budget_id($budget_id) {
    return true;
}

function budgets_invoices_is_invoice_id($invoice_id) {
    return true;
}

function budgets_invoices_is_date_registre($date_registre) {
    return true;
}

function budgets_invoices_is_order_by($order_by) {
    return true;
}

function budgets_invoices_is_status($status) {
    return true;
}

/**
 * Me da la factura donde esta el presupuesto 
 * @global type $db
 * @param type $budget_id
 * @return type
 */
function budgets_invoices_search_invoice_by_budget_id($budget_id) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT invoice_id FROM budgets_invoices WHERE budget_id = :budget_id  ");
    $req->execute(array(
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function budgets_invoices_list_budgets_by_invoice_id($invoice_id) {
    global $db;

    $data = null;
    //$req = $db->prepare("SELECT * FROM orders_budgets   as ob INNER JOIN orders  as o ON ob.order_id  = o.id  WHERE ob.budget_id= ?");
    $req = $db->prepare("SELECT * FROM budgets_invoices as bi INNER JOIN budgets as b ON bi.budget_id = b.id  WHERE bi.invoice_id = ?  ");
    $req->execute(array(
        $invoice_id
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function budgets_invoices_list_invoice_by_budget_id($budget_id) {
    global $db;

    $data = null;
    //$req = $db->prepare("SELECT * FROM orders_budgets   as ob INNER JOIN orders  as o ON ob.order_id  = o.id  WHERE ob.budget_id= ?");
    $req = $db->prepare("SELECT * FROM budgets_invoices as bi INNER JOIN invoices as i ON bi.invoice_id = i.id  WHERE bi.budget_id = ?  ");
    $req->execute(array(
        $budget_id
    ));
    $data = $req->fetchall();
    return (isset($data)) ? $data : false;
}

function budgets_invoices_total_invoiced_by_budget_id($budget_id) {
    global $db;

    $data = null;

    $req = $db->prepare("SELECT SUM(i.total + i.tax) as total FROM budgets_invoices as bi INNER JOIN invoices as i ON bi.invoice_id = i.id  WHERE bi.budget_id = ?  ");
    $req->execute(array(
        $budget_id
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? (float) $data[0] : false;
}

function budgets_invoices_search_budgets_by_invoice_id($invoice_id) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT budget_id FROM budgets_invoices WHERE invoice_id = :invoice_id   ");
    $req->execute(array(
        "invoice_id" => $invoice_id
    ));
    $data = $req->fetchall();
    return $data;
}

function budgets_invoices_search_budgets_id_invoice_id($budget_id, $invoice_id) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT * FROM budgets_invoices WHERE budget_id = :budget_id AND invoice_id = :invoice_id   ");
    $req->execute(array(
        "invoice_id" => $invoice_id,
        "budget_id" => $budget_id
    ));
    $data = $req->fetch();
    return ($data) ? true : false;
}

function budgets_invoices_delete_by($budget_id, $invoice_id) {
    global $db;
    $req = $db->prepare("DELETE FROM budgets_invoices WHERE budget_id=:budget_id AND invoice_id=:invoice_id ");
    $req->execute(array(
        "budget_id" => $budget_id,
        "invoice_id" => $invoice_id
    ));
}
