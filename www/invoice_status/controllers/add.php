<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

include view("home", "disabled");
die();

################################################################################
if (!$error) {
    include view("invoice_status", "add");
} else {
    include view("home", 'pageError');
}
          
