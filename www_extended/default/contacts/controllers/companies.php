<?php

if (!permissions_has_permission($u_rol, "companies", "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();

$contacts_list = null;

if (!$error) {
    $companies = companies_list();
    include view("contacts", "companies");
} else {
    include view("home", "pageError");
}

if (!$debug) {
    include view("contacts", "debug");
}
