<?php

if (!permissions_has_permission($u_rol, 'shop_employees', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


//$company_id = (($_POST['company_id']) !="" ) ? clean($_POST['company_id']) : null;

$contact_id = (($_POST['contact_id']) != "" ) ? clean($_POST['contact_id']) : null;
$company_id = contacts_field_id("owner_id", $contact_id);
//
$owner_ref = (($_POST['owner_ref']) != "" ) ? clean($_POST['owner_ref']) : null;
$cargo = (($_POST['cargo']) != "" ) ? clean($_POST['cargo']) : "Employee";
$date = null;
$order_by = 1;
$status = 1;

$error = array();

#************************************************************************

if (!$company_id) {
    array_push($error, '$company_id is mandatory');
}

if (!$contact_id) {
    array_push($error, '$company_id is mandatory');
}

################################################################################
if (employees_by_company_contact($company_id, $contact_id)) {
    array_push($error, 'Employee already exists in the company');
}

#################################################################################
#################################################################################
#################################################################################
#################################################################################
#################################################################################
#################################################################################
#################################################################################

if (!$error) {

    employees_add(
            $company_id, $contact_id, $owner_ref, $date, $cargo, $order_by, $status
    );

    header("Location: index.php?c=shop&a=contacts_system&id=$contact_id");
} else {

    include view("home", "pageError");
}
