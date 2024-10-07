<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();

$_SESSION['order'] = null;

################################################################################
if (!$error) {

    header("Location: index.php?c=shop");
} else {
    include view("home", "pageError");
}