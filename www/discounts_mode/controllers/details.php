<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
include view("home", "disabled");
die();
$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################
if (!$c) {
    array_push($error, "Controller Don't send");
}

if (!$a) {
    array_push($error, "Action Don't send");
}
if (!$id) {
    array_push($error, "ID Don't send");
}


################################################################################

if (!discounts_mode_is_id($id)) {
    array_push($error, 'ID format error');
}
################################################################################

if (!discounts_mode_field_id("*", $id)) {
    array_push($error, "id not exist");
}



if (!$error) {
    $discounts_mode = discounts_mode_details($id);
    include view("discounts_mode", "details");
} else {
    array_push($error, "Check your form");
    include view("discounts_mode", "index");
}

