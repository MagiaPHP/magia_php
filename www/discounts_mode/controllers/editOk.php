<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars

include view("home", "disabled");
die();
$id = (isset($_POST["id"])) ? clean($_POST["id"]) : false;
$discount = (isset($_POST["discount"])) ? clean($_POST["discount"]) : false;
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

if (!discounts_mode_is_id($id)) {
    array_push($error, "ID format error");
}
//
################################################################################
if (!$error) {

    discounts_mode_edit(
            $id, $discount, $order_by, $status
    );
    header("Location: index.php?c=discounts_mode&a=details&id=$id");
}

$discounts_mode = discounts_mode_details($id);

include view("discounts_mode", "index");
