<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

################################################################################
if (!$error) {
    include view("credit_notes", "add");
} else {
    include view("home", "pageError");
}
