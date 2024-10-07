<?php

die();
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();

if (!$error) {


    die();

    header("Location: index.php?c=subdomains&a=details&id=$id");
} else {

    include view("home", "pageError");
}


