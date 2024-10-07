<?php

if (!permissions_has_permission($u_rol, "budgets", "read")) {
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
//
$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}
//
if ($e) {
    array_push($error, "$e");
}

switch ($status) {
    case 'all':
        $budgets = budgets_search_by_client_id($id);
        break;
    case 10:
    case 20:
    case 30:
    case 40:
    case -10:
    case 35:
        $budgets = budgets_search_by_client_id_status($id, $status);
        //vardump($status);
        break;

    default:
        $budgets = budgets_search_by_client_id($id);
        break;
}

if (!$error) {
    include view("contacts", "page_budgets");
} else {
    include view("home", "pageError");
}