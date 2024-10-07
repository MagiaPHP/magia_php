<?php

// plugin = credit_notes_counter
// creation date : 
// 
// 
function credit_notes_counter_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes_counter WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_counter_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes_counter WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_counter_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_notes_counter WHERE   $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_notes_counter_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_notes_counter  ORDER BY order_by   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_counter_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_notes_counter WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function credit_notes_counter_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM credit_notes_counter WHERE id=? ");
    $req->execute(array($id));
}

function credit_notes_counter_edit($credit_note_id, $year, $counter) {

    global $db;
    $req = $db->prepare(" UPDATE credit_notes_counter SET "
            . "credit_note_id=:credit_note_id , "
            . "year=:year , "
            . "counter=:counter  "
            . " WHERE id=:id ");
    $req->execute(array(
        "credit_note_id" => $credit_note_id, "year" => $year, "counter" => $counter,
    ));
}

function credit_notes_counter_add($credit_note_id, $year, $counter) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_notes_counter` ( `credit_note_id` ,   `year` ,   `counter`   )
                                       VALUES  (:credit_note_id ,  :year ,  :counter   ) ");

    $req->execute(array(
        "credit_note_id" => $credit_note_id,
        "year" => $year,
        "counter" => $counter
            )
    );

    return $db->lastInsertId();
}

function credit_notes_counter_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM credit_notes_counter 
    
            WHERE id like :txt OR credit_note_id like :txt
OR year like :txt
OR counter like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_counter_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (credit_notes_counter_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function credit_notes_counter_is_credit_note_id($credit_note_id) {
    return true;
}

function credit_notes_counter_is_year($year) {
    return true;
}

function credit_notes_counter_is_counter($counter) {
    return true;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////

/**
 * Extendido
 */
function credit_notes_counter_list_by_year($year) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_notes_counter WHERE year=:year ORDER BY credit_note_id DESC   ");

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
function credit_notes_counter_year_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT DISTINCT(year) FROM credit_notes_counter  ORDER BY year DESC   ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_notes_counter_max_by_year($year) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT MAX(counter) as max FROM credit_notes_counter WHERE year = :year    ");

    $req->execute(array(
        "year" => $year
    ));
    $data = $req->fetch();
    return $data[0];
}

// Busco el valor maximo del contador segun el año dado
// 
function credit_notes_counter_by_credit_note_year($credit_note_id, $year) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT counter FROM  credit_notes_counter WHERE credit_note_id = :credit_note_id AND year=:year  ");

    $req->execute(array(
        "credit_note_id" => $credit_note_id,
        "year" => $year
    ));
    $data = $req->fetch();
    return $data[0];
}

function credit_notes_counter_next_number($year) {

    if ($year) {
        return credit_notes_counter_max_by_year($year) + 1;
    } else {
        return false;
    }
}
