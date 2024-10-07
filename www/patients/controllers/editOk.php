<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die();

$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$company_id = (isset($_POST["company_id"])) ? clean($_POST["company_id"]) : false;
$company_ref = (isset($_POST["company_ref"])) ? clean($_POST["company_ref"]) : false;
$contact_id = (isset($_POST["contact_id"])) ? clean($_POST["contact_id"]) : false;
$date = (isset($_POST["date"])) ? clean($_POST["date"]) : false;
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : false;
$status = (isset($_POST["status"])) ? clean($_POST["status"]) : false;

$error = array();
//
################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}
//
if (!$a) {
    array_push($error, "Action Don't send");
}
//
if (!$id) {
    array_push($error, "ID Don't send");
}
//
if (!$text) {
    // array_push($error, "Text Don't send");
}
//
################################################################################

if (!patients_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    patients_edit(
            $id, $company_id, $company_ref, $contact_id, $date, $order_by, $status
    );
    header("Location: index.php?c=patients&a=details&id=$id");
}

$patients = patients_details($id);

include view("patients", "index");
