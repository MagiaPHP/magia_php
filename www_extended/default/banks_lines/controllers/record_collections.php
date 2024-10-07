<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$txt = (isset($_REQUEST["txt"]) && $_REQUEST["txt"] != "" ) ? clean($_REQUEST["txt"]) : false;

$error = array();
################################################################################
################################################################################
if (!$error) {


    include view("banks_lines", "record_collections");
} else {
    include view("home", "pageError");
}    

