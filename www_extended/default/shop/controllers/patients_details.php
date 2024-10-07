<?php

if (!permissions_has_permission($u_rol, 'shop_patients', "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}


$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$error = array();

################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables 
// Verifica que sea un id valido
if (!is_id($id)) {
    array_push($error, "Error in price");
}
################################################################################
if (users_can_see_others_offices($u_id)) {
    // puedo ver otras oficinas 
//    vardump(offices_headoffice_of_office(patients_company_by_patient_id($id)));
//    vardump(offices_headoffice_of_office(contacts_work_for($u_id)));

    if (offices_headoffice_of_office(patients_company_by_patient_id($id)) !== offices_headoffice_of_office(contacts_work_for($u_id))) {
        array_push($error, "This patient does not belong to your company");
    }
} else {
    // sino solo la mia
    if (patients_office_by_patient_id($id) !== contacts_work_at($u_id)) {
        array_push($error, "This patient does not belong to your office");
    }
}




################################################################################

if (!$error) {

    $patient = shop_contacts_details($id);

    include view("shop", "address_check");

    if (contacts_field_id("type", $id) == 1) {
        header("Location: index.php?c=shop&a=offices_details&id=$id");
    } else {
        include view("shop", "patients_details");
    }
} else {

    include view("home", "pageError");
}


