<?php
/**
if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$type = 0;
//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$owner_id = (isset($_POST['owner_id'])) ? clean($_POST['owner_id']) : _options_option("default_id_company");
//
$title = ( $_POST['title'] != '' ) ? clean($_POST['title']) : null;
$name = (isset($_POST['name'])) ? clean($_POST['name']) : 'Name';
$lastname = (isset($_POST['lastname'])) ? clean($_POST['lastname']) : '';
$is_patient = ( isset($_POST['is_patient']) && $_POST['is_patient'] != '') ? true : false;

$year = (isset($_POST['year'])) ? clean($_POST['year']) : '1900';
$month = (isset($_POST['month'])) ? clean($_POST['month']) : '01';
$day = (isset($_POST['day'])) ? clean($_POST['day']) : '01';
$birthday = "$year-$month-$day";
//$status = (isset($_POST['status'])) ? clean($_POST['status']) : false;
$status = 1;
$order_by = 0;
$tva = null;
$code = magia_uniqid();

$error = array();

################################################################################

if (!$name) {
    array_push($error, "Name is mandatory");
}

if (!$owner_id) {
    array_push($error, "owner_id ($owner_id) is mandatory");
}

if (contacts_search_name_lastname_birthdate($owner_id, $name, $lastname, $birthday)) {
    array_push($error, "This contact already exists");
}
######################################################################################

if (!$error) {


    contacts_add(
            $owner_id, $office_id, $type, $title, $name, $lastname, $description, $birthdate, $tva, $billing_method, $discounts, $code, $language, $registre_date, $order_by, $status
    );

    $lastInsertId = contacts_field_code(id, $code);

    // actualizo el idioma con el idioma por defecto del sistema
    contacts_update_language($lastInsertId, config_system_lang_default());

    if ($is_patient) {
        $lastPatientId = patients_add($owner_id, '', $lastInsertId, null, 0, 1);
    }

    header("Location: index.php?c=contacts&a=contacts&id=$owner_id&li=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

include view("home", "pageError");

*/