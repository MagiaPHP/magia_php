<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
include view("home", "disabled");
die();

//include "www/discounts_mode/views/search_advanced.php";
include view("discounts_mode", "search_advanced");
