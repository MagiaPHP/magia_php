<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modele = (isset($_REQUEST["modele"]) && $_REQUEST["modele"] != "" ) ? clean($_REQUEST["modele"]) : false;
$doc = (isset($_REQUEST["doc"]) && $_REQUEST["doc"] != "" ) ? clean($_REQUEST["doc"]) : false;
//
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
$error = array();
###############################################################################
# REQUERIDO
################################################################################
if (!$modele) {
    array_push($error, "modele Don't send");
}
if (!$doc) {
    array_push($error, "doc Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!doc_models_is_name($modele)) {
    array_push($error, 'Id format error');
}
if (!doc_docs_is_doc($doc)) {
    array_push($error, 'doc format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    doc_models_lines_delete_by_modele_doc(
            $modele, $doc
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=" . $redi["c"] . "&a=" . $redi["a"] . "#2 ");
            break;

        case 3:
            header("Location: index.php?c=doc_models_lines&a=search&modele=a&=invoices#3 ");
            break;

        case 4:
            header("Location: index.php?c=doc_models_lines&a=search&modele=" . $redi["modele"] . "&doc=" . $redi["doc"] . "#4");
            break;

        default:
            header("Location: index.php?c=doc_models_lines");
            break;
    }
} else {

    include view("home", "pageError");
}  
