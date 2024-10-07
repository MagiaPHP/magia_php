<?php

if (!permissions_has_permission($u_rol, 'expenses_lines', "delete")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$id = (isset($_GET["id"])) ? clean($_GET["id"]) : false;
$redi = (isset($_GET["redi"])) ? ($_GET["redi"]) : false;

$expense_id = expenses_lines_field_id("expense_id", $id);

$error = array();

if (!$id) {
    array_push($error, '$expense_id is mandatory');
}


#************************************************************************
if (!expenses_lines_is_id($id)) {
    array_push($error, "Id format error");
}

################################################################################
################################################################################
if (!$error) {
    expenses_lines_delete(
            $id
    );

    // Esto me actualiza los totales en la factura
    expenses_update_total_tax($expense_id, expenses_lines_totalHTVA($expense_id), expenses_lines_totalTVA($expense_id));

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#1");

            break;

        default:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id#items_add");
            break;
    }
} else {
    include view("home", "pageError");
}    
