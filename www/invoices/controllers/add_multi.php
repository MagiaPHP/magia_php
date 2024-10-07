<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$next = (isset($_REQUEST["next"]) && $_REQUEST["next"] != "" ) ? clean($_REQUEST["next"]) : null;
$date_expiration = (isset($_REQUEST["date_expiration"]) && $_REQUEST["date_expiration"] != "" ) ? clean($_REQUEST["date_expiration"]) : null;
$total = (isset($_REQUEST["total"]) && $_REQUEST["total"] != "" ) ? clean($_REQUEST["total"]) : null;
$intervalo = (isset($_REQUEST["intervalo"]) && $_REQUEST["intervalo"] != "" ) ? clean($_REQUEST["intervalo"]) : null;
$intervalo_date = (isset($_REQUEST["intervalo_date"]) && $_REQUEST["intervalo_date"] != "" ) ? clean($_REQUEST["intervalo_date"]) : null;
$title = (isset($_REQUEST["title"]) && $_REQUEST["title"] != "" ) ? clean($_REQUEST["title"]) : 'Invoice';
$max = (isset($_REQUEST["max"]) && $_REQUEST["max"] != "" ) ? clean($_REQUEST["max"]) : 12;

$error = array();
################################################################################
if (!$error) {
    include view("invoices", "add_multi");
} else {
    include view("home", "pageError");
}

             
