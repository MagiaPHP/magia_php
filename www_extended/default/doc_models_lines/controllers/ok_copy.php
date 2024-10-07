<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : null;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;

$error = array();
################################################################################
# REQUIRED
################################################################################
if (!$id) {
    array_push($error, '$modele is mandatory');
}
###############################################################################
# FORMAT
###############################################################################
if (!doc_models_lines_is_id($id)) {
    array_push($error, 'id format error');
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
if (!$error) {

    // copia
    $lastInsertId = doc_models_lines_copy(
            $id
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php#1");
            break;

        case 2:
            header("Location: index.php?c=doc_models_lines&a=details&id=$lastInsertId#2");
            break;

        case 3:
            header("Location: index.php?c=doc_models_lines&a=edit&id=$lastInsertId#3");
            break;

        default:
            header("Location: index.php?c=doc_models_lines#default");
            break;
    }
} else {

    include view("home", "pageError");
}


