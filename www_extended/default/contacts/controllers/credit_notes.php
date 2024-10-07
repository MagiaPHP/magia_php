<?php

if (!permissions_has_permission($u_rol, "credit_notes", "read")) {
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
        $credit_notes = credit_notes_search_by_client_id(($id));
        break;
    case 10: // registred
    case 20: // money refund
    case -10: // money refund
        $credit_notes = credit_notes_search_by_client_status($id, $status);
        break;

    default:
        // segun satus
        $credit_notes = credit_notes_search_by_client_id(($id));
        break;
}


if (!$error) {

    include view("contacts", "page_credit_notes");
} else {

    include view("credit_notes", "pageError");
}





