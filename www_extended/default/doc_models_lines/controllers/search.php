<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

//$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$modele = (isset($_GET["modele"])) ? clean($_GET["modele"]) : false;
$doc = (isset($_GET["doc"])) ? clean($_GET["doc"]) : 'invoices';

$doc_models = doc_models_details(doc_models_search_by_unique('id', 'name', $modele));
//
//vardump($doc_models);
//
$element = doc_models_lines_search_modele_doc($modele, $doc);
$params_json = ($element['params']) ?? false;
$params = json_decode($params_json, true);

//$doc_models_lines = doc_models_lines_by_modele_doc($modele, $doc);
$doc_models_lines = doc_models_lines_by_modele($modele, $doc);

$export_array = array();

$export_array['doc_models']['name'] = $doc_models['name'];
$export_array['doc_models']['description'] = $doc_models['description'];
$export_array['doc_models']['params'] = json_decode($doc_models['params'], true);
$export_array['doc_models']['author'] = $doc_models['author'];
$export_array['doc_models']['author_email'] = $doc_models['author_email'];
$export_array['doc_models']['url'] = $doc_models['url'];
$export_array['doc_models']['version'] = $doc_models['version'];
$i = 0;
foreach ($doc_models_lines as $key => $line) {
    $export_array['doc_models_lines'][$i]['modele'] = $line['modele'];
    $export_array['doc_models_lines'][$i]['doc'] = $line['doc'];
    $export_array['doc_models_lines'][$i]['section'] = $line['section'];
    $export_array['doc_models_lines'][$i]['element'] = $line['element'];
    $export_array['doc_models_lines'][$i]['name'] = $line['name'];
    $export_array['doc_models_lines'][$i]['params'] = json_decode($line['params'], true);
    $export_array['doc_models_lines'][$i]['order_by'] = $line['order_by'];
    $export_array['doc_models_lines'][$i]['status'] = $line['status'];
    $i++;
}

//vardump(($export_array));

$export_json = json_encode($export_array);

//vardump($export_json);





include view("doc_models", "search");

