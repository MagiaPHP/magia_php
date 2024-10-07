<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modele = (isset($_GET["modele"])) ? clean($_GET["modele"]) : false;
$doc = (isset($_GET["doc"])) ? clean($_GET["doc"]) : 'default';
$element = doc_models_lines_search_modele_doc($modele, $doc);

$doc_models = doc_models_details(doc_models_search_by_unique('id', 'name', $modele));

$params = json_decode($doc_models['params'], true);

include view("doc_models", "doc");

