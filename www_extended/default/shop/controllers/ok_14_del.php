<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}

$code = (!empty($_GET['code'])) ? clean($_GET['code']) : null;

$error = array();

#########################################################################
# Obligatorias
if ($code == "" || $code == null) {
    array_push($error, 'Code is mandatory');
}
#########################################################################
# Formato
#########################################################################
# Condicional
if (banks_field_code('id', $code)) {
    array_push($error, 'Code not find');
}
#########################################################################

if ($error) {
    // borro
    banks_delete_by_code($code);

    header("Location: index.php?c=shop&a=14&sms=update");
} else {
    include view('home', 'pageError');
}

