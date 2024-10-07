<?php

// plugin = patients
// creation date : 
// 
// 
function patients_field_id($field, $id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM patients WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function patients_search_by_unique($field, $FieldUnique, $valueUnique) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM patients WHERE $FieldUnique = ?");
    $req->execute(array($valueUnique));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function patients_list() {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM patients ORDER BY id DESC  ");

    $req->execute(array(
    ));
    $data = $req->fetchall();
    return $data;
}

function patients_details($id) {
    global $db;
    $req = $db->prepare("SELECT * FROM patients WHERE id= ? ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data;
}

function patients_delete($id) {
    global $db;
    $req = $db->prepare("DELETE FROM patients WHERE id=? ");
    $req->execute(array($id));
}

function patients_edit($id, $company_id, $company_ref, $contact_id, $date, $order_by, $status) {

    global $db;
    $req = $db->prepare(" UPDATE patients SET "
            . "company_id=:company_id , "
            . "company_ref=:company_ref , "
            . "contact_id=:contact_id , "
            . "date=:date , "
            . "order_by=:order_by , "
            . "status=:status  "
            . " WHERE id=:id ");
    $req->execute(array(
        "id" => $id, "company_id" => $company_id, "company_ref" => $company_ref, "contact_id" => $contact_id, "date" => $date, "order_by" => $order_by, "status" => $status,
    ));
}

function patients_add($company_id, $company_ref, $contact_id, $date, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `patients` ( `id` ,   `company_id` ,   `company_ref` ,   `contact_id` ,   `date` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :company_id ,  :company_ref ,  :contact_id ,  :date ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "company_id" => $company_id,
        "company_ref" => $company_ref,
        "contact_id" => $contact_id,
        "date" => $date,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function patients_search($txt) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT * FROM patients 
    
            WHERE id like :txt OR id like :txt
OR company_id like :txt
OR company_ref like :txt
OR contact_id like :txt
OR date like :txt
OR order_by like :txt
OR status like :txt
                           
");
    $req->execute(array(
        "txt" => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function patients_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (patients_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function patients_is_id($id) {
    return true;
}

function patients_is_company_id($company_id) {
    return true;
}

function patients_is_company_ref($company_ref) {
    return true;
}

function patients_is_contact_id($contact_id) {
    return true;
}

function patients_is_date($date) {
    return true;
}

function patients_is_order_by($order_by) {
    return true;
}

function patients_is_status($status) {
    return true;
}

function patients_list_according_company($company_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT p.company_id, p.contact_id, c.id, c.owner_id, c.type, c.title, c.name, c.lastname, c.birthdate, c.status FROM contacts as c INNER JOIN patients as p ON c.id = p.contact_id WHERE p.company_id IN (SELECT id FROM contacts WHERE owner_id =:company_id )  ');
    $req->execute(array(
        'company_id' => $company_id
    ));
    $data = $req->fetchall();
    return $data;
}

function patients_list_according_office($office_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT p.company_id, p.contact_id, c.id, c.owner_id, c.type, c.title, c.name, c.lastname, c.birthdate, c.status FROM contacts as c INNER JOIN patients as p ON c.id = p.contact_id WHERE p.company_id =:office_id  ');
    $req->execute(array(
        'office_id' => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

function patients_according_company_contact($company_id, $contact_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM patients WHERE company_id = :company_id AND contact_id=:contact_id ORDER BY id DESC  ');
    $req->execute(array(
        'company_id' => $company_id,
        'contact_id' => $contact_id,
    ));
    $data = $req->fetch();
    return $data;
}

function patients_company_list_acording_contact($contact_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare('SELECT company_id FROM patients WHERE contact_id = :contact_id ORDER BY id DESC  ');
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function patients_office_by_patient_id($patient_id) {

    global $db;
    $limit = 1;
    $data = null;
    $req = $db->prepare('SELECT `company_id` FROM `patients` WHERE `contact_id`=:contact_id ORDER BY id DESC  ');
    $req->execute(array(
        'contact_id' => $patient_id,
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * A que compania pertenece este paciente
 * @param type $patient_id
 * @return type
 */
function patients_company_by_patient_id($patient_id) {
    $office_id = patients_office_by_patient_id($patient_id);
    return ($office_id) ? offices_headoffice_of_office($office_id) : false;
}

function patients_field_by_contact_id($field, $contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM patients WHERE contact_id= ?");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

/**
 * Busca si $contact_id esta en la lista de pacientes
 * @param type $contact_id
 * @return type
 */
function patients_is_patient($contact_id) {
    return ( patients_field_by_contact_id("id", $contact_id)) ? true : false;
}
