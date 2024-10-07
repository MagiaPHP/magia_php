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
    array_push($error, "Id is mandatory");
}
###############################################################################
# FORMAT
################################################################################
if (!tasks_contacts_is_id($id)) {
    array_push($error, 'Id format error');
}
###############################################################################
# CONDICIONAL
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $task_id = tasks_contacts_field_id('task_id', $id);

    tasks_contacts_delete(
            $id
    );

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=tasks_contacts");
            break;

        case 2:
            header("Location: index.php?c=tasks_contacts&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=tasks_contacts&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=tasks_contacts&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=tasks_contacts&a=ok_delete&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:

            header("Location: index.php?c=tasks&a=details&id=$task_id");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}  
