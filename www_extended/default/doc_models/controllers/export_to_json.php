<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$doc_model = (isset($_GET["doc_model"])) ? clean($_GET["doc_model"]) : false;

$doc = (isset($_GET["doc"])) ? clean($_GET["doc"]) : 'invoices';

$element = doc_models_lines_search_modele_doc($doc_model, $doc);

################################################################################
################################################################################
################################################################################
################################################################################
$doc_models = doc_models_details(doc_models_search_by_unique('id', 'name', $doc_model));



$params_json = $doc_models['params'];
$params_array = json_decode($params_json, true);

$doc_models['params'] = $params_array;
$doc_models[3] = $params_array;

// agrego las lineas
$doc_models_lines = doc_models_lines_by_modele($doc_model);

$i = 0;
foreach ($doc_models_lines as $key => $line) {

//    vardump($line); 

    $doc_models["lines"][$i]['modele'] = $line["modele"];
    $doc_models["lines"][$i]['doc'] = $line["doc"];
    $doc_models["lines"][$i]['section'] = $line["section"];
    $doc_models["lines"][$i]['element'] = $line["element"];
    $doc_models["lines"][$i]['name'] = $line["name"];
    $doc_models["lines"][$i]['params'] = json_decode($line["params"], true);
    $doc_models["lines"][$i]['order_by'] = $line["order_by"];
    $doc_models["lines"][$i]['status'] = $line["status"];
    $i++;
}

//vardump($doc_models);
//vardump($doc_models['lines']);
//// convierto todo en json
$doc_models_json = json_encode($doc_models);



// aficho 
include view("doc_models", "export_to_json");

