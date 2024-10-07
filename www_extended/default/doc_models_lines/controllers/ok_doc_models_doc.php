<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$orientation = (isset($_POST["orientation"])) ? clean($_POST["orientation"]) : false;
$unit = (isset($_POST["unit"])) ? clean($_POST["unit"]) : false;
$size = (isset($_POST["size"])) ? clean($_POST["size"]) : false;
//
$font = (isset($_POST["font"])) ? ($_POST["font"]) : false;
$format = (isset($_POST["format"])) ? ($_POST["format"]) : false;
$fontsize = (isset($_POST["fontsize"])) ? ($_POST["fontsize"]) : false;

$SetFont = (isset($_POST["SetFont"])) ? ($_POST["SetFont"]) : false;

$SetTextColor = (isset($_POST["SetTextColor"])) ? ($_POST["SetTextColor"]) : false;
$SetDrawColor = (isset($_POST["SetDrawColor"])) ? ($_POST["SetDrawColor"]) : false;
$SetFillColor = (isset($_POST["SetFillColor"])) ? ($_POST["SetFillColor"]) : false;

$guideLines = (isset($_POST["guideLines"])) ? ($_POST["guideLines"]) : false;
$guideLinesNumbers = (isset($_POST["guideLinesNumbers"])) ? ($_POST["guideLinesNumbers"]) : false;

// Valores por defecto 
$Cell = (isset($_POST["Cell"])) ? ($_POST["Cell"]) : false;

//
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$cell = array(
    'orientation' => $orientation,
    'unit' => $unit,
    'size' => $size,
    'font' => $font,
    'format' => $format,
    'fontsize' => $fontsize,
    'SetFont' => $SetFont,
    'SetTextColor' => $SetTextColor,
    'SetDrawColor' => $SetDrawColor,
    'SetFillColor' => $SetFillColor,
    'Cell' => $Cell,
    
    'guideLines' => $guideLines,
    'guideLinesNumbers' => $guideLinesNumbers,
);

$cell_json = json_encode($cell);

$error = array();

if (!$cell_json) {
    array_push($error, "$cell_json is mandatory");
}

################################################################################
if (!$error) {


    _options_push('config_doc_models_doc', $cell_json, 'doc_models');

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=doc_models&a=doc&sms=1");
            break;
    }
} else {
    include view('home', 'pageError');
}

    