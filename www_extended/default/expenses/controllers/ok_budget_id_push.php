<?php

echo "Cambiar a letras y numero el campo en am db";

die();
// Cambia de estatus
if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_POST['expense_id']) && $_POST['expense_id'] != "") ? $_POST['expense_id'] : false;
$budget_id = (isset($_POST['budget_id']) && $_POST['budget_id'] != "") ? $_POST['budget_id'] : false;
$redi = (isset($_POST['redi']) && $_POST['redi'] != "") ? $_POST['redi'] : 1;

// Cambiar a xtring al budget_id
//


$error = array();

### MANDATORY ##################################################################
if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}
### FORMAT #####################################################################
if (!expenses_is_id($expense_id)) {
    array_push($error, 'Expense id format error');
}
//if (!expenses_status_is_status($budget_id)) {
//    array_push($error, 'Status format error');
//}
################################################################################
################################################################################

if (!$error) {

    expenses_update_budget_id($expense_id, $budget_id);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=expenses&a=details&id=$expense_id");
            break;

        case 2:
            header("Location: index.php?c=expenses&a=edit&id=$expense_id");
            break;

        default:
            header("Location: index.php");
            break;
    }
} else {

    include view("home", "pageError");
}
