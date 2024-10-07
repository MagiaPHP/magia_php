<?php

/**
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modele = (isset($_POST["modele"])) ? clean($_POST["modele"]) : false;
//
$orientation = (isset($_POST["orientation"])) ? clean($_POST["orientation"]) : false;
$unit = (isset($_POST["unit"])) ? clean($_POST["unit"]) : false;
$size = (isset($_POST["size"])) ? clean($_POST["size"]) : false;
//
//$font = (isset($_POST["font"])) ? ($_POST["font"]) : false;
//$format = (isset($_POST["format"])) ? ($_POST["format"]) : false;
//$fontsize = (isset($_POST["fontsize"])) ? ($_POST["fontsize"]) : false;
//
$SetFont = (isset($_POST["SetFont"])) ? ($_POST["SetFont"]) : false;
//
$SetTextColor = (isset($_POST["SetTextColor"])) ? ($_POST["SetTextColor"]) : false;
$SetDrawColor = (isset($_POST["SetDrawColor"])) ? ($_POST["SetDrawColor"]) : false;
$SetFillColor = (isset($_POST["SetFillColor"])) ? ($_POST["SetFillColor"]) : false;
//
$guideLines = (isset($_POST["guideLines"])) ? ($_POST["guideLines"]) : false;
$guideLinesNumbers = (isset($_POST["guideLinesNumbers"])) ? ($_POST["guideLinesNumbers"]) : false;
// Valores por defecto 
$Cell = (isset($_POST["Cell"])) ? ($_POST["Cell"]) : false;
//
$redi = (isset($_POST["redi"])) ? clean($_POST["redi"]) : false;

$doc = array(
    'orientation' => $orientation,
    'unit' => $unit,
    'size' => $size,
    'SetFont' => $SetFont,
    'SetTextColor' => $SetTextColor,
    'SetDrawColor' => $SetDrawColor,
    'SetFillColor' => $SetFillColor,
    'Cell' => $Cell,
    
    'guideLines' => $guideLines,
    'guideLinesNumbers' => $guideLinesNumbers,
);

$doc_json = json_encode($doc);

$error = array();

if (!$doc_json) {
    array_push($error, "$doc_json is mandatory");
}

################################################################################
if (!$error) {

    doc_models_update_params($modele, $doc_json);

    switch ($redi) {
        case 1:
            break;

        default:
            header("Location: index.php?c=doc_models&a=doc&modele=$modele");
            break;
    }
} else {
    include view('home', 'pageError');
}

    