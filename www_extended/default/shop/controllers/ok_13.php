<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&c=no_access");
    die("Error has permission ");
}
// company directory
$directory = (!empty($_POST['directory'])) ? clean($_POST['directory']) : null;

$error = array();

#########################################################################
# Obligatorias
#########################################################################
# Formato
foreach ($directory as $key => $val) {
    if (!directory_is_format_ok($key, $val)) {
        array_push($error, $key . ': format error');
    } else {
        directory_push($u_owner_id, $key, $val);
    }
}

// Solo agrega los que son formato correcto, 
// los otros no
//vardump($error);
//die();
#########################################################################
# Condicional
#########################################################################



if (!$error) {

    header("Location: index.php?c=shop&a=13&sms=update");
} else {

    include view("home", "pageError");
}


