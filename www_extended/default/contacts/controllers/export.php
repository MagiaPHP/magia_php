<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$contacts = null;

$contacts = contacts_list();

$filename = "contacts";

include view("contacts", "export");

