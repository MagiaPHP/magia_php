<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
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

$contact = contacts_details($id);
if (!$contact) {
    array_push($error, "contact not exist");
}

################################################################################
if (!$error) {

    $offices = contacts_offices_list_by_contact($id);

    $owner_id = contacts_field_id("owner_id", $id);

    // Añadir elementos al breadcrumb (puedes definir los elementos según el contexto)
    $breadcrumb = array(
        array("label" => "Home", "url" => "index.php"),
        array("label" => contacts_formated($id), "url" => "index.php?c=contacts&a=details&id=$id"),
        array("label" => "Offices", "url" => "index.php?c=contacts&a=offices&id=$id"),
    );

    include view("contacts", "page_offices");
} else {

    include view("home", "pageError");
}





