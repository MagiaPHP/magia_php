<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = ( ($_GET["id"]) != "" ) ? clean($_GET["id"]) : false;

$error = array();

if (!$id) {
    array_push($error, '$id not send');
}


#************************************************************************

if (!$error) {
    include view("balance", "cancel");
} else {

    include view("home", "pageError");
}


