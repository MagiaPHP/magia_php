<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
//$in_out = (isset($_REQUEST["in_out"]) && $_REQUEST["in_out"] !="" )      ? clean($_REQUEST["in_out"]) : false;

$error = array();

###############################################################################
# REQUERIDO
################################################################################
if (!$id) {
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!banks_lines_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!banks_lines_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $banks_lines = new Banks_lines();
    $banks_lines->setBanks_lines($id);

    if ($banks_lines->getTotal() >= 0) {
        $banks_lines->setType('+');
    }


    if ($banks_lines->getTotal() < 0) {

        $banks_lines->setType('-');
    }



    include view("banks_lines", "details");
} else {
    include view("home", "pageError");
}    

