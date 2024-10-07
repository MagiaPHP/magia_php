<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$lines = (isset($_REQUEST["line"])) ? clean($_REQUEST["line"]) : false;

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;



$data_json = json_encode($lines);

$error = array();

if (!$data_json) {
    array_push($error, "data_json is mandatory");
}

################################################################################
if (!$error) {


    _options_push('config_doc_models_items_title', $data_json, 'doc_models');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=doc_models&a=items_title&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}

    