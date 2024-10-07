<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$f = (isset($_REQUEST["f"]) && isset($_REQUEST["f"]) != "") ? clean($_REQUEST["f"]) : 'pdf';

switch ($f) {

    case 'pdf':
        include view("export", "contacts");
        break;

    case 'csv':
        include view("export", "contacts_csv");
        break;

    case 'json':
        include view("export", "contacts_json");
        break;

    default:
        include view("export", "contacts");
        break;
}

