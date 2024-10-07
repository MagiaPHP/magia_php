<?php

if (!permissions_has_permission($u_rol, 'shop_addresses', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



//$id = (! empty($_POST['id'])) ? clean($_POST['id']) : false;
// el id de la oficina
$contact_id = (!empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
//
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$address = (!empty($_POST['address'])) ? clean($_POST['address']) : false;
$number = (!empty($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (!empty($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (!empty($_POST['barrio'])) ? clean($_POST['barrio']) : false;
$city = (!empty($_POST['city'])) ? clean($_POST['city']) : false;
$region = (!empty($_POST['region'])) ? clean($_POST['region']) : false;
$country = (!empty($_POST['country'])) ? clean($_POST['country']) : false;
//$status = (! empty($_POST['status'])) ? clean($_POST['status']) : false;
$tel_name = (!empty($_POST['tel_name'])) ? clean($_POST['tel_name']) : false;
$tel_data = (!empty($_POST['tel_data'])) ? clean($_POST['tel_data']) : false;

$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;

$code = magia_uniqid();

$error = array();

// paso todo a mayusculas
// paso todo a mayusculas
// paso todo a mayusculas
// paso todo a mayusculas
//$name = strtoupper($name);
$address = strtoupper($address);
$number = strtoupper($number);
$postcode = strtoupper($postcode);
$barrio = strtoupper($barrio);
$city = strtoupper($city);
$region = strtoupper($region);
$country = strtoupper($country);

#************************************************************************

if (!$postcode) {
    array_push($error, "Postcode error,  is mandatory");
}

if (!$address) {
    array_push($error, "Address error,  is mandatory");
}

if (shop_address_search($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country)) {
    array_push($error, "Address already exist");
}

# ##############################################################################
// si puedo ver otras oficinas?
//
if (users_can_see_others_offices($u_id)) {
    if (contacts_headoffice_of_contact_id($contact_id) !== contacts_headoffice_of_contact_id($u_id)) {
        array_push($error, "This contact does not belong to your company");
    }
} else {


    //if ( contacts_field_id("owner_id" , $contact_id) !== contacts_work_at($u_id) ) {
    // si no puedo ver otras oficinas, donde trabajo debe ser igual 
    // a la oficina que quiero agreegar la direccion
    // donde trabajo 
    if ($contact_id != contacts_work_at($u_id)) {
        array_push($error, "This contact does not belong to your office");
    }
}





################################################################################
################################################################################
################################################################################
if (!$error) {

    shop_address_add(
            $contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code
    );

    $lastInsert = addresses_field_code("id", $code);

    addresses_transport_add($lastInsert, $transport_code);

    ############################################################################
    ############################################################################
    $data_json = json_encode(array(
        $contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "shop";
    $a = 'adresses_by_office';
    $w = null;
    // $txt
    $description = "Address new [$lastInsert] ";
    $doc_id = $contact_id;
    $crud = "create";
    //$error = null ;
    //-------------------------------------------------------------------------
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    //-------------------------------------------------------------------------
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################

    header("Location: index.php?c=shop&a=adresses_by_office&id=$contact_id");
} else {


    include view("home", "pageError");

    ############################################################################
    ############################################################################
    $data_json = json_encode(array(
        $contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code
    ));
    $error = json_encode($error);
    $level = 0; // 1 atention, 2 medio, 3 critico, 4 fatal
    $date = null;
    //$u_id
    //$u_rol , 
    $c = "shop";
    $a = 'adresses_by_office';
    $w = null;
    // $txt
    $description = "Address error $error > $data_json ";
    $doc_id = $contact_id;
    $crud = "create";
    //$error = null ;
    //-------------------------------------------------------------------------
    $val_get = (!empty($_GET) ) ? json_encode($_GET) : null;
    $val_post = (!empty($_POST) ) ? json_encode($_POST) : null;
    $val_request = (!empty($_REQUEST) ) ? json_encode($_REQUEST) : null;
    $ip4 = get_user_ip();
    $ip6 = get_user_ip6();
    $broswer = json_encode(get_user_browser()); //https://www.php.net/manual/es/function.get-browser.php
    //-------------------------------------------------------------------------
    logs_add(
            $level, $date, $u_id, $u_rol, $c, $a, $w,
            $description, $doc_id, $crud, $error,
            $val_get, $val_post, $val_request, $ip4, $ip6, $broswer
    );
    ############################################################################
}



