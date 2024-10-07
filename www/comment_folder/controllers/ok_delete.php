<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_POST["id"]) && $_POST["id"] != "" ) ? clean($_POST["id"]) : false;

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
if (!comment_folder_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################

if (!$error) {

    comment_folder_delete(
            $id
    );

    header("Location: index.php?c=comment_folder");
}

include view("comment_folder", "delete");
