<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$val = (!empty($_POST['val'])) ? clean($_POST['val']) : null;

$error = array();

#########################################################################
# Obligatorias
#########################################################################
# Formato
#########################################################################
# Condicional
#########################################################################

if (!$error) {

    header("Location: index.php?c=shop&a=11&sms=update");
} else {

    include view("home", "pageError");
}



