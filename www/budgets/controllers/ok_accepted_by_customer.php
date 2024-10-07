<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_REQUEST["id"])) ? clean($_REQUEST["id"]) : false;
//$status = (isset($_REQUEST["status"])) ? clean($_REQUEST["status"]) : false;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : false;

$error = array();

###############################################################################
# V e r i f i c a c i o n 

if (!$id) {
    array_push($error, "ID Don't send");
}

###############################################################################
# Variables obligatoias
###############################################################################
if (!budgets_is_id($id)) {
    array_push($error, 'ID format error');
}
###############################################################################
# Transformacion
#
###############################################################################
# error si: 
# el id no existe
if (!budgets_field_id("id", $id)) {
    array_push($error, 'Budget id does not exist in the database');
}

# 40 // Ya tiene factura
if (budgets_field_id("status", $id) == 35) {
    array_push($error, 'The budget has already been registered as rejected');
}

######################################################################### 
################################################################################
################################################################################
if (!$error) {

    // cambio a anulado 
    budgets_change_status_to($id, 30);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets&a=details&id=$id");
            break;
        case 2:
            header("Location: index.php?c=budgets&a=edit&id=$id");
            break;
        case 3:
            header("Location: index.php?c=xxxx&a=yyyy&id=zzzz");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {
    include view("home", "pageError");
}    