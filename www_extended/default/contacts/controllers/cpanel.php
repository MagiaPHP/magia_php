<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}


if ($e) {
    array_push($error, "$e");
}

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

if (1 == 1) {
    array_push($error, "Cpanel is not available in this section");
}

################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    if ($contact['type'] == 1) {

        include view("contacts", "page_cpanel");
    } else {

        if (patients_field_by_contact_id('id', $id)) { // es paciente
            include view("contacts", "page_details_patient");
        } else { // es contacto 
            include view("contacts", "page_details_contacts");
        }
    }
} else {

    include view('home', 'pageError');

//    header("Location: index.php?c=home&a=pageError&smst=infi&smsm=Contact no exist");
}
