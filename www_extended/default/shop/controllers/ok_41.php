<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$error = array();

if (!$error) {
    header("Location: index.php?c=shop&a=41&sms=update");
} else {
    include view('home', 'pageError');
}



