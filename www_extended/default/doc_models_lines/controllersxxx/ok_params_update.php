<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
// Recolection vars
$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "") ? clean($_REQUEST["id"]) : false;

$element = doc_models_lines_details($id);

$name = (isset($_POST["name"])) ? clean($_POST["name"]) : null;
$modele = (isset($_POST["modele"])) ? clean($_POST["modele"]) : null;
$section = (isset($_POST["section"])) ? clean($_POST["section"]) : 'body';
$order_by = (isset($_POST["order_by"])) ? clean($_POST["order_by"]) : 1;
//
$Cell = (isset($_POST["Cell"])) ? clean($_POST["Cell"]) : false;
$MultiCell = (isset($_POST["MultiCell"])) ? clean($_POST["MultiCell"]) : false;
$Write = (isset($_POST["Write"])) ? clean($_POST["Write"]) : false;
$Image = (isset($_POST["Image"])) ? clean($_POST["Image"]) : false;
$QR = (isset($_POST["QR"])) ? clean($_POST["QR"]) : false;
$QR_background = (isset($_POST["QR_background"])) ? clean($_POST["QR_background"]) : false;
$QR_color = (isset($_POST["QR_color"])) ? clean($_POST["QR_color"]) : false;
$QR_content = (isset($_POST["QR_content"])) ? clean($_POST["QR_content"]) : false;

//
$SetFont = (isset($_POST["SetFont"])) ? clean($_POST["SetFont"]) : null;
$SetTextColor = (isset($_POST["SetTextColor"])) ? clean($_POST["SetTextColor"]) : null;
$SetDrawColor = (isset($_POST["SetDrawColor"])) ? clean($_POST["SetDrawColor"]) : null;
$SetFillColor = (isset($_POST["SetFillColor"])) ? clean($_POST["SetFillColor"]) : null;
//
$AddPage = (isset($_POST["AddPage"])) ? clean($_POST["AddPage"]) : false;

$Line = (isset($_POST["Line"])) ? clean($_POST["Line"]) : array("x1" => 10, "y1" => 20, "x2" => 100, "y2" => 100);
$Ln = (isset($_POST["Ln"])) ? clean($_POST["Ln"]) : null;
$Link = (isset($_POST["Link"])) ? clean($_POST["Link"]) : null;
$Rect = (isset($_POST["Rect"])) ? clean($_POST["Rect"]) : null;
$Text = (isset($_POST["Text"])) ? clean($_POST["Text"]) : null;
//
//
$hidden = (isset($_POST["hidden"]) && $_POST["hidden"] != "") ? clean($_POST["hidden"]) : 0;

$redi = (isset($_POST["redi"]) && $_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;

$error = array();

switch ($element['element']) {
    case 'Cell':
        $data = array(
            'SetFont' => $SetFont,
            'Cell' => $Cell,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'MultiCell':
        $data = array(
            'SetFont' => $SetFont,
            'MultiCell' => $MultiCell,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'Write':
        $data = array(
            'SetFont' => $SetFont,
            'Write' => $Write,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'Image':
        $data = array(
            'SetFont' => $SetFont,
            'Image' => $Image,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'QR':
        $data = array(
            'SetFont' => $SetFont,
            'QR' => $QR,
            'QR_content' => $QR_content,
            'QR_background' => $QR_background,
            'QR_color' => $QR_color,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'AddPage':
        $data = array(
            'SetFont' => $SetFont,
            'AddPage' => $AddPage,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'Line':
        $data = array(
            'Line' => $Line,
            'SetFont' => $SetFont,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'Link':
        $data = array(
            'Link' => $Link,
            'SetFont' => $SetFont,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'Ln':
        $data = array(
            'SetFont' => $SetFont,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
            'Ln' => $Ln,
        );
        break;

    case 'Rect':
        $data = array(
            'SetFont' => $SetFont,
            'Rect' => $Rect,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    case 'Text':
        $data = array(
            'SetFont' => $SetFont,
            'Text' => $Text,
            'SetTextColor' => $SetTextColor,
            'SetDrawColor' => $SetDrawColor,
            'SetFillColor' => $SetFillColor,
            'hidden' => $hidden,
        );
        break;

    default:
        break;
}



$data_json = json_encode($data);

################################################################################
# REQUIRED
################################################################################
###############################################################################
###############################################################################
# FORMAT
###############################################################################
//if (!doc_models_lines_is_modele($modele)) {
//    array_push($error, '$modele format error');
//}
//if (!doc_models_lines_is_element($element)) {
//    array_push($error, '$element format error');
//}
//if (!doc_models_lines_is_name($name)) {
//    array_push($error, '$name format error');
//}
//if (!doc_models_lines_is_params($params)) {
//    array_push($error, '$params format error');
//}
//if (!doc_models_lines_is_order_by($order_by)) {
//    array_push($error, '$order_by format error');
//}
//if (!doc_models_lines_is_status($status)) {
//    array_push($error, '$status format error');
//}
###############################################################################
# CONDITIONAL
################################################################################
//if( doc_models_lines_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################


if (!$error) {

    // saca el orden mas alto y aumenta uno 


    doc_models_lines_update_params($id, $data_json);

    if ($name) {
        doc_models_lines_update_field($id, 'name', $name);
    }

    if ($modele) {
        doc_models_lines_update_field($id, 'modele', $modele);
    }

    if ($section) {
        doc_models_lines_update_field($id, 'section', $section);
    }

    if ($order_by) {
        doc_models_lines_update_field($id, 'order_by', $order_by);
    }


    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        default:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;
    }
} else {

    include view("home", "pageError");
}
