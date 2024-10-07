<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$expense_id = (isset($_REQUEST["expense_id"])) ? clean($_REQUEST["expense_id"]) : null;
$project_id = (isset($_REQUEST["project_id"])) ? clean($_REQUEST["project_id"]) : null;
$redi = (isset($_REQUEST["redi"])) ? clean($_REQUEST["redi"]) : null;

$error = array();

################################################################################
if (!$expense_id) {
    array_push($error, 'Expense id is mandatory');
}
if (!$project_id) {
    array_push($error, 'Project id is mandatory');
}
################################################################################
# format
if (!expenses_is_id($expense_id)) {
    array_push($error, 'Expense id format error');
}
//
if (!projects_is_id($project_id)) {
    array_push($error, 'Project id format error');
}
################################################################################
# condicional
################################################################################

if (!$error) {

    projects_inout_remove_expense($project_id, $expense_id);

    switch ($redi["redi"]) {
        case 1:
            header("Location: index.php?c=providers");
            break;

        case 2:
            header("Location: index.php?c=providers&a=details&id=$id");
            break;

        case 3:
            header("Location: index.php?c=providers&a=edit&id=$id");
            break;

        case 4:
            header("Location: index.php?c=providers&a=details&id=$lastInsertId");
            break;

        case 5: // custom
            // ejemplo index.php?c=providers&a=ok_delete&redi[redi]=5&redi[c]=contacts&redi[a]=details&redi[params]=id%3D1022
            header("Location: index.php?c=" . $redi['c'] . "&a=" . $redi['a'] . "&" . $redi['params'] . "#5");
            break;

        case 6:
            header("Location: index.php?c=expenses&a=details&id=$expense_id");
            break;

        default:
            header("Location: index.php?");
            break;
    }
} else {

    include view("home", "pageError");
}
