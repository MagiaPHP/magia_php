<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$error = array();

################################################################################
# Required
if (!$id) {
    array_push($error, 'Id is mandatory');
}
################################################################################
# Format
if (!doc_models_is_id($id)) {
    array_push($error, 'Id format error');
}
################################################################################
# 
if (!doc_models_details($id)) {
    array_push($error, 'Id not present in DB');
}
################################################################################

$doc_models = new Doc_models();
$doc_models->setDoc_models($id);

include view("doc_models_lines", "details");

