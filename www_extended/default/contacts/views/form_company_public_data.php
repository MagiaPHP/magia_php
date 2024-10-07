
<?php
$public_data = array();
$public_data['company']["name"] = $company->getName();
$public_data['company']["vat"] = $company->getTva();
$public_data['company']["language"] = $company->getLanguage();

foreach (directory_names_list() as $key => $dn) {
    if ($dn['name'] != 'nationalNumber') {
        $public_data['company'][$dn["name"]] = directory_list_by_contact_name($company->getId(), $dn["name"]);
    }
}




$owners = employees_list_by_company_owner_ref($company->getId(), "owner");

foreach ($owners as $key => $owner) {
    $public_data["contact"]['title'] = contacts_field_id('title', $owner['contact_id']);
    $public_data["contact"]['name'] = contacts_field_id('name', $owner['contact_id']);
    $public_data["contact"]['lastname'] = contacts_field_id('lastname', $owner['contact_id']);

    foreach (directory_names_list() as $key => $dn) {
        if ($dn['name'] != 'nationalNumber') {
            $public_data['contact'][$dn["name"]] = directory_list_by_contact_name($owner['contact_id'], $dn["name"]);
        }
    }
}




$public_data["address"]['Billing']['name'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_name'];
$public_data["address"]['Billing']['address'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_address'];
$public_data["address"]['Billing']['number'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_number'];
$public_data["address"]['Billing']['postcode'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_postcode'];
$public_data["address"]['Billing']['barrio'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_barrio'];
$public_data["address"]['Billing']['city'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_city'];
$public_data["address"]['Billing']['region'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_region'];
$public_data["address"]['Billing']['country'] = json_decode(json_encode($company->getAddresses("Billing")), true)['_country'];
//
//
$public_data["address"]['Delivery']['name'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_name'];
$public_data["address"]['Delivery']['address'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_address'];
$public_data["address"]['Delivery']['number'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_number'];
$public_data["address"]['Delivery']['postcode'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_postcode'];
$public_data["address"]['Delivery']['barrio'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_barrio'];
$public_data["address"]['Delivery']['city'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_city'];
$public_data["address"]['Delivery']['region'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_region'];
$public_data["address"]['Delivery']['country'] = json_decode(json_encode($company->getAddresses("Delivery")), true)['_country'];
//
//



vardump($public_data);
vardump(json_encode($public_data));
?>


<?php
$errors_pd = array();

if (!$public_data['company']['name']) {
    array_push($errors_pd, "Company name is required");
}
//
if (!$public_data['company']['vat']) {
    array_push($errors_pd, "Vat number is required");
}
//
if (!$public_data['company']['Email']) {
    array_push($errors_pd, "Email is required");
}
//
if (!$public_data['company']['Tel']) {
    array_push($errors_pd, "Telephone number is required");
}

if ($errors_pd) {
    foreach ($errors_pd as $error_pd) {
        message('info', $error_pd);
    }
}
?>


<h1>Invitar a usar </h1>


Invitar a esta empresa para que pueda usar GM y pueda ver las facturas en linea, revise que los datos son correctos antes de
enviar la invitacion 

