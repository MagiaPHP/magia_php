<?php

// aca estoy haciendo un enlace imposible, 
// cloud con mi db local 
// por eso no da resultaods y en local si 
function cloud_contacts_search($txt, $order_by = "name", $start = 0, $limit = 999) {
    global $db, $u_owner_id;

//    $my_tva = contacts_field_id('tva', $u_owner_id);

    $sql = "SELECT *
        FROM `contacts`
        
        WHERE 
        
            name like :txt OR 
            lastname like :txt OR
            tva like :txt
            AND 
            (`tva` IS NOT NULL AND tva != '' )
            ORDER BY name
             
            
        
          
";

    $query = $db->prepare($sql);
//    $query->bindValue(':my_tva', $my_tva, PDO::PARAM_STR);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
//    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//cloud_company_details
function cloud_company_details_by_tva($tva) {
    global $db;
    $sql = "SELECT * FROM contacts WHERE tva = :tva";
    $query = $db->prepare($sql);
    $query->bindValue(':tva', $tva, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();

    // si tva es vacio, falso o nulo 
    return ($tva == '' || $tva == null || $tva == false ) ? false : $data;
}

//cloud_company_details
function cloud_company_search($tva, $order_by = "name", $start = 0, $limit = 999) {
    global $db;

    $sql = "SELECT *
        
        FROM`contacts` as c 
WHERE (
name like :tva OR 
tva like :tva )
AND ( type like 1 ) group by tva

ORDER BY :order_by, name, lastname 
Limit  :limit OFFSET :start             
";

    $query = $db->prepare($sql);
    $query->bindValue(':tva', "%$tva%", PDO::PARAM_STR);
    $query->bindValue(':order_by', $order_by, PDO::PARAM_STR);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

//cloud_company_details
function cloud_company_details($tva) {
    global $db;
    $sql = "SELECT * FROM`contacts` WHERE tva = :tva  ";
    $query = $db->prepare($sql);
    $query->bindValue(':tva', $tva, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

//cloud_contcts_details
function cloud_contact_details($id) {
    global $db;
    $sql = "SELECT * FROM`contacts` WHERE id = :id  ";
    $query = $db->prepare($sql);
    $query->bindValue(':id', $id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function cloud_contacts_list_by_owner_id($owner_id) {
    global $db;
    $sql = "SELECT * FROM`contacts` WHERE  (`owner_id` = :owner_id  AND `id` != :owner_id ) ";
    $query = $db->prepare($sql);
    $query->bindValue('owner_id', $owner_id, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function cloud_employees_by_company_cargo($company_id, $cargo) {
    global $db;

    $req = $db->prepare("SELECT * FROM `employees` WHERE (`company_id` =:company_id AND `cargo` =:cargo) ");
    $req->execute(array(
        "company_id" => $company_id,
        "cargo" => $cargo
    ));
    $data = $req->fetch();
    return $data;
}

//cloud_contcts_details
function cloud_contact_details_by_tva($tva) {
    global $db;
    $sql = "SELECT * FROM`contacts` WHERE tva = :tva  ";
    $query = $db->prepare($sql);
    $query->bindValue(':tva', $tva, PDO::PARAM_STR);
    $query->execute();
    $data = $query->fetch();
    return $data;
}

function cloud_company_add_from_json($company_json) {
    global $u_owner_id;
    // el tva del usuario hace parte del codigo para saber de donde vino 
    $tva_patrino = contacts_field_id('tva', $u_owner_id);

    // recibo un json del objeto company

    $company = json_decode($company_json, true);

    // agrego una empresa, 
    // recojo el id de esta empresa
    // atualizo en onwer de la empresa con su id 
    // agrego un contacto con owner el id de la empresa 
    // lo agrego como empleado 
    //agrego la direccio billing de la empresa, 
    // agrego el directorio de la empresa 
    // agrego el directorio del empleado 
    die();
    $code_company = $tva_patrino . "_" . magia_uniqid();
    // add company
    cloud_company_add(1022, $company['_name'], $company['_tva'], $code_company, $company['_language']);
    // saco oner de company
    $company_id = cloud_contacts_field_code('id', $code_company);
    // actualizo owner
    cloud_contacts_update_owner_id($company_id, $company_id);

    $company_directory = ($company['_directory']);
    foreach (directory_names_list() as $key => $dir_name) {
        if ($company_directory[$dir_name['name']] != '' && $company_directory[$dir_name['name']] !== null) {
            // agrego el directorio de la empresa
            $code_directory = magia_uniqid();
            cloud_directory_add($company_id, null, $dir_name['name'], $company_directory[$dir_name['name']], $code_directory, 1, 1);
        }
    }
    //
    //
    $ba = $company['_addresses']['Billing'];

    // agrego la direccion de billi de la empresa
    $address = ($ba['_address']);
    $number = ($ba['_number']);
    $postcode = ($ba['_postcode']);
    $barrio = ($ba['_barrio']);
    $city = ($ba['_city']);
    $region = ($ba['_region']);
    $country = ($ba['_country']);
    $code_a = magia_uniqid();
    cloud_addresses_add($company_id, 'Billing', $address, $number, $postcode, $barrio, $city, $region, $country, $code_a, 1);

    // add contacto 
    $code_contact = magia_uniqid();
    $employe = $company['_employees'][0];

    cloud_contact_add($company_id, $employe['_title'], $employe['_name'], $employe['_lastname'], $code_contact);

    // recupero el last contact add
    $contact_id = cloud_contacts_field_code('id', $code_contact);
    // agrego como empleado
    cloud_employees_add($company_id, $contact_id, $employe['_owner_ref'], date("Y-m-d"), $employe['_cargo'], 1, 1);
    // agrego el directorio del empleado
    $contact_directory = $employe['_directory'];
    foreach (directory_names_list() as $key => $dir_name) {
        if ($contact_directory[$dir_name['name']] != '' && $contact_directory[$dir_name['name']] !== null) {
            $code_contact_directory = magia_uniqid();
            cloud_directory_add($contact_id, null, $dir_name['name'], $contact_directory[$dir_name['name']], $code_contact_directory, 1, 1);
        }
    }


    //
    //
    //
}

/**
 * Desde cualquier cuenta a cloud
 * @global type $u_owner_id
 * @param type $company_json
 */
function cloud_company_add_to_cloud_json($company_json) {
    global $u_owner_id;
    // el tva del usuario hace parte del codigo para saber de donde vino 
    $tva_patrino = contacts_field_id('tva', $u_owner_id);

    // recibo un json del objeto company

    $company = json_decode($company_json, true);
    // agrego una empresa, 
    // recojo el id de esta empresa
    // atualizo en onwer de la empresa con su id 
    // agrego un contacto con owner el id de la empresa 
    // lo agrego como empleado 
    //agrego la direccio billing de la empresa, 
    // agrego el directorio de la empresa 
    // agrego el directorio del empleado 

    $code_company = $tva_patrino . "_" . magia_uniqid();
    // add company
    cloud_company_add(1022, $company['_name'], $company['_tva'], $code_company, $company['_language']);
    // saco oner de company
    $company_id = cloud_contacts_field_code('id', $code_company);
    // actualizo owner
    cloud_contacts_update_owner_id($company_id, $company_id);

    $company_directory = ($company['_directory']);
    foreach (directory_names_list() as $key => $dir_name) {
        if ($company_directory[$dir_name['name']] != '' && $company_directory[$dir_name['name']] !== null) {
            // agrego el directorio de la empresa
            $code_directory = magia_uniqid();
            cloud_directory_add($company_id, null, $dir_name['name'], $company_directory[$dir_name['name']], $code_directory, 1, 1);
        }
    }
    //
    //
    $ba = $company['_addresses']['Billing'];

    // agrego la direccion de billi de la empresa
    $address = ($ba['_address']);
    $number = ($ba['_number']);
    $postcode = ($ba['_postcode']);
    $barrio = ($ba['_barrio']);
    $city = ($ba['_city']);
    $region = ($ba['_region']);
    $country = ($ba['_country']);
    $code_a = magia_uniqid();
    cloud_addresses_add($company_id, 'Billing', $address, $number, $postcode, $barrio, $city, $region, $country, $code_a, 1);

    // add contacto 
    $code_contact = magia_uniqid();
    $employe = $company['_employees'][0];

    cloud_contact_add($company_id, $employe['_title'], $employe['_name'], $employe['_lastname'], $code_contact);

    // recupero el last contact add
    $contact_id = cloud_contacts_field_code('id', $code_contact);
    // agrego como empleado
    cloud_employees_add($company_id, $contact_id, $employe['_owner_ref'], date("Y-m-d"), $employe['_cargo'], 1, 1);

    // agrego el directorio del empleado
    $contact_directory = $employe['_directory'];
    foreach (directory_names_list() as $key => $dir_name) {
        if ($contact_directory[$dir_name['name']] != '' && $contact_directory[$dir_name['name']] !== null) {
            $code_contact_directory = magia_uniqid();
            cloud_directory_add($contact_id, null, $dir_name['name'], $contact_directory[$dir_name['name']], $code_contact_directory, 1, 1);
        }
    }


    //
    //
    //
}

/**
 * Desde cloud a cualquier cuenta
 * @global type $u_owner_id
 * @param type $company_json
 */
function cloud_company_add_from_cloud_json($company_json) {
    global $u_owner_id;
    // el tva del usuario hace parte del codigo para saber de donde vino 
    //$tva_patrino = contacts_field_id('tva', $u_owner_id);
    // recibo un json del objeto company

    $company = json_decode($company_json, true);

    $code_company = magia_uniqid();
    // add company
//    cloud_company_add(1022, $company['_name'], $company['_tva'], $code_company, $company['_language']);    

    contacts_add(1022, 1, null, $company['_name'], null, null, $company['_tva'], $code_company, 1, 1);

    // saco oner de company
    $company_id = contacts_field_code('id', $code_company);

    // actualizo owner
    contacts_update_owner_id($company_id, $company_id);

    $company_directory = ($company['_directory']);
    foreach (directory_names_list() as $key => $dir_name) {
        if ($company_directory[$dir_name['name']] != '' && $company_directory[$dir_name['name']] !== null) {
            // agrego el directorio de la empresa
            $code_directory = magia_uniqid();
            directory_add($company_id, null, $dir_name['name'], $company_directory[$dir_name['name']], $code_directory, 1, 1);
        }
    }
    //
    //
    $ba = $company['_addresses']['Billing'];

    // agrego la direccion de billi de la empresa
    $address = ($ba['_address']);
    $number = ($ba['_number']);
    $postcode = ($ba['_postcode']);
    $barrio = ($ba['_barrio']);
    $sector = ($ba['_sector']);
    $ref = ($ba['_ref']);
    
    $city = ($ba['_city']);
    $province = ($ba['_province']);
    $region = ($ba['_region']);
    $country = ($ba['_country']);
    $code_a = magia_uniqid();

    addresses_add($company_id, 'Billing', $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code_a, 1);
    addresses_add($company_id, 'Delivery', $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code_a, 1);

    // add contacto 
    $code_contact = magia_uniqid();
    $employe = $company['_employees'][0];

    contacts_add($company_id, 0, $employe['_title'], $employe['_name'], $employe['_lastname'], '1900-01-01', null, $code_contact, 1, 1);
    // recupero el last contact add
    $contact_id = contacts_field_code('id', $code_contact);

    // agrego como empleado
    employees_add($company_id, $contact_id, $employe['_owner_ref'], date("Y-m-d"), $employe['_cargo'], 1, 1);

    // agrego el directorio del empleado
    $contact_directory = $employe['_directory'];
    foreach (directory_names_list() as $key => $dir_name) {
        if ($contact_directory[$dir_name['name']] != '' && $contact_directory[$dir_name['name']] !== null) {
            $code_contact_directory = magia_uniqid();
            directory_add($contact_id, null, $dir_name['name'], $contact_directory[$dir_name['name']], $code_contact_directory, 1, 1);
        }
    }
}

function cloud_company_add($owner_id, $name, $tva, $code, $language) {
    global $db;

    $req = $db->prepare(" INSERT INTO `contacts` 
        (`id`, `owner_id`, `type`, `title`,   `name` ,  `lastname`, `birthdate` , `tva` , `code`, `language`, `order_by` , `status`   )
        VALUES  
        (:id,  :owner_id,  :type,   :title ,  :name,    :lastname,   :birthdate ,  :tva , :code, :language, :order_by ,   :status   ) ");

    $req->execute(array(
        "id" => null,
        "owner_id" => $owner_id,
        "type" => 1,
        "title" => null,
        "name" => $name,
        "lastname" => '',
        "birthdate" => '1900-01-01',
        "tva" => $tva,
        "code" => $code,
        "language" => $language,
        "order_by" => 1,
        "status" => 1
            )
    );

    return $req->errorCode();
}

function cloud_contacts_field_code($field, $code) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts WHERE code= ?");
    $req->execute(array($code));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function cloud_contacts_field_tva($field, $tva) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts WHERE tva= ?");
    $req->execute(array($tva));
    $data = $req->fetch();
    //return $data[0];
    return (isset($data[0])) ? $data[0] : false;
}

function cloud_contacts_update_owner_id($contact_id, $new_owner_id) {
    global $db;
    $req = $db->prepare('UPDATE `contacts` SET owner_id=:owner_id  WHERE id=:id ');

    $req->execute(array(
        'id' => $contact_id,
        'owner_id' => $new_owner_id
            )
    );
}

function cloud_contact_add($owner_id, $title, $name, $lastname, $code) {
    global $db;

    $req = $db->prepare(" INSERT INTO `contacts` 
        (`id`, `owner_id`, `type`, `title`,   `name` ,  `lastname`, `birthdate` , `tva` , `code`, `order_by` , `status`   )
        VALUES  
        (:id,  :owner_id,  :type,   :title ,  :name,    :lastname,   :birthdate ,  :tva , :code,  :order_by ,   :status   ) ");

    $req->execute(array(
        "id" => null,
        "owner_id" => $owner_id,
        "type" => 0,
        "title" => $title,
        "name" => $name,
        "lastname" => $lastname,
        "birthdate" => '1900-01-01',
        "tva" => null,
        "code" => $code,
        "order_by" => 1,
        "status" => 1
            )
    );

    return $req->errorCode();
}

function cloud_employees_add($company_id, $contact_id, $owner_ref, $date, $cargo, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `employees` ( `id` ,   `company_id` ,   `contact_id` ,   `owner_ref` ,   `date` ,   `cargo` ,   `order_by` ,   `status`   )
                                       VALUES  (:id ,  :company_id ,  :contact_id ,  :owner_ref ,  :date ,  :cargo ,  :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "company_id" => $company_id,
        "contact_id" => $contact_id,
        "owner_ref" => $owner_ref,
        "date" => $date,
        "cargo" => $cargo,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function cloud_addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code, $status) {
    global $db;
    $req = $db->prepare(
            " INSERT INTO `addresses` ( `id` ,   `contact_id` ,   `name` ,   `address` ,   `number` ,   `postcode` ,   `barrio` ,   `city` ,   `region` ,   `country`,  `code`,   `status`   ) VALUES  "
            . "(:id ,  :contact_id ,  :name ,  :address ,  :number ,  :postcode ,  :barrio ,  :city ,  :region ,  :country , :code,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "postcode" => $postcode,
        "barrio" => $barrio,
        "city" => $city,
        "region" => $region,
        "country" => $country,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function cloud_directory_add($contact_id, $address_id, $name, $data, $code, $order_by, $status) {
    global $db;
    $req = $db->prepare(" INSERT INTO `directory` ( `id` ,   `contact_id` ,   `address_id` ,   `name` ,   `data` , `code`,  `order_by` ,   `status`   )
                                           VALUES  (:id ,  :contact_id ,  :address_id ,  :name ,  :data , :code, :order_by ,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "address_id" => $address_id,
        "name" => $name,
        "data" => $data,
        "code" => $code,
        "order_by" => $order_by,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function cloud_employees_list_by_company($company_id) {
    global $db;
    $limit = 999;

    $data = null;

    // $req = $db->prepare("SELECT * FROM employees WHERE company_id =:company_id ORDER BY id DESC  ");
    $req = $db->prepare("
            SELECT * 
            FROM employees 
            WHERE company_id IN 
            ( SELECT id FROM contacts WHERE owner_id = :company_id ) 
            ORDER BY company_id , id ASC ");
    $req->execute(array(
        "company_id" => $company_id
    ));
    $data = $req->fetchall();
    return $data;
}

function cloud_addresses_list_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare(
            '
            SELECT 
            a.id, 
            contact_id, 
            name, 
            address, 
            number, 
            postcode, 
            barrio, 
            city, 
            province,
            region, 
            country, 
            code, 
            status,           
            addresses_id, 
            transport_code,
            transport_ref

           FROM addresses as a
           LEFT JOIN addresses_transport as at on at.addresses_id = a.id  

WHERE a.contact_id = ? 
            
            ORDER BY name, id DESC');
    $req->execute(array($contact_id));
    $data = $req->fetchall();
    return $data;
}

function cloud_addresses_billing_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare(
            '
            SELECT 
            a.id, 
            contact_id, 
            name, 
            address, 
            number, 
            postcode, 
            barrio, 
            city, 
            province,
            region, 
            country, 
            code, 
            status,           
            addresses_id, 
            transport_code,
            transport_ref

           FROM addresses as a
           LEFT JOIN addresses_transport as at on at.addresses_id = a.id  

WHERE a.contact_id = :contact_id AND name = :name 
            
            ORDER BY name, id DESC');
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => 'Billing',
    ));
    $data = $req->fetch();
    return $data;
}

function cloud_directory_names_list($start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT * FROM `directory_names` ORDER BY `order_by` DESC, `id` DESC  Limit  :limit OFFSET :start  ";
    $query = $db->prepare($sql);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function cloud_directory_list_by_contact_name($contact_id, $name) {
    global $db;
    $req = $db->prepare('SELECT data FROM directory WHERE contact_id = :contact_id AND name=:name ORDER BY id DESC');
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? $data[0] : false;
}

function cloud_banks_list_by_contact_id($contact_id) {
    global $db;
    $req = $db->prepare('SELECT * FROM banks WHERE contact_id = ? ORDER BY id DESC');
    $req->execute(array($contact_id));
    $data = $req->fetchall();
    return $data;
}

function cloud_employees_list_by_contact_id($cloud_contact_id) {
    global $db;
    $req = $db->prepare(
            '
            SELECT 
           *
           FROM employees as e
           WHERE company_id = ?

            ');

    $req->execute(array($cloud_contact_id));
    $data = $req->fetchall();
    return $data;
}
