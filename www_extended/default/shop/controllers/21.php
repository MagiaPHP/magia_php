<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$sms = (!empty($_REQUEST['sms'])) ? clean($_REQUEST['sms']) : null;

$company = new Company();
$company->setCompany($u_owner_id);

$directory_personal_is_ok = false;

// si el contacto tiene email
if (directory_list_by_contact_name($u_id, 'tel')) {
    $directory_personal_is_ok = true;
}


##########################################################################
if (!budgets_search_by_client_id($u_owner_id)) {
    include view("shop", "21");
} else {
    header("Location: index.php?c=shop&a=8");
}