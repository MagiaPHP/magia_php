<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;
$error = array();
//
$company = new Company();
$company->setCompany($u_owner_id);
//$company->setSubdomain();
//$company->setWhy_can_not_be_approved();
// plan segun el subdomain
// osea busco plan segun subdomain
$plan = subdomains_search_by_unique('plan', 'subdomain', $company->getTva());
//
//vardump($plan);
//vardump($company->getSubdomain_Data('subdomain'));
//vardump(subdomains_search_by('subdomain', $company->getSubdomain_Data('subdomain')));
$subdomains_plans = subdomains_plan_list();

if (!$plan) {
    array_push($error, "Select a membership");
}




##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "6");
} else {
    header("Location: index.php?c=shop&a=8");
}