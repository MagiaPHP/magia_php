<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

if (!permissions_has_permission($u_rol, "shop_myinfo", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$u_id) {
    array_push($error, "id is mandatory");
}
################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_id)) {
    array_push($error, "Id format error");
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    $contact = shop_contacts_details($u_id);

    include view("shop", "address_check");

    include view("shop", "myInfo");
} else {

    include view("home", "pageError");
}




