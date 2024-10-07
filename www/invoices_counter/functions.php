<?php

// plugin = invoices_counter
// creation date : 
// 
// 
function invoices_counter_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoices_counter WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_counter_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoices_counter WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_counter_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM invoices_counter WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function invoices_counter_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM invoices_counter  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function invoices_counter_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM invoices_counter WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function invoices_counter_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM invoices_counter WHERE id=? ");
    $req->execute(array($id));
}

function invoices_counter_edit($invoice_id, $year, $counter) {

    global $db;
    $req = $db->prepare(" UPDATE invoices_counter SET "
            . "invoice_id=:invoice_id , "
            . "year=:year , "
            . "counter=:counter  "
            . " WHERE id=:id ");
    $req->execute(array(
        "invoice_id" => $invoice_id, "year" => $year, "counter" => $counter,
    ));
}

function invoices_counter_add($invoice_id, $year, $counter) {
    global $db;
    $req = $db->prepare(" INSERT INTO `invoices_counter` ( `invoice_id` ,   `year` ,   `counter`   )
                                       VALUES  (:invoice_id ,  :year ,  :counter   ) ");

    $req->execute(array(
        "invoice_id" => $invoice_id,
        "year" => $year,
        "counter" => $counter
            )
    );

    return $db->lastInsertId();
}

function invoices_counter_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoices_counter 
    
            WHERE id like :txt OR invoice_id like :txt
OR year like :txt
OR counter like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function invoices_counter_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (invoices_counter_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function invoices_counter_is_invoice_id($invoice_id) {
    return true;
}

function invoices_counter_is_year($year) {
    return true;
}

function invoices_counter_is_counter($counter) {
    return true;
}

/**
 * Extendido
 */
function invoices_counter_list_by_year($year) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM invoices_counter WHERE year=:year ORDER BY invoice_id DESC   ");

    $req->execute(array(
        "year" => $year
    ));
    $data = $req->fetchall();
    return $data;
}

// Lista de años presentes en el contador 
// ok
// ok
// ok
function invoices_counter_year_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT DISTINCT(year) FROM invoices_counter  ORDER BY year DESC   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

// Busco el valor maximo del contador segun el año dado
// ok
// ok
// ok
// ok
function invoices_counter_max_by_year($year) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT MAX(counter) as max FROM invoices_counter WHERE year = :year    ");

    $req->execute(array(
        "year" => $year
    ));
    $data = $req->fetch();
    return $data[0];
}

// Busco el valor maximo del contador segun el año dado
// 
function invoices_counter_by_invoice_year($invoice_id, $year) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT counter FROM  invoices_counter WHERE invoice_id = :invoice_id AND year=:year  ");

    $req->execute(array(
        "invoice_id" => $invoice_id,
        "year" => $year
    ));
    $data = $req->fetch();
    return $data[0];
}

function invoices_counter_next_number($year) {

    if ($year) {
        return invoices_counter_max_by_year($year) + 1;
    } else {
        return false;
    }
}
