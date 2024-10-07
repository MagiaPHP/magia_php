<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;
$error = array();

$company = new Company();
$company->setCompany($u_owner_id);

if (!$company->getEmployees()[0]->getName()) {
    array_push($error, "Name is mandatory");
}

if (!$company->getEmployees()[0]->getLastname()) {
    array_push($error, "Lastame is mandatory");
}


##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "2");
} else {
    header("Location: index.php?c=shop&a=8");
}
