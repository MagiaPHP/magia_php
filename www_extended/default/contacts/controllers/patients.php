<?php

if (!permissions_has_permission($u_rol, "patients", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$error = array();

if (!($id)) {
    array_push($error, 'id dont send');
}
//------------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, '$id format incorrect');
}

if ($e) {
    array_push($error, "$e");
}


if (!$error) {

    $patients_list = patients_list_according_office($id);

    include view("contacts", "page_patients");
} else {

    include view("home", "pageError");
}





