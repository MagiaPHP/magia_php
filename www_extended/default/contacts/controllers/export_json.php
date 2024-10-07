<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();

$contacts_list = null;

$contacts_list = contacts_list();

include view("contacts", "export_json");

if ($debug) {

    include view("contacts", "debug");
}
