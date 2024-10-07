<?php

if (!permissions_has_permission($u_rol, "employees", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$company_id = (isset($_POST['company_id'])) ? clean($_POST['company_id']) : false;
$contact_id = (isset($_POST['contact_id'])) ? clean($_POST['contact_id']) : false;
$owner_ref = (isset($_POST['owner_ref'])) ? clean($_POST['owner_ref']) : _options_option("default_id_company");
$cargo = (isset($_POST['cargo'])) ? clean($_POST['cargo']) : _options_option("cargo_by_default");
$status = 1;

$error = array();

################################################################################
if (!$contact_id) {
    array_push($error, '$contact_id error');
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



if (!$error && $a == "add_employee") {

    //  $last_insert = contacts_add(
    //$owner_id, $type, $title, $name, $lastname, $birthdate, $order_by, $status
    //        $owner_id, 0, $title, $name, $lastname, $birthdate, 1, $status
    // );

    contacts_add_employee(
            $company_id, $contact_id, $owner_ref, $cargo
    );

    header("Location: index.php?c=contacts&a=search&txt=$name");
} else {

    array_push($error, "Check your form");
}

include view("contacts", "add");

//include "www/contacts/views/add.php";

