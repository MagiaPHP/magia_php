<?php

if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$type_r_id = (isset($_SESSION['order']['type_id']['R'])) ? $_SESSION['order']['type_id']['R'] : null;
$modele_r_id = (isset($_SESSION['order']['modele_id']['R'])) ? $_SESSION['order']['modele_id']['R'] : null;
$mesure_r_id = (isset($_SESSION['order']['mesure_id']['R'])) ? $_SESSION['order']['mesure_id']['R'] : null;
$forme_r_id = (isset($_SESSION['order']['forme_id']['R'])) ? $_SESSION['order']['forme_id']['R'] : null;
$material_r_id = (isset($_SESSION['order']['material_id']['R'])) ? $_SESSION['order']['material_id']['R'] : null;
$colour_r_id = (isset($_SESSION['order']['colour_id']['R'])) ? $_SESSION['order']['colour_id']['R'] : null;
$perte_r_id = (isset($_SESSION['order']['perte_id']['R'])) ? $_SESSION['order']['perte_id']['R'] : null;
$marque_r_id = (isset($_SESSION['order']['marque_id']['R'])) ? $_SESSION['order']['marque_id']['R'] : null;
$ecouteur_r_id = (isset($_SESSION['order']['ecouteur_id']['R'])) ? $_SESSION['order']['ecouteur_id']['R'] : null;
$event_r_id = (isset($_SESSION['order']['event_id']['R'])) ? $_SESSION['order']['event_id']['R'] : null;
$diametre_r_id = (isset($_SESSION['order']['diametre_id']['R'])) ? $_SESSION['order']['diametre_id']['R'] : null;
$option_r_id = (isset($_SESSION['order']['option_id']['R'])) ? $_SESSION['order']['option_id']['R'] : null;
$longuer_r_id = (isset($_SESSION['order']['longuer_id']['R'])) ? $_SESSION['order']['longuer_id']['R'] : null;
$constitution_r_id = (isset($_SESSION['order']['constitution_id']['R'])) ? $_SESSION['order']['constitution_id']['R'] : null;

$_types_modeles_formes_search_by_type_modele_forme = _types_modeles_formes_search_by_type_modele_forme($type_r_id, $modele_r_id, $forme_r_id);

if ($_types_modeles_formes_search_by_type_modele_forme) {
    $tmf_r_id = $_types_modeles_formes_search_by_type_modele_forme[0]['id'];
} else {
    $tmf_r_id = null;
}

//$tmf_r_id = _types_modeles_formes_search_by_type_modele_forme($type_r_id, $modele_r_id, $forme_r_id)[0]['id'];



$typeMarque_r_id = _types_marques_list_by_type_marque($type_r_id, $marque_r_id, 1);
