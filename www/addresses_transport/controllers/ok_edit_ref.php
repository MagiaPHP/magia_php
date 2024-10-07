<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// esto hace falta par la redireccion
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$addresses_id = (isset($_POST["addresses_id"])) ? clean($_POST["addresses_id"]) : false;
$transport_code = (isset($_POST["transport_code"])) ? clean($_POST["transport_code"]) : false;
$transport_ref = (!empty($_POST["transport_ref"]) ) ? clean($_POST["transport_ref"]) : null;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : 1;
//
$error = array();

//------------------------------------------------------------------------------
if (!$contact_id) {
    array_push($error, 'contact_id is mandatory');
}
if (!$addresses_id) {
    array_push($error, 'addresses_id is mandatory');
}
//
if (!$transport_code) {
    array_push($error, 'transport_code is mandatory');
}
//
if (!$transport_ref) {
    array_push($error, 'transport_ref is mandatory');
}
//
#************************************************************************
// Busca si uya existe el texto en la BD
//if (addresses_transport_field_addresses_id_transport_code($addresses_id, $transport_code)) {
//    array_push($error, "This transport already exists at this address");
//}

if (addresses_transport_search_by_transport_code_transport_ref($transport_code, $transport_ref)) {
    array_push($error, "This reference for this transport already exists");
}


################################################################################
################################################################################
################################################################################


if (!$error) {

    addresses_transport_update_ref(
            $addresses_id, $transport_code, $transport_ref
    );

    ############################################################################
    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=contacts&a=addresses&id=$contact_id");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view('home', 'pageError');
}

     