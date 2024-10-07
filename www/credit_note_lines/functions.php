<?php

// plugin = credit_note_lines
// creation date : 
// 
// 
function credit_note_lines_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_note_lines WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_note_lines_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM credit_note_lines WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function credit_note_lines_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM credit_note_lines ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_note_lines_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM credit_note_lines WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function credit_note_lines_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM credit_note_lines WHERE id=? ");
    $req->execute(array($id));
}

function credit_note_lines_edit($id, $credit_note_id, $quantity, $description, $value, $tax) {

    global $db;
    $req = $db->prepare(" UPDATE credit_note_lines SET "
            . "credit_note_id=:credit_note_id , "
            . "quantity=:quantity , "
            . "description=:description , "
            . "value=:value , "
            . "tax=:tax  "
            . " WHERE id=:id ");

    $req->execute(array(
        "id" => $id,
        "credit_note_id" => $credit_note_id,
        "quantity" => $quantity,
        "description" => $description,
        "value" => $value,
        "tax" => $tax,
    ));
}

function credit_note_lines_add($credit_note_id, $quantity, $description, $value, $tax) {
    global $db;
    $req = $db->prepare(" INSERT INTO `credit_note_lines` 
            ( `id` , `credit_note_id`,  `quantity`,  `description`,  `value`,  `tax`   )
    VALUES  ( :id ,  :credit_note_id ,  :quantity ,  :description ,  :value ,  :tax   ) ");

    $req->execute(array(
        "id" => null,
        "credit_note_id" => $credit_note_id,
        "quantity" => $quantity,
        "description" => $description,
        "value" => $value,
        "tax" => $tax
            )
    );

    return $db->lastInsertId();
}

function credit_note_lines_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM credit_note_lines 
    
            WHERE id like :txt OR id like :txt
OR credit_note_id like :txt
OR quantity like :txt
OR description like :txt
OR value like :txt
OR tax like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_note_lines_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (credit_note_lines_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function credit_note_lines_is_id($id) {
    return true;
}

function credit_note_lines_is_credit_note_id($credit_note_id) {
    return true;
}

function credit_note_lines_is_quantity($quantity) {
    return true;
}

function credit_note_lines_is_description($description) {
    return true;
}

function credit_note_lines_is_value($value) {
    return true;
}

function credit_note_lines_is_tax($tax) {
    return true;
}

function credit_note_lines_list_by_credit_note_id($id) {
    global $db;

    $data = null;

    $req = $db->prepare(
            "
            SELECT id, credit_note_id, quantity, description, value, tax, 
            
            (quantity * value) as subtotal, 
            
            ((quantity * value * tax)/100) as totaltax, 
            
            (((quantity * value)) + ((quantity * value * tax)/100) ) as totaltaxc
            
            
            
            FROM credit_note_lines 
            
            WHERE credit_note_id = :id 
        
        ");

    $req->execute(array(
        "id" => $id
    ));
    $data = $req->fetchall();
    return $data;
}

function credit_note_lines_total_by_tax($credit_note_id, $tax) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare(
            " SELECT 
               
                 SUM(( quantity * value * tax  )/100)  as total
                    
                    FROM credit_note_lines 
                    
                    WHERE credit_note_id=:credit_note_id 
                
            AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetch();

    return $data[0] ?? false;
}

function credit_note_lines_sum_lines_by_tax($credit_note_id, $tax) {
    global $db;
    $limit = 999;

    $data = null;
    $req = $db->prepare("SELECT SUM( quantity * value ) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id AND tax=:tax");

    $req->execute(array(
        "tax" => $tax,
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function credit_note_lines_total_items_by_tax($credit_note_id, $tax) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT SUM( quantity ) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id AND tax=:tax");
    $req->execute(array(
        "tax" => $tax,
        "credit_note_id" => $credit_note_id
    ));
    $data = $req->fetch();
    return $data[0];
}

//function credit_note_lines_sum_lines_by_tax($credit_note_id, $tax) {
//    global $db;
//    $data = null;
//    $req = $db->prepare("SELECT SUM( quantity * price ) as total  FROM credit_note_lines WHERE credit_note_id=:credit_note_id AND tax=:tax");
//
//    $req->execute(array(
//        "tax" => $tax,
//        "credit_note_id" => $credit_note_id
//    ));
//    $data = $req->fetch();
//    return $data[0];
//}


