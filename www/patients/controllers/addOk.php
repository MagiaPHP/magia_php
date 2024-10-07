<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$company_ref = (isset($_POST["company_ref"])) ? clean($_POST["company_ref"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();

if (!$company_id) {
    array_push($error, '$company_id is mandatory');
}
if (!$company_ref) {
    array_push($error, '$company_ref is mandatory');
}
if (!$contact_id) {
    array_push($error, '$contact_id is mandatory');
}
if (!$date) {
    array_push($error, '$date is mandatory');
}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}




#************************************************************************
// Busca si uya existe el texto en la BD


if (patients_search($status)) {
    //array_push($error, "That text with that context the database already exists");
}


if (!$error) {
    $lastInsertId = patients_add(
            $company_id, $company_ref, $contact_id, $date, $order_by, $status
    );

    header("Location: index.php?c=patients&a=details&id=$lastInsertId");
} else {

    array_push($error, "Check your form");
}

//include "www/patients/views/index.php";   
include view("patients", "index");
