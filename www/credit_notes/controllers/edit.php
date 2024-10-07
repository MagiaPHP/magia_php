<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;

$error = array();

################################################################################


if (!$id) {
    array_push($error, "ID Don't send");
}

$cn = new Credit_notes($id);

################################################################################
if (!$error) {
    
    include view("credit_notes", "edit");
} else {

    include view("home", "pageError");
}

