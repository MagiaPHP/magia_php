<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


include view("home", "disabled");
die();

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}
if (!is_id($id)) {
    array_push($error, 'id format error send');
}

$contact = contacts_details($id);

if (!$error) {
// El controlador escoje que presentar para  solo editar aca las companias
    if ($contact['type'] == 1) {
        //include "www/contacts/views/edit_company.php";
        include view("contacts", "edit_company");
    } else {
        //include "www/contacts/views/edit_patient.php";
        include view("contacts", "edit_patient");
    }
}
