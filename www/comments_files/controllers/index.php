<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$comments_files = null;
$comments_files = comments_files_list(10, 5);

include view("comments_files", "index");
if ($debug) {
    include "www/comments_files/views/debug.php";
}