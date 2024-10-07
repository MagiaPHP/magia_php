<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$items = json_decode(_options_option('config_doc_models_items'), true);

$data_from_db = json_decode(_options_option('config_doc_models_items_title'), true);

include view("doc_models", "items_title");

