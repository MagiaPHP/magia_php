<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$data = (isset($_POST["data"])) ? clean($_POST["data"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : 1;

$error = array();

if (!$data) {
    array_push($error, 'Data is mandatory');
}

if ($data) {
    $data = json_encode($data);
}

################################################################################
################################################################################
################################################################################
if (!$error) {

    // si no existe lo crea
    _options_push('config_app_budgets_status_to_show', $data, 'app');

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=config&a=app_budgets&sms=1");
            break;
    }
} else {

    include view('home', 'pageError');
}







