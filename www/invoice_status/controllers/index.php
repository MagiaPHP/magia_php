<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$invoice_status = null;
$invoice_status = invoice_status_list(10, 5);

################################################################################
if (!$error) {
    include view("invoice_status", "index");
} else {
    include view("home", 'pageError');
}
