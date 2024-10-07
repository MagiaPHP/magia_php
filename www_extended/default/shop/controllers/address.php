<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

die(1);
$addresses = shop_addresses_list();

include view("shop", "address_check");
