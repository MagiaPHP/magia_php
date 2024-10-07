<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$data = (isset($_REQUEST["data"])) ? clean($_REQUEST["data"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : 1;
$error = array();

if (!$data) {
    array_push($error, "Data is mandatory");
}


################################################################################
if (!$error) {

    _options_push("config_credit_notes_id_format", $data, 'credit_notes');

    switch ($redi) {
        case 1:
            header("Location: index.php?c=credit_notes");
            break;

        default:
            header("Location: index.php?c=config&a=credit_notes_id_format&sms=1");

            break;
    }
} else {

    include view('home', 'pageError');
}

                