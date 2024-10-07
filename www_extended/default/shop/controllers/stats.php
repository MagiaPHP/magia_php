<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$office_id = (!empty($_GET['office_id'])) ? clean($_GET['office_id']) : false;

$year = (!empty($_GET['year'])) ? clean($_GET['year']) : date("Y");

$month = (!empty($_GET['month'])) ? clean($_GET['month']) : date("m");

//SELECT EXTRACT(MONTH FROM date_registre) as month FROM `invoices` 


include view("shop", "stats");
