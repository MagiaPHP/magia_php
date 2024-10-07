<?php

if (!permissions_has_permission($u_rol, "employees", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

// la empresa
$contact_id = (($_POST['contact_id']) != "") ? clean($_POST['contact_id']) : false;
$title = (($_POST['title']) != "") ? clean($_POST['title']) : null;
$lastname = (($_POST['lastname']) != "") ? clean($_POST['lastname']) : "Name" . magia_uniqid();
$name = (($_POST['name']) != "") ? clean($_POST['name']) : "Lastame" . magia_uniqid();

$year = (isset($_POST['year'])) ? clean($_POST['year']) : false;
$month = (isset($_POST['month'])) ? clean($_POST['month']) : false;
$day = (isset($_POST['day'])) ? clean($_POST['day']) : false;
$birthdate = "$year-$month-$day";

$tel = (($_POST['Tel']) != "") ? clean($_POST['Tel']) : "";
$email = (($_POST['email']) != "") ? clean($_POST['email']) : "";

$is_employee = (($_POST['is_employee']) != "") ? clean($_POST['is_employee']) : false;

$ref = (($_POST['ref']) != "") ? clean($_POST['ref']) : "";
$cargo = (($_POST['cargo']) != "") ? clean($_POST['cargo']) : _options_option("cargo_by_default");

// la sede 
$company_id = (offices_headoffice_of_office($contact_id)) ? offices_headoffice_of_office($contact_id) : false;

$code = magia_uniqid();

$status = 1;

$redi = (($_POST['redi']) != "") ? clean($_POST['redi']) : null;

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



if (!$error) {


    contacts_add(
            //$owner_id, $type, $title, $name, $lastname, $birthdate, $tva, $code, $order_by, $status
            $company_id, 0, $title, $name, $lastname, $birthdate, null, $code, 1, 1
    );

    $last_contact_id = contacts_field_code('id', $code);

    if ($last_contact_id && $is_employee) {
        contacts_add_employee(
                $company_id, $last_contact_id, $ref, $cargo
        );
    }


    if ($tel) {
        directory_add($last_contact_id, null, 'Tel', $tel, magia_uniqid(), 1, 1);
    }

    if ($email) {
        directory_add($last_contact_id, null, 'Email', $email, magia_uniqid(), 1, 1);
    }



    switch ($redi) {
        case 1:
            header("Location: index.php?c=contacts&a=contacts&id=$company_id");
            break;

        case 3:
            header("Location: index.php?c=contacts&a=employees&id=$company_id");
            break;

        default:
            header("Location: index.php?c=contacts&a=contacts&id=$company_id");
            break;
    }
} else {


    include view("home", "pageError");
}
