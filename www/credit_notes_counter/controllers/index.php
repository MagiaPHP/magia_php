<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$error = array();
################################################################################
$credit_notes_counter = null;
$credit_notes_counter = credit_notes_counter_list(10, 5);

include view("credit_notes_counter", "index");
if ($debug) {
    include "www/credit_notes_counter/views/debug.php";
}