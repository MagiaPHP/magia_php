<?php

if (!permissions_has_permission($u_rol, 'contacts', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// id de la oficina en cuestion 
//
$contact_id = (!empty($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$id = (!empty($_POST['id'])) ? clean($_POST['id']) : false;
$redi = (!empty($_POST['redi'])) ? clean($_POST['redi']) : null;

$error = array();

#************************************************************************
if (!$contact_id) {
    array_push($error, '$id is mandatory');
}

// contacto 
if (!contacts_field_id('id', $contact_id)) {
    array_push($error, 'This contact not exists');
}


################################################################################
if (!$error) {

    contacts_delete($contact_id);

    if (!contacts_field_id('id', $contact_id)) {
        $ok_delete = true;
    }


    if ($ok_delete) {
        
    }

    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=contacts&id=$id");
            break;

        default:
            header("Location: index.php?c=contacts");
            break;
    }
} else {


    include view("home", "pageError");
}

