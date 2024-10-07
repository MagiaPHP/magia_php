<?php

function shop_registre_next($goto = 1) {
    $html = '<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="' . $goto . '">
    <div class="form-group">
        <label class="control-label col-sm-0" for=""></label>
        <div class="col-sm-12"> 
            <button class="btn btn-lg btn-danger btn-block" type="submit">
                ' . _tr("Next") . '
                <span class="glyphicon glyphicon-chevron-right"></span>
            </button>
        </div>      							
    </div>      							
</form>';
    echo $html;
}

function shop_labo_orders_search($txt) {
    global $db, $u_owner_id;

    $limit = _options_option("shop_limit_orders");

    $data = null;
    $req = $db->prepare("
             SELECT 
         o.id, 
         o.express, 
         o.date, 
         o.date_delivery, 
         o.delivery_days, 
         o.client_ref, 
         o.patient_id, 
         o.remake, 
         o.bac,
         o.discount, 
         o.status,  
         
         c.name, 
         c.lastname
         
            FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id
           
            WHERE (
        o.id = :id OR 
        o.client_ref = :client_ref OR 
        
        
        c.name like :name OR 
        c.lastname like :lastname

        ) AND  o.company_id = :u_owner_id  ORDER BY o.id DESC 
            
            ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'id' => "$txt",
        'client_ref' => "$txt",
        'name' => "%$txt%",
        'lastname' => "%$txt%",
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_orders_search_by_id($txt) {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders "
            . "WHERE id=:id  AND  company_id = :u_owner_id   ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'id' => $txt,
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_orders_search_by_ref($txt) {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders "
            . "WHERE client_ref=:client_ref  AND  company_id = :u_owner_id   ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'client_ref' => $txt,
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_orders_search_by_bac($txt) {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders WHERE bac = :search  AND  company_id = :u_owner_id   ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'search' => $txt,
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_orders_search_by_registre_date($txt) {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders "
            . "WHERE date_delivery like :search  AND  company_id = :u_owner_id   ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'search' => "%$txt%",
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_orders_search_by_remake($txt) {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders  WHERE remake = :search  AND  company_id = :u_owner_id   ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'search' => $txt,
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_orders_fields($field, $id_order) {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT $field FROM orders WHERE id= ?");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data[0];
}

function shop_labo_orders_list() {
    
}

function shop_labo_patients_fields($fields, $id_patient) {
    global $db;

    $data = null;
    $req = $db->prepare("SELECT $field FROM contacts WHERE owner_id= '$u_owner_id' AND id = '$id_patient' AND type = '0' ");
    $req->execute(array($id));
    $data = $req->fetch();
    return $data[0];
}

function shop_labo_patients_list() {
    global $db, $u_owner_id;

    $data = null;
//$req = $db->prepare("SELECT * FROM contacts WHERE type=:type AND owner_id=:owner_id  ORDER BY id DESC   ");
//$req = $db->prepare("SELECT * FROM patients WHERE company_id=:compnay_id ORDER BY id DESC   ");
    $req = $db->prepare("
            SELECT c.id, c.owner_id, c.title,  c.name, c.lastname, c.birthdate, p.contact_id, p.company_id FROM `contacts` as c INNER JOIN `patients` as p ON `c`.`id` = `p`.`contact_id` 
            WHERE company_id=:compnay_id ORDER BY id DESC   ");
    $req->execute(array(
        'compnay_id' => $u_owner_id,
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_contacts_list() {
    global $db, $u_owner_id;
    $limit = (_options_option("shop_limit_patients")) ? _options_option("shop_limit_patients") : 25;

    $data = null;
//$req = $db->prepare("SELECT * FROM contacts WHERE type=:type AND owner_id=:owner_id  ORDER BY id DESC   ");
    $req = $db->prepare("SELECT * FROM contacts WHERE owner_id=:owner_id AND type = 0 ORDER BY id DESC   ");
    $req->execute(array(
        'owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_contacts_list_by_company($start = 0, $limit = 999) {
    global $db, $u_id;
    $office_headoffice_id = contacts_work_for($u_id);
    $sql = "
        SELECT 
            *               
            FROM `contacts`             
            WHERE owner_id IN (SELECT id FROM contacts WHERE owner_id =:u_owner_id) 
            AND type = 0
            ORDER BY owner_id, lastname, name 
            Limit  :limit OFFSET :start
            "
    ;
    $query = $db->prepare($sql);
    $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_contacts_list_by_office($start = 0, $limit = 999) {
    global $db, $u_owner_id;
    $sql = "
        SELECT
        *
        FROM `contacts`
        WHERE owner_id = :u_owner_id ORDER BY id DESC
        Limit :limit OFFSET :start
";

    $query = $db->prepare($sql);
    $query->bindValue(':u_owner_id', (int) $u_owner_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_contacts_search_by_company($txt, $start = 0, $limit = 999) {
    global $db, $u_id;

    // veo cuantas palaras tiene el texto 
    $parts = explode(" ", $txt);
    $office_headoffice_id = contacts_work_for($u_id);

    // si tiene una palabra
    if (count($parts) == 1) {

        $sql = "
            SELECT
            *
            FROM `contacts`
            WHERE
            owner_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
            AND
            (id = :id OR name like :name OR lastname like :lastname OR birthdate like :birthdate)
            Limit :limit OFFSET :start
            
            ";

        $query = $db->prepare($sql);
        $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
        $query->bindValue(':id', (int) $txt, PDO::PARAM_INT);
        $query->bindValue(':name', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':lastname', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':birthdate', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    } else {

        $sql = "
            SELECT
            *
            FROM `contacts`
            WHERE
            owner_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
            AND
            (name like :name AND lastname like :lastname) OR
            (name like :lastname AND lastname like :name)
            Limit :limit OFFSET :start
";

        $query = $db->prepare($sql);
        $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
        $query->bindValue(':id', (int) $txt, PDO::PARAM_INT);
        $query->bindValue(':name', "%$parts[0]%", PDO::PARAM_STR);
        $query->bindValue(':lastname', "%$parts[1]%", PDO::PARAM_STR);
        $query->bindValue(':birthdate', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    }
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_contacts_search_by_company_type($txt, $type) {
    global $db, $u_id;

    // veo cuantas palaras tiene el texto 
    $parts = explode(" ", $txt);

    $office_headoffice_id = contacts_work_for($u_id);
    $limit = _options_option("shop_limit_orders");

    // si tiene una palabra
    if (count($parts) == 1) {

        $req = $db->prepare("
SELECT
*
FROM `contacts`
WHERE
type = :type
AND
owner_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
AND
(id = :id OR name like :name OR lastname like :lastname OR birthdate like :birthdate)

");

        $req->execute(array(
            'u_owner_id' => $office_headoffice_id,
            // 'owner_id' => $u_owner_id,
            'id' => "$txt",
            'name' => "%$txt%",
            'lastname' => "%$txt%",
            'birthdate' => "%$txt%",
            'type' => $type
        ));
    } else {

        $req = $db->prepare("
SELECT
*
FROM `contacts`
WHERE
type = :type AND

owner_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
AND
(name like :name AND lastname like :lastname) OR

(name like :lastname AND lastname like :name)


");

        $req->execute(array(
            'u_owner_id' => $office_headoffice_id,
            'name' => "%$parts[0]%",
            'lastname' => "%$parts[1]%",
            'type' => $type,
        ));
    }
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_contacts_search_by_office($txt, $start = 0, $limit = 999) {
    global $db, $u_owner_id;
//    $limit = _options_option("shop_limit_orders");
    // veo cuantas palaras tiene el texto 
    $parts = explode(" ", $txt);

    if (count($parts) == 1) {


        $sql = "
SELECT
*
FROM `contacts`
WHERE `owner_id` = :u_owner_id AND
( `id` = :id OR
`name` like :name OR
`lastname` like :lastname OR
`birthdate` like :birthdate
) ORDER BY `id` DESC
Limit :limit OFFSET :start
";

        $query = $db->prepare($sql);
        $query->bindValue(':u_owner_id', (int) $u_owner_id, PDO::PARAM_INT);
        $query->bindValue(':id', (int) $txt, PDO::PARAM_INT);
        $query->bindValue(':name', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':lastname', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':birthdate', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    } else {
        $sql = "
        SELECT
        *
        FROM `contacts`
        WHERE owner_id = :u_owner_id
        AND
        (name like :name AND lastname like :lastname)
        OR
        (name like :lastname AND lastname like :name)
        ORDER BY id DESC
        Limit :limit OFFSET :start
";

        $query = $db->prepare($sql);
        $query->bindValue(':u_owner_id', (int) $u_owner_id, PDO::PARAM_INT);
        $query->bindValue(':name', "%$parts[0]%", PDO::PARAM_STR);
        $query->bindValue(':lastname', "%$parts[1]%", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    }

    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_patients_list_by_company($start = 0, $limit = 999) {
    global $db, $u_id;
    $office_headoffice_id = contacts_work_for($u_id);
//    $limit = _options_option("shop_limit_orders");
    $sql = "
    SELECT
    p.company_id, p.company_ref, p.contact_id, c.id, c.title, c.type, c.name, c.lastname, c.birthdate
    FROM `patients` as p INNER JOIN `contacts` as c ON p.contact_id = c.id
    WHERE p.company_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
    ORDER BY p.company_id, c.lastname, c.name
     Limit :limit OFFSET :start
";

    $query = $db->prepare($sql);
    $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_patients_list_by_office() {
    global $db, $u_owner_id;
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
p.company_id, p.company_ref, p.contact_id, c.id, c.title, c.type, c.name, c.lastname, c.birthdate
FROM `patients` as p INNER JOIN `contacts` as c ON p.contact_id = c.id
WHERE p.company_id = :u_owner_id ORDER BY p.contact_id DESC
");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_labo_offices_list() {
    global $db, $u_id;
    $limit = (_options_option("shop_limit_patients")) ? _options_option("shop_limit_patients") : 25;

    $headOffice_id = contacts_work_for($u_id);

    $data = null;
    //$req = $db->prepare("SELECT * FROM contacts WHERE type = :type AND owner_id = :owner_id ORDER BY id DESC ");
    //$req = $db->prepare("SELECT * FROM contacts WHERE owner_id = : owner_id AND type = 1 ORDER BY id DESC ");
    $req = $db->prepare("SELECT * FROM contacts WHERE owner_id IN (SELECT id FROM contacts WHERE owner_id = :headOffice_id) AND type = 1 ");
    $req->execute(array(
        'headOffice_id' => $headOffice_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_patients_search($txt) {
    global $db, $u_owner_id;

    $limit = 19990;
    $data = null;

    //$req = $db->prepare("SELECT * FROM patients WHERE company_id = :compnay_id ORDER BY id DESC ");
    //$req = $db->prepare("SELECT * FROM contacts WHERE (id = :id OR name like :name OR lastname like :lastname OR birthdate like :birthdate ) AND ( owner_id = :owner_id AND type = 0 ) ");
    $req = $db->prepare("SELECT c.id, c.owner_id, p.contact_id, c.title, c.name, c.lastname, c.birthdate FROM `contacts` as c INNER JOIN patients as p ON c.id = p.contact_id WHERE (c.id = :id OR c.name like :name OR c.lastname like :lastname OR c.birthdate like :birthdate ) AND ( c.owner_id = :owner_id ) ");

    $req->execute(array(
        'owner_id' => $u_owner_id,
        'id' => "$txt",
        'name' => "%$txt%",
        'lastname' => "%$txt%",
        'birthdate' => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_contacts_search($txt) {
    global $db, $u_owner_id;

    $limit = 19990;
    $data = null;

    //$req = $db->prepare("SELECT * FROM patients WHERE company_id = :compnay_id ORDER BY id DESC ");
    // Esto busca en la tabla contactos sin tomar en cuenta la tabla pacientes
    $req = $db->prepare("SELECT * FROM contacts WHERE "
            . "(id = :id OR name like :name OR lastname like :lastname OR birthdate like :birthdate ) AND ( owner_id = :owner_id AND type = 0 ) ");
    // Esto toma en cuenta la tabla paceintes
// $req = $db->prepare("SELECT c.id, c.owner_id, p.contact_id, c.title, c.name, c.lastname, c.birthdate FROM `contacts` as c INNER JOIN patients as p ON c.id = p.contact_id WHERE (c.id = :id OR c.name like :name OR c.lastname like :lastname OR c.birthdate like :birthdate ) AND ( c.owner_id = :owner_id ) ");

    $req->execute(array(
        'owner_id' => $u_owner_id,
        'id' => "$txt",
        'name' => "%$txt%",
        'lastname' => "%$txt%",
        'birthdate' => "%$txt%"
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_contacts_update($id, $title, $name, $lastname, $birthdate) {

    global $db;
    $req = $db->prepare('UPDATE contacts SET title=:title, name=:name, lastname=:lastname, birthdate=:birthdate WHERE id=:id');
    $req->execute(array(
        'id' => $id,
        'title' => $title,
        'name' => $name,
        'lastname' => $lastname,
        'birthdate' => $birthdate
    ));
}

function shop_contacts_update_name_lastname($title, $name, $lastname) {

    global $db, $u_id;

    $req = $db->prepare('UPDATE contacts SET title=:title, name=:name, lastname=:lastname WHERE id=:u_id ');
    $req->execute(array(
        'u_id' => $u_id,
        'title' => $title,
        'name' => $name,
        'lastname' => $lastname
    ));

    //echo var_dump($title, $name, $lastname);
    //die();
}

function shop_updateCompanyName($newName) {
    global $u_owner_id;
    global $db;
    $req = $db->prepare("UPDATE contacts SET name = :newName WHERE id = :company_id ");
    $req->execute(array(
        'newName' => $newName,
        'company_id' => $u_owner_id
    ));
}

function shop_updateCompanyTva($tva) {
    global $u_owner_id;
    global $db;
    $req = $db->prepare("UPDATE contacts SET tva = :tva WHERE id = :id ");
    $req->execute(array(
        'tva' => $tva,
        'id' => $u_owner_id
    ));
}

function xxxshop_contacts_myinfo_edit($name, $tva) {

    global $db, $u_id;
    $req = $db->prepare('UPDATE contacts SET name=:name, tva=:tva WHERE id=:u_id');
    $req->execute(array(
        'u_id' => $u_id,
        'name' => $name,
        'tva' => $tva,
    ));
}

function shop_contacts_directory_update($id, $data) {

    global $db, $u_id;

    $req = $db->prepare('UPDATE directory SET data=:data WHERE id=:id AND contact_id=:contact_id');
    $req->execute(array(
        'id' => $id,
        'data' => $data,
        'contact_id' => $u_id,
    ));
}

function shop_contacts_directory_add($contact_id, $name, $data) {
    global $db;
    $req = $db->prepare("INSERT INTO `directory` (`id`, `contact_id`, `address_id`, `name`, `data`, `order_by`, `status`) "
            . "VALUES (:id, :contact_id, :address_id, :name, :data, :order_by, :status)");

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'address_id' => null,
        'name' => $name,
        'data' => $data,
        'order_by' => 1,
        'status' => 1,
    ));

    //die("$u_owner_id, $name, $data");
}

function shop_contacts_directory_delete($contact_id, $name, $data) {
    global $db;
    $req = $db->prepare(
            "DELETE FROM `directory`
WHERE contact_id = :contact_id AND name = :name AND data = :data ");

    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name,
        'data' => $data,
    ));

    //die("$u_owner_id, $name, $data");
}

function shop_addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $sector = null, $ref = null, $city = '', $province = null, $region = '', $country = "", $code = null, $status = null) {
    global $db;
    $req = $db->prepare('INSERT INTO addresses (id,   contact_id, name,  address,  number,  postcode,  barrio,  sector, ref,  city, province,  region,  country,  code,  status)
                                       VALUES (:id, :contact_id, :name, :address, :number, :postcode, :barrio, :sector, :ref :city, :province, :region, :country, :code, :status)');

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'name' => $name,
        'address' => $address,
        'number' => $number,
        'postcode' => $postcode,
        'barrio' => $barrio,
        'sector' => $sector,
        'ref' => $ref,
        'city' => $city,
        'province' => $province,
        'region' => $region,
        'country' => $country,
        'code' => $code,
        'status' => $status
            )
    );
}

function shop_contacts_add($owner_id, $type, $title, $name, $lastname, $birthdate, $code, $order_by, $status) {
    global $db;
    $req = $db->prepare('INSERT INTO contacts (id,  owner_id,  type,  title,  name,  lastname,  birthdate,   code,  order_by,  status)
                                       VALUES (:id, :owner_id, :type, :title, :name, :lastname, :birthdate, :code,  :order_by, :status)');

    $req->execute(array(
        'id' => null,
        'owner_id' => $owner_id,
        'type' => $type,
        'title' => $title,
        'name' => $name,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
        'code' => $code,
        'order_by' => $order_by,
        'status' => $status
            )
    );
    return $db->lastInsertId();
}

function shop_contacts_details($id) {
    global $db;
    $req = $db->prepare('SELECT * FROM contacts WHERE id=:id ');
    $req->execute(array(
        'id' => $id
    ));
    $data = $req->fetch();
    return $data;
}

function shop_contacts_search_name_lastname_birthdate($owner_id, $name, $lastname, $birthdate) {
    global $db;
    $data = null;
    $req = $db->prepare('SELECT * FROM contacts WHERE '
            . 'owner_id = :owner_id AND '
            . 'name = :name AND '
            . 'lastname = :lastname AND '
            . 'birthdate = :birthdate  '
            . 'ORDER BY name ');
    $req->execute(array(
        'owner_id' => $owner_id,
        'name' => $name,
        'lastname' => $lastname,
        'birthdate' => $birthdate,
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_addresses_list() {
    global $db, $u_owner_id;

    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses WHERE (contact_id = :u_owner_id ) ORDER BY id DESC ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_labo_address_search($txt) {
    global $db, $u_owner_id;

    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM addresses WHERE "
            . "(id = :id OR client_ref = :client_ref OR "
            . "date like :date ) AND ( company_id = :u_owner_id ) ");

    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'id' => $txt,
        'date' => "%$txt%",
        'client_ref' => $txt,
    ));

    $data = $req->fetchall();
    return $data;
}

function shop_orders_list() {
    global $db, $u_owner_id;

    $limit = _options_option("shop_limit_orders");

    //$req = $db->prepare("SELECT * FROM orders WHERE company_id = :u_owner_id ORDER BY id DESC LIMIT $limit"   );
    $req = $db->prepare("
SELECT
o.id,
 o.side,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname

FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id

WHERE o.company_id = :u_owner_id ORDER BY o.id DESC

");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_orders_list_by_office($office_id, $start = 0, $limit = 999) {
    global $db;

//    $limit = _options_option("shop_limit_orders");

    $query = $db->prepare("
SELECT
o.id,
 o.side,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname

FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id

WHERE o.company_id = :office_id ORDER BY o.id DESC

Limit :limit OFFSET :start

");

    $query->bindValue(':office_id', (int) $office_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_orders_waiting() {
    global $db, $u_owner_id;

    $req = $db->prepare("SELECT id as total FROM orders WHERE company_id = :u_owner_id AND status = 0 ");

    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetch();
    return (isset($data[0])) ? ($data[0]) : false;
}

function shop_orders_update_total($order_id) {

    global $db;
    //$req = $db->prepare("UPDATE `orders` SET price = WHERE id = ? ");
    // ( 200 * 21 / 100 ) + 200


    $req = $db->prepare("UPDATE `orders` SET `price` = (SELECT SUM(`price` + ( (`price` * `tva`)/100 )) FROM `orders_lines` WHERE `order_id` = :id) WHERE id = :id ");
    $req->execute(array(
        "id" => $order_id
    ));

    //$data = $req->fetchall();
    //return doubleval($data[0][0]);
}

function shop_orders_update_side($order_id, $s) {
    global $db;
    $req = $db->prepare("UPDATE `orders` SET `side` = :side WHERE id = :id ");
    $req->execute(array(
        "id" => $order_id,
        "side" => $s
    ));
}

function shop_orders_update_status($order_id, $new_status) {

    global $db, $u_owner_id;

    //$office_headoffice_id = offices_headoffice_of_office($u_owner_id) ; 

    $req = $db->prepare(
            "UPDATE `orders` SET `status` = :status WHERE `orders`.`id` = :id;
");
    $req->execute(array(
        "id" => $order_id,
        "status" => $new_status
    ));
}

function shop_orders_list_by_company($start = 0, $limit = 999) {
    global $db, $u_owner_id;

    $office_headoffice_id = offices_headoffice_of_office($u_owner_id);

//    $limit = _options_option("shop_limit_orders");
    //$req = $db->prepare("SELECT * FROM orders WHERE company_id = :u_owner_id ORDER BY id DESC LIMIT $limit"   );
    $query = $db->prepare("
SELECT
o.id,
 o.side,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname

FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id

WHERE o.company_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id) ORDER BY o.id DESC

Limit :limit OFFSET :start

");

    $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_orders_search_by_company($txt, $start = 0, $limit = 999) {
    global $db, $u_owner_id;
    // ordenes que estan registradas bajo la empresa
    $office_headoffice_id = offices_headoffice_of_office($u_owner_id);
    //$limit = _options_option("shop_limit_orders");
    // veo cuantas palaras tiene el texto 
    $parts = explode(" ", $txt);

    if (count($parts) == 1) {

        $query = $db->prepare("
SELECT
o.id,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.side,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id
WHERE o.company_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
AND
(
o.id = :id OR
o.client_ref like :client_ref OR
c.name like :name OR c.lastname like :lastname
)
ORDER BY o.id DESC
Limit :limit OFFSET :start
");

        $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
        $query->bindValue(':id', (int) $txt, PDO::PARAM_INT);
        $query->bindValue(':client_ref', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':name', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':lastname', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

//
//        $req->execute(array(
//            'u_owner_id' => $office_headoffice_id,
//            'id' => "$txt",
//            'client_ref' => "$txt",
//            'name' => "%$txt%",
//            'lastname' => "%$txt%",
//        ));
//        
    } else {

        $query = $db->prepare("
SELECT
o.id,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.side,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id
WHERE o.company_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
AND
(
o.id = :id OR
o.client_ref like :client_ref OR
(c.name like :name OR c.lastname like :lastname) OR
(c.name like :lastname OR c.lastname like :name)
)
ORDER BY o.id DESC
Limit :limit OFFSET :start

");

        $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
        $query->bindValue(':id', (int) $txt, PDO::PARAM_INT);
        $query->bindValue(':client_ref', "%$txt%", PDO::PARAM_STR);
        $query->bindValue(':name', "%$parts[0]%", PDO::PARAM_STR);
        $query->bindValue(':lastname', "%$parts[1]%", PDO::PARAM_STR);
        $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
        $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);

//        $query->execute(array(
//            'u_owner_id' => $office_headoffice_id,
//            'id' => "$txt",
//            'client_ref' => "$txt",
//            'name' => "%$parts[0]%",
//            'lastname' => "%$parts[1]%"
//        ));
    }


    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_orders_search_by_company_status($status, $start = 0, $limit = 999) {
    global $db, $u_owner_id;
    // ordenes que estan registradas bajo la empresa
    $office_headoffice_id = offices_headoffice_of_office($u_owner_id);

    $query = $db->prepare("
SELECT
o.id,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.side,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id
WHERE o.company_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
AND
(
o.status = :status
)
ORDER BY o.id DESC
Limit :limit OFFSET :start
");

    $query->bindValue(':u_owner_id', (int) $office_headoffice_id, PDO::PARAM_INT);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_orders_search_by_office_status($status, $start = 0, $limit = 999) {
    global $db, $u_owner_id;

    $query = $db->prepare("
SELECT
o.id,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.side,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id
WHERE o.company_id = :u_owner_id
AND
(
o.status = :status
)
ORDER BY o.id DESC
Limit :limit OFFSET :start
");

    $query->bindValue(':u_owner_id', (int) $u_owner_id, PDO::PARAM_INT);
    $query->bindValue(':status', (int) $status, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_orders_total_by_company_status($status) {
    global $db, $u_owner_id;
    // ordenes que estan registradas bajo la empresa
    $office_headoffice_id = offices_headoffice_of_office($u_owner_id);

    $req = $db->prepare("
SELECT count(*)
FROM `orders`
WHERE company_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
AND
( status = :status )
");
    $req->execute(array(
        'u_owner_id' => $office_headoffice_id,
        'status' => $status,
    ));
    $total = $req->fetch();
    return ($total[0]) ? $total[0] : null;
}

function shop_orders_total_by_office_status($status) {
    global $db, $u_id;

    $office_id = contacts_work_at($u_id);

    $req = $db->prepare("
SELECT count(*)
FROM `orders`
WHERE company_id = :office_id
AND
(
status = :status
)

");
    $req->execute(array(
        'office_id' => $office_id,
        'status' => $status,
    ));
    $total = $req->fetch();
    return ($total[0]) ? $total[0] : null;
}

function shop_orders_search_by_office($txt) {
    global $db, $u_owner_id;
    // ordenes que estan registradas bajo la empresa
    //$office_headoffice_id = offices_headoffice_of_office($u_owner_id) ;         
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
o.id,
 o.side,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id
WHERE o.company_id = :u_owner_id
AND

(
o.id = :id OR
o.client_ref = :client_ref OR
c.name like :name OR
c.lastname like :lastname
)

ORDER BY o.id DESC

");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'id' => $txt,
        'client_ref' => "$txt",
        'name' => "%$txt%",
        'lastname' => "%$txt%",
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_orders_search_by_contact($contact_id) {
    global $db, $u_owner_id;
    // ordenes que estan registradas bajo la empresa
    //$office_headoffice_id = offices_headoffice_of_office($u_owner_id) ;         
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
o.id,
 o.side,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.create_by,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id

WHERE o.create_by = :contact_id

ORDER BY o.id DESC

");
    $req->execute(array(
        'contact_id' => $contact_id,
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_orders_search_by_patient($patient_id) {
    global $db, $u_owner_id;
    // ordenes que estan registradas bajo la empresa
    //$office_headoffice_id = offices_headoffice_of_office($u_owner_id) ;         
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
o.id,
 o.side,
 o.express,
 o.date,
 o.date_delivery,
 o.delivery_days,
 o.client_ref,
 o.patient_id,
 o.remake,
 o.bac,
 o.discount,
 o.status,
 o.company_id,
 c.name,
 c.lastname
FROM `orders` as o INNER JOIN `contacts` as c ON o.patient_id = c.id

WHERE o.patient_id = :patient_id

ORDER BY o.id DESC

");
    $req->execute(array(
        'patient_id' => $patient_id,
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_orders_side_list_by_order_id($order_id) {
    global $db;

    $req = $db->prepare("SELECT side FROM orders_lines WHERE order_id = :order_id");
    $req->execute(array(
        'order_id' => $order_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_orders_list_by_patient($patient_id) {
    global $db, $u_owner_id;
    $req = $db->prepare('SELECT * FROM orders WHERE ( company_id=:u_owner_id AND patient_id=:patient_id) ORDER BY id DESC');
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'patient_id' => $patient_id
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_address_details($id) {
    global $db, $u_owner_id;
    $req = $db->prepare('SELECT * FROM addresses WHERE id=:id ');
    $req->execute(array(
        'id' => $id
    ));
    $data = $req->fetch();
    return $data;
}

function shop_address_add($contact_id, $name, $address, $number, $postcode, $barrio, $sector = null, $ref = null, $city = '', $province = null, $region = '', $country = "", $code = null, $status = null) {
    global $db, $u_owner_id;
    $req = $db->prepare('INSERT INTO addresses (id,  contact_id,  name,  address,  number,  postcode,  barrio, sector,  ref,  city,  province,  region,  country,  code,  status)
                                       VALUES (:id, :contact_id, :name, :address, :number, :postcode, :barrio, :sector, :ref, :city, :province, :region, :country, :code, :status)');

    $req->execute(array(
        'id' => null,
        'contact_id' => $contact_id,
        'name' => $name,
        'address' => $address,
        'number' => $number,
        'postcode' => $postcode,
        'barrio' => $barrio,
        'sector' => $sector,
        'ref' => $ref,
        'city' => $city,
        'province' => $province,
        'region' => $region,
        'country' => $country,
        'code' => $code,
        'status' => 1,
            )
    );

    return $db->lastInsertId();
}

// si existe actualiza, sino lo crea
function shop_address_push($contact_id, $name, $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country) {

    $ba = addresses_by_contact_id_and_name($contact_id, 'Billing');

    if ($ba) {

        // actualizo
        // saco el id de la direccion 
        // para asi actualizarla 
        //
        shop_address_update($ba['id'], $name, $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country);
    } else {
        // creo
        shop_address_add($contact_id, $name, $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, magia_uniqid(), 1);
    }
}

function shop_address_search(
        $contact_id, $name, $address, $number, $postcode, $barrio, $sector = null, $ref = null, $city = '', $province = null, $region = '', $country = ""
) {
    global $db, $u_owner_id;
    $req = $db->prepare('SELECT id FROM addresses WHERE ( '
            . 'contact_id =:contact_id AND '
            . 'name = :name AND  '
            . 'address = :address AND  '
            . 'number = :number AND  '
            . 'postcode = :postcode AND  '
            . 'barrio = :barrio AND  '
            . 'city = :city AND '
            . 'region = :region AND '
            . 'country = :country ) ORDER BY id DESC');
    $req->execute(array(
        "contact_id" => $contact_id,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "postcode" => $postcode,
        "barrio" => $barrio,
        "city" => $city,
        "region" => $region,
        "country" => $country
    ));
    $data = $req->fetchall();

    return ( isset($data) ) ? $data : false;
}

function shop_address_update(
        $id, $name, $address, $number, $postcode, $barrio, $sector = null, $ref = null, $city = '', $province = null, $region = '', $country = "", $code = null, $status = null
) {
    global $db, $u_owner_id;
    $req = $db->prepare(
            'UPDATE `addresses` 
            SET name=:name,  
            address=:address,  
            number=:number,  
            postcode=:postcode,  
            barrio=:barrio,  
            sector=:sector,  
            ref=:ref,  
            city=:city,  
            province=:province,  
            region=:region,  
            country=:country  
          
        WHERE id=:id ');

    $req->execute(array(
        'id' => $id,
        // 'contact_id' => $u_owner_id,
        'name' => $name,
        'address' => $address,
        'number' => $number,
        'postcode' => $postcode,
        'barrio' => $barrio,
        'sector' => $sector,
        'ref' => $ref,
        'city' => $city,
        'province' => $province,
        'region' => $region,
        'country' => $country,
            )
    );
}

function shop_orders_id_formated($order_id, $link_id = false, $link_bac = false) {
    // saco el bac segun el order

    $bac = orders_field_id('bac', $order_id);

    $bac_link = ( $link_bac) ? '<a href="index.php">' . $bac . '</a>' : $bac;

    $order_id_link = ( $link_id) ? '<a href="index.php?c=shop&a=orderDetails&id=' . $order_id . '">' . $order_id . '</a>' : $order_id;

    return "$order_id_link-$bac_link";
}

function shop_orders_add(
        $via, $express, $date_delivery, $client_ref, $address_billing, $address_delivery,
        $patient_id, $description_json, $bac, $price, $discount, $ce, $remake, $hearing_loss, $ear,
        $comments, $code, $status, $items_array_left_json, $items_array_rigth_json, $items_array_stereo_json) {

    global $db, $u_owner_id, $u_id;

    $req = $db->prepare("INSERT INTO `orders` (`id`, `via`, `express`, `date`, `date_delivery`, `company_id`, `create_by`, `client_ref`, `address_billing`, `address_delivery`, `patient_id`, `description`, `bac`, `price`, `discount`, `ce`, `remake`, `hearing_loss`, `ear`, `comments`, `code`, `status`) VALUES (:id, :via, :express, :date, :date_delivery, :company_id, :create_by, :client_ref, :address_billing, :address_delivery, :patient_id, :description, :bac, :price, :discount, :ce, :remake, :hearing_loss, :ear, :comments, :code, :status);
");

    $req->execute(array(
        'id' => null,
        'via' => $via,
        'express' => $express,
        'date' => null,
        'date_delivery' => $date_delivery,
        'company_id' => $u_owner_id,
        'create_by' => $u_id,
        'client_ref' => $client_ref,
        'address_billing' => $address_billing,
        'address_delivery' => $address_delivery,
        'patient_id' => $patient_id,
        'description' => $description_json,
        'bac' => $bac,
        'price' => $price,
        'discount' => $discount,
        'ce' => $ce,
        'remake' => $remake,
        'hearing_loss' => $hearing_loss,
        'ear' => $ear,
        'comments' => $comments,
        'code' => $code,
        'status' => $status,
            )
    );
}

function shop_orders_add_short(
        $side,
        $delivery_days,
        $date_delivery,
        $address_billing,
        $address_delivery,
        $patient_id,
        $bac_free,
        $comments,
        $code,
        $status
) {
    global $db, $u_owner_id, $u_id;

    $req = $db->prepare(
            "
INSERT INTO `orders`
(`id`, `side`, `via`, `express`, `date`, `delivery_days`, `date_delivery`, `company_id`, `create_by`, `client_ref`,
 `address_billing`, `address_delivery`, `patient_id`, `description`, `bac`,
 `price`, `discount`, `ce`, `remake`, `hearing_loss`, `ear`, `comments`, `code`, `status`)
VALUES
(:id, :side, :via, :express, :date, :delivery_days, :date_delivery, :company_id, :create_by, :client_ref,
 :address_billing, :address_delivery, :patient_id, :description, :bac,
 :price, :discount, :ce, :remake, :hearing_loss, :ear, :comments, :code, :status) "
    );

    $req->execute(array(
        'id' => null,
        'side' => $side,
        'via' => 'Poste',
        'express' => null,
        'date' => null,
        'delivery_days' => $delivery_days,
        'date_delivery' => $date_delivery,
        'company_id' => $u_owner_id,
        'create_by' => $u_id,
        'client_ref' => '',
        'address_billing' => $address_billing,
        'address_delivery' => $address_delivery,
        'patient_id' => $patient_id,
        'description' => null,
        'bac' => $bac_free,
        'price' => 0,
        'discount' => 0,
        'ce' => null,
        'remake' => null,
        'hearing_loss' => null,
        'ear' => null,
        'comments' => $comments,
        'code' => $code,
        'status' => $status,
            )
    );
}

function shop_orders_add_remake(
        $side,
        $delivery_days,
        $date_delivery,
        $address_billing,
        $address_delivery,
        $patient_id,
        $bac_free,
        $remake,
        $discount,
        $comments,
        $code,
        $status
) {
    global $db, $u_owner_id, $u_id;

    $req = $db->prepare(
            "
INSERT INTO `orders`
(`id`, `side`, `via`, `express`, `date`, `delivery_days`, `date_delivery`, `company_id`, `create_by`, `client_ref`,
 `address_billing`, `address_delivery`, `patient_id`, `description`, `bac`,
 `price`, `discount`, `ce`, `remake`, `hearing_loss`, `ear`, `comments`, `code`, `status`)
VALUES
(:id, :side, :via, :express, :date, :delivery_days, :date_delivery, :company_id, :create_by, :client_ref,
 :address_billing, :address_delivery, :patient_id, :description, :bac,
 :price, :discount, :ce, :remake, :hearing_loss, :ear, :comments, :code, :status) "
    );

    $req->execute(array(
        'id' => null,
        'side' => $side,
        'via' => 'Poste',
        'express' => null,
        'date' => null,
        'delivery_days' => $delivery_days,
        'date_delivery' => $date_delivery,
        'company_id' => $u_owner_id,
        'create_by' => $u_id,
        'client_ref' => '',
        'address_billing' => $address_billing,
        'address_delivery' => $address_delivery,
        'patient_id' => $patient_id,
        'description' => null,
        'bac' => $bac_free,
        'price' => 0,
        'discount' => $discount,
        'ce' => null,
        'remake' => $remake,
        'hearing_loss' => null,
        'ear' => null,
        'comments' => $comments,
        'code' => $code,
        'status' => $status,
            )
    );
}

function shop_orders_add_copy(
        $side,
        $delivery_days,
        $date_delivery,
        $address_billing,
        $address_delivery,
        $patient_id,
        $bac_free,
        $remake,
        $discount,
        $comments,
        $code,
        $status
) {
    global $db, $u_owner_id, $u_id;

    $req = $db->prepare(
            "
INSERT INTO `orders`
(`id`, `side`, `via`, `express`, `date`, `delivery_days`, `date_delivery`, `company_id`, `create_by`, `client_ref`,
 `address_billing`, `address_delivery`, `patient_id`, `description`, `bac`,
 `price`, `discount`, `ce`, `remake`, `hearing_loss`, `ear`, `comments`, `code`, `status`)
VALUES
(:id, :side, :via, :express, :date, :delivery_days, :date_delivery, :company_id, :create_by, :client_ref,
 :address_billing, :address_delivery, :patient_id, :description, :bac,
 :price, :discount, :ce, :remake, :hearing_loss, :ear, :comments, :code, :status) "
    );

    $req->execute(array(
        'id' => null,
        'side' => $side,
        'via' => 'Poste',
        'express' => null,
        'date' => null,
        'delivery_days' => $delivery_days,
        'date_delivery' => $date_delivery,
        'company_id' => $u_owner_id,
        'create_by' => $u_id,
        'client_ref' => '',
        'address_billing' => $address_billing,
        'address_delivery' => $address_delivery,
        'patient_id' => $patient_id,
        'description' => null,
        'bac' => $bac_free,
        'price' => 0,
        'discount' => $discount,
        'ce' => null,
        'remake' => $remake,
        'hearing_loss' => null,
        'ear' => null,
        'comments' => $comments,
        'code' => $code,
        'status' => $status,
            )
    );
}

function shop_orders_add_line(
        $order_id, $code, $quantity, $description, $price, $tva, $side, $discounts = 0, $discounts_mode = '%', $type = null, $model = null, $material = null, $ventilation = null, $marca = null, $options = null, $colour = null
) {
    global $db;
    $req = $db->prepare("INSERT INTO `orders_lines` (`id`, `order_id`, `code`, `quantity`, `description`, `price`, `tva`, `discounts`, `discounts_mode`, `side`, `type`, `model`, `material`, `ventilation`, `marca`, `options`, `colour`) VALUES (:id, :order_id, :code, :quantity, :description, :price, :tva, :discounts, :discounts_mode, :side, :type, :model, :material, :ventilation, :marca, :options, :colour)");

    $req->execute(array(
        'id' => null,
        'order_id' => $order_id,
        'code' => $code,
        'quantity' => $quantity,
        'description' => $description,
        'price' => $price,
        'tva' => $tva,
        'discounts' => $discounts,
        'discounts_mode' => $discounts_mode,
        'side' => $side,
        'type' => null,
        'model' => null,
        'material' => null,
        'ventilation' => null,
        'marca' => null,
        'options' => null,
        'colour' => null
            )
    );
}

function shop_orders_add_line_valued($last_order_id, $items_array, $side) {

    foreach ($items_array as $key => $value) {
        // renombramos las variables para correjir los errores desde el formulario
        //
        $key = ( $key == "marque") ? "marques" : $key;
        $key = ( $key == "ecouteur") ? "ecouteurs" : $key;
        $key = ( $key == "event") ? "events" : $key;
        $key = ( $key == "modele") ? "modeles" : $key;

        switch ($key) {

            case "perte_auditive": // 9                         
                $code = products_code_generate("perte_auditive", $value);
                $price = 0;
                $tax = 0;
                //$description = ucfirst(_tr($key)) . " : " . _tr(perte_auditive_field_id("perte", $value)); 
                $description = (perte_auditive_field_id("perte", $value));

                break;

            case "longueurs": // 9                         
                $code = products_code_generate("longueurs", $value);
                $price = 0;
                $tax = 0;
                $description = (longueurs_field_id("longueur", $value));
                break;

            case "constitution": // 9                         
                $code = products_code_generate("constitution", $value);
                $price = 0;
                $tax = 0;
                $description = (constitution_field_id("constitution", $value));
                break;

            case "types": //1                        
                $code = products_code_generate("types", $value);
                $price = types_field_id('price', $value);
                $tax = types_field_id('tax', $value);
                $description = (types_field_id("type", $value));
                break;

            case "modeles": // 2                                    
                $code = products_code_generate("modeles", $value);
                $price = modeles_field_id('price', $value);
                $tax = modeles_field_id('tax', $value);
                $description = (modeles_field_id("modele", $value));
                break;

            case "mesure_snr": // 3                        
                $code = products_code_generate("mesures_snr", $value);
                $price = mesure_snr_field_id('price', $value);
                $tax = mesure_snr_field_id('tax', $value);
                $description = (mesure_snr_field_id("mesure", $value));
                break;

            case "formes": // 4                        
                $code = products_code_generate("formes", $value);
                $price = formes_field_id('price', $value);
                $tax = formes_field_id('tax', $value);
                $description = (formes_field_id("forme", $value));
                break;

            case "materials": //5                                                
                $code = products_code_generate("materials", $value);
                $price = materials_field_id('price', $value);
                $tax = materials_field_id('tax', $value);
                $description = (materials_field_id("material", $value));
                break;

            case "couleurs": // 6                        
                $code = products_code_generate("couleurs", $value);
                $price = couleurs_field_id('price', $value);
                $tax = couleurs_field_id('tax', $value);
                $description = (couleurs_field_id("colour", $value));
                break;

            case "marques": // 7                        
                $code = products_code_generate("marques", $value);
                $price = marques_field_id('price', $value);
                $tax = marques_field_id('tax', $value);
                $description = (marques_field_id("marque", $value));
                break;

            case "ecouteurs": // 8                        
                $code = products_code_generate("ecouteurs", $value);
                $price = ecouteurs_field_id('price', $value);
                $tax = ecouteurs_field_id('tax', $value);
                $description = (ecouteurs_field_id("ecouteur", $value));
                break;

            case "events": // 8                        
                $code = products_code_generate("events", $value);
                $price = events_field_id('price', $value);
                $tax = events_field_id('tax', $value);
                $description = (events_field_id("event", $value));
                break;

            case "diametre": // 8 diametre                        
                $code = products_code_generate("diametre", $value);
                $price = 0;
                $tax = 0;
                $description = (diametre_field_id("diametre", $value));
                break;

            default:
                $code = null;
                $price = 0;
                $tax = 0;
                break;
        }



        if ($key == "options") {
            foreach ($value as $k => $option_id) {
                $code = products_code_generate("options", $option_id);
                //$description = _tr("Option")." : " . _tr(options_field_id("option" , $option_id)) ;                        
                // // con el id, no me da el nombre, intento con el codigo 
                //$description = (options_field_id("option" , $option_id)) ;  
                $description = options_option_by_id($option_id);

                //vardump($description); 

                $price = options_field_id("price", $option_id);
                $tax = options_field_id("tax", $option_id);

                shop_orders_add_line($last_order_id, strtoupper($code), 1, $description, $price, $tax, $side);
            }
        } else {
            //shop_orders_add_line($order_id , $code , $quantity , $description , $price , $tva , $side , $type , $model , $material); 
            shop_orders_add_line($last_order_id, strtoupper($code), 1, $description, $price, $tax, $side);
        }
    }
}

function shop_addresses_billing() {
    global $db, $u_owner_id;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT id FROM addresses WHERE (contact_id = :u_owner_id ) AND name = 'Billing' ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_addresses_delivery() {
    global $db, $u_owner_id;

    $limit = 1;
    $data = null;
    $req = $db->prepare("SELECT id FROM addresses WHERE (contact_id = :u_owner_id ) AND name = 'Delivery' ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_addresses_delivery_by_status($status) {
    global $db, $u_owner_id;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT id
FROM addresses
WHERE (contact_id = :u_owner_id )
AND name = 'Delivery'
AND status = :status ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'status' => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_password_update($password) {
    global $db, $u_id;
    $req = $db->prepare('UPDATE users SET password=:password  WHERE contact_id=:u_id ');

    $req->execute(array(
        'u_id' => $u_id,
        'password' => $password,
            )
    );
}

function shop_orders_details($id) {
    global $db, $u_id;

    $headOffice_id = contacts_work_for($u_id);

    $req = $db->prepare('SELECT * FROM orders WHERE id =:id AND company_id IN (SELECT id FROM contacts WHERE owner_id =:headOffice_id) ');
    $req->execute(array(
        'id' => $id,
        'headOffice_id' => $headOffice_id
    ));
    $data = $req->fetch();
    return $data;
}

function shop_orders_update_client_ref($order_id, $ref) {
    global $db, $u_owner_id;
    //$req = $db->prepare('UPDATE orders SET client_ref=:client_ref  WHERE (company_id=:u_owner_id AND id=:order_id)  ');
    $req = $db->prepare('UPDATE orders SET client_ref=:client_ref  WHERE ( id=:order_id)  ');

    $req->execute(array(
        //'u_owner_id' => $u_owner_id,
        'order_id' => $order_id,
        'client_ref' => $ref,
            )
    );
}

function shop_orders_update_comments($order_id, $comments) {
    global $db, $u_owner_id;
    $req = $db->prepare('UPDATE orders SET comments=:comments  WHERE (company_id=:u_owner_id AND id=:order_id)  ');

    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'order_id' => $order_id,
        'comments' => $comments,
            )
    );
}

function shop_orders_update_delivery_address($order_id, $address_delivery_json) {
    global $db, $u_owner_id;
    $req = $db->prepare(
            'UPDATE orders 
             SET    address_delivery = :address_delivery  
             WHERE (company_id=:u_owner_id AND id=:order_id)  ');

    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'order_id' => $order_id,
        'address_delivery' => $address_delivery_json,
            )
    );
}

function shop_orders_update_date_delivery($order_id, $date_delivery) {
    global $db, $u_owner_id;
    $req = $db->prepare(
            'UPDATE orders 
             SET    date_delivery = :date_delivery  
             WHERE (company_id=:u_owner_id AND id=:order_id)  ');

    $req->execute(array(
        'u_owner_id' => $u_owner_id,
        'order_id' => $order_id,
        'date_delivery' => $date_delivery,
            )
    );
}

function shop_order_copy_lines_for_remake($order_id, $remake_id) {
    global $db;

    $req = $db->prepare(" INSERT INTO `orders_lines` (`order_id`, `code`, `quantity`, `description`, `price`, `tva`, `side`) SELECT :remake_id, `code`, `quantity`, `description`, `price`, `tva`, `side` FROM orders_lines WHERE order_id = :order_id ");
    $req->execute(array(
        "order_id" => $order_id,
        "remake_id" => $remake_id,
    ));
    return $db->lastInsertId();
}

function shop_order_copy_lines_for_copy($order_id, $remake_id, $side, $quantity) {
    global $db;

    $req = $db->prepare(
            "INSERT INTO `orders_lines`
(`order_id`, `code`, `quantity`, `description`, `price`, `tva`, `side`) SELECT
:remake_id, `code`, :quantity, `description`, `price`, `tva`, :side
FROM orders_lines WHERE order_id = :order_id AND side = :side ");

    $req->execute(array(
        "order_id" => $order_id,
        "remake_id" => $remake_id,
        "side" => $side,
        "quantity" => $quantity,
    ));
    return $db->lastInsertId();
}

function shop_order_update_delivery_days($id, $delivery_days) {
    global $db;

    $req = $db->prepare("UPDATE `orders` SET `delivery_days` = :delivery_days WHERE `id` = :id ");
    $req->execute(array(
        'id' => $id,
        'delivery_days' => $delivery_days
    ));
}

function shop_order_update_date_delivery($id, $date_delivery) {
    global $db;

    $req = $db->prepare("UPDATE `orders` SET `date_delivery` = :date_delivery WHERE `id` = :id ");
    $req->execute(array(
        'id' => $id,
        'date_delivery' => $date_delivery
    ));
}

function shop_order_update_field($id, $field, $new_data) {
    global $db;

    $req = $db->prepare("UPDATE `orders` SET `:field` = :new_data WHERE `id` = :id ");
    $req->execute(array(
        'id' => $id,
        'field' => $field,
        'new_data' => $new_data
    ));
}

function shop_orders_lines($order_id, $side = null) {
    global $db;
    $data = null;

    if ($side == null) {
        $req = $db->prepare("SELECT * FROM orders_lines WHERE ( order_id = :order_id ) ORDER BY id ");
        $req->execute(array(
            'order_id' => $order_id
        ));
    } else {
        $req = $db->prepare("SELECT * FROM orders_lines WHERE ( order_id = :order_id AND side = :side ) ORDER BY id ");
        $req->execute(array(
            'order_id' => $order_id,
            'side' => $side
        ));
    }

    $data = $req->fetchall();
    return $data;
}

function shop_orders_lines_delete_all($order_id) {
    global $db;
    $req = $db->prepare("DELETE FROM orders_lines WHERE order_id = ? ");
    $req->execute(array($order_id));
}

function shop_orders_lines_delete_by($order_id) {
    global $db;
    $req = $db->prepare("DELETE FROM orders_lines WHERE order_id = ? ");
    $req->execute(array($order_id));
}

function shop_orders_button_cancel() {
    echo '<div class="row">
              <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">';
    echo '<hr>';
    echo "<p>" . _t("You can cancel this order") . "</p>";

    include view('shop', 'modal_order_new_cancel');
    echo '</div>';
    echo '</div>';
}

function shop_files_list($order_id, $side) {
    global $db;
    $limit = 10;

    $data = null;

    if ($side == "all") {
        $req = $db->prepare("SELECT * FROM orders_files WHERE order_id = :order_id ORDER BY id ");
        $req->execute(array(
            'order_id' => $order_id
        ));
    } else {
        $req = $db->prepare("SELECT * FROM orders_files WHERE order_id = :order_id AND side = :side ORDER BY id ");
        $req->execute(array(
            'order_id' => "$order_id",
            'side' => $side
        ));
    }


    $data = $req->fetchall();
    return $data;
}

function xx_shop_client_ref_exist($client_ref) {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare("SELECT * FROM orders WHERE client_ref = :client_ref AND company_id = :u_owner_id ");
    $req->execute(array(
        'client_ref' => "$client_ref",
        'u_owner_id' => "$u_owner_id",
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_client_ref_next() {
    global $db, $u_owner_id;
    $data = null;
    $req = $db->prepare("SELECT MAX(client_ref) FROM orders WHERE company_id = :u_owner_id ");
    $req->execute(array(
        'u_owner_id' => "$u_owner_id",
    ));
    $data = $req->fetchall();

    return $data[0][0] + 1;
}

function shop_vias_list() {
    global $db, $u_owner_id;

    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM orders_vias ORDER BY id ASC");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_express_update($id, $express) {

    global $db, $u_owner_id;
    $req = $db->prepare('UPDATE orders SET express=:express WHERE id=:id AND company_id=:u_owner_id');
    $req->execute(array(
        'id' => $id,
        'u_owner_id' => $u_owner_id,
        'express' => $express,
    ));
}

function shop_labo_users_by_office($office_id) {
    global $db, $u_owner_id;

//    $limit = _options_option("shop_limit_orders");
    $limit = 500;

    $data = null;
    $req = $db->prepare("SELECT c.id, c.name, c.lastname, c.owner_id, u.login, u.rol, u.contact_id as contact_id, u.status FROM `contacts` as c INNER JOIN `users` as u ON c.id = u.contact_id WHERE c.owner_id = :owner_id ORDER BY u.rol, c.name, c.id DESC ");
    //$req = $db->prepare("SELECT c.id, c.name, c.lastname FROM `contacts` as c WHERE c.owner_id = :u_owner_id ORDER BY c.id DESC ");

    $req->execute(array(
        'owner_id' => $office_id
    ));

    $data = $req->fetchall();
    return $data;
}

function shop_labo_employees_by_office($office_id) {
    global $db, $u_owner_id;

    $limit = _options_option("shop_limit_orders");

    $data = null;
    $req = $db->prepare("SELECT c.id, c.name, c.lastname, e.cargo FROM `contacts` as c INNER JOIN `employees` as e ON c.id = e.contact_id WHERE ( c.owner_id = : u_owner_id ) ORDER BY c.id DESC ");
    //$req = $db->prepare("SELECT c.id, c.name, c.lastname FROM `contacts` as c WHERE c.owner_id = :u_owner_id ORDER BY c.id DESC ");

    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));

    $data = $req->fetchall();
    return $data;
}

function shop_labo_adresses_by_office($office_id) {
    global $db, $u_owner_id;

    $limit = _options_option("shop_limit_orders");

    $data = null;
    //$req = $db->prepare("SELECT c.id, c.name, c.lastname, u.owner_id, u.contact_id, u.owner_id FROM `contacts` as c INNER JOIN `users` as u ON c.id = u.contact_id WHERE ( c.owner_id = : u_owner_id ) ORDER BY c.id DESC ");
    $req = $db->prepare("SELECT * FROM `addresses` as a WHERE contact_id = :contact_id ");

    $req->execute(array(
        'contact_id' => $office_id
    ));

    $data = $req->fetchall();
    return $data;
}

function shop_labo_directory_by_office($office_id) {
    global $db, $u_owner_id;

    $limit = _options_option("shop_limit_orders");

    $data = null;
    //$req = $db->prepare("SELECT c.id, c.name, c.lastname, u.owner_id, u.contact_id, u.owner_id FROM `contacts` as c INNER JOIN `users` as u ON c.id = u.contact_id WHERE ( c.owner_id = : u_owner_id ) ORDER BY c.id DESC ");
    $req = $db->prepare("SELECT * FROM `directory` as a WHERE contact_id = :contact_id ");

    $req->execute(array(
        'contact_id' => $office_id
    ));

    $data = $req->fetchall();
    return $data;
}

function shop_check_company_name() {
    global $u_owner_id;
    return (contacts_field_id("name", $u_owner_id) == _options_option("default_company_name")) ? true : false;
}

function shop_offices_where_i_work() {
    global $db, $u_owner_id;

    //$limit = (_options_option("shop_limit_patients"))? _options_option("shop_limit_patients") : 25 ;
    $limit = 1;

    $data = null;
    $req = $db->prepare(
            "SELECT *
FROM contacts
WHERE ( id = :owner_id )
AND type = 1 AND status = 1
ORDER BY name ");
    $req->execute(array(
        'owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_offices_update_name($id, $name) {
    global $db, $u_owner_id;
    $req = $db->prepare('UPDATE `contacts` SET name=:name WHERE id=:id ');

    $req->execute(array(
        'id' => $id,
        'name' => $name
            )
    );
}

function shop_offices_list_of_my_company() {
    global $db, $u_id;

    $limit = (_options_option("shop_limit_patients")) ? _options_option("shop_limit_patients") : 999999;

    $headOffice_id = contacts_work_for($u_id);

    $data = null;

    $req = $db->prepare(
            "SELECT *
FROM contacts
WHERE owner_id IN
(SELECT id FROM contacts WHERE owner_id = :headOffice_id)
AND type = 1
AND status = 1 ORDER BY tva DESC, name
");
    $req->execute(array(
        'headOffice_id' => $headOffice_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_users_password_update($contact_id, $password) {
    global $db;
    $req = $db->prepare('UPDATE users SET password=:password  WHERE contact_id=:u_id ');

    $req->execute(array(
        'u_id' => $contact_id,
        'password' => $password,
            )
    );
}

function shop_stats_orders_by_offices($office_id) {
    global $db, $u_id;

    $headOffice_id = contacts_work_for($u_id);

    $data = null;

    $req = $db->prepare(
            "SELECT code, SUM(quantity) as quantity, count(price) as price, discounts, invoice_id

FROM invoice_lines

WHERE invoice_id IN (SELECT id FROM invoices WHERE client_id = :office_id)

GROUP BY code ");

    $req->execute(array(
        //'headOffice_id' => $headOffice_id, 
        "office_id" => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_stats_remakes_by_office($office_id) {
    global $db, $u_id;

    $headOffice_id = contacts_work_for($u_id);

    $data = null;

    $req = $db->prepare(
            "SELECT COUNT(remake) as total
FROM orders
WHERE company_id IN (SELECT id FROM contacts WHERE owner_id = :headOffice_id)
AND company_id = :office_id ");

    $req->execute(array(
        'headOffice_id' => $headOffice_id,
        "office_id" => $office_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_stats_remakes_motifs_by_office_year_month($office_id, $year, $month) {
    global $db, $u_id;

    $headOffice_id = contacts_work_for($u_id);

    $data = null;

    $req = $db->prepare(
            "SELECT COUNT(ore.motif_id) as total, ore.motif_id

FROM orders_remake as ore JOIN orders as o ON o.id = ore.order_id

WHERE ore.order_id IN (SELECT id FROM orders WHERE company_id = :office_id) AND

( EXTRACT(MONTH FROM o.date) = :month AND EXTRACT(YEAR FROM o.date) = :year )


GROUP BY ore.motif_id ORDER BY total DESC

");

    $req->execute(array(
        //'headOffice_id' => $headOffice_id, 
        "office_id" => $office_id,
        "year" => $year,
        "month" => $month
    ));
    $data = $req->fetchall();
    return $data;
}

//******************************************************************************
function shop_stats_invoices_by_offices($office_id, $year, $month) {
    global $db, $u_id;

    $headOffice_id = contacts_work_for($u_id);

    $data = null;

    $req = $db->prepare(
            "SELECT il.code, SUM(il.quantity) as quantity, SUM(il.price) as subtotal, il.discounts, il.invoice_id, i.date_registre

FROM invoices as i JOIN invoice_lines as il ON i.id = il.invoice_id

WHERE il.invoice_id IN (SELECT id FROM invoices WHERE client_id = :office_id) AND

( EXTRACT(MONTH FROM i.date_registre) = :month AND EXTRACT(YEAR FROM i.date_registre) = :year )

GROUP BY code ORDER BY quantity DESC ");

    $req->execute(array(
        //'headOffice_id' => $headOffice_id, 
        "office_id" => $office_id,
        "year" => $year,
        "month" => $month
    ));
    $data = $req->fetchall();
    return $data;
}

# # # 
#PRODUCTS
# # # 

function shop_products_list_by_company() {
    global $db, $u_id;
    $office_headoffice_id = contacts_work_for($u_id);
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
*
FROM `products` as p INNER JOIN `products_stock` as ps ON p.id = ps.product_id
WHERE ps.office_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)
");
    $req->execute(array(
        'u_owner_id' => $office_headoffice_id
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_products($limit = 10) {
    global $db, $u_owner_id;
//    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
*
FROM `products`
ORDER BY id DESC LIMIT $limit
");
    $req->execute(array(
//        'limit'=>$limit
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_products_list_by_status($status) {
    global $db, $u_owner_id;
//    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
*
FROM `products`
WHERE status = :status ORDER BY id DESC
");
    $req->execute(array(
        'status' => $status
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_products_list_by_office() {
    global $db, $u_owner_id;
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
p.company_id, p.contact_id, c.id, c.title, c.type, c.name, c.lastname, c.birthdate
FROM `patients` as p INNER JOIN `contacts` as c ON p.contact_id = c.id
WHERE p.company_id = :u_owner_id ORDER BY p.contact_id DESC
");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_products_search_by_company($txt) {
    global $db, $u_id;
    $office_headoffice_id = contacts_work_for($u_id);
    $limit = _options_option("shop_limit_orders");
    $req = $db->prepare("
SELECT
*
FROM `products` as p INNER JOIN `products_stock` as ps ON p.id = ps.product_id
WHERE ps.office_id IN (SELECT id FROM contacts WHERE owner_id = :u_owner_id)

AND (p.code = :code OR p.category_id = :category_id)



");

    $req->execute(array(
        'u_owner_id' => $office_headoffice_id,
        'code' => $txt,
        'category_id' => $txt
    ));

    $liste_info = $req->fetchall();
    return $liste_info;
}

function shop_product_details($id) {
    global $db;
    $req = $db->prepare('SELECT * FROM products WHERE id=:id ');
    $req->execute(array(
        'id' => $id
    ));
    $data = $req->fetch();
    return $data;
}

function shop_comments_total_by_order($order_id) {
    global $db;

    $data = 0;

//    if ( $id_category ) {
//        $req = $db->prepare('SELECT COUNT(*) FROM orders_categories WHERE category_id= ?') ;
//    } else {
//        $req = $db->prepare('SELECT COUNT(*) FROM orders') ;
//    }

    $req = $db->prepare('SELECT COUNT(*) FROM comments WHERE `doc` = "orders" AND `doc_id` = ? AND `status` = 1 ');

    $req->execute(array($order_id));
    $data = $req->fetchall();

    return $data[0][0];
    //return $order_id ;
}

################################################################################
######### I N V O I C E S ######################################################
################################################################################
// Solo muestra las facturas que no son status 0
//

function shop_invoices_list() {
    global $db, $u_owner_id;

    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoices INNER JOIN invoices_counter on invoices.id = invoices_counter.invoice_id WHERE (client_id = :u_owner_id ) AND status <> 0 ORDER BY id DESC ");
    $req->execute(array(
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_invoices_search_by_id($id) {
    global $db, $u_owner_id;

    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoices WHERE id = :id AND (client_id = :u_owner_id ) ORDER BY id DESC ");
    $req->execute(array(
        'id' => $id,
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_invoices_search_by_status($status) {
    global $db, $u_owner_id;

    $limit = 999;
    $data = null;
    $req = $db->prepare("SELECT * FROM invoices WHERE status = :status AND (client_id = :u_owner_id ) ORDER BY id DESC ");
    $req->execute(array(
        'status' => $status,
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_invoices_total_by_status($status) {
    global $db, $u_owner_id;

    $req = $db->prepare(" SELECT COUNT(*) FROM invoices WHERE status = :status AND (client_id = :u_owner_id ) ");
    $req->execute(array(
        'status' => $status,
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetch();
    return $data[0];
}

/**
 * Muestra facturas de la oficina donde trabajo 
 * 
 * @global type $db
 * @global type $u_id
 * @param type $invoice_id
 * @param type $code
 * @return type
 */
function shop_invoices_details_invoice_code($invoice_id, $code) {

    global $db, $u_id;

    // empresa para la cual trabajo 
    $company_id = contacts_work_for($u_id);

    $req = $db->prepare("
SELECT *
FROM invoices
WHERE (id = :id AND code = :code)
AND client_id = :company_id

");
    $req->execute(array(
        'id' => $invoice_id,
        'code' => $code,
        'company_id' => $company_id
    ));
    $data = $req->fetch();
    return $data;
}

function shop_why_cannot_make_remake_from_order($id) {

    global $u_rol;

    $error = array();

    if (orders_total_remake_by_order($id) >= 3) {
        array_push($error, "You have only 3 remake max.");
    }

    if (orders_field_id("remake", $id)) {
        array_push($error, "You can only remake an order that is not already a remake");
    }

    if (!permissions_has_permission($u_rol, 'shop', "create")) {
        array_push($error, "You do not have permission to remake");
    }

    return $error;
}

################################################################################
######### C R E D I T   N O T E S  #############################################
################################################################################
/**
 * Credit note list 
 * De la empresa donde trabajo 
 * 
 * @global type $db
 * @global type $u_id
 * @return type
 */

function shop_credit_notes_list() {
    global $db;
    global $u_id;

    // la empresa donde trabajo 
    $u_work_for_id = contacts_work_for($u_id);

    $cn = credit_notes_search_by_client_id($u_work_for_id);

    return ($cn) ? $cn : null;
}

function shop_credit_notes_details_credit_notes_code($credit_note_id, $code) {

    global $db, $u_id;

    // empresa para la cual trabajo 
    $company_id = contacts_work_for($u_id);

    $req = $db->prepare("
SELECT *
FROM credit_notes
WHERE (id = :id AND code = :code)
AND client_id = :company_id

");
    $req->execute(array(
        'id' => $credit_note_id,
        'code' => $code,
        'company_id' => $company_id
    ));
    $data = $req->fetch();
    return $data;
}

function shop_credit_notes_search_by_status($status) {
    global $db, $u_id;

    // empresa para la cual trabajo 
    $company_id = contacts_work_for($u_id);

    $data = credit_notes_search_by_client_status($company_id, $status);

    return $data;
}

function shop_credit_notes_search_by_id($id) {
    global $db, $u_id;

    // empresa para la cual trabajo 
    $company_id = contacts_work_for($u_id);

    $data = credit_notes_search_by_client_credit_note_id($company_id, $id);

    return $data;
}

function shop_credit_notes_total_by_status($status) {
    global $db, $u_owner_id;

    $req = $db->prepare(" SELECT COUNT(*) FROM credit_notes WHERE status = :status AND (client_id = :u_owner_id ) ");
    $req->execute(array(
        'status' => $status,
        'u_owner_id' => $u_owner_id
    ));
    $data = $req->fetch();
    return $data[0];
}

function shop_address_block($address_id, $contact_id) {
    global $db;
    $req = $db->prepare('UPDATE `addresses` SET status=:status  WHERE id=:id AND (contact_id=:contact_id ) ');

    $req->execute(array(
        'id' => $address_id,
        'contact_id' => $contact_id,
        'status' => 0,
            )
    );
}

function shop_address_unblock($address_id, $contact_id) {
    global $db;
    $req = $db->prepare('UPDATE `addresses` SET status=:status  WHERE id=:id AND (contact_id=:contact_id ) ');

    $req->execute(array(
        'id' => $address_id,
        'contact_id' => $contact_id,
        'status' => 1,
            )
    );
}

//function shop_address_delete($id, $contact_id) {
//    global $db;
//    $req = $db->prepare(
//            "DELETE FROM `addresses`
//             WHERE contact_id = :contact_id AND id = :id ");
//
//
//    $req->execute(array(
//        'id' => $id,
//        'contact_id' => $contact_id
//    ));
//
//    //die("$u_owner_id, $name, $data");
//}


function shop_logs($a, $doc_id) {
    global $db;

    $req = $db->prepare(" SELECT *  FROM logs  WHERE c=:c AND a=:a AND doc_id = :doc_id ORDER BY date DESC  ");
    $req->execute(array(
        'c' => "shop",
        'a' => $a,
        'doc_id' => $doc_id
    ));
    $data = $req->fetchall();
    return $data;
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
// ANY_VALUE
// ANY_VALUE
// ANY_VALUE
// ANY_VALUE
// ANY_VALUE
// ANY_VALUE
function shop_comments_list_orders_by_company() {
    global $db, $u_owner_id;

    $office_headoffice_id = offices_headoffice_of_office($u_owner_id);

    $data = null;
    $req = $db->prepare(
            "
            SELECT `doc_id`, ANY_VALUE(`date`), `doc` 
            FROM `comments` 
            WHERE  `doc` = :doc AND doc_id IN (SELECT id FROM `orders` WHERE status >=10 AND status <=100 AND company_id IN (SELECT id FROM contacts WHERE owner_id =:u_owner_id) )
            GROUP BY (`doc_id`) 
            ORDER BY MAX(`date`) desc  ");

    $req->execute(array(
        "doc" => 'orders',
        "u_owner_id" => $office_headoffice_id
    ));
    $data = $req->fetchall();
    return $data;
}

// ANY_VALUE
function shop_comments_list_orders_by_office() {
    global $db, $u_owner_id;

    $data = null;
    $req = $db->prepare(
            "
            SELECT `doc_id`, ANY_VALUE(`date`), `doc` 
            FROM `comments` 
            WHERE  `doc` = :doc AND doc_id IN (SELECT id FROM `orders` WHERE status >=10 AND status <=100 AND company_id = :u_owner_id )
            GROUP BY (`doc_id`) 
            ORDER BY MAX(`date`) desc  ");

    $req->execute(array(
        "doc" => 'orders',
        "u_owner_id" => $u_owner_id
    ));
    $data = $req->fetchall();
    return $data;
}

function shop_comments_has_unread_by_contact($contact_id) {

    global $u_id;

    if (users_can_see_others_offices($u_id)) {
// si puedo ver la empresa 
        foreach (shop_comments_list_orders_by_company() as $comments_doc_line) {
            $last_read = comments_read_date_read_by_contact_order($contact_id, $comments_doc_line['doc_id']);
            $last_date_from_comments = comments_date_last_comment_by_order('orders', $comments_doc_line['doc_id']);

            if ($last_read < $last_date_from_comments) {
                return TRUE;
            }
        }
    } else {
// si puedo ver la officina 
        foreach (shop_comments_list_orders_by_office() as $comments_doc_line) {
            $last_read = comments_read_date_read_by_contact_order($contact_id, $comments_doc_line['doc_id']);
            $last_date_from_comments = comments_date_last_comment_by_order('orders', $comments_doc_line['doc_id']);

            if ($last_read < $last_date_from_comments) {
                return TRUE;
            }
        }
    }
    return false;
}

/**
 * Este user puede ver las otras oficnas de su empresa?
 * @param type $contact_id
 * @return type bool 
 */
function users_can_create_others_offices($u_id) {
    $rol = users_rol_according_contact_id($u_id);
    return (permissions_has_permission($rol, "shop_offices_others", "create")) ? true : false;
}

function users_can_see_others_offices($u_id) {
    $rol = users_rol_according_contact_id($u_id);
    return (permissions_has_permission($rol, "shop_offices_others", "read")) ? true : false;
}

function users_can_update_others_offices($u_id) {
    $rol = users_rol_according_contact_id($u_id);
    return (permissions_has_permission($rol, "shop_offices_others", "update")) ? true : false;
}

function shop_agenda_places_dates_update($id, $date) {

    global $db;
    $req = $db->prepare(" UPDATE `agenda_places_dates` SET `date`=:date WHERE id=:id ");
    $req->execute(array(
        "id" => $id,
        "date" => $date
    ));
}

/**
 * Agrupado por direccion
 * @global type $db
 * @param type $field
 * @param type $txt
 * @param type $start
 * @param type $limit
 * @return type
 */
function shop_agenda_places_dates_search_by_address($field, $txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `agenda_id`,  `address_id`,  `date`,  `time`,  `time_end`,  `date_end`,  `order_by`,  `status`    FROM `agenda_places_dates` 
    WHERE `$field` = '$txt' 
    GROUP BY `address_id`
    ORDER BY `order_by` DESC, `id` DESC
    Limit  $limit OFFSET $start
       
";
    $query = $db->prepare($sql);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function shop_agenda_places_dates_search_without_date($agenda_id, $address_id, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT `id`,  `agenda_id`,  `address_id`,  `date`,  `time`,  `time_end`,  `date_end`,  `order_by`,  `status`    FROM `agenda_places_dates` 
    WHERE `agenda_id` = :agenda_id AND address_id = :address_id 
    AND date IS NOT NULL 
    ORDER BY `order_by` DESC, `id` DESC
    Limit  $limit OFFSET $start
       
";
    $query = $db->prepare($sql);
    $query->execute(array(
        "agenda_id" => $agenda_id,
        "address_id" => $address_id
    ));
    $data = $query->fetchall();
    return $data;
}

#########################################################################
#########################################################################
#########################################################################
#########################################################################

function shop_agenda_details($id) {
    global $db;
    $req = $db->prepare('SELECT * FROM agenda WHERE id=:id ');
    $req->execute(array(
        'id' => $id
    ));
    $data = $req->fetch();
    return $data;
}
