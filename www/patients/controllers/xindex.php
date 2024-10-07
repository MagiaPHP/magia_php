<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$patients = null;
$patients = patients_list(10, 5);

//include "www/patients/views/index.php";
include view("patients", "index");
if ($debug) {
    include "www/patients/views/debug.php";
}