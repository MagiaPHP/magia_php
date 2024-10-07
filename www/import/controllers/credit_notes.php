<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

die();

include view("import", "credit_notes");

if ($debug) {
    include "www/expenses/views/debug.php";
}