<?php

if (!permissions_has_permission($u_rol, "orders", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : 'all';
$code = (isset($_REQUEST['code'])) ? clean($_REQUEST['code']) : 'all';

$error = array();

if (!($id)) {
    array_push($error, 'id dont send');
}
//-----------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, 'id format incorrect');
}

if ($e) {
    array_push($error, "$e");
}

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    switch ($status) {
        //case 0:
        case "all":
            $orders = orders_list_by_office_id($id);
            break;

        default:
            $orders = orders_list_by_office_id_status($id, $status);
            break;
    }

    include view("contacts", "page_orders_by_office");
} else {

    include view("home", "pageError");
}





