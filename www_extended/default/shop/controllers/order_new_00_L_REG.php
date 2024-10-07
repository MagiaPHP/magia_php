<?php

if (!modules_field_module('status', 'audio')) {
    header("Location: index.php?c=shop&a=module_disabled");
    die("Error has permission ");
}

$type_l_id = (isset($_SESSION['order']['type_id']['L'])) ? $_SESSION['order']['type_id']['L'] : null;
$modele_l_id = (isset($_SESSION['order']['modele_id']['L'])) ? $_SESSION['order']['modele_id']['L'] : null;
$mesure_l_id = (isset($_SESSION['order']['mesure_id']['L'])) ? $_SESSION['order']['mesure_id']['L'] : null;
$forme_l_id = (isset($_SESSION['order']['forme_id']['L'])) ? $_SESSION['order']['forme_id']['L'] : null;
$material_l_id = (isset($_SESSION['order']['material_id']['L'])) ? $_SESSION['order']['material_id']['L'] : null;
$colour_l_id = (isset($_SESSION['order']['colour_id']['L'])) ? $_SESSION['order']['colour_id']['L'] : null;
$perte_l_id = (isset($_SESSION['order']['perte_id']['L'])) ? $_SESSION['order']['perte_id']['L'] : null;
$marque_l_id = (isset($_SESSION['order']['marque_id']['L'])) ? $_SESSION['order']['marque_id']['L'] : null;
$ecouteur_l_id = (isset($_SESSION['order']['ecouteur_id']['L'])) ? $_SESSION['order']['ecouteur_id']['L'] : null;
$event_l_id = (isset($_SESSION['order']['event_id']['L'])) ? $_SESSION['order']['event_id']['L'] : null;
$diametre_l_id = (isset($_SESSION['order']['diametre_id']['L'])) ? $_SESSION['order']['diametre_id']['L'] : null;
$option_l_id = (isset($_SESSION['order']['option_id']['L'])) ? $_SESSION['order']['option_id']['L'] : null;
$longuer_l_id = (isset($_SESSION['order']['longuer_id']['L'])) ? $_SESSION['order']['longuer_id']['L'] : null;
$constitution_l_id = (isset($_SESSION['order']['constitution_id']['L'])) ? $_SESSION['order']['constitution_id']['L'] : null;
//************************
//$tmf_l_id = _types_modeles_formes_search_by_type_modele_forme($type_l_id, $modele_l_id, $forme_l_id)[0]['id'];   


$_types_modeles_formes_search_by_type_modele_forme = _types_modeles_formes_search_by_type_modele_forme($type_l_id, $modele_l_id, $forme_l_id);

if ($_types_modeles_formes_search_by_type_modele_forme) {
    $tmf_l_id = $_types_modeles_formes_search_by_type_modele_forme[0]['id'];
} else {
    $tmf_l_id = null;
}




//=======
//$tmf_l_id = 
//        (
//        _types_modeles_formes_search_by_type_modele_forme($type_l_id, $modele_l_id, $forme_l_id)[0]['id'])
//        ?
//        _types_modeles_formes_search_by_type_modele_forme($type_l_id, $modele_l_id, $forme_l_id)[0]['id']
//        : null
//        ;   
//>>>>>>> c0cf7bf2d467551bf44ad6e616072bf87102fe1e


$typeMarque_l_id = _types_marques_list_by_type_marque($type_l_id, $marque_l_id, 1);
