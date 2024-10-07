<?php

if (!permissions_has_permission($u_rol, "directory", "read")) {
    header("Location: index.php?c=home&a=no_access#directory&read");
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

$contact = contacts_details($id);
if (!$contact) {
    array_push($error, "contact not exist");
}

//******************************************************************************
if (!$error) {

    $directory = directory_list_by_contact_id($id);

    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        array("label" => "Home", "url" => "index.php"),
        array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        array("label" => "Contacts", "url" => "index.php?c=contacts&a=contacts&id=$id"),
    );

    include view("contacts", "page_directory");
} else {

    header("Location: index.php?c=home&a=pageError&smst=infi&smsm=Contact no exist");
}
