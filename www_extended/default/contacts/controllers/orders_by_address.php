<?php

if (!permissions_has_permission($u_rol, "orders", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$office_id = (isset($_REQUEST['office_id'])) ? clean($_REQUEST['office_id']) : false;
$address_id = (isset($_REQUEST['address_id'])) ? clean($_REQUEST['address_id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;
$status = (isset($_REQUEST['status'])) ? clean($_REQUEST['status']) : 'all';

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




if (!$error) {
    if ($office_id !== "all") {
        switch ($status) {
            //case 0:
            case "":
            case "all":
                $orders = orders_list_by_office_id($office_id);
                break;

            default:
                $orders = orders_list_by_office_id_status($office_id, $status);
                break;
        }
    } else {
        switch ($status) {
            //case 0:
            case "":
            case "all":
                $orders = orders_list_by_company_id($id);
                break;
            default:
                $orders = orders_list_by_company_id_status($id, $status);
                break;
        }
    }

    include view("contacts", "page_orders_by_address");
} else {
    include view("home", "pageError");
}