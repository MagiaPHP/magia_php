<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

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
if (!docu_blocs_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!docu_blocs_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $docu_blocs = new Docu_blocs();
    $docu_blocs->setDocu_blocs($id);

    $docu = new Docu();
    $docu->setDocu($docu_blocs->getDocu_id());
    // se usa para las imagednes
    $controllers = (isset($_REQUEST["controllers"]) && $_REQUEST["controllers"] != "" ) ? clean($_REQUEST["controllers"]) : $docu->getControllers();

    include view("docu_blocs", "edit");
} else {
    include view("home", "pageError");
}    


