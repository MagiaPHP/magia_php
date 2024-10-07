<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Recolection de variables desde el formulario

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

if (!$id) {
    array_push($error, "id not send");
}
////////////////////////////////////////////////////////////////////////////////
if (!is_id($id)) {
    array_push($error, "Id format error");
}

# ##############################################################################
# si no puedo ver otras oficinas, 
# podre ver la oficina donde trabajo
if (users_can_see_others_offices($u_id)) {
    if (contacts_headoffice_of_contact_id($id) !== contacts_headoffice_of_contact_id($u_id)) {

        array_push($error, "This contact does not belong to your company");
    }
} else {
    if (contacts_field_id("owner_id", $id) !== contacts_work_for($u_id)) {
        array_push($error, "This contact does not belong to your office");
    }
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    $directory = shop_labo_directory_by_office($id);

    include view("shop", "directory_by_office");
} else {

    include view("home", "pageError");
}

