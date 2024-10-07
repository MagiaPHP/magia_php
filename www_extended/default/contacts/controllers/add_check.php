<?php

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$txt = (isset($_GET['txt'])) ? clean($_GET['txt']) : false;

// Busca contactos en la base de datos general
$cloud_contacts = null;

if ($txt) {
    $cloud_contacts = cloud_contacts_search($txt);
}


include view("contacts", "add_check");
