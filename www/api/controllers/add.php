<?php


if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("api", "add");                 


// BE 27 2100 1902 3873

