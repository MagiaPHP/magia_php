<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_contacts", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

################################################################################
if (!$id) {
    array_push($error, "id not send");
}

################################################################################
if (!is_id($id)) {
    array_push($error, "Id format error");
}

################################################################################
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

    include view("shop", "contacts_update");
} else {

    include view("home", "pageError");
}





