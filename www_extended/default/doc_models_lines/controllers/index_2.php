<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}



$error = array();
$doc_models = null;
$doc_models = doc_models_list();

include view("doc_models", "index");

if ($debug) {
    include "www/doc_models/views/debug.php";
}