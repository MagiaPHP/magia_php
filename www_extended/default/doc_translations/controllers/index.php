<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$doc_translations = null;
$doc_translations = doc_translations_list(10, 5);

include view("doc_translations", "index");
if ($debug) {
    include "www/doc_translations/views/debug.php";
}