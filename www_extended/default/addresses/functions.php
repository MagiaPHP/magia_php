<?php

// plugin = addresses
// creation date : 
// 
// 
//function addresses_field_id($field, $id) {
//    global $db;
//    $data = null;
//    $req = $db->prepare(
//            "SELECT $field 
//            
//            FROM addresses WHERE id= ?");
//    $req->execute(array($id));
//    $data = $req->fetch();
//    //return $data[0];
//    return (isset($data[0])) ? $data[0] : false;
//}

//function addresses_search_by_unique($field, $FieldUnique, $valueUnique) {
//    global $db;
//    $data = null;
//    $req = $db->prepare(
//            "SELECT $field 
//             
//            FROM banks WHERE $FieldUnique = ?");
//    $req->execute(array($valueUnique));
//    $data = $req->fetch();
//    //return $data[0];
//    return (isset($data[0])) ? $data[0] : false;
//}

//function addresses_list($start = 0, $limit = 999) {
//    global $db;
//
//    $sql = "SELECT 
//            addresses.id, 
//            addresses.contact_id ,
//            addresses.name,
//            addresses.address,
//            addresses.number,
//            addresses.postcode,
//            addresses.barrio,
//            addresses.sector,
//            addresses.ref,
//            addresses.city,
//            addresses.province,
//            addresses.region,
//            addresses.country,
//            addresses.code,
//            addresses.status,
//            addresses_transport.addresses_id,
//            addresses_transport.transport_code as transport_code,
//            addresses_transport.transport_ref as transport_ref
//            FROM addresses 
//            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
//            
//            ORDER BY addresses.id DESC  Limit :limit OFFSET :start  ";
//
//    $query = $db->prepare($sql);
//    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
//    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
//    $query->execute();
//    $data = $query->fetchall();
//    return $data;
//}

//function addresses_details($id) {
//    global $db;
//    $req = $db->prepare(
//            "SELECT 
//            addresses.id, 
//            addresses.contact_id ,
//            addresses.name,
//            addresses.address,
//            addresses.number,
//            addresses.postcode,
//            addresses.barrio,
//            addresses.sector,
//            addresses.ref,
//            addresses.city,
//            addresses.province,
//            addresses.region,
//            addresses.country,
//            addresses.code,
//            addresses.status,
//            addresses_transport.addresses_id,
//            addresses_transport.transport_code,
//            addresses_transport.transport_ref
//            FROM addresses 
//            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
//            
//            WHERE addresses.id= ? ");
//    $req->execute(array($id));
//    $data = $req->fetch();
//    return $data;
//}

//function addresses_delete($id) {
//    global $db;
//    $req = $db->prepare("DELETE FROM addresses WHERE id=? ");
//    $req->execute(array($id));
//}

function xxxaddresses_edit($id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status) {

    global $db;
    $req = $db->prepare("


UPDATE `addresses` SET 
`contact_id` = :contact_id, 
`name` = :name, 
`address` = :address, 
`number` = :number, 
`postcode` = :postcode, 
`barrio` = :barrio,
`ref` = :ref, 
`city` = :city, 
`province` = :province, 
`region` = :region, 
`country` = :country, 
`status` = :status 
WHERE `addresses`.`id` = :id          


");
    $req->execute(array(
        "id" => $id,
        "contact_id" => $contact_id,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "postcode" => $postcode,
        "barrio" => $barrio,
        "ref" => $ref,
        "city" => $city,
        "province" => $province,
        "region" => $region,
        "country" => $country,
        "status" => $status
    ));

//    vardump($req->errorInfo());
//
//    vardump(array("id" => $id,
//        "contact_id" => $contact_id,
//        "name" => $name,
//        "address" => $address,
//        "number" => $number,
//        "postcode" => $postcode,
//        "barrio" => $barrio,
//        "ref" => $ref,
//        "city" => $city,
//        "province" => $province,
//        "region" => $region,
//        "country" => $country,
//        "code" => magia_uniqid(),
//        "status" => $status));
//
//    die();
}

function xxxaddresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status) {
    global $db;
    $req = $db->prepare(
            " INSERT INTO `addresses` ( `id` ,   `contact_id` ,   `name` ,   `address` ,   `number` ,   `postcode` ,   `barrio` , `ref`,  `city` , `province`,  `region` ,   `country`,  `code`,   `status`   ) VALUES  "
            . "(:id ,  :contact_id ,  :name ,  :address ,  :number ,  :postcode ,  :barrio , :ref, :city, :province, :region ,  :country , :code,  :status   ) ");

    $req->execute(array(
        "id" => null,
        "contact_id" => $contact_id,
        "name" => $name,
        "address" => $address,
        "number" => $number,
        "postcode" => $postcode,
        "barrio" => $barrio,
        "ref" => $ref,
        "city" => $city,
        "province" => $province,
        "region" => $region,
        "country" => $country,
        "code" => $code,
        "status" => $status
            )
    );

    return $db->lastInsertId();
}

function xxxaddresses_search($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.sector,
            addresses.ref,
            addresses.city, 
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            
            addresses_transport.addresses_id,
            addresses_transport.transport_code as transport_code,
            addresses_transport.transport_ref as transport_ref
            
            FROM addresses 
            
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            
            WHERE addresses.id =:txt 

            OR contact_id like :txt
            OR name like :txt
            OR address like :txt
            OR number like :txt
            OR postcode like :txt
            OR barrio like :txt
            OR sector like :txt
            OR ref like :txt
            OR city like :txt
            OR province like :txt
            OR region like :txt
            OR country like :txt
            OR status like :txt
            OR transport_code like :txt
            OR transport_ref like :txt

            ORDER BY contact_id, city, barrio, postcode, address  
            Limit :limit OFFSET :start

";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function addresses_search_by_country($country, $start = 0, $limit = 999) {
    global $db;
    $data = null;

    $sql = "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code as transport_code,
            addresses_transport.transport_ref as transport_ref
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            
            WHERE country =:country 
            ORDER BY contact_id, city, barrio, postcode, address 
            Limit :limit OFFSET :start
            ";

    $query = $db->prepare($sql);
    $query->bindValue(':country', $country, PDO::PARAM_STR);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

function xxxaddresses_select($k, $v, $selected = "", $disabled = array()) {
    $c = "";
    foreach (addresses_list() as $key => $value) {
        $s = ($selected == $value[$k]) ? " selected  " : "";
        $d = ( in_array($value[$k], $disabled)) ? " disabled " : "";
        $c .= "<option value=\"$value[$k]\" $s $d >" . ucfirst($value[$v]) . "</option>";
    }
    echo $c;
}

function addresses_search_if_exist($contact_id, $name, $number, $address, $postcode, $country) {
    global $db;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses 
            WHERE 
            contact_id =:contact_id AND 
            name =:name AND 
            number =:number AND 
            address =:address AND 
            postcode =:postcode AND 
            country =:country
            ORDER BY contact_id, city, barrio, postcode, address 
            
            ");
    $req->execute(array(
        "contact_id" => $contact_id,
        "name" => $name,
        "number" => $number,
        "address" => $address,
        "postcode" => $postcode,
        "country" => $country
    ));
    $data = $req->fetchall();
    return $data;
}

/**
 * Muestra en un panel la direccion que le pasamos como json
 * @param type $id
 */
function addresses_show_panel($addresses_json) {
    $addresses = (is_json($addresses_json)) ? json_decode($addresses_json, true) : [];

    if ($addresses) {
        include view("addresses", "panel");
    } else {
        include view("addresses", "panel_noAddress");
    }
}

function addresses_format($key, $value) {

    if ($value == null || $value == false || $value == "") {
        return $value;
    }

    switch ($key) {
        case 'name':
            $res = ucfirst(strtolower(clean($value)));
            break;
        case 'address':
        case 'number':
        case 'postcode':
        case 'barrio':
        case 'ref':
        case 'sector':
        case 'city':
        case 'province':
        case 'region':
        case 'country':
        case 'status':
            $res = ucfirst(strtoupper(clean($value)));
            break;
        default:
            break;
    }
    return $res;
}

/**
 * 
 * @param type $addresses_json
 */
function addresses_show_formated($addresses_json) {
    $addresses = json_decode($addresses_json, true);

    if ($addresses) {
        include view("addresses", "formated");
    } else {
        include view("addresses", "formated_error");
    }
}

function addresses_formated_html($addresses_json) {
    $address_html = null;

    // Verificar si la entrada es JSON válida
    if (isset($addresses_json) && is_json($addresses_json)) {

        // Decodificar el JSON en un array asociativo
        $add = json_decode($addresses_json, true);

        // Obtener cada campo con un valor predeterminado si no existe
        $number = isset($add['number']) ? htmlspecialchars($add['number']) : '';
        $address = isset($add['address']) ? htmlspecialchars($add['address']) : '';
        $postcode = isset($add['postcode']) ? htmlspecialchars($add['postcode']) : '';
        $barrio = isset($add['barrio']) ? htmlspecialchars($add['barrio']) : '';
        $city = isset($add['city']) ? htmlspecialchars($add['city']) : '';
        $country = isset($add['country']) ? countries_country_by_country_code($add['country']) : '';

        // Formatear la dirección sin añadir comas o espacios innecesarios
        $address_html = trim("$number, $address");
        if ($address_html) {
            $address_html .= "<br>";
        }

        // Formatear la segunda línea si hay código postal y barrio
        $second_line = trim("$postcode $barrio");
        if ($second_line) {
            $address_html .= "$second_line<br>";
        }

        // Agregar ciudad y país si están disponibles
        $third_line = trim("$city $country");
        if ($third_line) {
            $address_html .= "$third_line<br>";
        }
    }

    // Retornar la dirección formateada en HTML, o null si no se pudo generar
    return $address_html;
}

function addresses_search_by_contact_id($contact_id, $name = "all") {
    global $db;

    $data = null;

    // si mando a buscar todos los tipos de address
    if ($name == "all") {
        $req = $db->prepare(
                'SELECT * 
                FROM addresses         
                WHERE contact_id = :contact_id ');

        $req->execute(array(
            'contact_id' => $contact_id
        ));
    } else {
        $req = $db->prepare(
                'SELECT * 
                FROM addresses
                
                WHERE contact_id = :contact_id AND name = :name  ');
        $req->execute(array(
            'contact_id' => "$contact_id",
            'name' => "$name"
        ));
    }

    $data = $req->fetchall();
    return $data;
}

function addresses_del($id) {
    global $db;
    $req = $db->prepare('DELETE FROM addresses WHERE id=?');
    $req->execute(array($id));
}

function addresses_name() {
    //return array("Delivery", "Billing", "Other");
    return array("Billing", "Delivery");
}

function addresses_billing_by_contact_id($contact_id) {
    global $db;

    $limit = 1;

    $data = null;

    $req = $db->prepare(
            "SELECT * 
            
            FROM addresses              
            
            WHERE (contact_id=:contact_id ) AND name = 'Billing'  ");

    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_billing_list_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT 
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code
            FROM addresses 
            LEFT JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            WHERE (contact_id=:contact_id ) AND name = 'Billing'  
            
            ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM `addresses`  
            
            WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_delivery_search_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT  
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code
            FROM `addresses`  
            JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_search_by_contact_id_status($contact_id, $status) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT  
            addresses.id, 
            addresses.contact_id ,
            addresses.name,
            addresses.address,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            addresses_transport.addresses_id,
            addresses_transport.transport_code
            FROM `addresses`  
            JOIN addresses_transport ON addresses.id = addresses_transport.addresses_id
            WHERE (addresses.contact_id=:contact_id ) AND addresses.name = 'Delivery' AND addresses.status =:status  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'status' => $status
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_delivery_list_by_contact_id($contact_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            
            WHERE (contact_id=:contact_id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id
    ));
    $data = $req->fetchall();
    return $data;
}

function addresses_array_to_json($address) {
    // Validamos si $address es un array o un objeto
    if (is_array($address) || is_object($address)) {
        // Intentamos codificar el array en JSON
        $json = json_encode($address);

        // Verificamos si ocurrió un error durante la codificación
        if (json_last_error() !== JSON_ERROR_NONE) {
            // Si hay un error, registramos o manejamos el error
            error_log('Error al codificar JSON: ' . json_last_error_msg());

            // Retornamos un array vacío en caso de error
            return json_encode([]);
        }

        // Si todo va bien, retornamos el JSON codificado
        return $json;
    }

    // Si $address no es un array u objeto, retornamos un JSON vacío
    return json_encode([]);
}

function addresses_json_to_array($address) {
    // Verificar si la dirección es un JSON válido
    if ($address && is_json($address)) {
        // Decodificar el JSON en un array asociativo
        $decoded_address = json_decode($address, true);

        // Verificar si hubo algún error durante la decodificación
        if (json_last_error() === JSON_ERROR_NONE) {
            return $decoded_address;
        } else {
            // Si hay un error de decodificación, registrar el error
            error_log('Error al decodificar JSON: ' . json_last_error_msg());
        }
    }

    // Retornar un array vacío si el JSON no es válido o si no hay datos
    return [];
}

function addresses_field_from_array($field, $address_array) {
    // Verifica si el campo existe en el array y no es null
    return isset($address_array[$field]) ? $address_array[$field] : null;
}

function addresses_list_distincts_countries() {
    global $db;
    $data = null;
    $req = $db->prepare("SELECT distinct(country) as country FROM addresses ORDER BY country  ");
    $req->execute(array());
    $data = $req->fetchall();

    return (isset($data)) ? $data : false;
}

function addresses_billing_by_contact_id_and_addresse_id($contact_id, $addresse_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            
            WHERE (contact_id=:contact_id AND id = :id ) AND name = 'Billing'  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'id' => $addresse_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_delivery_by_contact_id_and_addresse_id($contact_id, $addresse_id) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            
            WHERE (contact_id=:contact_id AND id = :id ) AND name = 'Delivery'  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'id' => $addresse_id
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_by_contact_id_and_name($contact_id, $name) {
    global $db;

    $limit = 1;
    $data = null;
    $req = $db->prepare(
            "SELECT * 
            FROM addresses  
            WHERE (contact_id=:contact_id ) AND name = :name  ");
    $req->execute(array(
        'contact_id' => $contact_id,
        'name' => $name
    ));
    $data = $req->fetch();
    return $data;
}

function addresses_push_by_contact_id($id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status) {
    // Consultar si existe una dirección con el mismo contact_id y nombre
    $existing_address = addresses_by_contact_id_and_name($contact_id, $name);

    if ($existing_address) {
        // Si la dirección ya existe, editarla
        $id = $existing_address['id'];
        addresses_edit($id, $contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $status);
    } else {
        // Si no existe, agregar una nueva dirección
        $code = magia_uniqid(); // Generar un código único para la nueva dirección

        addresses_add($contact_id, $name, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code, $status);

        // Obtener el ID de la nueva dirección recién agregada
        $id = addresses_field_code('id', $code);
    }

    return $id; // Retorna el ID de la dirección (nueva o actualizada)
}

function addresses_block($address_id, $contact_id) {
    global $db;
    $req = $db->prepare('UPDATE `addresses` SET status=:status  WHERE id=:id AND (contact_id=:contact_id ) ');

    $req->execute(array(
        'id' => $address_id,
        'contact_id' => $contact_id,
        'status' => 0,
            )
    );
}

function addresses_unblock($address_id, $contact_id) {
    global $db;
    $req = $db->prepare('UPDATE `addresses` SET status=:status  WHERE id=:id AND (contact_id=:contact_id ) ');

    $req->execute(array(
        'id' => $address_id,
        'contact_id' => $contact_id,
        'status' => 1,
            )
    );
}

function addresses_countries_list($name) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT DISTINCT(country) FROM addresses WHERE name = :name ');
    $req->execute(array(
        'name' => $name
    ));
    $data = $req->fetchall();

    return $data;
}

function addresses_total_by_countries($country) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT COUNT(country) FROM addresses WHERE country = :country ');
    $req->execute(array(
        'country' => $country
    ));
    $data = $req->fetch();

    return $data[0];
}

function addresses_contacts_list_by_country($country) {
    global $db;

    $data = null;

    $req = $db->prepare('SELECT DISTINCT(contact_id) FROM addresses WHERE country = :country ');
    $req->execute(array(
        'country' => $country
    ));
    $data = $req->fetchall();

    return $data;
}


function addresses_search_full($txt, $start = 0, $limit = 999) {
    global $db;
    $data = null;
    $sql = "SELECT 
            addresses.id as addresses_id, 
            addresses.contact_id as addresses_contact_id ,
            addresses.name as addresses_name,
            addresses.address ,
            addresses.number,
            addresses.postcode,
            addresses.barrio,
            addresses.sector,
            addresses.ref,
            addresses.city,
            addresses.province,
            addresses.region,
            addresses.country,
            addresses.code,
            addresses.status,
            
            
            contacts.id,
            contacts.name
            
            FROM addresses 
            
            INNER JOIN contacts ON addresses.contact_id = contacts.id
            
            WHERE 
               addresses.id =:txt 
            OR addresses.contact_id like :txt
            OR addresses.name like :txt
            OR addresses.address like :txt
            OR addresses.number like :txt
            OR addresses.postcode like :txt
            OR addresses.barrio like :txt
            OR addresses.sector like :txt
            OR addresses.ref like :txt
            OR addresses.city like :txt
            OR addresses.province like :txt            
            OR addresses.region like :txt
            OR addresses.country like :txt
            OR addresses.status like :txt
           
            
            OR contacts.name like :txt

            ORDER BY city, barrio, postcode, address  
            
            Limit :limit OFFSET :start

";
    $query = $db->prepare($sql);
    $query->bindValue(':txt', "%$txt%", PDO::PARAM_STR);
    $query->bindValue(':limit', (int) $limit, PDO::PARAM_INT);
    $query->bindValue(':start', (int) $start, PDO::PARAM_INT);
    $query->execute();
    $data = $query->fetchall();
    return $data;
}

//function addresses_is_id($id) {
//    return (is_id($id)) ? true : false;
//}
//
//function addresses_is_contact_id($contact_id) {
//    return (is_id($contact_id)) ? true : false;
//}
//
//function addresses_is_name($name) {
//    return ($name == "Billing" || $name == "Delivery" ) ? false : false;
//}
//
//function addresses_is_address($address) {
//    return (is_string($address) && strlen($address) < 250 ) ? true : false;
//}
//
//function addresses_is_number($number) {
//    return (is_string($number) && strlen($number) < 50) ? true : false;
//}
//
//function addresses_is_postcode($postcode) {
//    return (is_string($postcode) && strlen($postcode) < 10 ) ? true : false;
//}
//
//function addresses_is_barrio($barrio) {
//    return (is_string($barrio) && strlen($barrio) < 50 ) ? true : false;
//}
//
//function addresses_is_sector($sector) {
//    return (is_string($sector) && strlen($sector) < 250 ) ? true : false;
//}
//
//function addresses_is_ref($ref) {
//    return (is_string($ref)) ? true : false;
//}
//
//function addresses_is_city($city) {
//    return (is_string($city) && strlen($city) < 50 ) ? true : false;
//}
//
//function addresses_is_province($province) {
//    return (is_string($province) && strlen($province) < 250 ) ? true : false;
//}
//
//function addresses_is_region($region) {
//    return (is_string($region) && strlen($region) < 50 ) ? true : false;
//}
//
//function addresses_is_country($countryCode) {
//    return (countries_is_countryCode($countryCode) ) ? true : false;
//}
//
//function addresses_is_status($status) {
//    return ($status == 1 || $status == 0 ) ? true : false;
//}
//function addresses_field_code($field, $code) {
//    global $db;
//    $data = null;
//    $req = $db->prepare(
//            "SELECT $field 
//            
//            FROM addresses WHERE code= ?");
//    $req->execute(array($code));
//    $data = $req->fetch();
//    //return $data[0];
//    return (isset($data[0])) ? $data[0] : false;
//}
//function addresses_is_format_ok($data, $val) {
//
//    $res = false;
//
//    switch (strtolower($data)) {
//        case 'name':
//            $res = addresses_is_name($val);
//            break;
//
//        case 'address':
//            $res = addresses_is_address($val);
//            break;
//
//        case 'number':
//            $res = addresses_is_number($val);
//            break;
//
//        case 'postcode':
//            $res = addresses_is_postcode($val);
//            break;
//
//        case 'barrio':
//            $res = addresses_is_barrio($val);
//            break;
//
//        case 'sector':
//            $res = addresses_is_sector($val);
//            break;
//
//        case 'ref':
//            $res = addresses_is_ref($val);
//            break;
//
//        case 'city':
//            $res = addresses_is_city($val);
//            break;
//
//        case 'province':
//            $res = addresses_is_province($val);
//            break;
//
//        case 'region':
//            $res = addresses_is_region($val);
//            break;
//
//        case 'country':
//            $res = addresses_is_country($val);
//            break;
//
//        default:
//            break;
//    }
//
//    return $res;
//}
////////////////////////////////////////////////////////////////////////////////
function addresses_list_by_contact_id($contact_id) {
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
            ref, 
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

// ALTER TABLE `addresses_transport` ADD `transport_ref` VARCHAR(250) NULL DEFAULT NULL AFTER `transport_code`; 

