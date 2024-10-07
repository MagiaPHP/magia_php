<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
/**
 * Actualiza nombe de la empresa y tva
 */
$company_name = (!empty($_POST['company_name'])) ? clean($_POST['company_name']) : null;
$tva = (!empty($_POST['tva'])) ? clean($_POST['tva']) : null;

$error = array();

################################################################################
# Verificacion de varialbes obligatorias
################################################################################
if ($company_name == "" || $company_name == null) {
    array_push($error, "Company name is mandatory");
}
if ($tva == "" || $tva == null) {
    array_push($error, "Vat number is mandatory");
}
################################################################################
# Formato de variables // las formateo 
$company_name = contacts_formated_name($company_name);
$tva = tva_formated($tva);
################################################################################
# Condcional
# Al actualizar no puede usar el mismo o uno que ya esta registrado
$company = new Company();
$company->setCompany($u_owner_id);
//
if ($tva !== $company->getTva() && contacts_field_tva('id', $tva)) {
    array_push($error, "Vat number already in our system");
}
################################################################################

if (!$error) {

    if ($tva == $company->getTva()) {
        // solo actualizo el nombre
        contacts_update_name($u_owner_id, $company_name);
    } else {
        // actualizo el nombre y tva
        contacts_update_name($u_owner_id, $company_name);
        contacts_update_tva($u_owner_id, $tva);
    }


    header("Location: index.php?c=shop&a=1&sms=update");
} else {
    include view("home", "pageError");
}

