<?php

/**
if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$json = (!empty($_POST["json"])) ? ($_POST["json"]) : false;

$json_array = json_decode($json, true);

////////////////////////////////////////////////////////////////////////////////
$name = $json_array['name'];
$description = $json_array['description'];
$params = json_encode($json_array['params']);
$author = $json_array['author'];
$author_email = $json_array['author_email'];
$url = $json_array['url'];
$version = $json_array['version'];
$order_by = $json_array['order_by'];
$status = $json_array['status'];
$lines = $json_array['lines'];

################################################################################
if (!$error) {

    try {
        // agrego el modelo 
        doc_models_add($name, $description, $params, $author, $author_email, $url, $version, 1, 1);
        //
        // hago un bucle y a cada vuelta agrego la linea correspondeinte 
        foreach ($lines as $key => $line) {

            $line_modele = $line["modele"];
            $line_doc = $line["doc"];
            $line_section = $line["section"];
            $line_element = $line["element"];
            $line_name = $line["name"];
            $line_params = json_encode($line["params"]);
            $line_order_by = $line["order_by"];
            $line_status = $line["status"];

            doc_models_lines_add($line_modele, $line_doc, $line_section, $line_element, $line_name, $line_params, $line_order_by, $line_status);
        }
//        
    } catch (Exception $exc) {
        echo $exc->getMessage();
    }
}



header("Location: index.php?c=doc_models");
