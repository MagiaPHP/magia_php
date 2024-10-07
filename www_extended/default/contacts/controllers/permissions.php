<?php

if (!permissions_has_permission($u_rol, $a, "read")) {
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

if (users_field_contact_id('rol', $id) == 'root' && users_field_contact_id('rol', $u_id) != 'root') {
    array_push($error, 'Root is hidden');
}

#################################################################################
#################################################################################
#################################################################################
#################################################################################

if (!$error) {

    $contact = contacts_details($id);

    $permissions = permissions_search_by_rol(users_field_contact_id("rol", $id));

    include view("contacts", "page_permissions");
} else {

    include view("home", "pageError");
}





