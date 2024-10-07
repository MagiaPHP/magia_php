<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$modele = (isset($_REQUEST["modele"]) && $_REQUEST["modele"] != "" ) ? clean($_REQUEST["modele"]) : null;
$doc = (isset($_REQUEST["doc"]) && $_REQUEST["doc"] != "" ) ? clean($_REQUEST["doc"]) : null;
$new_doc = (isset($_REQUEST["new_doc"]) && $_REQUEST["new_doc"] != "" ) ? clean($_REQUEST["new_doc"]) : null;
//
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;

$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$modele) {
    array_push($error, '$modele is mandatory');
}
if (!$doc) {
    array_push($error, '$doc is mandatory');
}
###############################################################################
# FORMAT
###############################################################################
if (!doc_models_is_name($modele)) {
    array_push($error, 'id format error');
}
if (!doc_docs_is_doc($doc)) {
    array_push($error, '$doc format error');
}

###############################################################################
# CONDITIONAL
################################################################################
//if( doc_models_lines_search($status)){
//array_push($error, "That text with that context the database already exists");
//}
################################################################################
################################################################################
################################################################################
################################################################################
//vardump($_REQUEST);
//die();


if (!$error) {

    // copia
    $lastInsertId = doc_models_lines_copy_doc(
            $modele, $doc, $new_doc
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=doc_models&a=search&modele=$modele&doc=$doc");
            break;

        case 2:
            header("Location: index.php?c=doc_models_lines&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=doc_models&a=edit&id=$lastInsertId");
            break;

        default:
            header("Location: index.php?c=doc_models_lines");
            break;
    }
} else {

    include view("home", "pageError");
}


