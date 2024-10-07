<?php

/**
 * Muestra las direcciones de una oficina
 * 
 */
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;
$error = array();
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
# Verificacion de varialbes obligatorias
if (!$id) {
    array_push($error, "id is mandatory");
}

# Verification de formato de variables 
// Verifica que sea un id valido
if (!is_id($id)) {
    array_push($error, "Id format error");
}

################################################################################
if (users_can_see_others_offices($u_id)) {
    if (contacts_headoffice_of_contact_id($id) !== contacts_headoffice_of_contact_id($u_id)) {
        array_push($error, "This office does not belong to your company");
    }
} else {
    if ($id != contacts_work_at($u_id)) {
        array_push($error, "You do not have permission to view details of this office");
    }
}
################################################################################
################################################################################
################################################################################
if (!$error) {

    $adresses = shop_labo_adresses_by_office($id);

    include view("shop", "adresses_by_office");
} else {

    include view("home", "pageError");
}
