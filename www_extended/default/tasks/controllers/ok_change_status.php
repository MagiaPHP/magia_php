<?php

if (!permissions_has_permission($u_rol, $c, "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"]) && $_REQUEST["id"] != "" ) ? clean($_REQUEST["id"]) : false;
$status = (isset($_REQUEST["status"]) && $_REQUEST["status"] != "" ) ? clean($_REQUEST["status"]) : false;
$old_status = tasks_field_id('status', $id);
$redi = (isset($_REQUEST["redi"]) && $_REQUEST["redi"] != "" ) ? clean($_REQUEST["redi"]) : 1;

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
if (!tasks_is_id($id)) {
    array_push($error, 'Id format error');
}
if (!tasks_is_status($status)) {
    array_push($error, "status format error");
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################



if (!$error) {

    tasks_change_status(
            $id, $status
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks");
            break;

        case 2:
            header("Location: index.php?c=tasks&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks_status&a=ok_add&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        default:
            header("Location: index.php?");
            break;
    }
    //
    //
    //
    //
    //
} else {

    include view("home", "pageError");
}  
