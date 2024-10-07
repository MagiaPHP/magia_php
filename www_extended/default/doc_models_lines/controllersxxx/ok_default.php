<?php

if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : null;
$element = (isset($_REQUEST["element"]) && $_REQUEST["element"] != "" ) ? clean($_REQUEST["element"]) : null;
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
//vardump(array($id,$element));
//die(); 

if (!$error) {

    // copia
    doc_models_lines_default(
            $id, $element
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=doc_models&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=doc_models&a=edit&id=$id");
            break;

        default:
            header("Location: index.php?c=doc_models_lines");
            break;
    }
} else {

    include view("home", "pageError");
}


