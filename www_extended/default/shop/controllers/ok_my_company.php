<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$company_name = (!empty($_POST['company_name'])) ? clean($_POST['company_name']) : false;
$tva = (!empty($_POST['tva'])) ? clean($_POST['tva']) : false;

$error = array();

################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if (!$u_owner_id) {
    array_push($error, "id is mandatory");
}

if (!$company_name || $company_name == "") {
    array_push($error, "Company name is mandatory");
}

if (!$tva) {
    array_push($error, "Tva is mandatory");
}

################################################################################
# Verification de formato de variables obligatorias
# Verdadero control 
################################################################################
if (!is_id($u_owner_id)) {
    array_push($error, 'u_oner_id error');
}



################################################################################
# proceso
################################################################################
if (!$error) {
    shop_updateCompanyName($company_name);

    header("Location: index.php?c=shop&a=myCompany&e=ok");
} else {

    include view("home", "pageError");
}




