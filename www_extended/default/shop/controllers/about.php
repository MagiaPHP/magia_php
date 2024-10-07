<?php

if (!permissions_has_permission($u_rol, 'shop', "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {
    include view("shop", "about");
} else {
    include view("home", "pageError");
}




