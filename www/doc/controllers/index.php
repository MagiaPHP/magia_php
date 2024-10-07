<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$doc = null;
$doc = doc_list(10, 5);

include view("doc", "index");
if ($debug) {
    include "www/doc/views/debug.php";
}