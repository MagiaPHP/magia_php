<?php

if (!permissions_has_permission($u_rol, "hr_employee_nationality", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id_contact'])) ? clean($_REQUEST['id_contact']) : false;
$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}

$contact = contacts_details($id);
if (!$contact) {
    array_push($error, "contact not exist");
}



if (!$error) {

    $contact = contacts_details($id);

    include view("contacts", "his_contacts_orders");
} 
