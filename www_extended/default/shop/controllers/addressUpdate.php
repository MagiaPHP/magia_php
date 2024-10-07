<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_addresses", "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$contact_id = addresses_field_id("contact_id", $id);
$office_id = addresses_field_id("contact_id", $id);
$headoffice_id = offices_headoffice_of_office($office_id);
$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$id) {
    array_push($error, "id is mandatory");
}
################################################################################
if (!is_id($id)) {
    array_push($error, "Error in id");
}

################################################################################
# proceso
if (addresses_field_id("contact_id", $id) != $u_owner_id) {
    // array_push($error , "This address is not yours") ;
}


if (users_can_see_others_offices($u_id)) {
    // ver todos las direcciones de la empresa    
    if ($headoffice_id != contacts_work_for($u_id)) {
        array_push($error, "This address dont work for your company");
    }
} else {
    // solo los de mi oficina
    if ($office_id != contacts_work_at($u_id)) {
        array_push($error, "This address dont work for your office");
    }
}



################################################################################

if (!$error) {

    $address = shop_address_details($id);

    include view("shop", "addressUpdate");
} else {

    include view("home", "pageError");
}