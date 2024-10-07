<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$docs_comments = null;
$docs_comments = docs_comments_list(10, 5);

include view("docs_comments", "index");
if ($debug) {
    include "www/docs_comments/views/debug.php";
}