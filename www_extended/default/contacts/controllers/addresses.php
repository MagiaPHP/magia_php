<?php

if (!permissions_has_permission($u_rol, "addresses", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$address = array();
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$error = array();

if (!$id) {
    array_push($error, 'Id is mandatory');
}

if (!is_id($id)) {
    array_push($error, 'Id format error send');
}

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "Contact not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    $addresses = addresses_list_by_contact_id($id);

    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        array("label" => "Home", "url" => "index.php"),
        array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        array("label" => "Contacts", "url" => "index.php?c=contacts&a=contacts&id=$id"),
    );

    include view("contacts", "page_addresses");
} else {

    include view("home", "pageError");
}





