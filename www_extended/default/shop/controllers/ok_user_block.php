<?php

if (!permissions_has_permission($u_rol, "shop_users", "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$contact_id = (!empty($_REQUEST['contact_id'])) ? clean($_REQUEST['contact_id']) : false;
$error = array();

//------------------------------------------------------------------------------
if (!$contact_id) {
    array_push($error, 'contact_id dont send');
}
//------------------------------------------------------------------------------

if (!is_id($contact_id)) {
    array_push($error, 'contact_id format incorrect');
}

if (rols_rango_by_rol($u_rol) < rols_rango_by_rol(users_field_contact_id("rol", $contact_id))) {
    array_push($error, "You cannot block a user with a higher rank");
}


////////////////////////////////////////////////////////////////////////////////

if (permissions_has_permission($u_rol, "shop_offices", "create")) {
    // ver todos los contactos de la empresa    
    if (contacts_work_for($contact_id) !== contacts_work_for($u_id)) {
        array_push($error, "This contact dont work for your company");
    }
} else {
    // solo los de mi oficina

    if (contacts_work_at($contact_id) !== contacts_work_at($u_id)) {
        array_push($error, "This contact dont work for your office");
    }
}

################################################################################

if (!$error) {

    contacts_block($contact_id);

    users_block_by_contact_id($contact_id);

    header("Location: index.php?c=shop&a=contacts_system&id=$contact_id&sms=2");
} else {

    include view("home", "pageError");
}