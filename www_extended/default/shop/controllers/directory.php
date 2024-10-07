<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$directory = shop_addresses_list();

include view("shop", "address_check");

include view("shop", "directory");

