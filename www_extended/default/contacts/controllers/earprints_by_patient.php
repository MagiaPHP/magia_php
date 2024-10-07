<?php

if (!permissions_has_permission($u_rol, "earprints", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
//$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
//$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : 'all';

$error = array();

if (!($id)) {
    array_push($error, 'id dont send');
}
//-----------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, 'id format incorrect');
}
$contact = contacts_details($id);
if (!$contact) {
    array_push($error, "contact not exist");
}


if (!$error) {

    $earprints_l = earprints_by_contact_side($id, 'L');
    $earprints_r = earprints_by_contact_side($id, 'R');

    include view("contacts", "page_earprints_by_patient");
} else {

    include view("home", "pageError");
}





