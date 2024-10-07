<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$logo_json = _options_option('config_doc_models_logo');
$logo = json_decode($logo_json, true);

include view("doc_models", "logo");

