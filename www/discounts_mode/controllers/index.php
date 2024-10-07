<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

$error = array();
$discounts_mode = null;
$discounts_mode = discounts_mode_list(10, 5);

//include "www/discounts_mode/views/index.php";
include view("discounts_mode", "index");
if ($debug) {
    include "www/discounts_mode/views/debug.php";
}