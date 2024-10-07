<?php

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET['id'])) ? clean($_GET['id']) : false;

$error = array();

###############################################################################
if (!$error) {

    include view("contacts", "add_office");
} else {

    include view("home", "pageError");
}



