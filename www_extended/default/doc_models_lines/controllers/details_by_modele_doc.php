<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$update = (isset($_GET["update"])) ? clean($_GET["update"]) : false;
$doc = (isset($_GET["doc"])) ? clean($_GET["doc"]) : false;
//$doc = (_options_option('ok_doc_model_working_doc')) ?? null;
$modele = _options_option("doc_model") ?? null;
$error = array();

################################################################################
# Required
if (!$doc) {
    array_push($error, 'Doc is mandatory');
}
if (!$modele) {
    array_push($error, 'Modele is mandatory');
}
################################################################################
# Format
################################################################################
# Condicional
################################################################################
// actualizo el documento actual que estoy trabajando

$doc_models_lines = doc_models_lines_search_by_modele_doc($modele, $doc);

// al entrar a esta pagina 
// si $update esiste y si $update es 1 actualizo el documento de trabajp
if (isset($update) && $update) {
    _options_push('config_doc_model_working_doc', 'doc_model', $doc);
    
    
    
}






include view("doc_models_lines", "details_by_modele_doc");

