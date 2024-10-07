<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

#########################################################################
# OBLIGATORIO
# Nombre de la emprea 
# tva
#########################################################################
# FORMATO
# nombre de la emprea 
# formato 
# #########################################################################
# CONDICIONAL
# La empresa debe estar en status 0 // Waiting
# si la tva existe en el sistema error 
# #########################################################################
////////////////////////////////////////////////////////////////////////////////<

$company = new Company();
$company->setCompany($u_owner_id);

$name = contacts_field_id('name', $u_id);
$lastname = contacts_field_id('lastname', $u_id);

##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "10");
} else {
    header("Location: index.php?c=shop&a=8");
}

