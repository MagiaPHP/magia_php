<?php

if (!permissions_has_permission($u_rol, 'api', "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
//$e = (isset($_REQUEST['e'])) ? clean($_REQUEST['e']) : false;

$error = array();

if (!$id) {
    array_push($error, 'id dont send');
}

if (!is_id($id)) {
    array_push($error, 'id format error send');
}


//$contact = contacts_details($id);
//
//if (!$contact) {
//    array_push($error, "contact not exist");
//}
################################################################################
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $api = api_details_by_contact_id($id);
//    $api = new Api();
//    $api->setApi($id);

    include view("contacts", "page_api");
} else {
    include view('home', 'errorPage');
}
