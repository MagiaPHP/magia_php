<?php

if (!permissions_has_permission($u_rol, "invoices", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : false;

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





switch ($status) {
    case 'all':
        $invoices = invoices_search_by_client_id(offices_headoffice_of_office($id));
        break;
    case 10:
    case 20:
    case 30:
    case 40:
    case -10:
    case 35:
        $invoices = invoices_search_by_client_id_status($id, $status);
        //vardump($status);
        break;

    default:
        $invoices = invoices_search_by_client_id(offices_headoffice_of_office($id));
        break;
}


$contact = contacts_details($id);

if (!$error) {

    include view("contacts", "page_invoices");
} else {

    header("Location: index.php?c=home&a=pageError&smst=infi&smsm=Contact no exist");
}





