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
if (!$error) {
    $docu = new Docu();
    $docu->setDocu($id);

    $controllers = (isset($_REQUEST["controllers"]) && $_REQUEST["controllers"] != "" ) ? clean($_REQUEST["controllers"]) : $docu->getControllers();

//    vardump($controllers); 


    include view("docu", "edit");
} else {
    include view("home", "pageError");
}    


