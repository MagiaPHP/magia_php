<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$id = (! empty($_POST['id'])) ? clean($_POST['id']) : false;
//$contact_id = (! empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$contact_id = $u_owner_id;
$name = (!empty($_POST['name'])) ? clean($_POST['name']) : "Billing";
$address = (!empty($_POST['address'])) ? clean($_POST['address']) : false;
$number = (!empty($_POST['number'])) ? clean($_POST['number']) : false;
$postcode = (!empty($_POST['postcode'])) ? clean($_POST['postcode']) : false;
$barrio = (!empty($_POST['barrio'])) ? clean($_POST['barrio']) : false;
$city = (!empty($_POST['city'])) ? clean($_POST['city']) : '';
$region = (!empty($_POST['region'])) ? clean($_POST['region']) : false;
$country = (!empty($_POST['country'])) ? clean($_POST['country']) : false;
//$status = (! empty($_POST['status'])) ? clean($_POST['status']) : false;
$tel_name = (!empty($_POST['tel_name'])) ? clean($_POST['tel_name']) : false;
$tel_data = (!empty($_POST['tel_data'])) ? clean($_POST['tel_data']) : false;
$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
$code = magia_uniqid();

$error = array();

#************************************************************************

if (!$postcode) {
    array_push($error, "Post code error,  is mandatory");
}

if (!$address) {
    array_push($error, "Address error,  is mandatory");
}

if (shop_address_search($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country)) {
    array_push($error, "Address already exist");
}
// si la empresa esta aprobada ya no se puede editar
//if( contacts_field_id('status', contacts_work_for($u_id)) !=0 ){
//    array_push($error , 'Company status error') ;
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    // Agrego la direccion
    shop_address_add($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country, $code);

    // busco la direccion segun su codigo
    //$addresses_id = addresses_field_code("id" , $code) ;
    // Agrego el codigo de tipo de transporte que esta direccion desea
    //addresses_transport_add($addresses_id , $transport_code) ;





    header("Location: index.php?c=shop&a=2x&sms=update");
} else {

    include view("home", "pageError");
}



