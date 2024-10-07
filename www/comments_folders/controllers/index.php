<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$comments_folders = null;
$comments_folders = comments_folders_list(10, 5);

include view("comments_folders", "index");
if ($debug) {
    include "www/comments_folders/views/debug.php";
}