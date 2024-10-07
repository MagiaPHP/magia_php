<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$doc_categories = null;
$doc_categories = doc_categories_list(10, 5);

include view("doc_categories", "index");
if ($debug) {
    include "www/doc_categories/views/debug.php";
}