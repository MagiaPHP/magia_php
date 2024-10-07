<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
/**
 * Actualiza el plan que un subdominio tiene 
 */
$plan = (!empty($_REQUEST['plan'])) ? clean($_REQUEST['plan']) : null;
$company = new Company();
$company->setCompany($u_owner_id);
$company->setSubdomain();

$error = array();
################################################################################
# Verificacion de varialbes obligatorias
################################################################################
################################################################################
# Formato de variables // las formateo 
################################################################################
# Condcional
# Al actualizar no puede usar el mismo o uno que ya esta registrado
################################################################################
//vardump($error);
//vardump($create_by_tva = contacts_field_id('tva', 1022));
//
//die();

if (!$error) {


    $create_by_tva = contacts_field_id('tva', 1022);

    subdomains_push_plan(
            $create_by_tva,
            $plan,
            $company->getSubdomain_Data('prefix'),
            $company->getSubdomain_Data('subdomain'),
            $company->getSubdomain_Data('domain'),
            magia_uniqid(),
            date("Y-m-d"),
            1,
            1
    );

    //demo


    header("Location: index.php?c=shop&a=6&sms=update");
} else {

    include view("shop", "1");
}



