<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
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
    if (contacts_headoffice_of_contact_id($id) !== contacts_headoffice_of_contact_id($u_id)) {
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
        include view("shop", "patients_update");
    }
} else {

    include view("home", "pageError");
}


