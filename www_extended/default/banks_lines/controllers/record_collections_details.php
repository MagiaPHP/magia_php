<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : false;

$error = array();
################################################################################
################################################################################
if (!$error) {

    include view("banks_lines", "record_collections_details");
} else {
    include view("home", "pageError");
}    

