<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

$error = array();

$company = new Company();
$company->setCompany($u_owner_id);
//$company->setSubdomain();




if (!$company->getAddresses('Billing')) {
    addresses_add($u_owner_id, 'Billing', '', '', '', '', '', '', '', '', 'BE', magia_uniqid(), 1);
    header("Location: index.php?c=shop&a=12");
}

if ($company->getAddresses('Billing')->getNumber() == '') {
    array_push($error, 'Number is mandatory');
}

if ($company->getAddresses('Billing')->getAddress() == '') {
    array_push($error, 'Address is mandatory');
}

if ($company->getAddresses('Billing')->getPostcode() == '') {
    array_push($error, 'Postcode is mandatory');
}

if ($company->getAddresses('Billing')->getBarrio() == '') {
    array_push($error, 'Barrio is mandatory');
}

if ($company->getAddresses('Billing')->getCity() == '') {
    array_push($error, 'City is mandatory');
}

// si ya tiene un presupuesto abierto -------------------------------------------
if (budgets_search_by_client_id($u_owner_id)) {
    array_push($error, "You already have an order waiting");
}

//vardump($company->getAddresses('Billing'));
// -1 bloquado
// 0 waiting
// 1 activado
// solo si el status de la empresa es witing, puede entrar en esta pagina 
//vardump(contacts_status($company->getStatus()));
#########################################################################
# OBLIGATORIO
# Debe tener una direccion
# sino la crea en null por todas partes para poder editar
#########################################################################
# FORMATO
# #########################################################################
# CONDICIONAL
# La empresa debe estar en status 0 // Waiting
// si no hay direccion la registro en nul
#########################################################################
//vardump($company->getAddresses('Billing'));
// si la direccion esta vacia, no pasa
##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "12");
} else {
    header("Location: index.php?c=shop&a=8");
}
