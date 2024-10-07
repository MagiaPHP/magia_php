<?php

die(); 



if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$office_id = (!empty($_POST['office_id'])) ? clean($_POST['office_id']) : null;
$owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : null;
$type = (isset($_POST['type'])) ? clean($_POST['type']) : null;
$title = (isset($_POST['title'])) ? clean($_POST['title']) : null;

$name = (isset($_POST['name'])) ? clean($_POST['name']) : "Name";
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : "-";
$description = (isset($_POST['description'])) ? clean($_POST['description']) : null;
$registre_date = (isset($_POST['registre_date'])) ? clean($_POST['registre_date']) : date("Y-m-d h:m:s");

$year = (isset($_POST['year'])) ? clean($_POST['year']) : 1900;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : 01;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : 01;
$birthdate = "$year-$month-$day";
//$owner_id = NULL;
//$companyName = "$name $lastname";
$tva = (isset($_POST['tva'])) ? clean($_POST['tva']) : null;
$email = (isset($_POST['email'])) ? clean($_POST['email']) : null;
$billing_method = (isset($_POST['billing_method'])) ? clean($_POST['billing_method']) : null;
$language = (isset($_POST['language'])) ? clean($_POST['language']) : null;
$discounts = (isset($_POST['discounts'])) ? clean($_POST['discounts']) : null;

$order_by = 1;
$status = 1;

$addressName = "Billing";
$address = (isset($_POST['address'])) ? clean($_POST['address']) : null;
$number = (isset($_POST['number'])) ? clean($_POST['number']) : null;
$postcode = (isset($_POST['postcode'])) ? clean($_POST['postcode']) : null;
$barrio = (isset($_POST['barrio'])) ? clean($_POST['barrio']) : null;
$sector = (isset($_POST['sector'])) ? clean($_POST['sector']) : null;
$ref = (isset($_POST['ref'])) ? clean($_POST['ref']) : null;
$city = (isset($_POST['city'])) ? clean($_POST['city']) : null;
$province = (isset($_POST['province'])) ? clean($_POST['province']) : null;
$region = (isset($_POST['region'])) ? clean($_POST['region']) : "null";
$country = (isset($_POST['country'])) ? clean($_POST['country']) : false;

$transport_code = (isset($_POST['transport_code'])) ? clean($_POST['transport_code']) : false;

$redi = (isset($_POST['redi'])) ? clean($_POST['redi']) : 1;

$code = magia_uniqid();
$code1 = magia_uniqid();
$code2 = magia_uniqid();
$code3 = magia_uniqid();

################################################################################
if (!$name) {
    array_push($error, 'Name is mandatory');
}
if (!$lastname) {
    array_push($error, 'Lastname is mandatory');
}

################################################################################
################################################################################
if (!$error) {

    contacts_add(
            $owner_id, $office_id, $type, $title, $name, $lastname, $description, $birthdate, $tva, $billing_method, $discounts, $code, $language, $registre_date, $order_by, $status
    );

    $lastCompanyId = contacts_field_code("id", $code);

    if ($lastCompanyId) {

        contacts_update_language($lastCompanyId, config_system_lang_default());

        addresses_add(
                $lastCompanyId, $addressName, $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code2, $status
        );

        if (isset($email) && $email != '') {
            directory_add(
                    //$contact_id , $address_id , $name , $data , $order_by , $status
                    $lastCompanyId, null, "Email", $email, $code3, 1, 1
            );
        }
    }

    switch ($redi) {

        case 1:
        case 2:
            // Crea una factura con el id del cliente 
            header("Location: index.php?c=contacts&a=details&id=$lastCompanyId#2");
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



