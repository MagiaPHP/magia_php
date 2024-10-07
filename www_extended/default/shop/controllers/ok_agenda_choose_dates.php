<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$agenda_id = (isset($_POST["agenda_id"]) && $_POST["agenda_id"] != "" && $_POST["agenda_id"] != "null" ) ? clean($_POST["agenda_id"]) : null;
$address_id = (isset($_POST["address_id"]) && $_POST["address_id"] != "" && $_POST["address_id"] != "null" ) ? clean($_POST["address_id"]) : null;

$date = (isset($_POST["date"]) && $_POST["date"] != "" && $_POST["date"] != "null" ) ? clean($_POST["date"]) : null;
$time = (isset($_POST["time"]) && $_POST["time"] != "" && $_POST["time"] != "null" ) ? clean($_POST["time"]) : null;
$time_end = (isset($_POST["time_end"]) && $_POST["time_end"] != "" && $_POST["time_end"] != "null" ) ? clean($_POST["time_end"]) : null;
$date_end = (isset($_POST["date_end"]) && $_POST["date_end"] != "" && $_POST["date_end"] != "null" ) ? clean($_POST["date_end"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 0;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 0;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$agenda_id) {
    array_push($error, '$agenda_id is mandatory');
}
if (!$address_id) {
    array_push($error, '$address_id is mandatory');
}
###############################################################################
# FORMAT
###############################################################################
if (!agenda_places_dates_is_agenda_id($agenda_id)) {
    array_push($error, '$agenda_id format error');
}
if (!agenda_places_dates_is_address_id($address_id)) {
    array_push($error, '$address_id format error');
}
###############################################################################
# CONDITIONAL
################################################################################
//if( agenda_places_dates_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $lastInsertId = agenda_places_dates_add(
            $agenda_id, $address_id, $date, $time, $time_end, $date_end, 0, 0
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=shop&a=agenda_choose_dates&id=$agenda_id");
            break;

        default:
            header("Location: index.php?c=agenda_places_dates");
            break;
    }
} else {

    include view("home", "pageError");
}


