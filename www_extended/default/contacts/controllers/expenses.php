<?php

if (!permissions_has_permission($u_rol, "banks", "read")) {
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


switch ($status) {
    case 'all':
        $expenses = expenses_search_by_client_id(offices_headoffice_of_office($id));
        break;
    case 5:
    case 10:
    case 20:
    case 30:
    case -10:
    case -20:
        $expenses = expenses_search_by_client_id_status($id, $status);
        //vardump($status);
        break;

    default:
        $expenses = expenses_search_by_client_id(offices_headoffice_of_office($id));
        break;
}


$contact = contacts_details($id);

if (!$error) {


    include view("contacts", "page_expenses");
} else {

    header("Location: index.php?c=home&a=pageError&smst=infi&smsm=Contact no exist");
}





