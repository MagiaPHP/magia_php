<?php

/**
 * Una oficina es headoffice cuando el owner_id es el mismo que su id
 * @param type $office_id
 */
function offices_is_headoffice($id) {

    if ($id == "" || $id == null) {
        return false;
    }

    return ((int) contacts_field_id("owner_id", $id) == (int) $id ) ? true : false;
}

/**
 * Te entrega el id de la oficina central de una oficina 
 * @param type $office_id
 * @return boolean
 */
function offices_headoffice_of_office($office_id) {
    
    if (!$office_id) {
        return false;
    }

    if (contacts_field_id("owner_id", $office_id) == $office_id) {
        return $office_id;
    }

    if (contacts_field_id("owner_id", contacts_field_id("owner_id", $office_id))) {
        return contacts_field_id("owner_id", contacts_field_id("owner_id", $office_id));
    }

    return false;
}

/**
 * Entrega el codigo del pais de la direccion del billing de una headoffice
 * 
 */
function offices_country_headoffice($office_id) {

    $headoffice_id = offices_headoffice_of_office($office_id);

    $addresses = addresses_billing_by_contact_id($headoffice_id);

    $country = ($addresses) ? $addresses["country"] : false;

    return ($country) ? $country : false;
}

function offices_list_by_headoffice($office_id) {
    global $db;
    $req = $db->prepare(" SELECT *  FROM contacts WHERE owner_id = :owner_id AND type = :type ORDER BY tva DESC, name ");
    $req->execute(array(
        "owner_id" => $office_id,
        "type" => 1
    ));
    $data = $req->fetchall();
    return $data;
}

function offices_list_by_headoffice_officeName($office_id, $name) {
    global $db;
    $req = $db->prepare(" SELECT *  FROM contacts WHERE owner_id = :owner_id AND name =:name type = :type");
    $req->execute(array(
        "owner_id" => $office_id,
        "name" => $name,
        "type" => 1
    ));
    $data = $req->fetchall();
    return $data;
}

function offices_list_user_by_rol($office_id, $rol) {
    global $db;
    $req = $db->prepare(
            "SELECT * from contacts as c JOIN users as u ON c.id = u.contact_id AND c.owner_id = :office_id AND u.rol = :rol  limit 1"
    );
    $req->execute(array(
        "office_id" => $office_id,
        "rol" => $rol
    ));
    $data = $req->fetch();
    return $data;
}

function offices_status($status) {

    return contacts_status($status);
}

/**
 * Lista de headoffices
 * @global type $db
 * @return type
 */
function offices_list_of_headoffices() {
    global $db;
    $req = $db->prepare(" SELECT *  FROM contacts WHERE type = :type AND tva IS NOT NULL ORDER BY id DESC, name");
    $req->execute(array(
        "type" => 1
    ));
    $data = $req->fetchall();
    return $data;
}

function offices_delete($office_id) {
    global $db;
    $req = $db->prepare("DELETE FROM contacts WHERE id= :office_id AND type = 1 ");
    $req->execute(array(
        'office_id' => $office_id,
    ));
}
