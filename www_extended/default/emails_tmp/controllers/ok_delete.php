<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? ($_REQUEST["redi"]) : false;
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
if (!emails_tmp_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    emails_tmp_delete_by_id_contact_id(
            $id, $u_id
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=" . $redi["c"] . "&a=" . $redi["a"] . " ");
            break;

        case 3:
            header("Location: index.php?c=emails&a=config_tmp_emails");
            break;

        default:
            header("Location: index.php?c=emails_tmp");
            break;
    }
} else {

    include view("home", "pageError");
}  
