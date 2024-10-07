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
$sector = (!empty($_POST['sector'])) ? clean($_POST['sector']) : '';
$ref = (!empty($_POST['ref'])) ? clean($_POST['ref']) : '';
$province = (!empty($_POST['province'])) ? clean($_POST['province']) : '';
$region = (!empty($_POST['region'])) ? clean($_POST['region']) : false;
$country = (!empty($_POST['country'])) ? clean($_POST['country']) : false;
//$status = (! empty($_POST['status'])) ? clean($_POST['status']) : false;
//$tel_name = (!empty($_POST['tel_name'])) ? clean($_POST['tel_name']) : false;
//$tel_data = (!empty($_POST['tel_data'])) ? clean($_POST['tel_data']) : false;
//$transport_code = (!empty($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;
//$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : 1;
//
$code = magia_uniqid();

$error = array();
#########################################################################
# Obligatorio
if (!$postcode) {
    array_push($error, "Post code is manatory");
}
if (!$address) {
    array_push($error, "Address is mandatory");
}
##########################################################################
# Formtato
if (!addresses_is_postcode($postcode)) {
    array_push($error, "Post code format error");
}
if (!addresses_is_address($address)) {
    array_push($error, "Address format error");
}
##########################################################################
# Condicional
//if (shop_address_search($contact_id, $name, $address, $number, $postcode, $barrio, $city, $region, $country)) {
//    array_push($error, "Address already exist");
//}
////////////////////////////////////////////////////////////////////////////////
// si la empresa esta aprobada ya no se puede editar
$company = new Company();
$company->setCompany($u_owner_id);
// -1 bloquado
// 0 waiting
// 1 activado
// solo si el status de la empresa es witing, puede entrar en esta pagina 
//vardump(contacts_status($company->getStatus()));
//
//if (contacts_status($company->getStatus()) == 0) {
//    array_push($error, 'Company status error');
//}
################################################################################
################################################################################
################################################################################
if (!$error) {

    shop_address_push($u_owner_id, $name, $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country);

    header("Location: index.php?c=shop&a=12&sms=update");
} else {

    include view("home", "pageError");
}



