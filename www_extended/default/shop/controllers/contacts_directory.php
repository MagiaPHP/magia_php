<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_directory", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Recolection de variables desde el formulario

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

# Verificacion de varialbes obligatorias

if (!$id) {
    array_push($error, "id is mandatory");
}

# Verification de formato de variables 
// Verifica que sea un id valido
if (!is_id($id)) {
    array_push($error, "Error in price");
}

//// si no trabaja para la misma empresa que yo
//if(contacts_work_for($id) !== contacts_work_for($u_id) ){
//    array_push($error, " This contact is not yours");
//}
# proceso
# ##############################################################################
// si el contacto es una empresa no va
if (users_can_see_others_offices($u_id)) {
    if (contacts_headoffice_of_contact_id($id) !== contacts_headoffice_of_contact_id($u_id)) {
        array_push($error, "This contact does not belong to your company");
    }
} else {
    if (contacts_field_id("owner_id", $id) !== contacts_work_at($u_id)) {
        array_push($error, "This contact does not belong to your office");
    }
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    $contact = shop_contacts_details($id);
    $directory = directory_list_by_contact_id($id);

    include view("shop", "address_check");

    include view("shop", "contacts_directory");
} else {


    include view("home", "pageError");
}


