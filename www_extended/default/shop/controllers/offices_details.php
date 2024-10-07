<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$error = array();
################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
if (!is_id($id)) {
    array_push($error, "Id format error");
}



################################################################################
if (contacts_field_id('type', $id) == 0) {
    array_push($error, "This contact is not a company, you cannot use this page to see their details");
    array_push($error, "A message has been sent to the administrator to report this error");
}


// -----------------------------------------------------------------------------
if (users_can_see_others_offices($u_id)) {
    if (contacts_headoffice_of_contact_id($id) !== contacts_headoffice_of_contact_id($u_id)) {
        array_push($error, "This contact does not belong to your company");
    }
} else {
    if ($id != contacts_work_at($u_id)) {
        array_push($error, "You do not have permission to view details of this office");
    }
}


# ##############################################################################
if (contacts_field_id("owner_id", $id) != $u_owner_id) {
    //array_push($error, contacts_field_id("owner_id", $id) . " This contact is not yours");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    $contact = shop_contacts_details($id);
    $adresses = shop_labo_adresses_by_office($id);
    $directory = shop_labo_directory_by_office($id);
    $users_by_office = shop_labo_users_by_office($id);

    include view("shop", "offices_details");
} else {

    include view("home", "pageError");
}


