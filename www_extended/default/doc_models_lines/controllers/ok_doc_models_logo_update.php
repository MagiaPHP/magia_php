<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$web = (isset($_REQUEST["web"])) ? clean($_REQUEST["web"]) : false;
// url del logo 
$file = (isset($_REQUEST["file"])) ? clean($_REQUEST["file"]) : false;
// desde arriba
$x = (isset($_REQUEST["x"])) ? clean($_REQUEST["x"]) : false;
$y = (isset($_REQUEST["y"])) ? clean($_REQUEST["y"]) : false;
$w = (isset($_REQUEST["w"])) ? clean($_REQUEST["w"]) : false;
$h = (isset($_REQUEST["h"])) ? clean($_REQUEST["h"]) : null;
$type = (isset($_REQUEST["type"])) ? clean($_REQUEST["type"]) : null;
$link = (isset($_REQUEST["link"])) ? clean($_REQUEST["link"]) : null;
$show = (isset($_REQUEST["show"])) ? clean($_REQUEST["show"]) : null;

$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$logo = array(
    'file' => 'logo.jog',
    'x' => $x,
    'y' => $y,
    'w' => $w,
    'h' => $h,
    'type' => $type,
    'link' => $link,
    'show' => $show,
);

$logo_json = json_encode($logo);

$error = array();

if (!$logo_json) {
    array_push($error, "logo_json is mandatory");
}

################################################################################
if (!$error) {

    _options_push('config_doc_models_logo', $logo_json, 'doc_models');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=doc_models&a=logo&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}

    