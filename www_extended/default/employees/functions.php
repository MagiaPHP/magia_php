<?php

//function employees_update_cargo($contact_id, $company_id, $cargo) {
//
//    global $db;
//    $req = $db->prepare(" UPDATE `employees` SET `cargo`=:cargo WHERE contact_id=:contact_id AND company_id =:company_id  ");
//    $req->execute(array(
//        "cargo" => $cargo,
//        "contact_id" => $contact_id,
//        "company_id" => $company_id,
//    ));
//}



function employees_list_by_office($office_id) {
    global $db;
    $limit = 999;

    $data = null;

    // $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id ORDER BY id DESC  ");
//    $req = $db->prepare("
//            SELECT * 
//            FROM employees 
//            JOIN contacts on employees.contact_id = contacts.id 
//            JOIN users as u on u.contact_id = contacts.id
//            JOIN rols as r on u.rol = r.rol 
//            WHERE company_id = :office_id 
//            
//            ORDER BY r.rango DESC, contacts.lastname , name  ");
//    
    $req = $db->prepare("
            SELECT 
                * 
            FROM 
                employees as e
            JOIN 
                contacts as c on e.contact_id = c.id                         
            WHERE 
                company_id = :office_id 
            ORDER BY 
                lastname, name  ");

    $req->execute(array(
        "office_id" => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_by_company_contact($company_id, $contact_id) {
    global $db;
    $limit = 999;
    $data = null;

    $req = $db->prepare("
            SELECT 
                * 
            FROM 
                `employees` 
            WHERE 
                `company_id` =:company_id AND `contact_id` =:contact_id 
            ORDER 
                BY id DESC  ");

    $req->execute(array(
        "company_id" => $company_id,
        "contact_id" => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_list_by_company($company_id) {
    global $db;

    $data = null;

    // $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id ORDER BY id DESC  ");
    $req = $db->prepare("
            SELECT 
                * 
            FROM 
                employees 
            WHERE 
                company_id IN ( SELECT id FROM contacts WHERE owner_id = :company_id ) 
            
            ORDER BY 
                company_id, id ASC 
                
");
    $req->execute(array(
        "company_id" => $company_id
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_office_by_contact($contact_id) {
    global $db;
    $limit = 999;
    $data = null;
    $req = $db->prepare('SELECT company_id FROM employees WHERE contact_id = :contact_id ORDER BY id DESC  ');
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

################################################################################

function employees_list_by_company_owner_ref($company_id, $owner_ref) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id  AND owner_ref =:owner_ref ORDER BY id DESC  ");

    $req->execute(array(
        "company_id" => $company_id,
        "owner_ref" => $owner_ref,
    ));
    $data = $req->fetchall();
    return $data;
}

// lista de empleados con determinado cago 
function employees_list_by_company_cargo($company_id, $cargo) {
    global $db;
    $limit = 999;

    $data = null;

    $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id  AND cargo =:cargo ORDER BY id DESC  ");

    $req->execute(array(
        "company_id" => $company_id,
        "cargo" => $cargo,
    ));
    $data = $req->fetchall();
    return $data;
}

function contacts_update_company_id($contact_id, $new_company_id) {
    global $db;
    $req = $db->prepare('UPDATE `employees` SET company_id=:company_id  WHERE contact_id=:contact_id ');

    $req->execute(array(
        'contact_id' => $contact_id,
        'company_id' => $new_company_id
            )
    );
}

function employees_delete_by_company_contact($company_id, $contact_id) {
    global $db;
    $req = $db->prepare("DELETE FROM employees WHERE company_id=:company_id  AND contact_id=:contact_id ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'company_id' => $company_id
    ));
}

function xxxemployees_list($company_id) {
    global $db;
    $limit = 10;
    $data = null;
    $req = $db->prepare('SELECT * FROM employees WHERE company_id=:company_id ORDER BY id DESC  ');
    $req->execute(array(
        "company_id" => $company_id,
    ));
    $data = $req->fetchall();
    return $data;
}

function employees_field_by_contact_id($field, $contact_id) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM employees WHERE contact_id= ? ");
    $req->execute(array($contact_id));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}
