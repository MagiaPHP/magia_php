<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


include view("shop", "address_check");

include view("shop", "my_info_changePass");
