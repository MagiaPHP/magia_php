<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$ids = (isset($_REQUEST["ids"]) && $_REQUEST["ids"] != "") ? ($_REQUEST["ids"]) : false;
$SetFillColor = (isset($_REQUEST["SetFillColor"]) && $_REQUEST["SetFillColor"] != "") ? ($_REQUEST["SetFillColor"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();

foreach ($ids as $key => $id) {
    $element = doc_models_lines_details($id);
    //vardump($element);
    ($element['params']);
    (json_decode($element['params'], true));
    ($cell = json_decode($element['params'], true));
    $cell['SetFillColor'] = $SetFillColor;
    //vardump($cell);  
    $data_json = json_encode($cell);
    //vardump($data_json);
    doc_models_lines_update_params($id, $data_json);
}

################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;
        case 4:
            header("Location: index.php?c=doc_models&a=edit&id=$redi[id]");
            break;

        default:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
