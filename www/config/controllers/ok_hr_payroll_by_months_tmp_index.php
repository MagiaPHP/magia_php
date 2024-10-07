<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (($_REQUEST["data"]) != "" ) ? clean($_REQUEST["data"]) : null;

$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : 1;

$error = array();

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('hr_payroll_by_months_tmp_index', $data, 'hr_payroll_by_month');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=hr_payroll_by_month&a=by_month");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view('home', 'pageError');
}







