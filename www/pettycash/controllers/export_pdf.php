<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$error = array();
$pettycash = null;
$pettycash = pettycash_list();
//
include view("pettycash", "export_pdf");
if ($debug) {
    include "www/pettycash/views/debug.php";
}