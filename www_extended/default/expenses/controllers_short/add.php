<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$_SESSION['u_expense'] = "";
// esto tambien se agrega al agregar un nuevo provehedor



include view("expenses", "add");
