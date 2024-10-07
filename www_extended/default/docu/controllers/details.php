<?php

//if (!permissions_has_permission($u_rol, $c, "read")) {
//    header("Location: index.php?c=home&a=no_access");
//    die("Error has permission ");
//}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$insert = (isset($_REQUEST["insert"]) && $_REQUEST["insert"] != "" ) ? clean($_REQUEST["insert"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "ID Don't send");
}
###############################################################################
# FORMAT
################################################################################
if (!docu_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!docu_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
//    $docu = docu_details($id);

    $docu = new Docu();
    $docu->setDocu($id);

    if ($insert) {
        include view("docu", "details_insert");
    } else {
        include view("docu", "details");
    }
} else {
    include view("home", "pageError");
}

