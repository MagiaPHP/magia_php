<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$ids = (isset($_REQUEST["ids"]) && $_REQUEST["ids"] != "") ? ($_REQUEST["ids"]) : false;
$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();

foreach ($ids as $key => $id) {
    $element = doc_models_lines_details($id);
    //vardump($element);
    ($element['params']);
    (json_decode($element['params'], true));
    ($cell = json_decode($element['params'], true));

    switch ($element['element']) {
        case 'Cell':
            $cell['Cell']['hidden'] = 1;
            break;
        case 'MultiCell':
            $cell['MultiCell']['hidden'] = 1;
            break;

        case 'Image':
            $cell['Image']['hidden'] = 1;
            break;

        case 'QR':
            $cell['QR']['hidden'] = 1;
            break;

        case 'Line':
            $cell['Line']['hidden'] = 1;
            break;

        case 'Link':
            $cell['Link']['hidden'] = 1;
            break;

        case 'Ln':
            $cell['Ln']['hidden'] = 1;
            break;

        case 'Rect':
            $cell['Rect']['hidden'] = 1;
            break;

        case 'Rect':
            $cell['Rect']['hidden'] = 1;
            break;

        case 'Text':
            $cell['Text']['hidden'] = 1;
            break;

        case 'Write':
            $cell['Write']['hidden'] = 1;
            break;

        case 'AddPage':
            $cell['AddPage']['hidden'] = 1;
            break;

        default:

            break;
    }

    //vardump($cell);  
    $data_json = json_encode($cell);
    //vardump($data_json);
    doc_models_lines_update_params($id, $data_json);
}


################################################################################
################################################################################
################################################################################
if (!$error) {

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php");
            break;

        case 5:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&$redi[params]&");
            break;

        default:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
