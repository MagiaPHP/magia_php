<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
////////////////////////////////////////////////////////////////////////////////
if (!modules_field_module('status', 'expenses')) {
    array_push($error, "The expenses module is not active");
}

if (!$error) {
    include view("export", "expenses");
} else {
    include view("home", "pageError");
}

