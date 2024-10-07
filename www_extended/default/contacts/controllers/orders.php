<?php

if (!permissions_has_permission($u_rol, "orders", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$error = array();

if (!($id)) {
    array_push($error, 'id format dont send');
}

//------------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, 'id format incorrect');
}

$contact = contacts_details($id);

if (!$contact) {
    array_push($error, "contact not exist");
}


if (!$error) {

    $orders_list = orders_list_by_patient_id($id);

    include view("contacts", "page_orders");
} else {

    include view("home", "pageError");
}





