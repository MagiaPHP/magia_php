<?php

die();
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

$company = new Company();
$company->setCompany($u_owner_id);

##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "4");
} else {
    header("Location: index.php?c=shop&a=8");
}

