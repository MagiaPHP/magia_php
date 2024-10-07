<?php

if (!permissions_has_permission($u_rol, "employees", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$type = 0;
//$type = (isset($_POST['type'])) ? clean($_POST['type']) : false;
$company_id = (isset($_POST['company_id'])) ? clean($_POST['company_id']) : false;
$company_ref = (isset($_POST['company_ref'])) ? clean($_POST['company_ref']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$status = 1;

$error = array();

################################################################################

if (!$company_id) {
    array_push($error, "company_id is mandatory");
}

if (!$contact_id) {
    array_push($error, "contact_id is mandatory");
}


################################################################################
/*
  if (!is_price($price)) {
  array_push($error, "Error in price");
  }
  if (!is_quantity($quantity)) {
  array_push($error, "Error in Quantity");
  }
 */
################################################################################



if (!$error && $a == "add_patient") {

    contacts_add_patient(
            $company_id, $company_ref, $contact_id, $status
    );

    header("Location: index.php?c=contacts&a=search&txt=$name");
} else {

    include view("home", "pageError");
}

