<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;

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
if (!projects_status_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!projects_status_field_id("id", $id)) {
    array_push($error, "Id is mandatory");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {
    $projects_status = new Projects_status();
    $projects_status->setProjects_status($id);

    include view("projects_status", "details");
} else {
    include view("home", "pageError");
}    

