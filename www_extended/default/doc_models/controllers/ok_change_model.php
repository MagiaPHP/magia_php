<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modele = (isset($_GET["modele"])) ? clean($_GET["modele"]) : false;

$error = array();
################################################################################

if (!$modele) {
    array_push($error, "modele Don't send");
}
################################################################################
################################################################################

if (!$error) {

    _options_update("doc_model", $modele);

    header("Location: index.php?c=doc_models");
} else {
    include view("home", "pageError");
}