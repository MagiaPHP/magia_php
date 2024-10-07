<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$cell_selected = (isset($_REQUEST["cell_selected"]) && $_REQUEST["cell_selected"] != "" ) ? clean($_REQUEST["cell_selected"]) : false;

$error = array();

###############################################################################
if (!$id) {
    array_push($error, 'Id is mandatory');
}
################################################################################
if (!doc_models_lines_details($id)) {
    array_push($error, 'The id does not exist');
}
################################################################################
################################################################################
################################################################################
$modele = doc_models_lines_field_id('modele', $id);
$doc = doc_models_lines_field_id('doc', $id);
$element = doc_models_lines_details($id);
$params = json_decode($element['params'], true);

//$doc_models_lines = new Doc_models_lines(); 
//$doc_models_lines->setDoc_models_lines($id); 
################################################################################

if (!$error) {
    include view("doc_models_lines", "edit");
} else {

    include view("home", "pageError");
}
