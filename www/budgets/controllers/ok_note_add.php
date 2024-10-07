<?php

if (!permissions_has_permission($u_rol, $c, "update")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$budget_id = (isset($_POST["budget_id"])) ? clean($_POST["budget_id"]) : false;
$description = ($_POST["description"] != "") ? clean($_POST["description"]) : '';
$order_by = budget_lines_next_order_by($budget_id) ?? 1;
$status = 1;
$redi = (isset($_POST["redi"]) ) ? clean($_POST["redi"]) : null;

$error = array();

if (!$budget_id) {
    array_push($error, '$budget_id is mandatory');
}
################################################################################
if (!$error) {

    budget_lines_note_add($budget_id, '***' . $description, $order_by, $status);

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php?c=budgets&a=edit&id=$budget_id#1");
            break;

        default:
            header("Location: index.php?c=budgets");
            break;
    }
} else {
    include view("home", "pageError");
}    