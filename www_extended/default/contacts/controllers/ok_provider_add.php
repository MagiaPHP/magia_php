<?php

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Agrega un contacto y a la vez un provehedor
 * 
 * Esto registra la sede, 
 * una vez registrada esta oficina se debe aun actualizar el propietario 
 * su misma id es su propietario, esto es lo que le comvierte en sede 
 * buscar el TVA para encontrar el id y actulizar
 * se agrega como user el contacto
 */
# contacto
$title = (!empty($_POST['title'])) ? clean($_POST['title']) : null;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : "-";
$lastname = (!empty($_POST['lastname'])) ? clean($_POST['lastname']) : "-";
///
$year = (!empty($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (!empty($_POST['month'])) ? clean($_POST['month']) : 01;
$day = (!empty($_POST['day'])) ? clean($_POST['day']) : 01;
$birthdate = "$year-$month-$day";
///

$position = (!empty($_POST['position'])) ? clean($_POST['position']) : "Employee";
$ref = (!empty($_POST['ref'])) ? clean($_POST['ref']) : "ref";
// idioma por defecto 
$language = ( _options_option("config_system_lang_default") ) ? _options_option("config_system_lang_default") : "gb_GB";

# Empresa
//$type = (!empty($_POST['type'])) ? clean($_POST['type']) : false;
$type = 1;
// $owner_id = (!empty($_POST['owner_id'])) ? clean($_POST['owner_id']) : _options_option("default_id_company") ;
$owner_id = NULL;
$companyName = ($_POST['companyName']) ? clean($_POST['companyName']) : "Company Name";
$tva = (!empty($_POST['tva'])) ? clean($_POST['tva']) : null;
# direccion
//$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false ;
$addressName = "Billing";
$address = (isset($_POST['address']) && $_POST['address'] != '' ) ? clean($_POST['address']) : '-';
$number = (isset($_POST['number']) && $_POST['number'] != '' ) ? clean($_POST['number']) : '-';
$postcode = (isset($_POST['postcode']) && $_POST['postcode'] != '' ) ? clean($_POST['postcode']) : '0000';
$barrio = (isset($_POST['barrio']) && $_POST['barrio'] != '' ) ? clean($_POST['barrio']) : '-';
$ref = (isset($_POST['ref']) && $_POST['ref'] != '' ) ? clean($_POST['ref']) : '';
$sector = (isset($_POST['sector']) && $_POST['sector'] != '' ) ? clean($_POST['sector']) : '';
$city = (isset($_POST['city']) && $_POST['city'] != '' ) ? clean($_POST['city']) : '-';
$province = (isset($_POST['province']) && $_POST['province'] != '' ) ? clean($_POST['province']) : '';
$region = (isset($_POST['region']) && $_POST['region'] != '' ) ? clean($_POST['region']) : '-';
$country = (isset($_POST['country']) && $_POST['country'] != '' ) ? clean($_POST['country']) : false;
//
$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
# System
$rol = (!empty($_POST['rol'])) ? clean($_POST['rol']) : rols_by_rango_min();
$email = (!empty($_POST['email'])) ? clean($_POST['email']) : false;
$password = (!empty($_POST['password'])) ? clean($_POST['password']) : "A1" . magia_uniqid();
// redireccion
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : null;
// codifico la clave
$password = password_hash($password, PASSWORD_DEFAULT);
//

$status = 1;
$order_by = 1;

$code1 = magia_uniqid();
$code2 = magia_uniqid();
$code3 = magia_uniqid();
$code4 = magia_uniqid();
$code5 = magia_uniqid();
$code6 = magia_uniqid();

// Verifico los datos obligatorios 
################################################################################
if (!$companyName) {
    array_push($error, '$companyName is mandatory');
}
if (!$tva) {
    array_push($error, '$tva is mandatory');
}

//if (!$address) {
//    array_push($error, '$address is mandatory');
//}
//if (!$city) {
//    array_push($error, '$city is mandatory');
//}
//if (!$name) {
//    array_push($error, 'Name is mandatory');
//}
//if (!$lastname) {
//    array_push($error, '$lastname is mandatory');
//}
//if ( ! $email ) {
//    array_push($error , '$email not send') ;
//}
if (!$password) {
    array_push($error, '$password is mandatory');
}
################################################################################
// si el tva existe, error
if (contacts_search_tva($tva)) {
    array_push($error, "TVA already exists");
}
// si el email del usuario existe, error 
if ($email && users_according_email($email)) {
    array_push($error, "Email already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {


    /**
     * Agrego la empresa, 
     * Agrego el idioma de esa compania, 
     * Agrego el contacto
     * agrego el contact como empleado ()
     * agrego el email en el directorio del contacto
     * agrego este empleado como usuario (users) con el rol dado 
     * agrego la direccion de la empresa
     */
    /**
     * Actualizar el propietario al agregar una compania
     */
    contacts_add(
            //$owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status
            $owner_id, 1, null, $companyName, null, "1900-01-01", $tva, $code1, 1, 1
    );

    $lastCompanyId = contacts_field_code("id", $code1);

    // actualizo el idioma con el idioma por defecto del sistema
    contacts_update_language($lastCompanyId, config_system_lang_default());

    if ($lastCompanyId) {
        // actualizo el propietario 
        contacts_update_owner_id(
                $lastCompanyId, $lastCompanyId
        );

        // agrego el contacto (Manager) 
        contacts_add(
                $lastCompanyId, 0, $title, $name, $lastname, $birthdate, null, $code2, 1, 1
        );

        $lastContactId = contacts_field_code("id", $code2);

        // actualizo el idioma con el idioma por defecto del sistema
        contacts_update_language($lastContactId, config_system_lang_default());

        // Directory
        $validDirectoryNames = array_column(directory_names_list(), 'name');
        foreach ($directory as $key => $value) {
            if (in_array($value['name'], $validDirectoryNames)) {
                directory_add($lastCompanyId, null, $value['name'], $value['data'], magia_uniqid(), 1, 1);
            }
        }

        $lastInsertDirectory = directory_field_code("id", $code3);

        // agrego como empleado 
        if ($lastContactId) {
            employees_add(
                    //$company_id , $contact_id , $owner_ref , $date , $cargo , $order_by , $status
                    $lastCompanyId, $lastContactId, $ref, null, 'Manager', 1, 1
            );
        }

        // Agrego la direccion de facturacin
        if ($lastCompanyId) {
            addresses_add(
                    $lastCompanyId, 'Billing', $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code4, $status
            );
        }
        //
        if ($lastCompanyId) {
            addresses_add(
                    $lastCompanyId, 'Delivery', $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code5, $status
            );
        }

        if (employees_by_company_contact($lastCompanyId, $lastContactId) && $email) {
            users_add($lastContactId, 'en_GB', $rol, $email, $password, $email, magia_uniqid(), 1);
        }

        /////////////////////////////////////////////////////////////////////////
        /////////////////////////////////////////////////////////////////////////
        // Provider
        /////////////////////////////////////////////////////////////////////////
        providers_add($lastCompanyId, null, date("Y-m-d"), 0, 1, 1);
    }

    ############################################################################




    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts#1");
            break;
        case 2:
            header("Location: index.php?c=expenses&a=add_10_inv#2");
            break;
        case 3:
            header("Location: index.php?c=expenses&a=add#3");
            break;
        // index.php?c=expenses&a=add
        // se agrega desde expenses 
        // Para nuevo provehedor
        // sin email 
        case 4:
            header("Location: index.php?c=expenses&a=ok_add&provider_id=$lastCompanyId&#4");
            break;

        case 5:
            // Crea una factura con el id del cliente 
            header("Location: index.php?c=invoices&a=ok_add&client_id=$lastCompanyId#5");
            //header("Location: index.php?c=invoices&a=edit&id=$last_invoices_id&#5");
            break;

        case 6:
            // Crea una expense con el id del cliente 
            header("Location: index.php?c=invoices&a=ok_add&client_id=$lastCompanyId#6");
            //header("Location: index.php?c=invoices&a=edit&id=$last_invoices_id&#5");
            break;

        case 7:
            // Crea contacto y lo agrega com provehedor
            header("Location: index.php?c=providers&a=ok_add_short&company_id=$lastCompanyId&redi[redi]=7#7");
            //header("Location: index.php?c=invoices&a=edit&id=$last_invoices_id&#5");
            break;

        default:
            header("Location: index.php?c=contacts");

            break;
    }
} else {

    include view("home", "pageError");
}



