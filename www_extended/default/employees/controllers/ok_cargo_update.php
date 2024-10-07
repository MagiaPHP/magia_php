<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
//$owner_ref = (isset($_POST["owner_ref"])) ? clean($_POST["owner_ref"]) : false;
//$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$cargo = (isset($_POST["cargo"])) ? clean($_POST["cargo"]) : false;
//$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
//$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : 1;

$error = array();
//
################################################################################
if (!$company_id) {
    array_push($error, "Company id is mandatory");
}
if (!$contact_id) {
    array_push($error, "Contact id is mandatory");
}
################################################################################
################################################################################
if (!$error) {

    employees_update_cargo(
            $contact_id, $company_id, $cargo
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=contacts&a=details&id=$contact_id#1");
            break;

        case 2:
            header("Location: index.php?c=contacts#2");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view("home", "pageError");
}





