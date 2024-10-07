<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : 1;

$error = array();

$data = intval($data);

################################################################################
################################################################################
################################################################################


if (!$error) {

    // si no existe lo crea
    _options_push('config_invoices_checked_by_default', $data, 'invoices');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=invoices");
            break;

        default:
            header("Location: index.php?c=config&a=invoices_checked_by_default&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







