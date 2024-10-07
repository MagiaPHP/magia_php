<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modele = (isset($_REQUEST["modele"]) && $_REQUEST["modele"] != "" && $_REQUEST["modele"] != "null" ) ? clean($_REQUEST["modele"]) : null;
$doc = (isset($_REQUEST["doc"]) && $_REQUEST["doc"] != "" && $_REQUEST["doc"] != "null" ) ? clean($_REQUEST["doc"]) : null;
$section = (isset($_REQUEST["section"]) && $_REQUEST["section"] != "" && $_REQUEST["section"] != "null" ) ? clean($_REQUEST["section"]) : null;
$element = (isset($_REQUEST["element"]) && $_REQUEST["element"] != "" ) ? clean($_REQUEST["element"]) : null;
$name = (isset($_REQUEST["name"]) && $_REQUEST["name"] != "" && $_REQUEST["name"] != "null" ) ? clean($_REQUEST["name"]) : null;

$p = '{"SetFont":{"font":"Arial","format":{"R":"R"},"fontsize":"10"},"Cell":{"label":"' . $name . '","x":"","y":"","w":"50","h":"5","border":{"L":"L","R":"R","B":"B","T":"T"},"ln":"1","align":"C","link":""},"SetTextColor":{"r":"","g":"","b":""},"SetDrawColor":{"r":"","g":"","b":""},"SetFillColor":{"r":"","g":"","b":""},"AddPage":false,"Line":{"x1":10,"y1":20,"x2":100,"y2":100},"hidden":false}';

$params = (isset($_REQUEST["params"]) && $_REQUEST["params"] != "" && $_REQUEST["params"] != "null" ) ? clean($_REQUEST["params"]) : $p;
$order_by = (isset($_REQUEST["order_by"]) && $_REQUEST["order_by"] != "" ) ? clean($_REQUEST["order_by"]) : 1;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "" ) ? clean($_REQUEST["status"]) : 1;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : false;
$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$modele) {
    array_push($error, '$modele is mandatory');
}
if (!$section) {
    array_push($error, '$section is mandatory');
}
if (!$doc) {
    array_push($error, '$doc is mandatory');
}
if (!$element) {
    array_push($error, '$element is mandatory');
}
if (!$name) {
    array_push($error, '$name is mandatory');
}
//if (!$params) {
//    array_push($error, '$params is mandatory');
//}
if (!$order_by) {
    array_push($error, '$order_by is mandatory');
}
if (!$status) {
    array_push($error, '$status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!doc_models_lines_is_modele($modele)) {
    array_push($error, '$modele format error');
}
if (!doc_models_lines_is_section($section)) {
    array_push($error, '$section format error');
}
if (!doc_models_lines_is_doc($doc)) {
    array_push($error, '$doc format error');
}
if (!doc_models_lines_is_element($element)) {
    array_push($error, '$element format error');
}
if (!doc_models_lines_is_name($name)) {
    array_push($error, '$name format error');
}
//if (!doc_models_lines_is_params($params)) {
//    array_push($error, '$params format error');
//}
if (!doc_models_lines_is_order_by($order_by)) {
    array_push($error, '$order_by format error');
}
if (!doc_models_lines_is_status($status)) {
    array_push($error, '$status format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//    $params = doc_elements_search_by_unique('params', 'element', 'Cell');
$params = doc_elements_search_by_unique('params', 'element', $element);

################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    $lastInsertId = doc_models_lines_add(
            $modele, $doc, $section, $element, $name, $params, $order_by, $status
    );

    switch ($redi) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=doc_models_lines&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=doc_models&a=edit&id=$lastInsertId");
            break;

        case 4:
            header("Location: index.php?c=doc_models&a=edit&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=doc_models_lines");
            break;
    }
} else {

    include view("home", "pageError");
}


