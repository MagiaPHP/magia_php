<?php

if (!permissions_has_permission($u_rol, "contacts", "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

/**
 * Con esto damos al contacto la posibilidad de actualizar sus datos 
 */
include view("contacts", "first_connection");
