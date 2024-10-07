<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$year = (isset($_REQUEST['year'])) ? clean($_REQUEST['year']) : date('Y');
$month = (isset($_REQUEST['month'])) ? clean($_REQUEST['month']) : date('m');


include view("hr", "drivers");
