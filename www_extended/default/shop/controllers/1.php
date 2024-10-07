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
########################################################################
# Mandatory
########################################################################
# Format 
########################################################################
# Condicional
if ($company->getName() == '' || $company->getName() == null || $company->getName() == false) {
    array_push($error, "Name is mandatory");
}
if ($company->getTva() == '' || $company->getTva() == null || $company->getTva() == false) {
    array_push($error, "Vat number is mandatory");
}
// si ya tiene un presupuesto abierto 
if (budgets_search_by_client_id($u_owner_id)) {
    array_push($error, "You already have an order waiting");
}
##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "1");
} else {
    header("Location: index.php?c=shop&a=8");
}

