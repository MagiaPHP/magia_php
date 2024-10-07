<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_users", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

# Recolection de variables desde el formulario

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false;

$error = array();

# Verificacion de varialbes obligatorias

if (!$id) {
    array_push($error, "id is mandatory");
}

# Verification de formato de variables 
// Verifica que sea un id valido
if (!is_id($id)) {
    array_push($error, "Error in price");
}




// si puedes ver otras oficinas, puedes ver todas, sino solo la que trabajas
if (users_can_see_others_offices($u_id)) {
    // los users de otras oficinas
    if (offices_headoffice_of_office($id) != contacts_headoffice_of_contact_id($u_id)) {
        array_push($error, 'This office does not belong to your company');
    }
} else {
    // solo dodne yo trabajo
    if ($id != contacts_work_at($u_id)) {
        array_push($error, 'You dont work in this office');
    }
}
# proceso
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $users_by_office = shop_labo_users_by_office($id);

    include view("shop", "users_by_office");
} else {


    include view("home", "pageError");
}


