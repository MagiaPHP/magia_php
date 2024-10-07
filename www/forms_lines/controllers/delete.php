<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"]) && $_GET["id"] != "" ) ? clean($_GET["id"]) : false;

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
if (!forms_lines_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!forms_lines_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
if (!$error) {
    $forms_lines = new Forms_lines();
    $forms_lines->setForms_lines($id);

    include view("forms_lines", "delete");
} else {
    include view("home", "pageError");
}    

