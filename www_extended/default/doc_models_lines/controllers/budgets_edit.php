<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;

$element = doc_models_lines_details($id);

$params = json_decode($element['params'], true);

include view("doc_models_lines", "budgets_edit");

