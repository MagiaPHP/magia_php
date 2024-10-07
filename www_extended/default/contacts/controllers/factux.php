<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$contact = contacts_details($id);

$error = array();
################################################################################
## Requeridos
################################################################################
# format
################################################################################
# Condicional
################################################################################
if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}
if (!$contact) {
    array_push($error, "contact not exist");
}
// solo para companies
if ($contact['type'] != 1) {
    array_push($error, 'Option available only for companies');
}



################################################################################
if (!$error) {

    include view('contacts', 'factux');
} else {

    include view('home', 'pageError');
}
