<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$error = array();

include view("contacts", "help");

if ($debug) {
    //include "www/contacts/views/debug.php";
    include view("contacts", "debug");
}
