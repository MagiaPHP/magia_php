<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$error = array();
################################################################################
if (!$id) {
    array_push($error, "id not send");
}
//------------------------------------------------------------------------------
if (!is_id($id)) {
    array_push($error, "Error in price");
}
################################################################################
// verifica que el id buscado pertenesca al usuario conectado
if (contacts_field_id("owner_id", $id) != $u_owner_id) {
    array_push($error, contacts_field_id("owner_id", $id) . " This contact is not yours");
}
################################################################################
if (!$error) {

    $contact = shop_contacts_details($id);

    include view("shop", "contacts_details");
} else {

    include view("home", "pageError");
}
