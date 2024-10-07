<?php

if (!permissions_has_permission($u_rol, "shop_addresses", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;
//$contact_id = (! empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : false;
$address = (!empty($_POST['address'])) ? clean($_POST['address']) : false;
$number = (!empty($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (!empty($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (!empty($_POST['barrio'])) ? clean($_POST['barrio']) : false;
$city = (!empty($_POST['city'])) ? clean($_POST['city']) : false;
$region = (!empty($_POST['region'])) ? clean($_POST['region']) : false;
$country = (!empty($_POST['country'])) ? clean($_POST['country']) : false;
//$status = (! empty($_POST['status'])) ? clean($_POST['status']) : false;

$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;

$contact_id = addresses_field_id("contact_id", $id);
$office_id = addresses_field_id("contact_id", $id);
$headoffice_id = offices_headoffice_of_office($office_id);

$error = array();

#************************************************************************

if (!$id) {
    array_push($error, "$ id is mandatory");
}




# ##############################################################################
if (users_can_see_others_offices($u_id)) {
    if ($headoffice_id != contacts_work_for($u_id)) {

        array_push($error, "This contact does not belong to your company");
    }
} else {
    if (addresses_field_id("contact_id", $id) != contacts_work_at($u_id)) {
        array_push($error, "This contact does not belong to your office");
    }
}

//$name = strtoupper($name);
$address = strtoupper($address);
$number = strtoupper($number);
$postcode = strtoupper($postcode);
$barrio = strtoupper($barrio);
$city = strtoupper($city);
$region = strtoupper($region);
$country = strtoupper($country);

//vardump(array(
//    $id, $name, $address, $number, $postcode, $barrio, $city, $region, $country
//));
//
//die(); 
################################################################################
################################################################################
# 
# Paso todo a mayusculas 
#
################################################################################
if (!$error) {

    shop_address_update(
            $id, $name, $address, $number, $postcode, $barrio, $city, $region, $country
    );

    if (addresses_transport_search_by_addresses_id($id)) {
        addresses_transport_update($id, $transport_code, null);
    } else {
        addresses_transport_add($id, $transport_code);
    }





    ############################################################################
    ############################################################################
    $data_json = json_encode(array(
        $id, $name, $address, $number, $postcode, $barrio, $city, $region, $country
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
    $description = "Address update [$name] new data [$data_json] ";
    $doc_id = $contact_id;
    $crud = "update";
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



    header("Location: index.php?c=shop&a=adresses_by_office&id=$office_id");
} else {

    include view("home", "pageError");
}
