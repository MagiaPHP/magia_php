<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$owner_id = (isset($_POST["owner_id"])) ? clean($_POST["owner_id"]) : false;
$office_id = (isset($_POST["office_id"])) ? clean($_POST["office_id"]) : false;
$title = (isset($_POST["title"])) ? clean($_POST["title"]) : false;
$name = (isset($_POST["name"])) ? clean($_POST["name"]) : false;
$lastname = (isset($_POST["lastname"])) ? clean($_POST["lastname"]) : false;

//$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
//$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
//$owner_ref = (isset($_POST["owner_ref"])) ? clean($_POST["owner_ref"]) : false;
//$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$cargo = (isset($_POST["cargo"])) ? clean($_POST["cargo"]) : false;
//$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
//$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
// Direcciones
$addressName = "Billing";
$address = (isset($_POST['address']) && $_POST['address'] != '' ) ? clean($_POST['address']) : '';
$number = (isset($_POST['number']) && $_POST['number'] != '' ) ? clean($_POST['number']) : '';
$postcode = (isset($_POST['postcode']) && $_POST['postcode'] != '' ) ? clean($_POST['postcode']) : '';
$barrio = (isset($_POST['barrio']) && $_POST['barrio'] != '' ) ? clean($_POST['barrio']) : '';
$sector = (isset($_POST['sector']) && $_POST['sector'] != '' ) ? clean($_POST['sector']) : '';
$ref = (isset($_POST['ref']) && $_POST['ref'] != '' ) ? clean($_POST['ref']) : '';
$city = (isset($_POST['city']) && $_POST['city'] != '' ) ? clean($_POST['city']) : '-';
$province = (isset($_POST['province']) && $_POST['province'] != '' ) ? clean($_POST['province']) : '';
$region = (isset($_POST['region']) && $_POST['region'] != '' ) ? clean($_POST['region']) : '-';
$country = (isset($_POST['country']) && $_POST['country'] != '' ) ? clean($_POST['country']) : false;
//

$directory = (!empty($_POST['directory'])) ? clean($_POST['directory']) : false;

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$error = array();

//
$status = 1;
$order_by = 1;

//
if (!$lastname) {
    array_push($error, 'Lastname id is mandatory');
}
//if (!$contact_id) {
//    array_push($error, 'Contact id is mandatory');
//}
//if (!$owner_ref) {
//    array_push($error, 'Owner ref is mandatory');
//}
//if (!$date) {
//    array_push($error, 'Date is mandatory');
//}
if (!$cargo) {
    array_push($error, 'Cargo is mandatory');
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    // Agrego el contacto 
    // agrego como empleado

    $code = uniqid();

    contacts_add(
//            $owner_id, $office_id, $type, $title, $name, $lastname, $description, $birthdate, $tva, $billing_method, $discounts, $code, $language, $registre_date, $order_by, $status
            $owner_id, $office_id, 0, $title, $name, $lastname, null, '1900-01-01', null, null, null, $code, _languages_get_default_system_language(), date('Y-m-d h:m:s'), 1, 1
    );

    $contact_id = contacts_field_code('id', $code);

    employees_add(
            $office_id, $contact_id, null, date("Y-m-d h:m:s"), $cargo, 1, 1
    );

    $lastInsertId = employees_by_company_contact($office_id, $contact_id);

    // Directory
    $validDirectoryNames = array_column(directory_names_list(), 'name');
    foreach ($directory as $key => $value) {
        if (in_array($value['name'], $validDirectoryNames)) {
            directory_add($contact_id, null, $value['name'], $value['data'], magia_uniqid(), 1, 1);
        }
    }


    // Agrego la direccion de facturacin        
    if ($contact_id) {
        addresses_add($contact_id, 'Billing', $address, $number, $postcode, $barrio, $sector, $ref, $city, $province, $region, $country, $code, $status);
    }




    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=employees");
            break;

        case 2:
            header("Location: index.php?c=employees&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=employees&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=employees&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=employees&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
    //
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}



