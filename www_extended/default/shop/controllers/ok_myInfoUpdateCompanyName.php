<?php

if (!permissions_has_permission($u_rol, 'shop_myinfo', "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$company_name = (!empty($_POST['company_name'])) ? clean($_POST['company_name']) : false;

$error = array();

################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$u_owner_id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_owner_id)) {
    array_push($error, "Error in price");
}

################################################################################
# proceso
################################################################################
if (!$error) {

    if ($company_name != contacts_field_id("name", $u_owner_id)) {

        $contact = shop_updateCompanyName($company_name);
    }



    header("Location: index.php?c=shop&a=myInfo");
} else {
    include view("home", "pageError");
}




