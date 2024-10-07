<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$comments_read = null;
$comments_read = comments_read_list(10, 5);

include view("comments_read", "index");
if ($debug) {
    include "www/comments_read/views/debug.php";
}