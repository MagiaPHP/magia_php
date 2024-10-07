<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
//  Cell(float w [, float h [, string txt [, mixed border [, int ln [, string align [, boolean fill [, mixed link]]]]]]]) 
// $w, $h, $txt, $border, $ln, $align, $fill, $link

$x = (isset($_REQUEST["x"])) ? clean($_REQUEST["x"]) : false;
$y = (isset($_REQUEST["y"])) ? clean($_REQUEST["y"]) : false;
$w = (isset($_REQUEST["w"])) ? clean($_REQUEST["w"]) : false;
$h = (isset($_REQUEST["h"])) ? clean($_REQUEST["h"]) : null;
$border = (isset($_REQUEST["border"])) ? clean($_REQUEST["border"]) : null;
$ln = (isset($_REQUEST["ln"])) ? clean($_REQUEST["ln"]) : null;
$align = (isset($_REQUEST["align"])) ? clean($_REQUEST["align"]) : null;
$fill = (isset($_REQUEST["fill"])) ? clean($_REQUEST["fill"]) : null;
$link = (isset($_REQUEST["link"])) ? clean($_REQUEST["link"]) : null;
$show = (isset($_REQUEST["show"])) ? clean($_REQUEST["show"]) : null;
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$data = array(
    'x' => $x,
    'y' => $y,
    'w' => $w,
    'h' => $h,
    'border' => $border,
    'ln' => $ln,
    'align' => $align,
    'fill' => $fill,
    'link' => $link,
    'show' => $show,
);

$data_json = json_encode($data);

$error = array();

if (!$data_json) {
    array_push($error, "data_json is mandatory");
}

################################################################################
if (!$error) {


    _options_push('config_doc_models_company', $data_json, 'doc_models');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=doc_models&a=company&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}

    