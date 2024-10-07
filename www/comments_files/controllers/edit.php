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
if (!comments_files_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# CONDICIONAL
################################################################################
if (!comments_files_field_id("id", $id)) {
    array_push($error, "id not exist");
}
################################################################################
################################################################################
################################################################################
if (!$error) {
    $comments_files = comments_files_details($id);

    include view("comments_files", "edit");
} else {

    include view("home", "pageError");
}

