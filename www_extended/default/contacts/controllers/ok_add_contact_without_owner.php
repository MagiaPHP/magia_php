<?php

die(); 

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


/**
 * Esto registra un particuar
 * una vez registrada esta oficina se debe aun actualizar el propietario 
 * su misma id es su propietario, esto es lo que le comvierte en sede 
 * buscar el TVA para encontrar el id y actulizar
 * Agrega como empleado tambien 
 */
# contacto
$title = ( $_POST['title'] != '') ? clean($_POST['title']) : null;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : "Name";
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : "-";
///
$year = (isset($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : 01;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : 01;
$birthdate = "$year-$month-$day";
///

$position = (isset($_POST['position'])) ? clean($_POST['position']) : "Employee";
$ref = (isset($_POST['ref'])) ? clean($_POST['ref']) : "ref";
// idioma por defecto 
$language = ( _options_option("config_system_lang_default") ) ? _options_option("config_system_lang_default") : "gb_GB";

# Empresa
//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$type = 0;
// $owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : _options_option("default_id_company") ;
$owner_id = NULL;
//$companyName = (isset($_POST['companyName']) ) ? clean($_POST['companyName']) : "Company ABC" ;
$companyName = "$name $lastname";
$tva = (isset($_POST['tva'])) ? clean($_POST['tva']) : null;
# direccion
//$name = (isset($_POST['name'])) ? clean($_POST['name']) : false ;
$addressName = "Billing";
$address = (isset($_POST['address'])) ? clean($_POST['address']) : null;
$number = (isset($_POST['number'])) ? clean($_POST['number']) : null;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : null;
$barrio = (isset($_POST['barrio'])) ? clean($_POST['barrio']) : null;
$ref = (isset($_POST['ref'])) ? clean($_POST['ref']) : '';
$city = (isset($_POST['city'])) ? clean($_POST['city']) : null;
$province = (isset($_POST['province'])) ? clean($_POST['province']) : '';
$region = (isset($_POST['region'])) ? clean($_POST['region']) : "null";
$country = (isset($_POST['country'])) ? clean($_POST['country']) : false;
$transport_code = (isset($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
# System
$rol = (isset($_POST['rol'])) ? clean($_POST['rol']) : null;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : null;
//
$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : null;

$password = "A1" . uniqid();
//
$passwordh = password_hash($password, PASSWORD_DEFAULT);

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
    array_push($error, 'Company name is mandatory');
}
//if (!$tva) {
//    //  array_push($error , '$tva not send') ;
//}
//if (!$address) {
//    //   array_push($error , '$address not send') ;
//}
//if (!$city) {
//    //  array_push($error , '$city not send') ;
//}
if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$lastname) {
    array_push($error, 'Lastname is mandatory');
}
//if (!$email) {
//    //  array_push($error , '$email not send') ;
//}
//if (!$password) {
//    //  array_push($error , '$password not send') ;
//}
################################################################################
// si el tva existe, error
//if (contacts_search_tva($tva)) {
//    //  array_push($error , "TVA already exists") ;
//}
//// si el email del usuario existe, error 
//if (users_according_email($email)) {
//    //   array_push($error , "Email already exists") ;
//}
################################################################################
if (!$error) {
    /**
     * Agrego la empresa, 
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
            $owner_id, $office_id, $type, $title, $name, $lastname, $description, $birthdate, $tva, $billing_method, $discounts, $code, $language, $registre_date, $order_by, $status
    );

//    contacts_add(
//            //$owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status
//            $owner_id, 1, null, $companyName, null, "1900-01-01", $tva, $code1, 1, 1
//    );

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

// agredo directorio del contacto 

        if ($email) {
            directory_add(
                    //$contact_id , $address_id , $name , $data , $order_by , $status
                    $lastContactId, null, "Email", $email, $code3, 1, 1
            );
        }



//        $lastInsertDirectory = directory_field_code("id" , $code3) ;
//
        // agrego como empleado 
        if ($lastContactId) {
            employees_add(
                    //$company_id , $contact_id , $owner_ref , $date , $cargo , $order_by , $status
                    $lastCompanyId, $lastContactId, $ref, null, $position, $order_by, $status
            );
        }
        // Agrego la direccion de facturacin
        // Agrego la direccion de facturacin
        // Agrego la direccion de facturacin
        // Agrego la direccion de facturacin
        // Agrego la direccion de facturacin
        // Agrego la direccion de facturacin
        if ($lastCompanyId) {
            addresses_add(
                    $lastCompanyId, $addressName, $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code4, $status
            );
        }



        // agrego la direccion de entregz    
        // agrego la direccion de entregz    
        // agrego la direccion de entregz    
        if ($lastCompanyId) {
            addresses_add(
                    $lastCompanyId, "Delivery", $address, $number, $postcode, $barrio, $ref, $city, $province, $region, $country, $code5, $status
            );
//            $addresses_id = addresses_field_code("id", $code5);
            //Agrego el transporte
//            addresses_transport_add($addresses_id, $transport_code);
        }


        // insert in users
        // insert in users
        // insert in users
        // insert in users
        // insert in users
        // insert in users
//        if ( employees_by_company_contact($lastCompanyId , $lastContactId) ) {
//
//            users_add(
//                    $lastContactId , $language , $rol , $email , $passwordh , $email , $code4 , $status
//            ) ;
//        }
    }
    ############################################################################



    switch ($redi) {
        case 1:
            break;

        case 5:
            // Crea una factura con el id del cliente 
            header("Location: index.php?c=invoices&a=ok_add&client_id=$lastCompanyId#5");
            break;

        default:
            header("Location: index.php?c=contacts#default");
            break;
    }
} else {

    include view("home", "pageError");
}



