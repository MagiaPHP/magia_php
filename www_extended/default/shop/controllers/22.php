<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;
$error = array();

$company = new Company();
$company->setCompany($u_owner_id);

if (verifi_login_password($company->getEmployees()[0]->getDirectory("Email"), $company->getEmployees()[0]->getDirectory("Email"))) {
    array_push($error, 'Please enter a personal password');
}

##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "22");
} else {
    header("Location: index.php?c=shop&a=8");
}

