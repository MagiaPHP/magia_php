<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$line = (isset($_REQUEST["line"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["line"]) : false;

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
if (!forms_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!forms_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $form_edit = new Forms2();
    $form_edit->setForms($id);
    $form_edit->add_lines();

//    vardump($form_edit);
//    if ($line) {
//        $fl = new Forms_lines();
//        $fl->setForms_lines(forms_lines_search_by_form_line($forms->getId(), $line)['id']);
//    }

    include view("forms", "edit");
} else {
    include view("home", "pageError");
}    


