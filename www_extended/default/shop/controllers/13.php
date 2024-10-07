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
//$email = directory_list_by_contact_name($u_owner_id, 'Email');
$email = $company->getDirectory('Email');

if (!$email) {
    array_push($error, 'Email is mandatory');
}

// si ya tiene un presupuesto abierto 
if (budgets_search_by_client_id($u_owner_id)) {
    array_push($error, "You already have an order waiting");
}



##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "13");
} else {
    header("Location: index.php?c=shop&a=8");
}
